@extends('layouts.dashboard')

@section('title', $meta['label'].' - Tax Consultant')

@section('content')
    <x-dashboard.page-header :title="$meta['label']" :subtitle="$meta['description']" :breadcrumb="[['label' => 'Dashboard', 'url' => route('dashboard.index')], ['label' => $meta['label']]]" />

    <div class="pfd-grid" style="align-items:start;">
        <div class="pfd-card pfd-reveal pfd-span-2">
            <div class="pfd-card-header">
                <span class="pfd-quick-action-icon"><i class="{{ $meta['icon'] }}" aria-hidden="true"></i></span>
                <div>
                    <h2>{{ $meta['label'] }} — Get Started</h2>
                    <p>Fill in a few details and our consultants will take it from here.</p>
                </div>
            </div>
            <div class="pfd-card-body">
                <form action="{{ route('dashboard.filing.store', $service) }}" method="post">
                    @csrf

                    <div class="pfd-grid pfd-grid-1">
                        <div class="pfd-field">
                            <label for="fullName">Full name</label>
                            <input id="fullName" name="full_name" type="text" value="{{ old('full_name', auth()->user()->name) }}" class="{{ $errors->has('full_name') ? 'is-invalid' : '' }}" required>
                            @error('full_name')<span class="pfd-error">{{ $message }}</span>@enderror
                        </div>
                        <div class="pfd-field">
                            <label for="filingCnic">CNIC</label>
                            <input id="filingCnic" name="cnic" type="text" value="{{ old('cnic', auth()->user()->cnic) }}" placeholder="xxxxx-xxxxxxx-x" class="{{ $errors->has('cnic') ? 'is-invalid' : '' }}" required>
                            @error('cnic')<span class="pfd-error">{{ $message }}</span>@enderror
                        </div>
                        <div class="pfd-field">
                            <label for="contactNumber">Contact number</label>
                            <input id="contactNumber" name="contact_number" type="tel" value="{{ old('contact_number', auth()->user()->phone) }}" class="{{ $errors->has('contact_number') ? 'is-invalid' : '' }}" required>
                            @error('contact_number')<span class="pfd-error">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="pfd-field">
                        <label for="filingNotes">Notes <span>(optional)</span></label>
                        <textarea id="filingNotes" name="notes" placeholder="Anything our consultants should know before they start?">{{ old('notes') }}</textarea>
                    </div>

                    <button class="pfd-btn pfd-btn-primary" type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i> Submit Application</button>
                </form>
            </div>
        </div>
    </div>
@endsection
