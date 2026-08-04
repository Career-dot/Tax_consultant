@extends('layouts.app')

@section('title', 'Income Tax Services | FINANIC Business Consultants')
@section('meta_description', 'Income tax registration, annual return filing, FBR notice and audit response for individuals, associations of persons, and companies in Faisalabad.')
@section('body_class', 'pf-service-body')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/family-tax/personal-tax.css') }}">
@endpush

@php
    $heroBadges = [
        ['icon' => 'fa-check-circle-o', 'label' => 'Consultant Reviewed'],
        ['icon' => 'fa-lock', 'label' => 'Confidential Handling'],
        ['icon' => 'fa-university', 'label' => 'FBR Registered Practice'],
        ['icon' => 'fa-globe', 'label' => 'Faisalabad Based'],
    ];

    $audiences = [
        ['icon' => 'fa-user-o', 'title' => 'Salaried Individuals', 'text' => 'Government, private sector, and multinational employees with salary income.'],
        ['icon' => 'fa-shopping-bag', 'title' => 'Individual Traders & Shopkeepers', 'text' => 'Sole proprietors and shopkeepers filing income tax on business income.'],
        ['icon' => 'fa-users', 'title' => 'Associations of Persons (AOPs)', 'text' => 'Partnership firms and AOPs with joint income tax obligations.'],
        ['icon' => 'fa-building-o', 'title' => 'Companies', 'text' => 'Registered companies with corporate income tax filing requirements.'],
        ['icon' => 'fa-files-o', 'title' => 'Multiple Income Sources', 'text' => 'Salary plus rent, business, or investment income requiring reconciliation.'],
        ['icon' => 'fa-globe', 'title' => 'Overseas Pakistanis', 'text' => 'Non-resident Pakistanis with assets, property, or income in Pakistan.'],
    ];

    $includedItems = [
        'Income tax registration and preparation and submission of your annual return through FBR IRIS.',
        'Income calculation across salary, business, rent, and other sources.',
        'Tax deducted, advance tax, and withholding tax reconciliation.',
        'Wealth statement preparation and asset/liability reconciliation where required.',
        'Active Taxpayer List (ATL) status review and restoration support where applicable.',
        'Response to FBR notices, including unexplained income or asset queries.',
        'Support through income tax audit proceedings where an audit is initiated.',
        'Refund application preparation and follow-up where tax has been over-withheld or overpaid.',
    ];

    $documents = [
        'CNIC front and back copy.',
        'Prior tax returns, where applicable.',
        'Salary certificate or employer tax deduction certificate.',
        'Bank statements for the relevant tax year.',
        'Business income records: sales records, purchase invoices, and expense records.',
        'Rental income details, rent agreements, and receipts, if applicable.',
        'Property and vehicle ownership documents, if applicable.',
        'Any FBR notices or previous acknowledgments received.',
    ];

    $process = [
        'Get in touch and confirm your taxpayer category and filing requirement.',
        'Share your CNIC, income details, and required documents.',
        'Our consultant reviews income, deductions, tax credits, and wealth details.',
        'Your return is prepared and checked for accuracy and compliance.',
        'Your return is submitted on the FBR IRIS portal.',
        'You receive acknowledgment, filing record, and next-step guidance.',
    ];

    $faqs = [
        ['question' => 'Do I need to file a return if my income is below the taxable threshold?', 'answer' => 'In many cases, yes — filing may still be required for compliance purposes even where no tax is actually payable, particularly to remain on the Active Taxpayer List (ATL). We can confirm your specific filing obligation based on your income sources and category.'],
        ['question' => 'What is the Active Taxpayer List (ATL) and why does it matter?', 'answer' => 'The ATL is the FBR\'s list of taxpayers who have filed their return for the relevant tax year. Being on it typically means lower withholding tax rates on banking transactions, property purchases, vehicle registration, and more.'],
        ['question' => 'What happens if I miss the income tax return deadline?', 'answer' => 'Late filing can result in a penalty, exclusion from the ATL, and in some cases further notices from the department. We can help you file as soon as possible, apply for ATL restoration where applicable, and respond to any penalty notice issued.'],
        ['question' => 'What is a wealth statement, and do I need to file one?', 'answer' => 'A wealth statement is a declaration of your assets, liabilities, and net worth, filed alongside your annual return. It\'s generally required for individuals and AOPs.'],
        ['question' => 'I received a notice asking me to explain my assets or income sources — what should I do?', 'answer' => 'This should not be ignored — a timely, well-documented reply is important. We can review the notice, assess what\'s being asked, and prepare a response with supporting evidence.'],
        ['question' => 'Can you help me claim a tax refund?', 'answer' => 'Yes. If tax has been over-withheld or overpaid, we can prepare and file the refund application and follow up with the department through to processing.'],
    ];
@endphp

@section('content')
    <div class="pf-service-page personal-tax-page">
        <section class="page-hero hero-green personal-hero" aria-labelledby="personal-hero-title">
            <div class="container">
                <span class="hero-eyebrow">Income Tax Services</span>
                <h1 id="personal-hero-title">Income Tax Filing & Compliance, Handled End to End</h1>
                <p class="lead-text">
                    We handle income tax matters end to end — from registration and annual return filing to responding to
                    FBR notices and audit proceedings — for individuals, associations of persons, and companies.
                </p>

                <div class="personal-hero-actions">
                    <a href="{{ route('contact') }}" class="btn-hero-primary">Start Income Tax Filing <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    <a href="#personal-included" class="btn-hero-secondary">What's Included</a>
                </div>

                <ul class="hero-badges" role="list">
                    @foreach ($heroBadges as $badge)
                        <li class="hero-badge"><i class="fa {{ $badge['icon'] }}" aria-hidden="true"></i>{{ $badge['label'] }}</li>
                    @endforeach
                </ul>
            </div>
        </section>

        <section class="section-padding-bg" aria-labelledby="who-title">
            <div class="container">
                <div class="section-header-center">
                    <h2 id="who-title" class="section-heading">Who We File Income Tax Returns For</h2>
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

        <section id="personal-included" class="section-padding-white" aria-labelledby="included-title">
            <div class="container">
                <div class="section-header-center">
                    <h2 id="included-title" class="section-heading">What's Included in Our Income Tax Services</h2>
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
            </div>
        </section>

        <section class="section-padding-bg" aria-labelledby="faq-title">
            <div class="container">
                <div class="section-header-center">
                    <h2 id="faq-title" class="section-heading">Frequently Asked Questions: Income Tax</h2>
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
                    <h2 id="personal-cta-title" class="cta-banner-title">Ready to Get Your Income Tax Filing Handled?</h2>
                    <p class="cta-banner-desc">Talk to a FINANIC consultant about registration, annual filing, or an FBR notice you've received.</p>
                    <div class="cta-buttons">
                        <a href="{{ route('contact') }}" class="btn-cta-light">Start Filing Now <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                        <a href="{{ route('contact') }}" class="btn-cta-outline"><i class="fa fa-comments-o" aria-hidden="true"></i> Talk to a Consultant</a>
                    </div>
                </div>
            </div>
        </aside>
    </div>
@endsection
