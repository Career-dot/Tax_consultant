@extends('layouts.app')

@section('title', 'Contact Us | FINANIC Business Consultants')
@section('meta_description', 'Get in touch with FINANIC Business Consultants in Faisalabad for income tax, sales tax, withholding tax, and tax litigation & representation support.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/family-tax/contact.css') }}">
@endpush

@section('content')
    <div class="family-tax-contact-page">
        <section class="contact-hero cr-breadcrumb-area section-padding--md" aria-labelledby="contact-hero-title">
            <div class="container">
                <span class="contact-eyebrow">
                    <span aria-hidden="true"></span>
                    Get in Touch
                </span>

                <div class="cr-breadcrumb contact-hero-content">
                    <h1 id="contact-hero-title">Talk to a <span>FINANIC tax consultant</span></h1>
                    <p>Have a question about income tax, sales tax, withholding tax, or a dispute with the FBR? Our Faisalabad-based team is here to help.</p>
                </div>
            </div>
        </section>

        <section class="contact-section section-padding--xlg bg--white" aria-labelledby="contact-form-title">
            <div class="container">
                <div class="row g-4 g-xl-5 align-items-start">
                    <div class="col-lg-7">
                        <article class="contact-form-card h-100">
                            <div class="contact-form-header">
                                <h2 id="contact-form-title">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    Send us a message
                                </h2>
                                <p>We'll get back to you as soon as possible.</p>
                            </div>

                            <form class="contact-form" action="{{ route('contact') }}" method="GET">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="contact-field">
                                            <label for="contact-name">Full Name</label>
                                            <input id="contact-name" name="name" type="text" placeholder="Ahmed Khan" autocomplete="name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="contact-field">
                                            <label for="contact-email">Email Address</label>
                                            <input id="contact-email" name="email" type="email" placeholder="you@example.com" autocomplete="email">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="contact-field">
                                            <label for="contact-phone">Phone <span>(Optional)</span></label>
                                            <input id="contact-phone" name="phone" type="tel" placeholder="+92 300 1234567" autocomplete="tel">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="contact-field">
                                            <label for="contact-service">Service Interested In</label>
                                            <select id="contact-service" name="service">
                                                <option value="">Select a service...</option>
                                                <option value="income-tax">Income Tax Services</option>
                                                <option value="sales-tax">Sales Tax Services</option>
                                                <option value="withholding-tax">Withholding Tax Services</option>
                                                <option value="litigation">Tax Litigation & Representation</option>
                                                <option value="corporate-retainer">Corporate / Retainer Services</option>
                                                <option value="ntn-registration">NTN Registration</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="contact-field">
                                            <label for="contact-subject">Subject</label>
                                            <input id="contact-subject" name="subject" type="text" placeholder="e.g. Tax filing deadline question">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="contact-field">
                                            <label for="contact-message">Message</label>
                                            <textarea id="contact-message" name="message" rows="7" placeholder="Describe your question or requirement..."></textarea>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button class="send-btn" type="submit">
                                            <span>Send message</span>
                                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </article>
                    </div>

                    <div class="col-lg-5">
                        <aside class="contact-info" aria-label="Contact information">
                            <div class="contact-info-grid">
                                <article class="info-card">
                                    <span class="contact-icon" aria-hidden="true">
                                        <i class="fa fa-whatsapp"></i>
                                    </span>
                                    <div class="info-card-content">
                                        <h3>WhatsApp</h3>
                                        <a href="https://wa.me/923XXXXXXXXX">+92 3XX XXXXXXX</a>
                                        <p>Mon-Sat, business hours. Fastest response.</p>
                                    </div>
                                </article>

                                <article class="info-card">
                                    <span class="contact-icon" aria-hidden="true">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <div class="info-card-content">
                                        <h3>Email</h3>
                                        <a href="mailto:info@finanic.pk">info@finanic.pk</a>
                                        <p>We aim to respond promptly.</p>
                                    </div>
                                </article>

                                <article class="info-card active-card">
                                    <span class="contact-icon" aria-hidden="true">
                                        <i class="fa fa-map-marker"></i>
                                    </span>
                                    <div class="info-card-content">
                                        <h3>Office</h3>
                                        <p>Faisalabad<br>Punjab, Pakistan</p>
                                    </div>
                                </article>

                                <article class="info-card">
                                    <span class="contact-icon" aria-hidden="true">
                                        <i class="fa fa-clock-o"></i>
                                    </span>
                                    <div class="info-card-content">
                                        <h3>Working Hours</h3>
                                        <p>Monday-Saturday<br>Business Hours PKT</p>
                                    </div>
                                </article>
                            </div>

                            <article class="help-card">
                                <span class="help-icon" aria-hidden="true">
                                    <i class="fa fa-bolt"></i>
                                </span>
                                <h2>Need help urgently?</h2>
                                <p>Message us on WhatsApp for the fastest response during business hours.</p>
                                <a href="https://wa.me/923XXXXXXXXX" class="whatsapp-btn">
                                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                    Chat on WhatsApp
                                </a>
                            </article>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
