@isset($pageConfigs)
{!! Helper::updatePageConfig($pageConfigs) !!}
@endisset

@php
    $id = 1;
    $info = Illuminate\Support\Facades\DB::table('institute_info')->first();
@endphp

    <!DOCTYPE html>
@php
    $configData = Helper::applClasses();
@endphp

<html class="loading {{ $configData['theme'] === 'light' ? '' : $configData['layoutTheme'] }}"
      lang="@if (session()->has('locale')){{ session()->get('locale') }}@else{{ $configData['defaultLanguage'] }}@endif"
      data-textdirection="{{ env('MIX_CONTENT_DIRECTION') === 'rtl' ? 'rtl' : 'ltr' }}"
      @if ($configData['theme'] === 'dark') data-layout="dark-layout" @endif>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{$info->institute_name}}</title>
    <meta name="description" content="{{$info->meta_desc}}">
    <meta name="keywords" content="{{$info->meta_keywords}}">
    <meta name="author" content="Codebumble Inc.">
    <meta name="generator" content="Codebumble Inc.">
    <!-- Primary Meta Tags -->
    <meta name="title" content="@yield('title') - {{$info->institute_name}}">
    <meta name="description" content="@yield('description')">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ env('APP_URL') }}">
    <meta property="og:title" content="@yield('title') - {{$info->institute_name}}">
    <meta property="og:description" content="{{$info->meta_desc}}">
    <meta property="og:image" content="{{'/images/meta/'.$info->meta_og_image}}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ env('APP_URL') }}">
    <meta property="twitter:title" content="@yield('title') - {{$info->institute_name}}">
    <meta property="twitter:description" content="{{$info->meta_desc}}">
    <meta property="twitter:image" content="{{'/images/meta/'.$info->meta_og_image}}">


    <link rel="apple-touch-icon" href="{{ asset('images/ico/favicon-32x32.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/ico/favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
          rel="stylesheet">

    {{-- Include core + vendor Styles --}}
    @include('panels/styles')

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
@isset($configData['mainLayoutType'])
    @extends((( $configData["mainLayoutType"] === 'horizontal') ? 'layouts.horizontalLayoutMaster' :
    'layouts.verticalLayoutMaster' ))
@endisset
