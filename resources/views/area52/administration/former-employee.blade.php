@extends('layouts/contentLayoutMaster')

@section('title', 'Former Officers / Employees')

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
            <form action="{{ route('former-employee-add') }}" method="POST">
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
                                        <option value="" selected>Select Designation</option>


                                        @foreach ($designations as $designation)
                                            <option value="{{ $designation->id }}">{{ $designation->designation }}</option>
                                        @endforeach


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
                        <button class="btn btn-primary" type="submit"> Submit</button>
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

                        <div class="col-md-2 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="name">Name</label>
                                <input type="text" class="form-control disable text-capitalize" aria-describedby="name"
                                    readonly value="{{ $officer->name }}" id="name" />
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
                                <label class="form-label" for="from">From</label>
                                <input type="text" class="form-control disable text-capitalize" aria-describedby="from"
                                    readonly value="{{ $officer->from }}" id="from" />
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="to">To</label>
                                <input type="text" class="form-control disable text-capitalize" aria-describedby="to"
                                    readonly value="{{ $officer->to }}" id="to" />
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <label class="form-label">Actions</label>
                            <div class="mb-1 d-flex">


                                <a href="{{ route('former-employee-edit', $officer->id) }}"
                                    class="btn btn-outline-warning text-nowrap px-1 me-1">
                                    <i data-feather="edit" class="me-25"></i>
                                    Edit
                                </a>


                                <form action="{{ route('former-employee-delete', $officer->id) }}" method="POST">
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
