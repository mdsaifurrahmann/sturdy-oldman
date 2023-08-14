@extends('layouts/contentLayoutMaster')

@section('title', 'Security')

@section('vendor-style')
    <!-- vendor css files -->
    {{-- <link rel='stylesheet' href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}"> --}}
@endsection
@section('page-style')
    <!-- Page css files -->
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
                    <a class="nav-link" href="{{ route('profile-update-view', Auth::user()->username) }}">
                        <i data-feather="user" class="font-medium-3 me-50"></i>
                        <span class="fw-bold">Account</span>
                    </a>
                </li>
                <!-- security -->
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('security') }}">
                        <i data-feather="lock" class="font-medium-3 me-50"></i>
                        <span class="fw-bold">Security</span>
                    </a>
                </li>
            </ul>

            <!-- security -->

            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title">Change Password</h4>
                </div>
                <div class="card-body pt-1">
                    <!-- form -->
                    <form class="validate-form" action="{{ route('update-password') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12 col-sm-6 mb-1">
                                <label class="form-label" for="account-old-password">Current password</label>
                                <div class="input-group form-password-toggle input-group-merge">
                                    <input type="password" class="form-control" id="account-old-password"
                                        name="current_password" placeholder="Enter current password"
                                        data-msg="Please current password" />
                                    <div class="input-group-text cursor-pointer">
                                        <i data-feather="eye"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6 mb-1">
                                <label class="form-label" for="account-new-password">New Password</label>
                                <div class="input-group form-password-toggle input-group-merge">
                                    <input type="password" id="account-new-password" name="password" class="form-control"
                                        placeholder="Enter new password" />
                                    <div class="input-group-text cursor-pointer">
                                        <i data-feather="eye"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 mb-1">
                                <label class="form-label" for="account-retype-new-password">Retype New Password</label>
                                <div class="input-group form-password-toggle input-group-merge">
                                    <input type="password" class="form-control" id="account-retype-new-password"
                                        name="password_confirmation" placeholder="Confirm your new password" />
                                    <div class="input-group-text cursor-pointer"><i data-feather="eye"></i></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <p class="fw-bolder">Password requirements:</p>
                                <ul class="ps-1 ms-25">
                                    <li class="mb-50">Minimum 8 characters long - the more, the better</li>
                                    <li class="mb-50">At least one lowercase character</li>
                                    <li>At least one number, symbol, or whitespace character</li>
                                </ul>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary me-1 mt-1">Save changes</button>
                                <button type="reset" class="btn btn-outline-secondary mt-1">Discard</button>
                            </div>
                        </div>
                    </form>
                    <!--/ form -->
                </div>
            </div>

            <!-- recent device -->
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title">Recent devices</h4>
                </div>
                <div class="card-body my-2 py-25">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap text-center">
                            <thead>
                                <tr>
                                    <th class="text-start">BROWSER</th>
                                    <th>DEVICE</th>
                                    <th>LOCATION</th>
                                    <th>RECENT ACTIVITY</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-start">
                                        <div class="avatar me-25">
                                            <img src="{{ asset('images/icons/google-chrome.png') }}" alt="avatar"
                                                width="20" height="20" />
                                        </div>
                                        <span class="fw-bolder">Chrome on Windows</span>
                                    </td>
                                    <td>Dell XPS 15</td>
                                    <td>United States</td>
                                    <td>10, Jan 2021 20:07</td>
                                </tr>
                                <tr>
                                    <td class="text-start">
                                        <div class="avatar me-25">
                                            <img src="{{ asset('images/icons/google-chrome.png') }}" alt="avatar"
                                                width="20" height="20" />
                                        </div>
                                        <span class="fw-bolder">Chrome on Android</span>
                                    </td>
                                    <td>Google Pixel 3a</td>
                                    <td>Ghana</td>
                                    <td>11, Jan 2021 10:16</td>
                                </tr>
                                <tr>
                                    <td class="text-start">
                                        <div class="avatar me-25">
                                            <img src="{{ asset('images/icons/google-chrome.png') }}" alt="avatar"
                                                width="20" height="20" />
                                        </div>
                                        <span class="fw-bolder">Chrome on MacOS</span>
                                    </td>
                                    <td>Apple iMac</td>
                                    <td>Mayotte</td>
                                    <td>11, Jan 2021 12:10</td>
                                </tr>
                                <tr>
                                    <td class="text-start">
                                        <div class="avatar me-25">
                                            <img src="{{ asset('images/icons/google-chrome.png') }}" alt="avatar"
                                                width="20" height="20" />
                                        </div>
                                        <span class="fw-bolder">Chrome on iPhone</span>
                                    </td>
                                    <td>Apple iPhone XR</td>
                                    <td>Mauritania</td>
                                    <td>12, Jan 2021 8:29</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- / recent device -->
            <!--/ security -->
        </div>
    </div>

@endsection

@section('vendor-script')
    <!-- vendor files -->
    {{-- <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script> --}}
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
    {{-- <script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js')) }}"></script> --}}
    {{-- <script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js')) }}"></script> --}}
@endsection
@section('page-script')
    <!-- Page js files -->
    {{-- <script src="{{ asset(mix('js/scripts/pages/modal-two-factor-auth.js')) }}"></script> --}}
    <script src="{{ asset(mix('js/scripts/pages/page-account-settings-security.js')) }}"></script>
@endsection
