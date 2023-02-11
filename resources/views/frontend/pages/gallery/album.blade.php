@extends('layouts.wideLayoutClient')

@section('title', __('Album'))
@section('ins-name', 'Dinajpur Textile Institute')
@section('description', 'Dinajpur Textile Institute')
@section('keywords', 'Dinajpur Textile Institute')
{{-- @section('og-img', 'Layout Blank') --}}

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
                <x-album action="{{route('album','album-1')}}"
                         image="{{asset(mix('images/profile/post-media/2.jpg'))}}" title="Album 1"
                         date="{{Date('Y')}}"
                         time="{{Date('H')}}"/>
            </div>


        </div>

    </section>

@stop


@section('vendor-script')

@stop

@section('page-script')

@stop
