@php
    $mainNavigation = [
        ['label' => 'HOME', 'url' => url('/')],
        ['label' => 'Services', 'url' => url('/about')],
        ['label' => 'Calculator', 'url' => url('/features')],
        ['label' => 'Pricing', 'url' => url('/services')],
        ['label' => 'BLOG', 'url' => url('/blogs')],
        ['label' => 'About', 'url' => url('/blogs')],
        ['label' => 'CONTACT', 'url' => url('/contact')],
    ];
@endphp

<header id="header" class="header sticky--header">
    <div class="header__top bg--blue d-none d-lg-block">
        <div class="container">
            <div class="header__top__inner">
                <ul class="header__top__info">
                    <li class="d-flex gap-3 p-2">
                        <a href="tel:01354568787">📅 FBR Deadline: <span class="tb-cd">⏳ <span class="tb-cd-num">75</span> days left</span> <span class="tb-sep">|</span>
  File before Sep 30, 2026 to stay active taxpayer.
  </a>
  <a class="" href="{{ url('/contact') }}">
                        <span> File Now →</span>
                    </a>
                    </li>
                    <!-- <li>
                        <a href="mailto:info@taxco.com"><i class="flaticon-black-back-closed-envelope-shape"></i> career@.com</a>
                    </li> -->
                </ul>
                <div class="">
                    
                </div>
            </div>
        </div>
    </div>

    <div class="header__bottom bg--white">
        <div class="container">
            <div class="header__bottom__inner">
                <div class="header__logo">
                    <a href="{{ url('/') }}" aria-label="Korde home">
                        <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Career Institute">
                    </a>
                </div>

                <nav id="main-navigation" class="header__menu main-navigation d-none d-lg-flex" aria-label="Primary navigation">
                    <ul>
                        @foreach ($mainNavigation as $item)
                            <li>
                                <a href="{{ $item['url'] }}">{{ $item['label'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </nav>

                <div>
                    <a class="btn btn-outline-secondary" href="{{ url('/contact') }}">
                        <span>Sign In</span>
                    </a>
                    <a class="btn btn-outline-success" href="{{ url('/contact') }}">
                        <span>Register</span>
                    </a>
                    <a class="btn btn-outline-danger" href="{{ url('/contact') }}">
                        <span>Get Started</span>
                    </a>
                </div>

                <button class="header__toggle d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu" aria-label="Open navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </div>
</header>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
    <div class="offcanvas-header">
        <div class="offcanvas__logo" id="offcanvasMenuLabel">
            <a href="{{ url('/') }}" aria-label="Korde home">
                <img src="{{ asset('assets/images/logo/logo.png') }}" alt="career institute">
            </a>
        </div>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="offcanvas__info">
            <li>
                <a href="tel:01354568787"><i class="flaticon-old-typical-phone"></i> 01354 568 787</a>
            </li>
            <li>
                <a href="mailto:info@taxco.com"><i class="flaticon-black-back-closed-envelope-shape"></i> info@taxco.com</a>
            </li>
        </ul>

        <nav class="canvas-menu" aria-label="Mobile navigation">
            <ul>
                @foreach ($mainNavigation as $item)
                    <li>
                        <a href="{{ $item['url'] }}">{{ $item['label'] }}</a>
                    </li>
                @endforeach
            </ul>
        </nav>

        <div class="offcanvas__button">
            <a class="cr-btn cr-btn--lg" href="{{ url('/contact') }}">
                <span>Make an appointment</span>
            </a>
        </div>
    </div>
</div>


