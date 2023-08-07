@extends('layouts/contentLayoutMaster')

@section('title', 'Update APA Type')


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
            <form action="{{ route('type-update', $retrieve->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row d-flex align-items-end">
                    <div class="col-md-5 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="type">APA Type</label>
                            <input type="text" class="form-control" id="type" aria-describedby="type"
                                placeholder="আদেশ/বিজ্ঞপ্তি/প্রজ্ঞাপন/ফরম" name="type" value="{{ $retrieve->name }}" />
                        </div>
                    </div>
                    <div class="col-md-5 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="image">APA Type</label>
                            <input type="file" class="form-control" id="image" name="image" />
                        </div>
                    </div>

                    <div class="col-md-2 col-12">
                        <div class="mb-1">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="overflow-hidden">
                <h5>Image</h5>
                <img src="{{ asset('/apa/types/' . $retrieve->image) }}" alt="apa-image" class="w-25 h-25 rounded-3"
                    style="object-fit: cover;">
            </div>

        </div>
    </div>


@stop
