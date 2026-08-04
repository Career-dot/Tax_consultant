@extends('layouts.app')

@section('title', 'About Us - FINANIC Business Consultants')
@section('meta_description', 'FINANIC Business Consultants is a Faisalabad-based tax consultancy serving individual traders, shopkeepers, and multi-entity business groups since 2015.')

@section('content')
    @php
        $values = [
            ['icon' => 'fa-check-square-o', 'title' => 'Integrity', 'text' => 'We never compromise on accuracy or compliance. Every filing we submit is legally correct and in full compliance with FBR regulations.'],
            ['icon' => 'fa-eye', 'title' => 'Transparency', 'text' => 'We communicate all fees, timelines, and service details clearly and upfront, with no hidden charges.'],
            ['icon' => 'fa-clock-o', 'title' => 'Accessibility', 'text' => 'We believe every client deserves access to professional tax services, explained in the language they are comfortable in.'],
            ['icon' => 'fa-graduation-cap', 'title' => 'Excellence', 'text' => 'We hold ourselves to the highest professional standards, and our processes are continuously improved.'],
        ];

        $services = [
            ['icon' => 'fa-user-o', 'title' => 'Income Tax Services', 'text' => 'Registration and annual return filing to responding to FBR notices and audit proceedings, for individuals, AOPs, and companies.', 'url' => route('services.personal')],
            ['icon' => 'fa-file-text-o', 'title' => 'Sales Tax Services', 'text' => 'Sales tax registration to monthly return filing, audits, and refunds — kept current and defensible.', 'url' => route('services.gst')],
            ['icon' => 'fa-balance-scale', 'title' => 'Withholding Tax Services', 'text' => 'Withhold correctly, file statements on time, and respond effectively to withholding default notices.', 'url' => route('services.family')],
            ['icon' => 'fa-gavel', 'title' => 'Tax Litigation & Representation', 'text' => 'Representation at every forum, from the assessing officer through to the Appellate Tribunal and the High Court.', 'url' => route('services.business')],
            ['icon' => 'fa-building-o', 'title' => 'Corporate / Retainer Services', 'text' => 'Consolidated monthly compliance for multi-entity groups across income tax, sales tax and withholding tax.', 'url' => route('services.business-tax')],
            ['icon' => 'fa-comments-o', 'title' => 'Tax Consultancy', 'text' => 'Professional advice on notices, planning, and annual compliance, explained in plain terms.', 'url' => url('/contact')],
        ];

        $facts = [
            ['number' => '2015', 'label' => 'Established in Faisalabad'],
            ['number' => '4', 'label' => 'Practice Areas'],
            ['number' => '4', 'label' => 'Forums of Representation'],
            ['number' => '6+', 'label' => 'Sectors Served'],
        ];

        $forums = [
            'Regional Tax Office',
            'Commissioner Inland Revenue (Appeals)',
            'Appellate Tribunal Inland Revenue',
            'High Court',
        ];

        $industries = [
            ['icon' => 'fa-cube', 'title' => 'Cement & Distribution'],
            ['icon' => 'fa-truck', 'title' => 'Transport'],
            ['icon' => 'fa-medkit', 'title' => 'Pharmaceuticals'],
            ['icon' => 'fa-cogs', 'title' => 'Services'],
            ['icon' => 'fa-shopping-basket', 'title' => 'FMCG'],
            ['icon' => 'fa-shopping-bag', 'title' => 'Individual Traders & Shopkeepers'],
        ];

        $process = [
            ['icon' => 'fa-comments-o', 'title' => 'Consultation', 'text' => 'We understand your income profile, business structure and filing requirements.'],
            ['icon' => 'fa-folder-open-o', 'title' => 'Document Collection', 'text' => 'Our team shares a clear checklist and organizes the required records.'],
            ['icon' => 'fa-calculator', 'title' => 'Preparation & Review', 'text' => 'Your return or response is prepared and reviewed for accuracy and compliance.'],
            ['icon' => 'fa-paper-plane-o', 'title' => 'Submission', 'text' => 'We file with FBR or the relevant forum, and share acknowledgement for your records.'],
            ['icon' => 'fa-life-ring', 'title' => 'Ongoing Support', 'text' => 'Post-filing support is available for ATL tracking, notices, and future compliance.'],
            ['icon' => 'fa-gavel', 'title' => 'Representation', 'text' => 'If a dispute arises, we represent you at every stage of the appellate process.'],
        ];
    @endphp

    <div class="cr-breadcrumb-area section-padding--md">
        <div class="container">
            <div class="cr-breadcrumb ">
                <h1>Faisalabad's Trusted <span>FINANIC Business Consultants</span> — Your Outsource Office</h1>
                <p>Income tax, sales tax, withholding tax compliance and advisory, and tax litigation/representation under the FBR framework — explained in the language you're comfortable in.</p>
            </div>
        </div>
    </div>

    <div class="page-content about-page">
        <section class="about-intro-area section-padding--xlg bg--white">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="about-image-frame wow slideInLeft">
                            <img src="{{ asset('assets/images/about/about-thumbnail.webp') }}" alt="FINANIC Business Consultants team at work">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="section-title no-padding">
                            <h4>ABOUT THE PRACTICE</h4>
                            <h2>Your <span class="color--theme">Outsource</span> Tax Office</h2>
                            <p>FINANIC Business Consultants is a Faisalabad-based tax consultancy serving individual traders, shopkeepers, and multi-entity business groups. Our practice covers income tax, sales tax, and withholding tax compliance, along with representation in tax litigation.</p>
                        </div>
                        <div class="about-mission-grid">
                            <article>
                                <span><i class="fa fa-bullseye"></i></span>
                                <h3>Who We Serve</h3>
                                <p>Individual traders and shopkeepers, salaried individuals, SMEs, and multi-entity corporate groups across sectors such as distribution, transport, pharmaceuticals, services, and FMCG.</p>
                            </article>
                            <article>
                                <span><i class="fa fa-eye"></i></span>
                                <h3>Where We Represent You</h3>
                                <p>{{ implode(', ', $forums) }}.</p>
                            </article>
                        </div>
                        <a href="{{ url('/contact') }}" class="cr-btn"><span>Talk to a Consultant</span></a>
                    </div>
                </div>
            </div>
        </section>

        <section class="about-feature-area section-padding--xlg bg--grey--light">
            <div class="container">
                <div class="section-title text-center">
                    <h2>Our <span class="color--theme">Firm History</span></h2>
                    <p>FINANIC Business Consultants was established in 2015 in Faisalabad with a clear purpose: to give clients straightforward, practical tax advice explained in the language they're comfortable in. Since then, the firm has grown from serving individual traders and shopkeepers in Faisalabad's local markets into a full-service tax practice trusted by SMEs and corporate clients alike — handling income tax, sales tax, and withholding tax compliance, along with representation before the Regional Tax Office, the Commissioner Inland Revenue (Appeals), the Appellate Tribunal Inland Revenue, and the High Court. Today, FINANIC Business Consultants works with a wide client base spanning individual traders, growing SMEs, and multi-entity corporate groups across sectors including cement distribution, transport, pharmaceuticals, and FMCG. Whatever the size of the client, the same principle from 2015 still holds: tax advice should be clear, practical, and explained in plain terms — not buried in jargon.</p>
                </div>
            </div>
        </section>

        <section class="about-services-area section-padding--xlg bg--white">
            <div class="container">
                <div class="section-title text-center">
                     <h2>What We <span class="color--theme">Do</span></h2>
                       <p>Our practice covers four core areas of FBR compliance and representation, plus consolidated retainer support for multi-entity groups.</p>
                </div>

                <div class="row g-4">
                    @foreach ($services as $service)
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ $service['url'] }}" class="about-feature-card wow fadeInUp d-block">
                                <span><i class="fa {{ $service['icon'] }}"></i></span>
                                <h3>{{ $service['title'] }}</h3>
                                <p>{{ $service['text'] }}</p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="funfact-area bg--grey--light section-padding--lg">
            <div class="container">
                <div class="row funfacts">
                    @foreach ($facts as $fact)
                        <div class="col-lg-3 col-sm-6">
                            <div class="funfact text-center about-stat-box">
                                <h2><span class="counter">{{ $fact['number'] }}</span></h2>
                                <h5>{{ $fact['label'] }}</h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="about-values-area section-padding--xlg bg--white">
            <div class="container">
                <div class="section-title text-center">
                    <h4>OUR PRINCIPLES</h4>
                    <h2>The Values That <span class="color--theme">Drive Us</span></h2>
                </div>

                <div class="row g-4">
                   @foreach ($values as $item)
                        <div class="col-md-6">
                            <article class="about-feature-card wow fadeInUp">
                                <span><i class="fa {{ $item['icon'] }}"></i></span>
                                <h3>{{ $item['title'] }}</h3>
                                <p>{{ $item['text'] }}</p>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="about-industries-area section-padding--xlg bg--grey--light">
            <div class="container">
                <div class="section-title text-center">
                    <h4>INDUSTRIES WE SERVE</h4>
                    <h2>Client Sectors We <span class="color--theme">Work With</span></h2>
                    <p>From individual traders and shopkeepers to multi-entity corporate groups, across a range of sectors.</p>
                </div>

                <div class="row g-4">
                    @foreach ($industries as $industry)
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ route('industries') }}" class="about-feature-card wow fadeInUp text-center d-block">
                                <span><i class="fa {{ $industry['icon'] }}"></i></span>
                                <h3>{{ $industry['title'] }}</h3>
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('industries') }}" class="cr-btn"><span>Explore Industries We Serve</span></a>
                </div>
            </div>
        </section>

        <section class="about-process-area section-padding--xlg bg--white">
            <div class="container">
                <div class="section-title text-center">
                    <h4>OUR PROCESS</h4>
                    <h2>From Consultation To <span class="color--theme">Representation</span></h2>
                </div>

                <div class="row g-4">
                    @foreach ($process as $step)
                        <div class="col-lg-4 col-md-6">
                            <article class="about-process-card wow fadeInUp">
                                <span><i class="fa {{ $step['icon'] }}"></i></span>
                                <h3>{{ $step['title'] }}</h3>
                                <p>{{ $step['text'] }}</p>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="cta-area section-padding--sm pf-cta-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="calltoaction text-center">
                            <h3>Ready To Simplify Your <span class="color--theme">Tax Compliance?</span></h3>
                            <p>Start with a consultant-led process that keeps your income tax, sales tax and withholding tax compliance simple, secure and professionally handled.</p>
                            <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                                <a href="{{ url('/contact') }}" class="cr-btn"><span>Get Started</span></a>
                                <a href="{{ url('/contact') }}" class="cr-btn cr-btn--transparent"><span>Contact Us</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
