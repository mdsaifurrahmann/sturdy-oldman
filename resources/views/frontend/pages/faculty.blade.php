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
            {{ __('List of Officers and Employees') }}
        </h2>


        <div class="mt-4 overflow-auto">

            @if ($retrieve->count() <= 0)
                <div class="text-center mt-2">
                    <h3 class="text-2xl text-gray-600">{{ __('No data found!') }}</h3>
                </div>
            @else
                {{-- list of faculty members with table --}}
                <table class=" border-collapse border border-gray-300">
                    <tbody>

                        @foreach ($retrieve as $single)
                            <tr class="border border-gray-300">
                                <td>
                                    <div class="block xl:flex w-full items-center">
                                        <div class="pr-2">
                                            <img src="{{ !Illuminate\Support\Facades\File::exists('images/faculty/' . $single->image) ? '' : 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('images/faculty/' . $single->image))) }}"
                                                alt="{{ $single->name }}"
                                                class="w-28 h-28 xl:h-24 object-cover block mx-auto mb-2 xl:mb-auto rounded-full">
                                        </div>
                                        <div class="block xl:flex w-full">

                                            <div class="w-full xl:w-2/4 flex">
                                                <div class="w-2/5 heading">
                                                    <div class="!border-r-0 !xl:border-r">{{ __('Name') }}</div>
                                                    <div class="!border-r-0 !xl:border-r !border-y-0">
                                                        {{ __('Designation') }}</div>
                                                    <div class="!border-r-0 !xl:border-r border-b-0 !xl:border-b">
                                                        {{ __('Technology') }}
                                                    </div>
                                                </div>
                                                <div class="w-3/5 values">
                                                    <div class="!border-r !xl:border-r-0">{{ $single->name }}</div>
                                                    <div class="!border-r !xl:border-r-0 !border-y-0 capitalize">
                                                        {{ __($single->designation) }}</div>
                                                    <div
                                                        class="!border-r !xl:border-r-0 border-b-0 !xl:border-b text-ellipsis whitespace-nowrap overflow-hidden">
                                                        {{ __($single->technology) }}</div>
                                                </div>
                                            </div>
                                            <div class="w-full xl:w-2/4 flex">
                                                <div class="w-2/5 heading">
                                                    <div class="!border-r-0">{{ __('Email') }}</div>
                                                    <div class="!border-r-0 !border-y-0">{{ __('Mobile') }}</div>
                                                    <div class="!border-r-0 ">{{ __('Phone') }}</div>
                                                </div>
                                                <div class="w-3/5 values">
                                                    <div class="text-ellipsis whitespace-nowrap overflow-hidden">
                                                        {{ __($single->email) }}</div>
                                                    <div class="!border-y-0">{{ __($single->mobile) }}</div>
                                                    @if (!empty($single->phone))
                                                        <div class="">{{ __($single->phone) }}</div>
                                                    @else
                                                        <div class="">{{ __('Unavailable') }}</div>
                                                    @endif
                                                </div>
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
