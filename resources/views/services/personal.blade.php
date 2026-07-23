@extends('layouts.app')

@section('title', 'Personal Tax Filing | Tax Consultant')
@section('body_class', 'pf-service-body')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/family-tax/base.css') }}">
@endpush

@section('content')
    <div class="family-tax-frontend personal-tax-page">
        <!-- ===================== HERO SECTION ===================== -->
          <section class="page-hero">
            <div class="page-container hero-content">
              <div class="breadcrumbs">
                <a href="{{ route('home') }}">Home</a> &rsaquo; <span>Services</span> &rsaquo; <span>Personal Tax Filing</span>
              </div>
              <div class="hero-tagline">PERSONAL TAX FILING</div>
              <h1>Personal Income Tax Filing: Fast, Accurate & CA-Certified</h1>
              <p>File your annual FBR income tax return online without visiting any office. Our qualified Chartered Accountants
                handle your personal tax filing accurately, ensuring you stay compliant and take advantage of all eligible
                deductions.</p>
        
              <div class="hero-buttons">
                <a href="{{ route('contact') }}" class="btn-primary">Start Personal Tax Filing</a>
                <a href="{{ route('contact') }}" class="btn-primary outline">View Pricing</a>
              </div>
        
              <div class="hero-stats">
                <div class="stat-btn">Rs 999 Starting Price</div>
                <div class="stat-btn">1-3 Working Days</div>
                <div class="stat-btn">CA Reviewed</div>
                <div class="stat-btn">100% Online</div>
              </div>
            </div>
        
          </section>
          <div class="how-it-works">
            <h1 class="section-title">See How It Works on Our Platform</h1>
            <p class="section-subtitle">Two ways to file your personal tax return. Pick the method that suits you best.</p>
        
            <div class="panels">
        
              <!-- Panel 1: Online Filing Method -->
              <div class="panel">
                <h2 class="panel-label">Online Filing Method</h2>
        
                <div class="browser-window">
                  <div class="browser-topbar">
                    <div class="traffic-lights">
                      <span class="dot red"></span>
                      <span class="dot yellow"></span>
                      <span class="dot green"></span>
                    </div>
                    <span class="browser-title">Tax Consultant Dashboard</span>
                  </div>
        
                  <div class="app-header">
                    <div class="app-header-left">
                      <span class="user-icon">&#128100;</span>
                      <span class="app-heading">Personal Tax Filing</span>
                      <span class="badge">Self</span>
                    </div>
                    <button class="dashboard-btn" type="button">&rarr; Go to Dashboard</button>
                  </div>
        
                  <nav class="tab-row">
                    <span class="tab active">PERSONAL INFO <span class="chevron">&rsaquo;</span></span>
                    <span class="tab">INCOME CATEGORIES <span class="chevron">&rsaquo;</span></span>
                    <span class="tab">INCOME FORMS <span class="chevron">&rsaquo;</span></span>
                    <span class="tab">TAX CREDIT <span class="chevron">&rsaquo;</span></span>
                    <span class="tab">TAX DEDUCTED <span class="chevron">&rsaquo;</span></span>
                    <span class="tab">WEALTH STATEMENT <span class="chevron">&rsaquo;</span></span>
                  </nav>
                  <nav class="tab-row secondary">
                    <span class="tab">EXPENSE <span class="chevron">&rsaquo;</span></span>
                    <span class="tab">WRAP-UP <span class="chevron">&rsaquo;</span></span>
                    <span class="tab">SUMMARY <span class="chevron">&rsaquo;</span></span>
                    <span class="tab">FBR <span class="chevron">&rsaquo;</span></span>
                    <span class="tab">OPTIONAL ADDON</span>
                  </nav>
        
                  <div class="content">
                    <h3 class="content-title">Personal Information</h3>
                    <p class="content-sub">Filing Tax Return for 2024-2025 (Tax Year 2025)</p>
        
                    <div class="form-card">
                      <h4 class="form-card-title">Basic Information</h4>
        
                      <div class="form-grid">
                        <div class="form-field">
                          <label>Full Name *</label>
                          <input type="text" placeholder="Ahmad Ali" disabled>
                        </div>
                        <div class="form-field">
                          <label>Email Address *</label>
                          <input type="text" placeholder="ahmad@email.com" disabled>
                        </div>
                        <div class="form-field">
                          <label>Date of Birth *</label>
                          <input type="text" placeholder="mm/dd/yyyy" disabled>
                        </div>
                        <div class="form-field">
                          <label>Mobile Number *</label>
                          <input type="text" placeholder="Enter mobile number" disabled>
                        </div>
                        <div class="form-field">
                          <label>CNIC No. *</label>
                          <input type="text" disabled>
                        </div>
                        <div class="form-field">
                          <label>Nationality *</label>
                          <div class="radio-row">
                            <label class="radio-option">
                              <input type="radio" name="nationality-1" checked disabled>
                              <span>Pakistani</span>
                            </label>
                            <label class="radio-option">
                              <input type="radio" name="nationality-1" disabled>
                              <span>Foreigner</span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        
              <!-- Panel 2: Document Upload Method -->
              <div class="panel">
                <h2 class="panel-label">Document Upload Method</h2>
        
                <div class="browser-window">
                  <div class="browser-topbar">
                    <div class="traffic-lights">
                      <span class="dot red"></span>
                      <span class="dot yellow"></span>
                      <span class="dot green"></span>
                    </div>
                    <span class="browser-title">Tax Consultant Dashboard</span>
                  </div>
        
                  <div class="app-header">
                    <div class="app-header-left">
                      <span class="user-icon">&#128100;</span>
                      <span class="app-heading">Personal Tax Filing</span>
                      <span class="badge">Self</span>
                    </div>
                    <button class="dashboard-btn" type="button">&rarr; Go to Dashboard</button>
                  </div>
        
                  <nav class="tab-row single">
                    <span class="tab active">PERSONAL INFO <span class="chevron">&rsaquo;</span></span>
                    <span class="tab">DOCUMENT UPLOAD <span class="chevron">&rsaquo;</span></span>
                    <span class="tab">NTN LOGIN <span class="chevron">&rsaquo;</span></span>
                    <span class="tab">PAYMENT</span>
                  </nav>
        
                  <div class="content">
                    <h3 class="content-title">Personal Information</h3>
                    <p class="content-sub">Filing Tax Return for 2021-2022 (Tax Year 2022)</p>
        
                    <div class="form-card">
                      <h4 class="form-card-title">Basic Information</h4>
        
                      <div class="form-grid">
                        <div class="form-field">
                          <label>Full Name *</label>
                          <input type="text" placeholder="Ahmad Ali" disabled>
                        </div>
                        <div class="form-field">
                          <label>Email Address *</label>
                          <input type="text" placeholder="ahmad@email.com" disabled>
                        </div>
                        <div class="form-field">
                          <label>Date of Birth *</label>
                          <input type="text" placeholder="mm/dd/yyyy" disabled>
                        </div>
                        <div class="form-field">
                          <label>Mobile Number *</label>
                          <input type="text" placeholder="Enter mobile number" disabled>
                        </div>
                        <div class="form-field">
                          <label>CNIC No. *</label>
                          <input type="text" disabled>
                        </div>
                        <div class="form-field">
                          <label>Nationality *</label>
                          <div class="radio-row">
                            <label class="radio-option">
                              <input type="radio" name="nationality-2" checked disabled>
                              <span>Pakistani</span>
                            </label>
                            <label class="radio-option">
                              <input type="radio" name="nationality-2" disabled>
                              <span>Foreigner</span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        
            </div>
          </div>
          <!-- third part -->
          <div class="who-should-file">
            <h1 class="wsf-title">Who Should File a Personal Tax Return?</h1>
            <p class="wsf-subtitle">Pakistan's tax law requires every individual earning above Rs 600,000 annually to file a tax
              return. Even if you're below this threshold, filing as an active tax filer offers significant financial benefits.
            </p>
        
            <div class="wsf-grid">
        
              <div class="wsf-card">
                <div class="wsf-icon">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <rect x="4" y="2" width="16" height="20" rx="2" />
                    <line x1="9" y1="6" x2="9" y2="6" />
                    <line x1="15" y1="6" x2="15" y2="6" />
                    <line x1="9" y1="10" x2="9" y2="10" />
                    <line x1="15" y1="10" x2="15" y2="10" />
                    <line x1="9" y1="14" x2="9" y2="14" />
                    <line x1="15" y1="14" x2="15" y2="14" />
                    <line x1="9" y1="18" x2="15" y2="18" />
                  </svg>
                </div>
                <h3 class="wsf-card-title">Salaried Employees (Government Sector)</h3>
                <p class="wsf-card-text">Federal &amp; provincial government servants, armed forces personnel, and civil
                  servants</p>
              </div>
        
              <div class="wsf-card">
                <div class="wsf-icon">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <rect x="2" y="7" width="20" height="14" rx="2" />
                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
                    <path d="M2 13h20" />
                  </svg>
                </div>
                <h3 class="wsf-card-title">Salaried Employees (Private Sector)</h3>
                <p class="wsf-card-text">Corporate employees, multinational workers, bank employees, and professionals</p>
              </div>
        
              <div class="wsf-card">
                <div class="wsf-icon">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M22 10 12 5 2 10l10 5 10-5Z" />
                    <path d="M6 12v5c0 1.5 3 3 6 3s6-1.5 6-3v-5" />
                  </svg>
                </div>
                <h3 class="wsf-card-title">Teachers &amp; Researchers</h3>
                <p class="wsf-card-text">School, college, and university teachers including those in government educational
                  institutions</p>
              </div>
        
              <div class="wsf-card">
                <div class="wsf-icon">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8Z" />
                    <path d="M14 2v6h6" />
                    <line x1="8" y1="13" x2="16" y2="13" />
                    <line x1="8" y1="17" x2="16" y2="17" />
                  </svg>
                </div>
                <h3 class="wsf-card-title">Multiple Income Sources</h3>
                <p class="wsf-card-text">Individuals with salary plus rental income, freelance income, commission, or investment
                  returns</p>
              </div>
        
              <div class="wsf-card">
                <div class="wsf-icon">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10" />
                    <line x1="2" y1="12" x2="22" y2="12" />
                    <path d="M12 2a15 15 0 0 1 0 20 15 15 0 0 1 0-20Z" />
                  </svg>
                </div>
                <h3 class="wsf-card-title">Overseas Pakistanis</h3>
                <p class="wsf-card-text">Pakistanis working abroad who have assets or income sources in Pakistan</p>
              </div>
        
              <div class="wsf-card">
                <div class="wsf-icon">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <polyline points="16 18 22 12 16 6" />
                    <polyline points="8 6 2 12 8 18" />
                  </svg>
                </div>
                <h3 class="wsf-card-title">Freelancers</h3>
                <p class="wsf-card-text">Independent contractors and digital freelancers registered on platforms like Upwork,
                  Fiverr, or Toptal</p>
              </div>
        
            </div>
          </div>
          <!-- fouth part -->
          <div class="whats-included">
            <h1 class="wi-title">What's Included in Your Personal Tax Filing</h1>
        
            <div class="wi-list">
        
              <div class="wi-item">
                <span class="wi-check">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M21.8 10A10 10 0 1 1 17 3.3" />
                    <polyline points="22 4 12 14.01 9 11.01" />
                  </svg>
                </span>
                <p>Preparation and submission of your annual income tax return (ITR) on FBR IRIS portal</p>
              </div>
        
              <div class="wi-item">
                <span class="wi-check">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M21.8 10A10 10 0 1 1 17 3.3" />
                    <polyline points="22 4 12 14.01 9 11.01" />
                  </svg>
                </span>
                <p>Calculation of your total taxable income from all sources</p>
              </div>
        
              <div class="wi-item">
                <span class="wi-check">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M21.8 10A10 10 0 1 1 17 3.3" />
                    <polyline points="22 4 12 14.01 9 11.01" />
                  </svg>
                </span>
                <p>Application of all eligible deductions, allowances, and tax credits under Pakistan's Income Tax Ordinance
                  2001</p>
              </div>
        
              <div class="wi-item">
                <span class="wi-check">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M21.8 10A10 10 0 1 1 17 3.3" />
                    <polyline points="22 4 12 14.01 9 11.01" />
                  </svg>
                </span>
                <p>Zakat deductions, charitable contributions, and investment allowance claims where applicable</p>
              </div>
        
              <div class="wi-item">
                <span class="wi-check">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M21.8 10A10 10 0 1 1 17 3.3" />
                    <polyline points="22 4 12 14.01 9 11.01" />
                  </svg>
                </span>
                <p>Pension contribution deductions for government and private sector employees</p>
              </div>
        
              <div class="wi-item">
                <span class="wi-check">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M21.8 10A10 10 0 1 1 17 3.3" />
                    <polyline points="22 4 12 14.01 9 11.01" />
                  </svg>
                </span>
                <p>Filing confirmation and acknowledgment receipt from FBR</p>
              </div>
        
              <div class="wi-item">
                <span class="wi-check">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M21.8 10A10 10 0 1 1 17 3.3" />
                    <polyline points="22 4 12 14.01 9 11.01" />
                  </svg>
                </span>
                <p>Basic post-filing support for any FBR queries within 30 days</p>
              </div>
        
            </div>
          </div>
          <div class="filing-method">
            <h1 class="fm-title">Choose the Filing Method That Works for You</h1>
        
            <div class="fm-cards">
        
              <div class="fm-card fm-card-popular">
                <span class="fm-badge">POPULAR</span>
                <h3 class="fm-card-title">Online Filing (Self-Guided with Expert Review)</h3>
                <p class="fm-card-text">Fill in your income details directly on our secure platform. Our system guides you
                  step-by-step. A Chartered Accountant reviews your data before submission to FBR. Best for individuals with
                  straightforward income sources.</p>
              </div>
        
              <div class="fm-card">
                <h3 class="fm-card-title">Document Upload (Fully Managed Filing)</h3>
                <p class="fm-card-text">Simply upload your documents: salary slips, bank statements, and any other income
                  proofs. Our expert team handles the entire filing process on your behalf. Best for busy professionals or those
                  with complex income structures.</p>
              </div>
        
            </div>
        
            <div class="fm-addon">
              <h4 class="fm-addon-title">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round">
                  <polygon
                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                </svg>
                CA Review Add-on
              </h4>
              <p class="fm-addon-text">Add a detailed CA review session (Rs 1,000 extra) where a Chartered Accountant personally
                audits your return, discusses your tax position, and advises on tax-saving opportunities for the coming year.
              </p>
            </div>
        
          </div>
          <div class="pricing-section">
            <h1 class="pricing-title">Simple, Transparent Pricing</h1>
        
            <div class="pricing-cards">
        
              <div class="pricing-card pricing-card-featured">
                <span class="pricing-badge">MOST POPULAR</span>
                <h3 class="pricing-card-title">Online Filing</h3>
        
                <div class="pricing-row">
                  <span>Base Fee (1 income source)</span>
                  <span class="pricing-amount">Rs 999</span>
                </div>
                <div class="pricing-row">
                  <span>More than 1 income source</span>
                  <span class="pricing-amount">Rs 1,500</span>
                </div>
                <div class="pricing-row">
                  <span>CA Review Add-on</span>
                  <span class="pricing-amount">+ Rs 1,000</span>
                </div>
              </div>
        
              <div class="pricing-card">
                <h3 class="pricing-card-title pricing-card-title-dark">Document Upload</h3>
        
                <div class="pricing-row pricing-row-light">
                  <span>Base Fee</span>
                  <span class="pricing-amount pricing-amount-dark">Rs 3,500</span>
                </div>
                <div class="pricing-row pricing-row-light">
                  <span>CA Review Add-on</span>
                  <span class="pricing-amount pricing-amount-dark">+ Rs 1,000</span>
                </div>
              </div>
        
            </div>
        
            <p class="pricing-note">All prices are inclusive of FBR filing fees. No hidden charges. GST may apply.</p>
          </div>
          <div class="documents-needed">
            <h1 class="dn-title">Documents You Will Need</h1>
        
            <div class="dn-grid">
        
              <div class="dn-item">
                <span class="dn-check">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M21.8 10A10 10 0 1 1 17 3.3" />
                    <polyline points="22 4 12 14.01 9 11.01" />
                  </svg>
                </span>
                <p>CNIC (front and back)</p>
              </div>
        
              <div class="dn-item">
                <span class="dn-check">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M21.8 10A10 10 0 1 1 17 3.3" />
                    <polyline points="22 4 12 14.01 9 11.01" />
                  </svg>
                </span>
                <p>Latest salary slips (last 3-6 months) or salary certificate from employer</p>
              </div>
        
              <div class="dn-item">
                <span class="dn-check">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M21.8 10A10 10 0 1 1 17 3.3" />
                    <polyline points="22 4 12 14.01 9 11.01" />
                  </svg>
                </span>
                <p>Bank account statements for the entire tax year (July-June)</p>
              </div>
        
              <div class="dn-item">
                <span class="dn-check">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M21.8 10A10 10 0 1 1 17 3.3" />
                    <polyline points="22 4 12 14.01 9 11.01" />
                  </svg>
                </span>
                <p>Employment certificate or letter from your employer</p>
              </div>
        
              <div class="dn-item">
                <span class="dn-check">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M21.8 10A10 10 0 1 1 17 3.3" />
                    <polyline points="22 4 12 14.01 9 11.01" />
                  </svg>
                </span>
                <p>Rental income details (if applicable): rent agreements and rental receipts</p>
              </div>
        
              <div class="dn-item">
                <span class="dn-check">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M21.8 10A10 10 0 1 1 17 3.3" />
                    <polyline points="22 4 12 14.01 9 11.01" />
                  </svg>
                </span>
                <p>Foreign remittance details (if applicable)</p>
              </div>
        
              <div class="dn-item">
                <span class="dn-check">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M21.8 10A10 10 0 1 1 17 3.3" />
                    <polyline points="22 4 12 14.01 9 11.01" />
                  </svg>
                </span>
                <p>Zakat deduction certificate (if applicable)</p>
              </div>
        
              <div class="dn-item">
                <span class="dn-check">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M21.8 10A10 10 0 1 1 17 3.3" />
                    <polyline points="22 4 12 14.01 9 11.01" />
                  </svg>
                </span>
                <p>Investment or savings certificate details (mutual funds, National Savings, etc.)</p>
              </div>
        
              <div class="dn-item">
                <span class="dn-check">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M21.8 10A10 10 0 1 1 17 3.3" />
                    <polyline points="22 4 12 14.01 9 11.01" />
                  </svg>
                </span>
                <p>Property ownership documents (if any property owned)</p>
              </div>
        
              <div class="dn-item">
                <span class="dn-check">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M21.8 10A10 10 0 1 1 17 3.3" />
                    <polyline points="22 4 12 14.01 9 11.01" />
                  </svg>
                </span>
                <p>Vehicle registration documents (if any vehicle owned)</p>
              </div>
        
            </div>
          </div>
        
          <!-- ===== FOOTER ===== -->
    </div>
@endsection

@push('scripts')

@endpush
