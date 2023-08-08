@if ($configData['mainLayoutType'] === 'horizontal' && isset($configData['mainLayoutType']))
    <nav
        class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center {{ $configData['navbarColor'] }}"
        data-nav="brand-center">
        <div class="navbar-header d-xl-block d-none">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="navbar-brand" href="{{ url('/') }}">
            <span class="brand-logo">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                   viewBox="0 0 47.45 47.45" height="38">
                            <defs>
                                <linearGradient id="linear-gradient" x1="11.02" y1="11.1" x2="18.08" y2="15.18"
                                                gradientUnits="userSpaceOnUse">
                                    <stop offset="0" stop-color="#7367f0"/>
                                    <stop offset="1" stop-color="#8f85f3"/>
                                </linearGradient>
                                <linearGradient id="New_Gradient_Swatch_1" x1="29.41" y1="11.1" x2="36.44" y2="15.15"
                                                xlink:href="#linear-gradient"/>
                                <linearGradient id="New_Gradient_Swatch_1-2" x1="11.62" y1="27.69" x2="28.99" y2="37.72"
                                                xlink:href="#linear-gradient"/>
                                <linearGradient id="linear-gradient-2" x1="31.63" y1="7.91" x2="47.45" y2="7.91"
                                                xlink:href="#linear-gradient"/>
                                <linearGradient id="linear-gradient-3" x1="0" y1="7.91" x2="15.82" y2="7.91"
                                                xlink:href="#linear-gradient"/>
                                <linearGradient id="linear-gradient-4" x1="31.63" y1="39.54" x2="47.45" y2="39.54"
                                                xlink:href="#linear-gradient"/>
                                <linearGradient id="linear-gradient-5" x1="0" y1="39.54" x2="15.82" y2="39.54"
                                                xlink:href="#linear-gradient"/>
                            </defs>
                            <g id="Layer_2" data-name="Layer 2">
                                <g id="Layer_1-2" data-name="Layer 1">
                                    <path d="M10.47,13.12a4.06,4.06,0,1,1,4.06,4.06A4.05,4.05,0,0,1,10.47,13.12Z"
                                          style="fill:url(#linear-gradient)"/>
                                    <path d="M37,13.12a4.06,4.06,0,1,1-4.06-4A4.06,4.06,0,0,1,37,13.12Z"
                                          style="fill:url(#New_Gradient_Swatch_1)"/>
                                    <path
                                        d="M27.44,37.58C21.5,40.77,14.78,33.81,12.35,28A2,2,0,1,1,16,26.46c1.82,4.37,4.89,5.18,12.12,6.54C28.09,33,34.1,34,27.44,37.58Z"
                                        style="fill:url(#New_Gradient_Swatch_1-2)"/>
                                    <path
                                        d="M45.47,15.82a2,2,0,0,1-2-2V5.93a2,2,0,0,0-2-2H33.61a2,2,0,1,1,0-3.95h7.91a5.94,5.94,0,0,1,5.93,5.93v7.91A2,2,0,0,1,45.47,15.82Z"
                                        style="fill:url(#linear-gradient-2)"/>
                                    <path
                                        d="M2,15.82a2,2,0,0,1-2-2V5.93A5.94,5.94,0,0,1,5.93,0h7.91a2,2,0,1,1,0,4H5.93a2,2,0,0,0-2,2v7.91A2,2,0,0,1,2,15.82Z"
                                        style="fill:url(#linear-gradient-3)"/>
                                    <path
                                        d="M41.52,47.45H33.61a2,2,0,1,1,0-4h7.91a2,2,0,0,0,2-2V33.61a2,2,0,1,1,4,0v7.91A5.94,5.94,0,0,1,41.52,47.45Z"
                                        style="fill:url(#linear-gradient-4)"/>
                                    <path
                                        d="M13.84,47.45H5.93A5.94,5.94,0,0,1,0,41.52V33.61a2,2,0,1,1,4,0v7.91a2,2,0,0,0,2,2h7.91a2,2,0,1,1,0,4Z"
                                        style="fill:url(#linear-gradient-5)"/>
                                </g>
                            </g>
                        </svg>
            </span>
                        <h2 class="brand-text mb-0">Prodigy</h2>
                    </a>
                </li>
            </ul>
        </div>
        @else
            <nav
                class="header-navbar navbar navbar-expand-lg align-items-center {{ $configData['navbarClass'] }} navbar-light navbar-shadow {{ $configData['navbarColor'] }} {{ $configData['layoutWidth'] === 'boxed' && $configData['verticalMenuNavbarType'] === 'navbar-floating' ? 'container-xxl' : '' }}">
                @endif
                <div class="navbar-container d-flex content">
                    <div class="bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav d-xl-none">
                            <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i
                                        class="ficon"
                                        data-feather="menu"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li class="nav-item d-none d-lg-block">
                                {{--                                <a class="nav-link nav-link-style">--}}
                                {{--                                    <i class="ficon"--}}
                                {{--                                       data-feather="{{ $configData['theme'] === 'dark' ? 'sun' : 'moon' }}"></i>--}}
                                {{--                                </a>--}}

                                <!-- welcome -->
                                Welcome back, {{ Auth::user()->name }}! <span style="font-size: 24px">👋</span>

                            </li>
                        </ul>
                    </div>
                    <ul class="nav navbar-nav align-items-center ms-auto">
                        <li class="nav-item dropdown dropdown-user">
                            <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user"
                               href="javascript:void(0);"
                               data-bs-toggle="dropdown" aria-haspopup="true">
                                <div class="user-nav d-sm-flex d-none">
                                      <span class="user-name fw-bolder">
                                          @if (Auth::check())
                                              {{ Auth::user()->name }}
                                          @else
                                              John Doe
                                          @endif
                                      </span>
                                    <span class="user-status">Online</span>
                                </div>
                                <span class="avatar">
                                    <img class="round"
                                         src="{{ Auth::user()->profile_photo_url ? Auth::user()->profile_photo_url : asset(mix('images/portrait/small/avatar-s-11.jpg')) }}"
                                         alt="avatar" height="40" width="40">
                                    <span class="avatar-status-online"></span>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                                <h6 class="dropdown-header">Manage Profile</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item"
                                   href="{{ Route::has('profile.show') ? route('profile.show') : 'javascript:void(0)' }}">
                                    <i class="me-50" data-feather="user"></i> Update Profile
                                </a>

                                <a class="dropdown-item"
                                   href="{{ Route::has('profile.show') ? route('profile.show') : 'javascript:void(0)' }}">
                                    <i class="me-50" data-feather="key"></i> Change Password
                                </a>


                                @if (Auth::check())
                                    <a class="dropdown-item"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="me-50" data-feather="power"></i> Logout
                                    </a>
                                    <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                        @csrf
                                    </form>
                                @endif
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
