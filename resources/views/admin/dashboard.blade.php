@extends('admin.layout')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<style>
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-bottom: 28px;
    }

    .stat-card {
        background: var(--surface-elevated);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        padding: 24px;
        position: relative;
        overflow: hidden;
        transition: all var(--transition-normal);
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 120px;
        height: 120px;
        border-radius: 50%;
        opacity: 0.05;
        transform: translate(30px, -30px);
        transition: all 0.6s ease;
    }

    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-xl);
    }

    .stat-card:hover::before {
        opacity: 0.1;
        transform: translate(20px, -20px) scale(1.2);
    }

    .stat-card.green::before { background: var(--primary); }
    .stat-card.blue::before { background: var(--accent-blue); }
    .stat-card.gold::before { background: var(--accent-gold); }
    .stat-card.coral::before { background: var(--accent-coral); }
    .stat-card.purple::before { background: var(--accent-purple); }

    .stat-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 18px;
    }

    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        transition: all 0.4s ease;
    }

    .stat-card:hover .stat-icon { transform: scale(1.08); }

    .stat-icon.green { background: var(--primary-50); color: var(--primary); }
    .stat-icon.blue { background: var(--accent-blue-50); color: var(--accent-blue); }
    .stat-icon.gold { background: var(--accent-gold-50); color: var(--accent-gold); }
    .stat-icon.coral { background: var(--accent-coral-50); color: var(--accent-coral); }
    .stat-icon.purple { background: var(--accent-purple-50); color: var(--accent-purple); }

    .stat-card .stat-value {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 32px;
        font-weight: 800;
        color: var(--ink);
        line-height: 1;
        margin-bottom: 6px;
    }

    .stat-card .stat-label {
        font-size: 13px;
        color: var(--muted);
        font-weight: 500;
    }

    .stat-card .stat-badge {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        padding: 3px 10px;
        border-radius: var(--radius-full);
        font-size: 11px;
        font-weight: 600;
        margin-top: 10px;
    }

    .stat-badge.green { background: var(--primary-50); color: var(--primary); }
    .stat-badge.gold { background: var(--accent-gold-50); color: #b45309; }
    .stat-badge.coral { background: var(--accent-coral-50); color: #c2410c; }

    /* Charts Section */
    .charts-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 28px;
    }

    .chart-card {
        background: var(--surface-elevated);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        overflow: hidden;
        transition: all var(--transition-normal);
    }

    .chart-card:hover {
        box-shadow: var(--shadow-md);
    }

    .chart-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 18px 24px;
        border-bottom: 1px solid var(--border-light);
    }

    .chart-card-header h5 {
        font-size: 15px;
        font-weight: 700;
        color: var(--ink);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .chart-card-header h5 i {
        font-size: 14px;
    }

    .chart-card-body {
        padding: 20px 24px;
    }

    .chart-container {
        position: relative;
        height: 260px;
        width: 100%;
    }

    /* Section Cards */
    .section-card {
        background: var(--surface-elevated);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        overflow: hidden;
        transition: all var(--transition-normal);
    }

    .section-card:hover { box-shadow: var(--shadow-md); }
    .section-card + .section-card { margin-top: 24px; }

    .section-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px 24px;
        border-bottom: 1px solid var(--border-light);
        background: linear-gradient(180deg, rgba(246, 250, 248, 0.5), transparent);
    }

    .section-card-header h5 {
        font-size: 16px;
        font-weight: 700;
        color: var(--ink);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .section-card-header h5 i { color: var(--primary); font-size: 14px; }
    .section-card-body { padding: 0; }
    .section-card-body.padded { padding: 24px; }

    /* Broadcast Form */
    .broadcast-form .form-label {
        font-size: 11.5px;
        font-weight: 700;
        color: var(--ink-secondary);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 6px;
    }

    .broadcast-form .form-control,
    .broadcast-form .form-select {
        border: 1.5px solid var(--border);
        border-radius: var(--radius-sm);
        font-size: 13.5px;
        padding: 10px 14px;
        transition: all var(--transition-fast);
    }

    .broadcast-form .form-control:focus,
    .broadcast-form .form-select:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(15, 122, 78, 0.08);
    }

    .broadcast-form .form-select {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%2360706a' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 14px center;
        padding-right: 36px;
    }

    @media (max-width: 1199px) {
        .stats-grid { grid-template-columns: repeat(2, 1fr); }
        .charts-grid { grid-template-columns: 1fr; }
    }

    @media (max-width: 767px) {
        .stats-grid { grid-template-columns: 1fr; }
        .stat-card .stat-value { font-size: 28px; }
        .section-card-header { flex-direction: column; gap: 12px; align-items: flex-start; }
    }
</style>

