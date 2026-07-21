@extends('layouts.app')

@section('title', 'GST Registration | Tax Consultant')
@section('body_class', 'pf-service-body')


@section('content')
    <div class="pf-service-page">
<!-- Hero -->
    <section class="hero" aria-labelledby="hero-title">
      <div class="container">
        <!-- <nav class="hero-breadcrumb" aria-label="Breadcrumb">
          <span>Home</span>
          <span aria-hidden="true">&rsaquo;</span>
          <span>Services</span>
          <span aria-hidden="true">&rsaquo;</span>
          <span>GST Registration</span>
        </nav> -->
        <div class="hero-eyebrow">GST Registration</div>
        <h1 id="hero-title">GST Registration in Pakistan: Register for Sales Tax with FBR</h1>
        <p class="hero-text">If your business supplies taxable goods or services above the mandatory threshold, GST
          registration with FBR is a legal requirement. Pak Filer's experts handle the entire registration process, from
          documentation to STRN issuance.</p>
        <a href="{{ route('home') }}#features-area" class="btn-hero-primary">Register for GST Now <i class="fa fa-arrow-right"
            aria-hidden="true"></i></a>
        <ul class="hero-badges" role="list">
          <li class="hero-badge">Flat Fee Rs 9,000</li>
          <li class="hero-badge">Expert Handled</li>
          <li class="hero-badge">FBR STRN Issued</li>
          <li class="hero-badge">Fully Managed</li>
        </ul>
      </div>
    </section>

    <!-- Platform Preview -->
    <section class="section-light" aria-labelledby="platform-title">
      <div class="container">
        <div class="section-header-center">
          <h2 id="platform-title" class="section-heading">See How It Works on Our Platform</h2>
          <p class="section-intro">Fill in your business details, upload documents, and submit your GST registration &mdash;
            all from your dashboard.</p>
        </div>

        <div class="mockup">
          <div class="mockup-bar">
            <div class="mockup-dots">
              <span class="dot red" aria-hidden="true"></span>
              <span class="dot yellow" aria-hidden="true"></span>
              <span class="dot green" aria-hidden="true"></span>
            </div>
            <div class="mockup-title">Pak Filer Dashboard</div>
          </div>

          <div class="mockup-steps" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3">
            <div class="step active">
              <span class="step-num">1</span> Business Information
            </div>
            <div class="step-line" aria-hidden="true"></div>
            <div class="step">
              <span class="step-num">2</span> Document Upload
            </div>
            <div class="step-line" aria-hidden="true"></div>
            <div class="step">
              <span class="step-num">3</span> Submit Application
            </div>
          </div>

          <div class="form-box">
            <h3 class="form-title">Business Information</h3>
            <p class="form-sub">Please provide the required information to register your business for General Sales Tax
            </p>

            <div class="field">
              <label for="businessName">Business Name <span class="req" aria-hidden="true">*</span></label>
              <input type="text" id="businessName" placeholder="Enter business name" disabled>
            </div>

            <div class="field-group-row">
              <div class="field">
                <label for="businessType">Business Type <span class="req" aria-hidden="true">*</span></label>
                <select id="businessType" disabled>
                  <option>Select business type</option>
                </select>
              </div>
              <div class="field">
                <label for="startDate">Start Date <span class="req" aria-hidden="true">*</span></label>
                <input type="text" id="startDate" placeholder="mm/dd/yyyy" disabled>
              </div>
              <div class="field">
                <label for="businessNature">Business Nature <span class="req" aria-hidden="true">*</span></label>
                <select id="businessNature" disabled>
                  <option>Select business nature</option>
                </select>
              </div>
            </div>

            <div class="field">
              <label for="description">Description</label>
              <textarea id="description" rows="2" placeholder="Describe your business activities" disabled></textarea>
            </div>

            <div class="field">
              <label for="consumerNumber">Consumer Number (GAS/Electricity)</label>
              <input type="text" id="consumerNumber" placeholder="Enter consumer number" disabled>
            </div>

            <div class="field">
              <label for="businessAddress">Business Address <span class="req" aria-hidden="true">*</span></label>
              <textarea id="businessAddress" rows="2" placeholder="Enter complete business address" disabled></textarea>
            </div>

            <div class="browser-footer" style="border-top: 1px solid var(--border); padding-top: 1.5rem; margin-top: 2rem;">
              <a href="{{ route('home') }}#features-area" class="browser-back-link">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Dashboard
              </a>
              <button class="browser-btn-submit">Continue <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- What is GST -->
    <section class="section-white" aria-labelledby="gst-title">
      <div class="container">
        <div class="section-header-center">
          <h2 id="gst-title" class="section-heading">What is General Sales Tax (GST) in Pakistan?</h2>
          <p class="lead-text">General Sales Tax (GST) is an indirect tax levied on the supply of taxable goods and
            services in Pakistan. Businesses registered for GST are required to collect tax from their customers, file
            monthly or quarterly sales tax returns, and remit the collected tax to the government.</p>
        </div>

        <div class="checklist-section">
          <h3 class="checklist-title text-center">Who Must Register for GST?</h3>
          <ul class="checklist" role="list">
            <li class="check-item"><i class="fa fa-check tick" aria-hidden="true"></i> Manufacturers with annual
              taxable supplies exceeding Rs 10 million</li>
            <li class="check-item"><i class="fa fa-check tick" aria-hidden="true"></i> Importers and exporters of
              taxable goods</li>
            <li class="check-item"><i class="fa fa-check tick" aria-hidden="true"></i> Retailers and wholesalers
              with annual turnover above the prescribed threshold</li>
            <li class="check-item"><i class="fa fa-check tick" aria-hidden="true"></i> Service providers
              registered under provincial revenue authorities</li>
            <li class="check-item"><i class="fa fa-check tick" aria-hidden="true"></i> Businesses dealing in
              zero-rated goods (e.g., exporters seeking refund eligibility)</li>
            <li class="check-item"><i class="fa fa-check tick" aria-hidden="true"></i> Any business voluntarily
              wishing to register to claim input tax credits</li>
          </ul>
        </div>
      </div>
    </section>

    <!-- What's Covered -->
    <section class="section-light" aria-labelledby="covered-title">
      <div class="container">
        <div class="section-header-center">
          <h2 id="covered-title" class="section-heading">What Pak Filer's GST Registration Covers</h2>
        </div>

        <ul class="checklist" role="list">
          <li class="check-item"><i class="fa fa-check tick" aria-hidden="true"></i> Preparation and submission of
            GST/STRN registration application on FBR IRIS</li>
          <li class="check-item"><i class="fa fa-check tick" aria-hidden="true"></i> Category determination:
            manufacturer, importer, exporter, retailer, service provider</li>
          <li class="check-item"><i class="fa fa-check tick" aria-hidden="true"></i> Verification of business
            address and supporting documentation</li>
          <li class="check-item"><i class="fa fa-check tick" aria-hidden="true"></i> Coordination with FBR for any
            queries or additional documentation requests</li>
          <li class="check-item"><i class="fa fa-check tick" aria-hidden="true"></i> STRN (Sales Tax Registration
            Number) certificate obtained and delivered</li>
          <li class="check-item"><i class="fa fa-check tick" aria-hidden="true"></i> Guidance on post-registration
            obligations: monthly return filing, invoice format, record-keeping</li>
        </ul>
      </div>
    </section>

    <!-- Fee -->
    <section class="section-white" aria-labelledby="fee-title">
      <div class="container">
        <div class="section-header-center">
          <h2 id="fee-title" class="section-heading">GST Registration Fee</h2>
        </div>

        <div class="fee-card">
          <div class="fee-amount">Rs 9,000</div>
          <div class="fee-detail">
            Flat Fee, All-Inclusive
            <span class="days">Typically 5&ndash;15 working days</span>
          </div>
        </div>
        <p class="fee-note">Any FBR-imposed government fee (if applicable) is additional and will be communicated upfront.</p>
      </div>
    </section>

    <!-- Documents -->
    <section class="section-light" aria-labelledby="docs-title">
      <div class="container">
        <div class="doc-panel">
          <div class="section-header-center">
            <h2 id="docs-title" class="section-heading">Documents Required for GST Registration</h2>
          </div>

          <ul class="checklist" role="list">
            <li class="check-item"><i class="fa fa-check tick" aria-hidden="true"></i> Business NTN</li>
            <li class="check-item"><i class="fa fa-check tick" aria-hidden="true"></i> CNIC of business owner /
              directors</li>
            <li class="check-item"><i class="fa fa-check tick" aria-hidden="true"></i> Business bank account
              statement (last 3 months)</li>
            <li class="check-item"><i class="fa fa-check tick" aria-hidden="true"></i> Business address proof:
              utility bill or lease agreement</li>
          </ul>
        </div>
      </div>
    </section>

    <!-- FAQ -->
    <section class="section-white" aria-labelledby="faq-title">
      <div class="container">
        <div class="section-header-center">
          <h2 id="faq-title" class="section-heading">Frequently Asked Questions</h2>
        </div>

        <dl class="faq-list">
          <div class="faq-item active">
            <dt>
              <button class="faq-question" type="button" aria-expanded="true" aria-controls="faq1">
                What is the difference between NTN and STRN?
                <i class="fa fa-angle-down" aria-hidden="true"></i>
              </button>
            </dt>
            <dd id="faq1" class="faq-answer" role="definition">
              <p>NTN (National Tax Number) is for income tax registration. STRN (Sales Tax Registration Number), also
                called GST number, is for sales tax registration. Both are issued by FBR but for different tax purposes.
                Many businesses require both.</p>
            </dd>
          </div>

          <div class="faq-item">
            <dt>
              <button class="faq-question" type="button" aria-expanded="false" aria-controls="faq2">
                Is GST registration mandatory for all businesses?
                <i class="fa fa-angle-down" aria-hidden="true"></i>
              </button>
            </dt>
            <dd id="faq2" class="faq-answer" role="definition">
              <p>No. GST registration is mandatory only for businesses that exceed the prescribed turnover threshold or
                fall under categories required to register, such as manufacturers, importers, exporters, and certain
                service providers. Smaller businesses may register voluntarily to claim input tax credits.</p>
            </dd>
          </div>

          <div class="faq-item">
            <dt>
              <button class="faq-question" type="button" aria-expanded="false" aria-controls="faq3">
                What are the ongoing obligations after GST registration?
                <i class="fa fa-angle-down" aria-hidden="true"></i>
              </button>
            </dt>
            <dd id="faq3" class="faq-answer" role="definition">
              <p>Registered businesses must file monthly or quarterly sales tax returns, maintain proper invoices and
                records, and remit collected tax to FBR on time.</p>
            </dd>
          </div>
        </dl>
      </div>
    </section>

    <!-- CTA Banner -->
    <aside class="cta-banner" aria-labelledby="cta-title">
      <div class="container">
        <div class="cta-content">
          <h2 id="cta-title">Ready to Become a Tax Filer Today?</h2>
          <p>Join thousands of Pakistanis who file their taxes online, quickly, securely, and affordably.</p>
          <div class="cta-btn-row">
            <a href="{{ route('home') }}#features-area" class="btn-cta-primary">Start Filing Now <i class="fa fa-arrow-right"
                aria-hidden="true"></i></a>
            <a href="{{ route('home') }}#features-area" class="btn-cta-secondary"><i class="fa fa-comments-o" aria-hidden="true"></i> Talk to
              an Expert</a>
          </div>
        </div>
      </div>
    </aside>
  
    </div>
@endsection






