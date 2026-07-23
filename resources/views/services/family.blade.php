@extends('layouts.app')

@section('title', 'Family Tax Filing | Tax Consultant')
@section('body_class', 'pf-service-body')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/family-tax/base.css') }}">
@endpush

@section('content')
    <div class="family-tax-frontend family-tax-page">
        <!-- Family Tax Filing Hero Section -->
            <section class="hero">
              <div class="hero-container">
                <!-- <nav class="breadcrumb">
                  <a href="{{ route('contact') }}">Home</a>
                  <span class="separator">&rsaquo;</span>
                  <a href="{{ route('contact') }}">Services</a>
                  <span class="separator">&rsaquo;</span>
                  <span class="current">Family Tax Filing</span>
                </nav> -->
        
                <p class="eyebrow">FAMILY TAX FILING</p>
        
                <h1 class="hero-title">Family Tax Filing: File for Your Loved Ones with Confidence</h1>
        
                <p class="hero-description">
                  Managing tax returns for multiple family members can be overwhelming. Tax Consultant's family
                  tax filing service lets you file for your spouse, children, parents, and other dependents, all
                  from one account, with one expert team handling everything.
                </p>
        
                <div class="hero-buttons">
                  <a href="{{ route('contact') }}" class="btn btn-white">
                    File for My Family
                    <span class="arrow">&rarr;</span>
                  </a>
                  <a href="{{ route('contact') }}" class="btn btn-outline-light">Contact Us for Pricing</a>
                </div>
              </div>
            </section>
            <!-- Who Can Use Family Tax Filing Section -->
            <section class="who-can-use">
              <div class="who-can-use-container">
                <h2 class="who-title">Who Can Use Family Tax Filing?</h2>
        
                <p class="who-description">
                  If you're the primary breadwinner or financial manager of your household, Tax Consultant's family filing
                  service gives you a single point of contact to manage all your family members' FBR compliance
                  obligations.
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
                    <p>Spouse with salary, rental, or investment income</p>
                  </div>
        
                  <div class="who-card">
                    <span class="check-icon">
                      <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2" />
                        <path d="M8 12.5L10.5 15L16 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" />
                      </svg>
                    </span>
                    <p>Adult children who are salaried or have business income</p>
                  </div>
        
                  <div class="who-card">
                    <span class="check-icon">
                      <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2" />
                        <path d="M8 12.5L10.5 15L16 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" />
                      </svg>
                    </span>
                    <p>Parents who own property or receive pension income</p>
                  </div>
        
                  <div class="who-card">
                    <span class="check-icon">
                      <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2" />
                        <path d="M8 12.5L10.5 15L16 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" />
                      </svg>
                    </span>
                    <p>Any family member required to file under FBR regulations</p>
                  </div>
                </div>
              </div>
            </section>
            <!-- Why File as a Family Through Tax Consultant Section -->
            <section class="why-family">
              <div class="why-family-container">
                <h2 class="why-title">Why File as a Family Through Tax Consultant?</h2>
        
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
                    <h3>Single Point of Contact</h3>
                    <p>One dedicated expert handles all your family's filings. No need to coordinate with multiple accountants.
                    </p>
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
                    <h3>Discounted Family Rates</h3>
                    <p>Filing for multiple family members unlocks volume discounts on our standard personal tax filing fees.</p>
                  </div>
        
                  <div class="why-card">
                    <div class="why-icon">
                      <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2l8 4v6c0 5-3.5 8.5-8 10-4.5-1.5-8-5-8-10V6l8-4z" stroke="currentColor" stroke-width="2"
                          stroke-linecap="round" stroke-linejoin="round" />
                      </svg>
                    </div>
                    <h3>Centralised Document Management</h3>
                    <p>Submit all documents through one secure channel. We organise and track each family member's filing
                      separately.</p>
                  </div>
        
                  <div class="why-card">
                    <div class="why-icon">
                      <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2" />
                        <path d="M8 12.5L10.5 15L16 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" />
                      </svg>
                    </div>
                    <h3>Consistent Compliance</h3>
                    <p>We ensure every family member's return is filed on time, keeping your entire household legally compliant.
                    </p>
                  </div>
                </div>
              </div>
            </section>
            <!-- Documents Needed per Family Member Section -->
            <section class="docs-needed">
              <div class="docs-needed-container">
                <h2 class="docs-title">Documents Needed per Family Member</h2>
        
                <div class="docs-list">
                  <div class="docs-item">
                    <span class="check-icon">
                      <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2" />
                        <path d="M8 12.5L10.5 15L16 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" />
                      </svg>
                    </span>
                    <p>CNIC of each family member to be filed for</p>
                  </div>
        
                  <div class="docs-item">
                    <span class="check-icon">
                      <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2" />
                        <path d="M8 12.5L10.5 15L16 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" />
                      </svg>
                    </span>
                    <p>Income proofs (salary slips, bank statements, rent agreements) for each member</p>
                  </div>
        
                  <div class="docs-item">
                    <span class="check-icon">
                      <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2" />
                        <path d="M8 12.5L10.5 15L16 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" />
                      </svg>
                    </span>
                    <p>Zakat certificates and investment details (if applicable) for each member</p>
                  </div>
        
                  <div class="docs-item">
                    <span class="check-icon">
                      <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2" />
                        <path d="M8 12.5L10.5 15L16 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" />
                      </svg>
                    </span>
                    <p>Asset details: property and vehicle ownership documents</p>
                  </div>
                </div>
        
                <p class="docs-note">Our team will provide a specific checklist once you contact us with your family size and
                  income structure.</p>
              </div>
            </section>
            <!-- Process & Pricing Section -->
            <section class="pricing">
              <div class="pricing-container">
                <h2 class="pricing-title">Process &amp; Pricing</h2>
        
                <p class="pricing-description">
                  Family tax filing is priced per individual, based on their income complexity, using the same
                  pricing structure as Personal Tax Filing. Volume discounts are available for 3 or more family
                  members. Contact our team via WhatsApp or the contact form for a custom quote.
                </p>
        
                <div class="pricing-card">
                  <div class="pricing-row">
                    <span class="pricing-label">Base Rate</span>
                    <span class="pricing-value">From Rs 999 per member</span>
                  </div>
                  <div class="pricing-row">
                    <span class="pricing-label">Volume Discount</span>
                    <span class="pricing-value">3+ members, contact us</span>
                  </div>
                </div>
        
                <a href="{{ route('contact') }}" class="btn btn-quote">
                  Get a Family Filing Quote
                  <span class="arrow">&rarr;</span>
                </a>
              </div>
            </section>
            <!-- Frequently Asked Questions Section -->
            <section class="faq">
              <div class="faq-container">
                <h2 class="faq-title">Frequently Asked Questions</h2>
        
                <div class="faq-list">
                  <div class="faq-item active">
                    <button class="faq-question">
                      <span>Can I file for a family member who lives abroad?</span>
                      <span class="faq-icon">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        </svg>
                      </span>
                    </button>
                    <div class="faq-answer">
                      <p>Yes. If a family member is an overseas Pakistani with assets, property, or income in Pakistan, they are
                        still required to file a tax return in Pakistan. We handle overseas Pakistani filings remotely.</p>
                    </div>
                  </div>
        
                  <div class="faq-item">
                    <button class="faq-question">
                      <span>Does a housewife need to file a tax return?</span>
                      <span class="faq-icon">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        </svg>
                      </span>
                    </button>
                    <div class="faq-answer">
                      <p>A housewife with no personal income is typically not required to file. However, if they own property, a
                        vehicle, or have any investment income or bank deposits in their name, they may be required to file. We
                        recommend consulting with us for a free assessment.</p>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <!-- Ready to Become a Tax Filer CTA Section -->
            <section class="cta">
              <div class="cta-container">
                <h2 class="cta-title">Ready to Become a Tax Filer Today?</h2>
                <p class="cta-description">Join thousands of Pakistanis who file their taxes online, quickly, securely, and
                  affordably.</p>
        
                <div class="cta-buttons">
                  <a href="{{ route('contact') }}" class="btn btn-white">
                    Start Filing Now
                    <span class="arrow">&rarr;</span>
                  </a>
                  <a href="{{ route('contact') }}" class="btn btn-outline-light">
                    <svg class="chat-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Talk to an Expert
                  </a>
                </div>
              </div>
            </section>
            <!-- Footer Section -->
    </div>
@endsection

@push('scripts')

@endpush
