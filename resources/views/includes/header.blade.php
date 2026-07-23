@php
    $mainNavigation = [
        ['label' => 'Home', 'url' => route('home')],
        ['label' => 'Pricing', 'url' => url('/pricing')],
        ['label' => 'About Us', 'url' => url('/about')],
        ['label' => 'FAQ', 'url' => route('faq')],
        ['label' => 'Contact', 'url' => url('/contact')],
    ];
    $deadline = \Carbon\Carbon::create(2026, 9, 30)->endOfDay();
    $daysLeft = max(0, now()->diffInDays($deadline, false));
@endphp

<header id="header" class="pf-header sticky-top">
    <div class="pf-header-top d-none d-xl-block">
        <div class="container">
            <div class="d-flex align-items-center justify-content-center gap-3 py-2 text-center">
                <a class="pf-header-alert" href="{{ url('/contact') }}">
                    <span>FBR Deadline:</span>
                    <strong>{{ $daysLeft }} days left</strong>
                    <span class="pf-header-separator">|</span>
                    <span>File before Sep 30, 2026 to stay active taxpayer.</span>
                </a>
                <a class="pf-header-file-link" href="{{ url('/contact') }}">File Now <i class="fa fa-angle-right"></i></a>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-xl pf-navbar bg-white" aria-label="Primary navigation">
        <div class="container">
            <a class="navbar-brand pf-navbar-brand" href="{{ url('/') }}" aria-label="Career Institute home">
                <img src="{{ asset('assets/images/logo/logo.jpeg') }}" alt="Career Institute">
            </a>

            <button class="navbar-toggler pf-navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#primaryNavbar" aria-controls="primaryNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <div class="collapse navbar-collapse pf-navbar-collapse" id="primaryNavbar">
                <ul class="navbar-nav pf-navbar-nav mx-xl-auto">
                    @foreach ($mainNavigation as $item)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ $item['url'] }}">{{ $item['label'] }}</a>
                        </li>

                        @if ($loop->first)
                            @include('includes.services-dropdown')
                        @endif
                    @endforeach
                </ul>

                <div class="pf-mobile-actions d-grid gap-2 d-xl-none">
                    <a class="btn pf-mobile-btn pf-mobile-btn-muted" href="#" data-auth-open="sign-in">Sign In</a>
                    <a class="btn pf-mobile-btn pf-mobile-btn-outline" href="#" data-auth-open="sign-up">Register</a>
                    <a class="btn pf-mobile-btn pf-mobile-btn-primary" href="#" data-auth-open="get-started">Get Started</a>
                </div>
            </div>

            <div class="pf-desktop-actions d-none d-xl-flex align-items-center gap-2">
                <a class="btn btn-outline-secondary" href="#" data-auth-open="sign-in">Sign In</a>
                <a class="btn btn-outline-success" href="#" data-auth-open="sign-up">Register</a>
                <a class="btn btn-outline-danger" href="#" data-auth-open="get-started">Get Started</a>
            </div>
        </div>
    </nav>
</header>
