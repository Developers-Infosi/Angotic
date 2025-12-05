<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Classes\Random;
use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use PDF;

class RegistrationController extends Controller
{
    private $Logger;
    private $random;

    public function __construct()
    {
        $this->Logger = new Logger();
        $this->random = new Random();
    }

    public function index(Request $request)
    {

        /* Registration Counts  */
        /*
        $response['registration_Participant_Estudante'] = Registration::where('plafond', 'PARTICIPANTE ESTUDANTE')
        ->whereIn('status', ['EMITIDO', 'APROVADO'])
        ->count();

        $response['registration_Participant_c'] = Registration::where('plafond', 'PARTICIPANTE C')
        ->whereIn('status', ['EMITIDO', 'APROVADO'])
        ->count();
        $response['registration_Participant_b'] = Registration::where('plafond', 'PARTICIPANTE B')
        ->whereIn('status', ['EMITIDO', 'APROVADO'])
        ->count();
        $response['registration_Participant_a'] = Registration::where('plafond', 'PARTICIPANTE A')
        ->whereIn('status', ['EMITIDO', 'APROVADO'])
        ->count();
        $response['registration_vip'] = Registration::where('plafond', 'PARTICIPANTE VIP')
        ->whereIn('status', ['EMITIDO', 'APROVADO'])
        ->count();
        $response['registration_Participant_Familiar'] = Registration::where('plafond', 'INGRESSO FAMILIAR')
        ->whereIn('status', ['EMITIDO', 'APROVADO'])
        ->count();

         */

        $response['registration_general'] = Registration::where('status', '=', 'EMITIDO')->orWhere('status', '=', 'APROVADO')->orWhere('status', '=', 'IMPRESSO')->orderBy('id', 'desc')->get();
        $response['registration'] = Registration::where('status', '=', 'RECEBIDO')->orWhere('status', '=', 'DUPLICADO')->orWhere('status', '=', 'RECUSADO')->orderBy('id', 'desc')->get();


        //Logger
        $this->Logger->log('emergency', 'Listou os Inscritos');
        return view('admin.registration.list.index', $response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $response['registration'] = Registration::find($id);

        //Logger
        $this->Logger->log(
            'emergency',
            'Visualizar um inscrito com o identificador ' . $id
        );
        return view('admin.registration.details.index', $response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response['registration'] = Registration::find($id);
        //Logger
        $this->Logger->log(
            'emergency',
            'Entrou em editar um inscrito com o identificador ' . $id
        );
        return view('admin.registration.edit.index', $response);
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



        $validation = $request->validate([
            'plafond' => 'required|string|max:255',
            'nif' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'tel' => 'required',
            'type' => 'required|string|max:20',
            'quantity' => 'required|numeric',
            'status' => 'required|string|max:20'
        ]);





        Registration::find($id)->update([

            'plafond' => $request->plafond,
            'nif' => $request->nif,
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,
            'quantity' =>  $request->quantity,
            'type' =>  $request->type,
            'status' => $request->status,


        ]);
        //Logger
        $this->Logger->log('emergency', 'Editou um inscrito com o identificador ' . $id);

        return redirect()->route('admin.registration.show', $id)->with('edit', '1');
    }


    public function list(Request $request)
    {

        $response['checkbox'] = $request->all();


        if ($request->status == 'TODAS' && $request->plaf == 'TODAS') {
            $response['registrations'] = Registration::orderBy('name', 'ASC')->where('status','!=','DUPLICADO')->get();
        } elseif (($request->status == 'APROVADO') && $request->plaf != 'TODAS') {
            $response['registrations'] = Registration::where('status', '!=', 'RECEBIDO')
                ->where('status', '!=', 'DUPLICADO')
                ->where('plafond', $request->plaf)
                ->orderBy('name', 'ASC')
                ->get();
        } elseif ($request->status == 'RECEBIDO' && $request->plaf != 'TODAS') {
            $response['registrations'] = Registration::where('status', 'RECEBIDO')
                ->where('plafond', $request->plaf)
                ->orderBy('name', 'ASC')
                ->get();
        } elseif ($request->status == 'TODAS' && $request->plaf != 'TODAS') {
            $response['registrations'] = Registration::where('plafond', $request->plaf)
                ->orderBy('name', 'ASC')
                ->get();
        } elseif (($request->status == 'APROVADO') && $request->plaf == 'TODAS') {
            $response['registrations'] = Registration::where('status', '=', 'APROVADO')
                ->orWhere('status', '==', 'EMITIDO')
                ->where('plafond', $request->plaf)
                ->orderBy('name', 'ASC')
                ->get();

        } elseif ($request->status == 'EMITIDO' && $request->plaf == 'TODAS') {
            $response['registrations'] = Registration::where('status', '=', 'EMITIDO')
                ->orderBy('name', 'ASC')
                ->get();
        } elseif ($request->status == 'EMITIDO' && $request->plaf != 'TODAS') {
            $response['registrations'] = Registration::where('status', '=', 'EMITIDO')
                ->where('plafond', $request->plaf)
                ->orderBy('name', 'ASC')
                ->get();
        } elseif ($request->status == 'DUPLICADO' && $request->plaf != 'TODAS') {
            $response['registrations'] = Registration::where('status', '=', 'DUPLICADO')
                ->where('plafond', $request->plaf)
                ->orderBy('name', 'ASC')
                ->get();
        } elseif ($request->status == 'DUPLICADO' && $request->plaf == 'TODAS') {
            $response['registrations'] = Registration::where('status', '=', 'DUPLICADO')
                ->orderBy('name', 'ASC')
                ->get();
        }

        else {

            $response['registrations'] = Registration::orderBy('name', 'ASC')->get();
        }


        $pdf = PDF::loadView('pdf.participant.index', $response);
        $pdf->setPaper('A3', 'landscape');
        //Logger
        $this->Logger->log('emergency', 'Imprimiu a lista Participantes');
        return $pdf->stream("Lista de Participantes.pdf");
    }
}
