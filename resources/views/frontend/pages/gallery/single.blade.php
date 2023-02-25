@extends('layouts.wideLayoutClient')

@section('title', __($retrieve->album_name))
@section('page-style')

    <link rel="stylesheet" href="{{ asset(mix('css/client/gallery.css')) }}">
@stop

@section('main-content')

    <div class="card text-gray-800">
        <h2 class="font-semibold text-2xl mb-2">
            {{ __($retrieve->album_name) }}
        </h2>
        <div class="flex flex-row gap-4">
            <span class="inline text-gray-400 date">{{ substr($retrieve->album_created_at, 0, 10)  }}</span>
            <span class="inline text-gray-400 time">{{substr($retrieve->album_created_at, 12)}}</span>
        </div>


        <div class="mt-4 overflow-hidden">

            <div id="animated-thumbnails" class="gallery grid-cols-6">

                @foreach($images as $image)
                    <a href="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/gallery/'.$image->image))) }}"
                       data-lg-size="3840-2160">
                        <img alt="{{ $image->title }}"
                             src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/gallery/'.$image->image))) }}"/>
                    </a>
                @endforeach


            </div>


        </div>

    </div>

@stop


@section('vendor-script')

@stop

@section('page-script')
    <script src="{{asset(mix('js/client/gallery.js'))}}"></script>
@stop
