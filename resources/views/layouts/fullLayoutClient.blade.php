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
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')
        - {{$getLocale == 'bn' ? 'টেক্সটাইল ইনস্টিটিউট, দিনাজপুর'  : __($info->institute_name)}}</title>
    <meta name="description" content="{{__($info->meta_desc)}}">
    <meta name="keywords" content="{{$info->meta_keywords}}">
    <meta name="author" content="Codebumble Inc.">
    <meta name="generator" content="Codebumble Inc.">
    <!-- Primary Meta Tags -->
    <meta name="title"
          content="@yield('title') - {{$getLocale == 'bn' ? 'টেক্সটাইল ইনস্টিটিউট, দিনাজপুর'  : __($info->institute_name)}}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ env('APP_URL') }}">
    <meta property="og:title"
          content="@yield('title') - {{$getLocale == 'bn' ? 'টেক্সটাইল ইনস্টিটিউট, দিনাজপুর'  : __($info->institute_name)}}">
    <meta property="og:description" content="{{__($info->meta_desc)}}">
    <meta property="og:image" content="{{'/images/meta/'.$info->meta_og_image}}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ env('APP_URL') }}">
    <meta property="twitter:title"
          content="@yield('title') - {{$getLocale == 'bn' ? 'টেক্সটাইল ইনস্টিটিউট, দিনাজপুর'  : __($info->institute_name)}}">
    <meta property="twitter:description" content="{{__($info->meta_desc)}}">
    <meta property="twitter:image" content="{{'/images/meta/'.$info->meta_og_image}}">

    {{-- Links --}}
    <link rel="apple-touch-icon"
          href="{{ !Illuminate\Support\Facades\File::exists('images/institute/'. $info->favicon) ? "" : "data:image/png;base64," . base64_encode(file_get_contents(public_path('images/institute/'. $info->favicon))) }}">
    <link rel="shortcut icon" type="image/x-icon"
          href="{{ !Illuminate\Support\Facades\File::exists("images/institute/'. $info->favicon") ? "" : "data:image/png;base64,". base64_encode(file_get_contents(public_path('images/institute/'. $info->favicon))) }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tiro+Bangla&display=swap" rel="stylesheet">

    {{-- Include core + vendor Styles --}}
    @include('panels/stylesClient')

    {{-- Include core + vendor Styles --}}
    @include('panels/stylesClient')
</head>

<body class="blank-page bg-slate-100 overflow-x-hidden" data-col="blank-page" data-asset-path="{{ asset('/') }}">


@include('components.header')

<main>
    <div class="container">
        <div class="grid grid-cols-1 lg:grid-cols-4 lg:gap-6">

            <div class="col-span-3">

                @yield('main-content')

            </div> {{-- End of main content --}

                {{-- Aside/Left bar --}}
            {{--            <x-aside/>--}}
            @include('components.aside')
        </div>
    </div>
</main>


<x-footer name="{{__($info->institute_name)}}" address="{{__($info->address)}}" phone="{{__($info->phone)}}"/>
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
