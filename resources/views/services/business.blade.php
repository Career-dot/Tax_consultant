@extends('layouts.app')

@section('title', 'Business Incorporation | Tax Consultant')
@section('body_class', 'pf-service-body')


@section('content')
    <div class="pf-service-page">
<!-- Hero -->
    <section class="hero" aria-labelledby="hero-title">
      <div class="container">
        <!-- <nav class="hero-breadcrumb" aria-label="Breadcrumb">
          <span>Home</span>
          <span aria-hidden="true">&rsaquo;</span>
          <span>Services</span>
          <span aria-hidden="true">&rsaquo;</span>
          <span>Business Incorporation</span>
        </nav> -->
        <div class="hero-eyebrow">Business Incorporation</div>
        <h1 id="hero-title">Business Incorporation &amp; Company Registration in Pakistan</h1>
        <p class="hero-text">From registering a Private Limited Company with SECP to setting up an NPO or obtaining PSEB
          certification, Pak Filer's incorporation experts handle the entire process so you can focus on building your
          business.</p>
        <div class="hero-btn-row">
          <a href="{{ route('home') }}#features-area" class="btn-hero-primary">Start My Business Registration <i class="fa fa-arrow-right"
              aria-hidden="true"></i></a>
          <a href="{{ route('home') }}#features-area" class="btn-hero-secondary">Explore All Incorporation Services</a>
        </div>
      </div>
    </section>

    <!-- Platform Preview -->
    <section class="section-light" aria-labelledby="platform-title">
      <div class="container">
        <div class="section-header-center">
          <h2 id="platform-title" class="section-heading">See How It Works on Our Platform</h2>
          <p class="section-intro">Browse incorporation categories, select your service, and submit &mdash; all from your
            dashboard.</p>
        </div>

        <div class="mockup">
          <div class="mockup-bar">
            <div class="mockup-dots">
              <span class="dot red" aria-hidden="true"></span>
              <span class="dot yellow" aria-hidden="true"></span>
              <span class="dot green" aria-hidden="true"></span>
            </div>
            <div class="mockup-title">Pak Filer Dashboard</div>
          </div>

          <div class="mockup-head">
            <h3 class="mockup-heading">Business Incorporation</h3>
            <p class="mockup-sub">Register your business with the relevant authorities</p>
            <a href="{{ route('home') }}#features-area" class="mockup-back">&larr; Back to Services</a>
          </div>

          <div class="category-grid">
            <article class="category-card">
              <div class="category-icon"><i class="fa fa-building" aria-hidden="true"></i></div>
              <h4 class="category-title">Company / Entity Registration</h4>
              <p class="category-desc">Register companies, partnerships, and LLPs</p>
            </article>

            <article class="category-card">
              <div class="category-icon"><i class="fa fa-heart" aria-hidden="true"></i></div>
              <h4 class="category-title">NPO / Trust / Charity</h4>
              <p class="category-desc">Register NPOs, trusts, and charity organizations</p>
            </article>

            <article class="category-card">
              <div class="category-icon"><i class="fa fa-users" aria-hidden="true"></i></div>
              <h4 class="category-title">Employee Benefit Funds</h4>
              <p class="category-desc">Register provident, gratuity, and other employee funds</p>
            </article>

            <article class="category-card">
              <div class="category-icon"><i class="fa fa-laptop" aria-hidden="true"></i></div>
              <h4 class="category-title">PSEB Registrations</h4>
              <p class="category-desc">Register with Pakistan Software Export Board</p>
            </article>

            <article class="category-card">
              <div class="category-icon"><i class="fa fa-university" aria-hidden="true"></i></div>
              <h4 class="category-title">Trade Bodies &amp; Associations</h4>
              <p class="category-desc">Register with chambers of commerce and trade associations</p>
            </article>

            <article class="category-card">
              <div class="category-icon"><i class="fa fa-check-circle" aria-hidden="true"></i></div>
              <h4 class="category-title">Company Compliance Services</h4>
              <p class="category-desc">Annual compliance and director changes</p>
            </article>
          </div>
        </div>
      </div>
    </section>

    <!-- Company & Entity Registration -->
    <section class="section-white" aria-labelledby="company-title">
      <div class="container">
        <div class="section-header-center">
          <h2 id="company-title" class="section-heading">Company &amp; Entity Registration Services</h2>
        </div>

        <div class="service-grid">
          <article class="service-card">
            <h4 class="service-title">Private Limited Company Registration</h4>
            <p class="service-desc">Register a Private Limited Company with SECP, the most common business structure in
              Pakistan.</p>
            <dl class="service-details">
              <div class="service-row">
                <dt class="service-label">Professional Fee</dt>
                <dd class="service-value green">Rs 25,000 (Minimum)</dd>
              </div>
              <div class="service-row">
                <dt class="service-label">Government Fee</dt>
                <dd class="service-value">SECP fee depends on Authorized Capital</dd>
              </div>
              <div class="service-row">
                <dt class="service-label">Timeline</dt>
                <dd class="service-value">3&ndash;10 Working Days</dd>
              </div>
            </dl>
          </article>

          <article class="service-card">
            <h4 class="service-title">Single Member Company (SMC) Registration</h4>
            <p class="service-desc">A Single Member Company (SMC) is a Private Limited Company with only one
              member/director.</p>
            <dl class="service-details">
              <div class="service-row">
                <dt class="service-label">Professional Fee</dt>
                <dd class="service-value green">Rs 25,000 (Minimum)</dd>
              </div>
              <div class="service-row">
                <dt class="service-label">Government Fee</dt>
                <dd class="service-value">SECP fee depends on Authorized Capital</dd>
              </div>
              <div class="service-row">
                <dt class="service-label">Timeline</dt>
                <dd class="service-value">3&ndash;10 Working Days</dd>
              </div>
            </dl>
          </article>

          <article class="service-card">
            <h4 class="service-title">Limited Liability Partnership (LLP) Registration</h4>
            <p class="service-desc">An LLP combines the flexibility of a partnership with the limited liability
              protection of a company.</p>
            <dl class="service-details">
              <div class="service-row">
                <dt class="service-label">Professional Fee</dt>
                <dd class="service-value green">Rs 45,000</dd>
              </div>
              <div class="service-row">
                <dt class="service-label">Government Fee</dt>
                <dd class="service-value">SECP fees applicable</dd>
              </div>
              <div class="service-row">
                <dt class="service-label">Timeline</dt>
                <dd class="service-value">7&ndash;10 Working Days</dd>
              </div>
            </dl>
          </article>

          <article class="service-card">
            <h4 class="service-title">Partnership / AOP Registration</h4>
            <p class="service-desc">Register your partnership or Association of Persons with the relevant local
              authority.</p>
            <dl class="service-details">
              <div class="service-row">
                <dt class="service-label">Professional Fee</dt>
                <dd class="service-value green">Rs 45,000 (City dependent)</dd>
              </div>
              <div class="service-row">
                <dt class="service-label">Timeline</dt>
                <dd class="service-value">7&ndash;15 Working Days</dd>
              </div>
            </dl>
          </article>
        </div>
      </div>
    </section>

    <!-- NPO / Trust / Charity -->
    <section class="section-light" aria-labelledby="npo-title">
      <div class="container">
        <div class="section-header-center">
          <h2 id="npo-title" class="section-heading">NPO, Trust &amp; Charity Registration Services</h2>
        </div>

        <div class="service-grid">
          <article class="service-card">
            <h4 class="service-title">NPO Registration with SECP</h4>
            <dl class="service-details">
              <div class="service-row">
                <dt class="service-label">Fee</dt>
                <dd class="service-value green">Rs 320,000</dd>
              </div>
              <div class="service-row">
                <dt class="service-label">Govt Fee</dt>
                <dd class="service-value">Rs 180,000 (SECP Fee)</dd>
              </div>
              <div class="service-row">
                <dt class="service-label">Time</dt>
                <dd class="service-value">3&ndash;4 Months</dd>
              </div>
            </dl>
          </article>

          <article class="service-card">
            <h4 class="service-title">NPO Registration with Registrar (Provincial)</h4>
            <dl class="service-details">
              <div class="service-row">
                <dt class="service-label">Fee</dt>
                <dd class="service-value green">Rs 320,000</dd>
              </div>
              <div class="service-row">
                <dt class="service-label">Govt Fee</dt>
                <dd class="service-value">Rs 15,500 (Official Fee)</dd>
              </div>
              <div class="service-row">
                <dt class="service-label">Time</dt>
                <dd class="service-value">3&ndash;4 Months</dd>
              </div>
            </dl>
          </article>

          <article class="service-card">
            <h4 class="service-title">Trust Registration with Registrar</h4>
            <dl class="service-details">
              <div class="service-row">
                <dt class="service-label">Fee</dt>
                <dd class="service-value green">Rs 320,000</dd>
              </div>
              <div class="service-row">
                <dt class="service-label">Govt Fee</dt>
                <dd class="service-value">Rs 10,500 (Official Fee)</dd>
              </div>
              <div class="service-row">
                <dt class="service-label">Time</dt>
                <dd class="service-value">3&ndash;4 Months</dd>
              </div>
            </dl>
          </article>

          <article class="service-card">
            <h4 class="service-title">Sindh Charity Commission Registration</h4>
            <dl class="service-details">
              <div class="service-row">
                <dt class="service-label">Fee</dt>
                <dd class="service-value green">Rs 320,000</dd>
              </div>
              <div class="service-row">
                <dt class="service-label">Govt Fee</dt>
                <dd class="service-value">Rs 10,000 (Official Fee)</dd>
              </div>
              <div class="service-row">
                <dt class="service-label">Time</dt>
                <dd class="service-value">3&ndash;4 Months</dd>
              </div>
            </dl>
          </article>

          <article class="service-card">
            <h4 class="service-title">PCP Certification</h4>
            <dl class="service-details">
              <div class="service-row">
                <dt class="service-label">Fee</dt>
                <dd class="service-value green">Rs 300,000</dd>
              </div>
              <div class="service-row">
                <dt class="service-label">Time</dt>
                <dd class="service-value">Case-based</dd>
              </div>
            </dl>
          </article>

          <article class="service-card">
            <h4 class="service-title">FBR NPO Approval</h4>
            <dl class="service-details">
              <div class="service-row">
                <dt class="service-label">Fee</dt>
                <dd class="service-value green">Rs 90,000</dd>
              </div>
              <div class="service-row">
                <dt class="service-label">Time</dt>
                <dd class="service-value">Depends on approvals</dd>
              </div>
            </dl>
          </article>
        </div>
      </div>
    </section>

    <!-- PSEB -->
    <section class="section-white" aria-labelledby="pseb-title">
      <div class="container">
        <div class="section-header-center">
          <h2 id="pseb-title" class="section-heading">Pakistan Software Export Board (PSEB) Registrations</h2>
        </div>

        <div class="service-grid">
          <article class="service-card">
            <h4 class="service-title">PSEB Freelancer Registration (New)</h4>
            <dl class="service-details">
              <div class="service-row">
                <dt class="service-label">Fee</dt>
                <dd class="service-value green">Rs 15,000</dd>
              </div>
              <div class="service-row">
                <dt class="service-label">Time</dt>
                <dd class="service-value">10 Working Days</dd>
              </div>
            </dl>
          </article>

          <article class="service-card">
            <h4 class="service-title">PSEB Freelancer Renewal</h4>
            <dl class="service-details">
              <div class="service-row">
                <dt class="service-label">Fee</dt>
                <dd class="service-value green">Rs 15,000</dd>
              </div>
              <div class="service-row">
                <dt class="service-label">Time</dt>
                <dd class="service-value">10 Working Days</dd>
              </div>
            </dl>
          </article>

          <article class="service-card">
            <h4 class="service-title">PSEB Company Registration (New)</h4>
            <dl class="service-details">
              <div class="service-row">
                <dt class="service-label">Fee</dt>
                <dd class="service-value green">Rs 25,000</dd>
              </div>
              <div class="service-row">
                <dt class="service-label">Time</dt>
                <dd class="service-value">15 Working Days</dd>
              </div>
            </dl>
          </article>

          <article class="service-card">
            <h4 class="service-title">PSEB Company Renewal</h4>
            <dl class="service-details">
              <div class="service-row">
                <dt class="service-label">Fee</dt>
                <dd class="service-value green">Rs 25,000</dd>
              </div>
              <div class="service-row">
                <dt class="service-label">Time</dt>
                <dd class="service-value">15 Working Days</dd>
              </div>
            </dl>
          </article>

          <article class="service-card">
            <h4 class="service-title">PSEB Call Center Registration</h4>
            <dl class="service-details">
              <div class="service-row">
                <dt class="service-label">Fee</dt>
                <dd class="service-value green">Rs 35,000</dd>
              </div>
              <div class="service-row">
                <dt class="service-label">Time</dt>
                <dd class="service-value">30 Working Days</dd>
              </div>
            </dl>
          </article>

          <article class="service-card">
            <h4 class="service-title">PSEB Call Center Renewal</h4>
            <dl class="service-details">
              <div class="service-row">
                <dt class="service-label">Fee</dt>
                <dd class="service-value green">Rs 30,000</dd>
              </div>
              <div class="service-row">
                <dt class="service-label">Time</dt>
                <dd class="service-value">20 Working Days</dd>
              </div>
            </dl>
          </article>
        </div>
      </div>
    </section>

    <!-- Why Choose -->
    <section class="section-light" aria-labelledby="why-title">
      <div class="container">
        <div class="section-header-center">
          <h2 id="why-title" class="section-heading">Why Choose Pak Filer for Business Incorporation?</h2>
        </div>

        <ul class="checklist" role="list">
          <li class="check-item">
            <i class="fa fa-check tick" aria-hidden="true"></i>
            <span><strong>End-to-End Management:</strong> We handle everything from name reservation to final
              certificate delivery</span>
          </li>
          <li class="check-item">
            <i class="fa fa-check tick" aria-hidden="true"></i>
            <span><strong>SECP-Experienced Team:</strong> Our incorporation specialists have years of SECP filing
              experience</span>
          </li>
          <li class="check-item">
            <i class="fa fa-check tick" aria-hidden="true"></i>
            <span><strong>Transparent Fees:</strong> All government fees communicated upfront. No surprises</span>
          </li>
          <li class="check-item">
            <i class="fa fa-check tick" aria-hidden="true"></i>
            <span><strong>Nationwide Coverage:</strong> Available for most major cities including Karachi, Lahore, and
              Islamabad</span>
          </li>
          <li class="check-item">
            <i class="fa fa-check tick" aria-hidden="true"></i>
            <span><strong>Post-Incorporation Support:</strong> We guide you on NTN, GST, bank account setup, and ongoing
              compliance</span>
          </li>
        </ul>
      </div>
    </section>

    <!-- FAQ -->
    <section class="section-white" aria-labelledby="faq-title">
      <div class="container">
        <div class="section-header-center">
          <h2 id="faq-title" class="section-heading">Frequently Asked Questions</h2>
        </div>

        <dl class="faq-list">
          <div class="faq-item active">
            <dt>
              <button class="faq-question" type="button" aria-expanded="true" aria-controls="faq1">
                How long does it take to register a Private Limited Company in Pakistan?
                <i class="fa fa-angle-down" aria-hidden="true"></i>
              </button>
            </dt>
            <dd id="faq1" class="faq-answer" role="definition">
              <p>With complete documentation, a Private Limited Company can typically be registered with SECP in 3&ndash;10
                working days. The timeline depends on name availability, document accuracy, and SECP processing times.
              </p>
            </dd>
          </div>

          <div class="faq-item">
            <dt>
              <button class="faq-question" type="button" aria-expanded="false" aria-controls="faq2">
                What is the minimum capital required for a Private Limited Company?
                <i class="fa fa-angle-down" aria-hidden="true"></i>
              </button>
            </dt>
            <dd id="faq2" class="faq-answer" role="definition">
              <p>There is no fixed minimum capital requirement set by SECP for most Private Limited Companies. The
                authorized capital is decided by the founders based on their business needs, and SECP fees scale with
                the authorized capital chosen.</p>
            </dd>
          </div>

          <div class="faq-item">
            <dt>
              <button class="faq-question" type="button" aria-expanded="false" aria-controls="faq3">
                Can a foreigner incorporate a company in Pakistan?
                <i class="fa fa-angle-down" aria-hidden="true"></i>
              </button>
            </dt>
            <dd id="faq3" class="faq-answer" role="definition">
              <p>Yes. Foreign nationals and overseas Pakistanis can incorporate a company in Pakistan, including wholly
                foreign-owned companies, subject to SECP requirements and applicable sector regulations.</p>
            </dd>
          </div>
        </dl>
      </div>
    </section>

    <!-- CTA Banner -->
    <aside class="cta-banner" aria-labelledby="cta-title">
      <div class="container">
        <div class="cta-content">
          <h2 id="cta-title">Ready to Become a Tax Filer Today?</h2>
          <p>Join thousands of Pakistanis who file their taxes online, quickly, securely, and affordably.</p>
          <div class="cta-btn-row">
            <a href="{{ route('home') }}#features-area" class="btn-cta-primary">Start Filing Now <i class="fa fa-arrow-right"
                aria-hidden="true"></i></a>
            <a href="{{ route('home') }}#features-area" class="btn-cta-secondary"><i class="fa fa-comments-o" aria-hidden="true"></i> Talk to
              an Expert</a>
          </div>
        </div>
      </div>
    </aside>
  
    </div>
@endsection






