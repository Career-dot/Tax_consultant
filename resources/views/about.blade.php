@extends('layouts.app')

@section('title', 'About Us - FINANIC Business Consultants')
@section('meta_description', 'FINANIC Business Consultants is a Faisalabad-based tax consultancy serving individual traders, shopkeepers, and multi-entity business groups since 2015.')

@section('content')
    @php
        $whoWeAre = [
            ['icon' => 'fa-balance-scale', 'text' => 'Expertise in Income Tax, Sales Tax, Withholding Tax, and Tax Litigation.'],
            ['icon' => 'fa-university', 'text' => 'Representation before the Regional Tax Office, Commissioner Inland Revenue (Appeals), Appellate Tribunal Inland Revenue, and the High Court.'],
            ['icon' => 'fa-industry', 'text' => 'Experience across Cement Distribution, Transport, Pharmaceuticals, and FMCG sectors.'],
            ['icon' => 'fa-users', 'text' => 'Serving individual traders, shopkeepers, SMEs, and multi-entity business groups.'],
        ];

        $journey = [
            ['icon' => 'fa-flag', 'title' => 'Founded in 2015', 'text' => 'FINANIC Business Consultants was established in Faisalabad with a clear purpose: straightforward, practical tax advice.'],
            ['icon' => 'fa-line-chart', 'title' => 'Steady, Trusted Growth', 'text' => 'The firm grew through trusted client relationships, from individual traders and shopkeepers in local markets to a wider client base.'],
            ['icon' => 'fa-briefcase', 'title' => 'A Full-Service Practice Today', 'text' => 'A Faisalabad-based practice covering income tax, sales tax, and withholding tax compliance, plus tax litigation representation.'],
            ['icon' => 'fa-handshake-o', 'title' => 'Our Ongoing Commitment', 'text' => 'Practical, transparent, and reliable tax advisory — the same principle the firm was built on in 2015.'],
        ];

        $missionCommitments = [
            ['icon' => 'fa-star', 'label' => 'Professionalism'],
            ['icon' => 'fa-comments-o', 'label' => 'Practical Tax Advice'],
            ['icon' => 'fa-trophy', 'label' => 'Client Success'],
            ['icon' => 'fa-check-square-o', 'label' => 'Compliance'],
            ['icon' => 'fa-handshake-o', 'label' => 'Long-Term Relationships'],
        ];

        $team = [
            ['icon' => 'fa-user', 'role' => 'Senior Tax Consultant', 'focus' => 'Income Tax & Compliance'],
            ['icon' => 'fa-file-text-o', 'role' => 'Sales Tax & Compliance Lead', 'focus' => 'Sales Tax Registration & Filing'],
            ['icon' => 'fa-balance-scale', 'role' => 'Withholding Tax Specialist', 'focus' => 'Withholding Compliance & Defense'],
            ['icon' => 'fa-gavel', 'role' => 'Litigation & Representation', 'focus' => 'FBR & Appellate Forum Practice'],
        ];

        $credentials = [
            ['icon' => 'fa-id-card-o', 'title' => 'FBR Practitioner'],
            ['icon' => 'fa-balance-scale', 'title' => 'Member — Faisalabad Tax Bar Association'],
            ['icon' => 'fa-graduation-cap', 'title' => 'Affiliated with ICAP'],
            ['icon' => 'fa-mortar-board', 'title' => 'Affiliated with PIPFA'],
        ];

        $whyTrustUs = [
            ['icon' => 'fa-user-o', 'title' => 'Experienced Tax Professionals', 'text' => 'A practice built on hands-on experience before the FBR and appellate forums.'],
            ['icon' => 'fa-comments-o', 'title' => 'Practical Business Advice', 'text' => 'Clear, actionable guidance rather than jargon-heavy commentary.'],
            ['icon' => 'fa-industry', 'title' => 'Industry-Specific Expertise', 'text' => 'Experience across cement distribution, transport, pharmaceuticals, and FMCG sectors.'],
            ['icon' => 'fa-eye', 'title' => 'Transparent Communication', 'text' => 'Fees, timelines, and next steps explained clearly and upfront.'],
            ['icon' => 'fa-refresh', 'title' => 'Long-Term Client Relationships', 'text' => 'From a single filing to an ongoing monthly retainer, built on continuity.'],
        ];
    @endphp

    <div class="banner-area section-padding--md">
        <div class="container">
            <div class="cr-breadcrumb">
                <!-- <p class="mb-2"><a href="{{ route('home') }}">Home</a> / About Us</p> -->
                <h1>About <span>FINANIC Business Consultants</span></h1>
                <p>Professional Tax Consultancy &amp; Business Advisory Services in Faisalabad, Pakistan.</p>
            </div>
        </div>
    </div>

    <div class="page-content about-page">
        <!-- Who We Are -->
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
                            <h4>WHO WE ARE</h4>
                            <h2>Your <span class="color--theme">Outsource</span> Tax Office</h2>
                            <p>FINANIC Business Consultants (operating as M/S RS Associates) is a Faisalabad-based tax consultancy serving individual traders, shopkeepers, and multi-entity business groups.</p>
                        </div>
                        <ul class="pf-industry-tag-list">
                            @foreach ($whoWeAre as $item)
                                <li><i class="fa {{ $item['icon'] }}" aria-hidden="true"></i><span>{{ $item['text'] }}</span></li>
                            @endforeach
                        </ul>
                        <a href="{{ url('/contact') }}" class="cr-btn"><span>Talk to a Consultant</span></a>
                    </div>
                </div>
            </div>
        </section>
        <!--// Who We Are -->

        <!-- Our Journey -->
        <section class="about-feature-area section-padding--xlg bg--grey--light">
            <div class="container">
                <div class="section-title text-center">
                    <h4>FIRM HISTORY</h4>
                    <h2>Our <span class="color--theme">Journey</span></h2>
                </div>

                <div class="row g-4">
                    @foreach ($journey as $step)
                        <div class="col-lg-3 col-md-6">
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
        <!--// Our Journey -->

        <!-- Our Mission -->
        <section class="cta-area section-padding--xlg pf-cta-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="calltoaction text-center">
                            <h3>Our <span class="color--theme">Mission</span></h3>
                            <p>To make professional tax compliance simple, practical, and accessible — helping every client, from an individual trader to a multi-entity corporate group, meet their obligations with confidence and clarity.</p>
                        </div>

                        <div class="row g-3 justify-content-center mt-4">
                            @foreach ($missionCommitments as $commitment)
                                <div class="col-6 col-md-auto">
                                    <div class="d-flex flex-column align-items-center text-center gap-2 px-2">
                                        <span class="pf-industry-visual-icon" style="width:56px;height:56px;font-size:22px;"><i class="fa {{ $commitment['icon'] }}"></i></span>
                                        <span style="color:#fff;font-size:13px;font-weight:700;">{{ $commitment['label'] }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--// Our Mission -->

        <!-- Team / Consultants -->
        <section class="advisor-area bg--white section-padding--xlg">
            <div class="container">
                <div class="section-title text-center">
                    <h4>OUR TEAM</h4>
                    <h2>Meet The <span class="color--theme">Consultants</span></h2>
                    <p>Individual profiles will be added here as they are confirmed. The roles below reflect how our practice is structured.</p>
                </div>

                <div class="row g-4">
                    @foreach ($team as $member)
                        <div class="col-lg-3 col-md-6">
                            <article class="about-feature-card wow fadeInUp text-center">
                                <span style="width:64px;height:64px;font-size:26px;"><i class="fa {{ $member['icon'] }}"></i></span>
                                <h3>{{ $member['role'] }}</h3>
                                <p>{{ $member['focus'] }}</p>
                                <p style="margin-top:10px;font-size:12px;text-transform:uppercase;letter-spacing:0.5px;color:#9aa5a1;">Qualification: To be confirmed</p>
                                <p style="font-size:13px;">Full profile will be added soon.</p>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--// Team / Consultants -->

        <!-- Credentials & Registrations -->
        <section class="about-values-area section-padding--xlg bg--grey--light">
            <div class="container">
                <div class="section-title text-center">
                    <h4>CREDENTIALS &amp; REGISTRATIONS</h4>
                    <h2>Professional <span class="color--theme">Standing</span></h2>
                </div>

                <div class="row g-4">
                    @foreach ($credentials as $credential)
                        <div class="col-lg-3 col-md-6">
                            <article class="about-feature-card wow fadeInUp text-center">
                                <span><i class="fa {{ $credential['icon'] }}"></i></span>
                                <h3>{{ $credential['title'] }}</h3>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--// Credentials & Registrations -->

        <!-- Why Clients Trust Us -->
        <section class="about-services-area section-padding--xlg bg--white">
            <div class="container">
                <div class="section-title text-center">
                    <h4>WHY CLIENTS TRUST US</h4>
                    <h2>Built On Trust &amp; <span class="color--theme">Experience</span></h2>
                </div>

                <div class="row g-4">
                    @foreach ($whyTrustUs as $item)
                        <div class="col-lg-4 col-md-6">
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
        <!--// Why Clients Trust Us -->

        <!-- CTA -->
        <section class="cta-area section-padding--sm pf-cta-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="calltoaction text-center">
                            <h3>Let's Simplify Your <span class="color--theme">Tax Matters</span></h3>
                            <p>Whether you're an individual taxpayer, a growing business, or a corporate group, FINANIC Business Consultants is ready to provide practical, reliable, and professional tax solutions.</p>
                            <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                                <a href="{{ url('/contact') }}" class="cr-btn"><span>Book a Consultation</span></a>
                                <a href="{{ url('/contact') }}" class="cr-btn cr-btn--transparent"><span>Contact Us</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--// CTA -->
    </div>
@endsection
