@extends('layouts.app')

@section('title', 'Tax Consultant')

@section('content')
    <!-- Top Banner -->
    <div class="banner-area">
        <div class="banner banner-slider-active banner--animated-content">
            <div class="banner__single bg-image--1" data-black-overlay="6">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <!-- <div class="banner__single__content">
                                <h1>WORRIED
                                    <span class="color--theme">ABOUT TAX?</span> WE ARE EXPERT IN
                                    <span class="color--theme">TAX</span> SOLUTIONS</h1>
                                <a href="{{ url('/contact') }}" class="cr-btn">
                                    <span>Contact Now</span>
                                </a>
                            </div> -->
                             <div class="banner__single bg-image--2" data-black-overlay="6">
                <div class="container">
                    <div class="row justify-content-left">
                        <div class="col-lg-9">
                            <div class="banner__single__content">
                                <h1 class="mt-">Your
                                    <span class="color--theme">Taxes,</span>filed in
                                    <span class="color--theme">6</span> minutes.</h1>
                                    <p class="pr-5">CA/ACCA consultants handle everything â€” income tax, <br> NTN, GST, business registration, and USA LLC â€” fully <br> online. You answer a few questions; we do the rest.</p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                        </div>
                    </div>
                </div>
            </div>

           

            <!-- <div class="banner__single bg-image--3" data-black-overlay="6">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-8">
                            <div class="banner__single__content">
                                <h1>WORRIED
                                    <span class="color--theme">ABOUT TAX?</span> WE ARE EXPERT IN
                                    <span class="color--theme">TAX</span> SOLUTIONS</h1>
                                <a href="{{ url('/contact') }}" class="cr-btn">
                                    <span>Contact Now</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>

    <div class="logos-band">
        <div class="logos-label">
            Trusted by professionals at
        </div>
        <div class="marquee-track">
            <div class="logo-chip">Engro</div>
            <div class="logo-chip">UBL</div>
            <div class="logo-chip">HBL</div>
            <div class="logo-chip">Meezan Bank</div>
            <div class="logo-chip">Allied Bank</div>
            <div class="logo-chip">Telenor</div>
            <div class="logo-chip">SECP</div>
            <div class="logo-chip">ACCA</div>
            <div class="logo-chip">PSEB</div>
            <div class="logo-chip">AWS</div>
            <div class="logo-chip">Engro</div>
            <div class="logo-chip">UBL</div>
            <div class="logo-chip">HBL</div>
            <div class="logo-chip">Meezan Bank</div>
            <div class="logo-chip">Allied Bank</div>
            <div class="logo-chip">Telenor</div>
            <div class="logo-chip">SECP</div>
            <div class="logo-chip">ACCA</div>
            <div class="logo-chip">PSEB</div>
            <div class="logo-chip">AWS</div>
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
                                <p>From a first NTN to full corporate compliance — our certified professionals handle it all, fully online. </p>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="about-area__image">
                                <img class="wow slideInLeft" data-wow-delay="0" src="{{ asset('assets/images/about/about-thumbnail.webp') }}" alt="about area thumb">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- //About Area -->

        @php
            $serviceCards = [
                ['icon' => 'fa-user-o', 'title' => 'File Your Tax', 'text' => 'Salary, business, freelancer and property tax returns prepared online by tax consultants.', 'url' => url('/services')],
                ['icon' => 'fa-id-card-o', 'title' => 'NTN Registration', 'text' => 'Get registered with FBR and receive your NTN without visiting an office.', 'url' => url('/services')],
                ['icon' => 'fa-building-o', 'title' => 'Business Setup', 'text' => 'Register sole proprietorships, partnerships, companies and keep compliance on track.', 'url' => url('/services')],
                ['icon' => 'fa-bars', 'title' => 'GST Registration', 'text' => 'Sales tax registration, monthly returns and notices handled by specialists.', 'url' => url('/services')],
                ['icon' => 'fa-check-circle-o', 'title' => 'Active Tax Status', 'text' => 'Move onto the ATL and keep your active taxpayer profile updated each year.', 'url' => url('/features')],
                ['icon' => 'fa-calculator', 'title' => 'Tax Calculator', 'text' => 'Estimate salary, business and withholding tax before you file.', 'url' => url('/features')],
                ['icon' => 'fa-home', 'title' => 'Property Taxes', 'text' => 'Capital gains, rent income and property purchase documentation made simple.', 'url' => url('/services')],
                ['icon' => 'fa-globe', 'title' => 'USA LLC Support', 'text' => 'Formation, EIN guidance and bookkeeping support for founders working globally.', 'url' => url('/contact')],
            ];

            $trustCards = [
                ['icon' => 'fa-shield', 'title' => 'CA Certified Expertise', 'text' => 'Your case is reviewed by qualified tax professionals before submission.'],
                ['icon' => 'fa-lock', 'title' => 'Bank-Grade Security', 'text' => 'Documents and personal details are handled through a secure online process.'],
                ['icon' => 'fa-clock-o', 'title' => 'Fast Turnaround Times', 'text' => 'Most salaried returns are prepared quickly after the required details are complete.'],
                ['icon' => 'fa-folder', 'title' => 'Affordable Pricing', 'text' => 'Transparent, flat-fee pricing with no hidden charges. Personal tax filing starts from just Rs 999, the most competitive rate in Pakistan.'],
                ['icon' => 'fa-headphones', 'title' => 'Dedicated Support', 'text' => 'Get real-time support via WhatsApp, email, or phone. Our tax experts are available Monday to Saturday, 9 AM to 6 PM PKT.'],
                ['icon' => 'fa-mobile', 'title' => '100% Online Process', 'text' => 'File from anywhere in Pakistan or abroad. No physical documents needed. Everything is handled digitally through our secure platform.'],
            ];

            $pricingPlans = [
                ['title' => 'Salary Tax Filing', 'price' => 'Starting from Rs 999', 'featured' => true],
                ['title' => 'Business Tax Return', 'price' => 'Starting from Rs 4,000', 'featured' => false],
                ['title' => 'NTN Registration', 'price' => 'Starting from Rs 500', 'featured' => false],
            ];

            $testimonials = [
                ['name' => 'Ayesha Khan', 'role' => 'Salaried Professional', 'image' => 'testimonial-author-1.webp', 'text' => 'The process was clean, quick and easy to understand. My filer status was handled without repeated office visits.'],
                ['name' => 'Hamza Ali', 'role' => 'Business Owner', 'image' => 'testimonial-author-2.webp', 'text' => 'Their consultant explained each document and filed the return on time. The pricing was transparent from the start.'],
                ['name' => 'Sara Niazi', 'role' => 'Freelancer', 'image' => 'testimonial-author-3.webp', 'text' => 'I had foreign income and several questions. The team guided me patiently and kept everything organized online.'],
            ];

            $faqs = [
                ['question' => 'What documents do I need to file my income tax return?', 'answer' => 'For most individuals, you need CNIC, salary certificate or income details, bank statements, tax deduction certificates, property or vehicle details and any expense records relevant to your return.'],
                ['question' => 'Can I become a filer without visiting an FBR office?', 'answer' => 'Yes. Our consultants can help you register your NTN and prepare your return online after collecting the required information.'],
                ['question' => 'How long does it take to file a tax return?', 'answer' => 'Simple salary cases can often be completed quickly once documents are ready. Business, property or notice cases may need more review.'],
                ['question' => 'Do you also handle GST and business registration?', 'answer' => 'Yes. We support GST registration, monthly sales tax returns, company registration and ongoing compliance.'],
                ['question' => 'Is my personal and financial information secure?', 'answer' => 'Yes. We use a controlled process, limit access to your case details and only request information required for filing or registration.'],
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
                    <h2>File Your Taxes in 3 Simple Steps</h2>
                    <p>You answer a few simple questions. Our consultants review your documents, prepare the return and file it with FBR.</p>
                </div>

                <div class="pf-steps row g-4 justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="pf-step-card">
                            <span class="pf-step-number">1</span>
                            <h3>Share Your Details</h3>
                            <p>Choose your tax service and upload the required documents through our online process.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="pf-step-card">
                            <span class="pf-step-number">2</span>
                            <h3>Review With Consultant</h3>
                            <p>A tax expert reviews your case, confirms deductions and prepares an accurate return.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="pf-step-card">
                            <span class="pf-step-number">3</span>
                            <h3>Get Filed With FBR</h3>
                            <p>We submit your return, share acknowledgement and help you track active taxpayer status.</p>
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
                    <h2>Tax Filing Made Simple, Secure & Certified</h2>
                    <p>From first-time filers to growing businesses, we combine tax expertise with a smooth online experience.</p>
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

        <!-- Pricing Area -->
        <section id="pricing-area" class="pf-home-section pf-pricing-section">
            <div class="container">
                <div class="pf-section-heading text-center mx-auto">
                    <span class="pf-eyebrow">Affordable pricing</span>
                    <h2>Honest, Affordable Tax Filing Fees</h2>
                    <p>No surprise costs. Choose the service you need and speak with a consultant before filing.</p>
                </div>

                <div class="row g-4 justify-content-center align-items-stretch">
                    @foreach ($pricingPlans as $plan)
                        <div class="col-lg-3 col-md-4 col-sm-8">
                            <a href="{{ url('/contact') }}" class="pf-price-card {{ $plan['featured'] ? 'is-featured' : '' }}">
                                <span>{{ $plan['title'] }}</span>
                                <strong>{{ $plan['price'] }}</strong>
                                <small>Click to get started</small>
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-4">
                    <a href="{{ url('/services') }}" class="pf-link-button">See all services <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </section>
        <!--// Pricing Area -->

        <!-- Testimonial Area -->
        <section id="testimonial-area" class="pf-home-section pf-testimonial-section bg-white">
            <div class="container">
                <div class="pf-section-heading text-center mx-auto">
                    <span class="pf-eyebrow">Client stories</span>
                    <h2>Trusted by Thousands of Pakistanis</h2>
                    <p>People across Pakistan trust our consultants for income tax, NTN and business compliance.</p>
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
        <!--// Testimonial Area -->

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
                    <a href="{{ url('/contact') }}" class="pf-link-button">Need help? Talk to a consultant <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </section>
        <!--// FAQ Area -->

        <!-- Call To Action Area -->
        <section id="cta-area" class="pf-cta-section">
            <div class="container">
                <div class="pf-cta-panel text-center">
                    <h2>Ready to Become a Tax Filer Today?</h2>
                    <p>Join thousands of Pakistanis who file their taxes online, accurately and on time.</p>
                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                        <a href="{{ url('/contact') }}" class="btn pf-cta-primary">Start Filing Now</a>
                        <a href="{{ url('/contact') }}" class="btn pf-cta-secondary"><i class="fa fa-whatsapp"></i> Talk to a Consultant</a>
                    </div>
                </div>
            </div>
        </section>
        <!--// Call To Action Area -->
    </div>
    <!-- //Page Content -->
@endsection