<!-- Stats Cards Row 1 -->
<div class="stats-grid">
    <div class="stat-card green anim-fade-up anim-delay-1">
        <div class="stat-top">
            <div class="stat-icon green"><i class="fas fa-envelope"></i></div>
        </div>
        <div class="stat-value">{{ $stats['contacts'] }}</div>
        <div class="stat-label">Total Contacts</div>
        <span class="stat-badge gold"><i class="fas fa-clock"></i> {{ $stats['pending_contacts'] }} pending</span>
    </div>
    <div class="stat-card blue anim-fade-up anim-delay-2">
        <div class="stat-top">
            <div class="stat-icon blue"><i class="fas fa-users"></i></div>
        </div>
        <div class="stat-value">{{ $stats['subscriptions'] }}</div>
        <div class="stat-label">Active Subscribers</div>
        <span class="stat-badge green"><i class="fas fa-check"></i> Planner users</span>
    </div>
    <div class="stat-card gold anim-fade-up anim-delay-3">
        <div class="stat-top">
            <div class="stat-icon gold"><i class="fas fa-calendar-alt"></i></div>
        </div>
        <div class="stat-value">{{ $stats['deadline_rules'] }}</div>
        <div class="stat-label">Deadline Rules</div>
        <span class="stat-badge green"><i class="fas fa-check"></i> Active rules</span>
    </div>
    <div class="stat-card coral anim-fade-up anim-delay-4">
        <div class="stat-top">
            <div class="stat-icon coral"><i class="fas fa-paper-plane"></i></div>
        </div>
        <div class="stat-value">{{ $stats['notifications_sent'] }}</div>
        <div class="stat-label">Notifications Sent</div>
        <span class="stat-badge coral"><i class="fas fa-exclamation-triangle"></i> {{ $stats['notifications_failed'] }} failed</span>
    </div>
</div>

<!-- Charts Section -->
<div class="charts-grid">
    <!-- Contacts Over Time -->
    <div class="chart-card anim-fade-up anim-delay-5">
        <div class="chart-card-header">
            <h5><i class="fas fa-chart-line" style="color: var(--primary);"></i> Contacts Over Time</h5>
            <span style="font-size: 12px; color: var(--muted);">Last 6 months</span>
        </div>
        <div class="chart-card-body">
            <div class="chart-container">
                <canvas id="contactsChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Notifications Status -->
    <div class="chart-card anim-fade-up anim-delay-6">
        <div class="chart-card-header">
            <h5><i class="fas fa-chart-pie" style="color: var(--accent-blue);"></i> Notifications Status</h5>
        </div>
        <div class="chart-card-body">
            <div class="chart-container">
                <canvas id="notificationsChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Subscriber Growth -->
    <div class="chart-card anim-fade-up anim-delay-7">
        <div class="chart-card-header">
            <h5><i class="fas fa-chart-bar" style="color: var(--accent-gold);"></i> Subscriber Growth</h5>
            <span style="font-size: 12px; color: var(--muted);">Last 6 months</span>
        </div>
        <div class="chart-card-body">
            <div class="chart-container">
                <canvas id="subscribersChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Contact Status Distribution -->
    <div class="chart-card anim-fade-up anim-delay-8">
        <div class="chart-card-header">
            <h5><i class="fas fa-chart-doughnut" style="color: var(--accent-coral);"></i> Contact Status</h5>
        </div>
        <div class="chart-card-body">
            <div class="chart-container">
                <canvas id="contactStatusChart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Stats Cards Row 2 -->
<div class="stats-grid">
    <div class="stat-card green anim-fade-up">
        <div class="stat-top">
            <div class="stat-icon green"><i class="fas fa-briefcase"></i></div>
        </div>
        <div class="stat-value">{{ $stats['services'] }}</div>
        <div class="stat-label">Services</div>
    </div>
    <div class="stat-card blue anim-fade-up">
        <div class="stat-top">
            <div class="stat-icon blue"><i class="fas fa-question-circle"></i></div>
        </div>
        <div class="stat-value">{{ $stats['faqs'] }}</div>
        <div class="stat-label">FAQs</div>
    </div>
    <div class="stat-card gold anim-fade-up">
        <div class="stat-top">
            <div class="stat-icon gold"><i class="fas fa-newspaper"></i></div>
        </div>
        <div class="stat-value">{{ $stats['tax_updates'] }}</div>
        <div class="stat-label">Tax Updates</div>
    </div>
    <div class="stat-card purple anim-fade-up">
        <div class="stat-top">
            <div class="stat-icon purple"><i class="fas fa-user-tie"></i></div>
        </div>
        <div class="stat-value">{{ $stats['team_members'] }}</div>
        <div class="stat-label">Team Members</div>
    </div>
