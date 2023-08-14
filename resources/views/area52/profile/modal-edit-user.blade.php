<!-- Edit User Modal -->
<div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Process {{ $retrieve->name }}'s' Account</h1>
                    <p>Updating user details will receive a privacy audit.</p>
                </div>
                <form id="editUserForm" class="row gy-1 pt-75" action="{{ route('external-update', $retrieve->id) }}"
                    method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control disabled"
                            placeholder="John" value="{{ $retrieve->username }}" data-msg="Please enter your username"
                            readonly disabled />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control disabled"
                            placeholder="Doe" value="{{ $retrieve->name }}" data-msg="Please enter your name" disabled
                            readonly />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="mobile">Mobile</label>
                        <input type="text" id="mobile" name="mobile" class="form-control"
                            value="{{ $retrieve->mobile }}" placeholder="01**********" disabled readonly />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="email">Email:</label>
                        <input type="text" id="email" name="email" class="form-control"
                            value="{{ $retrieve->email }}" placeholder="example@domain.com" readonly disabled />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="designation">Designation</label>
                        <input type="text" id="designation" name="designation"
                            class="form-control disabled modal-edit-tax-id" placeholder="Teacher"
                            value="{{ $retrieve->profile->designation }}" readonly disabled />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="address">Address</label>
                        <input type="text" id="address" name="address"
                            class="form-control disabled phone-number-mask" placeholder="Dinajpur"
                            value="{{ $retrieve->profile->address }}" readonly disabled />
                    </div>


                    <div class="col-md-6 col-12 ">
                        <label class="form-label" for="role">Role</label>
                        <select name="role" id="role" class="select2">
                            <option selected value="">Select Role</option>
                            @role('nuke')
                                <option value="nuke" @if ($retrieve->hasRole('nuke')) selected @endif>Nuke</option>
                            @endrole
                            @role(['nuke', 'admin'])
                                <option value="admin" @if ($retrieve->hasRole('admin')) selected @endif>Admin</option>
                            @endrole
                            @role(['nuke', 'admin', 'moderator'])
                                <option value="moderator" @if ($retrieve->hasRole('moderator')) selected @endif>Moderator
                                </option>
                            @endrole
                            @role(['nuke', 'admin', 'moderator', 'user'])
                                <option value="user" @if ($retrieve->hasRole('user')) selected @endif>User
                                </option>
                            @endrole
                        </select>
                    </div>


                    <div class="col-md-6 col-12">
                        <label class="form-label" for="status">Role</label>
                        <select name="status" id="status" class="select2">
                            <option selected value="">Select Status</option>
                            <option value="1" @if ($retrieve->profile->status == 1) selected @endif>Active</option>
                            <option value="0" @if ($retrieve->profile->status == 0) selected @endif>Inactive</option>
                        </select>
                    </div>



                    {{-- <div class="col-12">
                        <div class="d-flex align-items-center mt-1">
                            <input type="hidden" name="status" value="0">
                            <!-- Default value if checkbox is not checked -->
                            <div class="form-check form-switch form-check-primary">
                                <input type="checkbox" class="form-check-input" id="customSwitch10" name="status"
                                    {{ $retrieve->profile->status == 1 ? 'checked' : '' }} value="1" />
                                <label class="form-check-label" for="customSwitch10">
                                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                                </label>
                            </div>
                            <label class="form-check-label fw-bolder" for="customSwitch10">Active this user?</label>
                        </div>
                    </div> --}}
                    <div class="col-12 text-center mt-2 pt-50">
                        <button type="submit" class="btn btn-primary me-1">Update</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                            aria-label="Close">
                            Discard
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ Edit User Modal -->
