@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')

<!-- Stats Row 1 -->
<div class="pfd-grid pfd-grid-4" style="margin-bottom: 24px;">
    <div class="pfd-card pfd-admin-stat stagger-1">
        <div class="pfd-stat-icon">
            <i class="fas fa-envelope"></i>
        </div>
        <div>
            <p class="pfd-stat-value">{{ $stats['contacts'] }}</p>
            <p class="pfd-stat-label">Total Contacts</p>
            <span class="pfd-badge is-warning" style="margin-top: 8px;">
                <span></span> {{ $stats['pending_contacts'] }} pending
            </span>
        </div>
    </div>
    <div class="pfd-card pfd-admin-stat stagger-2">
        <div class="pfd-stat-icon is-blue">
            <i class="fas fa-users"></i>
        </div>
        <div>
            <p class="pfd-stat-value">{{ $stats['subscriptions'] }}</p>
            <p class="pfd-stat-label">Active Subscribers</p>
            <span class="pfd-badge is-success" style="margin-top: 8px;">
                <span></span> Planner users
            </span>
        </div>
    </div>
    <div class="pfd-card pfd-admin-stat stagger-3">
        <div class="pfd-stat-icon is-gold">
            <i class="fas fa-calendar-alt"></i>
        </div>
        <div>
            <p class="pfd-stat-value">{{ $stats['deadline_rules'] }}</p>
            <p class="pfd-stat-label">Deadline Rules</p>
            <span class="pfd-badge is-success" style="margin-top: 8px;">
                <span></span> Active rules
            </span>
        </div>
    </div>
    <div class="pfd-card pfd-admin-stat stagger-4">
        <div class="pfd-stat-icon is-danger">
            <i class="fas fa-paper-plane"></i>
        </div>
        <div>
            <p class="pfd-stat-value">{{ $stats['notifications_sent'] }}</p>
            <p class="pfd-stat-label">Notifications Sent</p>
            <span class="pfd-badge is-danger" style="margin-top: 8px;">
                <span></span> {{ $stats['notifications_failed'] }} failed
            </span>
        </div>
    </div>
</div>

<!-- Charts Section -->
<div class="pfd-grid pfd-grid-2" style="margin-bottom: 24px;">
    <div class="pfd-card">
        <div class="pfd-card-header">
            <div>
                <h3><i class="fas fa-chart-line" style="color: var(--pf-green);"></i> Contacts Over Time</h3>
                <p>Last 6 months</p>
            </div>
        </div>
        <div class="pfd-card-body">
            <div style="position: relative; height: 260px; width: 100%;">
                <canvas id="contactsChart"></canvas>
            </div>
        </div>
    </div>
    <div class="pfd-card">
        <div class="pfd-card-header">
            <div>
                <h3><i class="fas fa-chart-pie" style="color: var(--pf-blue);"></i> Notifications Status</h3>
            </div>
        </div>
        <div class="pfd-card-body">
            <div style="position: relative; height: 260px; width: 100%;">
                <canvas id="notificationsChart"></canvas>
            </div>
        </div>
    </div>
    <div class="pfd-card">
        <div class="pfd-card-header">
            <div>
                <h3><i class="fas fa-chart-bar" style="color: var(--pf-gold);"></i> Subscriber Growth</h3>
                <p>Last 6 months</p>
            </div>
        </div>
        <div class="pfd-card-body">
            <div style="position: relative; height: 260px; width: 100%;">
                <canvas id="subscribersChart"></canvas>
            </div>
        </div>
    </div>
    <div class="pfd-card">
        <div class="pfd-card-header">
            <div>
                <h3><i class="fas fa-chart-area" style="color: var(--pf-danger);"></i> Contact Status</h3>
            </div>
        </div>
        <div class="pfd-card-body">
            <div style="position: relative; height: 260px; width: 100%;">
                <canvas id="contactStatusChart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Stats Row 2 -->
