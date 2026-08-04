@extends('layouts.dashboard')

@section('title', 'Payments - Tax Consultant')

@section('content')
    @php
        $pendingPayments = collect($payments)->where('status', 'pending')->values();
        $paidPayments = collect($payments)->where('status', 'paid')->values();
    @endphp

    <x-dashboard.page-header title="Payments" subtitle="Manage pending fees and review your payment history." :breadcrumb="[['label' => 'Dashboard', 'url' => route('dashboard.index')], ['label' => 'Payments']]" />

    <div class="pfd-grid pfd-grid-3" style="margin-bottom: var(--pfd-gap);">
        <x-dashboard.stat-card icon="pe-7s-wallet" label="Pending Amount (Rs)" :value="$stats['pending_payments_total']" variant="gold" />
        <x-dashboard.stat-card icon="pe-7s-note2" label="Pending Payments" :value="$stats['pending_payments_count']" variant="danger" />
        <x-dashboard.stat-card icon="pe-7s-check" label="Payments Completed" :value="collect($payments)->where('status', 'paid')->count()" variant="green" />
    </div>

    <div class="pfd-card pfd-reveal" style="margin-bottom: var(--pfd-gap);">
        <div class="pfd-card-header">
            <div>
                <h2>Pending Payments</h2>
                <p>Settle these to keep your filings moving.</p>
            </div>
        </div>
        <div class="pfd-card-body">
            @if ($pendingPayments->count())
                <div style="display:flex; flex-direction:column; gap:12px;">
                    @foreach ($pendingPayments as $payment)
                        <div class="pfd-app-card">
                            <span class="pfd-app-card-icon"><i class="pe-7s-wallet" aria-hidden="true"></i></span>
                            <div class="pfd-app-card-body">
                                <h3>{{ $payment['title'] }}</h3>
                                <p>Due {{ \Carbon\Carbon::parse($payment['due_date'])->format('d M Y') }}</p>
                            </div>
                            <div class="pfd-app-card-meta">
                                <strong style="font-size:16px;">Rs {{ number_format($payment['amount']) }}</strong>
                                <form action="{{ route('dashboard.payments.pay', $payment['id']) }}" method="post" data-confirm="Simulate payment of Rs {{ number_format($payment['amount']) }} for {{ $payment['title'] }}?">
                                    @csrf
                                    <button class="pfd-btn pfd-btn-primary pfd-btn-sm" type="submit"><i class="fa fa-credit-card" aria-hidden="true"></i> Pay Now</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <x-dashboard.empty-state icon="pe-7s-check" title="Nothing pending" text="You have no outstanding payments." />
            @endif
        </div>
    </div>

    <div class="pfd-card pfd-reveal">
        <div class="pfd-card-header">
            <div>
                <h2>Payment History</h2>
                <p>All completed payments.</p>
            </div>
        </div>
        <div class="pfd-table-wrap">
            <table class="pfd-table">
                <thead><tr><th>Description</th><th>Amount</th><th>Paid On</th><th>Status</th></tr></thead>
                <tbody>
                    @forelse ($paidPayments as $payment)
                        <tr>
                            <td>{{ $payment['title'] }}</td>
                            <td>Rs {{ number_format($payment['amount']) }}</td>
                            <td>{{ \Carbon\Carbon::parse($payment['paid_at'])->format('d M Y') }}</td>
                            <td><x-dashboard.status-badge status="paid" /></td>
                        </tr>
                    @empty
                        <tr><td colspan="4">No payment history yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
