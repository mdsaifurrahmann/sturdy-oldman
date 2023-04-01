@extends('layouts/contentLayoutMaster')

@section('title', 'Slider')

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


    <div class="card">
        <div class="card-header">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <!-- User Pills -->
                <ul class="nav nav-pills mb-2">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('slider') }}">
                            <i data-feather="plus" class="font-medium-3 me-50"></i>
                            <span class="fw-bold">Add Slider</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('slider-list') }}">
                            <i data-feather="list" class="font-medium-3 me-50"></i>
                            <span class="fw-bold">All Sliders</span>
                        </a>
                    </li>

                </ul>
            </div>

            <h4 class="card-title">Update Slider</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('slider-store') }}" method="POST" class="slider-repeater" enctype="multipart/form-data">
                @csrf
                <div data-repeater-list="slider">
                    <div data-repeater-item>
                        <div class="row d-flex align-items-end">
                            <div class="col-md-3 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="sliderImage">Select Image</label>
                                    <input type="file" class="form-control" id="sliderImage"
                                        aria-describedby="sliderImage" name="image" />
                                </div>
                            </div>

                            <div class="col-md-3 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="sliderTitle">Slider Title</label>
                                    <input type="text" class="form-control" id="sliderTitle"
                                        aria-describedby="sliderTitle" placeholder="Ex: Welcome to DTI" name="title" />
                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="sliderDesc">Slider Description</label>
                                    <input type="text" class="form-control" id="sliderDesc" aria-describedby="sliderDesc"
                                        placeholder="Ex: We're at the top of the world" name="desc" />
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <div class="mb-1">
                                    <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete
                                        type="button">
                                        <i data-feather="x" class="me-25"></i>
                                        <span>Delete</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <hr />
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-icon btn-primary me-50" type="button" data-repeater-create>
                            <i data-feather="plus" class="me-25"></i>
                            <span>Add New</span>
                        </button>

                        <button class="btn btn-primary" type="submit"> Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop


@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('vendors/js/forms/repeater/jquery.repeater.min.js')) }}"></script>
@stop
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/forms/form-repeater.js')) }}"></script>
@stop
