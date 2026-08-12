@extends('layouts.app')

@section('title', 'FINANIC Business Consultants - Income Tax, Sales Tax, Withholding Tax & Litigation | Faisalabad')

@section('content')
    @php
        $plannerDeadline = \Carbon\Carbon::create(2026, 9, 30)->endOfDay();
        $plannerDaysLeft = max(0, (int) floor(now()->diffInDays($plannerDeadline, false)));

        $serviceCards = [
            ['icon' => 'fa-user-o', 'title' => 'Income Tax', 'text' => 'Registration, annual return filing, and FBR notice/audit response for individuals, AOPs and companies.', 'url' => route('services.personal')],
            ['icon' => 'fa-file-text-o', 'title' => 'Sales Tax', 'text' => 'Sales tax registration, monthly return filing, audits and refunds kept current and defensible.', 'url' => route('services.gst')],
            ['icon' => 'fa-balance-scale', 'title' => 'Withholding Tax', 'text' => 'Withhold correctly, file statements on time, and respond effectively to default notices.', 'url' => route('services.family')],
            ['icon' => 'fa-gavel', 'title' => 'Litigation & Representation', 'text' => 'Representation from the assessing officer through the Appellate Tribunal and the High Court.', 'url' => route('services.business')],
            ['icon' => 'fa-building-o', 'title' => 'Corporate Retainer', 'text' => 'Consolidated monthly compliance across income tax, sales tax and withholding tax for multi-entity groups.', 'url' => route('services.business-tax')],
        ];

        $trustStats = [
            ['icon' => 'fa-university', 'number' => '10+', 'label' => 'Years of Professional Experience'],
            ['icon' => 'fa-users', 'number' => '986+', 'label' => 'Clients Served'],
            ['icon' => 'fa-industry', 'number' => '9+', 'label' => 'Business Sectors Served'],
        ];

        $homeIndustries = [
            ['icon' => 'fa-cube', 'name' => 'Cement Distribution'],
            ['icon' => 'fa-truck', 'name' => 'Transport'],
            ['icon' => 'fa-medkit', 'name' => 'Pharmaceuticals'],
            ['icon' => 'fa-shopping-basket', 'name' => 'FMCG'],
        ];

        $testimonials = [
            ['name' => 'Ayesha Khan', 'role' => 'Salaried Professional', 'image' => 'testimonial-author-1.webp', 'text' => 'FINANIC handled my income tax return and explained everything in plain terms. No confusing jargon, just a clear filing process from start to finish.'],
            ['name' => 'Hamza Ali', 'role' => 'Distribution Business Owner', 'image' => 'testimonial-author-2.webp', 'text' => 'Our sales tax compliance and withholding statements are finally on a predictable monthly schedule. Their team stays ahead of every notice.'],
            ['name' => 'Sara Niazi', 'role' => 'AOP Partner', 'image' => 'testimonial-author-3.webp', 'text' => 'When we received an FBR notice, FINANIC prepared a well-documented response and represented us at the hearing. Professional from day one.'],
        ];

        $homeUpdates = [
            ['icon' => 'fa-calendar-check-o', 'badge' => 'General', 'title' => 'FBR Deadline Reminder', 'text' => 'Keep income tax, sales tax and withholding tax deadlines on your radar before they become penalties.', 'url' => url('/pricing')],
            ['icon' => 'fa-file-text-o', 'badge' => 'Income Tax', 'title' => 'Annual Tax Return Filing Guide', 'text' => 'What goes into an annual return, from income reconciliation to your wealth statement.', 'url' => route('services.personal')],
            ['icon' => 'fa-refresh', 'badge' => 'Sales Tax', 'title' => 'Sales Tax Compliance Reminder', 'text' => 'A quick reminder of what a compliant monthly filing routine looks like for registered businesses.', 'url' => route('services.gst')],
        ];
    @endphp

    <!-- Hero -->
    <div class="banner-area">
        <div class="banner banner-slider-active banner--animated-content">
            <div class="banner__single bg-image--2" data-black-overlay="6">
                <div class="container">
                    <div class="row justify-content-left">
                        <div class="col-lg-12">
                            <div class="banner__single__content">
                                <h1 class="mt-">FINANIC Business Consultants
                                    <span class="color--theme">Your Outsource Office.</span></h1>
                                <p class="pr-5">Income tax, sales tax, withholding tax, tax litigation, and corporate tax consultancy for traders, salaried individuals, shopkeepers, SMEs and growing businesses across Faisalabad.</p>
                                <div class="d-flex flex-wrap gap-3 mt-3">
                                    <a href="https://wa.me/923222244000" class="cr-btn" target="_blank" rel="noopener"><span><i class="fa fa-whatsapp"></i> WhatsApp Us</span></a>
                                    <a href="tel:+923222244000" class="cr-btn cr-btn--transparent"><span><i class="fa fa-phone"></i> Call Now</span></a>
                                    <a href="{{ route('book.consultation') }}" class="cr-btn cr-btn--transparent"><span>Book a Consultation</span></a>
                                    <a href="{{ url('/planner') }}" class="cr-btn cr-btn--transparent"><span>Check Your Filing Deadlines</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //Hero -->

    <!-- Page Content -->
    <div class="page-content">
        <!-- Services Overview -->
        <section id="features-area" class="cr-section features-area pf-home-section pf-services-section bg-white">
            <div class="container">
                <div class="pf-section-heading text-center mx-auto">
                    <span class="pf-eyebrow">What we do</span>
                    <h2>Services Overview</h2>
                </div>

                <div class="row g-4">
                    @foreach ($serviceCards as $service)
                        <div class="col-xl-4 col-md-6">
                            <a class="pf-service-card wow fadeInUp" href="{{ $service['url'] }}">
                                <span class="pf-card-icon"><i class="fa {{ $service['icon'] }}"></i></span>
                                <span class="pf-card-title">{{ $service['title'] }}</span>
                                <span class="pf-card-text">{{ $service['text'] }}</span>
                                <span class="pf-card-link">Learn More <i class="fa fa-angle-right"></i></span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--// Services Overview -->

        <!-- Why Choose Us -->
        <section id="trust-area" class="pf-home-section pf-trust-section bg-white">
            <div class="container">
                <div class="pf-section-heading text-center mx-auto">
                    <span class="pf-eyebrow">Why choose us</span>
                    <h2>Why Choose FINANIC Business Consultants</h2>
                </div>

                <div class="row funfacts g-4 justify-content-center">
                    @foreach ($trustStats as $stat)
                        <div class="col-lg-4 col-sm-6">
                            <div class="funfact text-center about-stat-box">
                                <span class="pf-card-icon"><i class="fa {{ $stat['icon'] }}"></i></span>
                                <h2><span class="counter">{{ $stat['number'] }}</span></h2>
                                <h6 class="text-white">{{ $stat['label'] }}</h6>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--// Why Choose Us -->

        <!-- Industries We Serve -->
        <section id="industries-strip-area" class="pf-home-section pf-industries-strip-section bg--grey--light">
            <div class="container">
                <div class="pf-section-heading text-center mx-auto">
                    <span class="pf-eyebrow">Who we work with</span>
                    <h2>Industries We Serve</h2>
                </div>

                <div class="row g-4 justify-content-center text-center">
                    @foreach ($homeIndustries as $industry)
                        <div class="col-6 col-md-3">
                            <a href="{{ route('industries') }}" class="pf-service-card wow fadeInUp d-block text-center">
                                <span class="pf-card-icon mx-auto"><i class="fa {{ $industry['icon'] }}"></i></span>
                                <span class="pf-card-title">{{ $industry['name'] }}</span>
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('industries') }}" class="pf-link-button">See all industries we serve <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </section>
        <!--// Industries We Serve -->

        <!-- Tax Compliance Planner Teaser -->
        <section id="planner-teaser-area" class="pf-home-section pf-pricing-section">
            <div class="container">
                <div class="pf-cta-panel text-center">
                    <span class="pf-eyebrow">Never miss a deadline</span>
                    <h2>Your Next Filing Deadline</h2>
                    <p>Your next filing deadline is in <strong>{{ $plannerDaysLeft }} days</strong>. Get a personalized filing-deadline calendar built around your taxpayer type, registrations and sector.</p>
                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center mt-3">
                        <a href="{{ url('/planner') }}" class="btn pf-cta-primary">Open Planner</a>
                    </div>
                </div>
            </div>
        </section>
        <!--// Tax Compliance Planner Teaser -->

        <!-- Client Testimonials -->
        <section id="testimonial-area" class="pf-home-section pf-testimonial-section bg-white">
            <div class="container">
                <div class="pf-section-heading text-center mx-auto">
                    <span class="pf-eyebrow">Client stories</span>
                    <h2>Client Testimonials</h2>
                    <p>Placeholder testimonials shown until official client feedback is provided.</p>
                </div>

                <div class="row g-4">
                    @foreach ($testimonials as $testimonial)
                        <div class="col-lg-4 col-md-6">
                            <article class="pf-testimonial-card">
                                <p>{{ $testimonial['text'] }}</p>
                                <div class="pf-testimonial-author">
                                    <img src="{{ asset('assets/images/testimonial/' . $testimonial['image']) }}" alt="{{ $testimonial['name'] }}">
                                    <div>
                                        <h3>{{ $testimonial['name'] }}</h3>
                                        <span>{{ $testimonial['role'] }}</span>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--// Client Testimonials -->

        <!-- Latest Tax Updates -->
        <div class="pf-service-page">
            <section id="updates-area" class="pf-home-section section-light" aria-labelledby="updates-title">
                <div class="container">
                    <div class="pf-section-heading text-center mx-auto">
                        <span class="pf-eyebrow">Stay informed</span>
                        <h2 id="updates-title">Latest Tax Updates</h2>
                    </div>

                    <div class="resource-article-grid">
                        @foreach ($homeUpdates as $update)
                            <article class="resource-article-card">
                                <div class="resource-thumb"><i class="fa {{ $update['icon'] }}" aria-hidden="true"></i></div>
                                <div class="resource-article-body">
                                    <span class="resource-badge">{{ $update['badge'] }}</span>
                                    <h3>{{ $update['title'] }}</h3>
                                    <p>{{ $update['text'] }}</p>
                                    <a href="{{ $update['url'] }}" class="resource-read-more">Read More <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ route('resources') }}" class="pf-link-button">View all tax updates <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </section>
        </div>
        <!--// Latest Tax Updates -->
    </div>
    <!-- //Page Content -->
@endsection
