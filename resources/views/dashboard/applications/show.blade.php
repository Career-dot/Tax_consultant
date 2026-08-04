@extends('layouts.dashboard')

@section('title', $application['reference'].' - Tax Consultant')

@section('content')
    <x-dashboard.page-header :title="$application['title']" :subtitle="$application['reference']" :breadcrumb="[['label' => 'Dashboard', 'url' => route('dashboard.index')], ['label' => 'My Applications', 'url' => route('dashboard.applications')], ['label' => $application['reference']]]">
        <x-slot:actions>
            <x-dashboard.status-badge :status="$application['status']" />
        </x-slot:actions>
    </x-dashboard.page-header>

    <div class="pfd-card pfd-reveal" style="margin-bottom: var(--pfd-gap);">
        <div class="pfd-card-header">
            <div>
                <h2>Filing Progress</h2>
                <p>Every stage of your application, start to finish.</p>
            </div>
        </div>
        <div class="pfd-card-body">
            <ol class="pfd-timeline">
                @foreach ($application['timeline'] as $step)
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
            <div style="margin-top:30px;">
                <div style="display:flex; justify-content:space-between; margin-bottom:8px; font-size:12.5px; font-weight:700; color:var(--pf-muted);">
                    <span>Overall progress</span>
                    <span>{{ \App\Support\Dashboard\DemoDataStore::stageProgress($application['status']) }}%</span>
                </div>
                <div class="pfd-progress"><div class="pfd-progress-bar" data-progress="{{ \App\Support\Dashboard\DemoDataStore::stageProgress($application['status']) }}" style="width:0"></div></div>
            </div>
        </div>
    </div>

    <div class="pfd-grid pfd-grid-2" style="align-items:start;">
        <div class="pfd-card pfd-reveal">
            <div class="pfd-card-header">
                <div>
                    <h2>Application Details</h2>
                </div>
            </div>
            <div class="pfd-card-body">
                <table class="pfd-table">
                    <tbody>
                        <tr><td>Reference</td><td>{{ $application['reference'] }}</td></tr>
                        <tr><td>Service</td><td>{{ $application['title'] }}</td></tr>
                        <tr><td>Started</td><td>{{ \Carbon\Carbon::parse($application['created_at'])->format('d M Y') }}</td></tr>
                        <tr><td>Last updated</td><td>{{ \Carbon\Carbon::parse($application['updated_at'])->diffForHumans() }}</td></tr>
                        @foreach (($application['meta'] ?? []) as $key => $value)
                            @if ($value)
                                <tr><td>{{ ucwords(str_replace('_', ' ', $key)) }}</td><td>{{ $value }}</td></tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="pfd-card pfd-reveal">
            <div class="pfd-card-header">
                <div>
                    <h2>Linked Documents</h2>
                </div>
                <a class="pfd-card-link" href="{{ route('dashboard.documents') }}">Document Center <i class="fa fa-angle-right"></i></a>
            </div>
            <div class="pfd-card-body">
                @if (count($documents))
                    <div style="display:flex; flex-direction:column; gap:10px;">
                        @foreach ($documents as $document)
                            <div class="pfd-doc-card">
                                <span class="pfd-doc-card-icon"><i class="fa fa-file-text-o" aria-hidden="true"></i></span>
                                <div class="pfd-doc-card-body">
                                    <p>{{ $document['name'] }}</p>
                                    <span>Uploaded {{ \Carbon\Carbon::parse($document['uploaded_at'])->format('d M Y') }}</span>
                                </div>
                                <x-dashboard.status-badge :status="$document['status']" />
                            </div>
                        @endforeach
                    </div>
                @else
                    <x-dashboard.empty-state icon="pe-7s-cloud-upload" title="No documents linked" text="Upload documents for this application from the Document Center." action-label="Upload Documents" :action-url="route('dashboard.documents')" />
                @endif
            </div>
        </div>
    </div>
@endsection
