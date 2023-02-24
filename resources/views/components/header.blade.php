<header>
    <div class="container">
        <div class="logo-area">
            <div class="joyonti">
                <img
                    src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/pages/Home/50.png'))) }}"
                    alt="Joyonti">
            </div>
            <div class="logo">
                <img
                    src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/pages/Home/Logo.png'))) }}"
                    alt="Textile Institute Dinajpur">
            </div>
            <div class="mujib-borsho">
                <img
                    src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/pages/Home/M100.png'))) }}"
                    alt="Mujib Borsho">
            </div>
        </div>
    </div>
    <nav class="bg-amber-400 main-menu">

        {{-- hamburger menu --}}
        <div class="container xm:hidden flex justify-between p-4 bg-amber-400 border-b border-amber-500">
            <div>
                <span class="font-semibold text-gray-800">Dinajpur Textile Institute</span>
            </div>

            <div>
                <i class="fa-solid fa-bars text-lg text-gray-800" id="burger"></i>
            </div>
        </div>


        <ul class="xm:!flex gap-1 items-center justify-center w-full sm:w-9/12 mx-auto xm:w-auto overflow-hidden xm:overflow-visible"
            style="display:none" id="main-menu">
            <li class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}"><a href="{{ route('home') }}"
                                                                                      class="menu-link">Home</a></li>
            <li
                class="menu-item has__child {{ request()->routeIs('former-principals') || request()->routeIs('ex-employees') ? 'active' : '' }}">
                <a href="#" class="menu-link">Administration</a>
                <ul class="layer__2">
                    <li class="menu-item"><a href="{{ route('former-principals') }}" class="menu-link">Former
                            Principals</a></li>
                    <li class="menu-item"><a href="{{ route('ex-employees') }}" class="menu-link">Ex-Officers and
                            Employees</a></li>
                    <li class="menu-item"><a href="{{route('sccc')}}" class="menu-link">Citizen Charter</a></li>
                </ul>
            </li>
            <li
                class="menu-item has__child {{ request()->routeIs('infrastructure') || request()->routeIs('history') || request()->routeIs('principal') ? 'active' : '' }}">
                <a href="#" class="menu-link">About Us</a>

                <ul class="layer__2">
                    <li class="menu-item"><a href="{{ route('history') }}" class="menu-link">History</a></li>
                    <li class="menu-item"><a href="{{ route('principal') }}" class="menu-link">Principal</a></li>
                    <li class="menu-item"><a href="{{ route('infrastructure') }}" class="menu-link">Infrastructure</a>
                    </li>
                </ul>

            </li>
            <li class="menu-item {{ request()->routeIs('gallery') ? 'active' : '' }}"><a href="{{ route('gallery') }}"
                                                                                         class="menu-link">Gallery</a>
            </li>
            <li class="menu-item {{ request()->routeIs('notices') ? 'active' : '' }}"><a
                    href="{{ route('notices') }}" class="menu-link">Notices</a>
            </li>
            <li class="menu-item {{ request()->routeIs('admission') ? 'active' : '' }}"><a
                    href="{{ route('admission') }}" class="menu-link">Admission</a>
            </li>
            <li class="menu-item {{ request()->routeIs('stipend') ? 'active' : '' }}"><a href="{{ route('stipend') }}"
                                                                                         class="menu-link">Stipend</a>
            </li>
            <li class="menu-item {{ request()->routeIs('jobs') ? 'active' : '' }}"><a href="{{ route('jobs') }}"
                                                                                      class="menu-link">Job Corner</a>
            </li>
            <li class="menu-item {{ request()->routeIs('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}"
                                                                                         class="menu-link">Contact
                    Us</a>
            </li>
            <li class="menu-item"><a href="#" class="menu-link">Student Database</a></li>
        </ul>
    </nav>


    <div class="flex news">
        <div>
            <p class="inline-block news-item"><a href="">যেহেতু মানব অধিকারের প্রতি অবজ্ঞা এবং ঘৃণার ফলে
                    মানুবের
                    বিবেক লাঞ্ছিত বোধ করে এমন সব বর্বরোচিত</a></p>
            <p class="inline-block news-item"><a href="">যেহেতু মানব অধিকারের প্রতি অবজ্ঞা এবং ঘৃণার ফলে
                    মানুবের
                    বিবেক লাঞ্ছিত বোধ করে এমন সব বর্বরোচিত</a></p>
        </div>

    </div>
</header>
