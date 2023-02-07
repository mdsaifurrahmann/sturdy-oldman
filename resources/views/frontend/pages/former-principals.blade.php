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
                    <tr>
                        <th>1</th>
                        <td>Dr. Md. Abdul Mannan</td>
                        <td>Principal</td>
                        <td>01.01.2019 to 31.12.2020</td>
                    </tr>
                    <tr>
                        <th>2</th>
                        <td>Dr. Md. Abdul Mannan</td>
                        <td>Principal</td>
                        <td>01.01.2019 to 31.12.2020</td>
                    </tr>
                    <tr>
                        <th>3</th>
                        <td>Dr. Md. Abdul Mannan</td>
                        <td>Principal</td>
                        <td>01.01.2019 to 31.12.2020</td>
                    </tr>
                    <tr>
                        <th>4</th>
                        <td>Dr. Md. Abdul Mannan</td>
                        <td>Principal</td>
                        <td>01.01.2019 to 31.12.2020</td>
                    </tr>
                    <tr>
                        <th>5</th>
                        <td>Dr. Md. Abdul Mannan</td>
                        <td>Principal</td>
                        <td>01.01.2019 to 31.12.2020</td>
                    </tr>
                    <tr>
                        <th>6</th>
                        <td>Dr. Md. Abdul Mannan</td>
                        <td>Principal</td>
                        <td>01.01.2019 to 31.12.2020</td>
                    </tr>
                    <tr>
                        <th>7</th>
                        <td>Dr. Md. Abdul Mannan</td>
                        <td>Principal</td>
                        <td>01.01.2020 to Present </td>
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
