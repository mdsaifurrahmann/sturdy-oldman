@extends('layouts/contentLayoutMaster')

@section('title', 'Account')

@section('vendor-style')
    <!-- vendor css files -->
    <link rel='stylesheet' href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    <link rel='stylesheet' href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
    <link rel='stylesheet' href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endsection
@section('page-style')
    <!-- Page css files -->
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
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


    <div class="row">
        <div class="col-12">
            <ul class="nav nav-pills mb-2">
                <!-- Account -->
                <li class="nav-item">
                    <a class="nav-link active" href="{{ asset('page/account-settings-account') }}">
                        <i data-feather="user" class="font-medium-3 me-50"></i>
                        <span class="fw-bold">Account</span>
                    </a>
                </li>
                <!-- security -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('security') }}">
                        <i data-feather="lock" class="font-medium-3 me-50"></i>
                        <span class="fw-bold">Security</span>
                    </a>
                </li>
            </ul>

            <!-- profile -->
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title">Profile Details</h4>
                </div>
                <div class="card-body py-2 my-25">
                    <!-- header section -->

                    <!--/ header section -->

                    <!-- form -->
                    <form action="{{ route('profile-update') }}" method="POST" class="validate-form"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="d-flex pb-2">
                            <a href="#" class="me-25">
                                <img src="data:image/png;base64,{{ $retrieve->profile_image && \Illuminate\Support\Facades\File::exists(public_path('images/profile/' . $retrieve->profile_image)) ? base64_encode(file_get_contents(public_path('images/profile/' . $retrieve->profile_image))) : base64_encode(file_get_contents(public_path('images/portrait/small/avatar-s-11.jpg'))) }}"
                                    id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profile image"
                                    height="100" width="100" />
                            </a>
                            <!-- upload and reset button -->
                            <div class="d-flex align-items-end mt-75 ms-1">
                                <div>
                                    <label for="account-upload" class="btn btn-sm btn-primary mb-75 me-75">Upload</label>
                                    <input type="file" id="account-upload" hidden accept="image/*"
                                        name="profile_image" />
                                    <button type="button" id="account-reset"
                                        class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                                    <p class="mb-0">Allowed file types: png, jpg, jpeg.</p>
                                </div>
                            </div>
                            <!--/ upload and reset button -->
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-6 mb-1">
                                <label class="form-label" for="accountFirstName">Username (Can not be change)</label>
                                <input type="text" class="form-control disabled" id="accountFirstName" placeholder="John"
                                    value="{{ $retrieve->username }}" data-msg="Please enter username" readonly disabled />
                            </div>
                            <div class="col-12 col-sm-6 mb-1">
                                <label class="form-label" for="accountLastName">Full Name</label>
                                <input type="text" class="form-control" id="accountLastName" name="name"
                                    placeholder="Doe" value="{{ $retrieve->name }}" data-msg="Please enter Full Name" />
                            </div>
                            <div class="col-12 col-sm-6 mb-1">
                                <label class="form-label" for="accountEmail">Email</label>
                                <input type="email" class="form-control" id="accountEmail" name="email"
                                    placeholder="Email" value="{{ $retrieve->email }}" />
                            </div>
                            <div class="col-12 col-sm-6 mb-1">
                                <label class="form-label" for="accountOrganization">Designation</label>
                                <select name="designation" id="designation" class="form-control select2">
                                    <option disabled {{ $retrieve->designation ? '' : 'selected' }} value="">Select
                                        Designation</option>
                                    @if ($retrieve->designation)
                                        {
                                        <option selected value="{{ $retrieve->designation }}">
                                            {{ ucfirst($retrieve->designation) }}</option>
                                        }
                                    @endif
                                    <option value="teacher">Teacher</option>
                                    <option value="operator">Operator</option>
                                    <option value="manager">manager</option>
                                    <option value="IT Head">IT Head</option>
                                    <option value="Dept. head">Dept. Head</option>
                                    <option value="principal">Principal</option>
                                    <option value="assistant principal">Assistant Principal</option>
                                </select>

                            </div>
                            <div class="col-12 col-sm-6 mb-1">
                                <label class="form-label" for="accountPhoneNumber">Mobile Number</label>
                                <input type="text" class="form-control account-number-mask" id="accountPhoneNumber"
                                    name="mobile" placeholder="Mobile Number" value="{{ $retrieve->mobile }}" />
                            </div>
                            <div class="col-12 col-sm-6 mb-1">
                                <label class="form-label" for="accountAddress">Address</label>
                                <input type="text" class="form-control" id="accountAddress" name="address"
                                    placeholder="Your Address" value="{{ $retrieve->address }}" />
                            </div>
                            <div class="col-12 col-sm-6 mb-1">
                                <label class="form-label" for="accountState">State</label>
                                <input type="text" class="form-control" id="accountState" name="state"
                                    placeholder="State" value="{{ $retrieve->state }}" />
                            </div>
                            <div class="col-12 col-sm-6 mb-1">
                                <label class="form-label" for="accountZipCode">Zip Code</label>
                                <input type="text" class="form-control account-zip-code" id="accountZipCode"
                                    name="zip" placeholder="Code" value="{{ $retrieve->zip }}" maxlength="6" />
                            </div>



                            <div class="col-12">
                                <button type="submit" class="btn btn-primary mt-1 me-1">Save changes</button>
                                <button type="reset" class="btn btn-outline-secondary mt-1">Discard</button>
                            </div>
                        </div>
                    </form>
                    <!--/ form -->
                </div>
            </div>

            <!-- deactivate account  -->
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title">Delete Account</h4>
                </div>
                <div class="card-body py-2 my-25">
                    <div class="alert alert-warning">
                        <h4 class="alert-heading">Are you sure you want to delete your account?</h4>
                        <div class="alert-body fw-normal">
                            Once you delete your account, there is no going back. Please be certain.
                        </div>
                    </div>

                    <form action="{{ route('profile-delete') }}" method="POST" id="formAccountDeactivation"
                        class="validate-form" enctype="multipart/form-data" onsubmit="return false">
                        @csrf
                        @method('DELETE')
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="accountActivation"
                                id="accountActivation" data-msg="Please confirm you want to delete account" />
                            <label class="form-check-label font-small-3" for="accountActivation">
                                I confirm my account deactivation
                            </label>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-danger deactivate-account mt-1">Deactivate
                                Account</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--/ profile -->
        </div>
    </div>
@endsection

@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js')) }}"></script>
@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/pages/page-account-settings-account.js')) }}"></script>
@endsection
