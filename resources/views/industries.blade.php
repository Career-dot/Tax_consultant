@extends('layouts.app')

@section('title', 'Industries We Serve | FINANIC Business Consultants')
@section('meta_description', 'Specialized tax advisory, compliance, and representation services tailored to cement distribution, transport, pharmaceuticals, and FMCG businesses in Faisalabad.')
@section('body_class', 'pf-service-body')

@php
    $industries = [
        [
            'number' => '01',
            'icon' => 'fa-cube',
            'name' => 'Cement Distribution',
            'title' => 'Cement Distribution Industry',
            'intro' => 'Cement distributors sit at the center of some of the most heavily scrutinized withholding provisions in the sales tax and income tax framework, with characterization and rate disputes a recurring theme.',
            'challenges' => [
                'Agency vs distributor characterization issues',
                'Section 236G advance tax implications',
                'Section 236H applicability concerns',
                'Turnover tax rate disputes',
                'Compliance monitoring requirements',
            ],
            'support' => 'We help cement distributors navigate complex withholding obligations, resolve characterization disputes, maintain compliance, and respond effectively to FBR notices and audits.',
            'cta' => 'Discuss Your Tax Position',
        ],
        [
            'number' => '02',
            'icon' => 'fa-truck',
            'name' => 'Transport',
            'title' => 'Transport Industry',
            'intro' => 'Transport and logistics operators manage a high volume of contract and freight payments, each carrying its own withholding and documentation requirements.',
            'challenges' => [
                'Freight payment withholding requirements',
                'Contract payment taxation',
                'Presumptive tax regime considerations',
                'Tax documentation management',
                'Audit preparedness',
            ],
            'support' => 'We assist transport operators and logistics businesses in managing withholding obligations, maintaining documentation, and addressing industry-specific compliance requirements.',
            'cta' => 'Speak With Our Consultants',
        ],
        [
            'number' => '03',
            'icon' => 'fa-medkit',
            'name' => 'Pharmaceuticals',
            'title' => 'Pharmaceutical Industry',
            'intro' => 'Pharmaceutical businesses operate under specific sales tax exemption and zero-rating rules, where accurate documentation is essential to defend eligibility.',
            'challenges' => [
                'Sales tax exemptions',
                'Zero-rating compliance',
                'Withholding tax on supplies',
                'Documentation requirements',
                'Regulatory reporting obligations',
            ],
            'support' => 'Our team helps pharmaceutical businesses manage tax compliance, review exemption eligibility, and maintain accurate reporting to reduce risk exposure.',
            'cta' => 'Schedule Consultation',
        ],
        [
            'number' => '04',
            'icon' => 'fa-shopping-basket',
            'name' => 'FMCG',
            'title' => 'FMCG Industry',
            'intro' => 'FMCG businesses sell through multiple channels and counterparties, each with different withholding treatment, making reconciliation and compliance monitoring an ongoing task.',
            'challenges' => [
                'Distributor withholding compliance',
                'Retailer withholding obligations',
                'Input/output sales tax reconciliation',
                'Multi-channel distribution challenges',
                'Ongoing compliance monitoring',
            ],
            'support' => 'We help FMCG businesses streamline compliance processes, manage withholding responsibilities, and maintain accurate sales tax reconciliations.',
            'cta' => 'Talk To An Expert',
        ],
    ];

    $whyItMatters = [
        ['icon' => 'fa-graduation-cap', 'title' => 'Industry Knowledge', 'text' => 'We understand the specific tax rules, rate structures, and disputes that recur within each sector we serve.'],
        ['icon' => 'fa-check-square-o', 'title' => 'Regulatory Compliance', 'text' => 'Sector-aware compliance keeps you filed correctly the first time, rather than correcting issues after an FBR notice.'],
        ['icon' => 'fa-shield', 'title' => 'Risk Reduction', 'text' => 'Anticipating the tax risks specific to your industry reduces exposure to penalties, audits, and default notices.'],
        ['icon' => 'fa-line-chart', 'title' => 'Strategic Tax Planning', 'text' => 'Industry context shapes better planning, from structuring decisions to how compliance is monitored month to month.'],
    ];

    $process = [
        ['title' => 'Industry Assessment', 'text' => 'We start by understanding your sector, supply chain role, and the tax provisions most relevant to your business.'],
        ['title' => 'Compliance Review', 'text' => 'We review your current income tax, sales tax, and withholding tax compliance against industry-specific requirements.'],
        ['title' => 'Tax Risk Analysis', 'text' => 'We identify areas of exposure, from rate disputes to documentation gaps, before they become FBR notices.'],
        ['title' => 'Implementation & Support', 'text' => 'We help implement corrected processes, registrations, or responses, and support you through any active matters.'],
        ['title' => 'Ongoing Advisory', 'text' => 'We stay engaged as your compliance partner, keeping pace with regulatory changes relevant to your sector.'],
    ];
