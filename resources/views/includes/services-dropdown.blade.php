@php
    $serviceMenuItems = [
        [
            'title' => 'Income Tax Services',
            'description' => 'Registration, annual return filing, and FBR notice/audit response for individuals, AOPs and companies.',
            'route' => 'services.personal',
            'icon' => 'fa-user-o',
        ],
        [
            'title' => 'Sales Tax Services',
            'description' => 'Sales tax registration, monthly return filing, audits and refunds.',
            'route' => 'services.gst',
            'icon' => 'fa-file-text-o',
        ],
        [
            'title' => 'Withholding Tax Services',
            'description' => 'Correct withholding at source, statement filing, and default notice defense.',
            'route' => 'services.family',
            'icon' => 'fa-balance-scale',
        ],
        [
            'title' => 'Tax Litigation & Representation',
            'description' => 'Representation from the assessing officer through the Appellate Tribunal and High Court.',
            'route' => 'services.business',
            'icon' => 'fa-gavel',
        ],
        [
            'title' => 'Corporate / Retainer Services',
            'description' => 'Consolidated monthly compliance across income tax, sales tax and withholding tax for multi-entity groups.',
            'route' => 'services.business-tax',
            'icon' => 'fa-building-o',
        ]
    ];
@endphp

<li class="nav-item dropdown pf-services-dropdown">
    <a
        class="nav-link pf-services-dropdown-toggle {{ request()->routeIs('services.*') ? 'active' : '' }}"
        href="#"
        role="button"
        aria-expanded="false"
    >
        Services <i class="fa fa-angle-down pf-services-chevron" aria-hidden="true"></i>
    </a>

    <div class="pf-services-megamenu" aria-label="Services submenu">
        <div class="container">
            <div class="pf-services-megamenu-grid pf-services-megamenu-grid-expanded">
                @foreach ($serviceMenuItems as $service)
                    <div class="pf-services-megamenu-col">
                        <a
                            href="{{ route($service['route']) }}"
                            class="pf-services-megamenu-item {{ request()->routeIs($service['route']) ? 'active' : '' }}"
                        >
                            <span class="pf-services-megamenu-icon">
                                <i class="fa {{ $service['icon'] }}" aria-hidden="true"></i>
                            </span>
                            <span class="pf-services-megamenu-content">
                                <span class="pf-services-megamenu-title">{{ $service['title'] }}</span>
                                <span class="pf-services-megamenu-desc">{{ $service['description'] }}</span>
                            </span>
                        </a>
                    </div>
                @endforeach

                <div class="pf-services-megamenu-col pf-services-view-all-col">
                    <a href="{{ route('home') }}#features-area" class="pf-services-view-all">
                        VIEW ALL<br>SERVICES
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</li>
