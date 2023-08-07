@extends('layouts/contentLayoutMaster')

@section('title', 'APA Types')

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
                        <a class="nav-link active" href="{{ route('add-type-view') }}">
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
            <form action="{{ route('add-type') }}" method="POST" class="apa-repeater" enctype="multipart/form-data">
                @csrf

                <div class="row d-flex align-items-end">
                    <div class="col-md-5 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="type">APA Type</label>
                            <input type="text" class="form-control" id="type" aria-describedby="type"
                                placeholder="আদেশ/বিজ্ঞপ্তি/প্রজ্ঞাপন/ফরম" name="type" value="{{ old('type') }}"
                                required />
                        </div>
                    </div>
                    <div class="col-md-5 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="image">APA Type Image</label>
                            <input type="file" class="form-control" id="image" aria-describedby="image"
                                name="image" required />
                        </div>
                    </div>

                    <div class="col-md-2 col-12">
                        <div class="mb-1">
                            <button class="btn btn-primary" type="submit"> Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <h4>APA Type List</h4>
            </div>
        </div>
        <div class="card-body">
            <div>
                @if ($apa_type->count() > 0)
                    @foreach ($apa_type as $item)
                        <div class="row d-flex align-items-center">

                            <div class="col-md-8 col-12">
                                <div class="mb-1">
                                    <input type="text" class="form-control disable" aria-describedby="type" readonly
                                        value="{{ $item->name }}" />
                                </div>
                            </div>

                            <div class="col-md-2 col-12">
                                <div class="mb-1">
                                    <form action="{{ route('type-update-view', $item->id) }}" method="GET">
                                        @csrf
                                        <button class="btn btn-outline-warning text-nowrap px-3" type="submit">
                                            <i data-feather="x" class="me-25"></i>
                                            <span>Edit</span>
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <div class="col-md-2 col-12">
                                <div class="mb-1">
                                    <form action="{{ route('apa-type-delete', $item->id) }}" method="POST">
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
                    @endforeach
                    {{ $apa_type->links('pagination::bootstrap-5') }}
                @else
                    <div class="text-center">
                        <strong>No APA Type Found!</strong>
                    </div>
                @endif


            </div>



        </div>
    </div>


@stop
