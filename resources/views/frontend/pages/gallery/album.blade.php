@extends('layouts.wideLayoutClient')

@section('title', __('Album'))

@section('page-style')

    <link rel="stylesheet" href="{{ asset(mix('css/client/album.css')) }}">

@stop

@section('main-content')

    <!-- page title -->

    <section class="card text-center text-gray-800 mb-2">
        <h2 class="font-semibold text-2xl text-center underline decoration-gray-800 underline-offset-4">
            {{ __('Photo Album') }}
        </h2>


        <div class="my-4">

            <!-- album list -->
            <div class="grid grid-cols-3 gap-6">

                @foreach($albums as $album)
                    <x-album action="{{route('album',[$album->id, $album->name])}}"
                             image="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/album_covers/'.$album->cover_image))) }}"
                             title="{{$album->name}}"
                             desc="{{__($album->description)}}"
                             date="{{$album->created_at}}"
                    />
                @endforeach

            </div>


        </div>

    </section>

@stop


@section('vendor-script')

@stop

@section('page-script')

@stop
