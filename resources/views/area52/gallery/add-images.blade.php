@extends('layouts/contentLayoutMaster')

@section('title', 'Add Album & Gallery Items')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">

@endsection

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
                        <a class="nav-link" href="{{ route('albums-view') }}">
                            <i data-feather="plus" class="font-medium-3 me-50"></i>
                            <span class="fw-bold">Create Album</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('add-images') }}">
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
            <h4 class="card-title">Add Images to Album</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('add-images') }}" method="POST"
                  enctype="multipart/form-data" class="gallery-repeater">
                @csrf
                <div class="row d-flex align-items-end">
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="album_id">Select Album</label>
                            <select name="album_id" id="album_id" class="form-select">
                                <option disabled selected>Select Album</option>
                                @foreach($albums as $album)
                                    <option value="{{ $album->id }}">{{ $album->name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                </div>
                <hr/>
                <div data-repeater-list="gallery">
                    <div data-repeater-item>
                        <div class="row d-flex align-items-center justify-content-center">
                            <div class="col-md-5 col-12">
                                <label for="image" class="form-label">Select Image</label>
                                <input type="file" class="form-control" name="image" id="image"/>
                            </div>
                            <div class="col-md-5 col-12">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title"
                                       placeholder="We're at the top of the world" id="title"/>
                            </div>
                            <div class="col-md-2 col-12 d-flex flex-column">
                                <label class="form-label">Delete</label>
                                <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete
                                        type="button">
                                    <i data-feather="x" class="me-25"></i>
                                    <span>Delete</span>
                                </button>
                            </div>
                        </div>
                        <hr>
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

