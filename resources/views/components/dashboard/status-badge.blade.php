@props(['status'])

@php
    $stageLabels = \App\Support\Dashboard\DemoDataStore::STAGES;

    $map = [
        'draft' => ['variant' => 'muted', 'label' => 'Draft'],
        'submitted' => ['variant' => 'info', 'label' => 'Submitted'],
        'under_review' => ['variant' => 'warning', 'label' => 'Under Review'],
        'documents_required' => ['variant' => 'danger', 'label' => 'Documents Required'],
        'approved' => ['variant' => 'success', 'label' => 'Approved'],
        'completed' => ['variant' => 'success', 'label' => 'Completed'],
        'pending' => ['variant' => 'warning', 'label' => 'Pending'],
        'paid' => ['variant' => 'success', 'label' => 'Paid'],
        'unpaid' => ['variant' => 'danger', 'label' => 'Unpaid'],
        'verified' => ['variant' => 'success', 'label' => 'Verified'],
        'rejected' => ['variant' => 'danger', 'label' => 'Rejected'],
        'open' => ['variant' => 'info', 'label' => 'Open'],
        'closed' => ['variant' => 'muted', 'label' => 'Closed'],
        'read' => ['variant' => 'muted', 'label' => 'Read'],
        'unread' => ['variant' => 'info', 'label' => 'Unread'],
    ];

    $meta = $map[$status] ?? ['variant' => 'muted', 'label' => ucfirst(str_replace('_', ' ', $status))];
@endphp

<span {{ $attributes->merge(['class' => 'pfd-badge is-'.$meta['variant']]) }}>{{ $meta['label'] }}</span>