</div>

<!-- Service Users Stats -->
<div class="section-card anim-fade-up" style="margin-bottom: 24px;">
    <div class="section-card-header">
        <h5><i class="fas fa-chart-bar" style="color: var(--primary);"></i> Users Per Service</h5>
        <a href="{{ route('admin.users.index') }}" class="adm-btn adm-btn-outline adm-btn-sm">Manage Users <i class="fas fa-arrow-right"></i></a>
    </div>
    <div class="section-card-body">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px; padding: 20px;">
            @forelse($serviceStats as $service)
                <div style="background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-md); padding: 20px; text-align: center; transition: all 0.2s ease; cursor: pointer;" onmouseover="this.style.borderColor='var(--primary)'; this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='var(--border)'; this.style.transform='none'" onclick="window.location='{{ route('admin.users.index') }}?service={{ $service->id }}'">
                    <div style="width: 48px; height: 48px; background: var(--primary-50); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--primary); margin: 0 auto 12px; font-size: 20px;">
                        <i class="fa {{ $service->icon }}"></i>
                    </div>
                    <div style="font-size: 28px; font-weight: 800; color: var(--ink); margin-bottom: 4px;">{{ $service->active_users_count }}</div>
                    <div style="font-size: 13px; color: var(--muted); font-weight: 500;">{{ $service->name }}</div>
                    <div style="font-size: 11px; color: var(--primary); margin-top: 4px;">{{ $service->users_count }} total assigned</div>
                </div>
            @empty
                <div style="grid-column: 1 / -1; text-align: center; padding: 40px; color: var(--muted);">
                    <i class="fas fa-chart-bar" style="font-size: 32px; margin-bottom: 12px; display: block;"></i>
                    <p>No services found. Create services first.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Recent Contacts -->
    <div class="col-lg-6">
        <div class="section-card anim-fade-up">
            <div class="section-card-header">
                <h5><i class="fas fa-envelope"></i> Recent Contacts</h5>
                <a href="{{ route('admin.contacts.index') }}" class="adm-btn adm-btn-outline adm-btn-sm">View All <i class="fas fa-arrow-right"></i></a>
            </div>
            @if($recentContacts->count())
                <div class="adm-table-wrapper">
                    <table class="adm-table">
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
                                        <span class="adm-badge {{ $contact->status === 'pending' ? 'adm-badge-gold' : ($contact->status === 'contacted' ? 'adm-badge-blue' : 'adm-badge-green') }}">
                                            <span class="adm-badge-dot"></span>
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
                <div class="adm-empty">
                    <div class="adm-empty-icon"><i class="fas fa-envelope-open"></i></div>
                    <h6>No contacts yet</h6>
                    <p>Contact submissions will appear here.</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Upcoming Deadlines -->
    <div class="col-lg-6">
        <div class="section-card anim-fade-up">
            <div class="section-card-header">
                <h5><i class="fas fa-clock"></i> Upcoming Deadlines</h5>
                <a href="{{ route('admin.deadline-rules.index') }}" class="adm-btn adm-btn-outline adm-btn-sm">Manage Rules <i class="fas fa-arrow-right"></i></a>
            </div>
            @if($upcomingDeadlines->count())
                <div class="adm-table-wrapper">
                    <table class="adm-table">
                        <thead>
                            <tr>
                                <th>Deadline</th>
                                <th>Due Date</th>
                                <th>Days Left</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($upcomingDeadlines as $dl)
                                @php
                                    $daysLeft = $dl->due_date->diffInDays(now());
                                @endphp
                                <tr>
                                    <td><strong>{{ $dl->name }}</strong></td>
                                    <td>{{ $dl->due_date->format('M j, Y') }}</td>
                                    <td>
                                        <span class="adm-badge {{ $daysLeft <= 3 ? 'adm-badge-coral' : ($daysLeft <= 7 ? 'adm-badge-gold' : 'adm-badge-green') }}">
                                            <span class="adm-badge-dot"></span>
                                            {{ $dl->due_date->diffForHumans() }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="adm-empty">
                    <div class="adm-empty-icon"><i class="fas fa-calendar-check"></i></div>
                    <h6>No upcoming deadlines</h6>
                    <p>No deadlines in the next 30 days.</p>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Broadcast Form -->
<div class="section-card mt-4 anim-fade-up">
    <div class="section-card-header">
        <h5><i class="fas fa-paper-plane"></i> Send Broadcast Message</h5>
    </div>
    <div class="section-card-body padded">
        <form action="{{ route('admin.broadcast') }}" method="POST" class="broadcast-form">
            @csrf
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">Subject</label>
                    <input type="text" name="subject" class="form-control" required placeholder="e.g., FBR Deadline Extension">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Message</label>
                    <textarea name="message" class="form-control" rows="2" required placeholder="Your message to subscribers..."></textarea>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Channel</label>
                    <select name="channel" class="form-select">
                        <option value="email">Email</option>
                        <option value="sms">SMS</option>
                        <option value="both">Both</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Filter</label>
                    <select name="filter_type" class="form-select">
                        <option value="all">All</option>
                        <option value="email_only">Email Only</option>
                        <option value="sms_only">SMS Only</option>
                    </select>
                </div>
                <div class="col-md-1 d-flex align-items-end">
                    <button type="submit" class="adm-btn adm-btn-primary w-100" style="height: 42px;">
                        <i class="fas fa-send"></i>
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

    // Contacts Over Time (Line Chart)
    new Chart(document.getElementById('contactsChart'), {
        type: 'line',
        data: {
            labels: {!! json_encode(array_column($contactsChart, 'label')) !!},
            datasets: [{
                label: 'Contacts',
                data: {!! json_encode(array_column($contactsChart, 'count')) !!},
                borderColor: chartColors.green,
                backgroundColor: chartColors.greenLight,
                fill: true,
                tension: 0.4,
                borderWidth: 2.5,
                pointBackgroundColor: chartColors.green,
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
                pointRadius: 4,
                pointHoverRadius: 6,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#10201a',
                    titleColor: '#fff',
                    bodyColor: '#dce7e1',
                    padding: 12,
                    cornerRadius: 8,
                    displayColors: false,
                }
            },
            scales: {
                x: {
                    grid: { display: false },
                    ticks: { font: { size: 12 } }
                },
                y: {
                    beginAtZero: true,
                    grid: { color: 'rgba(220, 231, 225, 0.5)' },
                    ticks: { font: { size: 12 }, stepSize: 1 }
                }
            },
            interaction: { intersect: false, mode: 'index' }
        }
    });

    // Notifications Status (Doughnut)
    new Chart(document.getElementById('notificationsChart'), {
        type: 'doughnut',
        data: {
            labels: ['Sent', 'Failed', 'Queued'],
            datasets: [{
                data: [
                    {{ $notificationsChart['sent'] }},
                    {{ $notificationsChart['failed'] }},
                    {{ $notificationsChart['queued'] }}
                ],
                backgroundColor: [chartColors.green, chartColors.coral, chartColors.gold],
                borderWidth: 0,
                hoverOffset: 8,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '65%',
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: { padding: 20, usePointStyle: true, pointStyle: 'circle', font: { size: 12 } }
                },
                tooltip: {
                    backgroundColor: '#10201a',
                    titleColor: '#fff',
                    bodyColor: '#dce7e1',
                    padding: 12,
                    cornerRadius: 8,
                }
            }
        }
    });

    // Subscriber Growth (Bar)
    new Chart(document.getElementById('subscribersChart'), {
        type: 'bar',
        data: {
            labels: {!! json_encode(array_column($subscribersChart, 'label')) !!},
            datasets: [{
                label: 'Subscribers',
                data: {!! json_encode(array_column($subscribersChart, 'count')) !!},
                backgroundColor: chartColors.blueLight,
                borderColor: chartColors.blue,
                borderWidth: 2,
                borderRadius: 8,
                borderSkipped: false,
                barThickness: 32,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#10201a',
                    titleColor: '#fff',
                    bodyColor: '#dce7e1',
                    padding: 12,
                    cornerRadius: 8,
                    displayColors: false,
                }
            },
            scales: {
                x: {
                    grid: { display: false },
                    ticks: { font: { size: 12 } }
                },
                y: {
                    beginAtZero: true,
                    grid: { color: 'rgba(220, 231, 225, 0.5)' },
                    ticks: { font: { size: 12 }, stepSize: 1 }
                }
            }
        }
    });

    // Contact Status (Doughnut)
    new Chart(document.getElementById('contactStatusChart'), {
        type: 'doughnut',
        data: {
            labels: ['Pending', 'Contacted', 'Resolved'],
            datasets: [{
                data: [
                    {{ $contactStatusChart['pending'] }},
                    {{ $contactStatusChart['contacted'] }},
                    {{ $contactStatusChart['resolved'] }}
                ],
                backgroundColor: [chartColors.gold, chartColors.blue, chartColors.green],
                borderWidth: 0,
                hoverOffset: 8,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '65%',
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: { padding: 20, usePointStyle: true, pointStyle: 'circle', font: { size: 12 } }
                },
                tooltip: {
                    backgroundColor: '#10201a',
                    titleColor: '#fff',
                    bodyColor: '#dce7e1',
                    padding: 12,
                    cornerRadius: 8,
                }
            }
        }
    });
});
</script>
@endpush
