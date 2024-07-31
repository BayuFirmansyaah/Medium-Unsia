@php
    $menus = [
        [
            'name' => 'dashboard',
            'icon' => 'bx bx-home-circle',
            'route' => route('admin.dashboard'),
            'role' => ['admin'],
        ],
        [
            'label' => 'Menu Utama',
            'separator' => true,
        ],
        [
            'name' => 'Pengguna',
            'icon' => 'bx bx-user',
            'route' => route('admin.user.index'),
            'role' => ['admin'],
        ],
        [
            'name' => 'Artikel',
            'icon' => 'bx bx-news',
            'route' => route('admin.content.index'),
            'role' => ['admin'],
        ],
        // [
        //     'name' => 'Komentar',
        //     'icon' => 'bx bx-message-square-detail',
        //     'route' => null,
        //     'role' => ['admin'],
        // ],
        [
            'label' => 'Lainnya',
            'separator' => true,
        ],
        [
            'name' => 'Keluar',
            'icon' => 'bx bx-log-out',
            'route' => route('logout'),
            'role' => ['admin', 'user'],
        ]

    ];
@endphp

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <span class="demo menu-text fw-bolder" style="text-transform: capitalize !important;font-size:22px;">
                Edukasi Platform
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>
    
    <ul class="menu-inner py-1">
        @foreach ($menus as $menu)    
            @if (isset($menu['separator']) && $menu['separator'])
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">{{ $menu['label'] }}</span>
                </li>
            @elseif (isset($menu['child']))
                <li class="menu-item {{ $menu['name'] }}">
                    <a href="javascript:void(0)" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons {{ $menu['icon'] }}"></i>
                        <div>{{ $menu['name'] }}</div>
                    </a>
                    <ul class="menu-sub">
                        @foreach ($menu['child'] as $childMenu)
                            @if (isset($childMenu['role']) && !in_array($role_user, $childMenu['role']))
                                @continue
                            @endif
                            <li class="menu-item">
                                <a href="{{ $childMenu['route'] }}" class="menu-link child-menu">
                                    <div>{{ $childMenu['name'] }}</div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @else
                <li class="menu-item {{ $menu['name'] }}" style="text-transform: capitalize">
                    <a href="{{ isset($menu['route']) ? $menu['route'] : rand() }}" class="menu-link">
                        <i class="menu-icon tf-icons {{ $menu['icon'] }}"></i>
                        <div>{{ $menu['name'] }}</div>
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</aside>

<script>
    function removeActiveClasses() {
        menuItem.forEach(item => {
            item.parentElement.classList.remove('active');
            item.parentElement.classList.remove('open');
        });
    }

    function setActiveClasses(item) {
        item.parentElement.classList.add('active');
        if (item.parentElement.parentElement.classList.contains('menu-sub')) {
            item.parentElement.parentElement.parentElement.classList.add('active');
            item.parentElement.parentElement.parentElement.classList.add('open');
        }
    }

    let currentLocation = window.location.href;
    currentLocation = currentLocation.replace(/\/create/g, '');
    currentLocation = currentLocation.split('/').pop();
    const menuItem = document.querySelectorAll('.menu-item a');

    menuItem.forEach(item => {
        let href = item.getAttribute('href').split('/').pop();
        if (href == currentLocation) {
            setActiveClasses(item);
        }
    });

    menuItem.forEach(item => {
        item.addEventListener('click', function() {
            removeActiveClasses();
            setActiveClasses(item);
        });
    });
</script>
    