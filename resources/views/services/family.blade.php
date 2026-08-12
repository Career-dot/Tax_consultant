@extends('layouts.app')

@section('title', 'Withholding Tax Services | FINANIC Business Consultants')
@section('meta_description', 'Withhold correctly, file statements on time, and respond effectively to withholding default notices. Withholding tax compliance and defense from FINANIC Business Consultants.')
@section('body_class', 'pf-service-body')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/family-tax/base.css') }}">
@endpush

@section('content')
    <div class="family-tax-frontend family-tax-page">
        <!-- Hero -->
            <section class="hero">
              <div class="hero-container">
                <p class="eyebrow">WITHHOLDING TAX SERVICES</p>

                <h1 class="hero-title">Withholding Tax Compliance & Default Defense</h1>

                <p class="hero-description">
                  Withholding tax obligations are one of the most commonly mishandled areas of compliance. We help you
                  withhold correctly, file statements on time, and respond effectively when a withholding default
                  notice is raised.
                </p>

                <div class="hero-buttons">
                  <a href="{{ route('book.consultation') }}" class="btn btn-white">
                    Talk to a Consultant
                    <span class="arrow">&rarr;</span>
                  </a>
                  <a href="#defense" class="btn btn-outline-light">Withholding Notice? Start Here</a>
                </div>
              </div>
            </section>

            <!-- Part A: Withholding Compliance -->
            <section class="who-can-use">
              <div class="who-can-use-container">
                <h2 class="who-title">Part A — Getting Withholding Right at Source</h2>

                <p class="who-description">
                  Withholding tax requires the payer of certain transactions — salary, rent, payments for goods, services,
                  or contracts, and others — to deduct tax at source and deposit it with the FBR on behalf of the
                  recipient. If your business makes these kinds of payments, you may be legally required to withhold,
                  regardless of whether the tax is "yours."
                </p>

                <div class="who-grid">
                  <div class="who-card">
                    <span class="check-icon">
                      <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2" />
                        <path d="M8 12.5L10.5 15L16 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" />
                      </svg>
                    </span>
                    <p>Correct rate and category determination for each type of payment</p>
                  </div>

                  <div class="who-card">
                    <span class="check-icon">
                      <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2" />
                        <path d="M8 12.5L10.5 15L16 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" />
                      </svg>
                    </span>
                    <p>Quarterly withholding statement preparation and filing</p>
                  </div>

                  <div class="who-card">
                    <span class="check-icon">
                      <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2" />
                        <path d="M8 12.5L10.5 15L16 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" />
                      </svg>
                    </span>
                    <p>Section 236G / 236H advance tax review for distributors, dealers, wholesalers and retailers</p>
                  </div>

                  <div class="who-card">
                    <span class="check-icon">
                      <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2" />
                        <path d="M8 12.5L10.5 15L16 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" />
                      </svg>
                    </span>
                    <p>Exemption certificate applications where your tax position supports it</p>
                  </div>
                </div>
              </div>
            </section>

            <!-- Part B: Withholding Defense & Recovery -->
            <section id="defense" class="why-family">
              <div class="why-family-container">
                <h2 class="why-title">Part B — Withholding Defense & Recovery Matters</h2>

                <div class="why-grid">
                  <div class="why-card">
                    <div class="why-icon">
                      <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 11a3 3 0 100-6 3 3 0 000 6z" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" />
                        <path d="M3 20c0-3.3 2.7-6 6-6s6 2.7 6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" />
                        <path d="M16 11l2 2 4-4" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" />
                      </svg>
                    </div>
                    <h3>Default Notice Response</h3>
                    <p>A documented reply addressing each contested expense head — purchases, rent, salaries, wages, services, fuel, and others — usually within a set deadline.</p>
                  </div>

                  <div class="why-card">
                    <div class="why-icon">
                      <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8l-6-6z" stroke="currentColor"
                          stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M14 2v6h6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" />
                        <path d="M9 13h6M9 17h6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" />
                      </svg>
                    </div>
                    <h3>Supporting Calculations</h3>
                    <p>Building out the supporting calculations and legal basis for each contested line item.</p>
                  </div>

                  <div class="why-card">
                    <div class="why-icon">
                      <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2l8 4v6c0 5-3.5 8.5-8 10-4.5-1.5-8-5-8-10V6l8-4z" stroke="currentColor" stroke-width="2"
                          stroke-linecap="round" stroke-linejoin="round" />
                      </svg>
                    </div>
                    <h3>Recovery Dispute Support</h3>
                    <p>Assessing whether recovery is properly sought from the recipient or from the payer who failed to withhold, based on the facts of your case.</p>
                  </div>

                  <div class="why-card">
                    <div class="why-icon">
                      <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2" />
                        <path d="M8 12.5L10.5 15L16 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" />
                      </svg>
                    </div>
                    <h3>Escalation, If Needed</h3>
                    <p>If a withholding dispute is not resolved at this stage, we carry it forward through litigation and representation.</p>
                  </div>
                </div>
              </div>
            </section>

            <!-- Documents -->
            <section class="docs-needed">
              <div class="docs-needed-container">
                <h2 class="docs-title">Documents We'll Typically Need</h2>

                <div class="docs-list">
                  <div class="docs-item">
                    <span class="check-icon">
                      <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2" />
                        <path d="M8 12.5L10.5 15L16 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" />
                      </svg>
                    </span>
                    <p>Business NTN and withholding agent registration details</p>
                  </div>

                  <div class="docs-item">
                    <span class="check-icon">
                      <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2" />
                        <path d="M8 12.5L10.5 15L16 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" />
                      </svg>
                    </span>
                    <p>Payment and deduction records for the relevant period</p>
                  </div>

                  <div class="docs-item">
                    <span class="check-icon">
                      <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2" />
                        <path d="M8 12.5L10.5 15L16 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" />
                      </svg>
                    </span>
                    <p>Prior withholding statements filed, if any</p>
                  </div>

                  <div class="docs-item">
                    <span class="check-icon">
                      <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2" />
                        <path d="M8 12.5L10.5 15L16 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" />
                      </svg>
                    </span>
                    <p>Any FBR notice received, in full</p>
                  </div>
                </div>

                <p class="docs-note">Our team will confirm the exact documents required once you share the nature of your case.</p>
              </div>
            </section>

            <!-- FAQ -->
            <section class="faq">
              <div class="faq-container">
                <h2 class="faq-title">Frequently Asked Questions: Withholding Tax</h2>

                <div class="faq-list">
                  <div class="faq-item active">
                    <button class="faq-question">
                      <span>I received a notice saying I failed to withhold tax correctly — what happens now?</span>
                      <span class="faq-icon">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        </svg>
                      </span>
                    </button>
                    <div class="faq-answer">
                      <p>This is typically issued under provisions dealing with default in withholding, and can relate to any of several expense heads. It requires a documented reply addressing each contested head, usually within a set deadline. We handle these replies regularly, including building out the supporting calculations and legal basis for each line item.</p>
                    </div>
                  </div>

                  <div class="faq-item">
                    <button class="faq-question">
                      <span>What are Sections 236G and 236H, and which one applies to my business?</span>
                      <span class="faq-icon">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        </svg>
                      </span>
                    </button>
                    <div class="faq-answer">
                      <p>Both relate to advance tax collected on sales — Section 236G applies to sales made to distributors, dealers, and wholesalers, while Section 236H applies to sales made to retailers. The correct rate and applicability depend on who your business is selling to and its role in the supply chain.</p>
                    </div>
                  </div>

                  <div class="faq-item">
                    <button class="faq-question">
                      <span>Can I get an exemption from having tax withheld on payments to me?</span>
                      <span class="faq-icon">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        </svg>
                      </span>
                    </button>
                    <div class="faq-answer">
                      <p>In some cases, yes — an exemption certificate can be obtained where you can demonstrate your existing tax position doesn't warrant further withholding. We can assess your eligibility and handle the application.</p>
                    </div>
                  </div>

                  <div class="faq-item">
                    <button class="faq-question">
                      <span>How often do I need to file a withholding statement?</span>
                      <span class="faq-icon">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        </svg>
                      </span>
                    </button>
                    <div class="faq-answer">
                      <p>Withholding statements are generally filed quarterly, listing all withholding transactions and amounts deposited during the period.</p>
                    </div>
                  </div>
                </div>
              </div>
            </section>

            <!-- CTA -->
            <section class="cta">
              <div class="cta-container">
                <h2 class="cta-title">Facing a Withholding Notice or Need to Get Compliant?</h2>
                <p class="cta-description">Talk to a FINANIC consultant about your withholding tax position today.</p>

                <div class="cta-buttons">
                  <a href="{{ route('book.consultation') }}" class="btn btn-white">
                    Talk to a Consultant
                    <span class="arrow">&rarr;</span>
                  </a>
                  <a href="https://wa.me/923222244000" class="btn btn-outline-light" target="_blank" rel="noopener">
                    <svg class="chat-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Message on WhatsApp
                  </a>
                </div>
              </div>
            </section>
    </div>
@endsection
