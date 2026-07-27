@extends('layouts.app')

@section('title', 'Personal Tax Filing | Tax Consultant')
@section('meta_description', 'File your personal income tax return in Pakistan online with CA-reviewed support, transparent pricing, document upload, FBR submission, and post-filing guidance.')
@section('body_class', 'pf-service-body')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/family-tax/personal-tax.css') }}">
@endpush

@php
    $heroBadges = [
        ['icon' => 'fa-money', 'label' => 'From Rs 999'],
        ['icon' => 'fa-clock-o', 'label' => '1-3 Working Days'],
        ['icon' => 'fa-check-circle-o', 'label' => 'CA Reviewed'],
        ['icon' => 'fa-lock', 'label' => '100% Online'],
    ];

    $audiences = [
        ['icon' => 'fa-university', 'title' => 'Government Employees', 'text' => 'Federal, provincial, armed forces, education, health, and public-sector employees.'],
        ['icon' => 'fa-briefcase', 'title' => 'Private Employees', 'text' => 'Corporate teams, bank staff, multinational employees, managers, and executives.'],
        ['icon' => 'fa-graduation-cap', 'title' => 'Teachers & Researchers', 'text' => 'School, college, university, and research professionals with salary income.'],
        ['icon' => 'fa-files-o', 'title' => 'Multiple Income Sources', 'text' => 'Salary plus rent, freelance income, commission, profit, capital gains, or investments.'],
        ['icon' => 'fa-globe', 'title' => 'Overseas Pakistanis', 'text' => 'Non-resident Pakistanis with assets, property, bank accounts, or income in Pakistan.'],
        ['icon' => 'fa-laptop', 'title' => 'Freelancers', 'text' => 'Independent contractors and digital professionals working locally or internationally.'],
    ];

    $includedItems = [
        'Preparation and submission of your annual income tax return through FBR IRIS.',
        'Income calculation across salary, rent, freelance, investment, and other sources.',
        'Tax deducted, advance tax, and withholding tax reconciliation.',
        'Eligible deductions, credits, Zakat, charitable contribution, and pension review.',
        'Wealth statement preparation and asset/liability reconciliation where required.',
        'FBR acknowledgment receipt and filing confirmation after submission.',
        'Basic post-filing support for FBR questions within 30 days.',
    ];

    $documents = [
        'CNIC front and back copy.',
        'Latest salary slips or salary certificate from employer.',
        'Bank statements for the relevant tax year.',
        'Employment certificate or employer tax deduction certificate.',
        'Rental income details, rent agreements, and receipts if applicable.',
        'Foreign remittance or freelance income proof if applicable.',
        'Zakat, donation, pension, or investment certificates.',
        'Property ownership documents for owned property.',
        'Vehicle registration documents for owned vehicles.',
        'Any FBR notices or previous return acknowledgments.',
    ];

    $process = [
        'Choose your filing method and place your order.',
        'Submit your CNIC, income details, and required documents.',
        'Our tax consultant reviews income, deductions, tax credits, and wealth details.',
        'A CA reviewer checks the return for accuracy and compliance where selected.',
        'Your return is submitted on the FBR IRIS portal.',
        'You receive acknowledgment, filing record, and next-step guidance.',
    ];

    $faqs = [
        ['question' => 'Who is required to file a personal income tax return in Pakistan?', 'answer' => 'Individuals earning taxable income, owning certain assets, running a business, receiving rent, freelancing, or needing Active Taxpayer List status should file. Even when tax is deducted by an employer, annual return filing is still a separate compliance step.'],
        ['question' => 'Can I file if my employer already deducts salary tax?', 'answer' => 'Yes. Employer deduction is withholding tax. Filing the annual return reconciles your income, deductions, taxes paid, assets, and wealth statement with FBR records.'],
        ['question' => 'What if I have salary from two employers in one year?', 'answer' => 'You can still file. We combine both income records, reconcile tax deductions from each employer, and calculate any additional tax or refund position.'],
        ['question' => 'Do I need to visit your office or FBR?', 'answer' => 'No. The process is designed to be completed online. You can share documents digitally and our team handles preparation, review, and submission.'],
        ['question' => 'How long does personal tax filing take?', 'answer' => 'Most straightforward cases are completed within 1-3 working days after documents are complete. Complex cases involving multiple income sources, assets, or notices may take longer.'],
    ];
@endphp

