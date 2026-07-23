@extends('layouts.app')

@section('title', 'About Us - Tax Consultant')

@section('content')
    @php
        $whyChooseUs = [
            ['icon' => 'fa-graduation-cap', 'title' => 'Integrity', 'text' => 'We never compromise on accuracy or compliance. Every filing we submit is legally correct and in full compliance with FBR regulations.'],
            ['icon' => 'fa-check-square-o', 'title' => 'Transparency', 'text' => 'What you see in our pricing is what you pay. We communicate all fees, timelines, and service details clearly and upfront. No hidden charges, ever.'],
            ['icon' => 'fa-clock-o', 'title' => 'Accessibility', 'text' => 'We believe every Pakistani deserves access to professional tax services at a fair price.'],
            ['icon' => 'fa-lock', 'title' => 'Excellence', 'text' => 'We hold ourselves to the highest professional standards. Our CA team reviews every filing, our processes are continuously improved.'],
           
        ];

        $services = [
            ['icon' => 'fa-user-o', 'title' => 'Personal Tax Filing', 'text' => 'Income tax returns for salaried individuals, freelancers, property owners and overseas Pakistanis.', 'url' => route('pricing')],
            ['icon' => 'fa-briefcase', 'title' => 'Business Tax Filing', 'text' => 'Tax return preparation for sole proprietors, partnerships, AOPs and registered companies.', 'url' => route('pricing')],
            ['icon' => 'fa-id-card-o', 'title' => 'NTN Registration', 'text' => 'FBR registration support for individuals, proprietors, partnerships and companies.', 'url' => route('pricing')],
            ['icon' => 'fa-file-text-o', 'title' => 'GST Registration', 'text' => 'Sales tax registration, monthly filing guidance and compliance support.', 'url' => route('pricing')],
            ['icon' => 'fa-building-o', 'title' => 'Company Registration', 'text' => 'Business registration assistance for entrepreneurs, SMEs and corporate clients.', 'url' => url('/contact')],
            ['icon' => 'fa-comments-o', 'title' => 'Tax Consultancy', 'text' => 'Professional advice for notices, planning, withholding taxes and annual compliance.', 'url' => url('/contact')],
        ];

        $stats = [
            ['number' => '5000+', 'label' => 'Tax Returns Filed'],
            ['number' => '15+', 'label' => 'NTNs Registered'],
            ['number' => '98%', 'label' => 'Client Satisfaction'],
            ['number' => '100%', 'label' => 'Secure & Encrypted'],
        ];

        $team = [
            ['image' => 'advisor-1.webp', 'name' => 'Adeel Khan', 'role' => 'Senior Tax Consultant'],
            ['image' => 'advisor-2.webp', 'name' => 'Sara Ahmed', 'role' => 'Corporate Compliance Lead'],
            ['image' => 'advisor-3.webp', 'name' => 'Bilal Sheikh', 'role' => 'NTN & GST Specialist'],
            ['image' => 'advisor-4.webp', 'name' => 'Mariam Raza', 'role' => 'Client Success Manager'],
        ];

        $process = [
            ['icon' => 'fa-comments-o', 'title' => 'Consultation', 'text' => 'We understand your income profile, business structure and filing requirements.'],
            ['icon' => 'fa-folder-open-o', 'title' => 'Document Collection', 'text' => 'Our team shares a clear checklist and organizes the required records.'],
            ['icon' => 'fa-calculator', 'title' => 'Tax Preparation', 'text' => 'Your return is prepared with tax credits, assets and deductions reviewed.'],
            ['icon' => 'fa-search', 'title' => 'Review', 'text' => 'A consultant checks the return and confirms the details before submission.'],
            ['icon' => 'fa-paper-plane-o', 'title' => 'Submission', 'text' => 'We file with FBR and share acknowledgement for your records.'],
            ['icon' => 'fa-life-ring', 'title' => 'Support', 'text' => 'Post-filing support is available for ATL tracking, notices and future compliance.'],
        ];

        $testimonials = [
            ['image' => 'testimonial-author-1.webp', 'name' => 'Ayesha Khan', 'role' => 'Salaried Professional', 'text' => 'The team made my first tax filing simple. Every step was explained clearly and submitted on time.'],
            ['image' => 'testimonial-author-2.webp', 'name' => 'Hamza Ali', 'role' => 'Business Owner', 'text' => 'Their business filing support was organized, professional and transparent from the first call.'],
            ['image' => 'testimonial-author-3.webp', 'name' => 'Sara Niazi', 'role' => 'Freelancer', 'text' => 'I had foreign income questions and they handled the whole process with patience and accuracy.'],
        ];

        $faqs = [
            ['question' => 'Who can use your tax filing services?', 'answer' => 'We support salaried individuals, freelancers, business owners, companies, property owners and overseas Pakistanis who need reliable tax compliance in Pakistan.'],
            ['question' => 'Do I need to visit your office?', 'answer' => 'Most services can be completed online. Our consultants collect information digitally, prepare the case and guide you through approval or filing steps.'],
            ['question' => 'Is my financial information secure?', 'answer' => 'Yes. We only request the information required for your case and handle documents through a controlled, confidential workflow.'],
            ['question' => 'Can you help with FBR notices?', 'answer' => 'Yes. Our consultants can review FBR notices, explain the response required and help prepare supporting documentation.'],
        ];
    @endphp

    <div class="cr-breadcrumb-area section-padding--md">
        <div class="container">
            <div class="cr-breadcrumb ">
                <h1>Pakistan's Most Trusted Online <span> Tax Consultant</span> Platform</h1>
                <p>We started Tax Consultant with a simple mission: to make Pakistan's complex tax system accessible, understandable, and manageable for every citizen, from first-time filers to established businesses.</p>
                
            </div>
        </div>
    </div>

    <div class="page-content about-page">
        <section class="about-intro-area section-padding--xlg bg--white">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="about-image-frame wow slideInLeft">
                            <img src="{{ asset('assets/images/about/about-thumbnail.webp') }}" alt="Tax consultants working with clients">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="section-title no-padding">
                            <h4>ABOUT COMPANY</h4>
                            <h2>Pakistan's Trusted <span class="color--theme">Tax Partner</span></h2>
                            <p>We help individuals, freelancers and businesses file taxes, register with FBR and stay compliant without confusing paperwork or repeated office visits.</p>
                        </div>
                        <div class="about-mission-grid">
                            <article>
                                <span><i class="fa fa-bullseye"></i></span>
                                <h3>Our Mission</h3>
                                <p>Make professional tax compliance simple, affordable and accessible through expert online support.</p>
                            </article>
                            <article>
                                <span><i class="fa fa-eye"></i></span>
                                <h3>Our Vision</h3>
                                <p>Become the most reliable digital tax partner for Pakistanis at home and abroad.</p>
                            </article>
                        </div>
                        <a href="{{ url('/contact') }}" class="cr-btn"><span>Read More</span></a>
                    </div>
                </div>
            </div>
        </section>

        <section class="about-feature-area section-padding--xlg bg--grey--light">
            <div class="container">
                <div class="section-title text-center">
                    
                    <h2>Why We Built <span class="color--theme">Tax Consultant</span></h2>
                    <p>Pakistan has millions of taxpayers who are either unaware of their filing obligations, unable to navigate FBR's complex systems, or forced to pay excessive CA fees for straightforward filings. We saw this gap and decided to fill it.By combining professional CA expertise with technology, we created a platform that makes tax filing as simple as ordering food online. You submit your information, we handle the complexity, and you receive your filing confirmation, without ever leaving your home.Since launch, we have helped thousands of Pakistanis become active tax filers, registered hundreds of businesses, and saved our clients significant time and money. And we're just getting started.</p>
                </div>

                <div class="row g-4 bg-wheet">
                    
                    
                </div>
            </div>
        </section>

        <section class="about-services-area section-padding--xlg bg--white">
            <div class="container">
                <div class="section-title text-center">
                     <h2>The Values That Drive Us</h2>
                       <p>Pakistan has millions of taxpayers who are either unaware of their filing obligations, unable to navigate FBR's complex systems, or forced to pay excessive CA fees for straightforward filings. We saw this gap and decided to fill it.
                    </p>
                </div>

                <div class="row g-4">
                   @foreach ($whyChooseUs as $item)
                        <div class=" col-md-6">
                            <article class="about-feature-card wow fadeInUp">
                                <span><i class="fa {{ $item['icon'] }}"></i></span>
                                <h3>{{ $item['title'] }}</h3>
                                <p>{{ $item['text'] }}</p>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="funfact-area bg--grey--light section-padding--lg">
            <div class="container">
                <div class="row funfacts">
                    @foreach ($stats as $stat)
                        <div class="col-lg-3 col-sm-6">
                            <div class="funfact text-center about-stat-box">
                                <h2><span class="counter">{{ $stat['number'] }}</span></h2>
                                <h5>{{ $stat['label'] }}</h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="advisor-area bg--white section-padding--xlg">
            <div class="container">
                <div class="section-title text-center">
                    <h4>MEET OUR TEAM</h4>
                    <h2>Professional <span class="color--theme">Tax Advisors</span></h2>
                    <p>Our consultants bring tax knowledge, documentation discipline and client-first communication to every case.</p>
                </div>

                <div class="row advisors">
                    @foreach ($team as $member)
                        <div class="col-lg-3 col-sm-6">
                            <figure class="advisor about-advisor-card">
                                <div class="advisor__image">
                                    <img src="{{ asset('assets/images/advisors/' . $member['image']) }}" alt="{{ $member['name'] }}">
                                    <div class="about-team-social">
                                        <a href="https://www.facebook.com/" aria-label="Facebook"><i class="fa fa-facebook"></i></a>
                                        <a href="https://twitter.com/" aria-label="Twitter"><i class="fa fa-twitter"></i></a>
                                        <a href="https://www.linkedin.com/" aria-label="LinkedIn"><i class="fa fa-linkedin"></i></a>
                                    </div>
                                </div>
                                <figcaption class="advisor__content">
                                    <h6>{{ $member['name'] }}</h6>
                                    <p>{{ $member['role'] }}</p>
                                </figcaption>
                            </figure>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="about-process-area section-padding--xlg bg--grey--light">
            <div class="container">
                <div class="section-title text-center">
                    <h4>OUR PROCESS</h4>
                    <h2>From Consultation To <span class="color--theme">Submission</span></h2>
                </div>

                <div class="row g-4">
                    @foreach ($process as $index => $step)
                        <div class="col-lg-4 col-md-6">
                            <article class="about-process-card wow fadeInUp">
                                <!-- <div class="about-process-number">{{ $index + 1 }}</div> -->
                                <span><i class="fa {{ $step['icon'] }}"></i></span>
                                <h3>{{ $step['title'] }}</h3>
                                <p>{{ $step['text'] }}</p>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="testimonial-area section-padding--xlg bg--white">
            <div class="container">
                <div class="section-title text-center">
                    <h4>CLIENT FEEDBACK</h4>
                    <h2>Trusted By <span class="color--theme">Tax Filers</span></h2>
                </div>

                <div class="row g-4">
                    @foreach ($testimonials as $testimonial)
                        <div class="col-lg-4 col-md-6">
                            <article class="pf-testimonial-card about-testimonial-card">
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
<!-- 
        <section class="about-faq-area section-padding--xlg bg--grey--light">
            <div class="container">
                <div class="section-title text-center">
                    <h4>FAQ</h4>
                    <h2>Frequently Asked <span class="color--theme">Questions</span></h2>
                </div>

                <div class="accordion korde-faq mx-auto" id="aboutFaq">
                    @foreach ($faqs as $index => $faq)
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="aboutFaqHeading{{ $index }}">
                                <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#aboutFaqCollapse{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="aboutFaqCollapse{{ $index }}">
                                    {{ $faq['question'] }}
                                </button>
                            </h3>
                            <div id="aboutFaqCollapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="aboutFaqHeading{{ $index }}" data-bs-parent="#aboutFaq">
                                <div class="accordion-body">{{ $faq['answer'] }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section> -->

        <section class="cta-area section-padding--sm pf-cta-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="calltoaction text-center">
                            <h3>Ready To Simplify Your <span class="color--theme">Tax Journey?</span></h3>
                            <p>Start with a consultant-led process that keeps tax filing simple, secure and professionally handled.</p>
                            <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                                <a href="{{ url('/contact') }}" class="cr-btn"><span>Get Started</span></a>
                                <a href="{{ url('/contact') }}" class="cr-btn cr-btn--transparent"><span>Contact Us</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
