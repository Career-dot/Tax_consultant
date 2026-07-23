@extends('layouts.app')

@section('title', 'IRIS Profile Update | Tax Consultant')
@section('body_class', 'pf-service-body')


@section('content')
    <div class="pf-service-page">
<!-- Hero -->
    <section class="page-hero hero-green" aria-labelledby="hero-title">
      <div class="container">
        <!-- <nav class="breadcrumb-eyebrow" aria-label="Breadcrumb">
          <a href="{{ route('home') }}" class="breadcrumb-link">Home</a>
          <span class="breadcrumb-separator" aria-hidden="true">&rsaquo;</span>
          <a href="{{ route('contact') }}" class="breadcrumb-link">Services</a>
          <span class="breadcrumb-separator" aria-hidden="true">&rsaquo;</span>
          <span>IRIS Profile Update</span>
        </nav> -->

        <div class="hero-eyebrow">IRIS PROFILE UPDATE</div>
        <h1 id="hero-title">FBR IRIS Profile Update: Keep Your Tax Record Accurate</h1>
        <p class="lead-text">
          Your FBR IRIS profile is your official tax identity on Pakistan's tax portal.
          Any changes in employment, business income, or personal details should be
          updated accurately. Tax Consultant handles profile updates quickly and correctly.
        </p>
        <a href="#how-it-works" class="btn-light-green">
          Update My IRIS Profile
          <i class="fa fa-arrow-right" aria-hidden="true"></i>
        </a>

        <ul class="hero-badges" role="list">
          <li class="hero-badge">From Rs 100</li>
          <li class="hero-badge">1&ndash;3 Working Days</li>
          <li class="hero-badge">FBR Compliant</li>
          <li class="hero-badge">Expert Handled</li>
        </ul>
      </div>
    </section>

    <!-- How It Works -->
    <section id="how-it-works" class="section-padding-bg" aria-labelledby="how-title">
      <div class="container">
        <div class="section-header-center">
          <h2 id="how-title" class="section-heading">See How It Works on Our Platform</h2>
          <p class="section-intro">
            Select your update category, complete the required details,
            and submit everything directly from your dashboard.
          </p>
        </div>

        <div class="browser-mockup">
          <div class="browser-header">
            <div class="browser-dots">
              <span class="browser-dot dot-red" aria-hidden="true"></span>
              <span class="browser-dot dot-yellow" aria-hidden="true"></span>
              <span class="browser-dot dot-green" aria-hidden="true"></span>
            </div>
            <div class="browser-title">Tax Consultant Dashboard</div>
            <div class="browser-header-spacer"></div>
          </div>

          <div class="browser-body">
            <div class="steps-progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3">
              <div class="progress-step-item">
                <span class="progress-step-num active">1</span>
                <span class="progress-step-text">Purpose Selection</span>
              </div>
              <div class="progress-step-line" aria-hidden="true"></div>
              <div class="progress-step-item">
                <span class="progress-step-num inactive">2</span>
                <span class="progress-step-text">Form Filling</span>
              </div>
              <div class="progress-step-line" aria-hidden="true"></div>
              <div class="progress-step-item">
                <span class="progress-step-num inactive">3</span>
                <span class="progress-step-text">Additional Information</span>
              </div>
            </div>

            <div class="purpose-selection-panel">
              <h4 class="purpose-panel-title">Purpose of Updating IRIS Profile</h4>
              <p class="purpose-panel-desc">Select the category that best matches your update requirement.</p>

              <div class="purpose-grid">
                <div class="purpose-col">
                  <div class="select-purpose-card active">
                    <div class="purpose-card-icon icon-salary">
                      <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    <h5 class="purpose-card-heading">SALARY</h5>
                    <p class="purpose-card-text">Update your IRIS profile for salary income.</p>
                    <div class="purpose-card-price">Rs 100</div>
                    <div class="purpose-card-duration">
                      <i class="fa fa-clock-o" aria-hidden="true"></i> 1&ndash;3 Working Days
                    </div>
                  </div>
                </div>
                <div class="purpose-col">
                  <div class="select-purpose-card">
                    <div class="purpose-card-icon icon-business">
                      <i class="fa fa-briefcase" aria-hidden="true"></i>
                    </div>
                    <h5 class="purpose-card-heading">BUSINESS</h5>
                    <p class="purpose-card-text">Update your IRIS profile for business income.</p>
                    <div class="purpose-card-price">Rs 800</div>
                    <div class="purpose-card-duration">
                      <i class="fa fa-clock-o" aria-hidden="true"></i> 1&ndash;3 Working Days
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="browser-footer">
              <a href="{{ route('contact') }}" class="browser-back-link">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Dashboard
              </a>
              <button class="browser-btn-submit">Continue <i class="fa fa-arrow-right"
                  aria-hidden="true"></i></button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- IRIS Information -->
    <section class="section-padding-white" aria-labelledby="info-title">
      <div class="container">
        <article class="info-block-centered">
          <h2 id="info-title" class="info-block-title">What is FBR IRIS?</h2>
          <p class="info-block-text">
            IRIS (Inland Revenue Information System) is the FBR's official online tax portal where taxpayers in Pakistan
            manage their NTN, file tax returns, and maintain their profiles. Keeping your IRIS profile accurate and up
            to date helps ensure smooth tax filing and compliance with FBR regulations.
          </p>
        </article>

        <div class="reasons-section">
          <h3 class="section-sub-heading section-center">Common Reasons to Update Your IRIS Profile</h3>

          <ul class="reasons-grid" role="list">
            <li class="reason-card">
              <i class="fa fa-check-circle-o reason-icon" aria-hidden="true"></i>
              <span class="reason-text">Change of employer or addition of a new employer</span>
            </li>
            <li class="reason-card">
              <i class="fa fa-check-circle-o reason-icon" aria-hidden="true"></i>
              <span class="reason-text">Addition of business income to an existing salary profile</span>
            </li>
            <li class="reason-card">
              <i class="fa fa-check-circle-o reason-icon" aria-hidden="true"></i>
              <span class="reason-text">Change in business or registered office address</span>
            </li>
            <li class="reason-card">
              <i class="fa fa-check-circle-o reason-icon" aria-hidden="true"></i>
              <span class="reason-text">Change in directors, partners, or authorised representatives</span>
            </li>
            <li class="reason-card">
              <i class="fa fa-check-circle-o reason-icon" aria-hidden="true"></i>
              <span class="reason-text">Change in bank account details</span>
            </li>
            <li class="reason-card">
              <i class="fa fa-check-circle-o reason-icon" aria-hidden="true"></i>
              <span class="reason-text">Addition of new income sources such as rental, foreign, or investment
                income</span>
            </li>
            <li class="reason-card">
              <i class="fa fa-check-circle-o reason-icon" aria-hidden="true"></i>
              <span class="reason-text">Correction of errors in existing profile information</span>
            </li>
            <li class="reason-card">
              <i class="fa fa-check-circle-o reason-icon" aria-hidden="true"></i>
              <span class="reason-text">Reactivation of an inactive IRIS account</span>
            </li>
          </ul>
        </div>
      </div>
    </section>

    <!-- Update Categories -->
    <section class="section-padding-white" aria-labelledby="categories-title">
      <div class="container">
        <div class="section-header-center">
          <h2 id="categories-title" class="section-heading">IRIS Profile Update Categories</h2>
        </div>

        <div class="category-grid">
          <article class="category-card category-card-green">
            <div class="category-header">
              <span class="category-badge">Most Affordable</span>
              <div class="category-card-icon icon-light">
                <i class="fa fa-user" aria-hidden="true"></i>
              </div>
            </div>
            <h4 class="category-card-title">Salary Income Update</h4>
            <p class="category-card-desc">
              Update your IRIS profile to reflect changes in salary income, including employer changes, new employer
              additions, and salary adjustments.
            </p>
            <div class="category-card-footer footer-green">
              <div class="category-meta">
                <span class="category-footer-label">Fee</span>
                <span class="category-footer-value">Rs 100</span>
              </div>
              <div class="category-meta">
                <span class="category-footer-label">Time</span>
                <span class="category-footer-value">1&ndash;3 Working Days</span>
              </div>
            </div>
          </article>

          <article class="category-card category-card-white">
            <div class="category-header-end">
              <div class="category-card-icon icon-dark">
                <i class="fa fa-building" aria-hidden="true"></i>
              </div>
            </div>
            <h4 class="category-card-title">Business Income Update</h4>
            <p class="category-card-desc">
              Update your IRIS profile for business income additions,
              business detail changes, director or partner updates,
              and registered address modifications.
            </p>
            <div class="category-card-footer footer-white">
              <div class="category-meta">
                <span class="category-footer-label">Fee</span>
                <span class="category-footer-value">Rs 800</span>
              </div>
              <div class="category-meta">
                <span class="category-footer-label">Time</span>
                <span class="category-footer-value">1&ndash;3 Working Days</span>
              </div>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- Process -->
    <section class="section-padding-bg" aria-labelledby="process-title">
      <div class="container">
        <div class="section-header-center">
          <h2 id="process-title" class="section-heading">How the IRIS Update Process Works</h2>
        </div>

        <ol class="process-wrapper" role="list">
          <li class="process-step-row">
            <span class="process-step-circle">1</span>
            <span class="process-step-text">Place your order and choose the required update category.</span>
          </li>
          <li class="process-step-row">
            <span class="process-step-circle">2</span>
            <span class="process-step-text">Submit your CNIC, IRIS login details, and supporting documents.</span>
          </li>
          <li class="process-step-row">
            <span class="process-step-circle">3</span>
            <span class="process-step-text">Our team updates your profile through the FBR IRIS portal.</span>
          </li>
          <li class="process-step-row">
            <span class="process-step-circle">4</span>
            <span class="process-step-text">We verify the update and share confirmation with you.</span>
          </li>
        </ol>
      </div>
    </section>

    <!-- FAQ -->
    <section class="section-padding-white" aria-labelledby="faq-title">
      <div class="container">
        <div class="section-header-center">
          <h2 id="faq-title" class="section-heading">Frequently Asked Questions</h2>
        </div>

        <dl class="faq-wrapper" id="faqAccordion">
          <div class="faq-accordion-item">
            <dt>
              <button class="faq-accordion-btn" type="button" aria-expanded="true" aria-controls="faqOne">
                What happens if I don't update my IRIS profile?
              </button>
            </dt>
            <dd id="faqOne" class="faq-content panel-open" role="definition">
              <p class="faq-accordion-body">
                An outdated IRIS profile may create issues with tax return filing,
                withholding tax adjustments, and FBR compliance requirements.
                Keeping your information updated helps avoid unnecessary complications.
              </p>
            </dd>
          </div>

          <div class="faq-accordion-item">
            <dt>
              <button class="faq-accordion-btn" type="button" aria-expanded="false" aria-controls="faqTwo">
                Can I update my IRIS profile myself?
              </button>
            </dt>
            <dd id="faqTwo" class="faq-content" role="definition">
              <p class="faq-accordion-body">
                Yes, you can submit profile updates through the FBR portal.
                However, incorrect information may result in delays or notices.
                Tax Consultant helps ensure everything is updated accurately.
              </p>
            </dd>
          </div>
        </dl>
      </div>
    </section>

    <!-- CTA Section -->
    <aside class="cta-banner-section" aria-labelledby="cta-title">
      <div class="container">
        <div class="cta-content section-center">
          <h2 id="cta-title" class="cta-banner-title">Ready to Become a Tax Filer Today?</h2>
          <p class="cta-banner-desc">
            Join thousands of Pakistanis who file their taxes online,
            quickly, securely, and affordably.
          </p>
          <div class="cta-buttons">
            <a href="{{ route('contact') }}" class="btn-cta-light">
              Start Filing Now
              <i class="fa fa-arrow-right" aria-hidden="true"></i>
            </a>
            <a href="{{ route('contact') }}" class="btn-cta-outline">
              <i class="fa fa-headphones" aria-hidden="true"></i>
              Talk to an Expert
            </a>
          </div>
        </div>
      </div>
    </aside>
  
    </div>
@endsection






