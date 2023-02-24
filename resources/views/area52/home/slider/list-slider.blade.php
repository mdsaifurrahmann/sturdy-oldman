@extends('layouts/contentLayoutMaster')

@section('title', 'Slider')

@section('content')

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show p-1" role="alert">
            <strong>Success!</strong> {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <!-- User Pills -->
                <ul class="nav nav-pills mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('slider') }}">
                            <i data-feather="plus" class="font-medium-3 me-50"></i>
                            <span class="fw-bold">Add Slider</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('slider-list') }}">
                            <i data-feather="list" class="font-medium-3 me-50"></i>
                            <span class="fw-bold">All Sliders</span>
                        </a>
                    </li>

                </ul>
            </div>

            <h4 class="card-title">Add Slider</h4>
        </div>
        <div class="card-body">
            <div>
                @foreach ($sliders as $key => $slide)
                    <div class="row d-flex align-items-center">
                        <div class="col-md-3 col-12">
                            <div class="mb-1">
                                <img src="{{ asset('/images/slider/' . $slide->image) }}" alt="{{ $slide->title }}"
                                     width="120" height="70" style="object-fit: cover; border-radius: 6px">
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="mb-1">
                                <input type="text" class="form-control disable" aria-describedby="sliderTitle" readonly
                                       value="{{ $slide->title }}"/>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="mb-1">
                                <input type="text" class="form-control disable" aria-describedby="sliderDesc" readonly
                                       value="{{ $slide->desc }}"/>
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="mb-1">

                                <form action="{{ route('slider-delete', $key) }}" method="POST">
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
                    <hr>
                @endforeach
            </div>
        </div>
    </div>

@stop
