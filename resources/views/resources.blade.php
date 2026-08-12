@extends('layouts.app')

@section('title', 'Resources & Tax Updates | FINANIC Business Consultants')
@section('meta_description', 'FBR updates, tax compliance guidance, filing reminders, checklists, and a tax calendar from FINANIC Business Consultants, Faisalabad.')
@section('body_class', 'pf-service-body')

@php
    $categories = [
        ['label' => 'All', 'url' => route('resources')],
        ['label' => 'Income Tax', 'url' => route('faq') . '#faqCategory1'],
        ['label' => 'Sales Tax', 'url' => route('faq') . '#faqCategory2'],
        ['label' => 'Withholding Tax', 'url' => route('faq') . '#faqCategory3'],
        ['label' => 'Litigation', 'url' => route('faq') . '#faqCategory4'],
        ['label' => 'General', 'url' => route('faq') . '#faqCategory0'],
    ];

    $featured = [
        'badge' => 'General',
        'icon' => 'fa-calendar-check-o',
        'date' => 'Updated ' . now()->format('F Y'),
        'readTime' => '3 min read',
        'title' => 'FBR Deadline Reminder: Staying Ahead of Your Filing Dates',
        'excerpt' => 'Missed deadlines are one of the most common (and most avoidable) causes of penalties and lost Active Taxpayer List status. Here\'s how to keep your income tax, sales tax, and withholding tax deadlines on your radar, and how our Tax Compliance Planner can build a personalized calendar for you.',
        'url' => url('/planner'),
    ];

    $articles = [
        [
            'badge' => 'General',
            'icon' => 'fa-bullhorn',
            'date' => 'Updated ' . now()->format('F Y'),
            'readTime' => '4 min read',
            'title' => 'Understanding FBR SRO Notifications',
            'excerpt' => 'FBR regularly issues SRO notifications that can change rates, deadlines, and exemptions. Here\'s what an SRO is, and why it\'s worth confirming with a consultant before you rely on one.',
            'url' => route('contact'),
        ],
        [
            'badge' => 'Income Tax',
            'icon' => 'fa-file-text-o',
            'date' => 'Updated ' . now()->format('F Y'),
            'readTime' => '6 min read',
            'title' => 'Annual Tax Return Filing Guide',
            'excerpt' => 'A practical walkthrough of what goes into an annual income tax return, from income reconciliation to wealth statement requirements, for individuals, AOPs, and companies.',
            'url' => route('services.personal'),
        ],
        [
            'badge' => 'Income Tax',
            'icon' => 'fa-check-circle-o',
            'date' => 'Updated ' . now()->format('F Y'),
            'readTime' => '5 min read',
            'title' => 'Active Taxpayer List (ATL): What It Means For You',
            'excerpt' => 'Being on the ATL affects the withholding tax rate on your banking, property, and vehicle transactions. Here\'s how the list works, and how to stay on it.',
            'url' => route('services.iris'),
        ],
        [
            'badge' => 'Income Tax',
            'icon' => 'fa-balance-scale',
            'date' => 'Updated ' . now()->format('F Y'),
            'readTime' => '4 min read',
            'title' => 'Wealth Statement Guidelines',
            'excerpt' => 'A wealth statement reconciles your declared income against your asset position. Here\'s who needs to file one, and what it should include.',
            'url' => route('faq'),
        ],
        [
            'badge' => 'Sales Tax',
            'icon' => 'fa-refresh',
            'date' => 'Updated ' . now()->format('F Y'),
            'readTime' => '3 min read',
            'title' => 'Sales Tax Filing Reminder: Staying Compliant Each Month',
            'excerpt' => 'Sales tax returns are generally due monthly. Here\'s a quick reminder of what a compliant filing routine looks like for registered businesses.',
            'url' => route('services.gst'),
        ],
    ];

    $reminders = [
        ['title' => 'Monthly Sales Tax Return', 'deadline' => 'Typically by the 18th of the following month', 'appliesTo' => 'Sales tax registered businesses', 'icon' => 'fa-file-text-o'],
        ['title' => 'Quarterly Withholding Statement', 'deadline' => 'Filed quarterly', 'appliesTo' => 'Withholding agents', 'icon' => 'fa-balance-scale'],
        ['title' => 'Annual Income Tax Return', 'deadline' => 'Deadline notified annually by FBR', 'appliesTo' => 'Individuals, AOPs & companies', 'icon' => 'fa-user-o'],
        ['title' => 'Wealth Statement Submission', 'deadline' => 'Filed alongside the annual return', 'appliesTo' => 'Individuals & AOPs', 'icon' => 'fa-check-circle-o'],
    ];

    $calendar = [
        ['activity' => 'Monthly Sales Tax Return', 'due' => '18th of the following month (typical)', 'taxpayer' => 'Sales tax registered businesses'],
        ['activity' => 'Quarterly Withholding Statement', 'due' => 'Quarterly, within the period following deduction', 'taxpayer' => 'Withholding agents'],
        ['activity' => 'Advance Tax Payments', 'due' => 'Quarterly installments', 'taxpayer' => 'Companies & specified persons'],
        ['activity' => 'Annual Income Tax Return', 'due' => 'As notified by FBR each tax year', 'taxpayer' => 'Individuals, AOPs & companies'],
        ['activity' => 'Wealth Statement', 'due' => 'Filed with the annual return', 'taxpayer' => 'Individuals & AOPs'],
    ];

    $checklists = [
        ['title' => 'Income Tax Return Checklist', 'icon' => 'fa-file-text-o'],
        ['title' => 'Sales Tax Registration Checklist', 'icon' => 'fa-file-text-o'],
        ['title' => 'Withholding Tax Compliance Checklist', 'icon' => 'fa-balance-scale'],
        ['title' => 'Corporate Documentation Checklist', 'icon' => 'fa-building-o'],
        ['title' => 'Tax Calendar PDF', 'icon' => 'fa-calendar'],
    ];

    $guides = [
        ['title' => 'Income Tax Guide', 'icon' => 'fa-user-o', 'text' => 'Registration, annual filing, and FBR notice response explained for individuals, AOPs and companies.', 'url' => route('services.personal')],
        ['title' => 'Sales Tax Basics', 'icon' => 'fa-file-text-o', 'text' => 'Who needs to register, how monthly filing works, and what audits and refunds involve.', 'url' => route('services.gst')],
        ['title' => 'Withholding Tax Explained', 'icon' => 'fa-balance-scale', 'text' => 'How withholding at source works, and how to respond to a default notice.', 'url' => route('services.family')],
        ['title' => 'Tax Litigation Process', 'icon' => 'fa-gavel', 'text' => 'The representation ladder from the assessing officer through to the High Court.', 'url' => route('services.business')],
        ['title' => 'Corporate Compliance Guide', 'icon' => 'fa-building-o', 'text' => 'What a consolidated monthly retainer covers for multi-entity groups.', 'url' => route('services.business-tax')],
    ];
