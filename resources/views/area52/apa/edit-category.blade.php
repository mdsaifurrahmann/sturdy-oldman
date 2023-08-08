@extends('layouts/contentLayoutMaster')

@section('title', 'Edit APA Category')

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
                        <a class="nav-link" href="{{ route('add-category-view') }}">
                            <i data-feather="plus" class="font-medium-3 me-50"></i>
                            <span class="fw-bold">Add APA Category</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('update-category', $retrieve->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row d-flex align-items-end">
                    <div class="col-md-4 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="cat_name">APA Category Name</label>
                            <input type="text" class="form-control" id="cat_name" aria-describedby="cat_name"
                                placeholder="বার্ষিক কর্মসম্পাদন চুক্তিসমূহ" name="cat_name" value="{{ $retrieve->name }}"
                                required />
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="type_id">APA Type</label>
                            <select name="type_id" id="type_id" class="form-select" required>
                                <option value="">Select APA Type</option>
                                <option selected value="{{ $retrieve->type_id }}">{{ $retrieve->type_name }}</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="route_name">Route (dtec.edu.bd/apa/apab)</label>
                            <input type="text" class="form-control" id="route_name" aria-describedby="route_name"
                                placeholder="apab" name="route_name" value="{{ $retrieve->route_name }}" required />
                        </div>
                    </div>

                    <div class="col-md-1 col-12">
                        <div class="mb-1">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop
