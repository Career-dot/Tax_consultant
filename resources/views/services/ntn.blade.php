@extends('layouts.app')

@section('title', 'NTN Registration | Tax Consultant')
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
                <!-- <nav class="breadcrumb" aria-label="Breadcrumb">
                  <a href="{{ route('contact') }}">Home</a>
                  <span class="crumb-sep">></span>
                  <a href="#services">Services</a>
                  <span class="crumb-sep">></span>
                  <span class="crumb-current">NTN Registration</span>
                </nav> -->
        
                <p class="eyebrow">NTN REGISTRATION</p>
                <h1 class="hero-title">NTN Registration in Pakistan: Get Registered with FBR Today</h1>
                <p class="hero-subtitle">
                  Your National Tax Number (NTN) is your gateway to formal financial participation in Pakistan.
                  Whether you're a salaried employee, business owner, or running a non-profit, Tax Consultant registers
                  your NTN with FBR quickly and correctly.
                </p>
        
                <div class="hero-buttons">
                  <a href="#categories" class="btn btn-white">Register My NTN Now <span class="arrow">-></span></a>
                  <a href="#categories" class="btn btn-outline-white">Check Pricing by Category</a>
                </div>
        
                <ul class="hero-badges">
                  <li>From Rs 500</li>
                  <li>1-3 Working Days</li>
                  <li>FBR Registered</li>
                  <li>5,000+ NTNs Issued</li>
                </ul>
              </div>
            </section>
        
            <!-- ===== PLATFORM PREVIEW ===== -->
            <section class="platform-preview" id="services">
              <div class="container">
                <h2 class="section-title center">See How It Works on Our Platform</h2>
                <p class="section-subtitle center">Select your NTN registration category, upload documents, and submit - all
                  from your dashboard.</p>
        
                <div class="dashboard-mock">
                  <div class="dashboard-mock-topbar">
                    <span class="dot red"></span><span class="dot yellow"></span><span class="dot green"></span>
                    <span class="dashboard-mock-title">Tax Consultant Dashboard</span>
                  </div>
        
                  <div class="dashboard-mock-body">
                    <ol class="progress-steps">
                      <li class="active"><span class="step-num">1</span> Purpose Selection</li>
                      <li class="step-line"></li>
                      <li><span class="step-num">2</span> Document Upload</li>
                      <li class="step-line"></li>
                      <li><span class="step-num">3</span> Submit Application</li>
                    </ol>
        
                    <div class="purpose-panel">
                      <h3>What is the purpose of your NTN Registration?</h3>
                      <p>Select the category that best describes your registration purpose</p>
        
                      <div class="purpose-grid" id="purposeGrid">
                        <!-- Card 1: Salaried -->
                        <button class="purpose-card" data-purpose="Salaried">
                          <span class="purpose-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                              stroke-linejoin="round">
                              <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                              <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                          </span>
                          <span class="purpose-name">Salaried</span>
                          <span class="purpose-desc">For individuals earning salary from employment</span>
                          <span class="purpose-price">Rs 500</span>
                          <span class="purpose-time">
                            <svg class="clock-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round">
                              <circle cx="12" cy="12" r="10"></circle>
                              <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                            1-2 Working Days
                          </span>
                        </button>
        
                        <!-- Card 2: Sole Proprietor -->
                        <button class="purpose-card" data-purpose="Sole Proprietor">
                          <span class="purpose-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                              stroke-linejoin="round">
                              <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                              <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                            </svg>
                          </span>
                          <span class="purpose-name">Sole Proprietor</span>
                          <span class="purpose-desc">For individual business owners</span>
                          <span class="purpose-price">Rs 1,500</span>
                          <span class="purpose-time">
                            <svg class="clock-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round">
                              <circle cx="12" cy="12" r="10"></circle>
                              <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                            1-2 Working Days
                          </span>
                        </button>
        
                        <!-- Card 3: Partnership or AOP -->
                        <button class="purpose-card" data-purpose="Partnership or AOP">
                          <span class="purpose-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                              stroke-linejoin="round">
                              <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                              <circle cx="9" cy="7" r="4"></circle>
                              <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                              <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                          </span>
                          <span class="purpose-name">Partnership or AOP</span>
                          <span class="purpose-desc">For partnerships and association of persons</span>
                          <span class="purpose-price">Rs 3,500</span>
                          <span class="purpose-time">
                            <svg class="clock-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round">
                              <circle cx="12" cy="12" r="10"></circle>
                              <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                            2-3 Working Days
                          </span>
                        </button>
        
                        <!-- Card 4: Company -->
                        <button class="purpose-card" data-purpose="Company">
                          <span class="purpose-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                              stroke-linejoin="round">
                              <rect x="4" y="2" width="16" height="20" rx="2" ry="2"></rect>
                              <line x1="9" y1="22" x2="9" y2="16"></line>
                              <line x1="15" y1="22" x2="15" y2="16"></line>
                              <line x1="9" y1="16" x2="15" y2="16"></line>
                              <path d="M8 6h.01"></path>
                              <path d="M16 6h.01"></path>
                              <path d="M8 10h.01"></path>
                              <path d="M16 10h.01"></path>
                              <path d="M12 6h.01"></path>
                              <path d="M12 10h.01"></path>
                              <path d="M8 14h.01"></path>
                              <path d="M16 14h.01"></path>
                              <path d="M12 14h.01"></path>
                            </svg>
                          </span>
                          <span class="purpose-name">Company</span>
                          <span class="purpose-desc">For registered companies and corporations</span>
                          <span class="purpose-price">Rs 7,000</span>
                          <span class="purpose-time">
                            <svg class="clock-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round">
                              <circle cx="12" cy="12" r="10"></circle>
                              <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                            2-3 Working Days
                          </span>
                        </button>
        
                        <!-- Card 5: NPO -->
                        <button class="purpose-card" data-purpose="NPO">
                          <span class="purpose-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                              stroke-linejoin="round">
                              <path
                                d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                              </path>
                            </svg>
                          </span>
                          <span class="purpose-name">NPO</span>
                          <span class="purpose-desc">For non-profit organizations</span>
                          <span class="purpose-price">Rs 9,000</span>
                          <span class="purpose-time">
                            <svg class="clock-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round">
                              <circle cx="12" cy="12" r="10"></circle>
                              <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                            2-3 Working Days
                          </span>
                        </button>
                      </div>
        
                      <div class="dashboard-mock-footer">
                        <a href="{{ route('contact') }}" class="back-link"><- Back to Dashboard</a>
                        <button class="btn btn-primary btn-sm" id="continueBtn" disabled>Continue -></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
        
            <!-- ===== WHAT IS NTN ===== -->
            <section class="about-ntn">
              <div class="container narrow">
                <h2 class="section-title center">What is a National Tax Number (NTN)?</h2>
                <p class="section-subtitle center">
                  A National Tax Number (NTN) is a unique 7-digit identification number issued by the Federal
                  Board of Revenue (FBR) of Pakistan. It serves as your official tax identity and is required
                  for virtually all formal financial and legal activities in the country.
                </p>
        
                <ul class="check-list">
                  <li><span class="check-icon">✓</span> Mandatory for opening a business bank account in Pakistan</li>
                  <li><span class="check-icon">✓</span> Required for property purchase and registration transactions</li>
                  <li><span class="check-icon">✓</span> Needed to register a company with SECP</li>
                  <li><span class="check-icon">✓</span> Enables you to become an Active Tax Filer</li>
                  <li><span class="check-icon">✓</span> Required for government tenders and contracts</li>
                  <li><span class="check-icon">✓</span> Necessary for registering vehicles above certain thresholds</li>
                  <li><span class="check-icon">✓</span> Required for foreign remittance above specified limits</li>
                  <li><span class="check-icon">✓</span> Enables you to claim tax refunds and credits from FBR</li>
                </ul>
              </div>
            </section>
        
            <!-- ===== PRICING CATEGORIES ===== -->
            <section class="categories" id="categories">
              <div class="container narrow">
                <h2 class="section-title center">Choose Your Registration Category</h2>
        
                <div class="category-list">
        
                  <article class="category-card featured">
                    <div class="card-top">
                      <span class="cat-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none">
                          <path d="M12 12a4 4 0 100-8 4 4 0 000 8zM4 20c0-3.3 3.6-6 8-6s8 2.7 8 6" stroke="currentColor"
                            stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                      </span>
                      <span class="badge">Most Popular</span>
                    </div>
                    <h3>Salaried Individual</h3>
                    <p class="cat-desc">For individuals earning a salary from any employer: government, private sector, or
                      semi-government organisations.</p>
                    <div class="cat-meta">
                      <div><span class="meta-label">Fee</span><span class="meta-value price">Rs 500</span></div>
                      <div><span class="meta-label">Time</span><span class="meta-value">1-2 Working Days</span></div>
                    </div>
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
                    <div class="cat-meta">
                      <div><span class="meta-label">Fee</span><span class="meta-value price">Rs 1,500</span></div>
                      <div><span class="meta-label">Time</span><span class="meta-value">1-2 Working Days</span></div>
                    </div>
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
                    <div class="cat-meta">
                      <div><span class="meta-label">Fee</span><span class="meta-value price">Rs 3,500</span></div>
                      <div><span class="meta-label">Time</span><span class="meta-value">2-3 Working Days</span></div>
                    </div>
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
                    <div class="cat-meta">
                      <div><span class="meta-label">Fee</span><span class="meta-value price">Rs 7,000</span></div>
                      <div><span class="meta-label">Time</span><span class="meta-value">2-3 Working Days</span></div>
                    </div>
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
                    <div class="cat-meta">
                      <div><span class="meta-label">Fee</span><span class="meta-value price">Rs 9,000</span></div>
                      <div><span class="meta-label">Time</span><span class="meta-value">2-3 Working Days</span></div>
                    </div>
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
                  <li><span class="step-index">1</span> Select your category and place your order on Tax Consultant</li>
                  <li><span class="step-index">2</span> Submit required documents via our secure portal</li>
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
                      <p>Yes, you can check your NTN status on the FBR website using your CNIC number. However, many people have
                        an NTN but are not registered as active filers. Tax Consultant can also help you activate your filer status.
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
                      <p>If you had an NTN before but lost access to your IRIS account, Tax Consultant can help you recover your
                        login credentials and reactivate your profile without creating a duplicate registration.</p>
                    </div>
                  </div>
                </div>
              </div>
            </section>
        
            <!-- ===== CTA ===== -->
            <section class="cta-band">
              <div class="container cta-inner">
                <h2>Ready to Become a Tax Filer Today?</h2>
                <p>Join thousands of Pakistanis who file their taxes online, quickly, securely, and affordably.</p>
                <div class="cta-buttons">
                  <a href="#categories" class="btn btn-white">Start Filing Now <span class="arrow">-></span></a>
                  <a href="{{ route('contact') }}" class="btn btn-outline-white">Talk to an Expert</a>
                </div>
              </div>
            </section>
        
        
          <!-- ===== FOOTER ===== -->
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/family-tax/ntn-registration.js') }}" defer></script>
@endpush
