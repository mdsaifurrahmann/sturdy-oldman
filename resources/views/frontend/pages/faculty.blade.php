@extends('layouts.fullLayoutClient')

@section('title', __('Officers and Employees'))

@section('page-style')

    <link rel="stylesheet" href="{{ asset(mix('css/client/infrastructure.css')) }}">

@stop

@section('main-content')

    <!-- page title -->

    <div
        class="card text-center text-gray-800 {{ \Illuminate\Support\Facades\App::getLocale() == 'bn' ? 'font-solaimanlipi' : '' }}">
        <h2 class="font-semibold text-2xl text-center underline decoration-gray-800 underline-offset-4">
            {{ __('List of Officers') }}
        </h2>


        <div class="mt-4 overflow-auto">

            @if ($retrieve->count() <= 0)
                <div class="text-center mt-2">
                    <h3 class="text-2xl text-gray-600">{{ __('No data found!') }}</h3>
                </div>
            @else
                {{-- list of faculty members with table --}}
                <table>
                    <tbody>

                        @foreach ($retrieve as $officer)
                            <tr>
                                <td class="border-0">
                                    <div class="grid grid-cols-1 xl:grid-cols-5 items-center justify-center">
                                        <div class="border border-gray-300">
                                            <img src="{{ Illuminate\Support\Facades\File::exists('images/faculty/' . $officer->image) ? 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('images/faculty/' . $officer->image))) : '' }}"
                                                alt="{{ $officer->name }}"
                                                class="w-[100px] p-1 mx-auto h-[100px] object-cover rounded-full">
                                        </div>
                                        <div class="grid col-span-2 grid-cols-2 ">
                                            <div class="grid grid-rows-2 item">
                                                <div class="border border-gray-300 p-1">{{ __('Name') }}</div>
                                                <div class="border border-gray-300 p-1">
                                                    {{ __('Technology') }}</div>
                                                <div class="border border-gray-300 p-1">{{ __('Mobile') }}</div>
                                            </div>
                                            <div class="grid grid-rows-2 item">
                                                <div class="border border-gray-300 p-1 whitespace-nowrap overflow-x-auto">
                                                    {{ __($officer->name) }}</div>
                                                <div class="border border-gray-300 p-1 whitespace-nowrap overflow-x-auto">
                                                    {{ __($officer->technology) }}
                                                </div>
                                                <div class="border border-gray-300 p-1 whitespace-nowrap overflow-x-auto">
                                                    {{ __($officer->mobile) }}</div>
                                            </div>
                                        </div>
                                        <div class="grid col-span-2 grid-cols-2 ">
                                            <div class="grid grid-rows-2 item">
                                                <div class="border border-gray-300 p-1 ">
                                                    {{ __('Designation') }}</div>
                                                <div class="border border-gray-300 p-1 ">
                                                    {{ __('Email') }}</div>
                                                <div class="border border-gray-300 p-1 ">
                                                    {{ __('Phone') }}</div>
                                            </div>
                                            <div class="grid grid-rows-2 item">
                                                <div class="border border-gray-300 p-1 whitespace-nowrap overflow-x-auto">
                                                    {{ __($officer->designation) }}
                                                </div>
                                                <div class="border border-gray-300 p-1 whitespace-nowrap overflow-x-auto">
                                                    {{ __($officer->email) }}</div>
                                                <div class="border border-gray-300 p-1 whitespace-nowrap overflow-x-auto">
                                                    {{ $officer->phone ? __($officer->phone) : __('Unavailable') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                        @endforeach



                    </tbody>
                </table>

                {{ $retrieve->links('vendor.pagination.custom') }}
            @endif


        </div>

    </div>

@stop


@section('vendor-script')

@stop

@section('page-script')

@stop
