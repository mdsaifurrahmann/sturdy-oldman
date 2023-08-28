@extends('layouts/contentLayoutMaster')

@section('title', 'Update Designation')

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
                        <a class="nav-link active" href="{{ route('designations-view') }}">
                            <i data-feather="plus" class="font-medium-3 me-50"></i>
                            <span class="fw-bold">Update Designation</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('designations-update', $designation->id) }}" method="POST" class="apa-repeater"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row d-flex align-items-end">
                    <div class="col-md-10 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="designation">Designation Name</label>
                            <input type="text" class="form-control" id="designation" aria-describedby="designation"
                                placeholder="Teacher" name="designation" value="{{ $designation->designation }}" required />
                        </div>
                    </div>

                    <div class="col-md-2 col-12">
                        <div class="mb-1">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop
