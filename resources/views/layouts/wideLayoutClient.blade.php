@isset($pageConfigs)
{!! Helper::updatePageConfig($pageConfigs) !!}
@endisset

    <!DOCTYPE html>
@php $configData = Helper::applClasses(); @endphp

<html class="loading light"
      lang="@if (session()->has('locale')) {{ session()->get('locale') }}@else{{ $configData['defaultLanguage'] }} @endif">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - @yield('ins-name')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content="Codebumble Inc.">
    <meta name="generator" content="Codebumble Inc.">
    <!-- Primary Meta Tags -->
    <meta name="title" content="@yield('title') - @yield('ins-name')">
    <meta name="description" content="@yield('description')">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ env('APP_URL') }}">
    <meta property="og:title" content="@yield('title') - @yield('ins-name')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:image" content="@yield('og-img')">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ env('APP_URL') }}">
    <meta property="twitter:title" content="@yield('title') - @yield('ins-name')">
    <meta property="twitter:description" content="@yield('description')">
    <meta property="twitter:image" content="@yield('og-img')">

    {{-- Links --}}
    <link rel="apple-touch-icon" href="{{ asset('images/ico/favicon-32x32.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo/favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tiro+Bangla&display=swap" rel="stylesheet">

    {{-- Include core + vendor Styles --}}
    @include('panels/stylesClient')

</head>

<body class="blank-page bg-slate-100 overflow-x-hidden" data-col="blank-page" data-asset-path="{{ asset('/') }}">


{{-- Include Startkit Content --}}
<x-header/>


<main>
    <div class="container">
        <div class="grid grid-cols-1">
            @yield('main-content')
        </div>
    </div>
</main>


<x-footer/>
<!-- End: Content-->


{{-- Scroll to top --}}
{{-- <button class="btn btn-primary btn-icon scroll-top" type="button" style="display: none"><i --}}
{{-- data-feather="arrow-up"></i></button> --}}

{{-- include default scripts --}}
@include('panels/scriptsClient')


<script type="text/javascript">
    $(window).on('load', function () {
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
