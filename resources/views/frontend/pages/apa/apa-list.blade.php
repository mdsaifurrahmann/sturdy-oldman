@extends('layouts.fullLayoutClient')

@section('title', __($name))

@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/client/infrastructure.css')) }}">
@stop

@section('main-content')

    <div
        class="card text-center text-gray-800 {{\Illuminate\Support\Facades\App::getLocale() == 'bn' ? 'font-solaimanlipi' : ''}}">
        <h2 class="font-semibold text-2xl text-center underline decoration-gray-800 underline-offset-4">
            {{ __($name) }}
        </h2>

        <div class="mt-4 overflow-auto">

            <x-down-table>
                @foreach($data as $item)
                    <x-down-raw title="{{__($item->title)}}" date="{{$item->time}}, {{$item->date}}"
                                action="{{route('apa-single', [$item->id, $item->title])}}"/>
                @endforeach


            </x-down-table>
            {{$data->links('vendor.pagination.custom')}}


        </div>

    </div>

@stop


@section('vendor-script')

@stop

@section('page-script')

@stop