@endphp

@section('content')
    <div class="pf-service-page resources-page">
        <!-- Hero -->
        <section class="hero" aria-labelledby="resources-hero-title">
            <div class="container">
                <div class="hero-eyebrow">Resources & Tax Updates</div>
                <h1 id="resources-hero-title">Resources & Tax Updates</h1>
                <p class="hero-text">
                    Stay informed with the latest FBR updates, tax compliance guidance, filing reminders, and
                    practical resources designed for individuals and businesses.
                </p>
                <div class="hero-btn-row">
                    <a href="#latest-updates" class="btn-hero-primary">View Latest Updates <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    <a href="#checklists" class="btn-hero-secondary">Download Checklists</a>
                </div>
            </div>
        </section>

        <!-- Search & Filter -->
        <section class="section-light" aria-labelledby="search-title">
            <div class="container">
                <h2 id="search-title" class="visually-hidden">Search and filter resources</h2>
                <div class="resource-toolbar">
                    <label class="resource-search" for="resource-search-input">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        <input id="resource-search-input" type="search" placeholder="Search articles...">
                    </label>

                    <select class="resource-sort" aria-label="Sort resources">
                        <option>Sort by Latest</option>
                    </select>

                    <div class="resource-filter-pills" role="list">
                        @foreach ($categories as $index => $category)
                            <a href="{{ $category['url'] }}" class="resource-filter-pill {{ $index === 0 ? 'active' : '' }}">{{ $category['label'] }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Update -->
        <section class="section-padding-white" id="latest-updates" aria-labelledby="featured-title">
            <div class="container">
                <div class="section-header-center">
                    <span class="section-eyebrow">Featured Update</span>
                    <h2 id="featured-title" class="section-heading">Start Here</h2>
                </div>

                <article class="resource-featured">
                    <div class="resource-thumb"><i class="fa {{ $featured['icon'] }}" aria-hidden="true"></i></div>
                    <div class="resource-article-body">
                        <span class="resource-badge">Featured &middot; {{ $featured['badge'] }}</span>
                        <div class="resource-meta">
                            <span><i class="fa fa-calendar-o" aria-hidden="true"></i> {{ $featured['date'] }}</span>
                            <span><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $featured['readTime'] }}</span>
                        </div>
                        <h3>{{ $featured['title'] }}</h3>
                        <p>{{ $featured['excerpt'] }}</p>
                        <a href="{{ $featured['url'] }}" class="resource-read-more">Read More <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </article>
            </div>
        </section>

        <!-- Latest Tax Updates -->
        <section class="section-light" aria-labelledby="latest-title">
            <div class="container">
                <div class="section-header-center">
                    <h2 id="latest-title" class="section-heading">Latest Tax Updates</h2>
                    <p class="section-intro">Practical guidance across income tax, sales tax, withholding tax, and general compliance.</p>
                </div>

                <div class="resource-article-grid">
                    @foreach ($articles as $article)
                        <article class="resource-article-card">
                            <div class="resource-thumb"><i class="fa {{ $article['icon'] }}" aria-hidden="true"></i></div>
                            <div class="resource-article-body">
                                <span class="resource-badge">{{ $article['badge'] }}</span>
                                <div class="resource-meta">
                                    <span><i class="fa fa-calendar-o" aria-hidden="true"></i> {{ $article['date'] }}</span>
                                    <span><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $article['readTime'] }}</span>
                                </div>
                                <h3>{{ $article['title'] }}</h3>
                                <p>{{ $article['excerpt'] }}</p>
                                <a href="{{ $article['url'] }}" class="resource-read-more">Read More <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- FBR Deadline Reminders -->
        <section class="section-white" aria-labelledby="reminders-title">
            <div class="container">
                <div class="section-header-center">
                    <h2 id="reminders-title" class="section-heading">FBR Deadline Reminders</h2>
                    <p class="section-intro">Recurring compliance deadlines worth keeping on your calendar.</p>
                </div>

                <div class="category-grid">
                    @foreach ($reminders as $reminder)
                        <article class="category-card">
                            <div class="category-icon"><i class="fa {{ $reminder['icon'] }}" aria-hidden="true"></i></div>
                            <h4 class="category-title">{{ $reminder['title'] }}</h4>
                            <p class="category-desc">{{ $reminder['deadline'] }}</p>
                            <div class="category-meta">
                                <div><span class="meta-label">Applies To</span><span class="meta-value">{{ $reminder['appliesTo'] }}</span></div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="text-center" style="margin-top: 32px;">
                    <a href="{{ url('/planner') }}" class="btn-hero-primary">Build My Deadline Calendar <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </section>

        <!-- Tax Calendar -->
        <section class="section-light" aria-labelledby="calendar-title">
            <div class="container">
                <div class="section-header-center">
                    <h2 id="calendar-title" class="section-heading">Tax Calendar</h2>
                    <p class="section-intro">Recurring compliance activities and their typical timing.</p>
                </div>

                <div class="korde-table-wrap">
                    <table class="table korde-pricing-table mb-0">
                        <thead>
                            <tr>
                                <th>Compliance Activity</th>
                                <th>Typical Due Date</th>
                                <th>Applicable Taxpayer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($calendar as $row)
                                <tr>
                                    <td>{{ $row['activity'] }}</td>
                                    <td>{{ $row['due'] }}</td>
                                    <td>{{ $row['taxpayer'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <p class="calc-disclaimer" style="margin-top: 18px;">Exact statutory dates are announced by FBR each year and should always be confirmed before filing. Our <a href="{{ url('/planner') }}">Tax Compliance Planner</a> keeps these dates current for your specific profile.</p>
            </div>
        </section>

        <!-- Document Checklists -->
        <section class="section-white" id="checklists" aria-labelledby="checklists-title">
            <div class="container">
                <div class="section-header-center">
                    <h2 id="checklists-title" class="section-heading">Document Checklists</h2>
                    <p class="section-intro">Downloadable checklists to help you prepare before you get in touch.</p>
                </div>

                <div class="category-grid">
                    @foreach ($checklists as $checklist)
                        <div class="resource-file-card">
                            <span class="resource-file-icon"><i class="fa {{ $checklist['icon'] }}" aria-hidden="true"></i></span>
                            <div>
                                <h4 class="category-title">{{ $checklist['title'] }}</h4>
                                <span class="resource-file-status"><i class="fa fa-clock-o" aria-hidden="true"></i> Available Soon</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Tax Guides -->
        <section class="section-light" aria-labelledby="guides-title">
            <div class="container">
                <div class="section-header-center">
                    <h2 id="guides-title" class="section-heading">Tax Guides</h2>
                </div>

                <div class="category-grid">
                    @foreach ($guides as $guide)
                        <article class="category-card">
                            <div class="category-icon"><i class="fa {{ $guide['icon'] }}" aria-hidden="true"></i></div>
                            <h4 class="category-title">{{ $guide['title'] }}</h4>
                            <p class="category-desc">{{ $guide['text'] }}</p>
                            <a href="{{ $guide['url'] }}" class="resource-read-more">Learn More <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Newsletter -->
        <section class="section-padding-white" aria-labelledby="newsletter-title">
            <div class="container">
                <div class="resource-newsletter">
                    <h2 id="newsletter-title">Never Miss an Important Tax Update</h2>
                    <p>Subscribe to receive FBR deadline reminders, tax updates, and compliance insights directly in your inbox.</p>
                    <form class="resource-newsletter-form" action="{{ url('/contact') }}" method="GET">
                        <label class="visually-hidden" for="resource-newsletter-email">Email address</label>
                        <input id="resource-newsletter-email" name="email" type="email" placeholder="Your email address" aria-label="Email address">
                        <button type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </section>

        <!-- Final CTA
        <aside class="cta-banner" aria-labelledby="cta-title">
            <div class="container">
                <div class="cta-content">
                    <h2 id="cta-title">Need Professional Tax Advice?</h2>
                    <p>If you have questions about tax compliance, filing deadlines, or FBR notices, our consultants are ready to assist you.</p>
                    <div class="cta-btn-row">
                        <a href="{{ route('contact') }}" class="btn-cta-primary">Book Consultation <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                        <a href="{{ route('contact') }}" class="btn-cta-secondary"><i class="fa fa-comments-o" aria-hidden="true"></i> Contact Us</a>
                    </div>
                </div>
            </div>
        </aside> -->
    </div>
@endsection
