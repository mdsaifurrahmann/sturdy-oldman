@extends('layouts.fullLayoutClient')

@section('title', __('History'))

@section('page-style')


@stop

@section('main-content')

    <!-- page title -->

    <div
        class="card text-center text-gray-800 {{ \Illuminate\Support\Facades\App::getLocale() == 'bn' ? 'font-solaimanlipi' : '' }}">
        <h2 class="font-semibold text-2xl text-center underline decoration-gray-800 underline-offset-4">
            {{ __($history->title) }}
        </h2>


        <div class="mt-4">
            @if (Illuminate\Support\Facades\File::exists('images/institute/' . $history->image))
                <img src="{{ Illuminate\Support\Facades\File::exists('images/institute/' . $history->image) ? 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('images/institute/' . $history->image))) : '' }}"
                    alt="front-view" class="rounded">
            @endif
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
