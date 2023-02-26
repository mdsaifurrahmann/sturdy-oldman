@extends('layouts/fullLayoutClient')

@section('title', __('Home'))

@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/client/home.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/swiper.min.css')) }}">

@stop

@section('main-content')

    {{-- swiper slider --}}
    <div class="swiper main__slider h-[500px] rounded-lg">
        <div class="swiper-wrapper">
            <!-- Slides -->


            @if ($sliders)
                @foreach ($sliders as $key => $slide)
                    <div class="swiper-slide">
                        <img
                            src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/slider/' . $slide->image))) }}"
                            alt="{{ $slide->title }}" class="object-cover w-full h-[inherit]">

                        <div class="absolute bottom-0 top-[22rem] w-full bg-black bg-opacity-30"></div>
                        <div class="absolute top-[22rem]">
                            <div class="p-8">
                                <h1 class="text-xl font-bold text-white">{{ __($slide->title) }}</h1>
                                <p class="text-base text-white">{{ $slide->desc }}</p>
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
        <h4 class="card__title">{{__("Latest Notices:")}}</h4>
        <ul class="flex flex-col justify-center gap-3 md:px-4 arrow">

            @foreach($notices as $notice)
                <li class="notice-item">
                    <a href="{{route('notice-details', [$notice->id, $notice->title])}}">
                        {{ __($notice->title) }}
                    </a>
                </li>
            @endforeach


        </ul>

        <a href="{{ route('notices') }}" class="btn bg-amber-400 self-end mt-6 text-sm">{{__("View All Notices")}}</a>
    </div>

    {{-- APA --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <x-apa.apa-grid title="বার্ষিক কর্মসম্পাদন চুক্তি"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/apa/apa.png'))) }}">
            <x-apa.apa-item action="{{route('apa-gct')}}">এপিএ নির্দেশিকা/পরিপত্র/এপিএ টিম</x-apa.apa-item>
            <x-apa.apa-item action="{{route('apc')}}">বার্ষিক কর্মসম্পাদন চুক্তিসমূহ</x-apa.apa-item>
            <x-apa.apa-item action="{{route('mer')}}">পরিবীক্ষণ ও মূল্যায়ন প্রতিবেদন</x-apa.apa-item>
            <x-apa.apa-item action="{{route('mssl')}}">এপিএ এমএস সফটওয়্যার লিংক</x-apa.apa-item>
        </x-apa.apa-grid>

        <x-apa.apa-grid title="সেবা প্রদান প্রতিশ্রুতি (সিটিজেনস চার্টার)"
                        src="data:image/svg+xml;base64,{{ base64_encode(file_get_contents(public_path('images/apa/citizen.svg'))) }}">
            <x-apa.apa-item action="{{route('sccc')}}">সেবা প্রদান প্রতিশ্রুতি (সিটিজেনস চার্টার)</x-apa.apa-item>
            <x-apa.apa-item action="{{route('fpo')}}">ফোকাল পয়েন্ট কর্মকর্তা/পরিবীক্ষণ কমিটি</x-apa.apa-item>
            <x-apa.apa-item action="{{route('qamer')}}">ত্রৈমাসিক/বার্ষিক পরিবীক্ষণ/মূল্যায়ন প্রতিবেদন</x-apa.apa-item>
            <x-apa.apa-item action="{{route('laws')}}">আইন/বিধি/নীতিমালা/পরিপত্র/নির্দেশিকা/প্রজ্ঞাপন</x-apa.apa-item>
        </x-apa.apa-grid>

        <x-apa.apa-grid title="জাতীয় শুদ্ধাচার কৌশল"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/apa/nis.png'))) }}">
            <x-apa.apa-item action="{{route('nps')}}">জাতীয় শুদ্ধাচার কৌশল</x-apa.apa-item>
            <x-apa.apa-item action="{{route('committees')}}">কমিটিসমূহ</x-apa.apa-item>
            <x-apa.apa-item action="{{route('schedule')}}">কর্মপরিকল্পনা</x-apa.apa-item>
            <x-apa.apa-item action="{{route('reports')}}">প্রতিবেদনসমূহ</x-apa.apa-item>
        </x-apa.apa-grid>

        <x-apa.apa-grid title="উদ্ভাবনী কার্যক্রম"
                        src="data:image/svg+xml;base64,{{ base64_encode(file_get_contents(public_path('images/apa/idea.svg'))) }}">
            <x-apa.apa-item action="{{route('compendiums')}}">প্রজ্ঞাপন/পরিপত্র/নীতিমালা/সংকলন</x-apa.apa-item>
            <x-apa.apa-item action="{{route('innovation-team')}}">ইনোভেশন টিম</x-apa.apa-item>
            <x-apa.apa-item action="{{route('aiap')}}">বার্ষিক উদ্ভাবন কর্মপরিকল্পনা</x-apa.apa-item>
            <x-apa.apa-item action="{{route('innovative-projects')}}">উদ্ভাবনী প্রকল্পসমূহ</x-apa.apa-item>
        </x-apa.apa-grid>

        <x-apa.apa-grid title="তথ্য অধিকার"
                        src="data:image/svg+xml;base64,{{ base64_encode(file_get_contents(public_path('images/apa/info.svg'))) }}">
            <x-apa.apa-item action="{{route('roaa')}}">দায়িত্বপ্রাপ্ত কর্মকর্তা ও আপীল কর্তৃপক্ষ</x-apa.apa-item>
            <x-apa.apa-item action="{{route('appeal-form')}}">আবেদন ও আপিল ফরম</x-apa.apa-item>
            <x-apa.apa-item action="{{route('vdi')}}">স্বপ্রণোদিতভাবে প্রকাশযোগ্য তথ্য</x-apa.apa-item>
            <x-apa.apa-item action="{{route('guidelines')}}">আইন/বিধি/কমিটি/নির্দেশিকা</x-apa.apa-item>
        </x-apa.apa-grid>

        <x-apa.apa-grid title="অভিযোগ প্রতিকার ব্যবস্থাপনা"
                        src="data:image/svg+xml;base64,{{ base64_encode(file_get_contents(public_path('images/apa/flag.svg'))) }}">
            <x-apa.apa-item action="{{route('appellate-officers')}}">অনিক ও আপিল কর্মকর্তাগণ</x-apa.apa-item>
            <x-apa.apa-item action="{{route('cer')}}">মাসিক/ত্রৈমাসিক/বার্ষিক পরিবীক্ষণ/মূল্যায়ন
                প্রতিবেদন
            </x-apa.apa-item>
            <x-apa.apa-item action="{{route('complaint-filing')}}">অভিযোগ দাখিল (অনলাইনে আবেদন)</x-apa.apa-item>
            <x-apa.apa-item action="{{route('complaint-laws')}}">আইন/বিধি/নীতিমালা/পরিপত্র</x-apa.apa-item>
        </x-apa.apa-grid>
    </div>

    {{-- History --}}
    <div class="history card">
        <h4 class="card__title">
            {{__("History")}}:</h4>
        <p>
            {{ substr($history->history, 0, 900) }}
            <a href="{{ route('history') }}" class="text-amber-500 hover:text-amber-600 transition-all font-semibold">
                {{__("Read More...")}}
            </a>
        </p>

    </div>


    <div class="machinery card">
        <h4 class="card__title">
            {{__("Pieces of Machinery:")}}</h4>
        <div>
            <p>
                {{ $machinery->description }}
            </p>
            <h5 class="my-3 font-semibold text-gray-800">{{__("List of Machinery")}}:</h5>
            <ul class="grid grid-cols-1 xs:grid-cols-2 xm:grid-cols-4 gap-3 list-decimal list-inside arrow text-gray-600">
                @foreach ($machinery->items as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>

    </div>


    <div class="message card">
        {{-- <h4 class="card__title">Message From Principal:</h4> --}}
        <div class="grid grid-cols-1 sm:grid-cols-4 gap-6 justify-center items-center">
            <div class="sm:col-span-1 flex justify-center">
                <img
                    src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/principal/' . $principal->pip))) }}"
                    alt="Principle Says" class="rounded-full">
            </div>

            <div class="sm:col-span-3 flex flex-col">
                <p class="quote indent-8">
                    {{ $principal->message }}</p>
                <p class="block mt-2">
                    <strong><i>{{ $principal->principal_name }}</i></strong>
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
    <script src="{{ asset(mix('js/client/home.js')) }}"></script>
@stop
