@extends('layouts.app')

@section('title', 'Corporate / Retainer Services | FINANIC Business Consultants')
@section('meta_description', 'Consolidated monthly compliance across income tax, sales tax, and withholding tax for multi-entity groups, from FINANIC Business Consultants, Faisalabad.')
@section('body_class', 'pf-service-body')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/family-tax/base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/family-tax/business-tax.css') }}">
@endpush

@section('content')
    <div class="family-tax-frontend business-tax-page">
        <!-- ===================== HERO ===================== -->
                <section class="hero">
                    <div class="container">
                        <p class="eyebrow">Corporate / Retainer Services</p>
                        <h1>Consolidated Monthly Compliance for Multi-Entity Groups</h1>
                        <p class="hero-desc">For SMEs and corporate groups running multiple entities, FINANIC provides a single
                            monthly retainer covering income tax, sales tax, and withholding tax compliance, along with
                            bookkeeping supervision and structuring advisory.</p>
                        <div class="hero-actions">
                            <a href="{{ route('contact') }}" class="btn btn-white">Discuss a Retainer <span class="arrow">-></span></a>
                            <a href="#included" class="btn btn-outline">What's Included</a>
                        </div>
                    </div>
                </section>

                <!-- ===================== ENTITIES ===================== -->
                <section class="entities">
                    <div class="container">
                        <h2 class="section-title">Who We Serve With Retainer Support</h2>
                        <div class="entity-grid">
                            <div class="entity-card">
                                <div class="entity-icon">Group</div>
                                <h3>Multi-Entity Corporate Groups</h3>
                                <p>Groups operating several related entities that need consolidated, coordinated compliance
                                    handled from a single point of contact.</p>
                            </div>
                            <div class="entity-card">
                                <div class="entity-icon">Team</div>
                                <h3>Partnerships / AOPs</h3>
                                <p>Partnership firms and Associations of Persons with ongoing monthly compliance needs across
                                    tax heads.</p>
                            </div>
                            <div class="entity-card">
                                <div class="entity-icon">Company</div>
                                <h3>Private Limited Companies</h3>
                                <p>Companies incorporated under SECP requiring consistent, monitored FBR compliance
                                    throughout the year.</p>
                            </div>
                            <div class="entity-card">
                                <div class="entity-icon">SME</div>
                                <h3>Growing SMEs</h3>
                                <p>Businesses scaling up from single-entity to multi-entity structures across sectors such as
                                    distribution, transport, pharmaceuticals, and FMCG.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ===================== WHAT'S INCLUDED ===================== -->
                <section id="included" class="included">
                    <div class="container">
                        <h2 class="section-title">What's Included in a Retainer Engagement</h2>
                        <ul class="check-list ">
                            <li><span class="check-icon">✓</span> Consolidated monthly compliance across income tax, sales
                                tax, and withholding tax for multi-entity groups</li>
                            <li><span class="check-icon">✓</span> Representation included up to first appeal (Commissioner
                                Inland Revenue - Appeals); higher-forum litigation (Appellate Tribunal, High Court, Supreme
                                Court) scoped and billed separately</li>
                            <li><span class="check-icon">✓</span> Bookkeeping supervision — prescribing chart of accounts and
                                reviewing entries (day-to-day entries remain the client's responsibility)</li>
                            <li><span class="check-icon">✓</span> Digital invoicing advisory and supervisory review</li>
                            <li><span class="check-icon">✓</span> Sector-specific structuring advisory, such as distribution
                                agency characterization or dormant-sector activation</li>
                        </ul>
                    </div>
                </section>

                <!-- ===================== FEE DISCUSSION ===================== -->
                <section class="pricing" id="pricing">
                    <div class="container">
                        <h2 class="section-title">Retainer Fees</h2>
                        <p class="section-subtitle" style="text-align:center; max-width: 720px; margin: 0 auto;">Retainer scope and fees are tailored to the number of entities, tax heads, and sectors involved, and are discussed after an initial consultation. Get in touch to arrange a scoping call.</p>
                        <div class="hero-actions" style="justify-content:center; margin-top: 2rem;">
                            <a href="{{ route('contact') }}" class="btn btn-primary">Request a Retainer Consultation</a>
                        </div>
                    </div>
                </section>

                <!-- ===================== FAQ ===================== -->
                <section class="faq" id="faq">
                    <div class="container">
                        <h2 class="section-title">Frequently Asked Questions</h2>
                        <div class="faq-list">
                            <div class="faq-item open">
                                <button class="faq-question">
                                    Do you offer one-off services, or only ongoing retainers?
                                    <span class="faq-toggle">-</span>
                                </button>
                                <div class="faq-answer">
                                    <p>Both. We handle one-time needs like registration or a single year's return filing, as well as ongoing monthly retainer relationships that combine compliance work with representation if a dispute arises.</p>
                                </div>
                            </div>
                            <div class="faq-item">
                                <button class="faq-question">
                                    Does the retainer cover litigation if a dispute arises?
                                    <span class="faq-toggle">+</span>
                                </button>
                                <div class="faq-answer">
                                    <p>Representation is included up to the first appeal stage (Commissioner Inland Revenue - Appeals). Litigation at higher forums — the Appellate Tribunal, High Court, or Supreme Court — is scoped and billed separately.</p>
                                </div>
                            </div>
                            <div class="faq-item">
                                <button class="faq-question">
                                    Who is responsible for day-to-day bookkeeping entries?
                                    <span class="faq-toggle">+</span>
                                </button>
                                <div class="faq-answer">
                                    <p>We provide bookkeeping supervision — prescribing a chart of accounts and reviewing entries — but day-to-day entries remain the client's responsibility.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ===================== CTA ===================== -->
                <section class="cta">
                    <div class="container">
                        <h2>Ready to Consolidate Your Group's Compliance?</h2>
                        <p>Talk to a FINANIC consultant about a retainer scoped to your entities and sectors.</p>
                        <div class="cta-actions">
                            <a href="{{ route('contact') }}" class="btn btn-white">Talk to a Consultant <span class="arrow">-></span></a>
                            <a href="https://wa.me/923222244000" class="btn btn-outline-light" target="_blank" rel="noopener">Message on WhatsApp</a>
                        </div>
                    </div>
                </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/family-tax/business-tax.js') }}" defer></script>
@endpush
