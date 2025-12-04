<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-menu="leftalign">

<head>
    <title>@yield('titulo') - III Luanda Financing Summit for Africa's Infrastructure Development</title>

    <meta charset="UTF-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- sweetalert --}}
    <link rel="stylesheet" href="/css/sweetalert2.css">
    <script src="/js/sweetalert2.all.min.js"></script>

    {{-- Protecção contra clickJacking --}}
    {!! header('X-Frame-Options: SAMEORIGIN') !!}


    <meta name="robots" content="noindex, nofollow" />
    <meta name="title" content="III Luanda Financing Summit for Africa's Infrastructure Development" />
    <meta name="description"
        content="III Luanda Financing Summit – Um encontro estratégico para impulsionar o financiamento e o desenvolvimento de infraestruturas em África." />
    <meta name="keywords"
        content="Luanda Financing Summit, África, Desenvolvimento de Infraestruturas, Financiamento, Investimento, Angola, Summit" />
    <meta name="author" content="luandafinancingsummit.com" />

    <meta property="og:title" content="III Luanda Financing Summit for Africa's Infrastructure Development" />
    <meta property="og:site_name" content="III Luanda Financing Summit" />
    <meta property="og:description"
        content="Evento internacional focado no financiamento e desenvolvimento de infraestruturas em África." />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="http://luandafinancingsummit.com/images/logo.png" />
    <meta property="og:url" content="http://luandafinancingsummit.com" />

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="/site/images/logo/icon.svg" />
    
    <!-- animate css -->
    <link rel="stylesheet" href="/site/css/plugins/animate.min.css" />
    <!-- fontawesome 6.4.2 -->
    <link rel="stylesheet" href="/site/css/plugins/fontawesome.min.css" />
    <!-- bootstrap min css -->
    <link rel="stylesheet" href="/site/css/vendor/bootstrap.min.css" />
    <!-- swiper Css 10.2.0 -->
    <link rel="stylesheet" href="/site/css/plugins/swiper.min.css" />
    <!-- Bootstrap 5.0.2 -->
    <link rel="stylesheet" href="/site/css/vendor/magnific-popup.css" />
    <!-- metismenu scss -->
    <link rel="stylesheet" href="/site/css/vendor/metismenu.css" />
    <!-- nice select js -->
    <link rel="stylesheet" href="/site/css/plugins/nice-select.css" />
    <link rel="stylesheet" href="/site/css/plugins/jquery-ui.css" />
    <!-- custom style css -->
    <link rel="stylesheet" href="/site/css/style.css" />

    {!! RecaptchaV3::initJs() !!}


    @yield('CSS')
</head>






<body class="page">
