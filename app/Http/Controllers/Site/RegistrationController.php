<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class RegistrationController extends Controller
{


    public function create()
    {

        return view('site.registration.index');
    }

    public function store(Request $request)
    {
        // 🔹 Validação
        $validated = $request->validate([
            // Delegate Info
            'type' => 'required|string|in:Yes,No',
            'based' => 'required|string|in:Yes,No',
            'nationality' => 'required|string|max:255',
            'title' => 'required|string|in:Dr,Miss,Mrs,Ms,Mr,Prof',
            'fullname' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email',

            // Organisation
            'org_type' => 'required|string|max:255',
            'org_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'head_of_delegation' => 'required|string|in:Yes,No',

            // Accommodation & Diet (só obrigatórios se based == No)
            'accommodation' => 'nullable|required_if:based,No|string|in:Yes,No',
            'diet' => 'nullable|required_if:based,No|string|max:255',

            // Travel Info (só obrigatórios se based == No)
            'passport_number' => 'nullable|required_if:based,No|string|max:50',
            'passport_type' => 'nullable|required_if:based,No|string|max:50',
            'visa_status' => 'nullable|required_if:based,No|string|max:255',
            'country_of_departure' => 'nullable|required_if:based,No|string|max:255',
            'arrival_date' => 'nullable|required_if:based,No|date',
            'departure_date' => 'nullable|required_if:based,No|date|after_or_equal:arrival_date',
        ]);

        // 🔹 Criar registo
        $registration = Registration::create(array_merge($validated, [
            'code' => strtoupper(Str::random(8)),
        ]));


        return redirect()->back()->with([
            'create' => true,
            'fullname' => $registration->fullname,
            'title' => $registration->title,
            'code' => $registration->code,
        ]);
    }

    /**
     * Display a receipt with certified QrScan
     *
     * @return \Illuminate\Http\Response
     */
    public function receipt ($code)
    {

        $response['registration'] = Registration::where('code', $code)->first();
        
        $pdf = PDF::loadView('pdf.receipt.index', $response);

        return $pdf->stream('receipt -' . $code . '.pdf');
    }
}
