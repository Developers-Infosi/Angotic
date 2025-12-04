<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard/css/bootstrap.min.css">

    <title>Credencial Participante {{ $registration->code }}</title>
    <style>
        * {
            padding: 0;
            margin: 4px 0px 0 0px;
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>
@php
    // Dividir a string em partes usando o espaço como delimitador
    $partesNome = explode(' ', $registration->fullname);

@endphp

<body
    style="background-image: url(site/images/background.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            height: 150px !important;
            width: 100% !important;">
    <div class="container-fluid">
        <header class="col-12 text-center" style="padding-top: 50px;">
            <img src="site/images/logo/colored.png" width="100%" alt="">
        </header>

        <div class="row">


            <div class="col-12" style="padding-top:4px;padding-bottom:7px; background-color: #A22F3F;">

                <h1 class="text-center" style="font-size: 20;font-weight: 700; color:#fff;">
                    <b>PARTICIPANTE</b> <br>

                    <small><i style="font-size:18px;color:#fff;">Participant</i></small>
                </h1>

            </div>

        </div>


        <div class="row">

            <div class="col-xs-6 text-center">
                <table width="100%">
                    <tr>
                        <td style="width: 65%; text-align: center; vertical-align: middle;">
                            <div>
                                <h4 style="font-size: 20px; font-weight: 700; text-transform: none !important;">
                                    <b>{!! $registration->title . ' ' . mb_strtoupper($partesNome[0] . ' ' . end($partesNome), 'UTF-8') !!}</b>
                                </h4>


                            </div>
                        </td>

                    </tr>
                </table>
            </div>
            <div class="col-xs-6">
                <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(800)->generate($registration->code)) !!} " width="90" height="90">
            </div>
        </div>


        <footer class="row" style="position: fixed;bottom: 10px;width: 100%;">
            <div class="col-12">
                <img src="site/images/brand/brands.png" width="350px" style="margin-left:25px;margin-top:10px;">
            </div>
        </footer>
    </div>

</body>

</html>
