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
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="banner__single__content text-center">
                                <h1 class="mt-5 pt-5">Your
                                    <span class="color--theme">Taxes,</span>filed in
                                    <span class="color--theme">6</span> minutes.</h1>
                                    <p>CA/ACCA consultants handle everything â€” income tax, NTN, GST, business registration, and USA LLC â€” fully online. You answer a few questions; we do the rest.</p>
                                <a href="{{ url('/contact') }}" class="cr-btn">
                                    <span>File my tax return </span>
                                </a>
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

        <!-- Features Area -->
        <section id="features-area" class="cr-section features-area">
            <div class="row g-0">
                <div class="col-lg-4">
                    <div class="feature">
                        <div class="feature__icon">
                            <span><i class="flaticon-shield"></i></span>
                            <span><i class="flaticon-shield"></i></span>
                        </div>
                        <div class="feature__content">
                            <h4 class="wow fadeInUp">
                                <a href="{{ url('/features') }}">ENSURE SECURITY</a>
                            </h4>
                            <p class="wow fadeInUp" data-wow-delay="0.15s">Perspiciatis unde omnis ist natus error sit voluptatem accusantium loremque tium totam rem aperiam eaque </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="feature active">
                        <div class="feature__icon">
                            <span><i class="flaticon-team"></i></span>
                            <span><i class="flaticon-team"></i></span>
                        </div>
                        <div class="feature__content">
                            <h4 class="wow fadeInUp">
                                <a href="{{ url('/features') }}">EXPERT TEAM</a>
                            </h4>
                            <p class="wow fadeInUp" data-wow-delay="0.15s">Perspiciatis unde omnis ist natus error sit voluptatem accusantium loremque tium totam rem aperiam eaque </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="feature">
                        <div class="feature__icon">
                            <span><i class="flaticon-24-hours"></i></span>
                            <span><i class="flaticon-24-hours"></i></span>
                        </div>
                        <div class="feature__content">
                            <h4 class="wow fadeInUp">
                                <a href="{{ url('/features') }}">24/7 SUPPORT</a>
                            </h4>
                            <p class="wow fadeInUp" data-wow-delay="0.15s">Perspiciatis unde omnis ist natus error sit voluptatem accusantium loremque tium totam rem aperiam eaque </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--// Features Area -->

        <!-- Service Area -->
        <section id="service-area" class="service-area section-padding--xlg bg--white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10">
                        <div class="section-title">
                            <h4>OUR SERVICES</h4>
                            <h2>PROVIDE BEST
                                <span class="color--theme">SERVICES</span>
                            </h2>
                            <p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                                ipsa quae</p>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="service-area__services">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 wow flipInX">
                                    <div class="service">
                                        <div class="service__icon">
                                            <img src="{{ asset('assets/images/icons/service-icon-user.webp') }}" alt="service icon">
                                        </div>
                                        <div class="service__content">
                                            <h5><a href="{{ url('/services') }}">PERSONAL TAX</a></h5>
                                            <p>Perspiciatis unde omnis ist natus error sit voluptatem accusantium loremque tium totam rem per </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 wow flipInX">
                                    <div class="service">
                                        <div class="service__icon">
                                            <img src="{{ asset('assets/images/icons/service-icon-bar.webp') }}" alt="service icon">
                                        </div>
                                        <div class="service__content">
                                            <h5><a href="{{ url('/services') }}">CORPORATE TAX</a></h5>
                                            <p>Perspiciatis unde omnis ist natus error sit voluptatem accusantium loremque tium totam rem per </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 wow flipInX">
                                    <div class="service">
                                        <div class="service__icon">
                                            <img src="{{ asset('assets/images/icons/service-icon-briefcase.webp') }}" alt="service icon">
                                        </div>
                                        <div class="service__content">
                                            <h5><a href="{{ url('/services') }}">Business TAX</a></h5>
                                            <p>Perspiciatis unde omnis ist natus error sit voluptatem accusantium loremque tium totam rem per </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 wow flipInX">
                                    <div class="service">
                                        <div class="service__icon">
                                            <img src="{{ asset('assets/images/icons/service-icon-pie.webp') }}" alt="service icon">
                                        </div>
                                        <div class="service__content">
                                            <h5><a href="{{ url('/services') }}">Finance TAX</a></h5>
                                            <p>Perspiciatis unde omnis ist natus error sit voluptatem accusantium loremque tium totam rem per </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="service-area__bars text-center">
                            <div class="cr-bars justify-content-lg-end justify-content-center">
                                <div class="cr-bar" data-bar-percent="25" data-bar-title="2013"></div>
                                <div class="cr-bar" data-bar-percent="45" data-bar-title="2014"></div>
                                <div class="cr-bar" data-bar-percent="37" data-bar-title="2015"></div>
                                <div class="cr-bar" data-bar-percent="69" data-bar-title="2016"></div>
                                <div class="cr-bar" data-bar-percent="88" data-bar-title="2022"></div>
                            </div>
                            <span class="cr-bars__name">Our progress</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--// Service Area -->

        <!-- Tax Calculation Area -->
        <section id="tax-calculation" class="tax-calculation-area bg--grey--light">
            <div class="taxcalc">
                <div class="row no-gutters align-items-center">
                    <div class="col-xl-5">
                        <div class="taxcalc__content" data-black-overlay="4">
                            <div class="taxcalc__content__inner">
                                <h3>TAX
                                    <span class="color--theme">CALCULATION</span>
                                </h3>
                                <p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudanti, totam rem aperiam, eaque
                                    ipsa quae so some thing new for tax calculation </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-7">
                        <div class="taxcalc__calculation">
                            <div class="taxcalc__calculation__inner">
                                <div class="row no-gutters">
                                    <div class="col-lg-6 col-md-6 wow fadeInUp">
                                        <div class="single-input">
                                            <label for="taxcalc-business-area">Choose Your Business Area*</label>
                                            <select name="taxcalc-business-area" id="taxcalc-business-area">
                                                <option value="1">Select your business</option>
                                                <option value="2">Marketing</option>
                                                <option value="3">IT Industries</option>
                                                <option value="4">Management Industries</option>
                                                <option value="5">Property Business</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.15">
                                        <div class="single-input">
                                            <label for="taxcalc-country-residence">Country of residence*</label>
                                            <select name="taxcalc-country-residence" id="taxcalc-country-residence">
                                                <option value="1">Australia</option>
                                                <option value="2">United States</option>
                                                <option value="3">United Kingdom</option>
                                                <option value="4">Germany</option>
                                                <option value="5">Netherland</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3">
                                        <div class="single-input">
                                            <label for="taxcalc-employee-counter">Number of Employees</label>
                                            <select name="taxcalc-employee-counter" id="taxcalc-employee-counter">
                                                <option value="1">Select Here</option>
                                                <option value="2">0 - 20</option>
                                                <option value="3">21 - 50</option>
                                                <option value="4">51 - 150</option>
                                                <option value="5">151 - 500</option>
                                                <option value="6">500+</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.45">
                                        <div class="single-input">
                                            <label for="taxcalc-tax-year">Tax Year*</label>
                                            <select name="taxcalc-tax-year" id="taxcalc-tax-year">
                                                <option value="1">2000 - 2005</option>
                                                <option value="2">2006 - 2010</option>
                                                <option value="3">2011 - 2015</option>
                                                <option value="4">2016 - 2020</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.6">
                                        <div class="single-input">
                                            <label for="taxcalc-yearly-income">Yearly Total Income</label>
                                            <select name="taxcalc-yearly-income" id="taxcalc-yearly-income">
                                                <option value="1">Select Range</option>
                                                <option value="2">0 - 1 Million</option>
                                                <option value="3">1 Million - 3 Million</option>
                                                <option value="4">3 Million - 10 Million</option>
                                                <option value="5">10 Million - 20 Million</option>
                                                <option value="6">20 Million+</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-8 col-md-8 wow fadeInUp" data-wow-delay="0.75">
                                        <div class="button-holder">
                                            <button class="cr-btn" type="submit">
                                                <span>Calculate</span>
                                            </button>
                                            <span class="equal-sign">=</span>
                                            <div class="single-input">
                                                <label for="taxcalc-total-calculation">Total Payable Tax</label>
                                                <input type="text" id="taxcalc-total-calculation" placeholder="$000.00" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--// Tax Calculation Area -->

        <!-- Team Area -->
        <section id="team-area" class="advisor-area bg--white section-padding--xlg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10">
                        <div class="section-title text-center">
                            <h4>OUR TEAM</h4>
                            <h2>MEET OUR
                                <span class="color--theme">TAX ADVISOR</span>
                            </h2>
                            <p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                                ipsa quae</p>
                        </div>
                    </div>
                </div>
                <div class="row advisors">
                    @foreach ([
                        ['image' => 'advisor-1.webp', 'name' => 'ALEX SMITH', 'role' => 'Tax Advisor'],
                        ['image' => 'advisor-2.webp', 'name' => 'JUSTIN BIEBER', 'role' => 'Tax Advisor'],
                        ['image' => 'advisor-3.webp', 'name' => 'JONATHAN DOE', 'role' => 'Tax Advisor'],
                        ['image' => 'advisor-4.webp', 'name' => 'JONATHAN SMITH', 'role' => 'Tax Advisor'],
                    ] as $advisor)
                        <div class="col-lg-3 col-sm-6">
                            <figure class="advisor">
                                <div class="advisor__image">
                                    <img src="{{ asset('assets/images/advisors/' . $advisor['image']) }}" alt="team member">
                                </div>
                                <figcaption class="advisor__content">
                                    <h6>{{ $advisor['name'] }}</h6>
                                    <p>{{ $advisor['role'] }}</p>
                                </figcaption>
                            </figure>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--// Team Area -->

        <!-- Funfact Area -->
        <section id="funfact-area" class="funfact-area bg--grey--light section-padding--lg">
            <div class="container">
                <div class="row funfacts">
                    <div class="col-lg-3 col-sm-6">
                        <div class="funfact text-center">
                            <h2><span class="counter">349</span></h2>
                            <h5>TRUSTED CLIENTS</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="funfact text-center">
                            <h2><span class="counter">109</span></h2>
                            <h5>AWARDS WIN</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="funfact text-center">
                            <h2><span class="counter">459</span></h2>
                            <h5>PROJECT DONE</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="funfact text-center">
                            <h2><span class="counter">19</span></h2>
                            <h5>EXPERT ADVISOR</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--// Funfact Area -->

        <!-- Testimonial Area -->
        <section id="testimonial-area" class="testimonial-area section-padding--xlg bg--white">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10">
                        <div class="section-title text-center">
                            <h4>OUR TESTIMONIAL</h4>
                            <h2>CLIENT
                                <span class="color--theme">FEEDBACK</span>
                            </h2>
                            <p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                                ipsa quae</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial testimonial-slider-active">
                    <div class="testimonial__single">
                        <!-- <p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque -->
                            <!-- ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p> -->
                        <div class="testimonial__author">
                            <img src="{{ asset('assets/images/testimonial/testimonial-author-1.webp') }}" alt="testimonial author">
                            <h6>ALEX SMITH</h6>
                            <span>CEO, Company</span>
                        </div>
                    </div>
                    <div class="testimonial__single">
                        <p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                            ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                        <div class="testimonial__author">
                            <img src="{{ asset('assets/images/testimonial/testimonial-author-2.webp') }}" alt="testimonial author">
                            <h6>JUSTIN BIEBER</h6>
                            <span>CEO, Company</span>
                        </div>
                    </div>
                    <div class="testimonial__single">
                        <p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                            ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                        <div class="testimonial__author">
                            <img src="{{ asset('assets/images/testimonial/testimonial-author-3.webp') }}" alt="testimonial author">
                            <h6>JONATHAN DOE</h6>
                            <span>CEO, Company</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--// Testimonial Area -->

        <!-- Blog Area -->
        <section id="blog-area" class="blog-area bg--grey--light section-padding--xlg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10">
                        <div class="section-title text-center">
                            <h4>OUR BLOG</h4>
                            <h2>LATEST
                                <span class="color--theme">NEWS</span>
                            </h2>
                            <p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                                ipsa quae</p>
                        </div>
                    </div>
                </div>
                <div class="row blogs">
                    <div class="col-lg-6">
                        <article class="blog sticky">
                            <div class="blog__thumb">
                                <a href="{{ url('/blogs') }}">
                                    <img src="{{ asset('assets/images/blog/blog-thumbnail-1.webp') }}" alt="blog thumbnail">
                                </a>
                            </div>
                            <div class="blog__content">
                                <h4><a href="{{ url('/blogs') }}">How to save tax and get best return from your business</a></h4>
                                <footer class="blog__content__footer">
                                    <ul class="blog__content__meta">
                                        <li>October 28.</li>
                                        <li><a href="{{ url('/blogs') }}">Alex Smith.</a></li>
                                        <li><a href="{{ url('/blogs') }}">4 Comments</a></li>
                                    </ul>
                                    <p>Perspiciatis unde omnis iste natus error sit tatem accusantium doloremque laudanti, totam rem aperiam, eaque ipsa
                                        quae so some ulation </p>
                                </footer>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-6">
                        <article class="blog">
                            <div class="blog__thumb">
                                <a href="{{ url('/blogs') }}">
                                    <img src="{{ asset('assets/images/blog/blog-thumbnail-2.webp') }}" alt="blog thumbnail">
                                </a>
                            </div>
                            <div class="blog__content">
                                <h4><a href="{{ url('/blogs') }}">Tax planning is the first step toward financial stability</a></h4>
                                <footer class="blog__content__footer">
                                    <ul class="blog__content__meta">
                                        <li>October 28.</li>
                                        <li><a href="{{ url('/blogs') }}">Alex Smith.</a></li>
                                        <li><a href="{{ url('/blogs') }}">4 Comments</a></li>
                                    </ul>
                                    <p>Perspiciatis unde omnis iste natus error sit tatem accusantium doloremque laudanti, totam rem aperiam, eaque ipsa
                                        quae so some ulation </p>
                                </footer>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>
        <!--// Blog Area -->

        <!-- Call To Action Area -->
        <section id="cta-area" class="cta-area section-padding--sm bg--grey--light bg--abstruct-mask">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="calltoaction text-center">
                            <h3>NEED ANY HELP AT
                                <span class="color--theme"> YOUR TAX SOLUTION?</span>
                            </h3>
                            <p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                                ipsa Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci </p>
                            <h6>JUST DAIL
                                <a href="tel:+00812548359874">+008 12548 359 874</a> (TOLL FREE)</h6>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--// Call To Action Area -->
    </div>
    <!-- //Page Content -->
@endsection
