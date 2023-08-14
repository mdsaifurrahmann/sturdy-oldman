@extends('layouts/contentLayoutMaster')

@section('title', 'User View - Profile')

@section('vendor-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css')) }}">
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

    <section class="app-user-view-account">
        <div class="row">
            <!-- User Sidebar -->
            <div class="col-12 order-1 order-md-0">
                <!-- User Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="user-avatar-section">
                            <div class="d-flex align-items-center flex-column">
                                <img class="img-fluid rounded mt-3 mb-2"
                                    src="{{ $retrieve->profile->profile_image ? asset('images/profile/' . $retrieve->profile->profile_image) : asset(mix('images/portrait/small/avatar-s-11.jpg')) }}"
                                    height="110" width="110" alt="User avatar" />
                                <div class="user-info text-center">
                                    <h4>{{ ucfirst($retrieve->name) }}</h4>
                                    @foreach ($retrieve->roles as $role)
                                        <span class="badge bg-light-secondary">
                                            {{ $role->name }}
                                        </span>
                                    @endforeach

                                </div>
                            </div>
                        </div>

                        <h4 class="fw-bolder border-bottom pb-50 mb-1">Details of {{ ucfirst($retrieve->name) }}</h4>
                        <div class="info-container">
                            <ul class="list-unstyled">
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Username:</span>
                                    <span>{{ $retrieve->username }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Email:</span>
                                    <span>{{ $retrieve->email }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Status:</span>

                                    @if ($retrieve->profile->status == 1)
                                        <span class="badge bg-light-success">Active</span>
                                    @elseif ($retrieve->profile->status == 0)
                                        <span class="badge bg-light-danger">Inactive</span>
                                    @endif

                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Role:</span>
                                    @foreach ($retrieve->roles as $role)
                                        <span>
                                            {{ ucfirst($role->name) }}
                                        </span>
                                    @endforeach
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Mobile:</span>
                                    <span>{{ $retrieve->mobile }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Designation:</span>
                                    <span>{{ ucfirst($retrieve->profile->designation) }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Address:</span>
                                    <span>{{ ucfirst($retrieve->profile->address) }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">State:</span>
                                    <span>{{ ucfirst($retrieve->profile->state) }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Zip:</span>
                                    <span>{{ ucfirst($retrieve->profile->zip) }}</span>
                                </li>
                            </ul>
                            <div class="d-flex justify-content-center pt-2">

                                @if (Auth::user()->username == $retrieve->username)
                                    <a href="{{ route('profile-update-view', $retrieve->username) }}"
                                        class="btn btn-primary me-1">
                                        Edit
                                    </a>
                                @else
                                    @role(['nuke', 'admin'])
                                        <a href="javascript:;" class="btn btn-primary me-1" data-bs-target="#editUser"
                                            data-bs-toggle="modal">
                                            Edit
                                        </a>
                                    @endrole
                                @endif

                                @role('nuke')
                                    @if (Auth::user()->username != $retrieve->username)
                                        <form id="delete_external" action="{{ route('external-delete', $retrieve->id) }}"
                                            method="POST" enctype="multipart/form-data" onsubmit="return false">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger delete-user">Delete User</button>
                                        </form>
                                    @endif
                                @endrole

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /User Card -->
            </div>
            <!--/ User Sidebar -->
        </div>
    </section>

    @include('area52.profile.modal-edit-user')
@endsection

@section('vendor-script')
    {{-- Vendor js files --}}
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    {{-- <script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js')) }}"></script> --}}
    {{-- <script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js')) }}"></script> --}}
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
    {{-- data table --}}
    {{-- <script src="{{ asset(mix('vendors/js/extensions/moment.min.js')) }}"></script> --}}
    {{-- <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script> --}}
    {{-- <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script> --}}
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
    {{-- <script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script> --}}
@endsection

@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset(mix('js/scripts/pages/modal-edit-user.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/pages/app-user-view-account.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/pages/app-user-view.js')) }}"></script>
@endsection
