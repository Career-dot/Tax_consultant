@extends('layouts.app')

@section('title', $service->name . ' - FINANIC Business Consultants')

@section('content')
<section class="py-5" style="background: linear-gradient(135deg, #1a5276 0%, #2e86c1 100%); color: white;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-3">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color:#fff;">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('services.index') }}" style="color:#fff;">Services</a></li>
                <li class="breadcrumb-item active" style="color:#ccc;">{{ $service->name }}</li>
            </ol>
        </nav>
        <h1 class="display-5 fw-bold">{{ $service->name }}</h1>
        @if($service->short_description)
            <p class="lead">{{ $service->short_description }}</p>
        @endif
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @if($service->description)
                    <div class="mb-4">
                        <h3>About This Service</h3>
                        <p class="lead">{!! nl2br(e($service->description)) !!}</p>
                    </div>
                @endif

                <!-- Service Scope based on type -->
                @if($service->slug === 'income-tax')
                    <div class="mb-4">
                        <h3>What We Handle</h3>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded">
                                    <i class="fa fa-check-circle text-success me-3 mt-1"></i>
                                    <div>
                                        <strong>NTN Registration</strong>
                                        <p class="text-muted mb-0 small">New taxpayer registration for individuals, AOPs, companies</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded">
                                    <i class="fa fa-check-circle text-success me-3 mt-1"></i>
                                    <div>
                                        <strong>Annual Return Filing</strong>
                                        <p class="text-muted mb-0 small">Returns for salaried, business individuals, AOPs, companies</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded">
                                    <i class="fa fa-check-circle text-success me-3 mt-1"></i>
                                    <div>
                                        <strong>Wealth Statement</strong>
                                        <p class="text-muted mb-0 small">Preparation and filing alongside annual return</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded">
                                    <i class="fa fa-check-circle text-success me-3 mt-1"></i>
                                    <div>
                                        <strong>FBR Notice Response</strong>
                                        <p class="text-muted mb-0 small">Drafting replies to FBR notices and information requests</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded">
                                    <i class="fa fa-check-circle text-success me-3 mt-1"></i>
                                    <div>
                                        <strong>Tax Audit Representation</strong>
                                        <p class="text-muted mb-0 small">Representation during selection for audit and proceedings</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded">
                                    <i class="fa fa-check-circle text-success me-3 mt-1"></i>
                                    <div>
                                        <strong>Refund Applications</strong>
                                        <p class="text-muted mb-0 small">Filing and follow-up of income tax refund claims</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded">
                                    <i class="fa fa-check-circle text-success me-3 mt-1"></i>
                                    <div>
                                        <strong>Exemption Certificates</strong>
                                        <p class="text-muted mb-0 small">Applications for withholding tax exemption certificates</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded">
                                    <i class="fa fa-check-circle text-success me-3 mt-1"></i>
                                    <div>
                                        <strong>ATL Support</strong>
                                        <p class="text-muted mb-0 small">Inclusion in, and restoration to, the Active Taxpayer List</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif($service->slug === 'sales-tax')
                    <div class="mb-4">
                        <h3>What We Handle</h3>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded">
                                    <i class="fa fa-check-circle text-success me-3 mt-1"></i>
                                    <div>
                                        <strong>STRN Registration</strong>
                                        <p class="text-muted mb-0 small">New registration for manufacturers, importers, distributors</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded">
                                    <i class="fa fa-check-circle text-success me-3 mt-1"></i>
                                    <div>
                                        <strong>Monthly Return Filing</strong>
                                        <p class="text-muted mb-0 small">Preparation and filing of monthly returns</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded">
                                    <i class="fa fa-check-circle text-success me-3 mt-1"></i>
                                    <div>
                                        <strong>Input/Output Reconciliation</strong>
                                        <p class="text-muted mb-0 small">Annexure-level reconciliation before filing</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded">
                                    <i class="fa fa-check-circle text-success me-3 mt-1"></i>
                                    <div>
                                        <strong>Audit Representation</strong>
                                        <p class="text-muted mb-0 small">Representation during sales tax audit proceedings</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded">
                                    <i class="fa fa-check-circle text-success me-3 mt-1"></i>
                                    <div>
                                        <strong>Refund Claims</strong>
                                        <p class="text-muted mb-0 small">Preparation and pursuit of refund claims</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded">
                                    <i class="fa fa-check-circle text-success me-3 mt-1"></i>
                                    <div>
                                        <strong>Digital Invoicing Advisory</strong>
                                        <p class="text-muted mb-0 small">Advisory on FBR e-invoicing compliance</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif($service->slug === 'withholding-tax')
                    <div class="mb-4">
                        <h3>(A) Withholding Compliance</h3>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded">
                                    <i class="fa fa-check-circle text-success me-3 mt-1"></i>
                                    <div>
                                        <strong>Salary Withholding</strong>
                                        <p class="text-muted mb-0 small">Correct computation and deduction on salary payments</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded">
                                    <i class="fa fa-check-circle text-success me-3 mt-1"></i>
                                    <div>
                                        <strong>Payments for Goods/Services</strong>
                                        <p class="text-muted mb-0 small">Withholding on payments to suppliers and contractors</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded">
                                    <i class="fa fa-check-circle text-success me-3 mt-1"></i>
                                    <div>
                                        <strong>Rent Withholding</strong>
                                        <p class="text-muted mb-0 small">Withholding on rental payments</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded">
                                    <i class="fa fa-check-circle text-success me-3 mt-1"></i>
                                    <div>
                                        <strong>Section 236G/236H</strong>
                                        <p class="text-muted mb-0 small">Advance tax on sales to distributors/retailers</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded">
                                    <i class="fa fa-check-circle text-success me-3 mt-1"></i>
                                    <div>
                                        <strong>Quarterly Statement Filing</strong>
                                        <p class="text-muted mb-0 small">Preparation and filing of statements with FBR</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3>(B) Withholding Defense & Recovery</h3>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded">
                                    <i class="fa fa-shield text-warning me-3 mt-1"></i>
                                    <div>
                                        <strong>Section 161 Replies</strong>
                                        <p class="text-muted mb-0 small">Drafting responses to default/failure notices</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded">
                                    <i class="fa fa-shield text-warning me-3 mt-1"></i>
                                    <div>
                                        <strong>Section 162 Recovery</strong>
                                        <p class="text-muted mb-0 small">Representation where recovery is sought</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded">
                                    <i class="fa fa-shield text-warning me-3 mt-1"></i>
                                    <div>
                                        <strong>Rate/Applicability Disputes</strong>
                                        <p class="text-muted mb-0 small">Challenging incorrect withholding tax rate application</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded">
                                    <i class="fa fa-shield text-warning me-3 mt-1"></i>
                                    <div>
                                        <strong>Exemption Certificate Support</strong>
                                        <p class="text-muted mb-0 small">Obtaining withholding exemption certificates</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif($service->slug === 'tax-litigation')
                    <div class="mb-4">
                        <h3>Full Representation Ladder</h3>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded">
                                    <i class="fa fa-gavel text-danger me-3 mt-1"></i>
                                    <div>
                                        <strong>Show-Cause Notice Response</strong>
                                        <p class="text-muted mb-0 small">Drafting and filing replies at assessing officer / DCIR stage</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded">
                                    <i class="fa fa-gavel text-danger me-3 mt-1"></i>
                                    <div>
                                        <strong>First Appeal - CIR(A)</strong>
                                        <p class="text-muted mb-0 small">Filing and arguing appeals to Commissioner Inland Revenue (Appeals)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded">
                                    <i class="fa fa-gavel text-danger me-3 mt-1"></i>
                                    <div>
                                        <strong>Second Appeal - ATIR</strong>
                                        <p class="text-muted mb-0 small">Appeals to Appellate Tribunal Inland Revenue</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded">
                                    <i class="fa fa-gavel text-danger me-3 mt-1"></i>
                                    <div>
                                        <strong>High Court Reference</strong>
                                        <p class="text-muted mb-0 small">Reference applications to Lahore High Court</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded">
                                    <i class="fa fa-gavel text-danger me-3 mt-1"></i>
                                    <div>
                                        <strong>Supreme Court CPLA</strong>
                                        <p class="text-muted mb-0 small">Civil Petition for Leave to Appeal</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded">
                                    <i class="fa fa-gavel text-danger me-3 mt-1"></i>
                                    <div>
                                        <strong>Stay Applications</strong>
                                        <p class="text-muted mb-0 small">Seeking stay of recovery pending appeal</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded">
                                    <i class="fa fa-gavel text-danger me-3 mt-1"></i>
                                    <div>
                                        <strong>Rectification Applications</strong>
                                        <p class="text-muted mb-0 small">Correcting apparent errors in orders</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded">
                                    <i class="fa fa-gavel text-danger me-3 mt-1"></i>
                                    <div>
                                        <strong>ADR Proceedings</strong>
                                        <p class="text-muted mb-0 small">Alternative Dispute Resolution representation</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif($service->slug === 'corporate-retainer')
                    <div class="mb-4">
                        <h3>Retainer Services Include</h3>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded">
                                    <i class="fa fa-check-circle text-success me-3 mt-1"></i>
                                    <div>
                                        <strong>Monthly Compliance</strong>
                                        <p class="text-muted mb-0 small">Income tax, sales tax, withholding tax across all entities</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded">
                                    <i class="fa fa-check-circle text-success me-3 mt-1"></i>
                                    <div>
                                        <strong>Representation up to CIR(A)</strong>
                                        <p class="text-muted mb-0 small">First appeal included; higher forums billed separately</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded">
                                    <i class="fa fa-check-circle text-success me-3 mt-1"></i>
                                    <div>
                                        <strong>Bookkeeping Supervision</strong>
                                        <p class="text-muted mb-0 small">Chart of accounts and entry review</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded">
                                    <i class="fa fa-check-circle text-success me-3 mt-1"></i>
                                    <div>
                                        <strong>Digital Invoicing Advisory</strong>
                                        <p class="text-muted mb-0 small">Supervisory review of e-invoicing compliance</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded">
                                    <i class="fa fa-check-circle text-success me-3 mt-1"></i>
                                    <div>
                                        <strong>Group Structuring</strong>
                                        <p class="text-muted mb-0 small">Multi-entity group structuring and advisory</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded">
                                    <i class="fa fa-check-circle text-success me-3 mt-1"></i>
                                    <div>
                                        <strong>Sector-Specific Advisory</strong>
                                        <p class="text-muted mb-0 small">Distribution agency characterization, dormant-sector activation</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Contact Card -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body text-center p-4">
                        <h5 class="card-title">Need This Service?</h5>
                        <p class="card-text text-muted">Get a free consultation with our tax experts.</p>
                        <a href="{{ route('contact') }}" class="btn btn-primary w-100 mb-2">
                            <i class="fa fa-envelope me-2"></i>Contact Us
                        </a>
                        <a href="https://wa.me/923001234567" target="_blank" class="btn btn-success w-100 mb-2">
                            <i class="fa fa-whatsapp me-2"></i>WhatsApp Us
                        </a>
                        <a href="tel:+923001234567" class="btn btn-outline-primary w-100">
                            <i class="fa fa-phone me-2"></i>Call Now
                        </a>
                    </div>
                </div>

                <!-- All Services -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h6 class="mb-0">All Services</h6>
                    </div>
                    <div class="list-group list-group-flush">
                        @foreach($relatedServices as $related)
                            <a href="{{ route('services.show', $related->slug) }}" class="list-group-item list-group-item-action d-flex align-items-center {{ $related->id === $service->id ? 'active' : '' }}">
                                <i class="fa {{ $related->icon ?? 'fa-briefcase' }} me-3 text-primary"></i>
                                {{ $related->name }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Planner CTA -->
                <div class="card border-0 shadow-sm mt-4" style="background: linear-gradient(135deg, #e74c3c, #c0392b); color: white;">
                    <div class="card-body text-center p-4">
                        <i class="fa fa-calendar-check-o fa-3x mb-3"></i>
                        <h5>Check Your Filing Deadlines</h5>
                        <p class="mb-3">Use our Tax Compliance Planner to see your personalized deadline calendar.</p>
                        <a href="{{ route('planner.index') }}" class="btn btn-light btn-lg w-100">Start Planner</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
