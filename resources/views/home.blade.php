@extends('layouts.app')

@section('title', 'FINANIC Business Consultants - Income Tax, Sales Tax, Withholding Tax & Litigation | Faisalabad')

@section('content')
    <!-- Top Banner -->
    <div class="banner-area">
        <div class="banner banner-slider-active banner--animated-content">
            <div class="banner__single bg-image--1" data-black-overlay="6">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                             <div class="banner__single bg-image--2" data-black-overlay="6">
                <div class="container">
                    <div class="row justify-content-left">
                        <div class="col-lg-9">
                            <div class="banner__single__content">
                                <h1 class="mt-">FINANIC Business Consultants
                                    <span class="color--theme">Your Outsource Office.</span></h1>
                                    <p class="pr-5">Income tax, sales tax, withholding tax, and litigation support for traders, salaried persons, shopkeepers, SMEs and growing businesses across Faisalabad.</p>
                                <div class="d-flex flex-wrap gap-3 mt-3">
                                    <a href="{{ url('/contact') }}" class="cr-btn"><span>Talk to a Consultant</span></a>
                                    <a href="{{ url('/pricing') }}" class="cr-btn cr-btn--transparent"><span>Tax Compliance Planner</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="logos-band">
        <div class="logos-label">
            Serving clients across
        </div>
        <div class="marquee-track">
            <div class="logo-chip">Distribution</div>
            <div class="logo-chip">Transport</div>
            <div class="logo-chip">Pharmaceuticals</div>
            <div class="logo-chip">Services</div>
            <div class="logo-chip">FMCG</div>
            <div class="logo-chip">Cement</div>
            <div class="logo-chip">Traders &amp; Shopkeepers</div>
            <div class="logo-chip">Salaried Individuals</div>
            <div class="logo-chip">Distribution</div>
            <div class="logo-chip">Transport</div>
            <div class="logo-chip">Pharmaceuticals</div>
            <div class="logo-chip">Services</div>
            <div class="logo-chip">FMCG</div>
            <div class="logo-chip">Cement</div>
            <div class="logo-chip">Traders &amp; Shopkeepers</div>
            <div class="logo-chip">Salaried Individuals</div>
        </div>
    </div>
    <!-- //Top Banner -->

    <!-- Page Content -->
    <div class="page-content">
        <!-- About Area -->
        <section id="about-area" class="cr-section about-area bg--white">
            <div class="container">
                <div class="about-area__inside">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="about-area__content">
                                <div class="sec-tag">Services</div>
                                <h3 class="cd-headline cx-heading slide">Everything tax, in one place.</h3>
                                <p>From FBR registration to tax litigation — our consultants handle income tax, sales tax, withholding tax and representation, fully managed for individuals, SMEs and corporate groups.</p>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="about-area__image">
                                <img class="wow slideInLeft" data-wow-delay="0" src="{{ asset('assets/images/about/about-thumbnail.webp') }}" alt="FINANIC tax consultants at work">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- //About Area -->

        @php
            $serviceCards = [
                ['icon' => 'fa-user-o', 'title' => 'Income Tax Services', 'text' => 'Registration, annual return filing, and FBR notice/audit response for individuals, AOPs and companies.', 'url' => route('services.personal')],
                ['icon' => 'fa-file-text-o', 'title' => 'Sales Tax Services', 'text' => 'Sales tax registration, monthly return filing, audits and refunds kept current and defensible.', 'url' => route('services.gst')],
                ['icon' => 'fa-balance-scale', 'title' => 'Withholding Tax Services', 'text' => 'Withhold correctly, file statements on time, and respond effectively to default notices.', 'url' => route('services.family')],
                ['icon' => 'fa-gavel', 'title' => 'Tax Litigation & Representation', 'text' => 'Representation from the assessing officer through the Appellate Tribunal and the High Court.', 'url' => route('services.business')],
                ['icon' => 'fa-building-o', 'title' => 'Corporate / Retainer Services', 'text' => 'Consolidated monthly compliance across income tax, sales tax and withholding tax for multi-entity groups.', 'url' => route('services.business-tax')],
                            ];

            $trustCards = [
                ['icon' => 'fa-university', 'title' => 'FBR & Appellate Forum Practice', 'text' => 'Over 10 years of practice before the FBR and appellate forums, from first notice through to the High Court.'],
                ['icon' => 'fa-industry', 'title' => 'Trusted Across Key Sectors', 'text' => 'Trusted by businesses across cement, transport, pharmaceutical, and FMCG sectors, alongside individual traders and shopkeepers.'],
                ['icon' => 'fa-comments-o', 'title' => 'Clear, Practical Advice', 'text' => 'We explain your tax position in the language you\'re comfortable in — not buried in jargon.'],
                ['icon' => 'fa-lock', 'title' => 'Client Confidentiality', 'text' => 'All client information, financial records, and case details are kept strictly confidential.'],
                ['icon' => 'fa-refresh', 'title' => 'One-off or Ongoing Support', 'text' => 'From a single year\'s return filing to an ongoing monthly retainer that combines compliance with representation.'],
                ['icon' => 'fa-map-marker', 'title' => 'Faisalabad-Based, FBR-Focused', 'text' => 'A Faisalabad-based practice built around income tax, sales tax, withholding tax and litigation work.'],
            ];

            $faqs = [
                ['question' => 'What services does FINANIC Business Consultants offer?', 'answer' => 'We provide end-to-end tax support across four areas: income tax, sales tax, withholding tax compliance, and tax litigation/representation. We work with individual traders and shopkeepers on one-off filing needs, and with SMEs and multi-entity corporate groups on ongoing monthly retainer arrangements.'],
                ['question' => 'Do you work with individuals as well as businesses?', 'answer' => 'Yes. We handle salaried individuals, business individuals, associations of persons (AOPs), and companies — from a single trader filing an annual return to a multi-entity group needing consolidated monthly compliance.'],
                ['question' => 'What documents do I need to get started?', 'answer' => 'This depends on the service, but generally includes your CNIC, prior tax returns (if any), bank statements, and relevant business records. Once you get in touch, we provide a checklist specific to your situation.'],
                ['question' => 'Is my information kept confidential?', 'answer' => 'Yes. All client information, financial records, and case details are kept strictly confidential and are never shared or published without your consent.'],
                ['question' => 'Do you offer one-off services, or only ongoing retainers?', 'answer' => 'Both. We handle one-time needs like registration or a single year\'s return filing, as well as ongoing monthly retainer relationships that combine compliance work with representation if a dispute arises.'],
            ];
        @endphp

        <!-- Features Area -->
        <section id="features-area" class="cr-section features-area pf-home-section pf-services-section bg-white">
            <div class="container">
                <div class="row g-4">
                    @foreach ($serviceCards as $service)
                        <div class="col-xl-3 col-md-6">
                            <a class="pf-service-card wow fadeInUp" href="{{ $service['url'] }}">
                                <span class="pf-card-icon"><i class="fa {{ $service['icon'] }}"></i></span>
                                <span class="pf-card-title">{{ $service['title'] }}</span>
                                <span class="pf-card-text">{{ $service['text'] }}</span>
                                <span class="pf-card-link">Learn more <i class="fa fa-angle-right"></i></span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--// Features Area -->

        <!-- Filing Steps Area -->
        <section id="filing-steps-area" class="pf-home-section pf-steps-section">
            <div class="container">
                <div class="pf-section-heading text-center mx-auto">
                    <span class="pf-eyebrow">How it works</span>
                    <h2>Your Outsource Tax Office, in 3 Steps</h2>
                    <p>Share your details, our consultants review your case, and we handle filing or representation with the FBR on your behalf.</p>
                </div>

                <div class="pf-steps row g-4 justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="pf-step-card">
                            <span class="pf-step-number">1</span>
                            <h3>Get in Touch</h3>
                            <p>Tell us about your tax position — income tax, sales tax, withholding, or a dispute you're facing.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="pf-step-card">
                            <span class="pf-step-number">2</span>
                            <h3>Consultant Review</h3>
                            <p>Our team reviews your documents, confirms your obligations, and explains the next steps clearly.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="pf-step-card">
                            <span class="pf-step-number">3</span>
                            <h3>Filed &amp; Represented</h3>
                            <p>We handle filing with FBR or represent you at the relevant forum, keeping you informed throughout.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--// Filing Steps Area -->

        <!-- Trust Area -->
        <section id="trust-area" class="pf-home-section pf-trust-section bg-white">
            <div class="container">
                <div class="pf-section-heading text-center mx-auto">
                    <span class="pf-eyebrow">Why choose us</span>
                    <h2>A Practical Tax Partner, Not Just a Filer</h2>
                    <p>From individual traders to multi-entity corporate groups, we combine FBR compliance expertise with clear, practical advice.</p>
                </div>

                <div class="row g-4 justify-content-center">
                    @foreach ($trustCards as $card)
                        <div class="col-lg-4 col-md-6">
                            <div class="pf-trust-card wow fadeInUp">
                                <span class="pf-card-icon"><i class="fa {{ $card['icon'] }}"></i></span>
                                <h3>{{ $card['title'] }}</h3>
                                <p>{{ $card['text'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--// Trust Area -->

        <!-- Planner Teaser Area -->
        <section id="planner-teaser-area" class="pf-home-section pf-pricing-section">
            <div class="container">
                <div class="pf-cta-panel text-center">
                    <span class="pf-eyebrow">Never miss a deadline</span>
                    <h2>Tax Compliance Planner</h2>
                    <p>Get a personalized filing-deadline calendar built around your taxpayer type, registrations and sector — plus reminders ahead of each due date.</p>
                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center mt-3">
                        <a href="{{ url('/pricing') }}" class="btn pf-cta-primary">Start Planner</a>
                    </div>
                </div>
            </div>
        </section>
        <!--// Planner Teaser Area -->

        <!-- FAQ Area -->
        <section id="faq-area" class="pf-home-section pf-faq-section">
            <div class="container">
                <div class="pf-section-heading text-center mx-auto">
                    <span class="pf-eyebrow">Have questions?</span>
                    <h2>Answers to Your Most Asked Tax Questions</h2>
                </div>

                <div class="pf-faq mx-auto" id="homepageFaq">
                    @foreach ($faqs as $index => $faq)
                        <details class="pf-faq-item" {{ $index === 0 ? 'open' : '' }}>
                            <summary>{{ $faq['question'] }}</summary>
                            <div class="pf-faq-answer">
                                {{ $faq['answer'] }}
                            </div>
                        </details>
                    @endforeach
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('faq') }}" class="pf-link-button">See all FAQs <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </section>
        <!--// FAQ Area -->

        <!-- Call To Action Area -->
        <section id="cta-area" class="pf-cta-section">
            <div class="container">
                <div class="pf-cta-panel text-center">
                    <h2>Ready to Simplify Your Tax Compliance?</h2>
                    <p>Whether it's a single return, ongoing retainer, or a dispute with the FBR — talk to a FINANIC consultant today.</p>
                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                        <a href="{{ url('/contact') }}" class="btn pf-cta-primary">Talk to a Consultant</a>
                        <a href="https://wa.me/923XXXXXXXXX" class="btn pf-cta-secondary" target="_blank" rel="noopener"><i class="fa fa-whatsapp"></i> Message on WhatsApp</a>
                    </div>
                </div>
            </div>
        </section>
        <!--// Call To Action Area -->
    </div>
    <!-- //Page Content -->
@endsection
