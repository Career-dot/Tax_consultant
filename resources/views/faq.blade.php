@extends('layouts.app')

@section('title', 'FAQ - Tax Consultant')

@section('content')
    @php
        $faqCategories = [
            [
                'title' => 'General Tax Questions',
                'items' => [
                    ['question' => 'Who is required to file an income tax return in Pakistan?', 'answer' => 'Individuals with taxable income, business owners, companies, property owners, vehicle owners, and many professionals may need to file a return. A consultant can review your profile and confirm your obligation.'],
                    ['question' => 'What is the difference between a tax filer and non-filer?', 'answer' => 'A filer appears on the Active Taxpayer List and usually benefits from lower withholding tax rates. Non-filers often face higher deductions and reduced compliance standing.'],
                    ['question' => 'What is Pakistan\'s tax year?', 'answer' => 'Pakistan\'s normal tax year runs from July 1 to June 30. Annual income tax returns are generally filed after the tax year closes.'],
                    ['question' => 'Can I file a tax return for previous years?', 'answer' => 'Yes. Prior-year filings can often be prepared after reviewing the applicable income, deductions, assets, and FBR requirements for that tax year.'],
                ],
            ],
            [
                'title' => 'Tax Filing Questions',
                'items' => [
                    ['question' => 'What documents do I need to file my personal tax return?', 'answer' => 'Common documents include CNIC, salary certificate, bank statements, tax deduction certificates, property details, vehicle details, business income records, and asset information.'],
                    ['question' => 'What if I made an error in my filed tax return?', 'answer' => 'Depending on the case, a revised return or supporting response may be possible. Our consultants can review the filing and guide the next step.'],
                    ['question' => 'What is a Wealth Statement and do I need to file it?', 'answer' => 'A Wealth Statement explains your assets, liabilities, expenses, and sources of funds. Many individual return filings require it as part of compliance.'],
                    ['question' => 'What penalties apply for late tax filing in Pakistan?', 'answer' => 'Late filing may lead to penalties, delayed ATL status, or higher withholding tax exposure. The impact depends on the taxpayer type and filing status.'],
                ],
            ],
            [
                'title' => 'NTN & GST Registration Questions',
                'items' => [
                    ['question' => 'How can I check if I already have an NTN?', 'answer' => 'You can verify registration status through FBR records using your CNIC or business details. Our team can help confirm your profile before starting a new registration.'],
                    ['question' => 'How long does NTN registration take?', 'answer' => 'Individual NTN registration is often completed quickly after documents are ready. Business, AOP, or company registration can take longer depending on verification needs.'],
                    ['question' => 'Is GST registration mandatory for all businesses?', 'answer' => 'GST registration depends on business activity, turnover, sector, and sales tax rules. A consultant should review whether registration applies to your business.'],
                    ['question' => 'What is STRN and how is it different from NTN?', 'answer' => 'NTN identifies income tax registration. STRN relates to sales tax registration and is used by businesses registered for sales tax compliance.'],
                ],
            ],
            [
                'title' => 'Billing & Pricing Questions',
                'items' => [
                    ['question' => 'What payment methods do you accept?', 'answer' => 'Payment options can include bank transfer and other locally available methods shared during onboarding. The consultant confirms payment details before work starts.'],
                    ['question' => 'What is your refund policy?', 'answer' => 'Refund eligibility depends on whether work has started. If filing, registration, or consultant review has begun, service charges may apply.'],
                    ['question' => 'Are there any additional government fees on top of your service fee?', 'answer' => 'Some matters may involve government charges, portal fees, or third-party documentation costs. We identify these before proceeding wherever applicable.'],
                ],
            ],
            [
                'title' => 'Process & Timeline Questions',
                'items' => [
                    ['question' => 'How will I know when my service is complete?', 'answer' => 'You receive completion confirmation, relevant acknowledgement, or filing details from the consultant once the service has been submitted or finalized.'],
                    ['question' => 'What if my service takes longer than the stated timeline?', 'answer' => 'If a case needs extra verification, missing documents, or FBR portal follow-up, we keep you informed and explain the reason for the delay.'],
                    ['question' => 'Do I need to come to your office?', 'answer' => 'Most services can be handled online. If a case requires physical verification or original documents, your consultant will guide you clearly.'],
                ],
            ],
        ];
    @endphp

    <div class="cr-breadcrumb-area faq-hero section-padding--md">
        <div class="container">
            <div class="cr-breadcrumb faq-hero-content">
                <h1>Your Tax Questions, Answered by Experts</h1>
                <p>Browse our comprehensive FAQ covering income tax, NTN registration, GST, business compliance, our process, and pricing.</p>

                <form class="faq-search-form" action="{{ route('faq') }}" method="GET">
                    <label class="visually-hidden" for="faq-search">Search FAQ</label>
                    <i class="fa fa-search"></i>
                    <input id="faq-search" name="q" type="search" placeholder="Search your question..." value="{{ request('q') }}">
                    <button type="submit" class="cr-btn cr-btn--sm"><span>Search</span></button>
                </form>
            </div>
        </div>
    </div>

    <div class="page-content faq-page">
        <section class="faq-content-area section-padding--xlg bg--white">
            <div class="container">
                <div class="faq-content-wrap mx-auto">
                    @foreach ($faqCategories as $categoryIndex => $category)
                        <section class="faq-category">
                            <div class="section-title no-padding">
                                <h4>FAQS</h4>
                                <h2>{{ $category['title'] }}</h2>
                            </div>

                            <div class="accordion korde-faq faq-category-accordion" id="faqCategory{{ $categoryIndex }}">
                                @foreach ($category['items'] as $itemIndex => $item)
                                    @php
                                        $collapseId = 'faqCategory' . $categoryIndex . 'Item' . $itemIndex;
                                        $headingId = $collapseId . 'Heading';
                                        $isOpen = $categoryIndex === 0 && $itemIndex === 0;
                                    @endphp
                                    <div class="accordion-item">
                                        <h3 class="accordion-header" id="{{ $headingId }}">
                                            <button class="accordion-button {{ $isOpen ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $collapseId }}" aria-expanded="{{ $isOpen ? 'true' : 'false' }}" aria-controls="{{ $collapseId }}">
                                                {{ $item['question'] }}
                                            </button>
                                        </h3>
                                        <div id="{{ $collapseId }}" class="accordion-collapse collapse {{ $isOpen ? 'show' : '' }}" aria-labelledby="{{ $headingId }}" data-bs-parent="#faqCategory{{ $categoryIndex }}">
                                            <div class="accordion-body">{{ $item['answer'] }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="cta-area section-padding--sm bg--grey--light bg--abstruct-mask">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="calltoaction text-center">
                            <h3>Ready To Become A <span class="color--theme">Tax Filer Today?</span></h3>
                            <p>Join thousands of Pakistanis who file their taxes online, quickly, securely, and affordably.</p>
                            <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                                <a href="{{ url('/contact') }}" class="cr-btn"><span>Start Filing Now</span></a>
                                <a href="{{ url('/contact') }}" class="cr-btn cr-btn--transparent"><span>Talk to an Expert</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
