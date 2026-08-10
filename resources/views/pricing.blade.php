@extends('layouts.app')

@section('title', 'Tax Compliance Planner | FINANIC Business Consultants')
@section('meta_description', 'Get a personalized FBR filing-deadline calendar and reminders for income tax, sales tax, and withholding tax compliance, from FINANIC Business Consultants.')

@section('content')
    @php
        $steps = [
            ['title' => 'Select Your Taxpayer Type', 'text' => 'Salaried individual, business individual, association of persons (AOP), or company.'],
            ['title' => 'Select Your Registrations', 'text' => 'Income tax only, income tax plus sales tax, and whether you are also a withholding agent.'],
            ['title' => 'Add Your Sector (Optional)', 'text' => 'For sector-specific deadlines, such as Section 236G/236H obligations for distributors.'],
            ['title' => 'Get Your Deadline List', 'text' => 'A personalized list of upcoming filing deadlines with due dates.'],
            ['title' => 'Save, Export, or Get Reminders', 'text' => 'Download your calendar, add it to Google/Outlook, or opt in to email and SMS reminders.'],
        ];

        $reminders = [
            ['title' => 'First Reminder', 'timing' => '7 days before the deadline', 'channel' => 'Email'],
            ['title' => 'Second Reminder', 'timing' => '2 days before the deadline', 'channel' => 'Email + SMS'],
            ['title' => 'Final Reminder', 'timing' => 'On the deadline day', 'channel' => 'SMS'],
        ];

        $deadlineTypes = [
            ['icon' => 'fa-user-o', 'title' => 'Annual Income Tax Return', 'text' => 'Filing deadlines for individuals, AOPs, and companies.'],
            ['icon' => 'fa-file-text-o', 'title' => 'Monthly Sales Tax Return', 'text' => 'Monthly filing deadlines for registered businesses.'],
            ['icon' => 'fa-balance-scale', 'title' => 'Quarterly Withholding Statement', 'text' => 'Deadlines for filing withholding tax statements as a withholding agent.'],
            ['icon' => 'fa-check-circle-o', 'title' => 'Active Taxpayer List (ATL) Deadline', 'text' => 'The annual deadline to stay on the ATL and avoid higher withholding rates.'],
        ];
    @endphp

    <div class="banner-area section-padding--md">
        <div class="container">
            <div class="cr-breadcrumb ">
                <h1>Tax Compliance <span>Planner</span></h1>
                <p>A personalized FBR filing-deadline calendar for income tax, sales tax, and withholding tax — with reminders so you never miss a due date.</p>
            </div>
        </div>
    </div>

    <div class="page-content pricing-page">
        <section class="pricing-section section-padding--xlg bg--white">
            <div class="container">
                <div class="section-title text-center">
                    <h4>HOW IT WORKS</h4>
                    <h2>Build Your Personalized <span class="color--theme">Deadline Calendar</span></h2>
                    <p>Answer a few quick questions and get a deadline list built around your taxpayer type, registrations, and sector.</p>
                </div>

                <div class="row g-4 justify-content-center">
                    @foreach ($steps as $index => $step)
                        <div class="col-lg-4 col-md-6">
                            <article class="korde-business-card wow fadeInUp">
                                <div class="korde-business-icon">{{ $index + 1 }}</div>
                                <h3>{{ $step['title'] }}</h3>
                                <p>{{ $step['text'] }}</p>
                            </article>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-5">
                    <a href="{{ route('register') }}" class="cr-btn"><span>Register to Start</span></a>
                </div>
            </div>
        </section>

        <section class="pricing-section section-padding--xlg bg--grey--light">
            <div class="container">
                <div class="section-title text-center">
                    <h4>WHAT IT COVERS</h4>
                    <h2>Deadlines Tracked By The <span class="color--theme">Planner</span></h2>
                </div>

                <div class="row g-4">
                    @foreach ($deadlineTypes as $item)
                        <div class="col-lg-3 col-md-6">
                            <article class="korde-business-card wow fadeInUp">
                                <div class="korde-business-icon"><i class="fa {{ $item['icon'] }}"></i></div>
                                <h3>{{ $item['title'] }}</h3>
                                <p>{{ $item['text'] }}</p>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="pricing-section section-padding--xlg bg--white">
            <div class="container">
                <div class="section-title text-center">
                    <h4>REMINDERS</h4>
                    <h2>Never Miss A <span class="color--theme">Filing Deadline</span></h2>
                    <p>Once you opt in with your name, phone, and email, we send reminders ahead of each deadline.</p>
                </div>

                <div class="korde-table-wrap">
                    <table class="table korde-pricing-table mb-0">
                        <thead>
                            <tr>
                                <th>Reminder</th>
                                <th>Timing</th>
                                <th>Channel</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reminders as $reminder)
                                <tr>
                                    <td>{{ $reminder['title'] }}</td>
                                    <td>{{ $reminder['timing'] }}</td>
                                    <td>{{ $reminder['channel'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <section class="pricing-section section-padding--xlg bg--grey--light">
            <div class="container">
                <div class="section-title text-center">
                    <h4>FOR RETAINER CLIENTS</h4>
                    <h2>Your Deadlines, <span class="color--theme">Saved</span></h2>
                    <p>Retainer clients can save their profile so it doesn't need to be re-entered on every visit, and their FINANIC consultant keeps the calendar current on their behalf.</p>
                </div>
            </div>
        </section>

        <section class="pricing-section section-padding--xlg bg--white">
            <div class="container">
                <div class="section-title text-center">
                    <h4>FAQ</h4>
                    <h2>Planner Questions <span class="color--theme">Answered</span></h2>
                </div>

                <div class="accordion korde-faq mx-auto" id="pricingFaq">
                    <div class="accordion-item">
                        <h3 class="accordion-header" id="pricingFaqHeading0">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#pricingFaqCollapse0" aria-expanded="true" aria-controls="pricingFaqCollapse0">
                                Is the Tax Compliance Planner free to use?
                            </button>
                        </h3>
                        <div id="pricingFaqCollapse0" class="accordion-collapse collapse show" aria-labelledby="pricingFaqHeading0" data-bs-parent="#pricingFaq">
                            <div class="accordion-body">Yes. Building your deadline calendar and opting in to reminders is free. If you'd like FINANIC to handle the actual filing or representation, that's arranged separately.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h3 class="accordion-header" id="pricingFaqHeading1">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pricingFaqCollapse1" aria-expanded="false" aria-controls="pricingFaqCollapse1">
                                Do statutory deadlines ever change?
                            </button>
                        </h3>
                        <div id="pricingFaqCollapse1" class="accordion-collapse collapse" aria-labelledby="pricingFaqHeading1" data-bs-parent="#pricingFaq">
                            <div class="accordion-body">Yes. Exact statutory dates can change year to year via FBR notifications. We keep the deadlines behind the planner up to date, including one-off manual reminders for things like an FBR deadline extension notice.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h3 class="accordion-header" id="pricingFaqHeading2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pricingFaqCollapse2" aria-expanded="false" aria-controls="pricingFaqCollapse2">
                                Can I export the calendar to my phone?
                            </button>
                        </h3>
                        <div id="pricingFaqCollapse2" class="accordion-collapse collapse" aria-labelledby="pricingFaqHeading2" data-bs-parent="#pricingFaq">
                            <div class="accordion-body">Yes. Your deadline calendar can be downloaded as a PDF or added to Google or Outlook calendar via .ics export.</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="cta-area section-padding--sm pf-cta-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="calltoaction text-center">
                            <h3>Start Building Your <span class="color--theme">Tax Calendar</span></h3>
                            <p>Get in touch to build your personalized filing-deadline calendar and opt in to reminders.</p>
                            <a href="{{ route('register') }}" class="cr-btn"><span>Register to Start</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
