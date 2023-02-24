@extends('layouts/contentLayoutMaster')

@section('title', 'History')

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
            <h4 class="card-title">Update History</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('update-history') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <div>
                        <div class="row d-flex align-items-end">


                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="PageTitle">Page Title</label>
                                    <input type="text" class="form-control" id="PageTitle" aria-describedby="PageTitle"
                                           placeholder="Ex: Welcome to DTI" name="title" value="{{ $history->title }}"/>
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="historyImage">Institute Image</label>
                                    <input type="file" class="form-control" id="historyImage"
                                           aria-describedby="historyImage" name="image"/>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="history">History</label>
                                    <textarea type="text" class="form-control" id="history" aria-describedby="history"
                                              placeholder="Ex: We're at the top of the world"
                                              name="history">{{ $history->history }}</textarea>
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
@endsection
