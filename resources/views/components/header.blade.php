<header>
    <div class="container">
        <div class="logo-area">
            <div class="joyonti">
                <img src="{{ asset(mix('images/pages/Home/50.png')) }}" alt="Joyonti">
            </div>
            <div class="logo">
                <img src="{{ asset(mix('images/pages/Home/Logo.png')) }}" alt="Textile Institute Dinajpur">
            </div>
            <div class="mujib-borsho">
                <img src="{{ asset(mix('images/pages/Home/M100.png')) }}" alt="Mujib Borsho">
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
            <li class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}"><a href="{{route('home')}}"
                                                                 class="menu-link">Home</a></li>
            <li class="menu-item has__child"><a href="#" class="menu-link">Administration</a>
                <ul class="layer__2">
                    <li class="menu-item"><a href="#" class="menu-link">Former principals</a></li>
                    <li class="menu-item"><a href="#" class="menu-link">Ex-Officers and Employees</a></li>
                    <li class="menu-item"><a href="#" class="menu-link">Citizen Charter</a></li>
                </ul>
            </li>
            <li class="menu-item has__child {{ request()->routeIs('infrastructure') ? 'active' : '' }}"><a href="#"
                                                                                               class="menu-link">About Us</a>

                <ul class="layer__2">
                    <li class="menu-item"><a href="#" class="menu-link">History</a></li>
                    <li class="menu-item"><a href="#" class="menu-link">Principle</a></li>
                    <li class="menu-item"><a href="{{route('infrastructure')}}" class="menu-link">Infrastructure</a></li>
                </ul>

            </li>
            <li class="menu-item"><a href="#" class="menu-link">Admission</a></li>
            <li class="menu-item"><a href="#" class="menu-link">Gallery</a></li>
            <li class="menu-item"><a href="#" class="menu-link">Stipend</a></li>
            <li class="menu-item"><a href="#" class="menu-link">Job Corner</a></li>
            <li class="menu-item"><a href="#" class="menu-link">Contact Us</a></li>
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
