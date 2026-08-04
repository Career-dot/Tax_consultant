@props([
    'icon' => 'pe-7s-note2',
    'title',
    'text' => null,
    'actionLabel' => null,
    'actionUrl' => null,
])

<div class="pfd-empty">
    <span class="pfd-empty-icon"><i class="{{ $icon }}" aria-hidden="true"></i></span>
    <h3>{{ $title }}</h3>
    @if ($text)
        <p>{{ $text }}</p>
    @endif
    @if ($actionLabel && $actionUrl)
        <a class="pfd-btn pfd-btn-primary pfd-btn-sm" href="{{ $actionUrl }}">{{ $actionLabel }}</a>
    @endif
</div>
