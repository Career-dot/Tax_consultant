@extends('layouts.dashboard')

@section('title', $invoice['number'].' - Tax Consultant')

@section('content')
    <x-dashboard.page-header :title="$invoice['number']" subtitle="Invoice details and printable summary." :breadcrumb="[['label' => 'Dashboard', 'url' => route('dashboard.index')], ['label' => 'Invoices', 'url' => route('dashboard.invoices')], ['label' => $invoice['number']]]">
        <x-slot:actions>
            <button class="pfd-btn pfd-btn-outline" type="button" onclick="window.print()"><i class="fa fa-print" aria-hidden="true"></i> Print / Download</button>
        </x-slot:actions>
    </x-dashboard.page-header>

    <div class="pfd-card pfd-invoice pfd-reveal" style="max-width:820px;">
        <div class="pfd-invoice-head">
            <div>
                <img src="{{ asset('assets/images/logo/logo.jpeg') }}" alt="Tax Consultant">
                <p>Blue Area, Islamabad, Pakistan</p>
                <p>support@taxconsultant.com</p>
            </div>
            <div>
                <h2>INVOICE</h2>
                <p>{{ $invoice['number'] }}</p>
                <p>Issued {{ \Carbon\Carbon::parse($invoice['issued_at'])->format('d M Y') }}</p>
            </div>
        </div>

        <div class="pfd-invoice-parties">
            <div>
                <h4>Billed To</h4>
                <p>{{ $user->name }}<br>{{ $user->email }}@if($user->phone)<br>{{ $user->phone }}@endif@if($user->address)<br>{{ $user->address }}@endif</p>
            </div>
            <div>
                <h4>Status</h4>
                <p><x-dashboard.status-badge :status="$invoice['status']" /></p>
                @if ($invoice['paid_at'])
                    <p style="margin-top:6px;">Paid on {{ \Carbon\Carbon::parse($invoice['paid_at'])->format('d M Y') }}</p>
                @endif
            </div>
        </div>

        <div class="pfd-table-wrap">
            <table class="pfd-table">
                <thead><tr><th>Item</th><th style="text-align:right;">Amount</th></tr></thead>
                <tbody>
                    @foreach ($invoice['items'] as $item)
                        <tr><td>{{ $item['label'] }}</td><td style="text-align:right;">Rs {{ number_format($item['amount']) }}</td></tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="pfd-invoice-totals">
            <table>
                <tr><td>Subtotal</td><td>Rs {{ number_format($invoice['amount']) }}</td></tr>
                <tr><td>Total Due</td><td>Rs {{ number_format($invoice['amount']) }}</td></tr>
            </table>
        </div>
    </div>
@endsection
