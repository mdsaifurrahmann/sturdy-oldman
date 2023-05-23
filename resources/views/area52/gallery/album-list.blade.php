@extends('layouts/contentLayoutMaster')

@section('title', 'Album List')

@section('content')

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show p-1" role="alert">
            <strong>Success!</strong> {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show p-1" role="alert">
            <strong>Error!</strong> {{ Session::get('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex align-items-center mb-2 flex-wrap">
        <h3 class="mb-2 me-2 col-12">View Albums</h3>
        <ul class="nav nav-pills mb-2 bg-white px-1 rounded-2 shadow col-12"
            style="padding-top:0.5rem; padding-bottom: 0.5rem;">
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
                <a class="nav-link active" href="{{ route('album-list') }}">
                    <i data-feather="list" class="font-medium-3 me-50"></i>
                    <span class="fw-bold">View Album</span>
                </a>
            </li>

        </ul>
    </div>


    <div class="row d-flex">
        @foreach ($albums as $key => $album)
            <div class="col-md-4 col-12">
                <div class="card">
                    <img src="{{ asset('images/album_covers/' . $album->cover_image) }}" alt="{{ $album->name }}"
                        class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $album->name }}</h5>
                        <p class="card-text">{{ $album->description }}</p>

                        <div class="d-flex">
                            <a href="{{ route('album-images', $album->id) }}" class="btn btn-primary me-2">View Album</a>
                            <form action="{{ route('delete-albums', $album->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger text-nowrap px-1" type="submit">
                                    <i data-feather="x" class="me-25"></i>
                                    <span>Delete</span>
                                </button>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        @endforeach
    </div>

@stop
