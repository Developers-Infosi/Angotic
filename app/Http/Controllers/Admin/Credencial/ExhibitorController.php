<?php

namespace App\Http\Controllers\Admin\Credencial;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Exhibitor;
use App\Models\ExhibitorQrCode;
use App\Models\Schedule;
use App\Models\Service;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;

class ExhibitorController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }


     public function print($id)
    {
        $exhibitor = Exhibitor::with('qrcodes')->findOrFail($id);



        // Impede geração se já estiver emitido
        if ($exhibitor->status !== 'EMITIDO') {
            $quantity = $exhibitor->quantity;
            $createdCodes = [];

            for ($i = 0; $i < $quantity; $i++) {
                do {
                    // Gera código único de 8 dígitos
                    $code = str_pad(mt_rand(0, 99999999), 8, '0', STR_PAD_LEFT);
                } while (ExhibitorQrCode::where('code', $code)->exists());

                $qrCode = $exhibitor->qrcodes()->create([
                    'code' => $code,
                    'exhibitor_id' => $id
                ]);

                $createdCodes[] = $qrCode->code;
            }

            // Atualiza status e data de impressão
            $exhibitor->update([
                'status' => 'EMITIDO'
            ]);
        }

        
        $data = [
            'exhibitor' => $exhibitor,
            'background' => '#5a4c99',
            'color' => '#FFFFFF',
        ];

        $pdf = PDF::loadView('pdf.credencial.exhibitor.index', $data);
        $pdf->setPaper('A6', 'portrait');

        // Logger
        $this->Logger->log('emergency', 'Imprimiu credenciais de Expositor com o identificador: ' . $id);

        return $pdf->stream('credenciamento de expositor-' . $id . '.pdf');
    }




}
