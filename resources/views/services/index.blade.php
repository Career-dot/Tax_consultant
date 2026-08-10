@extends('layouts.app')

@section('title', 'Our Services')

@section('content')
<section class="py-5" style="background: linear-gradient(135deg, #1a5276 0%, #2e86c1 100%); color: white;">
    <div class="container text-center">
        <h1 class="display-5 fw-bold">Our Services</h1>
        <p class="lead">Comprehensive tax solutions for individuals, SMEs, and corporate groups</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            @foreach($services as $service)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm service-card">
                        <div class="card-body text-center p-4">
                            <div class="service-icon mb-3" style="width:80px;height:80px;border-radius:50%;background:linear-gradient(135deg,#1a5276,#2e86c1);display:flex;align-items:center;justify-content:center;margin:0 auto;">
                                <i class="fa {{ $service->icon ?? 'fa-briefcase' }}" style="font-size:32px;color:#fff;"></i>
                            </div>
                            <h4 class="card-title">{{ $service->name }}</h4>
                            <p class="card-text text-muted">{{ $service->short_description }}</p>
                            <a href="{{ route('services.show', $service->slug) }}" class="btn btn-outline-primary">Learn More <i class="fa fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5" style="background-color:#f8f9fa;">
    <div class="container text-center">
        <h2>Ready to Start?</h2>
        <p class="text-muted mb-4">Register an account to select your services and make payments.</p>
        <a href="{{ route('register') }}" class="btn btn-primary btn-lg me-3">Register Now</a>
        <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg">View Services Pricing</a>
    </div>
</section>
@endsection
