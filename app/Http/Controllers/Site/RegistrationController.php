<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Jobs\RegistrationJob;
use App\Models\Registration;
use Illuminate\Http\Request;
use PDF;
use App\Apis\Appypay\GPO;
use App\Models\Plafond;

class RegistrationController extends Controller
{
    private $GPO;

    public function __construct()
    {
        $this->GPO = new GPO;
    }



    public function create()
    {

        return view('site.registration.index');
    }

    public function store(Request $request)
    {

        $request->validate([
            'plafond' => 'required|string|max:255',
            'nif' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'tel' => 'required',
            'type' => 'required|string|max:20',
            'quantity' => 'nullable|numeric'
        ]);

        //senha
        $key = 'AT' . rand();
        $data = Registration::create([
            'code' =>  $key,
            'plafond' => $request->plafond,
            'nif' => $request->nif,
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,
            'paymethod' => $request->paymethod,
            'quantity' => ($request->type == 'Individual') ? 1 : $request->quantity,
            'type' =>  $request->type
        ]);

        $registration = Registration::find($data->id);
        // RegistrationJob::dispatch($registration)->delay(now()->addSeconds('2'));

        if ($registration->paymethod == 'MCX') {

            return redirect()->route('site.registration.payexpress', [
                'code' => $registration->code,
                'billingphone' => $request->billingphone,
            ]);
        } else {
            return redirect()->back()->with('create', ['codetype' => $registration->code, 'idCardtype' => $registration->nif]);
        }
    }



    /**
     * Display a invoice with certified QrScan
     *
     * @return \Illuminate\Http\Response
     */
    public function payexpress($code, Request $request)
    {

        $billingphone = $request->query('billingphone');

        $registration = Registration::where('code', $code)->first();
        $response['registration'] = $registration;

        //plafond
        $plafond = Plafond::where('name', $registration->plafond)->first();
        $response['amount'] =  $plafond->price;

        $erro = null;

        try {
            $gpo = $this->GPO->index(
                ($plafond->price * $registration->quantity),
                $billingphone,
                $registration->plafond,
                $registration->code
            );
        } catch (\Throwable $e) {
            $erro = $e->getMessage();
        }


        return view('site.registration.index', compact('gpo', 'erro'));

    }


    /**
     * Display a invoice with certified QrScan
     *
     * @return \Illuminate\Http\Response
     */
    public function invoice($code)
    {

        $registration = Registration::where('code', $code)->first();
        $response['registration'] = $registration;

        //plafond
        $plafond = Plafond::where('name', $registration->plafond)->first();

        $response['amount'] =  $plafond->price;

        $pdf = PDF::loadView('pdf/invoice/participant/index', $response);
        return $pdf->stream('Documento de Pagamento -' . $code . '.pdf');
    }
}
