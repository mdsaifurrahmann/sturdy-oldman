@php
    
    $news = \Illuminate\Support\Facades\DB::table('notices')
        ->join('notice_categories', 'notices.category_id', '=', 'notice_categories.id')
        ->where('notice_categories.name', 'news')
        ->select('notices.*')
        ->latest('created_at')
        ->take(3)
        ->get();
    
    app()->setLocale('bn');
@endphp

<header>
    <div class="container">
        <div class="logo-area">
            <div class="joyonti">
                @if (Illuminate\Support\Facades\File::exists('images/institute/' . $info->image_left))
                    <img src="{{ Illuminate\Support\Facades\File::exists('images/institute/' . $info->image_left) ? 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('images/institute/' . $info->image_left))) : '' }}"
                        alt="{{ $info->image_left }}">
                @endif
            </div>
            <div class="logo">
                @if (Illuminate\Support\Facades\File::exists('images/institute/' . $info->logo))
                    <img src="{{ Illuminate\Support\Facades\File::exists('images/institute/' . $info->logo) ? 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('images/institute/' . $info->logo))) : '' }}"
                        alt="{{ __($info->institute_name) }}">
                @endif
            </div>
            <div class="mujib-borsho">
                @if (Illuminate\Support\Facades\File::exists('images/institute/' . $info->image_right))
                    <img src="{{ Illuminate\Support\Facades\File::exists('images/institute/' . $info->image_right) ? 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('images/institute/' . $info->image_right))) : '' }}"
                        alt="{{ $info->image_right }}">
                @endif
            </div>
        </div>
    </div>
    <nav
        class="bg-amber-400 main-menu {{ \Illuminate\Support\Facades\App::getLocale() == 'bn' ? 'font-solaimanlipi' : '' }}">

        {{-- hamburger menu --}}
        <div class="container xm:hidden flex justify-between p-4 bg-amber-400 border-b border-amber-500">
            <div>
                <span class="font-semibold text-gray-800">{{ __($info->institute_name) }}</span>
            </div>

            <div>
                <i class="fa-solid fa-bars text-lg text-gray-800" id="burger"></i>
            </div>
        </div>


        <ul class="xm:!flex gap-1 items-center justify-center w-full sm:w-9/12 mx-auto xm:w-auto overflow-hidden xm:overflow-visible"
            style="display:none" id="main-menu">
            <li class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
                <a href="{{ route('home') }}" class="menu-link">
                    {{ __('Home') }}
                </a>
            </li>
            <li
                class="menu-item has__child {{ request()->routeIs('former-principals') || request()->routeIs('former-employees') || request()->routeIs('faculty') || request()->routeIs('apa.dynamic', 'sccc') ? 'active' : '' }}">
                <a href="#" class="menu-link">{{ __('Administration') }}</a>
                <ul class="layer__2">
                    <li class="menu-item"><a href="{{ route('former-principals') }}"
                            class="menu-link">{{ __('Former Principals') }}</a>
                    </li>
                    <li class="menu-item"><a href="{{ route('faculty') }}" class="menu-link">{{ __('Officers') }}</a>
                    </li>
                    <li class="menu-item"><a href="{{ route('employees') }}"
                            class="menu-link">{{ __('Employees') }}</a>
                    </li>
                    <li class="menu-item"><a href="{{ route('former-employees') }}"
                            class="menu-link">{{ __('Former Officers and Employees') }}</a>
                    </li>
                    <li class="menu-item"><a href="{{ route('apa.dynamic', 'sccc') }}"
                            class="menu-link">{{ __('Citizen Charter') }}</a>
                    </li>
                </ul>
            </li>
            <li
                class="menu-item has__child {{ request()->routeIs('infrastructure') || request()->routeIs('history') || request()->routeIs('principal') ? 'active' : '' }}">
                <a href="#" class="menu-link">{{ __('About Us') }}</a>

                <ul class="layer__2">
                    <li class="menu-item"><a href="{{ route('history') }}" class="menu-link">{{ __('History') }}</a>
                    </li>
                    <li class="menu-item"><a href="{{ route('principal') }}"
                            class="menu-link">{{ __('Principal') }}</a>
                    </li>
                    <li class="menu-item"><a href="{{ route('infrastructure') }}"
                            class="menu-link">{{ __('Infrastructure') }}</a>
                    </li>
                </ul>

            </li>
            <li class="menu-item {{ request()->routeIs('gallery') ? 'active' : '' }}"><a href="{{ route('gallery') }}"
                    class="menu-link">{{ __('Gallery') }}</a>
            </li>
            <li class="menu-item {{ request()->routeIs('notices') ? 'active' : '' }}"><a href="{{ route('notices') }}"
                    class="menu-link">{{ __('Notices') }}</a>
            </li>
            <li class="menu-item {{ request()->routeIs('admission') ? 'active' : '' }}"><a
                    href="{{ route('admission') }}" class="menu-link">{{ __('Admission') }}</a>
            </li>
            <li class="menu-item {{ request()->routeIs('stipend') ? 'active' : '' }}"><a href="{{ route('stipend') }}"
                    class="menu-link">{{ __('Stipend') }}</a>
            </li>
            <li class="menu-item {{ request()->routeIs('jobs') ? 'active' : '' }}"><a href="{{ route('jobs') }}"
                    class="menu-link">{{ __('Job Corner') }}</a>
            </li>
            <li class="menu-item {{ request()->routeIs('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}"
                    class="menu-link">{{ __('Contact Us') }}</a>
            </li>
            <li class="menu-item"><a href="https://database.dtec.edu.bd/student-form" target="_blank"
                    class="menu-link">{{ __('Student Database') }}</a>
            </li>
        </ul>
    </nav>


    <div class="flex news">
        <div>

            @foreach ($news as $item)
                <p class="inline-block news-item font-solaimanlipi">
                    <a href="{{ route('notice-details', [$item->id, $item->title]) }}">
                        {{ __($item->title) }}
                    </a>
                </p>
            @endforeach


        </div>
    </div>
</header>
