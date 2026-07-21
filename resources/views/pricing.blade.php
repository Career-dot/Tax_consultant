@extends('layouts.app')

@section('title', 'Pricing - Tax Consultant')

@section('content')
    @php
        $personalPlans = [
            ['name' => 'Salary Return', 'price' => 'Rs 999', 'features' => ['Income reconciliation', 'Tax deduction review', 'FBR return submission'], 'featured' => true],
            ['name' => 'Freelancer Return', 'price' => 'Rs 2,499', 'features' => ['Foreign income guidance', 'Bank statement review', 'Tax credit support'], 'featured' => false],
            ['name' => 'Property Return', 'price' => 'Rs 3,999', 'features' => ['Rental income return', 'Asset statement', 'Consultant review'], 'featured' => false],
        ];

        $businessPlans = [
            ['name' => 'Sole Proprietor', 'price' => 'Rs 5,000', 'icon' => 'fa-briefcase', 'features' => ['Annual income tax return', 'Balance sheet guidance', 'ATL follow-up']],
            ['name' => 'Partnership / AOP', 'price' => 'Rs 8,000', 'icon' => 'fa-users', 'features' => ['AOP return filing', 'Partner income review', 'FBR acknowledgement']],
            ['name' => 'Company Return', 'price' => 'Rs 15,000', 'icon' => 'fa-building', 'features' => ['Corporate return', 'Financial statement review', 'Compliance checklist']],
        ];

        $ntnRows = [
            ['category' => 'Salaried Individual', 'fee' => 'Rs 500', 'timeline' => '1-2 Days'],
            ['category' => 'Sole Proprietor', 'fee' => 'Rs 1,500', 'timeline' => '2-3 Days'],
            ['category' => 'Partnership / AOP', 'fee' => 'Rs 3,500', 'timeline' => '3-5 Days'],
            ['category' => 'Company', 'fee' => 'Rs 7,500', 'timeline' => '5-7 Days'],
            ['category' => 'Non-Profit Organization', 'fee' => 'Rs 8,500', 'timeline' => '7-10 Days'],
        ];

        $otherServices = [
            ['name' => 'GST Registration', 'price' => 'Rs 15,000 fixed fee', 'icon' => 'fa-file-text-o'],
            ['name' => 'FBR Profile Update - Salary', 'price' => 'Rs 500', 'icon' => 'fa-id-card-o'],
            ['name' => 'FBR Profile Update - Business', 'price' => 'Rs 1,000', 'icon' => 'fa-refresh'],
            ['name' => 'Family Tax Filing', 'price' => 'Discounted consolidated quote', 'icon' => 'fa-users'],
            ['name' => 'Salary Tax Calculator', 'price' => 'Free', 'icon' => 'fa-calculator'],
        ];

        $faqs = [
            ['question' => 'Are there any hidden fees?', 'answer' => 'No. Our listed fees cover standard filing or registration work. If your case needs extra documentation, notice handling, or accounting cleanup, we confirm the cost before starting.'],
            ['question' => 'What is the CA review add-on?', 'answer' => 'It is a senior consultant review for complex returns, business cases, foreign income, property income, or high-value filings.'],
            ['question' => 'Do you offer refunds?', 'answer' => 'If work has not started, refunds can be reviewed. Once filing, registration, or consultant review begins, service charges may apply.'],
            ['question' => 'Can I pay in installments?', 'answer' => 'For larger business and corporate engagements, installment options can be discussed before onboarding.'],
        ];
    @endphp

    <div class="cr-breadcrumb-area section-padding--md">
        <div class="container">
            <!-- <h6 class="cr-breadcrumb ms-4">Pricing</h6> -->
            <div class="cr-breadcrumb ">
                <h2>Simple, Transparent <span> Pricing </span>  for Every <span>   Tax Service</span></h2>
                <p>No hidden fees. No surprise charges. Just honest, competitive pricing for professional CA-certified tax services in Pakistan.</p>
                <P>All prices are all-inclusive. What you see is what you pay.</P>
            </div>
        </div>
    </div>

    <div class="page-content pricing-page">
        <section class="pricing-section section-padding--xlg bg--white">
            <div class="container">
                <div class="section-title text-center">
                    <h4>PERSONAL TAX FILING</h4>
                    <h2>Simple Plans For <span class="color--theme">Individuals</span></h2>
                    <p>Choose the filing support that matches your income profile. Every plan includes consultant guidance and FBR submission.</p>
                </div>

                <div class="row g-4 justify-content-center">
                    @foreach ($personalPlans as $plan)
                        <div class="col-lg-4 col-md-6">
                            <article class="korde-price-card {{ $plan['featured'] ? 'is-featured' : '' }} wow fadeInUp">
                                <span class="korde-price-badge">{{ $plan['featured'] ? 'Popular' : 'Online Filing' }}</span>
                                <h3>{{ $plan['name'] }}</h3>
                                <div class="korde-price">{{ $plan['price'] }}</div>
                                <ul>
                                    @foreach ($plan['features'] as $feature)
                                        <li><i class="fa fa-check"></i>{{ $feature }}</li>
                                    @endforeach
                                </ul>
                                <a href="{{ url('/contact') }}" class="cr-btn cr-btn--sm"><span>Start Filing</span></a>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="pricing-section section-padding--xlg bg--grey--light">
            <div class="container">
                <div class="section-title text-center">
                    <h4>BUSINESS TAX RETURN FILING</h4>
                    <h2>Built For <span class="color--theme">Businesses</span></h2>
                    <p>Structured filing support for proprietors, partnerships and companies with documentation review included.</p>
                </div>

                <div class="row g-4">
                    @foreach ($businessPlans as $plan)
                        <div class="col-lg-4 col-md-6">
                            <article class="korde-business-card wow fadeInUp">
                                <div class="korde-business-icon"><i class="fa {{ $plan['icon'] }}"></i></div>
                                <h3>{{ $plan['name'] }}</h3>
                                <strong>{{ $plan['price'] }}</strong>
                                <ul>
                                    @foreach ($plan['features'] as $feature)
                                        <li>{{ $feature }}</li>
                                    @endforeach
                                </ul>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="pricing-section section-padding--xlg bg--white">
            <div class="container">
                <div class="section-title text-center">
                    <h4>NTN REGISTRATION</h4>
                    <h2>Registration Fees & <span class="color--theme">Timelines</span></h2>
                </div>

                <div class="korde-table-wrap">
                    <table class="table korde-pricing-table mb-0">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Fee</th>
                                <th>Timeline</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ntnRows as $row)
                                <tr>
                                    <td>{{ $row['category'] }}</td>
                                    <td>{{ $row['fee'] }}</td>
                                    <td>{{ $row['timeline'] }}</td>
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
                    <h4>OTHER SERVICES</h4>
                    <h2>Additional <span class="color--theme">Tax Support</span></h2>
                </div>

                <div class="korde-service-list mx-auto">
                    @foreach ($otherServices as $service)
                        <div class="korde-service-row">
                            <span><i class="fa {{ $service['icon'] }}"></i>{{ $service['name'] }}</span>
                            <strong>{{ $service['price'] }}</strong>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="pricing-section section-padding--xlg bg--white">
            <div class="container">
                <div class="section-title text-center">
                    <h4>FAQ</h4>
                    <h2>Pricing Questions <span class="color--theme">Answered</span></h2>
                </div>

                <div class="accordion korde-faq mx-auto" id="pricingFaq">
                    @foreach ($faqs as $index => $faq)
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="pricingFaqHeading{{ $index }}">
                                <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#pricingFaqCollapse{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="pricingFaqCollapse{{ $index }}">
                                    {{ $faq['question'] }}
                                </button>
                            </h3>
                            <div id="pricingFaqCollapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="pricingFaqHeading{{ $index }}" data-bs-parent="#pricingFaq">
                                <div class="accordion-body">{{ $faq['answer'] }}</div>
                            </div>
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
                            <h3>Ready To Start Your <span class="color--theme">Tax Filing?</span></h3>
                            <p>Speak with a consultant, confirm your service fee and complete your filing online with Korde-style professional support.</p>
                            <a href="{{ url('/contact') }}" class="cr-btn"><span>Contact Now</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
