@extends('layouts/contentLayoutMaster')

@section('title', 'Add Notice')

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
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <!-- User Pills -->
                    <ul class="nav nav-pills mb-2">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('add-notice-form') }}">
                                <i data-feather="plus" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Add Notice</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('notice-list') }}">
                                <i data-feather="list" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">All Notice</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <h4 class="card-title">Add Notice</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('add-notice') }}" method="POST" class="notice-repeater"
                  enctype="multipart/form-data">
                @csrf

                <div class="row d-flex align-items-end">
                    <div class="col-md-3 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="title">Title</label>
                            <input type="text" class="form-control" id="title" aria-describedby="title"
                                   placeholder="Ex: Welcome to DTI" name="title" value="{{ old('title') }}"/>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="fp-default">Date</label>
                            <input type="text" id="fp-default" class="form-control flatpickr-basic"
                                   placeholder="YYYY-MM-DD" name="date" value="{{ old('date') }}"/>
                        </div>
                    </div>
                    <div class="col-md-3 col-12 position-relative">
                        <div class="mb-1">
                            <label class="form-label" for="time">Time</label>
                            <input type="text" id="fp-time" class="form-control flatpickr-time text-start"
                                   placeholder="8:00 AM" name="time" value="{{ old('time') }}"/>
                        </div>
                    </div>
                    <div class="col-md-3 col-12 position-relative">
                        <div class="mb-1">
                            <label class="form-label" for="category">Category</label>
                            <select name="category_id" id="category" class="form-select">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="description">Description</label>
                            <textarea type="text" class="form-control" id="description" aria-describedby="description"
                                      placeholder="Ex: Welcome to DTI" name="desc">{{ old('desc') }}</textarea>
                        </div>
                    </div>
                </div>

                <hr/>
                <div data-repeater-list="notice">
                    <div data-repeater-item>
                        <div class="row d-flex align-items-end">
                            <div class="col-md-10 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="attachment">Attachment</label>
                                    <input type="file" class="form-control" id="attachment" name="attach"/>
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
                        <hr/>
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


    {{-- <div class="card">
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
    </div> --}}

@stop


@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('vendors/js/forms/repeater/jquery.repeater.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@stop
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/forms/form-repeater.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
@stop
