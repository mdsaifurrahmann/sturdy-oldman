@extends('layouts/fullLayoutClient')

@section('title', __('Home'))

@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/client/home.css')) }}" async>
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/swiper.min.css')) }}" async>

@stop

@section('main-content')

    {{-- swiper slider --}}
    <div class="swiper main__slider h-[500px] rounded-lg">
        <div class="swiper-wrapper">
            <!-- Slides -->
            @if ($sliders)
                @foreach ($sliders as $key => $slide)
                    <div class="swiper-slide">
                        <img src="{{ !Illuminate\Support\Facades\File::exists('images/slider/' . $slide->image) ? 'data:image/svg+xml;base64,' . base64_encode(file_get_contents(public_path('apa/types/fallback.svg'))) : 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('images/slider/' . $slide->image))) }}"
                            alt="{{ $slide->title }}" class="object-cover w-full h-[inherit]" width="100" height="100">

                        <div class="absolute bottom-0 top-[22rem] w-full bg-black bg-opacity-30"></div>
                        <div class="absolute top-[22rem]">
                            <div class="p-8">
                                <h1
                                    class="text-xl font-bold text-white {{ \Illuminate\Support\Facades\App::getLocale() == 'bn' ? 'font-solaimanlipi' : '' }}">
                                    {{ __($slide->title) }}</h1>
                                <p
                                    class="text-base text-white {{ \Illuminate\Support\Facades\App::getLocale() == 'bn' ? 'font-solaimanlipi' : '' }}">
                                    {{ $slide->desc }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="swiper-slide">
                    <img src="{{ asset('images/institute/front_view.jpg') }}" alt="front_view"
                        class="object-cover w-full h-[inherit]">

                    <div class="absolute bottom-0 top-[22rem] w-full bg-black bg-opacity-30"></div>
                    <div class="absolute top-[22rem]">
                        <div class="p-8">
                            <h1 class="text-xl font-bold text-white">Welcome!</h1>
                            <p class="text-base text-white">Front side of Textile Institute Dinajpur</p>
                        </div>
                    </div>
                </div>
            @endif


        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>


    {{-- Notice Board --}}
    <div class="mb-4 card">
        <h2 class="card__title {{ \Illuminate\Support\Facades\App::getLocale() == 'bn' ? 'font-solaimanlipi' : '' }}">
            {{ __('Latest Notices:') }}</h2>
        <ul class="flex flex-col justify-center gap-3 md:px-4 arrow">

            @foreach ($notices as $notice)
                <li
                    class="notice-item {{ \Illuminate\Support\Facades\App::getLocale() == 'bn' ? 'font-solaimanlipi' : '' }}">
                    <a href="{{ route('notice-details', [$notice->id, $notice->title]) }}">
                        {{ __($notice->title) }}
                    </a>
                </li>
            @endforeach


        </ul>

        <a href="{{ route('notices') }}"
            class="btn bg-amber-400 self-end mt-6 text-sm {{ \Illuminate\Support\Facades\App::getLocale() == 'bn' ? 'font-solaimanlipi' : '' }}">{{ __('View All Notices') }}</a>
    </div>

    {{-- APA --}}
    <div
        class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 {{ \Illuminate\Support\Facades\App::getLocale() == 'bn' ? 'font-solaimanlipi' : '' }}">


        @foreach ($apaTypes as $type)
            <x-apa.apa-grid title="{{ $type->name }}"
                src="data:image/{{ \Illuminate\Support\Facades\File::exists(public_path('apa/types/' . $type->image)) ? (pathinfo($type->image, PATHINFO_EXTENSION) == 'svg' ? 'svg+xml' : 'png') : 'svg+xml' }};base64,{{ \Illuminate\Support\Facades\File::exists(public_path('apa/types/' . $type->image)) ? base64_encode(file_get_contents(public_path('apa/types/' . $type->image))) : base64_encode(file_get_contents(public_path('apa/types/fallback.svg'))) }}">

                @foreach ($apaGrids as $gridItem)
                    @if ($gridItem->type_id == $type->id)
                        <x-apa.apa-item
                            action="{{ route('apa.dynamic', ['routeName' => $gridItem->route_name]) }}">{{ $gridItem->name }}</x-apa.apa-item>
                    @endif
                @endforeach
            </x-apa.apa-grid>
        @endforeach

    </div>

    {{-- History --}}
    <div class="history card {{ \Illuminate\Support\Facades\App::getLocale() == 'bn' ? 'font-solaimanlipi' : '' }}">
        <h2 class="card__title">
            {{ __('History') }}:</h2>
        <p>
            {{ substr($history->history, 0, 900) }}
            <a href="{{ route('history') }}" class="text-amber-500 hover:text-amber-600 transition-all font-semibold">
                {{ __('Read More...') }}
            </a>
        </p>

    </div>


    <div class="machinery card {{ \Illuminate\Support\Facades\App::getLocale() == 'bn' ? 'font-solaimanlipi' : '' }}">
        <h2 class="card__title">
            {{ __('Pieces of Machinery:') }}</h2>
        <div>
            <p>
                {{ $machinery->description }}
            </p>
            <h3 class="my-3 font-semibold text-gray-800">{{ __('List of Machinery') }}:</h3>
            <ul class="grid grid-cols-1 xs:grid-cols-2 xm:grid-cols-4 gap-3 list-decimal list-inside arrow text-gray-600">
                @foreach ($machinery->items as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>

    </div>

    {{-- {{ dd($principal) }} --}}
    <div class="message card {{ \Illuminate\Support\Facades\App::getLocale() == 'bn' ? 'font-solaimanlipi' : '' }}">
        {{-- <h4 class="card__title">Message From Principal:</h4> --}}
        <div class="grid grid-cols-1 sm:grid-cols-4 gap-6 justify-center items-center">
            <div class="sm:col-span-1 flex justify-center">
                <img src="{{ !Illuminate\Support\Facades\File::exists('images/principal/' . $principal->pip) ? 'data:image/svg+xml;base64,' . base64_encode(file_get_contents(public_path('apa/types/fallback.svg'))) : 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('images/principal/' . $principal->pip))) }}"
                    alt="Principle Says" class="rounded-full">
            </div>



            <div class="sm:col-span-3 flex flex-col">
                <p class="quote indent-8">
                    {{ $principal->message }}</p>
                <p class="block mt-2">
                    <strong><i>{{ __($principal->principal_name) }}</i></strong>
                    <i class="block">{{ __($principal->position) }}</i>
                    <i class="block">{{ __($principal->institute) }}</i>
                </p>
            </div>
        </div>

    </div>

@stop


@section('vendor-script')
    <script src="{{ asset(mix('vendors/js/extensions/swiper.min.js')) }}"></script>
@stop

@section('page-script')
    <script src="{{ asset(mix('js/client/home.js')) }}" async></script>
@stop
