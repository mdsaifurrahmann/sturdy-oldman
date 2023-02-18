@extends('layouts/contentLayoutMaster')

@section('title', 'Machinery')
@section('ins-name', 'Dinajpur Textile Institute')
@section('description', 'Dinajpur Textile Institute')
@section('keywords', 'Dinajpur Textile Institute')

@section('content')

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show p-1" role="alert">
            <strong>Success!</strong> {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show p-1" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <div class="card">
        <div class="card-header">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <h4 class="card-title">Machinery</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('machine') }}" method="POST" class="machine-repeater" enctype="multipart/form-data">
                @csrf


                <div class="row d-flex align-items-end">
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="description">Description</label>
                            <textarea type="text" class="form-control" id="description" aria-describedby="description"
                                placeholder="Ex: Welcome to DTI" name="description">{{ $machinery->description }}</textarea>
                        </div>
                    </div>
                </div>

                <hr />
                <div data-repeater-list="machine">
                    <div data-repeater-item>
                        <div class="row d-flex align-items-end">
                            <div class="col-md-10 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="name">Machinery Items</label>
                                    <input type="text" class="form-control" id="name" aria-describedby="name"
                                        placeholder="Ex: Welcome to DTI" name="name" />
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

                        <button class="btn btn-primary" type="submit"> Submit </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="card">
        <div class="card-header">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <h4 class="card-title">List of Machinery</h4>
            </div>
        </div>
        <div class="card-body">

            @foreach ($list as $key => $item)
                <div class="row d-flex align-items-center">

                    <div class="col-md-10 col-12">
                        <div class="mb-1">
                            <input type="text" class="form-control disable" aria-describedby="sliderTitle" readonly
                                value="{{ $item }}" />
                        </div>
                    </div>
                    <div class="col-md-2 col-12">
                        <div class="mb-1">

                            <form action="{{ route('machine-delete', $key) }}" method="POST">
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
    <!-- vendor files -->
    <script src="{{ asset(mix('vendors/js/forms/repeater/jquery.repeater.min.js')) }}"></script>
@stop
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/forms/form-repeater.js')) }}"></script>
@stop
