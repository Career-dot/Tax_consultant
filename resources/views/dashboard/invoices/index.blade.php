@extends('layouts.dashboard')

@section('title', 'Invoices - Tax Consultant')

@section('content')
    <x-dashboard.page-header title="Invoices" subtitle="Every invoice issued to your account." :breadcrumb="[['label' => 'Dashboard', 'url' => route('dashboard.index')], ['label' => 'Invoices']]" />

    <div class="pfd-card pfd-reveal">
        <div class="pfd-table-wrap">
            <table class="pfd-table">
                <thead><tr><th>Invoice #</th><th>Description</th><th>Amount</th><th>Issued</th><th>Status</th><th></th></tr></thead>
                <tbody>
                    @forelse ($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice['number'] }}</td>
                            <td>{{ $invoice['title'] }}</td>
                            <td>Rs {{ number_format($invoice['amount']) }}</td>
                            <td>{{ \Carbon\Carbon::parse($invoice['issued_at'])->format('d M Y') }}</td>
                            <td><x-dashboard.status-badge :status="$invoice['status']" /></td>
                            <td><a class="pfd-btn pfd-btn-outline pfd-btn-sm" href="{{ route('dashboard.invoices.show', $invoice['id']) }}"><i class="fa fa-eye" aria-hidden="true"></i> View</a></td>
                        </tr>
                    @empty
                        <tr><td colspan="6">No invoices yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
