@extends('layouts.fullLayoutClient')

@section('title', __('Ex-Officers and Employees'))

@section('page-style')

    <link rel="stylesheet" href="{{ asset(mix('css/client/infrastructure.css')) }}">

@stop

@section('main-content')

    <!-- page title -->

    <div
        class="card text-center text-gray-800 {{\Illuminate\Support\Facades\App::getLocale() == 'bn' ? 'font-solaimanlipi' : ''}}">
        <h2 class="font-semibold text-2xl text-center underline decoration-gray-800 underline-offset-4">
            {{ __('List of Ex-Officers and Employees') }}
        </h2>


        <div class="mt-4 overflow-auto">


            @if ($employees->count() <= 0)
                <div class="text-center mt-2">
                    <h3 class="text-2xl text-gray-600">{{ __('No data found!') }}</h3>
                </div>
            @else
                {{-- list of former principals with table --}}
                <table class="">
                    <thead>
                    <tr>
                        <th>{{ __('Serial') }}</th>
                        <th class="px-16">{{ __('Name') }}</th>
                        <th>{{ __('Designation') }}</th>
                        <th class="px-8">{{ __('Duration') }}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($employees as $key => $employee)
                        <tr>
                            <th>{{ $key + 1 }}</th>
                            <td class="capitalize">{{ $employee->name }}</td>
                            <td class="capitalize">{{ $employee->designation }}</td>
                            <td>{{ $employee->from }} to {{ $employee->to }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            @endif


        </div>

    </div>

@stop


@section('vendor-script')

@stop

@section('page-script')

@stop
