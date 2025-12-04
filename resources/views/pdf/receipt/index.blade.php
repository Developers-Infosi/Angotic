<!DOCTYPE html>
<html lang="en">

<head>

    <title>{{ $registration->code . ' - ' . config('app.name') }}</title>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            margin: 0 40px 0 40px;
            color: #222;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 5px;
            margin-bottom: 10px;
        }

        .header h1 {
            font-size: 20px;
            margin: 0;
        }

        .header p {
            font-size: 12px;
            margin: 5px 0;
        }

        .section {
            margin-bottom: 12px;
            /* menor que antes */
            page-break-inside: avoid;
        }

        .section h2 {
            font-size: 14px;
            border-bottom: 1px solid #ccc;
            margin-bottom: 4px;
            padding-bottom: 2px;
        }

        .info p {
            margin: 2px 0;
        }

        .highlight {
            background: #f5f5f5;
            padding: 8px;
            border-left: 3px solid #000;
            font-size: 11px;
            margin-bottom: 10px;
            page-break-inside: avoid;
        }

        .obs {
            margin-top: 20px;
            /* antes era 25px */
            font-size: 10.5px;
            /* reduzido p/ caber */
            padding: 10px;
            /* antes era 10px */
            border: 1px dashed #666;
            page-break-inside: avoid;
        }
    </style>

</head>

<body>

    <div class="header">
        <img src="site/images/logo/colored.png" width="450">

    </div>

    <div class="section">
        <h2>Receipt of Registration</h2>
        <div class="info">
            <p><b>Registration Code:</b> {{ $registration->code }}</p>
            <p><b>Name:</b> {{ $registration->title . ' ' . $registration->fullname }}</p>
            <p><b>Email:</b> {{ $registration->email }}</p>
        </div>
    </div>

    <div class="section">
        <h2>Delegate Information</h2>
        <div class="info">
            <p><b>Registering on behalf:</b> {{ $registration->type }}</p>
            <p><b>Based in Angola:</b> {{ $registration->based }}</p>
            <p><b>Nationality:</b> {{ $registration->nationality }}</p>
            <p><b>Phone:</b> {{ $registration->phone }}</p>
        </div>
    </div>

    <div class="section">
        <h2>Organization Details</h2>
        <div class="info">
            <p><b>Organization Type:</b> {{ $registration->org_type }}</p>
            <p><b>Organization Name:</b> {{ $registration->org_name }}</p>
            <p><b>Position:</b> {{ $registration->position }}</p>
            <p><b>Head of Delegation:</b> {{ $registration->head_of_delegation }}</p>
        </div>
    </div>

    @if ($registration->based == 'No')
        <div class="section">
            <h2>Travel Information</h2>
            <div class="info">
                <p><b>Passport Number:</b> {{ $registration->passport_number }}</p>
                <p><b>Passport Type:</b> {{ $registration->passport_type }}</p>
                <p><b>Visa Status:</b> {{ $registration->visa_status }}</p>
                <p><b>Country of Departure:</b> {{ $registration->country_of_departure }}</p>
                <p><b>Arrival Date:</b> {{ \Carbon\Carbon::parse($registration->arrival_date)->format('d/m/Y') }}</p>
                <p><b>Departure Date:</b> {{ \Carbon\Carbon::parse($registration->departure_date)->format('d/m/Y') }}
                </p>

            </div>
        </div>

        <div class="highlight">
            <b>Important Notice for International Participants:</b><br>
            Participants not residing in Angola are required to apply for an <b>e-Visa</b>
            through the official platform of the Angolan Migration and Foreigners Service (SME):
            <a target="_blank" href="https://www.smevisa.gov.ao/">https://www.smevisa.gov.ao/</a><br>
            Please ensure that you insert your <b>Registration Code ({{ $registration->code }})</b>
            in the "Observation Field" of the SME system when completing your visa application.
        </div>
    @endif

    <div class="obs">
        <p><b>OBS:</b> For organizational efficiency and to avoid delays, kindly present this
            receipt on the day of accreditation.</p>
        <p><b>Accreditation:</b> The accreditation process is conducted exclusively through
            {{ config('app.name') }} and is strictly valid for participants duly authorized
            by the Ministry of Foreign Affairs of the Republic of Angola (MIREX).</p>
    </div>

</body>

</html>
