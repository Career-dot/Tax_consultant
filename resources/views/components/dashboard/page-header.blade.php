@props(['title', 'subtitle' => null, 'breadcrumb' => []])

<div class="pfd-page-header pfd-reveal">
    <div>
        @if (count($breadcrumb))
            <nav class="pfd-breadcrumb" aria-label="Breadcrumb">
                @foreach ($breadcrumb as $index => $crumb)
                    @if ($index > 0)
                        <span aria-hidden="true">/</span>
                    @endif
                    @if (!empty($crumb['url']) && $index < count($breadcrumb) - 1)
                        <a href="{{ $crumb['url'] }}">{{ $crumb['label'] }}</a>
                    @else
                        <span>{{ $crumb['label'] }}</span>
                    @endif
                @endforeach
            </nav>
        @endif
        <h1>{{ $title }}</h1>
        @if ($subtitle)
            <p>{{ $subtitle }}</p>
        @endif
    </div>

    @isset($actions)
        <div class="pfd-page-header-actions">
            {{ $actions }}
        </div>
    @endisset
</div>
