@php
    $mainNavigation = [
        ['label' => 'Home', 'url' => route('home')],
        ['label' => 'About Us', 'url' => url('/about')],
        ['label' => 'Industries', 'url' => route('industries')],
        ['label' => 'Tax Compliance Planner', 'url' => url('/pricing')],
        ['label' => 'Resources', 'url' => route('resources')],
        ['label' => 'FAQs', 'url' => route('faq')],
        ['label' => 'Contact Us', 'url' => url('/contact')],
    ];
    $deadline = \Carbon\Carbon::create(2026, 9, 30)->endOfDay();
    $daysLeft = max(0, (int) floor(now()->diffInDays($deadline, false)));
@endphp

<header id="header" class="pf-header sticky-top">
    <div class="pf-header-top d-none d-xl-block">
        <div class="container">
            <div class="d-flex align-items-center justify-content-center gap-3 py-2 text-center">
                <a class="pf-header-alert" href="{{ url('/contact') }}">
                    <span>FBR Deadline: {{ $daysLeft }}</span>
                    <strong> days left</strong>
                    <span class="pf-header-separator">|</span>
                    <span>File before Sep 30, 2026 to stay on the Active Taxpayer List.</span>
                </a>
                <a class="pf-header-file-link" href="{{ url('/contact') }}">Talk to Us <i class="fa fa-angle-right"></i></a>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-xl pf-navbar bg-white" aria-label="Primary navigation">
        <div class="d-flex gap-5 mx-auto">
            <a class="navbar-brand pf-navbar-brand" href="{{ url('/') }}" aria-label="FINANIC Business Consultants home">
                <img src="{{ asset('assets/images/logo/logo.jpeg') }}" alt="FINANIC Business Consultants">
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

                        @if ($loop->iteration === 2)
                            @include('includes.services-dropdown')
                        @endif
                    @endforeach
                </ul>

                <div class="pf-mobile-actions d-grid gap-2 d-xl-none">
                    @auth
                        <a class="btn pf-mobile-btn pf-mobile-btn-primary" href="{{ route('dashboard.index') }}">Dashboard</a>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="btn pf-mobile-btn pf-mobile-btn-muted w-100" type="submit">Logout</button>
                        </form>
                    @else
                        <a class="btn pf-mobile-btn pf-mobile-btn-muted" href="#" data-auth-open="sign-in">Sign In</a>
                        <a class="btn pf-mobile-btn pf-mobile-btn-outline" href="#" data-auth-open="sign-up">Register</a>
                        <a class="btn pf-mobile-btn pf-mobile-btn-primary" href="#" data-auth-open="get-started">Get Started</a>
                    @endauth
                </div>
            </div>

            <div class="pf-desktop-actions d-none d-xl-flex align-items-center gap-2">
                @auth
                    <div class="pf-user-menu dropdown">
                        <button class="btn pf-user-menu-toggle dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="pf-user-menu-avatar">{{ auth()->user()->initials() }}</span>
                            <span class="pf-user-menu-name">{{ auth()->user()->name }}</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end pf-user-menu-dropdown">
                            <li><a class="dropdown-item" href="{{ route('dashboard.index') }}"><i class="fa fa-th-large" aria-hidden="true"></i> Dashboard</a></li>
                            <li><a class="dropdown-item" href="{{ route('dashboard.profile') }}"><i class="fa fa-user-o" aria-hidden="true"></i> My Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a class="btn btn-outline-secondary" href="#" data-auth-open="sign-in">Sign In</a>
                    <a class="btn btn-outline-success" href="#" data-auth-open="sign-up">Register</a>
                    <a class="btn btn-outline-danger" href="#" data-auth-open="get-started">Get Started</a>
                @endauth
            </div>
        </div>
    </nav>
</header>