@endphp

@section('content')
    <div class="pf-service-page industries-page">
        <!-- Hero -->
        <section class="hero" aria-labelledby="industries-hero-title">
            <div class="container">
                <div class="hero-eyebrow">Industries We Serve</div>
                <h1 id="industries-hero-title">Specialized Tax Advisory Built Around Your Industry</h1>
                <p class="hero-text">
                    Specialized tax advisory, compliance, and representation services tailored to the unique
                    challenges of each industry. At FINANIC Business Consultants, we understand that every industry
                    faces different tax regulations, compliance requirements, and operational challenges. Our
                    industry-focused approach helps businesses remain compliant while minimizing tax risks and
                    administrative burdens.
                </p>
                <div class="hero-btn-row">
                    <a href="{{ route('contact') }}" class="btn-hero-primary">Book a Consultation <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    <a href="{{ route('contact') }}" class="btn-hero-secondary">Contact Our Experts</a>
                </div>
                <ul class="hero-badges" role="list">
                    @foreach ($industries as $industry)
                        <li class="hero-badge"><i class="fa {{ $industry['icon'] }}" aria-hidden="true"></i>{{ $industry['name'] }}</li>
                    @endforeach
                </ul>
            </div>
        </section>

        <!-- Industry Expertise Blocks -->
        @foreach ($industries as $index => $industry)
            <section class="pf-industry-block" aria-labelledby="industry-title-{{ $index }}">
                <div class="container">
                    <div class="row g-5 align-items-center {{ $index % 2 === 1 ? 'flex-lg-row-reverse' : '' }}">
                        <div class="col-lg-5">
                            <div class="pf-industry-visual">
                                <span class="pf-industry-number">{{ $industry['number'] }}</span>
                                <span class="pf-industry-visual-icon"><i class="fa {{ $industry['icon'] }}" aria-hidden="true"></i></span>
                                <span class="pf-industry-visual-label">{{ $industry['name'] }}</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <span class="section-eyebrow">Industry Expertise</span>
                            <h2 id="industry-title-{{ $index }}" class="section-heading">{{ $industry['title'] }}</h2>
                            <p class="section-intro" style="margin-bottom: 24px;">{{ $industry['intro'] }}</p>

                            <h4 style="font-size: 16px; font-weight: 700; margin-bottom: 14px; color: #222;">Key Tax Considerations</h4>
                            <ul class="pf-industry-tag-list">
                                @foreach ($industry['challenges'] as $challenge)
                                    <li><i class="fa fa-check-circle-o" aria-hidden="true"></i><span>{{ $challenge }}</span></li>
                                @endforeach
                            </ul>

                            <div class="pf-industry-solution">
                                <h4>Our Support</h4>
                                <p>{{ $industry['support'] }}</p>
                            </div>

                            <a href="{{ route('contact') }}" class="btn-hero-primary">{{ $industry['cta'] }} <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </section>
        @endforeach

        <!-- Why Industry Experience Matters -->
        <section class="section-light" aria-labelledby="why-title">
            <div class="container">
                <div class="section-header-center">
                    <h2 id="why-title" class="section-heading">Why Industry-Specific Tax Expertise Matters</h2>
                </div>

                <div class="category-grid">
                    @foreach ($whyItMatters as $item)
                        <article class="category-card">
                            <div class="category-icon"><i class="fa {{ $item['icon'] }}" aria-hidden="true"></i></div>
                            <h4 class="category-title">{{ $item['title'] }}</h4>
                            <p class="category-desc">{{ $item['text'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Process Section -->
        <section class="section-white" aria-labelledby="process-title">
            <div class="container">
                <div class="section-header-center">
                    <h2 id="process-title" class="section-heading">How We Work With Your Industry</h2>
                </div>

                <ol class="process-wrapper" role="list">
                    @foreach ($process as $step)
                        <li class="process-step-row">
                            <span class="process-step-circle">{{ $loop->iteration }}</span>
                            <span class="process-step-text"><strong>{{ $step['title'] }}.</strong> {{ $step['text'] }}</span>
                        </li>
                    @endforeach
                </ol>
            </div>
        </section>

        <!-- Final CTA -->
        <aside class="cta-banner" aria-labelledby="cta-title">
            <div class="container">
                <div class="cta-content">
                    <h2 id="cta-title">Need Industry-Specific Tax Guidance?</h2>
                    <p>Whether you operate in cement distribution, transport, pharmaceuticals, or FMCG, our team can help you manage compliance requirements and respond confidently to tax challenges.</p>
                    <div class="cta-btn-row">
                        <a href="{{ route('contact') }}" class="btn-cta-primary">Book Consultation <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                        <a href="{{ route('contact') }}" class="btn-cta-secondary"><i class="fa fa-comments-o" aria-hidden="true"></i> Contact Us Today</a>
                    </div>
                </div>
            </div>
        </aside>
    </div>
@endsection
