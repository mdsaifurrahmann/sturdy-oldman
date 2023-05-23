@extends('layouts/contentLayoutMaster')

@section('title', $retrieve->album_name)

@section('content')

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show p-1" role="alert">
            <strong>Success!</strong> {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex align-items-center mb-2">
        <h3 class="mb-0 me-2">{{ $retrieve->album_name }}</h3>
        <ul class="nav nav-pills mb-0 bg-white px-1 rounded-2 shadow" style="padding-top:0.5rem; padding-bottom: 0.5rem;">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('albums-view') }}">
                    <i data-feather="plus" class="font-medium-3 me-50"></i>
                    <span class="fw-bold">Create Album</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('add-images') }}">
                    <i data-feather="plus" class="font-medium-3 me-50"></i>
                    <span class="fw-bold">Add Images to Album</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('album-list') }}">
                    <i data-feather="list" class="font-medium-3 me-50"></i>
                    <span class="fw-bold">View Album</span>
                </a>
            </li>

        </ul>
    </div>


    <div class="row d-flex">

        @if (empty($images))
            <div class="text-center mt-2">
                <h3 class="text-2xl text-gray-600">{{ __('No Image found!') }}</h3>
            </div>
        @else
            @foreach ($images as $key => $image)
                <div class="col-md-4 col-12">
                    <div class="card">
                        <img src="{{ asset('images/gallery/' . $image->image) }}" alt="{{ $image->title }}"
                            class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $image->title }}</h5>

                            <form action="{{ route('delete-album-image', [$retrieve->album_id, $image->image]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>

                            </form>

                            {{--                        <a href="{{route('delete-album-image',[$retrieve->album_id, $image->image])}}" --}}
                            {{--                           class="btn btn-danger">Delete</a> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

@stop
