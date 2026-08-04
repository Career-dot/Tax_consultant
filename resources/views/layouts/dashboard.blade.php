<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard - Tax Consultant')</title>
    <meta name="robots" content="noindex, nofollow">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.webp') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/plugins/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    @stack('styles')
</head>
<body class="pfd-body">
    @php
        $flashMessages = [
            'profile-updated' => 'Profile updated successfully.',
            'password-updated' => 'Password changed successfully.',
            'application-started' => 'Application submitted successfully.',
            'document-uploaded' => 'Document uploaded successfully.',
            'document-deleted' => 'Document removed.',
            'payment-completed' => 'Payment completed successfully.',
            'ticket-created' => 'Support ticket created.',
            'reply-sent' => 'Reply sent.',
            'notifications-cleared' => 'All notifications marked as read.',
            'preferences-updated' => 'Notification preferences updated.',
        ];
        $flashMessage = $flashMessages[session('status')] ?? null;
    @endphp

    <div class="pf-dashboard" @if ($flashMessage) data-flash-message="{{ $flashMessage }}" @endif>
        <a class="pfd-skip-link" href="#pfdMainContent">Skip to content</a>

        <div class="pfd-sidebar-overlay" data-sidebar-overlay></div>

        <x-dashboard.sidebar />

        <div class="pfd-main">
            <x-dashboard.topbar />

            <main id="pfdMainContent" class="pfd-content">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="{{ asset('assets/js/dashboard.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
