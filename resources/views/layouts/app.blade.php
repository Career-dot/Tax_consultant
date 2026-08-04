<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'FINANIC Business Consultants - Income Tax, Sales Tax, Withholding Tax & Litigation | Faisalabad')</title>
    <meta name="description" content="@yield('meta_description', 'FINANIC Business Consultants is a Faisalabad-based tax consultancy providing income tax, sales tax, withholding tax compliance, and tax litigation representation before the FBR and appellate forums.')">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.webp') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/plugins/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/fakeloader.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/animated-headline.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/youtubepopup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/calender.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/plyr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/datepicker.min.css') }}">
    @stack('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/services.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/auth-modal.css') }}">
</head>
<body class="@yield('body_class')">
    <div class="fakeloader"></div>

    <div class="wrapper" id="wrapper">
        @include('includes.header')

        <main id="main-content">
            @yield('content')
        </main>

        @include('includes.footer')
    </div>

    @include('includes.auth-modal')

    <div class="pf-floating-contact" role="complementary" aria-label="Quick contact">
        <a href="https://wa.me/923XXXXXXXXX" class="pf-floating-btn pf-floating-whatsapp" target="_blank" rel="noopener" aria-label="Chat with us on WhatsApp">
            <i class="fa fa-whatsapp" aria-hidden="true"></i>
        </a>
        <a href="tel:+923XXXXXXXXX" class="pf-floating-btn pf-floating-call" aria-label="Call FINANIC Business Consultants">
            <i class="fa fa-phone" aria-hidden="true"></i>
        </a>
    </div>

    <button id="backBTn" class="backbtn" type="button" aria-label="Back to top">
        <i class="fa fa-angle-up" aria-hidden="true"></i>
    </button>

    @vite('resources/js/app.js')
    <script src="{{ asset('assets/js/services.js') }}" defer></script>
    <script src="{{ asset('assets/js/auth-modal.js') }}" defer></script>

    @stack('scripts')
</body>
</html>
