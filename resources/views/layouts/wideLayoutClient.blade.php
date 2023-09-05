@isset($pageConfigs)
    {!! Helper::updatePageConfig($pageConfigs) !!}
@endisset


@php
    $id = 1;
    $info = Illuminate\Support\Facades\DB::table('institute_info')->first();
    $getLocale = \Illuminate\Support\Facades\App::getLocale();
@endphp

<!DOCTYPE html>
@php $configData = Helper::applClasses(); @endphp

<html class="loading light"
    lang="@if (session()->has('locale')) {{ session()->get('locale') }}@else{{ $configData['defaultLanguage'] }} @endif">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')
        - {{ $getLocale == 'bn' ? 'টেক্সটাইল ইনস্টিটিউট, দিনাজপুর' : __($info->institute_name) }}</title>
    <meta name="description" content="{{ __($info->meta_desc) }}">
    <meta name="keywords" content="{{ $info->meta_keywords }}">
    <meta name="author" content="Codebumble Inc.">
    <meta name="generator" content="Codebumble Inc.">
    <!-- Primary Meta Tags -->
    <meta name="title"
        content="@yield('title') - {{ $getLocale == 'bn' ? 'টেক্সটাইল ইনস্টিটিউট, দিনাজপুর' : __($info->institute_name) }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('home') }}">
    <meta property="og:title"
        content="@yield('title') - {{ $getLocale == 'bn' ? 'টেক্সটাইল ইনস্টিটিউট, দিনাজপুর' : __($info->institute_name) }}">
    <meta property="og:description" content="{{ __($info->meta_desc) }}">
    <meta property="og:image" content="{{ asset('/images/meta/' . $info->meta_og_image) }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ route('home') }}">
    <meta property="twitter:title"
        content="@yield('title') - {{ $getLocale == 'bn' ? 'টেক্সটাইল ইনস্টিটিউট, দিনাজপুর' : __($info->institute_name) }}">
    <meta property="twitter:description" content="{{ __($info->meta_desc) }}">
    <meta property="twitter:image" content="{{ asset('/images/meta/' . $info->meta_og_image) }}">

    {{-- Links --}}
    <link rel="apple-touch-icon"
        href="{{ !Illuminate\Support\Facades\File::exists('images/institute/' . $info->favicon) ? '' : 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('images/institute/' . $info->favicon))) }}">
    <link rel="shortcut icon" type="image/x-icon"
        href="{{ !Illuminate\Support\Facades\File::exists('images/institute/' . $info->favicon) ? '' : 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('images/institute/' . $info->favicon))) }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- <link href="https://fonts.googleapis.com/css2?family=Tiro+Bangla&display=swap" rel="stylesheet"> --}}


    {{-- <style>
        .book {
            --color: rgb(251 191 36);
            --duration: 6.8s;
            width: 32px;
            height: 12px;
            position: relative;
            margin: 32px 0 0 0;
            zoom: 1.5;
        }

        .book .inner {
            width: 32px;
            height: 12px;
            position: relative;
            transform-origin: 2px 2px;
            transform: rotateZ(-90deg);
            animation: book var(--duration) ease infinite;
        }

        .book .inner .left,
        .book .inner .right {
            width: 60px;
            height: 4px;
            top: 0;
            border-radius: 2px;
            background: var(--color);
            position: absolute;
        }

        .book .inner .left:before,
        .book .inner .right:before {
            content: '';
            width: 48px;
            height: 4px;
            border-radius: 2px;
            background: inherit;
            position: absolute;
            top: -10px;
            left: 6px;
        }

        .book .inner .left {
            right: 28px;
            transform-origin: 58px 2px;
            transform: rotateZ(90deg);
            animation: left var(--duration) ease infinite;
        }

        .book .inner .right {
            left: 28px;
            transform-origin: 2px 2px;
            transform: rotateZ(-90deg);
            animation: right var(--duration) ease infinite;
        }

        .book .inner .middle {
            width: 32px;
            height: 12px;
            border: 4px solid var(--color);
            border-top: 0;
            border-radius: 0 0 9px 9px;
            transform: translateY(2px);
        }

        .book ul {
            margin: 0;
            padding: 0;
            list-style: none;
            position: absolute;
            left: 50%;
            top: 0;
        }

        .book ul li {
            height: 4px;
            border-radius: 2px;
            transform-origin: 100% 2px;
            width: 48px;
            right: 0;
            top: -10px;
            position: absolute;
            background: var(--color);
            transform: rotateZ(0deg) translateX(-18px);
            animation-duration: var(--duration);
            animation-timing-function: ease;
            animation-iteration-count: infinite;
        }

        .book ul li:nth-child(0) {
            animation-name: page-0;
        }

        .book ul li:nth-child(1) {
            animation-name: page-1;
        }

        .book ul li:nth-child(2) {
            animation-name: page-2;
        }

        .book ul li:nth-child(3) {
            animation-name: page-3;
        }

        .book ul li:nth-child(4) {
            animation-name: page-4;
        }

        .book ul li:nth-child(5) {
            animation-name: page-5;
        }

        .book ul li:nth-child(6) {
            animation-name: page-6;
        }

        .book ul li:nth-child(7) {
            animation-name: page-7;
        }

        .book ul li:nth-child(8) {
            animation-name: page-8;
        }

        .book ul li:nth-child(9) {
            animation-name: page-9;
        }

        @keyframes page-0 {
            4% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            13%,
            54% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            63% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes page-1 {
            5.86% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            14.74%,
            55.86% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            64.74% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes page-2 {
            7.72% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            16.48%,
            57.72% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            66.48% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes page-3 {
            9.58% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            18.22%,
            59.58% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            68.22% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes page-4 {
            11.44% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            19.96%,
            61.44% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            69.96% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes page-5 {
            13.3% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            21.7%,
            63.3% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            71.7% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes page-6 {
            15.16% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            23.44%,
            65.16% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            73.44% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes page-7 {
            17.02% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            25.18%,
            67.02% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            75.18% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes page-8 {
            18.88% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            26.92%,
            68.88% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            76.92% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes page-9 {
            20.74% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            28.66%,
            70.74% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            78.66% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes left {
            4% {
                transform: rotateZ(90deg);
            }

            10%,
            40% {
                transform: rotateZ(0deg);
            }

            46%,
            54% {
                transform: rotateZ(90deg);
            }

            60%,
            90% {
                transform: rotateZ(0deg);
            }

            96% {
                transform: rotateZ(90deg);
            }
        }

        @keyframes right {
            4% {
                transform: rotateZ(-90deg);
            }

            10%,
            40% {
                transform: rotateZ(0deg);
            }

            46%,
            54% {
                transform: rotateZ(-90deg);
            }

            60%,
            90% {
                transform: rotateZ(0deg);
            }

            96% {
                transform: rotateZ(-90deg);
            }
        }

        @keyframes book {
            4% {
                transform: rotateZ(-90deg);
            }

            10%,
            40% {
                transform: rotateZ(0deg);
                transform-origin: 2px 2px;
            }

            40.01%,
            59.99% {
                transform-origin: 30px 2px;
            }

            46%,
            54% {
                transform: rotateZ(90deg);
            }

            60%,
            90% {
                transform: rotateZ(0deg);
                transform-origin: 2px 2px;
            }

            96% {
                transform: rotateZ(-90deg);
            }
        }

        .preloader {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgb(241 245 249);
            opacity: 1;
            transition: opacity 0.5s ease;
            overflow: hidden;
            flex-direction: column;
            position: fixed;
            width: 100vw;
            z-index: 11111;
        }
    </style> --}}

    {{-- Include core + vendor Styles --}}
    @include('panels/stylesClient')


    <script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "EducationalOrganization",
        "name": "Textile Institute Dinajpur",
        "description": "{{ __($info->meta_desc) }}",
        "url": "https://dtec.edu.bd",
        "foundingDate": "1926-01-01",
        "location": {
            "@type": "Place",
            "address": {
                "@type": "PostalAddress",
                "addressLocality": "Dinajpur",
                "addressCountry": "Bangladesh"
            }
        },
        "logo": "{{asset('images/institute/' . $info->logo)}}",
        "sameAs": [
            "https://www.facebook.com/TextileInstituteDinajpur",
            "https://twitter.com/TextileDinajpur"
        ]
    }
    </script>

</head>

<body class="blank-page bg-slate-100 overflow-x-hidden" data-col="blank-page" data-asset-path="{{ asset('/') }}">

    {{-- <div class="preloader" id="preloader">
        <div class="book">
            <div class="inner">
                <div class="left"></div>
                <div class="middle"></div>
                <div class="right"></div>
            </div>
            <ul>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
        <h2 class="text-2xl text-amber-400 mt-8">{{ env('APP_NAME') }}</h2>
    </div> --}}

    @include('components.header')


    <main>
        <div class="container">
            <div class="grid grid-cols-1">
                @yield('main-content')
            </div>
        </div>
    </main>


    <x-footer name="{{ $info->institute_name }}" address="{{ $info->address }}" phone="{{ $info->phone }}" />
    <!-- End: Content-->


    {{-- Scroll to top --}}
    {{-- <button class="btn btn-primary btn-icon scroll-top" type="button" style="display: none"><i --}}
    {{-- data-feather="arrow-up"></i></button> --}}

    {{-- include default scripts --}}
    @include('panels/scriptsClient')


    {{-- <script type="text/javascript">
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script> --}}

</body>

</html>
