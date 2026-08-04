@extends('layouts.dashboard')

@section('title', 'My Applications - Tax Consultant')

@section('content')
    <x-dashboard.page-header title="My Applications" subtitle="Track the status of every filing you've started." :breadcrumb="[['label' => 'Dashboard', 'url' => route('dashboard.index')], ['label' => 'My Applications']]">
        <x-slot:actions>
            <a class="pfd-btn pfd-btn-primary" href="{{ route('dashboard.filing.create', 'personal-tax') }}"><i class="fa fa-plus" aria-hidden="true"></i> Start New Filing</a>
        </x-slot:actions>
    </x-dashboard.page-header>

    <div class="pfd-tabs pfd-reveal" style="margin-bottom:20px;" data-tabs="#applicationPanels">
        <button class="pfd-tab is-active" data-tab-trigger="all">All ({{ count($applications) }})</button>
        <button class="pfd-tab" data-tab-trigger="active">Active ({{ collect($applications)->whereNotIn('status', ['completed'])->count() }})</button>
        <button class="pfd-tab" data-tab-trigger="completed">Completed ({{ collect($applications)->where('status', 'completed')->count() }})</button>
    </div>

    <div id="applicationPanels">
        @foreach (['all' => $applications, 'active' => collect($applications)->whereNotIn('status', ['completed'])->values()->all(), 'completed' => collect($applications)->where('status', 'completed')->values()->all()] as $key => $list)
            <div class="pfd-tab-panel {{ $key === 'all' ? 'is-active' : '' }}" data-tab-panel="{{ $key }}">
                @if (count($list))
                    <div style="display:flex; flex-direction:column; gap:14px;">
                        @foreach ($list as $application)
                            <a class="pfd-app-card pfd-reveal" href="{{ route('dashboard.applications.show', $application['id']) }}" style="text-decoration:none;">
                                <span class="pfd-app-card-icon"><i class="{{ $serviceMeta[$application['service']]['icon'] ?? 'pe-7s-note2' }}" aria-hidden="true"></i></span>
                                <div class="pfd-app-card-body">
                                    <h3>{{ $application['title'] }}</h3>
                                    <p>{{ $application['reference'] }} · Started {{ \Carbon\Carbon::parse($application['created_at'])->format('d M Y') }}</p>
                                </div>
                                <div class="pfd-app-card-progress">
                                    <span>{{ \App\Support\Dashboard\DemoDataStore::stageProgress($application['status']) }}% complete</span>
                                    <div class="pfd-progress"><div class="pfd-progress-bar" data-progress="{{ \App\Support\Dashboard\DemoDataStore::stageProgress($application['status']) }}" style="width:0"></div></div>
                                </div>
                                <div class="pfd-app-card-meta">
                                    <x-dashboard.status-badge :status="$application['status']" />
                                    <span class="pfd-card-link">View <i class="fa fa-angle-right"></i></span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <div class="pfd-card">
                        <x-dashboard.empty-state icon="pe-7s-note2" title="Nothing here" text="No applications in this category yet." action-label="Start New Filing" :action-url="route('dashboard.filing.create', 'personal-tax')" />
                    </div>
                @endif
            </div>
        @endforeach
    </div>
@endsection