<div class="pfd-grid pfd-grid-4" style="margin-bottom: 24px;">
    <div class="pfd-card pfd-admin-stat">
        <div class="pfd-stat-icon">
            <i class="fas fa-briefcase"></i>
        </div>
        <div>
            <p class="pfd-stat-value">{{ $stats['services'] }}</p>
            <p class="pfd-stat-label">Services</p>
        </div>
    </div>
    <div class="pfd-card pfd-admin-stat">
        <div class="pfd-stat-icon is-blue">
            <i class="fas fa-question-circle"></i>
        </div>
        <div>
            <p class="pfd-stat-value">{{ $stats['faqs'] }}</p>
            <p class="pfd-stat-label">FAQs</p>
        </div>
    </div>
    <div class="pfd-card pfd-admin-stat">
        <div class="pfd-stat-icon is-gold">
            <i class="fas fa-newspaper"></i>
        </div>
        <div>
            <p class="pfd-stat-value">{{ $stats['tax_updates'] }}</p>
            <p class="pfd-stat-label">Tax Updates</p>
        </div>
    </div>
    <div class="pfd-card pfd-admin-stat">
        <div class="pfd-stat-icon is-danger">
            <i class="fas fa-user-tie"></i>
        </div>
        <div>
            <p class="pfd-stat-value">{{ $stats['team_members'] }}</p>
            <p class="pfd-stat-label">Team Members</p>
        </div>
    </div>
</div>

<!-- Users Per Service -->
<div class="pfd-card" style="margin-bottom: 24px;">
    <div class="pfd-card-header">
        <div>
            <h3><i class="fas fa-chart-bar" style="color: var(--pf-green);"></i> Users Per Service</h3>
        </div>
        <a href="{{ route('admin.users.index') }}" class="pfd-card-link">Manage Users <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
    </div>
    <div class="pfd-card-body">
        @forelse($serviceStats as $service)
            <div class="pfd-grid" style="grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px;">
                <a href="{{ route('admin.users.index') }}?service={{ $service->id }}" class="pfd-quick-action" style="text-decoration: none; color: inherit;">
                    <div class="pfd-quick-action-icon">
                        <i class="fas {{ $service->icon }}"></i>
                    </div>
                    <div>
                        <p class="pfd-stat-value" style="font-size: 22px;">{{ $service->active_users_count }}</p>
                        <p class="pfd-stat-label">{{ $service->name }}</p>
                        <span style="font-size: 11px; color: var(--pf-green); font-weight: 700;">{{ $service->users_count }} total assigned</span>
                    </div>
                </a>
            </div>
        @empty
            <div class="pfd-empty">
                <div class="pfd-empty-icon"><i class="fas fa-chart-bar"></i></div>
                <h3>No services found</h3>
                <p>Create services first to see user statistics.</p>
            </div>
        @endforelse
    </div>
</div>

