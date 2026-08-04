@php
    $footerServices = [
        ['label' => 'Income Tax Services', 'url' => route('services.personal')],
        ['label' => 'Sales Tax Services', 'url' => route('services.gst')],
        ['label' => 'Withholding Tax Services', 'url' => route('services.family')],
        ['label' => 'Tax Litigation & Representation', 'url' => route('services.business')],
        ['label' => 'Corporate / Retainer Services', 'url' => route('services.business-tax')],
    ];

    $footerCompany = [
        ['label' => 'About Us', 'url' => url('/about')],
        ['label' => 'Industries We Serve', 'url' => route('industries')],
        ['label' => 'Services', 'url' => route('home') . '#features-area'],
        ['label' => 'Tax Compliance Planner', 'url' => url('/pricing')],
        ['label' => 'Resources', 'url' => route('resources')],
        ['label' => 'FAQs', 'url' => route('faq')],
        ['label' => 'Contact Us', 'url' => url('/contact')],
    ];
@endphp

<footer id="footer" class="pf-footer">
    <div class="container">
        <div class="row g-4 g-lg-5">
            <div class="col-lg-4 col-md-6 col-12">
                <div class="pf-footer-brand">
                    <a href="{{ url('/') }}" aria-label="FINANIC Business Consultants home">
                        <img src="{{ asset('assets/images/logo/logo.jpeg') }}" alt="FINANIC Business Consultants">
                    </a>
                    <p>Income tax, sales tax, withholding tax compliance and tax litigation representation for individuals, SMEs and corporate groups in Faisalabad.</p>
                    <form class="pf-footer-newsletter" action="{{ url('/contact') }}" method="GET">
                        <label class="visually-hidden" for="footer-newsletter-email">Email address</label>
                        <input id="footer-newsletter-email" type="email" name="email" placeholder="Email address" aria-label="Email address">
                        <button type="submit" aria-label="Subscribe"><i class="fa fa-paper-plane"></i></button>
                    </form>
                    <ul class="pf-footer-social">
                        <li><a href="https://www.facebook.com/" aria-label="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/" aria-label="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://www.instagram.com/" aria-label="Instagram"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="https://www.linkedin.com/" aria-label="LinkedIn"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-2 col-sm-6 col-12">
                <section class="pf-footer-widget">
                    <h2>Services</h2>
                    <ul>
                        @foreach ($footerServices as $service)
                            <li><a href="{{ $service['url'] }}">{{ $service['label'] }}</a></li>
                        @endforeach
                    </ul>
                </section>
            </div>

            <div class="col-lg-2 col-sm-6 col-12">
                <section class="pf-footer-widget">
                    <h2>Company</h2>
                    <ul>
                        @foreach ($footerCompany as $item)
                            <li><a href="{{ $item['url'] }}">{{ $item['label'] }}</a></li>
                        @endforeach
                    </ul>
                </section>
            </div>

            <div class="col-lg-4 col-md-6 col-12">
                <section class="pf-footer-widget pf-footer-contact">
                    <h2>Contact</h2>
                    <ul>
                        <li><i class="fa fa-map-marker"></i><span>Faisalabad, Punjab, Pakistan</span></li>
                        <li><i class="fa fa-phone"></i><a href="tel:+923XXXXXXXXX">+92 3XX XXXXXXX</a></li>
                        <li><i class="fa fa-envelope-o"></i><a href="mailto:info@finanic.pk">info@finanic.pk</a></li>
                        <li><i class="fa fa-globe"></i><a href="{{ url('/') }}">finanic.pk</a></li>
                    </ul>
                </section>
            </div>
        </div>

        <div class="pf-footer-bottom">
            <p>&copy; {{ date('Y') }} <span>FINANIC Business Consultants</span>. All rights reserved.</p>
            <div>
                <a href="{{ url('/contact') }}">Privacy Policy</a>
                <a href="{{ url('/contact') }}">Terms of Service</a>
                <a href="{{ url('/contact') }}">Support</a>
            </div>
        </div>
    </div>
</footer>
