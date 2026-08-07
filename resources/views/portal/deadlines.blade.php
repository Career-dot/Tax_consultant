@extends('layouts.app')

@section('title', 'My Deadlines')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">My Deadlines</h1>

    @if($subscriptions->count())
        @foreach($subscriptions as $sub)
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">{{ str_replace('_', ' ', ucfirst($sub->taxpayer_type)) }} Profile</h5>
                </div>
                <div class="card-body">
                    @if($sub->deadlines->count())
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Deadline</th>
                                        <th>Due Date</th>
                                        <th>Status</th>
                                        <th>Days Left</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sub->deadlines as $deadline)
                                        <tr class="{{ $deadline->due_date->isPast() ? 'table-danger' : '' }}">
                                            <td>{{ $deadline->name }}</td>
                                            <td>{{ $deadline->due_date->format('F j, Y') }}</td>
                                            <td>
                                                <span class="badge bg-{{ $deadline->is_completed ? 'success' : ($deadline->due_date->isPast() ? 'danger' : 'warning') }}">
                                                    {{ $deadline->is_completed ? 'Completed' : ($deadline->due_date->isPast() ? 'Overdue' : 'Upcoming') }}
                                                </span>
                                            </td>
                                            <td>{{ $deadline->due_date->diffForHumans() }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-muted">No deadlines for this profile.</p>
                    @endif
                </div>
            </div>
        @endforeach
    @else
        <div class="text-center py-5">
            <h4 class="text-muted">No subscriptions yet</h4>
            <p>Subscribe to the Tax Compliance Planner to get personalized deadlines.</p>
            <a href="{{ route('planner.index') }}" class="btn btn-primary">Start Planner</a>
        </div>
    @endif

    <a href="{{ route('portal.dashboard') }}" class="btn btn-outline-secondary"><i class="fa fa-arrow-left me-2"></i>Back to Portal</a>
</div>
@endsection
