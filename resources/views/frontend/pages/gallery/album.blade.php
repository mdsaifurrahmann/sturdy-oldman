@extends('layouts.wideLayoutClient')

@section('title', __('Album'))

@section('page-style')

    <link rel="stylesheet" href="{{ asset(mix('css/client/album.css')) }}">

@stop

@section('main-content')

    <!-- page title -->

    <section
        class="card text-center text-gray-800 mb-2 {{ \Illuminate\Support\Facades\App::getLocale() == 'bn' ? 'font-solaimanlipi' : '' }}">
        <h2 class="font-semibold text-2xl text-center underline decoration-gray-800 underline-offset-4">
            {{ __('Photo Album') }}
        </h2>


        <div class="my-4">

            @if (count($albums) == 0)
                <h3 class="mt-2 text-center font-bold text-xl text-gray-700">{{ __('No Album Found') }}</h3>
            @endif

            <!-- album list -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 grid-cols-1 gap-6">

                @foreach ($albums as $album)
                    <a href="{{ route('album', [$album->id, $album->name]) }}">
                        <div class="item ">
                            <div class="image ">
                                <img src="{{ Illuminate\Support\Facades\File::exists('images/album_covers/' . $album->cover_image) ? 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('images/album_covers/' . $album->cover_image))) : '' }}"
                                    alt="{{ $album->name }}">
                            </div>
                            <h3 class="title">
                                {{ $album->name }}
                            </h3>
                            <p class="text-left pb-3 px-6">
                                {{ __($album->description) }}
                            </p>
                            <div class="times">
                                <span>{{ strtr($album->created_at, __('numbers')) }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>


        </div>

    </section>

@stop


@section('vendor-script')

@stop

@section('page-script')

@stop
