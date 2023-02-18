@extends('layouts.fullLayoutClient')

@section('title', __('History'))
@section('ins-name', 'Dinajpur Textile Institute')
@section('description', 'Dinajpur Textile Institute')
@section('keywords', 'Dinajpur Textile Institute')
{{-- @section('og-img', 'Layout Blank') --}}

@section('page-style')


@stop

@section('main-content')

    <!-- page title -->

    <div class="card text-center text-gray-800">
        <h2 class="font-semibold text-2xl text-center underline decoration-gray-800 underline-offset-4">
            {{ __($history->title) }}
        </h2>



        <div class="mt-4">
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/institute/' . $history->image))) }}"
                alt="front-view" class="rounded">
            <p class="my-4 text-justify indent-4">
                {{ __($history->history) }}
            </p>
        </div>

    </div>




@stop


@section('vendor-script')

@stop

@section('page-script')

@stop
