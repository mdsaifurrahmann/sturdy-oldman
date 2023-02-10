@extends('layouts.fullLayoutClient')

@section('title', __('Ex-Officers and Employees'))
@section('ins-name', 'Dinajpur Textile Institute')
@section('description', 'Dinajpur Textile Institute')
@section('keywords', 'Dinajpur Textile Institute')
{{-- @section('og-img', 'Layout Blank') --}}

@section('page-style')

    <link rel="stylesheet" href="{{ asset(mix('css/client/infrastructure.css')) }}">

@stop

@section('main-content')

    <!-- page title -->

    <div class="card text-center text-gray-800">
        <h2 class="font-semibold text-2xl text-center underline decoration-gray-800 underline-offset-4">
            {{ __('Notice Board:') }}
        </h2>



        <div class="mt-4 overflow-auto">

            {{-- list of former principals with table --}}
            <table class="!text-left">
                <thead>
                    <tr>
                        <th class="w-3/5 sm:w-3/4">{{ __('Subject') }}</th>
                        <th>{{ __('Date') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="#">Notice about stiept.</a></td>
                        <td>{{Date('h:i:s A, d-M-Y')}}</td>
                    </tr>
                    <tr>
                        <td><a href="#">Notice about stiept.</a></td>
                        <td>{{Date('h:i:s A, d-M-Y')}}</td>
                    </tr>
                    <tr>
                        <td><a href="#">Notice about stiept.</a></td>
                        <td>{{Date('h:i:s A, d-M-Y')}}</td>
                    </tr>
                    <tr>
                        <td><a href="#">Notice about stiept.</a></td>
                        <td>{{Date('h:i:s A, d-M-Y')}}</td>
                    </tr>
                </tbody>
            </table>


        </div>

    </div>




@stop


@section('vendor-script')

@stop

@section('page-script')

@stop
