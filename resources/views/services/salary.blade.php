@extends('layouts.app')

@section('title', 'Salary Withholding Tax Calculator | FINANIC Business Consultants')
@section('meta_description', 'Free calculator to estimate salary withholding tax under current FBR tax slabs, from FINANIC Business Consultants.')
@section('body_class', 'pf-service-body')


@section('content')
    <div class="pf-service-page">
<!-- Hero -->
    <section class="page-hero hero-green" aria-labelledby="hero-title">
      <div class="container">
        <!-- <nav class="breadcrumb" aria-label="Breadcrumb">
          <a href="{{ route('home') }}">Home</a>
          <span aria-hidden="true">/</span>
          <a href="{{ route('contact') }}">Services</a>
          <span aria-hidden="true">/</span>
          <span>Salary Tax Calculator</span>
        </nav> -->
        <span class="eyebrow">Free Salary Withholding Calculator</span>
        <h1 id="hero-title">Salary Withholding Tax Calculator: Know Your Tax Before You File</h1>
        <p class="lead">
          Use our free salary withholding tax calculator to instantly estimate your annual
          income tax liability under Pakistan's current FBR tax slabs.
          No signup required.
        </p>
        <ul class="hero-chips" role="list">
          <li class="hero-chip"><i class="fa fa-check-circle" aria-hidden="true"></i> Free to Use</li>
          <li class="hero-chip"><i class="fa fa-calendar" aria-hidden="true"></i> Tax Year 2024&ndash;25</li>
          <li class="hero-chip"><i class="fa fa-clone" aria-hidden="true"></i> FBR Tax Slabs</li>
          <li class="hero-chip"><i class="fa fa-bolt" aria-hidden="true"></i> Instant Results</li>
        </ul>
      </div>
    </section>

    <!-- Calculator -->
    <section class="section-light" aria-labelledby="calc-title">
      <div class="container">
        <div class="section-header-center">
          <h2 id="calc-title" class="section-heading">Calculate Your Salary Tax Instantly</h2>
        </div>

        <div class="calc-card">
          <div class="calc-title"><i class="fa fa-calculator" aria-hidden="true"></i> Salary Tax Calculator</div>

          <div class="field-group">
            <label class="field-label" for="monthlySalary">Monthly Salary (PKR)</label>
            <input type="number" id="monthlySalary" class="field-input" placeholder="Enter your monthly salary" min="0">
          </div>

          <div class="field-group">
            <label class="field-label" for="taxYear">Tax Year</label>
            <select id="taxYear" class="field-select">
              <option value="2025-2026">2025&ndash;2026</option>
              <option value="2024-2025">2024&ndash;2025</option>
            </select>
          </div>

          <button class="calc-btn" id="calcBtn">Calculate Tax</button>

          <div class="calc-result" id="calcResult">
            <div class="result-row"><span>Annual Taxable Income</span><strong id="resAnnual">Rs 0</strong></div>
            <div class="result-row"><span>Applicable Slab</span><strong id="resSlab">&mdash;</strong></div>
            <div class="result-row highlight">
              <div>
                <strong id="resAnnualTax">Rs 0</strong>
                <span class="small-label">Estimated Annual Tax</span>
              </div>
              <div>
                <strong id="resMonthlyTax">Rs 0</strong>
                <span class="small-label">Estimated Monthly Tax</span>
              </div>
            </div>
            <div class="result-row"><span>Effective Tax Rate</span><strong id="resEffRate">0%</strong></div>
            <div class="result-row"><span>Estimated Monthly Take-Home</span><strong id="resTakeHome">Rs 0</strong></div>
          </div>
        </div>

        <div class="calc-below">
          <a href="{{ route('services.personal') }}" class="calc-link">Ready to File? Talk to a Consultant <i
              class="fa fa-arrow-right" aria-hidden="true"></i></a>
        </div>
        <p class="calc-disclaimer">This calculator provides an estimate only. Actual tax liability may vary based on
          specific deductions, credits, and FBR rules. Consult FINANIC for precise calculations.</p>
      </div>
    </section>

    <!-- Tax Slabs Table -->
    <section class="section-white" aria-labelledby="slabs-title">
      <div class="container">
        <div class="section-header-center">
          <span class="eyebrow">Reference</span>
          <h2 id="slabs-title" class="section-heading">FBR Salary Tax Slabs</h2>
          <p class="section-intro">The current income tax slabs used to calculate your estimated tax liability.</p>
        </div>

        <div class="slabs-wrap">
          <table class="slabs-table">
            <thead>
              <tr>
                <th>Income Range</th>
                <th>Tax Rate</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Up to Rs 600,000</td>
                <td>0% (Tax Exempt)</td>
              </tr>
              <tr>
                <td>Rs 600,001 &ndash; Rs 1,200,000</td>
                <td>5% of amount exceeding Rs 600,000</td>
              </tr>
              <tr>
                <td>Rs 1,200,001 &ndash; Rs 2,200,000</td>
                <td>Rs 30,000 + 15% of amount exceeding Rs 1,200,000</td>
              </tr>
              <tr>
                <td>Rs 2,200,001 &ndash; Rs 3,200,000</td>
                <td>Rs 180,000 + 25% of amount exceeding Rs 2,200,000</td>
              </tr>
              <tr>
                <td>Rs 3,200,001 &ndash; Rs 4,100,000</td>
                <td>Rs 430,000 + 30% of amount exceeding Rs 3,200,000</td>
              </tr>
              <tr>
                <td>Above Rs 4,100,000</td>
                <td>Rs 700,000 + 35% of amount exceeding Rs 4,100,000</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>

    <!-- FAQ -->
    <section class="section-light" aria-labelledby="faq-title">
      <div class="container">
        <div class="section-header-center">
          <span class="eyebrow">Got Questions?</span>
          <h2 id="faq-title" class="section-heading">Frequently Asked Questions</h2>
        </div>

        <dl class="faq-list" id="faqList">
          <div class="faq-item active">
            <dt>
              <button class="faq-question" type="button" aria-expanded="true" aria-controls="faq1">
                Are these tax slabs applicable to government employees?
                <i class="fa fa-angle-down" aria-hidden="true"></i>
              </button>
            </dt>
            <dd id="faq1" class="faq-answer" role="definition">
              <p>Yes. The same tax slabs generally apply to both government and private sector salaried employees in
                Pakistan. However, certain allowances (medical, house rent) have different exemption limits for
                government employees. Our calculator accounts for these differences.</p>
            </dd>
          </div>

          <div class="faq-item">
            <dt>
              <button class="faq-question" type="button" aria-expanded="false" aria-controls="faq2">
                How is this different from the tax deducted by my employer?
                <i class="fa fa-angle-down" aria-hidden="true"></i>
              </button>
            </dt>
            <dd id="faq2" class="faq-answer" role="definition">
              <p>Your employer withholds tax monthly based on your declared salary, but this calculator gives you an
                independent estimate using the official FBR slabs &mdash; useful for double-checking your payslip deductions
                or planning ahead.</p>
            </dd>
          </div>

          <div class="faq-item">
            <dt>
              <button class="faq-question" type="button" aria-expanded="false" aria-controls="faq3">
                Why should I still file a return if my employer deducts tax?
                <i class="fa fa-angle-down" aria-hidden="true"></i>
              </button>
            </dt>
            <dd id="faq3" class="faq-answer" role="definition">
              <p>Filing a return is a separate legal requirement from tax deduction. It keeps you on the Active
                Taxpayers List, which lowers withholding tax on banking, property, and vehicle transactions, and lets
                you claim any refund you're owed.</p>
            </dd>
          </div>
        </dl>
      </div>
    </section>

    <!-- CTA Banner -->
    <aside class="cta-banner" aria-labelledby="cta-title">
      <div class="container">
        <div class="cta-content">
          <h2 id="cta-title">Ready to File Your Income Tax Return?</h2>
          <p>Talk to a FINANIC consultant about your income tax filing and withholding position.</p>
          <div class="cta-btn-row">
            <a href="{{ route('services.personal') }}" class="btn-cta-primary">Start Filing Now <i class="fa fa-arrow-right"
                aria-hidden="true"></i></a>
            <a href="{{ route('contact') }}" class="btn-cta-secondary"><i class="fa fa-comments-o" aria-hidden="true"></i> Talk to
              a Consultant</a>
          </div>
        </div>
      </div>
    </aside>
  
    </div>
@endsection






