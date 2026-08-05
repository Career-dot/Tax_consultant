@extends('layouts.app')

@section('title', 'Tax Litigation & Representation | FINANIC Business Consultants')
@section('meta_description', 'Representation at every forum, from the assessing officer through the Appellate Tribunal Inland Revenue and the High Court. Tax litigation support from FINANIC Business Consultants.')
@section('body_class', 'pf-service-body')


@section('content')
    <div class="pf-service-page">
<!-- Hero -->
    <section class="hero" aria-labelledby="hero-title">
      <div class="container">
        <div class="hero-eyebrow">Tax Litigation & Representation</div>
        <h1 id="hero-title">Representation at Every Forum, From First Notice to the High Court</h1>
        <p class="hero-text">When a dispute arises, we represent you at every forum — from the assessing officer through
          to the Appellate Tribunal and the High Court — building a clear, well-documented case at each stage.</p>
        <div class="hero-btn-row">
          <a href="{{ route('contact') }}" class="btn-hero-primary">Talk to a Consultant <i class="fa fa-arrow-right"
              aria-hidden="true"></i></a>
          <a href="#ladder" class="btn-hero-secondary">See the Representation Ladder</a>
        </div>
      </div>
    </section>

    <!-- Representation Ladder -->
    <section id="ladder" class="section-light" aria-labelledby="ladder-title">
      <div class="container">
        <div class="section-header-center">
          <h2 id="ladder-title" class="section-heading">The Representation Ladder</h2>
          <p class="section-intro">We can carry a matter from the first notice through to the apex court if required.</p>
        </div>

        <div class="category-grid">
          <article class="category-card">
            <div class="category-icon"><i class="fa fa-file-text-o" aria-hidden="true"></i></div>
            <h4 class="category-title">Assessing Officer</h4>
            <p class="category-desc">Response to notices, audit proceedings, and orders at the first instance.</p>
          </article>

          <article class="category-card">
            <div class="category-icon"><i class="fa fa-balance-scale" aria-hidden="true"></i></div>
            <h4 class="category-title">Commissioner Inland Revenue (Appeals)</h4>
            <p class="category-desc">First appeal against an assessment or order, with full written submissions.</p>
          </article>

          <article class="category-card">
            <div class="category-icon"><i class="fa fa-gavel" aria-hidden="true"></i></div>
            <h4 class="category-title">Appellate Tribunal Inland Revenue</h4>
            <p class="category-desc">Representation before the Tribunal where the matter proceeds beyond CIR-A.</p>
          </article>

          <article class="category-card">
            <div class="category-icon"><i class="fa fa-university" aria-hidden="true"></i></div>
            <h4 class="category-title">High Court</h4>
            <p class="category-desc">Reference applications and representation where a question of law arises.</p>
          </article>

          <article class="category-card">
            <div class="category-icon"><i class="fa fa-building" aria-hidden="true"></i></div>
            <h4 class="category-title">Supreme Court</h4>
            <p class="category-desc">Representation at the apex court where the matter involves a substantial question of law.</p>
          </article>
        </div>
      </div>
    </section>

    <!-- What We Handle -->
    <section class="section-white" aria-labelledby="company-title">
      <div class="container">
        <div class="section-header-center">
          <h2 id="company-title" class="section-heading">What We Handle</h2>
        </div>

        <div class="service-grid">
          <article class="service-card">
            <h4 class="service-title">Appeal Drafting & Filing</h4>
            <p class="service-desc">Written submissions prepared and filed at the Commissioner Inland Revenue (Appeals), the Appellate Tribunal, and the High Court.</p>
          </article>

          <article class="service-card">
            <h4 class="service-title">Stay Applications</h4>
            <p class="service-desc">Requesting that recovery proceedings be held off pending the outcome of an appeal, pursued proactively alongside the appeal itself.</p>
          </article>

          <article class="service-card">
            <h4 class="service-title">Rectification Applications</h4>
            <p class="service-desc">A quicker route to correct an apparent, obvious error in an order — a miscalculation or clear mistake — without a full appeal.</p>
          </article>

          <article class="service-card">
            <h4 class="service-title">Alternative Dispute Resolution (ADR)</h4>
            <p class="service-desc">Resolving disputes outside the standard appellate ladder where the nature and stage of the case make it suitable.</p>
          </article>

          <article class="service-card">
            <h4 class="service-title">Hearing Representation</h4>
            <p class="service-desc">We appear at hearings before the relevant forum, from the initial notice stage through to the higher appellate forums.</p>
          </article>

          <article class="service-card">
            <h4 class="service-title">Notice & Audit Response</h4>
            <p class="service-desc">Documented, well-supported replies to FBR notices and audit queries at the earliest stage, to avoid escalation where possible.</p>
          </article>
        </div>
      </div>
    </section>

    <!-- Confidentiality -->
    <section class="section-light" aria-labelledby="confidentiality-title">
      <div class="container">
        <div class="section-header-center">
          <h2 id="confidentiality-title" class="section-heading">Client Confidentiality</h2>
          <p class="lead-text">All client information, financial records, and case details are kept strictly confidential and are never shared or published without your consent.</p>
        </div>
      </div>
    </section>

    <!-- FAQ -->
    <section class="section-white" aria-labelledby="faq-title">
      <div class="container">
        <div class="section-header-center">
          <h2 id="faq-title" class="section-heading">Frequently Asked Questions: Litigation & Representation</h2>
        </div>

        <dl class="faq-list">
          <div class="faq-item active">
            <dt>
              <button class="faq-question" type="button" aria-expanded="true" aria-controls="faq1">
                What should I do if I disagree with a tax assessment or order?
                <i class="fa fa-angle-down" aria-hidden="true"></i>
              </button>
            </dt>
            <dd id="faq1" class="faq-answer" role="definition">
              <p>You generally have the right to appeal. The process typically starts with an appeal to the Commissioner Inland Revenue (Appeals), and can proceed further to the Appellate Tribunal Inland Revenue, the High Court, and ultimately the Supreme Court if the matter involves a substantial question of law.</p>
            </dd>
          </div>

          <div class="faq-item">
            <dt>
              <button class="faq-question" type="button" aria-expanded="false" aria-controls="faq2">
                How long do I have to file an appeal?
                <i class="fa fa-angle-down" aria-hidden="true"></i>
              </button>
            </dt>
            <dd id="faq2" class="faq-answer" role="definition">
              <p>Appeal deadlines are strict and vary by forum and order type — generally a matter of weeks from the date of the order. We recommend reaching out as soon as you get an unfavorable order rather than waiting.</p>
            </dd>
          </div>

          <div class="faq-item">
            <dt>
              <button class="faq-question" type="button" aria-expanded="false" aria-controls="faq3">
                Can recovery proceedings be paused while my appeal is pending?
                <i class="fa fa-angle-down" aria-hidden="true"></i>
              </button>
            </dt>
            <dd id="faq3" class="faq-answer" role="definition">
              <p>In many cases, yes — a stay application can be filed to request that recovery be held off pending the outcome of the appeal. This is separate from the appeal itself and needs to be pursued proactively.</p>
            </dd>
          </div>

          <div class="faq-item">
            <dt>
              <button class="faq-question" type="button" aria-expanded="false" aria-controls="faq4">
                Will you represent me personally at hearings, or just prepare the paperwork?
                <i class="fa fa-angle-down" aria-hidden="true"></i>
              </button>
            </dt>
            <dd id="faq4" class="faq-answer" role="definition">
              <p>We handle both — preparing the written submissions and appearing at hearings before the relevant forum, from the initial notice stage through to the higher appellate forums where needed.</p>
            </dd>
          </div>
        </dl>
      </div>
    </section>

    <!-- CTA Banner -->
    <aside class="cta-banner" aria-labelledby="cta-title">
      <div class="container">
        <div class="cta-content">
          <h2 id="cta-title">Received an Unfavorable Order or Notice?</h2>
          <p>Reach out as soon as possible — appeal deadlines are strict. Talk to a FINANIC consultant today.</p>
          <div class="cta-btn-row">
            <a href="{{ route('contact') }}" class="btn-cta-primary">Talk to a Consultant <i class="fa fa-arrow-right"
                aria-hidden="true"></i></a>
            <a href="https://wa.me/923222244000" class="btn-cta-secondary" target="_blank" rel="noopener"><i class="fa fa-whatsapp" aria-hidden="true"></i> Message on WhatsApp</a>
          </div>
        </div>
      </div>
    </aside>

    </div>
@endsection
