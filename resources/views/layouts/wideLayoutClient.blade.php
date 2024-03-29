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

    @include('components.preloader')
    @yield('preloaderStyle')

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

    @yield('preloader')

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

    {{-- include default scripts --}}
    @include('panels/scriptsClient')



</body>

</html>
