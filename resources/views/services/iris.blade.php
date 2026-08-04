@extends('layouts.app')

@section('title', 'FBR Profile & ATL Maintenance | FINANIC Business Consultants')
@section('meta_description', 'Keep your FBR IRIS profile accurate and your Active Taxpayer List (ATL) status current, with support from FINANIC Business Consultants, Faisalabad.')
@section('body_class', 'pf-service-body')


@section('content')
    <div class="pf-service-page">
<!-- Hero -->
    <section class="page-hero hero-green" aria-labelledby="hero-title">
      <div class="container">
        <div class="hero-eyebrow">FBR PROFILE & ATL MAINTENANCE</div>
        <h1 id="hero-title">Keep Your FBR IRIS Profile & Active Taxpayer Status Accurate</h1>
        <p class="lead-text">
          Your FBR IRIS profile is your official tax identity on Pakistan's tax portal, and it directly affects
          your Active Taxpayer List (ATL) status. Any changes in employment, business income, or personal details
          should be updated accurately. FINANIC handles profile updates and ATL tracking as part of our income tax services.
        </p>
        <a href="{{ route('contact') }}" class="btn-light-green">
          Update My IRIS Profile
          <i class="fa fa-arrow-right" aria-hidden="true"></i>
        </a>

        <ul class="hero-badges" role="list">
          <li class="hero-badge">Salary & Business Profiles</li>
          <li class="hero-badge">ATL Status Review</li>
          <li class="hero-badge">FBR Compliant</li>
          <li class="hero-badge">Expert Handled</li>
        </ul>
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
            to date helps ensure smooth tax filing and compliance with FBR regulations, and supports your standing on
            the Active Taxpayer List (ATL).
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
              <span class="reason-text">Reactivation of an inactive IRIS account or ATL restoration</span>
            </li>
          </ul>
        </div>
      </div>
    </section>

    <!-- Update Categories -->
    <section class="section-padding-white" aria-labelledby="categories-title">
      <div class="container">
        <div class="section-header-center">
          <h2 id="categories-title" class="section-heading">Profile Update Categories</h2>
        </div>

        <div class="category-grid">
          <article class="category-card category-card-green">
            <div class="category-header">
              <span class="category-badge">Most Common</span>
              <div class="category-card-icon icon-light">
                <i class="fa fa-user" aria-hidden="true"></i>
              </div>
            </div>
            <h4 class="category-card-title">Salary Income Update</h4>
            <p class="category-card-desc">
              Update your IRIS profile to reflect changes in salary income, including employer changes, new employer
              additions, and salary adjustments.
            </p>
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
          </article>
        </div>
      </div>
    </section>

    <!-- Process -->
    <section class="section-padding-bg" aria-labelledby="process-title">
      <div class="container">
        <div class="section-header-center">
          <h2 id="process-title" class="section-heading">How the Update Process Works</h2>
        </div>

        <ol class="process-wrapper" role="list">
          <li class="process-step-row">
            <span class="process-step-circle">1</span>
            <span class="process-step-text">Get in touch and confirm the update category you need.</span>
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
                What is the Active Taxpayer List (ATL) and why does it matter?
              </button>
            </dt>
            <dd id="faqOne" class="faq-content panel-open" role="definition">
              <p class="faq-accordion-body">
                The ATL is the FBR's list of taxpayers who have filed their return for the relevant tax year. Being on
                it typically means lower withholding tax rates on banking transactions, property purchases, vehicle
                registration, and more. Falling off the list can mean paying substantially higher withholding rates
                until you're restored.
              </p>
            </dd>
          </div>

          <div class="faq-accordion-item">
            <dt>
              <button class="faq-accordion-btn" type="button" aria-expanded="false" aria-controls="faqTwo">
                What happens if I don't update my IRIS profile?
              </button>
            </dt>
            <dd id="faqTwo" class="faq-content" role="definition">
              <p class="faq-accordion-body">
                An outdated IRIS profile may create issues with tax return filing, withholding tax adjustments, and
                FBR compliance requirements. Keeping your information updated helps avoid unnecessary complications.
              </p>
            </dd>
          </div>

          <div class="faq-accordion-item">
            <dt>
              <button class="faq-accordion-btn" type="button" aria-expanded="false" aria-controls="faqThree">
                Can I update my IRIS profile myself?
              </button>
            </dt>
            <dd id="faqThree" class="faq-content" role="definition">
              <p class="faq-accordion-body">
                Yes, you can submit profile updates through the FBR portal. However, incorrect information may result
                in delays or notices. FINANIC helps ensure everything is updated accurately.
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
          <h2 id="cta-title" class="cta-banner-title">Not Sure If Your ATL Status Is Current?</h2>
          <p class="cta-banner-desc">
            Talk to a FINANIC consultant to review your IRIS profile and Active Taxpayer List status.
          </p>
          <div class="cta-buttons">
            <a href="{{ route('contact') }}" class="btn-cta-light">
              Talk to a Consultant
              <i class="fa fa-arrow-right" aria-hidden="true"></i>
            </a>
            <a href="https://wa.me/923XXXXXXXXX" class="btn-cta-outline" target="_blank" rel="noopener">
              <i class="fa fa-whatsapp" aria-hidden="true"></i>
              Message on WhatsApp
            </a>
          </div>
        </div>
      </div>
    </aside>

    </div>
@endsection
