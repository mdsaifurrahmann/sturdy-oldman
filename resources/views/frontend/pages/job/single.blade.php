@extends('layouts.fullLayoutClient')

@section('title', __($name))
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
            {{ __($name) }}
        </h2>
        <div class="flex flex-row gap-4">
            <span class="inline text-gray-400 date">{{Date('d-M-Y')}}</span>
            <span class="inline text-gray-400 time">{{Date('h:i:s A')}}</span>
        </div>


        <div class="mt-4 overflow-auto">

            <x-detail detail="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam beatae, consequatur et, id
                incidunt maiores mollitia nisi nobis quaerat quia reiciendis, repellat temporibus ut vitae voluptate
                voluptatibus! Asperiores, consequuntur?">

                <x-attachment action="{{route('admission-details','name')}}">Download Notice.Pdf</x-attachment>
                <x-attachment action="{{route('admission-details','name')}}">Download Notice.Pdf</x-attachment>
                <x-attachment action="{{route('admission-details','name')}}">Download Notice.Pdf</x-attachment>
                <x-attachment action="{{route('admission-details','name')}}">Download Notice.Pdf</x-attachment>
                <x-attachment action="{{route('admission-details','name')}}">Download Notice.Pdf</x-attachment>

            </x-detail>

        </div>

    </div>

@stop


@section('vendor-script')

@stop

@section('page-script')

@stop
