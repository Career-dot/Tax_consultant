@extends('layouts.app')

@section('title', 'NTN Registration | FINANIC Business Consultants')
@section('meta_description', 'National Tax Number (NTN) registration with FBR for salaried individuals, sole proprietors, partnerships, companies, and non-profit organizations.')
@section('body_class', 'pf-service-body')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/family-tax/base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/family-tax/ntn-registration.css') }}">
@endpush

@section('content')
    <div class="family-tax-frontend ntn-registration-page">
        <!-- ===== HERO ===== -->
            <section class="hero">
              <div class="hero-bg-shape"></div>
              <div class="container hero-inner">
                <p class="eyebrow">NTN REGISTRATION</p>
                <h1 class="hero-title">NTN Registration in Pakistan: Get Registered with FBR</h1>
                <p class="hero-subtitle">
                  Your National Tax Number (NTN) is your gateway to formal financial participation in Pakistan.
                  Whether you're a salaried employee, business owner, or running a non-profit, FINANIC registers
                  your NTN with FBR accurately and correctly, as part of our income tax services.
                </p>

                <div class="hero-buttons">
                  <a href="{{ route('contact') }}" class="btn btn-white">Register My NTN <span class="arrow">-></span></a>
                  <a href="#categories" class="btn btn-outline-white">View Registration Categories</a>
                </div>
              </div>
            </section>

            <!-- ===== WHAT IS NTN ===== -->
            <section class="about-ntn">
              <div class="container narrow">
                <h2 class="section-title center">What is a National Tax Number (NTN)?</h2>
                <p class="section-subtitle center">
                  A National Tax Number (NTN) is a unique identification number issued by the Federal
                  Board of Revenue (FBR) of Pakistan. It serves as your official tax identity and is required
                  for virtually all formal financial and legal activities in the country.
                </p>

                <ul class="check-list">
                  <li><span class="check-icon">✓</span> Mandatory for opening a business bank account in Pakistan</li>
                  <li><span class="check-icon">✓</span> Required for property purchase and registration transactions</li>
                  <li><span class="check-icon">✓</span> Needed to register a company with SECP</li>
                  <li><span class="check-icon">✓</span> Enables you to become an Active Tax Filer on the ATL</li>
                  <li><span class="check-icon">✓</span> Required for government tenders and contracts</li>
                  <li><span class="check-icon">✓</span> Necessary for registering vehicles above certain thresholds</li>
                  <li><span class="check-icon">✓</span> Required for foreign remittance above specified limits</li>
                  <li><span class="check-icon">✓</span> Enables you to claim tax refunds and credits from FBR</li>
                </ul>
              </div>
            </section>

            <!-- ===== CATEGORIES ===== -->
            <section class="categories" id="categories">
              <div class="container narrow">
                <h2 class="section-title center">Registration Categories We Handle</h2>

                <div class="category-list">

                  <article class="category-card featured">
                    <div class="card-top">
                      <span class="cat-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none">
                          <path d="M12 12a4 4 0 100-8 4 4 0 000 8zM4 20c0-3.3 3.6-6 8-6s8 2.7 8 6" stroke="currentColor"
                            stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                      </span>
                      <span class="badge">Most Common</span>
                    </div>
                    <h3>Salaried Individual</h3>
                    <p class="cat-desc">For individuals earning a salary from any employer: government, private sector, or
                      semi-government organisations.</p>
                    <p class="cat-docs"><strong>Docs:</strong> CNIC, salary slip or employment letter, employer NTN</p>
                  </article>

                  <article class="category-card">
                    <div class="card-top">
                      <span class="cat-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none">
                          <path d="M4 8h16v11H4V8zM8 8V6a2 2 0 012-2h4a2 2 0 012 2v2" stroke="currentColor" stroke-width="1.6"
                            stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                      </span>
                    </div>
                    <h3>Sole Proprietor</h3>
                    <p class="cat-desc">For individual business owners operating a business under their own name or a trade
                      name. Includes shopkeepers, traders, contractors, consultants, and freelancers.</p>
                    <p class="cat-docs"><strong>Docs:</strong> CNIC, business address proof, business bank account details (if
                      any), trade name</p>
                  </article>

                  <article class="category-card">
                    <div class="card-top">
                      <span class="cat-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none">
                          <circle cx="9" cy="8" r="3" stroke="currentColor" stroke-width="1.6" />
                          <circle cx="17" cy="9" r="2.4" stroke="currentColor" stroke-width="1.6" />
                          <path d="M3 20c0-3 2.7-5.4 6-5.4s6 2.4 6 5.4M15 20c0-2.4 1.8-4.4 4-4.4" stroke="currentColor"
                            stroke-width="1.6" stroke-linecap="round" />
                        </svg>
                      </span>
                    </div>
                    <h3>Partnership / AOP</h3>
                    <p class="cat-desc">For partnership firms and Associations of Persons operating under a formal or informal
                      partnership arrangement.</p>
                    <p class="cat-docs"><strong>Docs:</strong> CNICs of all partners, partnership deed, business address proof,
                      bank account details</p>
                  </article>

                  <article class="category-card">
                    <div class="card-top">
                      <span class="cat-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none">
                          <path d="M4 21V7l8-4 8 4v14M9 21v-6h6v6M4 21h16" stroke="currentColor" stroke-width="1.6"
                            stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                      </span>
                    </div>
                    <h3>Company (Pvt Ltd / SMC / LLP)</h3>
                    <p class="cat-desc">For companies incorporated under SECP: Private Limited, Single Member, or Limited
                      Liability Partnership.</p>
                    <p class="cat-docs"><strong>Docs:</strong> SECP incorporation certificate, CNICs of directors, Memorandum &
                      Articles of Association, registered office address</p>
                  </article>

                  <article class="category-card">
                    <div class="card-top">
                      <span class="cat-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none">
                          <path
                            d="M12 21s-7-4.4-9.5-9.1C.8 8.4 2.7 5 6.2 5c2 0 3.4 1.1 4.2 2.3C11.2 6.1 12.6 5 14.6 5c3.5 0 5.4 3.4 3.7 6.9C19 16.6 12 21 12 21z"
                            stroke="currentColor" stroke-width="1.6" stroke-linejoin="round" />
                        </svg>
                      </span>
                    </div>
                    <h3>Non-Profit Organization (NPO)</h3>
                    <p class="cat-desc">For registered non-profit organisations, trusts, welfare societies, charities, and
                      foundations.</p>
                    <p class="cat-docs"><strong>Docs:</strong> Registration certificate (SECP / Registrar), CNICs of
                      trustees/directors, constitution/MOA, registered address</p>
                  </article>

                </div>
              </div>
            </section>

            <!-- ===== HOW IT WORKS ===== -->
            <section class="how-it-works" id="how-it-works">
              <div class="container narrow">
                <h2 class="section-title center">How NTN Registration Works</h2>

                <ol class="steps-list">
                  <li><span class="step-index">1</span> Get in touch and confirm your registration category</li>
                  <li><span class="step-index">2</span> Submit required documents to our team</li>
                  <li><span class="step-index">3</span> Our team verifies documents and prepares your FBR IRIS registration
                    application</li>
                  <li><span class="step-index">4</span> Application is submitted to FBR IRIS system</li>
                  <li><span class="step-index">5</span> FBR processes and approves the NTN</li>
                  <li><span class="step-index">6</span> Your NTN certificate and login credentials are delivered to you</li>
                </ol>
              </div>
            </section>

            <!-- ===== FAQ ===== -->
            <section class="faq" id="faq">
              <div class="container narrow">
                <h2 class="section-title center">Frequently Asked Questions</h2>

                <div class="accordion" id="accordion">
                  <div class="accordion-item open">
                    <button class="accordion-trigger" aria-expanded="true">
                      Can I check if I already have an NTN?
                      <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-panel">
                      <p>Yes, you can verify registration status through FBR records using your CNIC or business details. Many people have an NTN but are not registered as active filers — FINANIC can also help you activate your filer status.
                      </p>
                    </div>
                  </div>

                  <div class="accordion-item">
                    <button class="accordion-trigger" aria-expanded="false">
                      Is there a difference between NTN and STRN?
                      <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-panel">
                      <p>Yes. NTN (National Tax Number) identifies you for income tax purposes, while STRN (Sales Tax
                        Registration Number) is required separately for businesses that are registered for sales tax. Not every
                        NTN holder needs an STRN.</p>
                    </div>
                  </div>

                  <div class="accordion-item">
                    <button class="accordion-trigger" aria-expanded="false">
                      What if I previously had an NTN but lost access?
                      <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-panel">
                      <p>If you had an NTN before but lost access to your IRIS account, FINANIC can help you recover your
                        login credentials and reactivate your profile without creating a duplicate registration.</p>
                    </div>
                  </div>
                </div>
              </div>
            </section>

            <!-- ===== CTA ===== -->
            <section class="cta-band">
              <div class="container cta-inner">
                <h2>Ready to Register Your NTN?</h2>
                <p>Talk to a FINANIC consultant to confirm your category and get registered with FBR.</p>
                <div class="cta-buttons">
                  <a href="{{ route('contact') }}" class="btn btn-white">Talk to a Consultant <span class="arrow">-></span></a>
                  <a href="https://wa.me/923XXXXXXXXX" class="btn btn-outline-white" target="_blank" rel="noopener">Message on WhatsApp</a>
                </div>
              </div>
            </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/family-tax/ntn-registration.js') }}" defer></script>
@endpush
