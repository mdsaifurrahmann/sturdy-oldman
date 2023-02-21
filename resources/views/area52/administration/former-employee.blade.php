@extends('layouts/contentLayoutMaster')

@section('title', 'Former Officers / Employees')
@section('ins-name', 'Dinajpur Textile Institute')
@section('description', 'Dinajpur Textile Institute')
@section('keywords', 'Dinajpur Textile Institute')


@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
@endsection

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
            <h4 class="card-title">Former Officers / Employees</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('former-employee-update') }}" method="POST">
                @csrf
                <div>
                    <div>
                        <div class="row d-flex align-items-end">


                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" class="form-control" id="name" aria-describedby="name"
                                        placeholder="Ex: Dr. Md. Abdul Mannan" name="name" />
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="designation">Designation</label>
                                    <select type="select" class="form-select" id="designation"
                                        aria-describedby="designation" name="designation">
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
                                    <label class="form-label" for="from">From</label>
                                    <input type="text" class="form-control flatpickr-basic flatpickr-input active"
                                        id="from" aria-describedby="from" name="from" readonly="readonly"
                                        placeholder="YYYY-MM-DD" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="to">To</label>
                                    <input type="text" class="form-control flatpickr-basic flatpickr-input active"
                                        id="to" aria-describedby="to" name="to" readonly="readonly"
                                        placeholder="YYYY-MM-DD" />
                                </div>
                            </div>
                        </div>
                        <hr />
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit"> Submit </button>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <div class="card">
        <div class="card-header">
            <h4 class="card-title">List of Former Officers / Employees</h4>
        </div>
        <div class="card-body">


            @if ($employees->count() > 0)

                @foreach ($employees as $officer)
                    <div class="row d-flex align-items-center">

                        <div class="col-md-3 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="name">Name</label>
                                <input type="text" class="form-control disable text-capitalize" aria-describedby="name"
                                    readonly value="{{ $officer->name }}" id="name" />
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="designation">Designation</label>
                                <input type="text" class="form-control disable text-capitalize"
                                    aria-describedby="designation" readonly value="{{ $officer->designation }}"
                                    id="designation" />
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="from">From</label>
                                <input type="text" class="form-control disable text-capitalize"
                                    aria-describedby="from" readonly value="{{ $officer->from }}" id="from" />
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="to">To</label>
                                <input type="text" class="form-control disable text-capitalize" aria-describedby="to"
                                    readonly value="{{ $officer->to }}" id="to" />
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="mb-1">

                                <form action="{{ route('former-employee-delete', $officer->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <label class="form-label">Delete</label>
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

@section('vendor-script')

    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
@endsection
