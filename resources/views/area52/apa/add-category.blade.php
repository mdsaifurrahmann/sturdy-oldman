@extends('layouts/contentLayoutMaster')

@section('title', 'APA Category')

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
                <!-- User Pills -->
                <ul class="nav nav-pills mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('add-type-view') }}">
                            <i data-feather="plus" class="font-medium-3 me-50"></i>
                            <span class="fw-bold">Add APA Type</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('add-category-view') }}">
                            <i data-feather="plus" class="font-medium-3 me-50"></i>
                            <span class="fw-bold">Add APA Category</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('add-category') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row d-flex align-items-end">
                    <div class="col-md-4 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="cat_name">APA Category Name</label>
                            <input type="text" class="form-control" id="cat_name" aria-describedby="cat_name"
                                placeholder="বার্ষিক কর্মসম্পাদন চুক্তিসমূহ" name="cat_name" value="{{ old('type') }}"
                                required />
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="type_id">APA Type</label>
                            <select name="type_id" id="type_id" class="form-select" required>
                                <option value="">Select APA Type</option>
                                @foreach ($retrieve as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="route_name">Route (dtec.edu.bd/apa/apab)</label>
                            <input type="text" class="form-control" id="route_name" aria-describedby="route_name"
                                placeholder="apab" name="route_name" value="{{ old('type') }}" required />
                        </div>
                    </div>

                    <div class="col-md-1 col-12">
                        <div class="mb-1">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <h4>APA Categories</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="row d-flex align-items-center">
                <div class="col-md-3 col-12">
                    <label class="form-label" for="cat_name">APA Category Name</label>
                </div>
                <div class="col-md-3 col-12">
                    <label class="form-label" for="cat_name">APA Type</label>
                </div>
                <div class="col-md-3 col-12">
                    <label class="form-label" for="cat_name">APA Route</label>
                </div>
            </div>
            @if ($categories->count() > 0)
                @foreach ($categories as $item)
                    <div class="row d-flex align-items-center">
                        <div class="col-md-3 col-12">
                            <div class="mb-1 mb-md-0">
                                <input type="text" class="form-control disable" aria-describedby="type" readonly
                                    value="{{ $item->name }}" />
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="mb-1 mb-md-0">
                                <input type="text" class="form-control disable" aria-describedby="type" readonly
                                    value="{{ $item->type_name }}" />
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="mb-1 mb-md-0">
                                <input type="text" class="form-control disable" aria-describedby="type" readonly
                                    value="{{ $item->route_name }}" />
                            </div>
                        </div>

                        <div class="col-md-2 col-12">
                            <div class="d-flex">
                                <div class="mb-1 mb-md-0 me-1">
                                    <form action="{{ route('edit-category', $item->id) }}" method="GET">
                                        @csrf
                                        <button class="btn btn-outline-warning text-nowrap px-2" type="submit">
                                            <i data-feather="edit" class="me-25"></i>
                                            <span>Edit</span>
                                        </button>
                                    </form>
                                </div>
                                <div class="mb-1">
                                    <form action="{{ route('delete-category', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger text-nowrap px-2" type="submit">
                                            <i data-feather="x" class="me-25"></i>
                                            <span>Delete</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
                {{ $categories->links('pagination::bootstrap-5') }}
            @else
                <div class="text-center">
                    <strong>No APA Categories Found!</strong>
                </div>
            @endif
        </div>
    </div>

@stop
