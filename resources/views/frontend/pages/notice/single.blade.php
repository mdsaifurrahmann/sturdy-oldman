@extends('layouts.fullLayoutClient')

@section('title', __($notice->title))
@section('ins-name', 'Dinajpur Textile Institute')
@section('description', 'Dinajpur Textile Institute')
@section('keywords', 'Dinajpur Textile Institute')
{{-- @section('og-img', 'Layout Blank') --}}

@section('page-style')

    <link rel="stylesheet" href="{{ asset(mix('css/client/infrastructure.css')) }}">

@stop

@section('main-content')

    <div class="card text-gray-800">
        <h2 class="font-semibold text-2xl mb-2">
            {{ __($notice->title) }}
        </h2>
        <div class="flex flex-row gap-4">
            <span class="inline text-gray-400 date">{{ __($notice->date) }}</span>
            <span class="inline text-gray-400 time">{{__($notice->time)}}</span>
        </div>


        <div class="mt-4 overflow-auto">

            <x-detail detail="{{__($notice->desc)}}">

                @foreach($attachments as $file)
                    <x-attachment action="{{route('notice-download', $file)}}">{{substr($file, 34)}}</x-attachment>
                @endforeach

            </x-detail>

        </div>

    </div>

@stop


@section('vendor-script')

@stop

@section('page-script')

@stop
