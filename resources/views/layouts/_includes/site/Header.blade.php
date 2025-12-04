<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-wf-page="680f7f27ef28818d06c1299e"
    data-wf-site="675f38d2d1a83e76abfde741">

<head>
    <title>@yield('titulo') - ANGOTIC 2026</title>
    <meta charset="UTF-8" />
    {{-- Protecção contra clickJacking --}}
    {!! header('X-Frame-Options: SAMEORIGIN') !!}

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! RecaptchaV3::initJs() !!}


    <meta content="Angotic ICT FORUM" name="description">
    <meta content="Angotic ICT FORUM" property="og:title">
    <meta content="Angotic ICT FORUM" property="og:description">
    <meta content="Angotic ICT FORUM" property="twitter:title">
    <meta content="Angotic ICT FORUM" property="twitter:description">

    <meta property="og:type" content="website">
    <meta content="summary_large_image" name="twitter:card">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <link href="/site/css/normalize.css" rel="stylesheet" type="text/css">
    <link href="/site/css/webflow.css" rel="stylesheet" type="text/css">
    <link href="/site/css/angotic.webflow.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
    <script type="text/javascript">
        WebFont.load({
            google: {
                families: [
                    "Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic",
                    "Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic",
                    "Roboto:100,300,regular,500,700,900", "Outfit:100,200,300,regular,500,600,700,800,900",
                    "Barlow:200,300,regular,500,600,700,800,900"
                ]
            }
        });
    </script>
    <script type="text/javascript">
        ! function(o, c) {
            var n = c.documentElement,
                t = " w-mod-";
            n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n
                .className += t + "touch")
        }(window, document);
    </script>
    <link href="/site/images/favicon.png" rel="shortcut icon" type="image/x-icon">
    <link href="/site/images/webclip.png" rel="apple-touch-icon">
   
  

    <!--  CSS do Slick Slider  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css">
    <style>
        .gt_container--hich1m .gt_switcher {
            font-family: Arial;
            font-size: 12pt;
            text-align: left;
            cursor: pointer;
            overflow: hidden;
            width: 143px;
            line-height: 0;
        }

        .gt_float_switcher.notranslate {
            font-size: 15px;
            box-shadow: rgb(0 0 0 / 0%) 0 5px 15px;
        }

        .gt-current-lang {
            font-weight: 500;
        }

        .gt_float_switcher img {
            vertical-align: middle;
            display: inline-block;
            width: 22px;
            height: auto;
            margin: 0 5px 0 0;
            border-radius: 0px;
        }

        .gt_float_switcher {
            font-family: Arial;
            font-size: 15px;
            border-radius: 2px;
            color: #555;
            display: inline-block;
            line-height: 20px;
            box-shadow: rgba(0, 0, 0, 0.15) 0 5px 15px;
            background: #fff;
            overflow: hidden;
            transition: all .5s cubic-bezier(0.4, 0, 1, 1);
        }

        .gt_container--hich1m .gt_switcher .gt_selected {
            background: #fff linear-gradient(180deg, #efefef21 0%, #ffffff94 70%);
            position: relative;
            z-index: 9999;
        }

        .gt_container--hich1m .gt_switcher .gt_selected a {
            border: 1px solid #eee;
            color: #666;
            padding: 3px 5px;
            width: 161px;
            border-radius: 4px;
        }

        .slick-dots li button:before {
            font-family: 'slick';
            font-size: 9px;
            line-height: 20px;
            position: absolute;
            top: 0;
            left: 0;
            width: 20px;
            height: 20px;
            content: '•';
            text-align: center;
            opacity: .25;
            color: black;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
    </style>



    {{-- sweetalert --}}
    <link rel="stylesheet" href="/css/sweetalert2.css">
    <script src="/js/sweetalert2.all.min.js"></script>


    @yield('CSS')
</head>


<body data-w-id="65dfdbad0e8ca8327518361c">
