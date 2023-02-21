@extends('layouts.fullLayoutClient')

@section('title', __('Former Principals'))
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
            {{ __('List of Former Principals:') }}
        </h2>



        @if ($principals->count() <= 0)
            <div class="text-center">
                <h3 class="text-2xl text-gray-600">{{ __('No data found!') }}</h3>
            </div>
        @else
            <div class="mt-4 overflow-auto">

                {{-- list of former principals with table --}}
                <table>
                    <thead>
                        <tr>
                            <th>{{ __('Serial') }}</th>
                            <th class="px-16">{{ __('Name') }}</th>
                            <th>{{ __('Designation') }}</th>
                            <th class="px-8">{{ __('Duration') }}</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($principals as $key => $principal)
                            <tr>
                                <th>{{ $key + 1 }}</th>
                                <td class="capitalize">{{ $principal->name }}</td>
                                <td class="capitalize">{{ $principal->designation }}</td>
                                <td>{{ $principal->from }} to {{ $principal->to }}</td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>


            </div>

        @endif

    </div>




@stop


@section('vendor-script')

@stop

@section('page-script')

@stop
