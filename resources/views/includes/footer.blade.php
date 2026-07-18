<footer id="footer" class="footer-area fixed--footer">
    <div class="footer-area__widgets section-padding--md bg--dark--light">
        <div class="container">
            <div class="footer-area__logo text-center">
                <a href="{{ url('/') }}" aria-label="Korde home">
                    <img src="{{ asset('assets/images/logo/career-institute-logo.webp') }}" alt="Career Institute">
                </a>
            </div>

            <div class="widget-area footer--widgets">
                <section class="widget widget-about">
                    <h5 class="widget-title">ABOUT KORDE</h5>
                    <p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium oloremque laudantium, totam rem onsectetur sires to obtain pain of itself because.</p>
                    <div class="social-icons social-icons--rounded">
                        <ul>
                            <li class="facebook">
                                <a href="https://www.facebook.com/" aria-label="Facebook"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li class="twitter">
                                <a href="https://twitter.com/" aria-label="Twitter"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li class="instagram">
                                <a href="https://www.instagram.com/" aria-label="Instagram"><i class="fa fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </section>

                <section class="widget widget-quick-links">
                    <h5 class="widget-title">QUICK LINKS</h5>
                    <ul>
                        <li><a href="{{ url('/services') }}">Our Services</a></li>
                        <li><a href="{{ url('/features') }}">Features</a></li>
                        <li><a href="{{ url('/about') }}">About Us</a></li>
                        <li><a href="{{ url('/blogs') }}">Blogs</a></li>
                        <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                    </ul>
                </section>

                <section class="widget widget-twitter-feed">
                    <h5 class="widget-title">Twitter Feed</h5>
                    <ul>
                        <li>
                            <p><a href="https://twitter.com/">@Alex Smith</a>, unde omnis te us error sit voluptatem</p>
                            <span class="time"><a href="https://twitter.com/">10 Mins ago</a></span>
                        </li>
                        <li>
                            <p><a href="https://twitter.com/">@Justin Bieber</a>, unde omnis te us error sit voluptatem</p>
                            <span class="time"><a href="https://twitter.com/">12 Mins ago</a></span>
                        </li>
                    </ul>
                </section>

                <section class="widget widget-contact-info">
                    <h5 class="widget-title">Contact Info</h5>
                    <ul>
                        <li>
                            <p>256 North Tower, Western City Mid Town, Las Vegas, USA</p>
                        </li>
                        <li>
                            <p><a href="tel:+00812568987789">+008 12568 987 789</a></p>
                            <p><a href="tel:+00835687567458">+008 35687 567 458</a></p>
                        </li>
                        <li>
                            <p><a href="mailto:info@korde.com">info@korde.com</a></p>
                            <p><a href="{{ url('/') }}">www.korde.com</a></p>
                        </li>
                    </ul>
                </section>
            </div>
        </div>
    </div>

    <div class="footer-area__copyright bg--dark">
        <div class="container">
            <div class="copyright text-center">
                <p>&copy; {{ date('Y') }} <span>Korde</span> Made with <i class="fa fa-heart"></i> by <a href="https://hasthemes.com/">HasThemes</a></p>
            </div>
        </div>
    </div>
</footer>
