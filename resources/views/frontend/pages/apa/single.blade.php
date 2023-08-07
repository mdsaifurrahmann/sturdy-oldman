@extends('layouts.fullLayoutClient')

@section('title', __($apa->title))

@section('page-style')

    <link rel="stylesheet" href="{{ asset(mix('css/client/infrastructure.css')) }}">

@stop

@section('main-content')

    <div class="card text-gray-800 {{ \Illuminate\Support\Facades\App::getLocale() == 'bn' ? 'font-solaimanlipi' : '' }}">
        <h2 class="font-semibold text-2xl mb-2">
            {{ __($apa->title) }}
        </h2>
        <div class="flex flex-row gap-4">
            <span class="inline text-gray-400 folder">{{ __($apa->category_name) }}</span>
            <span class="inline text-gray-400 date">{{ __($apa->date) }}</span>
            <span class="inline text-gray-400 time">{{ __($apa->time) }}</span>
        </div>


        <div class="mt-4 overflow-auto">

            <x-detail detail="{{ __($apa->desc) }}">

                @foreach ($attachments as $file)
                    <x-attachment action="{{ route('apa-download', $file) }}">{{ substr($file, 31) }}</x-attachment>
                @endforeach

            </x-detail>

        </div>

    </div>

@stop


@section('vendor-script')

@stop

@section('page-script')

@stop
