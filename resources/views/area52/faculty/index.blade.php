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
            <h4 class="card-title">Add Faculty Member</h4>
            <span class="text-danger">Note: All fields are required!</span>
        </div>
        <div class="card-body">
            <form action="{{ route('faculty-add') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <div>
                        <div class="row d-flex align-items-end">


                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" class="form-control" id="name" aria-describedby="name"
                                        placeholder="Ex: Dr. Md. Abdul Mannan" name="name" value="{{ old('name') }}"
                                        required />
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="designation">Designation</label>
                                    <select type="select" class="form-select" id="designation"
                                        aria-describedby="designation" name="designation" required>
                                        <option disabled selected>Select Designation</option>
                                        <option value="teacher">Teacher</option>
                                        <option value="assistant teacher">Assistant Teacher</option>
                                        <option value="department head">Department Head</option>
                                        <option value="professor">Professor</option>
                                        <option value="assistant professor">Assistant Professor</option>
                                        <option value="associate professor">Associate Professor</option>
                                        <option value="lecturer">Lecturer</option>
                                        <option value="assistant lecturer">Assistant Lecturer</option>
                                        <option value="librarian">Librarian</option>
                                        <option value="assistant librarian">Assistant Librarian</option>
                                        <option value="accountant">Accountant</option>
                                        <option value="assistant accountant">Assistant Accountant</option>
                                        <option value="registrar">Registrar</option>
                                        <option value="assistant registrar">Assistant Registrar</option>
                                        <option value="director">Director</option>
                                        <option value="assistant director">Assistant Director</option>
                                        <option value="engineer">Engineer</option>
                                        <option value="assistant engineer">Assistant Engineer</option>
                                        <option value="manager">Manager</option>
                                        <option value="assistant manager">Assistant Manager</option>

                                    </select>


                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="technology">Technology</label>

                                    <select name="technology" id="technology" class="form-control"required>
                                        <option selected disabled value="">Select Technology</option>
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
                                        name="email" placeholder="name@example.com" value="{{ old('email') }}"
                                        required />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="mobile">Mobile</label>
                                    <input type="text" class="form-control" id="mobile" aria-describedby="mobile"
                                        name="mobile" placeholder="019*******" value="{{ old('mobile') }}" required />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" aria-describedby="phone"
                                        name="phone" placeholder="0531******" value="{{ old('phone') }}" required />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="image">Image</label>
                                    <input type="file" class="form-control" id="image" aria-describedby="image"
                                        name="image" required />
                                </div>
                            </div>
                        </div>
                        <hr />
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <div class="card">
        <div class="card-header">
            <h4 class="card-title">List of Faculty Members</h4>
        </div>
        <div class="card-body">


            @if ($members->count() > 0)

                @foreach ($members as $officer)
                    <div class="row d-flex align-items-center">

                        <div class="col-md-3 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="name">Name</label>
                                <input type="text" class="form-control disable text-capitalize"
                                    aria-describedby="name" readonly value="{{ $officer->name }}" id="name" />
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="designation">Designation</label>
                                <input type="text" class="form-control disable text-capitalize"
                                    aria-describedby="designation" readonly value="{{ $officer->designation }}"
                                    id="designation" />
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="from">Technology</label>
                                <input type="text" class="form-control disable text-capitalize"
                                    aria-describedby="from" readonly value="{{ $officer->technology }}" id="from" />
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="to">Mobile</label>
                                <input type="text" class="form-control disable text-capitalize" aria-describedby="to"
                                    readonly value="{{ $officer->mobile }}" id="to" />
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="mb-1">
                                <label class="form-label">Actions</label>
                                <div class="d-flex">
                                    <a href="{{ route('faculty-edit', $officer->id) }}"
                                        class="btn btn-outline-warning text-nowrap px-1 me-2">
                                        <i data-feather="edit" class="me-25"></i> Edit
                                    </a>

                                    <form action="{{ route('faculty-delete', $officer->id) }}" method="POST">
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
                    </div>
                    <hr>
                @endforeach
            @else
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="col-12">

                        <h4 class="text-center">Sorry! 0 Items Found!</h4>

                    </div>
                </div>

            @endif

        </div>
    </div>

@endsection
