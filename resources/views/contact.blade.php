@extends('layouts.app')

@section('title', 'Contact Us | Tax Consultant')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/family-tax/contact.css') }}">
@endpush

@section('content')
    <div class="family-tax-contact-page">
        <!-- ===================================== -->
            <!-- BREADCRUMB -->
            <!-- ===================================== -->
        
            <!-- <section class="breadcrumb">
        
                <div class="container">
        
                    <a href="{{ route('home') }}">Home</a>
        
                    <span>/</span>
        
                    <strong>Contact</strong>
        
                </div>
        
            </section> -->
        
            <!-- ===================================== -->
            <!-- HERO SECTION -->
            <!-- ===================================== -->
        
            <section class="hero cr-breadcrumb-area">
        
                <div class="container">
        
                 
        
                        <span class="hero-badge">
        
                            <span class="dot"></span>
        
                            Get in Touch
        
                        </span>
        <div class="cr-breadcrumb">
                        <h1>
        
                            Talk to a
        
                            <span>tax consultant</span>
        
                        </h1>
        
                        <p>
        
                            Have a question about filing, registration, or compliance?  Our team of certified CA/ACCA consultants is here to help.
        
                           
        
                        </p>
        </div>
                    </div>
        
                </div>
        
            </section>
        
            <!-- Next Section -->
            <!-- Contact Cards will be added in Part 2 -->
             <!--====================================
                CONTACT SECTION
        =====================================-->
        
        <section class="contact-section">
        
            <div class="container">
        
                <div class="contact-grid">
        
                    <!-- Left Side -->
        
                    <div class="contact-form-card">
        
                        <div class="form-header">
        
                            <h2>
                                <i class="fa fa-envelope"></i>
                                Send us a message
                            </h2>
        
                            <p>We'll get back to you within 24 hours.</p>
        
                        </div>
        
                        <form>
        
                            <div class="row">
        
                                <div class="input-group">
        
                                    <label>FULL NAME</label>
        
                                    <input type="text" placeholder="Ahmed Khan">
        
                                </div>
        
                                <div class="input-group">
        
                                    <label>EMAIL ADDRESS</label>
        
                                    <input type="email" placeholder="you@example.com">
        
                                </div>
        
                            </div>
        
                            <div class="row">
        
                                <div class="input-group">
        
                                    <label>PHONE (OPTIONAL)</label>
        
                                    <input type="text" placeholder="+92 300 1234567">
        
                                </div>
        
                                <div class="input-group">
        
                                    <label>SERVICE INTERESTED IN</label>
        
                                    <select>
        
                                        <option>Select a service...</option>
                                        <option>Income Tax Return</option>
                                        <option>NTN Registration</option>
                                        <option>GST Registration</option>
                                        <option>Business Registration</option>
        
                                    </select>
        
                                </div>
        
                            </div>
        
                            <div class="input-group">
        
                                <label>SUBJECT</label>
        
                                <input type="text"
                                    placeholder="e.g. Tax filing deadline question">
        
                            </div>
        
                            <div class="input-group">
        
                                <label>MESSAGE</label>
        
                                <textarea rows="7"
                                    placeholder="Describe your question or requirement..."></textarea>
        
                            </div>
        
                            <button class="send-btn">
        
                                Send message
                                <i class="fa fa-arrow-right"></i>
        
                            </button>
        
                        </form>
        
                    </div>
        
                    <!-- Right Side -->
        
                    <div class="contact-info">
        
                        <div class="info-card">
        
                            <div class="icon">
                                <i class="fa fa-whatsapp"></i>
                            </div>
        
                            <div>
        
                                <h3>WhatsApp</h3>
        
                                <h4>+92 300 123 4567</h4>
        
                               <p>Mon–Sat, 9am–7pm PKT · Fastest response</p>
                            </div>
        
                        </div>
        
                        <div class="info-card">
        
                            <div class="icon">
                                <i class="fa fa-envelope"></i>
                            </div>
        
                            <div>
        
                                <h3>Email</h3>
        
                                <h4>support@taxconsultant.com</h4>
        
                               <p>Response within 24 hours</p>
                            </div>
        
                        </div>
        
                        <div class="info-card active-card">
        
                            <div class="icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
        
                            <div>
        
                                <h3>Office</h3>
        
                                <p>Blue Area, Islamabad<br>Pakistan</p>
                                <p>Pakistan</p>
        
                            </div>
        
                        </div>
        
                        <div class="info-card">
        
                            <div class="icon">
                                <i class="fa fa-clock-o"></i>
                            </div>
        
                            <div>
        
                                <h3>Working Hours</h3>
        
                                <p>Monday – Saturday</p>
        
                                <p>9:00 AM – 7:00 PM PKT</p>
        
                            </div>
        
                        </div>
        
                        <!-- Emergency Card -->
        
                        <div class="help-card">
        
                            <h2>
        
                                ⚡ Need help urgently?
        
                            </h2>
        
                            <p>
        
                                Message us on WhatsApp for the fastest response.
                                Our team typically replies within minutes during
                                business hours.
        
                            </p>
        
                            <a href="{{ route('contact') }}" class="whatsapp-btn">
        
                                <i class="fa fa-whatsapp"></i>
        
                                Chat on WhatsApp
        
                            </a>
        
                        </div>
        
                    </div>
        
                </div>
        
            </div>
        
        </section>
    </div>
@endsection
