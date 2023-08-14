@php
    $configData = Helper::applClasses();
@endphp
<div class="main-menu menu-fixed {{ $configData['theme'] === 'dark' || $configData['theme'] === 'semi-dark' ? 'menu-dark' : 'menu-light' }} menu-accordion menu-shadow"
    data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <span class="brand-logo">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            viewBox="0 0 47.45 47.45" height="38">
                            <defs>
                                <linearGradient id="linear-gradient" x1="11.02" y1="11.1" x2="18.08"
                                    y2="15.18" gradientUnits="userSpaceOnUse">
                                    <stop offset="0" stop-color="#7367f0" />
                                    <stop offset="1" stop-color="#8f85f3" />
                                </linearGradient>
                                <linearGradient id="New_Gradient_Swatch_1" x1="29.41" y1="11.1" x2="36.44"
                                    y2="15.15" xlink:href="#linear-gradient" />
                                <linearGradient id="New_Gradient_Swatch_1-2" x1="11.62" y1="27.69"
                                    x2="28.99" y2="37.72" xlink:href="#linear-gradient" />
                                <linearGradient id="linear-gradient-2" x1="31.63" y1="7.91" x2="47.45"
                                    y2="7.91" xlink:href="#linear-gradient" />
                                <linearGradient id="linear-gradient-3" x1="0" y1="7.91" x2="15.82"
                                    y2="7.91" xlink:href="#linear-gradient" />
                                <linearGradient id="linear-gradient-4" x1="31.63" y1="39.54" x2="47.45"
                                    y2="39.54" xlink:href="#linear-gradient" />
                                <linearGradient id="linear-gradient-5" x1="0" y1="39.54" x2="15.82"
                                    y2="39.54" xlink:href="#linear-gradient" />
                            </defs>
                            <g id="Layer_2" data-name="Layer 2">
                                <g id="Layer_1-2" data-name="Layer 1">
                                    <path d="M10.47,13.12a4.06,4.06,0,1,1,4.06,4.06A4.05,4.05,0,0,1,10.47,13.12Z"
                                        style="fill:url(#linear-gradient)" />
                                    <path d="M37,13.12a4.06,4.06,0,1,1-4.06-4A4.06,4.06,0,0,1,37,13.12Z"
                                        style="fill:url(#New_Gradient_Swatch_1)" />
                                    <path
                                        d="M27.44,37.58C21.5,40.77,14.78,33.81,12.35,28A2,2,0,1,1,16,26.46c1.82,4.37,4.89,5.18,12.12,6.54C28.09,33,34.1,34,27.44,37.58Z"
                                        style="fill:url(#New_Gradient_Swatch_1-2)" />
                                    <path
                                        d="M45.47,15.82a2,2,0,0,1-2-2V5.93a2,2,0,0,0-2-2H33.61a2,2,0,1,1,0-3.95h7.91a5.94,5.94,0,0,1,5.93,5.93v7.91A2,2,0,0,1,45.47,15.82Z"
                                        style="fill:url(#linear-gradient-2)" />
                                    <path
                                        d="M2,15.82a2,2,0,0,1-2-2V5.93A5.94,5.94,0,0,1,5.93,0h7.91a2,2,0,1,1,0,4H5.93a2,2,0,0,0-2,2v7.91A2,2,0,0,1,2,15.82Z"
                                        style="fill:url(#linear-gradient-3)" />
                                    <path
                                        d="M41.52,47.45H33.61a2,2,0,1,1,0-4h7.91a2,2,0,0,0,2-2V33.61a2,2,0,1,1,4,0v7.91A5.94,5.94,0,0,1,41.52,47.45Z"
                                        style="fill:url(#linear-gradient-4)" />
                                    <path
                                        d="M13.84,47.45H5.93A5.94,5.94,0,0,1,0,41.52V33.61a2,2,0,1,1,4,0v7.91a2,2,0,0,0,2,2h7.91a2,2,0,1,1,0,4Z"
                                        style="fill:url(#linear-gradient-5)" />
                                </g>
                            </g>
                        </svg>
                    </span>
                    <h2 class="brand-text">Prodigy</h2>
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pe-0" data-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4 text-primary" data-feather="disc"
                        data-ticon="disc"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom" style="display: block; height: 1rem; margin-top: 0"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" style="margin-top: 1rem" id="main-menu-navigation"
            data-menu="menu-navigation">
            {{-- Foreach menu item starts --}}
            @if (isset($menuData[0]))
                @foreach ($menuData[0]->menu as $menu)
                    @php
                        $allowedPermission = isset($menu->permission) ? $menu->permission : 1;
                        $userPermission = Auth::user()->roles->value('id'); // Assuming the user's permission level is 2, you should replace this with the actual user permission value
                    @endphp

                    @if ($userPermission <= $allowedPermission)
                        @if (isset($menu->navheader))
                            <li class="navigation-header">
                                <span>{{ __($menu->navheader) }}</span>
                                <i data-feather="more-horizontal"></i>
                            </li>
                        @else
                            {{-- Add Custom Class with nav-item --}}
                            @php
                                $custom_classes = '';
                                if (isset($menu->classlist)) {
                                    $custom_classes = $menu->classlist;
                                }
                            @endphp
                            <li class="nav-item {{ $custom_classes }} {{ Route::currentRouteName() === $menu->slug ? 'active' : '' }}"
                                style="margin: 5px 0">
                                <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0)' }}"
                                    class="d-flex align-items-center"
                                    target="{{ isset($menu->newTab) ? '_blank' : '_self' }}">
                                    <i data-feather="{{ $menu->icon }}"></i>
                                    <span class="menu-title text-truncate">{{ __($menu->name) }}</span>
                                    @if (isset($menu->badge))
                                        <?php $badgeClasses = 'badge rounded-pill badge-light-primary ms-auto me-1'; ?>
                                        <span
                                            class="{{ isset($menu->badgeClass) ? $menu->badgeClass : $badgeClasses }}">{{ $menu->badge }}</span>
                                    @endif
                                </a>
                                @if (isset($menu->submenu))
                                    @include('panels/submenu', ['menu' => $menu->submenu])
                                @endif
                            </li>
                        @endif
                    @endif
                @endforeach
            @endif
            {{-- Foreach menu item ends --}}
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
