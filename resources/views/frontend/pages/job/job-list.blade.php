@extends('layouts.fullLayoutClient')

@section('title', __('Job Corner'))

@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/client/infrastructure.css')) }}">
@stop

@section('main-content')

    <div
        class="card text-center text-gray-800 {{ \Illuminate\Support\Facades\App::getLocale() == 'bn' ? 'font-solaimanlipi' : '' }}">
        <h2 class="font-semibold text-2xl text-center underline decoration-gray-800 underline-offset-4">
            {{ __('Job Corner') }}
        </h2>

        <div class="mt-4 overflow-auto">

            @if ($jobs->count() <= 0)
                <div class="text-center mt-2">
                    <h3 class="text-2xl text-gray-600">{{ __('No data found!') }}</h3>
                </div>
            @else
                <x-down-table>
                    @foreach ($jobs as $item)
                        <x-down-raw title="{{ __($item->title) }}"
                            date="{{ strtr($item->time, __('numbers')) }}, {{ strtr($item->date, __('numbers')) }}"
                            action="{{ route('notice-details', [$item->id, $item->title]) }}" />
                    @endforeach
                </x-down-table>
                {{ $jobs->links('vendor.pagination.custom') }}
            @endif

        </div>

    </div>

@stop


@section('vendor-script')

@stop

@section('page-script')

@stop
