@extends('layouts.fullLayoutClient')

@section('title', __($notice->title))
@section('page-style')

    <link rel="stylesheet" href="{{ asset(mix('css/client/infrastructure.css')) }}">

@stop

@section('main-content')

    <div class="card text-gray-800 {{ \Illuminate\Support\Facades\App::getLocale() == 'bn' ? 'font-solaimanlipi' : '' }}">
        <h2 class="font-semibold text-2xl mb-2">
            {{ __($notice->title) }}
        </h2>
        <div class="flex flex-row gap-4">
            <span class="inline text-gray-400 folder">{{ __($notice->category_name) }}</span>
            <span class="inline text-gray-400 date">{{ strtr($notice->date, __('numbers')) }}</span>
            <span class="inline text-gray-400 time">{{ strtr($notice->time, __('numbers')) }}</span>
        </div>


        <div class="mt-4 overflow-auto">

            <x-detail detail="{{ __($notice->desc) }}">

                @foreach ($attachments as $file)
                    <x-attachment action="{{ route('notice-download', $file) }}">{{ substr($file, 34) }}</x-attachment>
                @endforeach

            </x-detail>

        </div>

    </div>

@stop


@section('vendor-script')

@stop

@section('page-script')

@stop
