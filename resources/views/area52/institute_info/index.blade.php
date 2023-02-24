@extends('layouts/contentLayoutMaster')

@section('title', 'Institute Information')
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
                <h4 class="card-title">Institute Information</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('institute-info-update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row d-flex align-items-end">
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="institute_name">Institute Name</label>
                            <input type="text" name="institute_name" id="institute_name" class="form-control"
                                   placeholder="Ex: Codebumble Model School"
                                   value="{{ $errors->any() ? old('institute_name') : $institute_info->institute_name}}">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="01700000000"
                                   value="{{ $errors->any() ? old('phone') : $institute_info->phone}}">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="phone_2">Phone Alternative</label>
                            <input type="text" name="phone_2" id="phone_2" class="form-control"
                                   placeholder="01900000000"
                                   value="{{ $errors->any() ? old('phone_2') : $institute_info->phone_2}}">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control"
                                   placeholder="Ex: info@example.mail"
                                   value="{{ $errors->any() ? old('email') : $institute_info->email}}">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="email_2">Email Alternative</label>
                            <input type="text" name="email_2" id="email_2" class="form-control"
                                   placeholder="Ex: info@example.mail"
                                   value="{{ $errors->any() ? old('email_2') : $institute_info->email_2}}">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="website">Website URL</label>
                            <input type="text" name="website" id="website" class="form-control"
                                   placeholder="www.domain.com"
                                   value="{{ $errors->any() ? old('website') : $institute_info->website}}">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="location">Location</label>
                            <input type="text" name="location" id="location" class="form-control"
                                   placeholder="Dinajpur"
                                   value="{{ $errors->any() ? old('location') : $institute_info->location}}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control"
                                   placeholder="Pulhat - Uttar Faridpur Gorstan Rd, Dinajpur, Bangladesh"
                                   value="{{ $errors->any() ? old('address') : $institute_info->address}}">
                        </div>
                    </div>

                    <div class="col-md-4 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="logo">Logo</label>
                            <input type="file" name="logo" id="logo" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-4 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="favicon">Favicon</label>
                            <input type="file" name="favicon" id="favicon" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-4 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="institute_image">Institute Image</label>
                            <input type="file" name="institute_image" id="institute_image" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="image_left">Left Image (Logo)</label>
                            <input type="file" name="image_left" id="image_left" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="image_right">Right Image (Logo)</label>
                            <input type="file" name="image_right" id="image_right" class="form-control">
                        </div>
                    </div>
                </div>

                <hr>
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
            <h4 class="card-title">Image Previews</h4>
        </div>

        <div class="card-body">
            <div class="row d-flex align-items-end">
                <div class="col-md-4 col-12">
                    <img src="{{ asset('images/institute/' . $institute_info->logo) }}" alt="Principal"
                         style="width:100%; height:250px; object-fit:cover; border-radius:6px; margin-bottom: 1rem">
                </div>
                <div class="col-md-4 col-12">
                    <img src="{{ asset('images/institute/' . $institute_info->favicon) }}" alt="Principal"
                         style="width:100%; height:250px; object-fit:cover; border-radius:6px; margin-bottom: 1rem">
                </div>
                <div class="col-md-4 col-12">
                    <img src="{{ asset('images/institute/' . $institute_info->institute_image) }}" alt="Principal"
                         style="width:100%; height:250px; object-fit:cover; border-radius:6px; margin-bottom: 1rem">
                </div>
                <div class="col-md-4 col-12">
                    <img src="{{ asset('images/institute/' . $institute_info->image_left) }}" alt="Principal"
                         style="width:100%; height:250px; object-fit:cover; border-radius:6px; margin-bottom: 1rem">
                </div>
                <div class="col-md-4 col-12">
                    <img src="{{ asset('images/institute/' . $institute_info->image_right) }}" alt="Principal"
                         style="width:100%; height:250px; object-fit:cover; border-radius:6px; margin-bottom: 1rem">
                </div>
            </div>
        </div>
    </div>

@stop
