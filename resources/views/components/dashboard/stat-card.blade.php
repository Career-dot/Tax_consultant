@props([
    'icon' => 'pe-7s-note2',
    'label',
    'value',
    'variant' => 'green',
    'counter' => true,
    'prefix' => '',
    'suffix' => '',
])

<div {{ $attributes->merge(['class' => 'pfd-card pfd-stat-card pfd-reveal']) }}>
    <span class="pfd-stat-icon {{ $variant !== 'green' ? 'is-'.$variant : '' }}"><i class="{{ $icon }}" aria-hidden="true"></i></span>
    <div>
        @if ($counter && is_numeric($value))
            <p class="pfd-stat-value" data-counter="{{ $value }}" data-prefix="{{ $prefix }}" data-suffix="{{ $suffix }}">{{ $prefix }}0{{ $suffix }}</p>
        @else
            <p class="pfd-stat-value">{{ $prefix }}{{ $value }}{{ $suffix }}</p>
        @endif
        <p class="pfd-stat-label">{{ $label }}</p>
        {{ $slot }}
    </div>
</div>
