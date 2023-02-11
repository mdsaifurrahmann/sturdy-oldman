@extends('layouts.wideLayoutClient')

@section('title', __($name))
@section('ins-name', 'Dinajpur Textile Institute')
@section('description', 'Dinajpur Textile Institute')
@section('keywords', 'Dinajpur Textile Institute')
{{-- @section('og-img', 'Layout Blank') --}}

@section('page-style')

    <link rel="stylesheet" href="{{ asset(mix('css/client/gallery.css')) }}">
@stop

@section('main-content')

    <div class="card text-gray-800">
        <h2 class="font-semibold text-2xl mb-2">
            {{ __($name) }}
        </h2>
        <div class="flex flex-row gap-4">
            <span class="inline text-gray-400 date">{{Date('d-M-Y')}}</span>
            <span class="inline text-gray-400 time">{{Date('h:i:s A')}}</span>
        </div>


        <div class="mt-4 overflow-hidden">

            <div id="animated-thumbnails" class="gallery grid-cols-6">
                <a href="{{asset(mix('images/profile/post-media/2.jpg'))}}" data-lg-size="3840-2160">
                    <img alt="img1" src="{{asset(mix('images/profile/post-media/2.jpg'))}}"/>
                </a>
                <a href="{{asset(mix('images/profile/post-media/25.jpg'))}}" data-lg-size="3840-2160">
                    <img alt="img2" src="{{asset(mix('images/profile/post-media/25.jpg'))}}"/>
                </a>
                <a href="{{asset(mix('images/profile/post-media/25.jpg'))}}">
                    <img alt="img2" src="{{asset(mix('images/profile/post-media/25.jpg'))}}"/>
                </a>
                <a href="{{asset(mix('images/profile/post-media/25.jpg'))}}">
                    <img alt="img2" src="{{asset(mix('images/profile/post-media/25.jpg'))}}"/>
                </a>
                <a href="{{asset(mix('images/profile/post-media/25.jpg'))}}">
                    <img alt="img2" src="{{asset(mix('images/profile/post-media/25.jpg'))}}"/>
                </a>
                <a href="{{asset(mix('images/profile/post-media/25.jpg'))}}">
                    <img alt="img2" src="{{asset(mix('images/profile/post-media/25.jpg'))}}"/>
                </a>
                <a href="{{asset(mix('images/profile/post-media/25.jpg'))}}">
                    <img alt="img2" src="{{asset(mix('images/profile/post-media/25.jpg'))}}"/>
                </a>
            </div>


        </div>

    </div>

@stop


@section('vendor-script')

@stop

@section('page-script')
    <script src="{{asset(mix('js/client/gallery.js'))}}"></script>
@stop
