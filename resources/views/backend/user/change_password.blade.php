{{-- Extends the admin master layout --}}
@extends('admin.admin_master')

{{-- Section for admin-specific content --}}
@section('admin')

{{-- Include jQuery library for potential AJAX operations or DOM manipulation --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

{{-- Main content body of the admin panel --}}
<div class="content-body" style="min-height: 788px;">
    {{-- Container for the fluid layout --}}
    <div class="container-fluid">
        {{-- Modal for adding a project (currently empty, likely a placeholder) --}}
        <div class="modal fade" id="addProjectSidebar">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        {{-- Header content for the modal can go here --}}
                    </div>
                    <div class="modal-body">
                        {{-- Body content for the modal can go here --}}
                    </div>
                </div>
            </div>
        </div>

        {{-- Row for page titles and breadcrumbs (currently empty, likely a placeholder) --}}
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                {{-- Content for the left side of the page title (e.g., page title text) --}}
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                {{-- Content for the right side of the page title (e.g., breadcrumbs or buttons) --}}
            </div>
        </div>

        {{-- Main row for content --}}
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    {{-- Card header for the form --}}
                    <div class="card-header">
                        <h4 class="card-title">User Change Password</h4>
                    </div>
                    {{-- Card body containing the password change form --}}
                    <div class="card-body">
                        <div class="basic-form">
                            {{-- Password change form --}}
                            <form method="post" action="{{ route('change.password.update') }}">
                                @csrf {{-- CSRF token for security --}}

                                {{-- Form group for current password input --}}
                                <div class="form-group">
                                    <label class="info-title">Current Password</label>
                                    <input type="password" id="current_password" name="oldpassword" class="form-control input-default">
                                </div>

                                {{-- Form group for new password input --}}
                                <div class="form-group">
                                    <label class="info-title">New Password</label>
                                    <input type="password" id="password" name="password" class="form-control input-default">
                                </div>

                                {{-- Form group for confirming new password --}}
                                <div class="form-group">
                                    <label class="info-title">Confirm Password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control input-default">
                                </div>

                                {{-- Submit button for the form --}}
                                <input type="submit" class="btn btn-success" value="Change Password">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection