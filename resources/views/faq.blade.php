@extends('layouts.app')

@section('title', 'FAQs - FINANIC Business Consultants')
@section('meta_description', 'Answers to common questions about income tax, sales tax, withholding tax, and tax litigation & representation from FINANIC Business Consultants, Faisalabad.')

@section('content')
    @php
        $faqCategories = [
            [
                'title' => 'General',
                'items' => [
                    ['question' => 'What services does FINANIC Business Consultants offer?', 'answer' => 'We provide end-to-end tax support across four areas: income tax, sales tax, withholding tax compliance, and tax litigation/representation. We work with individual traders and shopkeepers on one-off filing needs, and with SMEs and multi-entity corporate groups on ongoing monthly retainer arrangements.'],
                    ['question' => 'Do you work with individuals as well as businesses?', 'answer' => 'Yes. We handle salaried individuals, business individuals, associations of persons (AOPs), and companies — from a single trader filing an annual return to a multi-entity group needing consolidated monthly compliance.'],
                    ['question' => 'What documents do I need to get started?', 'answer' => 'This depends on the service, but generally includes your CNIC, prior tax returns (if any), bank statements, and relevant business records (sales records, purchase invoices, salary records, etc.). Once you get in touch, we provide a checklist specific to your situation.'],
                    ['question' => 'Is my information kept confidential?', 'answer' => 'Yes. All client information, financial records, and case details are kept strictly confidential and are never shared or published without your consent.'],
                    ['question' => 'Do you offer one-off services, or only ongoing retainers?', 'answer' => 'Both. We handle one-time needs like registration or a single year\'s return filing, as well as ongoing monthly retainer relationships that combine compliance work with representation if a dispute arises.'],
                    ['question' => 'How do I get in touch, and how quickly can I expect a response?', 'answer' => 'You can reach us by phone, WhatsApp, or the contact form on this site, and our team will follow up as soon as possible.'],
                ],
            ],
            [
                'title' => 'Income Tax',
                'items' => [
                    ['question' => 'Do I need to file a return if my income is below the taxable threshold?', 'answer' => 'In many cases, yes — filing may still be required for compliance purposes even where no tax is actually payable, particularly to remain on the Active Taxpayer List (ATL), which affects the rate of tax withheld on your transactions. We can confirm your specific filing obligation based on your income sources and category.'],
                    ['question' => 'What is the Active Taxpayer List (ATL) and why does it matter?', 'answer' => 'The ATL is the FBR\'s list of taxpayers who have filed their return for the relevant tax year. Being on it typically means lower withholding tax rates on banking transactions, property purchases, vehicle registration, and more. Falling off the list — through late or missed filing — can mean paying substantially higher withholding rates until you\'re restored.'],
                    ['question' => 'What happens if I miss the income tax return deadline?', 'answer' => 'Late filing can result in a penalty, exclusion from the ATL (with the higher withholding rates that follow), and in some cases further notices from the department. We can help you file as soon as possible, apply for ATL restoration where applicable, and respond to any penalty notice issued.'],
                    ['question' => 'What is a wealth statement, and do I need to file one?', 'answer' => 'A wealth statement is a declaration of your assets, liabilities, and net worth, filed alongside your annual return. It\'s generally required for individuals and AOPs and is used by the department to reconcile your declared income against your asset position over time.'],
                    ['question' => 'What is advance tax, and who has to pay it?', 'answer' => 'Advance tax is tax paid in installments during the year — typically quarterly — rather than as a single lump sum after the year ends. It applies to companies and certain specified persons based on their estimated tax liability. Getting the rate and base right matters, since disputes over advance tax calculations are common.'],
                    ['question' => 'I received a notice asking me to explain my assets or income sources — what should I do?', 'answer' => 'This is often issued under provisions dealing with unexplained income or assets. It should not be ignored — a timely, well-documented reply is important. We can review the notice, assess what\'s being asked, and prepare a response with supporting evidence.'],
                    ['question' => 'Can you help me claim a tax refund?', 'answer' => 'Yes. If tax has been over-withheld or overpaid, we can prepare and file the refund application and follow up with the department through to processing.'],
                ],
            ],
            [
                'title' => 'Sales Tax',
                'items' => [
                    ['question' => 'Does my business need to register for sales tax?', 'answer' => 'It depends on your business type, turnover, and sector — manufacturers, importers, wholesalers, distributors, and certain retailers are typically required to register, though thresholds and exemptions vary. We can assess whether registration is mandatory or advisable for your specific business.'],
                    ['question' => 'How often do I need to file a sales tax return?', 'answer' => 'Sales tax returns are generally filed monthly, with the return for a given month typically due by the 18th of the following month.'],
                    ['question' => 'What\'s involved in a sales tax audit, and how should I prepare?', 'answer' => 'A sales tax audit reviews your input and output tax records, invoices, and return filings for a given period. Preparation involves having reconciled records ready — particularly your purchase and sales annexures — and a clear paper trail for any exemptions or zero-rated claims. We represent clients through the audit process, from the initial notice to the final order.'],
                    ['question' => 'Can I claim a sales tax refund, and how long does it usually take?', 'answer' => 'Refunds are available where input tax exceeds output tax in a given period, subject to conditions. Processing times vary, and refund claims are often scrutinized closely — we prepare the claim with proper documentation and follow up with the department to keep it moving.'],
                    ['question' => 'What is digital invoicing, and is it my responsibility or my consultant\'s?', 'answer' => 'Digital/e-invoicing compliance — generating and issuing invoices through FBR\'s system — is the responsibility of the registered taxpayer (i.e. the business itself). Our role is advisory and supervisory: helping you set up correctly and reviewing compliance, rather than issuing invoices on your behalf.'],
                    ['question' => 'What happens if I want to de-register from sales tax?', 'answer' => 'De-registration is available where a business no longer meets the criteria requiring registration, or has ceased the relevant activity. It involves a formal application and clearance of outstanding liabilities/returns — we can guide you through this process.'],
                ],
            ],
            [
                'title' => 'Withholding Tax',
                'items' => [
                    ['question' => 'What is withholding tax, and why does it apply to my business even if I\'m not the one ultimately paying it?', 'answer' => 'Withholding tax requires the payer of certain transactions (salary, rent, payments for goods/services/contracts, and others) to deduct tax at source and deposit it with the FBR on behalf of the recipient. If your business makes these kinds of payments, you may be legally required to withhold — regardless of whether the tax is "yours."'],
                    ['question' => 'I received a notice saying I failed to withhold tax correctly — what happens now?', 'answer' => 'This is typically issued under provisions dealing with default in withholding, and can relate to any of several expense heads (purchases, rent, salaries, wages, services, fuel, etc.). It requires a documented reply addressing each contested head, usually within a set deadline. We handle these replies regularly, including building out the supporting calculations and legal basis for each line item.'],
                    ['question' => 'What\'s the difference between the tax I failed to withhold and being asked to pay it myself?', 'answer' => 'If withholding wasn\'t deducted where it should have been, recovery can be sought either from the party that should have received the deduction, or — in some circumstances — from the payer who failed to withhold. Which applies depends on the facts; this is often the crux of the dispute in these matters.'],
                    ['question' => 'What are Sections 236G and 236H, and which one applies to my business?', 'answer' => 'Both relate to advance tax collected on sales — Section 236G applies to sales made to distributors, dealers, and wholesalers, while Section 236H applies to sales made to retailers. The correct rate and applicability depend on who your business is selling to and its role in the supply chain (e.g. manufacturer vs. distributor) — this is a common area of rate disputes.'],
                    ['question' => 'Can I get an exemption from having tax withheld on payments to me?', 'answer' => 'In some cases, yes — an exemption certificate can be obtained where you can demonstrate your existing tax position doesn\'t warrant further withholding. We can assess your eligibility and handle the application.'],
                    ['question' => 'How often do I need to file a withholding statement?', 'answer' => 'Withholding statements are generally filed quarterly, listing all withholding transactions and amounts deposited during the period.'],
                ],
            ],
            [
                'title' => 'Tax Litigation & Representation',
                'items' => [
                    ['question' => 'What should I do if I disagree with a tax assessment or order?', 'answer' => 'You generally have the right to appeal. The process typically starts with an appeal to the Commissioner Inland Revenue (Appeals), and can proceed further to the Appellate Tribunal Inland Revenue, the High Court, and ultimately the Supreme Court if the matter involves a substantial question of law.'],
                    ['question' => 'How long do I have to file an appeal?', 'answer' => 'Appeal deadlines are strict and vary by forum and order type — generally a matter of weeks from the date of the order. It\'s important to act quickly once an order is received; we recommend reaching out as soon as you get an unfavorable order rather than waiting.'],
                    ['question' => 'Can recovery proceedings be paused while my appeal is pending?', 'answer' => 'In many cases, yes — a stay application can be filed to request that recovery be held off pending the outcome of the appeal. This is separate from the appeal itself and needs to be pursued proactively.'],
                    ['question' => 'What is a rectification application, and when would I use one?', 'answer' => 'A rectification application asks the department to correct an apparent, obvious error in an order — a miscalculation or clear mistake — without going through a full appeal. It\'s a quicker route where the error is clear-cut.'],
                    ['question' => 'Is there an alternative to going through the full appeal process?', 'answer' => 'Alternative Dispute Resolution (ADR) is available in certain cases as a way to resolve disputes outside the standard appellate ladder. Whether it\'s suitable depends on the nature and stage of the dispute — we can advise if it\'s a good fit for your case.'],
                    ['question' => 'Will you represent me personally at hearings, or just prepare the paperwork?', 'answer' => 'We handle both — preparing the written submissions and appearing at hearings before the relevant forum, from the initial notice stage through to the higher appellate forums where needed.'],
                ],
            ],
        ];
    @endphp

    <div class="banner-area faq-hero section-padding--md">
        <div class="container">
            <div class="cr-breadcrumb faq-hero-content">
                <h1>Your Tax Questions, Answered</h1>
                <p>Browse questions on income tax, sales tax, withholding tax, and tax litigation & representation.</p>

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

        <section class="cta-area section-padding--sm pf-cta-section bg--abstruct-mask">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="calltoaction text-center">
                            <h3>Still Have <span class="color--theme">Questions?</span></h3>
                            <p>Talk to a FINANIC consultant about your income tax, sales tax, withholding tax, or litigation matter.</p>
                            <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                                <a href="{{ url('/contact') }}" class="cr-btn"><span>Contact Us</span></a>
                                <a href="https://wa.me/923222244000" class="cr-btn cr-btn--transparent" target="_blank" rel="noopener"><span>Message on WhatsApp</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
