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
                        <a class="nav-link active" href="{{ route('albums-view') }}">
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

            <h4 class="card-title">Create Album</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('create-albums') }}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                <div data-repeater-list="slider">
                    <div data-repeater-item>
                        <div class="row d-flex align-items-end">

                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="album_name">Album Name</label>
                                    <input type="text" class="form-control" id="album_name"
                                           aria-describedby="album_name"
                                           placeholder="DTI Students at the top of the world"
                                           name="album_name"/>
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="album_cover">Select Album Cover Image</label>
                                    <input type="file" class="form-control" id="album_cover"
                                           aria-describedby="album_cover" name="album_cover"/>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="album_description">Album Description</label>
                                    <textarea type="text" class="form-control" id="album_description"
                                              aria-describedby="album_description"
                                              placeholder="Ex: We're at the top of the world"
                                              name="album_description"></textarea>
                                </div>
                            </div>
                        </div>
                        <hr/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit"> Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="card">
        <div class="card-header">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <h4 class="card-title">List of Albums</h4>
            </div>
        </div>
        <div class="card-body">

            @if($albums->count() == 0)
                <div class="text-center fw-bold p-1">
                    <strong>Sorry!</strong> No Albums Found

                </div>
            @endif
            @foreach ($albums as $key => $album)
                <div class="row d-flex align-items-center">
                    <div class="col-md-2 col-12">
                        <div class="mb-1">
                            <img src="{{ asset('/images/album_covers/' . $album->cover_image) }}"
                                 alt="{{ $album->name }}"
                                 width="120" height="70" style="object-fit: cover; border-radius: 6px">
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="mb-1">
                            <input type="text" class="form-control disable" aria-describedby="sliderTitle" readonly
                                   value="{{ $album->name }}"/>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="mb-1">
                            <input type="text" class="form-control disable" aria-describedby="sliderDesc" readonly
                                   value="{{ $album->description }}"/>
                        </div>
                    </div>
                    <div class="col-md-2 col-12">
                        <div class="mb-1">

                            <form action="{{route('delete-albums', $album->id)}}" method="POST">
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

@stop

@section('vendor-script')
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@stop
@section('page-script')
    <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
@stop
