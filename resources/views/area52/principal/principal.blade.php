@extends('layouts/contentLayoutMaster')

@section('title', 'Principal')

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
            <h4 class="card-title">Update Principal's' Information</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('principal-update', '1') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <div>
                        <div class="row d-flex align-items-end">
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="name_of_principal">Name of Principal</label>
                                    <input type="text" class="form-control" id="name_of_principal"
                                        aria-describedby="name_of_principal" name="principal_name"
                                        placeholder="Md. Saifur Rahman" value="{{ $principal->principal_name }}" />
                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="qop">Qualification of Principal</label>
                                    <input type="text" class="form-control" id="qop" aria-describedby="qop"
                                        placeholder="B.Sc in Textile Engineering" name="qop"
                                        value="{{ $principal->qop }}" />
                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="position">Position</label>
                                    {{-- <input type="text" class="form-control" id="position"
                                           placeholder="Principal in Charge" name="position"
                                           value="{{ $principal->position }}"/> --}}
                                    <select name="position" id="position" class="form-control select2">
                                        <option value="" selected>Select Position</option>
                                        @foreach ($designations as $designation)
                                            <option value="{{ $designation->id }}">{{ $designation->designation }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="in">Institute Name</label>
                                    <input type="text" class="form-control" id="in"
                                        placeholder="Textile Institute, Dinajpur" name="institute"
                                        value="{{ $principal->institute }}" />
                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="pi">Principal Image (Informal)</label>
                                    <input type="file" class="form-control" id="pi" name="pi" />
                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="pip">Principal Image (Passport)</label>
                                    <input type="file" class="form-control" id="pip" name="pip" />
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea type="file" class="form-control" id="description" name="description"
                                        placeholder="One of the fundamental needs as a human being is clothing...">{{ $principal->description }}</textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="description">Principal's Message'</label>
                                    <textarea type="file" class="form-control" id="description" name="message"
                                        placeholder="One of the fundamental needs as a human being is clothing...">{{ $principal->message }}</textarea>
                                </div>
                            </div>

                        </div>
                        <hr />
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
            <h4 class="card-title">Images of Principal's</h4>
        </div>

        <div class="card-body">
            <div class="row d-flex align-items-end">
                <div class="col-md-6 col-12">
                    <img src="{{ asset('images/principal/' . $principal->pi) }}" alt="Principal"
                        style="width:100%; height:250px; object-fit:cover; border-radius:6px">
                </div>
                <div class="col-md-6 col-12">
                    <img src="{{ asset('images/principal/' . $principal->pip) }}" alt="Principal"
                        style="width:100%; height:250px; object-fit:cover; border-radius:6px">
                </div>
            </div>
        </div>
    </div>

@stop