<!-- Tables Row -->
<div class="pfd-grid pfd-grid-2" style="margin-bottom: 24px;">
    <!-- Recent Contacts -->
    <div class="pfd-card">
        <div class="pfd-card-header">
            <div>
                <h3><i class="fas fa-envelope" style="color: var(--pf-green);"></i> Recent Contacts</h3>
            </div>
            <a href="{{ route('admin.contacts.index') }}" class="pfd-card-link">View All <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
        </div>
        @if($recentContacts->count())
            <div class="pfd-table-wrap">
                <table class="pfd-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentContacts as $contact)
                            <tr>
                                <td><a href="{{ route('admin.contacts.show', $contact->id) }}">{{ $contact->name }}</a></td>
                                <td>{{ $contact->email }}</td>
                                <td>
                                    <span class="pfd-badge {{ $contact->status === 'pending' ? 'is-warning' : ($contact->status === 'contacted' ? 'is-info' : 'is-success') }}">
                                        <span></span>
                                        {{ ucfirst($contact->status) }}
                                    </span>
                                </td>
                                <td>{{ $contact->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="pfd-empty">
                <div class="pfd-empty-icon"><i class="fas fa-envelope-open"></i></div>
                <h3>No contacts yet</h3>
                <p>Contact submissions will appear here.</p>
            </div>
        @endif
    </div>

    <!-- Deadline Rules -->
    <div class="pfd-card">
        <div class="pfd-card-header">
            <div>
                <h3><i class="fas fa-clock" style="color: var(--pf-gold);"></i> Deadline Rules</h3>
            </div>
            <a href="{{ route('admin.deadline-rules.index') }}" class="pfd-card-link">Manage Rules <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
        </div>
        @if($upcomingDeadlines->count())
            <div class="pfd-table-wrap">
                <table class="pfd-table">
                    <thead>
                        <tr>
                            <th>Rule</th>
                            <th>Type</th>
                            <th>Frequency</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($upcomingDeadlines as $dl)
                            <tr>
                                <td><strong>{{ $dl->name }}</strong></td>
                                <td>{{ str_replace('_', ' ', ucfirst($dl->deadline_type)) }}</td>
                                <td>{{ ucfirst($dl->frequency) }}</td>
                                <td>
                                    <span class="pfd-badge {{ $dl->is_active ? 'is-success' : 'is-muted' }}">
                                        <span></span>
                                        {{ $dl->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="pfd-empty">
                <div class="pfd-empty-icon"><i class="fas fa-calendar-check"></i></div>
                <h3>No upcoming deadlines</h3>
                <p>No deadlines in the next 30 days.</p>
            </div>
        @endif
    </div>
</div>

<!-- Broadcast Form -->
<div class="pfd-card" style="margin-bottom: 24px;">
    <div class="pfd-card-header">
        <div>
            <h3><i class="fas fa-paper-plane" style="color: var(--pf-green);"></i> Send Broadcast Message</h3>
        </div>
    </div>
    <div class="pfd-card-body">
        <form action="{{ route('admin.broadcast') }}" method="POST">
            @csrf
            <div class="row g-3 align-items-end">
                <div class="col-md-3">
                    <div class="pfd-field" style="margin-bottom: 0;">
                        <label>Subject</label>
                        <input type="text" name="subject" required placeholder="e.g., FBR Deadline Extension">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="pfd-field" style="margin-bottom: 0;">
                        <label>Message</label>
                        <textarea name="message" rows="2" required placeholder="Your message to subscribers..." style="min-height: 42px;"></textarea>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="pfd-field" style="margin-bottom: 0;">
                        <label>Channel</label>
                        <select name="channel">
                            <option value="email">Email</option>
                            <option value="sms">SMS</option>
                            <option value="both">Both</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="pfd-field" style="margin-bottom: 0;">
                        <label>Filter</label>
                        <select name="filter_type">
                            <option value="all">All</option>
                            <option value="email_only">Email Only</option>
                            <option value="sms_only">SMS Only</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-1">
                    <button type="submit" class="pfd-btn pfd-btn-primary" style="width: 100%; height: 42px; padding: 0;">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.7/dist/chart.umd.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const chartColors = {
        green: '#0f7a4e',
        greenLight: 'rgba(15, 122, 78, 0.15)',
        blue: '#1e4668',
        blueLight: 'rgba(30, 70, 104, 0.15)',
        gold: '#b9892f',
        goldLight: 'rgba(185, 137, 47, 0.15)',
        coral: '#ef785a',
        coralLight: 'rgba(239, 120, 90, 0.15)',
        purple: '#7c3aed',
        gray: '#7d8b86',
        border: '#dce7e1',
    };

    Chart.defaults.font.family = "'Inter', sans-serif";
    Chart.defaults.color = '#60706a';

    new Chart(document.getElementById('contactsChart'), {
        type: 'line',
        data: {
            labels: {!! json_encode(array_column($contactsChart, 'label')) !!},
            datasets: [{
                label: 'Contacts',
                data: {!! json_encode(array_column($contactsChart, 'count')) !!},
                borderColor: chartColors.green,
                backgroundColor: chartColors.greenLight,
                fill: true, tension: 0.4, borderWidth: 2.5,
                pointBackgroundColor: chartColors.green,
                pointBorderColor: '#fff', pointBorderWidth: 2,
                pointRadius: 4, pointHoverRadius: 6,
            }]
        },
        options: {
            responsive: true, maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: { backgroundColor: '#10201a', titleColor: '#fff', bodyColor: '#dce7e1', padding: 12, cornerRadius: 8, displayColors: false }
            },
            scales: {
                x: { grid: { display: false }, ticks: { font: { size: 12 } } },
                y: { beginAtZero: true, grid: { color: 'rgba(220, 231, 225, 0.5)' }, ticks: { font: { size: 12 }, stepSize: 1 } }
            },
            interaction: { intersect: false, mode: 'index' }
        }
    });

    new Chart(document.getElementById('notificationsChart'), {
        type: 'doughnut',
        data: {
            labels: ['Sent', 'Failed', 'Queued'],
            datasets: [{
                data: [{{ $notificationsChart['sent'] }}, {{ $notificationsChart['failed'] }}, {{ $notificationsChart['queued'] }}],
                backgroundColor: [chartColors.green, chartColors.coral, chartColors.gold],
                borderWidth: 0, hoverOffset: 8,
            }]
        },
        options: {
            responsive: true, maintainAspectRatio: false, cutout: '65%',
            plugins: {
                legend: { position: 'bottom', labels: { padding: 20, usePointStyle: true, pointStyle: 'circle', font: { size: 12 } } },
                tooltip: { backgroundColor: '#10201a', titleColor: '#fff', bodyColor: '#dce7e1', padding: 12, cornerRadius: 8 }
            }
        }
    });

    new Chart(document.getElementById('subscribersChart'), {
        type: 'bar',
        data: {
            labels: {!! json_encode(array_column($subscribersChart, 'label')) !!},
            datasets: [{
                label: 'Subscribers',
                data: {!! json_encode(array_column($subscribersChart, 'count')) !!},
                backgroundColor: chartColors.blueLight,
                borderColor: chartColors.blue,
                borderWidth: 2, borderRadius: 8, borderSkipped: false, barThickness: 32,
            }]
        },
        options: {
            responsive: true, maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: { backgroundColor: '#10201a', titleColor: '#fff', bodyColor: '#dce7e1', padding: 12, cornerRadius: 8, displayColors: false }
            },
            scales: {
                x: { grid: { display: false }, ticks: { font: { size: 12 } } },
                y: { beginAtZero: true, grid: { color: 'rgba(220, 231, 225, 0.5)' }, ticks: { font: { size: 12 }, stepSize: 1 } }
            }
        }
    });

    new Chart(document.getElementById('contactStatusChart'), {
        type: 'doughnut',
        data: {
            labels: ['Pending', 'Contacted', 'Resolved'],
            datasets: [{
                data: [{{ $contactStatusChart['pending'] }}, {{ $contactStatusChart['contacted'] }}, {{ $contactStatusChart['resolved'] }}],
                backgroundColor: [chartColors.gold, chartColors.blue, chartColors.green],
                borderWidth: 0, hoverOffset: 8,
            }]
        },
        options: {
            responsive: true, maintainAspectRatio: false, cutout: '65%',
            plugins: {
                legend: { position: 'bottom', labels: { padding: 20, usePointStyle: true, pointStyle: 'circle', font: { size: 12 } } },
                tooltip: { backgroundColor: '#10201a', titleColor: '#fff', bodyColor: '#dce7e1', padding: 12, cornerRadius: 8 }
            }
        }
    });
});
</script>
@endpush
