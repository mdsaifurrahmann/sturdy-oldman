@extends('layouts/contentLayoutMaster')

@section('title', 'All APA')
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

    <div class="card">
        <div class="card-header">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <!-- User Pills -->
                <ul class="nav nav-pills mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('apa-add-form') }}">
                            <i data-feather="plus" class="font-medium-3 me-50"></i>
                            <span class="fw-bold">Add APA</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('apa-list') }}">
                            <i data-feather="list" class="font-medium-3 me-50"></i>
                            <span class="fw-bold">All APA</span>
                        </a>
                    </li>

                </ul>
            </div>

            <h4 class="card-title">All APA</h4>
        </div>
        <div class="card-body">
            <div>
                @if($apa->count() > 0)
                    @foreach ($apa as $item)
                        <div class="row d-flex align-items-center">

                            <div class="col-md-3 col-12">
                                <div class="mb-1">
                                    <input type="text" class="form-control disable" aria-describedby="sliderTitle"
                                           readonly
                                           value="{{ $item->title }}"/>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="mb-1">
                                    <input type="text" class="form-control disable" aria-describedby="sliderTitle"
                                           readonly
                                           value="{{ $item->item_name }}"/>
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <div class="mb-1">
                                    <input type="text" class="form-control disable" aria-describedby="sliderDesc"
                                           readonly
                                           value="{{ $item->date }}"/>
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <div class="mb-1 d-flex align-items-center justify-content-center">
                                    <a href="{{route('edit-apa', $item->id)}}"
                                       class="btn btn-outline-warning text-nowrap px-1">
                                        <i data-feather="edit" class="me-25"></i>
                                        <span>Edit</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <div class="mb-1 d-flex align-items-center justify-content-center">
                                    <form action="{{ route('apa-delete', $item->id) }}" method="POST">
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
                    {{ $apa->links('pagination::bootstrap-5') }}
                @else
                    <div class="text-center">
                        <strong>No Notice Found!</strong>
                    </div>
                @endif


            </div>
        </div>
    </div>

@stop
