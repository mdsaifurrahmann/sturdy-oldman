@extends('layouts.fullLayoutClient')

@section('title', __('Principal'))
{{-- @section('og-img', 'Layout Blank') --}}

@section('page-style')


@stop

@section('main-content')

    <!-- page title -->

    <div
        class="card text-center text-gray-800 {{\Illuminate\Support\Facades\App::getLocale() == 'bn' ? 'font-solaimanlipi' : ''}}">
        <h2 class="font-semibold text-2xl text-center underline decoration-gray-800 underline-offset-4">
            {{ __('Our Honorable Principal') }}
        </h2>


        <div class="mt-4">
            <img
                src="{{ !Illuminate\Support\Facades\File::exists('images/principal/' . $principal->pi) ? "" : "data:image/png;base64,". base64_encode(file_get_contents(public_path('images/principal/' . $principal->pi))) }}"
                alt="front-view" class="rounded w-full h-[400px] object-cover block mx-auto">
            <p class="my-4 text-justify indent-4">
                {{ __($principal->description) }}
            </p>


            <p class="text-left block text-gray-600">
                <strong><i>{{ __($principal->principal_name) }}</i></strong>
                <i class="block">{{ __($principal->qop) }}</i>
                <i class="block">{{ __($principal->position) }}</i>
                <i class="block">{{ __($principal->institute) }}</i>
            </p>
        </div>

    </div>

@stop


@section('vendor-script')

@stop

@section('page-script')

@stop
