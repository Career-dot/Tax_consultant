@extends('layouts.app')

@section('title', 'Contact Us | Tax Consultant')

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
                    <h1 id="contact-hero-title">Talk to a <span>tax consultant</span></h1>
                    <p>Have a question about filing, registration, or compliance? Our team of certified CA/ACCA consultants is here to help.</p>
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
                                <p>We'll get back to you within 24 hours.</p>
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
                                                <option value="income-tax-return">Income Tax Return</option>
                                                <option value="ntn-registration">NTN Registration</option>
                                                <option value="gst-registration">GST Registration</option>
                                                <option value="business-registration">Business Registration</option>
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
                                        <a href="https://wa.me/923001234567">+92 300 123 4567</a>
                                        <p>Mon-Sat, 9am-7pm PKT. Fastest response.</p>
                                    </div>
                                </article>

                                <article class="info-card">
                                    <span class="contact-icon" aria-hidden="true">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <div class="info-card-content">
                                        <h3>Email</h3>
                                        <a href="mailto:support@taxconsultant.com">support@taxconsultant.com</a>
                                        <p>Response within 24 hours.</p>
                                    </div>
                                </article>

                                <article class="info-card active-card">
                                    <span class="contact-icon" aria-hidden="true">
                                        <i class="fa fa-map-marker"></i>
                                    </span>
                                    <div class="info-card-content">
                                        <h3>Office</h3>
                                        <p>Blue Area, Islamabad<br>Pakistan</p>
                                    </div>
                                </article>

                                <article class="info-card">
                                    <span class="contact-icon" aria-hidden="true">
                                        <i class="fa fa-clock-o"></i>
                                    </span>
                                    <div class="info-card-content">
                                        <h3>Working Hours</h3>
                                        <p>Monday-Saturday<br>9:00 AM-7:00 PM PKT</p>
                                    </div>
                                </article>
                            </div>

                            <article class="help-card">
                                <span class="help-icon" aria-hidden="true">
                                    <i class="fa fa-bolt"></i>
                                </span>
                                <h2>Need help urgently?</h2>
                                <p>Message us on WhatsApp for the fastest response. Our team typically replies within minutes during business hours.</p>
                                <a href="https://wa.me/923001234567" class="whatsapp-btn">
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
