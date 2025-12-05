<?php

namespace App\Http\Controllers\Admin\Credencial;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\PrintBatch;
use App\Models\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class GuestController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }



    public function index()
    {
        $this->Logger->log('info', 'Entrou em Credencial de Participante');
        return view('admin.registration.credencial.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'category' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'quantity' => 'nullable|numeric|min:1',
            'description' => 'nullable|string'
        ]);

        DB::beginTransaction();

        try {
            $printBatch = PrintBatch::create([
                'category' => $request->category,
                'type' => $request->type,
                'quantity' => $request->quantity,
                'description' => $request->description,
            ]);

            // Gerar códigos únicos com base na quantidade
            $qrCodes = [];
            for ($i = 0; $i < $printBatch->quantity; $i++) {
                do {
                    $code = str_pad(mt_rand(0, 9999999), 7, '0', STR_PAD_LEFT);
                } while (QrCode::where('code', $code)->exists());

                $qrCodes[] = [
                    'code' => $code,
                    'print_batch_id' => $printBatch->id,
                    'status' => 'NOT_USED',
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            QrCode::insert($qrCodes);

            // Logger
            $this->Logger->log('info', 'Cadastrou um lote de impressão com o ID ' . $printBatch->id);

            DB::commit();
            return redirect()->route("admin.credencial.guest.print", $printBatch->id);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Erro ao cadastrar lote: ' . $e->getMessage()]);
        }
    }

    /**
     * Print the Certified
     *
     * @return \Illuminate\Http\Response
     */
    public function print($id)
    {
        $batch = PrintBatch::with('qrCodes')->findOrFail($id);

        // Define background and color based on category
        $styleMap = [
            'ESTUDANTE' => ['background' => 'rgba(4, 77, 175,0.6)', 'color' => '#FFFFFF'],
            'PARTICIPANTE C' => ['background' => '#733FDE', 'color' => '#FFF'],
            'PARTICIPANTE B' => ['background' => '#733FDE', 'color' => '#FFFFFF'],
            'PARTICIPANTE A' => ['background' => '#733FDE', 'color' => '#FFFFFF'],
            'INGRESSO FAMILIAR' => ['background' => '#734633', 'color' => '#FFFFFF'],
            'PARTICIPANTE VIP' => ['background' => '#102C69', 'color' => '#FFFFFF'],
            'CONVIDADO' => ['background' => '#102C69', 'color' => '#FFFFFF'],
        ];

        $style = $styleMap[$batch->category] ?? ['background' => '#000000', 'color' => '#FFFFFF'];

        $data = [
            'batch' => $batch,
            'background' => $style['background'],
            'color' => $style['color'],
        ];

        $pdf = PDF::loadView('pdf.credencial.guest.index', $data);
        $pdf->setPaper('A6', 'portrait');

        // Logger
        $this->Logger->log('emergency', 'Imprimiu credenciais do lote: ' . $id);

        return $pdf->stream("credenciamento" . $id . ".pdf");
    }
}