@section('content')
    <div class="pf-service-page personal-tax-page">
        <section class="page-hero hero-green personal-hero" aria-labelledby="personal-hero-title">
            <div class="container">
                <!-- <nav class="breadcrumb-eyebrow" aria-label="Breadcrumb">
                    <a href="{{ route('home') }}">Home</a>
                    <span aria-hidden="true">/</span>
                    <span>Services</span>
                    <span aria-hidden="true">/</span>
                    <span>Personal Tax Filing</span>
                </nav> -->

                <span class="hero-eyebrow">Personal Tax Filing</span>
                <h1 id="personal-hero-title">Personal Income Tax Filing: Fast, Accurate &amp; CA-Reviewed</h1>
                <p class="lead-text">
                    File your annual FBR income tax return online without office visits. Our qualified tax consultants prepare,
                    review, and submit your return accurately while helping you claim eligible deductions and stay active with FBR.
                </p>

                <div class="personal-hero-actions">
                    <a href="{{ route('contact') }}" class="btn-hero-primary">Start Personal Tax Filing <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    <a href="#personal-pricing" class="btn-hero-secondary">View Pricing</a>
                </div>

                <ul class="hero-badges" role="list">
                    @foreach ($heroBadges as $badge)
                        <li class="hero-badge"><i class="fa {{ $badge['icon'] }}" aria-hidden="true"></i>{{ $badge['label'] }}</li>
                    @endforeach
                </ul>
            </div>
        </section>

        <section class="section-padding-white personal-platform" aria-labelledby="platform-title">
            <div class="container">
                <div class="section-header-center">
                    <span class="section-eyebrow">Platform Preview</span>
                    <h2 id="platform-title" class="section-heading">See How It Works on Our Platform</h2>
                    <p class="section-intro">Choose guided online filing or fully managed document upload. Both paths keep the process simple, secure, and consultant-reviewed.</p>
                </div>

                <div class="personal-platform-grid">
                    <article class="personal-browser-card">
                        <h3>Online Filing Method</h3>
                        <div class="personal-browser">
                            <div class="personal-browser-bar">
                                <span class="browser-dot dot-red"></span>
                                <span class="browser-dot dot-yellow"></span>
                                <span class="browser-dot dot-green"></span>
                                <span class="personal-browser-title">Tax Consultant Dashboard</span>
                            </div>
                            <div class="personal-dashboard-head">
                                <div>
                                    <strong>Personal Tax Filing</strong>
                                    <small>Guided return preparation</small>
                                </div>
                                <span class="personal-pill">Self Guided</span>
                            </div>
                            <div class="personal-progress" aria-hidden="true">
                                <span class="active">Personal Info</span>
                                <span>Income</span>
                                <span>Tax Credits</span>
                                <span>Wealth</span>
                            </div>
                            <div class="personal-form-preview">
                                <h4>Basic Information</h4>
                                <div class="personal-form-grid">
                                    <span>Full Name</span>
                                    <span>Email Address</span>
                                    <span>CNIC Number</span>
                                    <span>Mobile Number</span>
                                    <span>Tax Year</span>
                                    <span>Nationality</span>
                                </div>
                            </div>
                        </div>
                    </article>

                    <article class="personal-browser-card">
                        <h3>Document Upload Method</h3>
                        <div class="personal-browser">
                            <div class="personal-browser-bar">
                                <span class="browser-dot dot-red"></span>
                                <span class="browser-dot dot-yellow"></span>
                                <span class="browser-dot dot-green"></span>
                                <span class="personal-browser-title">Tax Consultant Dashboard</span>
                            </div>
                            <div class="personal-dashboard-head">
                                <div>
                                    <strong>Managed Filing</strong>
                                    <small>Upload once, we handle the return</small>
                                </div>
                                <span class="personal-pill">Expert Managed</span>
                            </div>
                            <div class="personal-upload-preview">
                                <div><i class="fa fa-cloud-upload" aria-hidden="true"></i><strong>Upload Documents</strong></div>
                                <span>CNIC, salary certificate, bank statements, assets, and tax deduction records.</span>
                            </div>
                            <ul class="personal-upload-list">
                                <li>Consultant checklist</li>
                                <li>Return preparation</li>
                                <li>FBR submission</li>
                            </ul>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section class="section-padding-bg" aria-labelledby="who-title">
            <div class="container">
                <div class="section-header-center">
                    <h2 id="who-title" class="section-heading">Who Should File a Personal Tax Return?</h2>
                    <p class="section-intro">Filing keeps your FBR record compliant and can reduce withholding tax on banking, property, vehicle, and investment transactions.</p>
                </div>

                <div class="personal-card-grid">
                    @foreach ($audiences as $audience)
                        <article class="personal-info-card">
                            <span class="personal-card-icon"><i class="fa {{ $audience['icon'] }}" aria-hidden="true"></i></span>
                            <h3>{{ $audience['title'] }}</h3>
                            <p>{{ $audience['text'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>


        <section class="section-padding-bg" aria-labelledby="method-title">
            <div class="container">
                <div class="section-header-center">
                    <h2 id="method-title" class="section-heading">Choose the Filing Method That Works for You</h2>
                </div>

                <div class="personal-method-grid">
                    <article class="personal-method-card is-featured">
                        <span class="personal-tag">Popular</span>
                        <h3>Online Filing with Expert Review</h3>
                        <p>Enter your income details through a guided flow. Our system keeps each step organized, and a consultant reviews your return before submission.</p>
                    </article>
                    <article class="personal-method-card">
                        <h3>Document Upload with Managed Filing</h3>
                        <p>Upload documents and let our team prepare the return for you. Ideal for busy professionals, multiple income sources, or first-time filers.</p>
                    </article>
                    <article class="personal-addon">
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <div>
                            <h3>CA Review Add-on</h3>
                            <p>Add a deeper CA review for complex deductions, wealth reconciliation, refund checks, or tax-saving guidance for the next year.</p>
                        </div>
                    </article>
                </div>

            </div>
        </section>

        <section id="personal-pricing" class="section-padding-white" aria-labelledby="pricing-title">
            <div class="container">
                <div class="section-header-center">
                    <span class="section-eyebrow">Transparent Fees</span>
                    <h2 id="pricing-title" class="section-heading">Simple, Transparent Pricing</h2>
                </div>

                <div class="personal-pricing-grid">
                    <article class="personal-price-card is-featured">
                        <span class="personal-tag">Most Popular</span>
                        <h3>Online Filing</h3>
                        <div class="personal-price-row"><span>Base fee, one income source</span><strong>Rs 999</strong></div>
                        <div class="personal-price-row"><span>More than one income source</span><strong>Rs 1,500</strong></div>
                        <div class="personal-price-row"><span>CA review add-on</span><strong>+ Rs 1,000</strong></div>
                    </article>

                    <article class="personal-price-card">
                        <h3>Document Upload</h3>
                        <div class="personal-price-row"><span>Fully managed filing</span><strong>Rs 3,500</strong></div>
                        <div class="personal-price-row"><span>CA review add-on</span><strong>+ Rs 1,000</strong></div>
                        <div class="personal-price-row"><span>Complex case review</span><strong>Quote</strong></div>
                    </article>
                </div>

                <p class="personal-note">Final fee may vary for notices, prior-year corrections, multiple properties, or incomplete FBR records. You will be informed before work begins.</p>
            </div>
        </section>

        <section class="section-padding-bg" aria-labelledby="documents-title">
            <div class="container">
                <div class="section-header-center">
                    <h2 id="documents-title" class="section-heading">Documents You Will Need</h2>
                </div>

                <ul class="personal-check-list personal-document-grid" role="list">
                    @foreach ($documents as $document)
                        <li><i class="fa fa-check" aria-hidden="true"></i><span>{{ $document }}</span></li>
                    @endforeach
                </ul>
            </div>
        </section>

        <section class="section-padding-white" aria-labelledby="included-title">
            <div class="container">
                <div class="section-header-center">
                    <h2 id="included-title" class="section-heading">What's Included in Your Personal Tax Filing</h2>
                </div>

                <ul class="personal-check-list personal-check-list-narrow personal-document-grid" role="list">
                    @foreach ($includedItems as $item)
                        <li><i class="fa fa-check" aria-hidden="true"></i><span>{{ $item }}</span></li>
                    @endforeach
                </ul>
            </div>
        </section>
        <section class="section-padding-white" aria-labelledby="process-title">
            <div class="container">
                <div class="section-header-center">
                    <h2 id="process-title" class="section-heading">How the Filing Process Works</h2>
                </div>

                <ol class="process-wrapper personal-process-list personal-document-grid" role="list">
                    @foreach ($process as $step)
                        <li class="process-step-row">
                            <span class="process-step-circle">{{ $loop->iteration }}</span>
                            <span class="process-step-text">{{ $step }}</span>
                        </li>
                    @endforeach
                </ol>

                <p class="personal-timeline">Typical timeline: 1-3 working days after complete document submission.</p>
            </div>
        </section>

        <section class="section-padding-bg" aria-labelledby="faq-title">
            <div class="container">
                <div class="section-header-center">
                    <h2 id="faq-title" class="section-heading">Frequently Asked Questions: Personal Tax Filing</h2>
                </div>

                <dl class="faq-list" id="personalFaq">
                    @foreach ($faqs as $faq)
                        <div class="faq-item {{ $loop->first ? 'active' : '' }}">
                            <dt>
                                <button class="faq-question" type="button" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="personal-faq-{{ $loop->iteration }}">
                                    {{ $faq['question'] }}
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </button>
                            </dt>
                            <dd id="personal-faq-{{ $loop->iteration }}" class="faq-answer" role="definition">
                                <p>{{ $faq['answer'] }}</p>
                            </dd>
                        </div>
                    @endforeach
                </dl>
            </div>
        </section>

        <aside class="cta-banner-section" aria-labelledby="personal-cta-title">
            <div class="container">
                <div class="cta-content section-center">
                    <h2 id="personal-cta-title" class="cta-banner-title">Ready to Become a Tax Filer Today?</h2>
                    <p class="cta-banner-desc">Join Pakistanis who file their taxes online with a secure, consultant-reviewed, and affordable process.</p>
                    <div class="cta-buttons">
                        <a href="{{ route('contact') }}" class="btn-cta-light">Start Filing Now <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                        <a href="{{ route('contact') }}" class="btn-cta-outline"><i class="fa fa-comments-o" aria-hidden="true"></i> Talk to an Expert</a>
                    </div>
                </div>
            </div>
        </aside>
    </div>
@endsection
