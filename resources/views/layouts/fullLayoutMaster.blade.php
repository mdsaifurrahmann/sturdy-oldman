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

<html class="loading {{ $configData['theme'] === 'light' ? '' : $configData['layoutTheme'] }}"
    lang="@if (session()->has('locale')) {{ session()->get('locale') }}@else{{ $configData['defaultLanguage'] }} @endif"
    data-textdirection="{{ env('MIX_CONTENT_DIRECTION') === 'rtl' ? 'rtl' : 'ltr' }}"
    @if ($configData['theme'] === 'dark') data-layout="dark-layout" @endif>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
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


    <link rel="apple-touch-icon" href="{{ asset('images/ico/favicon-32x32.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/ico/favicon-32x32.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    {{-- Include core + vendor Styles --}}
    @include('panels/styles')

    {{-- Include core + vendor Styles --}}
    @include('panels/styles')
</head>



<body
    class="vertical-layout vertical-menu-modern {{ $configData['bodyClass'] }} {{ $configData['theme'] === 'dark' ? 'dark-layout' : '' }} {{ $configData['blankPageClass'] }} blank-page"
    data-menu="vertical-menu-modern" data-col="blank-page" data-framework="laravel"
    data-asset-path="{{ asset('/') }}">

    <!-- BEGIN: Content-->
    <div class="app-content content {{ $configData['pageClass'] }}">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>

        <div class="content-wrapper">
            <div class="content-body">

                {{-- Include Startkit Content --}}
                @yield('content')

            </div>
        </div>
    </div>
    <!-- End: Content-->

    {{-- include default scripts --}}
    @include('panels/scripts')

    <script type="text/javascript">
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>

</body>

</html>
