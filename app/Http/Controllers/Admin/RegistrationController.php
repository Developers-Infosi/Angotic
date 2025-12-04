<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;
use PDF;

class RegistrationController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger();
    }
    public function index()
    {

        $response['registrations'] = Registration::orderBy('id', 'desc')->get();

        //Logger
        $this->Logger->log('emergency', 'Listed Participants');
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
            'Viewed Participant ' . $id
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
            'Entered Participant Edit' . $id
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
        $request->validate([
            'status' => 'required|string|max:255'
        ]);


        Registration::find($id)->update([
            'status' => $request->status
        ]);
        //Logger
        $this->Logger->log('emergency', 'Updated Participant ' . $id);
        return redirect()->route('admin.registration.show', $id)->with('edit', '1');
    }


    /**
     * Print the Certified
     *
     * @return \Illuminate\Http\Response
     */
    public function print($code)
    {

        $response['registration'] = Registration::where('code', $code)->first();
        if($response['registration']->status == 'APROVADO' || $response['registration']->status == 'IMPRESSO'){

            Registration::where('code', $code)->update([
                'status' => "IMPRESSO",
                'printed_at'=>now(),
            ]);
            $pdf = PDF::loadView('pdf.credential.registration.index', $response);
            $pdf->setPaper('A6', 'portrait');

            //Logger
            $this->Logger->log('emergency', 'Imprimiu uma credencial com o identificador: '.$response['registration']->code);

            return $pdf->stream('credenciamento-' . $response['registration']->code . ".pdf");

        }else{

            return redirect()->route('login')->with('NoAuth', '1');
        }

    }


}
