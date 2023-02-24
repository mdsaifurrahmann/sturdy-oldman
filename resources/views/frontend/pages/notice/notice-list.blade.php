@extends('layouts.fullLayoutClient')

@section('title', __('Notice List'))

@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/client/infrastructure.css')) }}">
@stop

@section('main-content')

    <div class="card text-center text-gray-800">
        <h2 class="font-semibold text-2xl text-center underline decoration-gray-800 underline-offset-4">
            {{ __('Notice Board:') }}
        </h2>

        <div class="mt-4 overflow-auto">

            <x-down-table>
                @foreach($notice as $item)
                    <x-down-raw title="{{__($item->title)}}" date="{{$item->time}}, {{$item->date}}"
                                action="{{route('notice-details', [$item->id, $item->title])}}"/>
                @endforeach


            </x-down-table>
            {{$notice->links('vendor.pagination.custom')}}


        </div>

    </div>

@stop


@section('vendor-script')

@stop

@section('page-script')

@stop
