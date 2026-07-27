@extends('layouts.app')

@section('title', 'Business Tax Return | Tax Consultant')
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
                        <!-- <p class="breadcrumb">Home <span>></span> Services <span>></span> Business Tax Return</p> -->
                        <p class="eyebrow">Business Tax Return</p>
                        <h1>Business Tax Return Filing: Expert CA-Certified Compliance</h1>
                        <p class="hero-desc">Pakistan's tax compliance requirements for businesses are complex and constantly
                            evolving. Tax Consultant's CA-certified business tax return service ensures your company meets all FBR
                            obligations accurately and on time, every year.</p>
                        <div class="hero-actions">
                            <a href="{{ route('contact') }}" class="btn btn-white">File My Business Return <span class="arrow">-></span></a>
                            <a href="#pricing" class="btn btn-outline">View Business Pricing</a>
                        </div>
                        <div class="hero-badges">
                            <span class="badge">From Rs 3,000</span>
                            <span class="badge">2-5 Working Days</span>
                            <span class="badge">CA Certified</span>
                            <span class="badge">All Entity Types</span>
                        </div>
                    </div>
                </section>
        
                <!-- ===================== PLATFORM DEMO ===================== -->
                <section class="platform">
                    <div class="container">
                        <h2 class="section-title">See How It Works on Our Platform</h2>
                        <p class="section-subtitle">Choose between guided online filing or simple document upload. Both methods
                            are CA-reviewed for accuracy.</p>
        
                        <div class="platform-grid">
                            <!-- Column 1: Online Filing Method -->
                            <div class="platform-column">
                                <h3 class="platform-column-title">Online Filing Method</h3>
                                <div class="dashboard-mock">
                                    <div class="dashboard-titlebar">
                                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span
                                            class="dot dot-green"></span>
                                        <span class="dashboard-title">Tax Consultant Dashboard</span>
                                    </div>
                                    <div class="dashboard-body">
                                        <h3>Business Tax Filing</h3>
                                        <p class="dashboard-sub">Select and file the appropriate tax services for your business
                                        </p>
        
                                        <div class="steps-track">
                                            <span class="step done"><span class="step-num">✓</span>Tax Year</span>
                                            <span class="step-sep">-</span>
                                            <span class="step done"><span class="step-num">✓</span>Filing Method</span>
                                            <span class="step-sep">-</span>
                                            <span class="step"><span class="step-num">3</span>Legal Structure</span>
                                            <span class="step-sep">-</span>
                                            <span class="step"><span class="step-num">4</span>Business Type</span>
                                            <span class="step-sep">-</span>
                                            <span class="step"><span class="step-num">5</span>Business Info</span>
                                            <span class="step-sep">-</span>
                                            <span class="step"><span class="step-num">6</span>Withholding Status</span>
                                            <span class="step-sep">-</span>
                                            <span class="step"><span class="step-num">7</span>Financial Details</span>
                                            <span class="step-sep">-</span>
                                            <span class="step"><span class="step-num">8</span>Summary</span>
                                            <span class="step-sep">-</span>
                                            <span class="step"><span class="step-num">9</span>Optional Add-on</span>
                                        </div>
        
                                        <div class="method-card-wrap">
                                            <div class="method-inner">
                                                <h4>Choose Filing Method</h4>
                                                <p>Select how you would like to file your business tax return</p>
        
                                                <div class="method-grid">
                                                    <div class="method-option selected">
                                                        <span class="check-badge">✓</span>
                                                        <div class="method-icon">
                                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                                                                <line x1="8" y1="21" x2="16" y2="21"></line>
                                                                <line x1="12" y1="17" x2="12" y2="21"></line>
                                                            </svg>
                                                        </div>
                                                        <h5>Online Filing</h5>
                                                        <p class="desc">Enter your business financial details manually through
                                                            our guided form.</p>
                                                        <ul>
                                                            <li>Guided step-by-step process</li>
                                                            <li>Built-in validation and checks</li>
                                                            <li>Automatic calculations</li>
                                                            <li>Real-time progress tracking</li>
                                                        </ul>
                                                        <div class="select-bar">✓ Selected</div>
                                                    </div>
        
                                                    <div class="method-option">
                                                        <div class="method-icon">
                                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                                <polyline points="17 8 12 3 7 8"></polyline>
                                                                <line x1="12" y1="3" x2="12" y2="15"></line>
                                                            </svg>
                                                        </div>
                                                        <h5>Upload Documents</h5>
                                                        <p class="desc">Upload financial statements, receipts, and other tax
                                                            documents.</p>
                                                        <ul>
                                                            <li>Quick and simple process</li>
                                                            <li>Upload all documents at once</li>
                                                            <li>Expert review by our team</li>
                                                            <li>Less form filling required</li>
                                                        </ul>
                                                        <div class="select-bar">Select</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Column 2: Document Upload Method -->
                            <div class="platform-column">
                                <h3 class="platform-column-title">Document Upload Method</h3>
                                <div class="dashboard-mock">
                                    <div class="dashboard-titlebar">
                                        <span class="dot dot-red"></span><span class="dot dot-yellow"></span><span
                                            class="dot dot-green"></span>
                                        <span class="dashboard-title">Tax Consultant Dashboard</span>
                                    </div>
                                    <div class="dashboard-body">
                                        <h3>Business Tax Filing</h3>
                                        <p class="dashboard-sub">Select and file the appropriate tax services for your business
                                        </p>
        
                                        <div class="steps-track">
                                            <span class="step done"><span class="step-num">✓</span>Tax Year</span>
                                            <span class="step-sep">-</span>
                                            <span class="step done"><span class="step-num">✓</span>Filing Method</span>
                                            <span class="step-sep">-</span>
                                            <span class="step"><span class="step-num">3</span>Legal Structure</span>
                                            <span class="step-sep">-</span>
                                            <span class="step"><span class="step-num">4</span>Annual Revenue</span>
                                            <span class="step-sep">-</span>
                                            <span class="step"><span class="step-num">5</span>Document Upload</span>
                                            <span class="step-sep">-</span>
                                            <span class="step"><span class="step-num">6</span>Optional Add-on</span>
                                        </div>
        
                                        <div class="method-card-wrap">
                                            <div class="method-inner">
                                                <h4>Choose Filing Method</h4>
                                                <p>Select how you would like to file your business tax return</p>
        
                                                <div class="method-grid">
                                                    <div class="method-option">
                                                        <div class="method-icon">
                                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                                                                <line x1="8" y1="21" x2="16" y2="21"></line>
                                                                <line x1="12" y1="17" x2="12" y2="21"></line>
                                                            </svg>
                                                        </div>
                                                        <h5>Online Filing</h5>
                                                        <p class="desc">Enter your business financial details manually through
                                                            our guided form.</p>
                                                        <ul>
                                                            <li>Guided step-by-step process</li>
                                                            <li>Built-in validation and checks</li>
                                                            <li>Automatic calculations</li>
                                                            <li>Real-time progress tracking</li>
                                                        </ul>
                                                        <div class="select-bar">Select</div>
                                                    </div>
        
                                                    <div class="method-option selected">
                                                        <span class="check-badge">✓</span>
                                                        <div class="method-icon">
                                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                                <polyline points="17 8 12 3 7 8"></polyline>
                                                                <line x1="12" y1="3" x2="12" y2="15"></line>
                                                            </svg>
                                                        </div>
                                                        <h5>Upload Documents</h5>
                                                        <p class="desc">Upload financial statements, receipts, and other tax
                                                            documents.</p>
                                                        <ul>
                                                            <li>Quick and simple process</li>
                                                            <li>Upload all documents at once</li>
                                                            <li>Expert review by our team</li>
                                                            <li>Less form filling required</li>
                                                        </ul>
                                                        <div class="select-bar">✓ Selected</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
        
                <!-- ===================== ENTITIES ===================== -->
                <section class="entities">
                    <div class="container">
                        <h2 class="section-title">Which Business Entities Do We Serve?</h2>
                        <div class="entity-grid">
                            <div class="entity-card">
                                <div class="entity-icon">Briefcase</div>
                                <h3>Sole Proprietor</h3>
                                <p>Individual business owners operating under their own name or a trade name. Includes
                                    shopkeepers, traders, consultants, freelancers, and independent professionals.</p>
                            </div>
                            <div class="entity-card">
                                <div class="entity-icon">Team</div>
                                <h3>Partnership / AOP</h3>
                                <p>Partnership firms and Associations of Persons (AOPs) operating under a partnership deed.
                                    Includes law firms, medical practices, and family businesses.</p>
                            </div>
                            <div class="entity-card">
                                <div class="entity-icon">Company</div>
                                <h3>Private Limited Company</h3>
                                <p>Companies incorporated under SECP, including Pvt Ltd companies, SMCs (Single Member
                                    Companies), and holding companies with regulatory compliance obligations.</p>
                            </div>
                            <div class="entity-card">
                                <div class="entity-icon">NPO</div>
                                <h3>Non-Profit Organization (NPO)</h3>
                                <p>Trusts, foundations, welfare organisations, and charities registered under relevant laws with
                                    specific FBR compliance and exemption management requirements.</p>
                            </div>
                        </div>
                    </div>
                </section>
        
                <!-- ===================== WHAT'S INCLUDED ===================== -->
                <section class="included">
                    <div class="container">
                        <h2 class="section-title">What's Included in Business Tax Return Filing</h2>
                        <ul class="check-list ">
                            <li><span class="check-icon">✓</span> Preparation and filing of annual business income tax return on
                                FBR IRIS</li>
                            <li><span class="check-icon">✓</span> Calculation of taxable business income after allowable
                                deductions and expenses</li>
                            <li><span class="check-icon">✓</span> Depreciation calculation on fixed assets as per FBR rules</li>
                            <li><span class="check-icon">✓</span> Advance tax and withholding tax reconciliation</li>
                            <li><span class="check-icon">✓</span> Sales tax and withholding statement reconciliation (where
                                applicable)</li>
                            <li><span class="check-icon">✓</span> Minimum tax and alternative corporate tax calculations</li>
                            <li><span class="check-icon">✓</span> Wealth statement reconciliation for individual business owners
                            </li>
                            <li><span class="check-icon">✓</span> FBR acknowledgment receipt upon successful filing</li>
                        </ul>
                    </div>
                </section>
        
                <!-- ===================== PRICING ===================== -->
                <section class="pricing" id="pricing">
                    <div class="container">
                        <h2 class="section-title">Business Tax Return Pricing</h2>
        
                        <div class="pricing-grid">
                            <div class="price-box price-box-featured">
                                <span class="popular-tag">POPULAR</span>
                                <h3>Online Filing</h3>
                                <ul>
                                    <li><span>Individual / Sole Proprietor</span><strong>Rs 3,000</strong></li>
                                    <li><span>Partnership / AOP</span><strong>Rs 4,500</strong></li>
                                    <li><span>Private Limited Company</span><strong>Rs 6,000</strong></li>
                                    <li><span>Non-Profit Organization</span><strong>Rs 9,000</strong></li>
                                </ul>
                            </div>
        
                            <div class="price-box">
                                <h3>CA Review Add-on</h3>
                                <ul>
                                    <li><span>Individual / Sole Proprietor</span><strong>+ Rs 2,000</strong></li>
                                    <li><span>Partnership / AOP</span><strong>+ Rs 3,000</strong></li>
                                    <li><span>Private Limited Company</span><strong>+ Rs 4,000</strong></li>
                                    <li><span>Non-Profit Organization</span><strong>+ Rs 4,000</strong></li>
                                </ul>
                            </div>
        
                            <div class="price-box">
                                <h3>Document Upload</h3>
                                <ul>
                                    <li><span>Individual / Sole Proprietor</span><strong>Rs 5,000</strong></li>
                                    <li><span>Partnership / AOP</span><strong>Rs 7,500</strong></li>
                                    <li><span>Private Limited Company</span><strong>Rs 10,000</strong></li>
                                    <li><span>Non-Profit Organization</span><strong>Rs 13,000</strong></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
        
                <!-- ===================== REQUIRED DOCUMENTS ===================== -->
                <section class="documents">
                    <div class="container">
                        <h2 class="section-title">Required Documents for Business Tax Return</h2>
                        <ul class="check-list">
                            <li><span class="check-icon">✓</span> Business NTN and STRN (if GST registered)</li>
                            <li><span class="check-icon">✓</span> Financial statements: Balance Sheet and Profit &amp; Loss for
                                the tax year</li>
                            <li><span class="check-icon">✓</span> Bank statements for all business accounts</li>
                            <li><span class="check-icon">✓</span> Sales and purchase register / ledger</li>
                            <li><span class="check-icon">✓</span> Fixed asset schedule with acquisition dates and costs</li>
                            <li><span class="check-icon">✓</span> Withholding tax deduction details (received and deducted)</li>
                            <li><span class="check-icon">✓</span> Utility bills and major expense receipts</li>
                            <li><span class="check-icon">✓</span> Loan agreements and interest schedules (if applicable)</li>
                            <li><span class="check-icon">✓</span> SECP annual return (for Private Limited Companies)</li>
                            <li><span class="check-icon">✓</span> Partnership deed (for partnerships/AOPs)</li>
                        </ul>
                    </div>
                </section>
        
                <!-- ===================== FAQ ===================== -->
                <section class="faq" id="faq">
                    <div class="container">
                        <h2 class="section-title">Frequently Asked Questions</h2>
                        <div class="faq-list">
                            <div class="faq-item open">
                                <button class="faq-question">
                                    What is the tax return deadline for a Private Limited Company in Pakistan?
                                    <span class="faq-toggle">-</span>
                                </button>
                                <div class="faq-answer">
                                    <p>For companies with a tax year ending June 30, the filing deadline is typically December
                                        31. For companies with different accounting year ends, the deadline is 6 months after
                                        the year end. We monitor all deadlines and alert our clients in advance.</p>
                                </div>
                            </div>
                            <div class="faq-item">
                                <button class="faq-question">
                                    What happens if my business doesn't file a return?
                                    <span class="faq-toggle">+</span>
                                </button>
                                <div class="faq-answer">
                                    <p>Late or non-filing can result in penalties, default surcharge, and loss of Active
                                        Taxpayer status, which increases withholding tax rates on your business transactions.
                                        FBR may also issue notices requiring explanation or initiate audit proceedings.</p>
                                </div>
                            </div>
                            <div class="faq-item">
                                <button class="faq-question">
                                    Do you handle businesses that have been inactive?
                                    <span class="faq-toggle">+</span>
                                </button>
                                <div class="faq-answer">
                                    <p>Yes, we can file nil or dormant company returns to keep your business compliant with FBR
                                        and SECP requirements, even if there was no business activity during the tax year.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
        
                <!-- ===================== CTA ===================== -->
                <section class="cta">
                    <div class="container">
                        <h2>Ready to Become a Tax Filer Today?</h2>
                        <p>Join thousands of Pakistanis who file their taxes online, quickly, securely, and affordably.</p>
                        <div class="cta-actions">
                            <a href="{{ route('contact') }}" class="btn btn-white">Start Filing Now <span class="arrow">-></span></a>
                            <a href="{{ route('contact') }}" class="btn btn-outline-light"> Talk to an Expert</a>
                        </div>
                    </div>
                </section>
        
        
            <!-- ===================== FOOTER ===================== -->
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/family-tax/business-tax.js') }}" defer></script>
@endpush
