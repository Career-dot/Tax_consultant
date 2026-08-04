@extends('layouts.dashboard')

@section('title', 'Dashboard - Tax Consultant')

@section('content')
    @php
        $user = auth()->user();
        $latestApplication = $applications[0] ?? null;

        $quickActions = [
            ['icon' => 'pe-7s-user', 'title' => 'Start Personal Tax Filing', 'text' => 'File your annual income tax return.', 'url' => route('dashboard.filing.create', 'personal-tax')],
            ['icon' => 'pe-7s-briefcase', 'title' => 'Business Registration', 'text' => 'Register your business with FBR.', 'url' => route('dashboard.filing.create', 'business-registration')],
            ['icon' => 'pe-7s-id', 'title' => 'Apply for NTN', 'text' => 'Get your National Tax Number.', 'url' => route('dashboard.filing.create', 'ntn')],
            ['icon' => 'pe-7s-cash', 'title' => 'Sales Tax Registration', 'text' => 'Register for GST / sales tax.', 'url' => route('dashboard.filing.create', 'sales-tax')],
            ['icon' => 'pe-7s-cloud-upload', 'title' => 'Upload Documents', 'text' => 'Add files to your document center.', 'url' => route('dashboard.documents')],
            ['icon' => 'pe-7s-note2', 'title' => 'View Applications', 'text' => 'Track the status of your filings.', 'url' => route('dashboard.applications')],
            ['icon' => 'pe-7s-wallet', 'title' => 'Download Invoice', 'text' => 'Get a copy of your invoices.', 'url' => route('dashboard.invoices')],
            ['icon' => 'pe-7s-help2', 'title' => 'Contact Support', 'text' => 'Open a ticket with our team.', 'url' => route('dashboard.support')],
        ];

        $pendingDocuments = collect($documents)->where('status', 'pending')->values();
        $upcomingTasks = collect();

        foreach ($pendingDocuments as $doc) {
            $upcomingTasks->push(['icon' => 'pe-7s-cloud-upload', 'text' => 'Review upload: '.$doc['name']]);
        }

        foreach (collect($payments)->where('status', 'pending') as $payment) {
            $upcomingTasks->push(['icon' => 'pe-7s-wallet', 'text' => 'Pay '.$payment['title'].' — due '.\Carbon\Carbon::parse($payment['due_date'])->format('d M')]);
        }

        $openTickets = collect($tickets)->whereNotIn('status', ['closed'])->count();
    @endphp

    <x-dashboard.page-header title="Welcome back, {{ explode(' ', $user->name)[0] }}" subtitle="Here's what's happening with your tax filings today." />

    <div class="pfd-welcome pfd-reveal" style="margin-bottom: var(--pfd-gap); display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:20px;">
        <div>
            <h1>Hello, {{ $user->name }} 👋</h1>
            <p>You have {{ $stats['active_applications'] }} active application(s), {{ $stats['pending_documents'] }} document(s) pending review, and {{ $stats['open_tickets'] }} open support ticket(s).</p>
        </div>
        <div style="display:flex; align-items:center; gap:16px;">
            <div class="pfd-ring" data-ring="{{ $stats['profile_completion'] }}" style="background: conic-gradient(#fff calc(var(--pfd-ring-value) * 1%), rgba(255,255,255,.3) 0);">
                <span style="background:transparent; color:#fff;">{{ $stats['profile_completion'] }}%</span>
            </div>
            <div>
                <strong style="display:block; color:#fff; font-size:14px;">Profile completion</strong>
                @if ($stats['profile_completion'] < 100)
                    <a href="{{ route('dashboard.profile') }}" style="color:#fff; font-size:12.5px; font-weight:700; text-decoration:underline;">Complete your profile</a>
                @else
                    <span style="color:rgba(255,255,255,.85); font-size:12.5px;">All set — nice work!</span>
                @endif
            </div>
        </div>
    </div>

    <div class="pfd-grid pfd-grid-4" style="margin-bottom: var(--pfd-gap);">
        <x-dashboard.stat-card icon="pe-7s-note2" label="Active Applications" :value="$stats['active_applications']" variant="green" />
        <x-dashboard.stat-card icon="pe-7s-file" label="Documents Pending" :value="$stats['pending_documents']" variant="blue" />
        <x-dashboard.stat-card icon="pe-7s-wallet" label="Pending Payments (Rs)" :value="$stats['pending_payments_total']" variant="gold" />
        <x-dashboard.stat-card icon="pe-7s-ticket" label="Open Support Tickets" :value="$stats['open_tickets']" variant="danger" />
    </div>

    <div class="pfd-card pfd-reveal" style="margin-bottom: var(--pfd-gap);">
        <div class="pfd-card-header">
            <div>
                <h2>Quick Actions</h2>
                <p>Jump straight into the most common tasks.</p>
            </div>
        </div>
        <div class="pfd-card-body">
            <div class="pfd-grid pfd-grid-4">
                @foreach ($quickActions as $action)
                    <a class="pfd-quick-action" href="{{ $action['url'] }}">
                        <span class="pfd-quick-action-icon"><i class="{{ $action['icon'] }}" aria-hidden="true"></i></span>
                        <h3>{{ $action['title'] }}</h3>
                        <p>{{ $action['text'] }}</p>
                        <span class="pfd-quick-action-arrow">Get started <i class="fa fa-arrow-right" aria-hidden="true"></i></span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="pfd-grid pfd-grid-2" style="margin-bottom: var(--pfd-gap); align-items:start;">
        <div class="pfd-card pfd-reveal">
            <div class="pfd-card-header">
                <div>
                    <h2>Application Status</h2>
                    <p>@if($latestApplication) {{ $latestApplication['title'] }} — {{ $latestApplication['reference'] }} @else No applications yet @endif</p>
                </div>
                @if ($latestApplication)
                    <a class="pfd-card-link" href="{{ route('dashboard.applications.show', $latestApplication['id']) }}">View details <i class="fa fa-angle-right"></i></a>
                @endif
            </div>
            <div class="pfd-card-body">
                @if ($latestApplication)
                    <ol class="pfd-timeline">
                        @foreach ($latestApplication['timeline'] as $step)
                            <li class="pfd-timeline-step is-{{ str_replace('_', '-', $step['state']) }}">
                                <span class="pfd-timeline-dot">
                                    @if ($step['state'] === 'done')
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    @else
                                        {{ $loop->iteration }}
                                    @endif
                                </span>
                                <span class="pfd-timeline-label">{{ $step['label'] }}</span>
                                @if ($step['date'])
                                    <span class="pfd-timeline-date">{{ $step['date'] }}</span>
                                @endif
                            </li>
                        @endforeach
                    </ol>
                    <div style="margin-top:26px;">
                        <div style="display:flex; justify-content:space-between; margin-bottom:8px; font-size:12.5px; font-weight:700; color:var(--pf-muted);">
                            <span>Filing progress</span>
                            <span>{{ \App\Support\Dashboard\DemoDataStore::stageProgress($latestApplication['status']) }}%</span>
                        </div>
                        <div class="pfd-progress"><div class="pfd-progress-bar" data-progress="{{ \App\Support\Dashboard\DemoDataStore::stageProgress($latestApplication['status']) }}" style="width:0"></div></div>
                    </div>
                @else
                    <x-dashboard.empty-state icon="pe-7s-note2" title="No applications yet" text="Start your first tax filing to see progress here." action-label="Start Filing" :action-url="route('dashboard.filing.create', 'personal-tax')" />
                @endif
            </div>
        </div>

        <div class="pfd-card pfd-reveal">
            <div class="pfd-card-header">
                <div>
                    <h2>Recent Activity</h2>
                    <p>Latest updates on your account.</p>
                </div>
                <a class="pfd-card-link" href="{{ route('dashboard.notifications') }}">View all <i class="fa fa-angle-right"></i></a>
            </div>
            <div class="pfd-card-body">
                @if (count($notifications))
                    <ul class="pfd-feed">
                        @foreach ($notifications as $notification)
                            <li class="pfd-feed-item">
                                <span class="pfd-feed-icon"><i class="fa fa-bell" aria-hidden="true"></i></span>
                                <div class="pfd-feed-body">
                                    <p>{{ $notification['title'] }}</p>
                                    <span>{{ $notification['message'] }} · {{ \Carbon\Carbon::parse($notification['created_at'])->diffForHumans() }}</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <x-dashboard.empty-state icon="pe-7s-bell" title="No activity yet" text="Updates about your filings will show up here." />
                @endif
            </div>
        </div>
    </div>

    <div class="pfd-grid pfd-grid-2" style="align-items:start;">
        <div class="pfd-card pfd-reveal">
            <div class="pfd-card-header">
                <div>
                    <h2>Pending Documents</h2>
                    <p>Documents awaiting your upload or our review.</p>
                </div>
                <a class="pfd-card-link" href="{{ route('dashboard.documents') }}">Document Center <i class="fa fa-angle-right"></i></a>
            </div>
            <div class="pfd-card-body">
                @if ($pendingDocuments->count())
                    <ul class="pfd-checklist">
                        @foreach ($pendingDocuments as $doc)
                            <li class="pfd-checklist-item"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $doc['name'] }}</li>
                        @endforeach
                    </ul>
                @else
                    <x-dashboard.empty-state icon="pe-7s-check" title="Nothing pending" text="All your documents are reviewed." />
                @endif
            </div>
        </div>

        <div class="pfd-card pfd-reveal">
            <div class="pfd-card-header">
                <div>
                    <h2>Recent Payments</h2>
                    <p>Your latest invoices and payments.</p>
                </div>
                <a class="pfd-card-link" href="{{ route('dashboard.payments') }}">View all <i class="fa fa-angle-right"></i></a>
            </div>
            <div class="pfd-table-wrap">
                <table class="pfd-table">
                    <thead><tr><th>Description</th><th>Amount</th><th>Status</th></tr></thead>
                    <tbody>
                        @forelse ($payments as $payment)
                            <tr>
                                <td>{{ $payment['title'] }}</td>
                                <td>Rs {{ number_format($payment['amount']) }}</td>
                                <td><x-dashboard.status-badge :status="$payment['status']" /></td>
                            </tr>
                        @empty
                            <tr><td colspan="3">No payments yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="pfd-grid pfd-grid-2" style="margin-top: var(--pfd-gap);">
        <div class="pfd-card pfd-reveal">
            <div class="pfd-card-header">
                <div>
                    <h2>Upcoming Tasks</h2>
                    <p>Things that need your attention.</p>
                </div>
            </div>
            <div class="pfd-card-body">
                @if ($upcomingTasks->count())
                    <ul class="pfd-checklist">
                        @foreach ($upcomingTasks as $task)
                            <li class="pfd-checklist-item"><i class="{{ $task['icon'] }}" aria-hidden="true"></i> {{ $task['text'] }}</li>
                        @endforeach
                    </ul>
                @else
                    <x-dashboard.empty-state icon="pe-7s-check" title="You're all caught up" text="No pending tasks right now." />
                @endif
            </div>
        </div>

        <div class="pfd-card pfd-reveal">
            <div class="pfd-card-header">
                <div>
                    <h2>Support Status</h2>
                    <p>Your open conversations with our team.</p>
                </div>
                <a class="pfd-card-link" href="{{ route('dashboard.support') }}">Support Center <i class="fa fa-angle-right"></i></a>
            </div>
            <div class="pfd-card-body">
                <p style="margin:0 0 14px; font-size:14px;">You have <strong>{{ $openTickets }}</strong> open ticket(s).</p>
                @foreach (array_slice($tickets, 0, 2) as $ticket)
                    <div class="pfd-app-card" style="margin-bottom:10px; padding:14px 16px;">
                        <span class="pfd-app-card-icon"><i class="pe-7s-ticket" aria-hidden="true"></i></span>
                        <div class="pfd-app-card-body">
                            <h3 style="font-size:13.5px;">{{ $ticket['subject'] }}</h3>
                            <p>{{ $ticket['reference'] }}</p>
                        </div>
                        <x-dashboard.status-badge :status="$ticket['status']" />
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
