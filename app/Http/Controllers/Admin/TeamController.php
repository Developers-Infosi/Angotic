<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Logger;
use App\Models\Team;
use App\Classes\Random;
use App\Models\TeamQrCode;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TeamController extends Controller
{
    private $Logger;
    private $random;

    public function __construct()
    {
        $this->Logger = new Logger();
        $this->random = new Random();
    }

    public function index()
    {
        $response['teams'] = Team::orderBy('id', 'desc')->get();

        //Logger
        $this->Logger->log('info', 'Listed Operational Team');
        return view('admin.team.list.index', $response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Logger
        $this->Logger->log('info', 'Entered Create Operational Team');
        return view('admin.team.create.index');
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
            'name' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'quantity' => 'nullable|max:255',
            'tel' => 'nullable|max:255',
            'email' => 'nullable|email|max:255',
            'type' => 'required|string|max:255',
        ]);


        $team = Team::create([
            'name' => $request->name,
            'company' => $request->company,
            'quantity' => $request->quantity ?? 1,
            'tel' => $request->tel,
            'email' => $request->email,
            'type' => $request->type
        ]);

        //Logger
        $this->Logger->log('info', 'Created Operational Team' . $team->name);
        return redirect()->route('admin.team.show', $team->id)->with('create', '1');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $response['team'] = Team::find($id);

        //Logger
        $this->Logger->log('info', 'Viewed Operational Team ' . $id);
        return view('admin.team.details.index', $response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $response['team'] = Team::find($id);

        //Logger
        $this->Logger->log('info', 'Entered Operational Team Edit ' . $id);
        return view('admin.team.edit.index', $response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'quantity' => 'nullable|max:255',
            'tel' => 'nullable|max:255',
            'email' => 'nullable|email|max:255',
            'status' => 'required|string|max:255',
            'type' => 'required|string|max:255',
        ]);

        Team::find($id)->update([
            'name' => $request->name,
            'company' => $request->company,
            'quantity' => $request->quantity ?? 1,
            'tel' => $request->tel,
            'email' => $request->email,
            'status' => $request->status,
            'type' => $request->type,
        ]);

        //Logger
        $this->Logger->log('info','Updated Operational Team ' . $id);
        return redirect()->route('admin.team.show', $id)->with('edit', '1');
    }


     public function print($id)
    {
        $team = Team::with('qrcodes')->findOrFail($id);

        // Impede geração se já estiver emitido
        if ($team->status !== 'EMITIDO') {
            $quantity = $team->quantity;
            $createdCodes = [];

            for ($i = 0; $i < $quantity; $i++) {
                do {
                    // Gera código único de 6 dígitos
                    $code = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
                } while (TeamQrCode::where('code', $code)->exists());

                $qrCode = $team->qrcodes()->create([
                    'code' => $code,
                    'service_id' => $id
                ]);

                $createdCodes[] = $qrCode->code;
            }

            // Atualiza status e data de impressão
            $team->update([
                'status' => 'EMITIDO',
                'printed_at' => now(),
            ]);
        }

        // Estilo visual
        $styleMap = [
            'Press' => ['background' => '#458512ff', 'color' => '#FFFFFF'],
            'Exhibitor' => ['background' => '#458512ff', 'color' => '#FFFFFF'],
            'Security' => ['background' => '#000000ff', 'color' => '#FFFFFF'],
            'Protocol' => ['background' => '#E2AA44', 'color' => '#FFFFFF'],
            'Technical Support' => ['background' => '#E2AA44', 'color' => '#FFFFFF'],
            'Service' => ['background' => '#E2AA44', 'color' => '#FFFFFF'],
            'Organization' => ['background' => '#A22F3F', 'color' => '#FFFFFF'],
            'Catering' => ['background' => '#E2AA44', 'color' => '#FFFFFF'],
            'Medical' => ['background' => '#E2AA44', 'color' => '#FFFFFF']
        ];

        $style = $styleMap[$team->type] ?? ['background' => '#E2AA44', 'color' => '#FFFFFF'];

        $data = [
            'team' => $team,
            'background' => $style['background'],
            'color' => $style['color'],
        ];

        $pdf = PDF::loadView('pdf.credential.team.index', $data);
        $pdf->setPaper('A6', 'portrait');

        // Logger
        $this->Logger->log('emergency', 'Credential Printed for Operational Team: ' . $id);

        return $pdf->stream('Credential-' . $id . '.pdf');
    }
}
