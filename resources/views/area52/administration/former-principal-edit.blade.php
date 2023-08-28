@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Former Principals')


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
            <h4 class="card-title">Edit Former Principals</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('former-principal-update', $retrieve->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div>
                    <div>
                        <div class="row d-flex align-items-end">


                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" class="form-control" id="name" aria-describedby="name"
                                        placeholder="Ex: Dr. Md. Abdul Mannan" name="name"
                                        value="{{ $retrieve->name }}" />
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="designation">Designation</label>
                                    <select type="select" class="form-select" id="designation"
                                        aria-describedby="designation" name="designation">
                                        <option disabled>Select Designation</option>
                                        <option selected value="{{ $retrieve->designation }}">
                                            {{ Illuminate\Support\Str::ucfirst($retrieve->designation) }}
                                        </option>

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
                                        placeholder="YYYY-MM-DD" value="{{ $retrieve->from }}" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="to">To</label>
                                    <input type="text" class="form-control flatpickr-basic flatpickr-input active"
                                        id="to" aria-describedby="to" name="to" readonly="readonly"
                                        placeholder="YYYY-MM-DD" value="{{ $retrieve->to }}" />
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

@section('vendor-script')

    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
@endsection
