@extends('layouts.app')

@section('title', 'Sales Tax Services | FINANIC Business Consultants')
@section('meta_description', 'Sales tax registration, monthly return filing, audits, and refunds for businesses in Faisalabad — kept current and defensible.')
@section('body_class', 'pf-service-body')


@section('content')
    <div class="pf-service-page">
<!-- Hero -->
    <section class="hero" aria-labelledby="hero-title">
      <div class="container">
        <div class="hero-eyebrow">Sales Tax Services</div>
        <h1 id="hero-title">Sales Tax Registration, Filing, Audits & Refunds</h1>
        <p class="hero-text">From sales tax registration to monthly return filing, audits, and refunds — we keep your sales
          tax compliance current and defensible.</p>
        <a href="{{ route('contact') }}" class="btn-hero-primary">Talk to a Consultant <i class="fa fa-arrow-right"
            aria-hidden="true"></i></a>
        <ul class="hero-badges" role="list">
          <li class="hero-badge">FBR STRN Registration</li>
          <li class="hero-badge">Monthly Return Filing</li>
          <li class="hero-badge">Audit Representation</li>
          <li class="hero-badge">Refund Follow-Up</li>
        </ul>
      </div>
    </section>

    <!-- What is Sales Tax -->
    <section class="section-white" aria-labelledby="gst-title">
      <div class="container">
        <div class="section-header-center">
          <h2 id="gst-title" class="section-heading">Who Must Register for Sales Tax?</h2>
          <p class="lead-text">Sales tax is an indirect tax levied on the supply of taxable goods and services in Pakistan. Registered businesses collect tax from customers, file periodic sales tax returns, and remit the collected tax to FBR.</p>
        </div>

        <div class="checklist-section">
          <ul class="checklist" role="list">
            <li class="check-item"><i class="fa fa-check tick" aria-hidden="true"></i> Manufacturers, importers, and exporters of taxable goods</li>
            <li class="check-item"><i class="fa fa-check tick" aria-hidden="true"></i> Wholesalers and distributors above the applicable turnover threshold</li>
            <li class="check-item"><i class="fa fa-check tick" aria-hidden="true"></i> Certain retailers, depending on business type and sector</li>
            <li class="check-item"><i class="fa fa-check tick" aria-hidden="true"></i> Service providers registered under provincial revenue authorities</li>
            <li class="check-item"><i class="fa fa-check tick" aria-hidden="true"></i> Businesses seeking to claim input tax credits or zero-rated refund eligibility</li>
          </ul>
        </div>
      </div>
    </section>

    <!-- What's Covered -->
    <section class="section-light" aria-labelledby="covered-title">
      <div class="container">
        <div class="section-header-center">
          <h2 id="covered-title" class="section-heading">What Our Sales Tax Services Cover</h2>
        </div>

        <ul class="checklist" role="list">
          <li class="check-item"><i class="fa fa-check tick" aria-hidden="true"></i> Sales tax (STRN) registration application on FBR IRIS</li>
          <li class="check-item"><i class="fa fa-check tick" aria-hidden="true"></i> Category determination: manufacturer, importer, exporter, retailer, service provider</li>
          <li class="check-item"><i class="fa fa-check tick" aria-hidden="true"></i> Monthly sales tax return preparation and filing</li>
          <li class="check-item"><i class="fa fa-check tick" aria-hidden="true"></i> Sales tax audit representation, from the initial notice to the final order</li>
          <li class="check-item"><i class="fa fa-check tick" aria-hidden="true"></i> Refund claim preparation and follow-up where input tax exceeds output tax</li>
          <li class="check-item"><i class="fa fa-check tick" aria-hidden="true"></i> Digital/e-invoicing advisory and supervisory review</li>
          <li class="check-item"><i class="fa fa-check tick" aria-hidden="true"></i> De-registration support where a business ceases the relevant activity</li>
        </ul>
      </div>
    </section>

    <!-- Documents -->
    <section class="section-white" aria-labelledby="docs-title">
      <div class="container">
        <div class="doc-panel">
          <div class="section-header-center">
            <h2 id="docs-title" class="section-heading">Documents Required for Sales Tax Registration</h2>
          </div>

          <ul class="checklist" role="list">
            <li class="check-item"><i class="fa fa-check tick" aria-hidden="true"></i> Business NTN</li>
            <li class="check-item"><i class="fa fa-check tick" aria-hidden="true"></i> CNIC of business owner / directors</li>
            <li class="check-item"><i class="fa fa-check tick" aria-hidden="true"></i> Business bank account statement (last 3 months)</li>
            <li class="check-item"><i class="fa fa-check tick" aria-hidden="true"></i> Business address proof: utility bill or lease agreement</li>
          </ul>
        </div>
      </div>
    </section>

    <!-- FAQ -->
    <section class="section-light" aria-labelledby="faq-title">
      <div class="container">
        <div class="section-header-center">
          <h2 id="faq-title" class="section-heading">Frequently Asked Questions: Sales Tax</h2>
        </div>

        <dl class="faq-list">
          <div class="faq-item active">
            <dt>
              <button class="faq-question" type="button" aria-expanded="true" aria-controls="faq1">
                Does my business need to register for sales tax?
                <i class="fa fa-angle-down" aria-hidden="true"></i>
              </button>
            </dt>
            <dd id="faq1" class="faq-answer" role="definition">
              <p>It depends on your business type, turnover, and sector — manufacturers, importers, wholesalers, distributors, and certain retailers are typically required to register, though thresholds and exemptions vary. We can assess whether registration is mandatory or advisable for your specific business.</p>
            </dd>
          </div>

          <div class="faq-item">
            <dt>
              <button class="faq-question" type="button" aria-expanded="false" aria-controls="faq2">
                How often do I need to file a sales tax return?
                <i class="fa fa-angle-down" aria-hidden="true"></i>
              </button>
            </dt>
            <dd id="faq2" class="faq-answer" role="definition">
              <p>Sales tax returns are generally filed monthly, with the return for a given month typically due by the 18th of the following month.</p>
            </dd>
          </div>

          <div class="faq-item">
            <dt>
              <button class="faq-question" type="button" aria-expanded="false" aria-controls="faq3">
                What's involved in a sales tax audit, and how should I prepare?
                <i class="fa fa-angle-down" aria-hidden="true"></i>
              </button>
            </dt>
            <dd id="faq3" class="faq-answer" role="definition">
              <p>A sales tax audit reviews your input and output tax records, invoices, and return filings for a given period. Preparation involves having reconciled records ready — particularly your purchase and sales annexures — and a clear paper trail for any exemptions or zero-rated claims.</p>
            </dd>
          </div>

          <div class="faq-item">
            <dt>
              <button class="faq-question" type="button" aria-expanded="false" aria-controls="faq4">
                What is digital invoicing, and is it my responsibility or my consultant's?
                <i class="fa fa-angle-down" aria-hidden="true"></i>
              </button>
            </dt>
            <dd id="faq4" class="faq-answer" role="definition">
              <p>Digital/e-invoicing compliance is the responsibility of the registered taxpayer. Our role is advisory and supervisory — helping you set up correctly and reviewing compliance, rather than issuing invoices on your behalf.</p>
            </dd>
          </div>
        </dl>
      </div>
    </section>

    <!-- CTA Banner -->
    <aside class="cta-banner" aria-labelledby="cta-title">
      <div class="container">
        <div class="cta-content">
          <h2 id="cta-title">Ready to Get Your Sales Tax Compliance in Order?</h2>
          <p>Talk to a FINANIC consultant about registration, filing, or an audit notice you've received.</p>
          <div class="cta-btn-row">
            <a href="{{ route('contact') }}" class="btn-cta-primary">Talk to a Consultant <i class="fa fa-arrow-right"
                aria-hidden="true"></i></a>
            <a href="https://wa.me/923XXXXXXXXX" class="btn-cta-secondary" target="_blank" rel="noopener"><i class="fa fa-whatsapp" aria-hidden="true"></i> Message on WhatsApp</a>
          </div>
        </div>
      </div>
    </aside>

    </div>
@endsection
