@php
    $serviceMenuItems = [
        [
            'title' => 'Personal Tax Filing',
            'description' => 'File your FBR income tax return as an individual or salaried employee.',
            'route' => 'services.personal',
            'icon' => 'fa-user-o',
        ],
        [
            'title' => 'Family Tax Filing',
            'description' => 'Manage and file tax returns for multiple family members.',
            'route' => 'services.family',
            'icon' => 'fa-users',
        ],
        [
            'title' => 'Business Tax Return',
            'description' => 'CA-reviewed tax return filing for businesses and entities.',
            'route' => 'services.business-tax',
            'icon' => 'fa-building-o',
        ],
        [
            'title' => 'NTN Registration',
            'description' => 'Get your National Tax Number registered with FBR.',
            'route' => 'services.ntn',
            'icon' => 'fa-id-card-o',
        ],
        [
            'title' => 'IRIS Profile Update',
            'description' => 'Update your FBR IRIS profile for salary or business changes.',
            'route' => 'services.iris',
            'icon' => 'fa-user',
        ],
        [
            'title' => 'GST Registration',
            'description' => 'Register your business for General Sales Tax with FBR.',
            'route' => 'services.gst',
            'icon' => 'fa-file-text-o',
        ],
        [
            'title' => 'Business Incorporation',
            'description' => 'Company registration, NPO setup, PSEB and more.',
            'route' => 'services.business',
            'icon' => 'fa-briefcase',
        ],
        [
            'title' => 'Salary Tax Calculator',
            'description' => 'Free calculator to estimate your income tax.',
            'route' => 'services.salary',
            'icon' => 'fa-calculator',
        ],
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
