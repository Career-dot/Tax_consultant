<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Korde - Finance & Tax Consultancy')</title>
    <meta name="description" content="@yield('meta_description', 'Korde finance and tax consultancy website.')">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.webp') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,600,700&display=swap" rel="stylesheet">

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
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/services.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/auth-modal.css') }}">

    @stack('styles')
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

    <button id="backBTn" class="backbtn" type="button" aria-label="Back to top">
        <i class="fa fa-angle-up" aria-hidden="true"></i>
    </button>

    @vite('resources/js/app.js')
    <script src="{{ asset('assets/js/services.js') }}" defer></script>
    <script src="{{ asset('assets/js/auth-modal.js') }}" defer></script>

    @stack('scripts')
</body>
</html>
