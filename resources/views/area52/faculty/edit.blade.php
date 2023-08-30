@extends('layouts/contentLayoutMaster')

@section('title', 'Faculty Members')

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
            <h4 class="card-title">Edit Faculty Member</h4>
            <span class="text-danger">Note: All fields are required!</span>
        </div>
        <div class="card-body">
            <form action="{{ route('faculty-update', $retrieve->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div>
                    <div>
                        <div class="row d-flex align-items-end">


                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" class="form-control" id="name" aria-describedby="name"
                                        placeholder="Ex: Dr. Md. Abdul Mannan" name="name" value="{{ $retrieve->name }}"
                                        required />
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="designation">Designation</label>
                                    <select type="select" class="form-select" id="designation"
                                        aria-describedby="designation" name="designation" required>
                                        <option disabled>Select Designation</option>
                                        {{-- <option selected value="{{ $retrieve->designation }}">
                                            {{ ucfirst($retrieve->designation) }}</option> --}}

                                        @foreach ($designations as $designation)
                                            <option @if ($retrieve->designation == $designation->designation) selected @endif
                                                value="{{ $designation->id }}">{{ $designation->designation }}</option>
                                        @endforeach

                                    </select>


                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="technology">Technology</label>

                                    <select name="technology" id="technology" class="form-control"required>
                                        <option disabled value="">Select Technology</option>
                                        <option selected value="{{ $retrieve->technology }}">
                                            {{ ucfirst($retrieve->technology) }}
                                        </option>
                                        <option value="Textile Machine Design & Maintenance">Textile Machine Design &
                                            Maintenance</option>
                                        <option value="Yarn Manufacturing">Yarn Manufacturing</option>
                                        <option value="Wet Processing">Wet Processing</option>
                                        <option value="Apparel Manufacturing">Apparel Manufacturing</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="to">Email</label>
                                    <input type="email" class="form-control" id="to" aria-describedby="email"
                                        name="email" placeholder="name@example.com" value="{{ $retrieve->email }}"
                                        required />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="mobile">Mobile</label>
                                    <input type="text" class="form-control" id="mobile" aria-describedby="mobile"
                                        name="mobile" placeholder="019*******" value="{{ $retrieve->mobile }}" required />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" aria-describedby="phone"
                                        name="phone" placeholder="0531******" value="{{ $retrieve->phone }}" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="image">Image</label>
                                    <input type="file" class="form-control" id="image" aria-describedby="image"
                                        name="image" />
                                </div>
                            </div>
                        </div>
                        <hr />
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
