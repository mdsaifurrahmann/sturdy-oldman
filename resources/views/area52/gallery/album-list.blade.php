@extends('layouts/contentLayoutMaster')

@section('title', 'Album List')

@section('content')

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show p-1" role="alert">
            <strong>Success!</strong> {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex align-items-center mb-2">
        <h3 class="mb-0 me-2">View Albums</h3>
        <ul class="nav nav-pills mb-0 bg-white px-1 rounded-2 shadow"
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



    @foreach($albums as $key => $album)
        <div class="col-md-4 col-12">
            <div class="card">
                <img src="{{asset('images/album_covers/'.$album->cover_image)}}" alt="{{$album->name}}"
                     class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{$album->name}}</h5>
                    <p class="card-text">{{$album->description}}</p>
                    <a href="{{route('album-images', $album->id)}}" class="btn btn-primary">View Album</a>
                </div>
            </div>
        </div>
    @endforeach

@stop
