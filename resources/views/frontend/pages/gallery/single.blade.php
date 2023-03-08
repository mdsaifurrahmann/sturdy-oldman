@extends('layouts.wideLayoutClient')

@section('title', __($retrieve->name))
@section('page-style')

    <link rel="stylesheet" href="{{ asset(mix('css/client/gallery.css')) }}">
@stop

@section('main-content')

    <div class="card text-gray-800 {{\Illuminate\Support\Facades\App::getLocale() == 'bn' ? 'font-solaimanlipi' : ''}}">
        <h2 class="font-semibold text-2xl mb-2">
            {{ __($retrieve->name) }}
        </h2>
        <div class="flex flex-row gap-4">
            <span class="inline text-gray-400 date">{{ substr($retrieve->created_at, 0, 10)  }}</span>
            <span class="inline text-gray-400 time">{{substr($retrieve->created_at, 12)}}</span>
        </div>


        @if(empty($images))

            <h3 class="mt-2 text-center font-bold text-xl text-gray-700">{{__("No Image Found")}}</h3>

        @endif

        <div class="mt-4 overflow-hidden">

            <div id="animated-thumbnails" class="gallery lg:grid-cols-6 md:grid-cols-3 sm:grid-cols-2 grid-cols-1">

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
