@extends('admin.admin_master') {{-- Extends the main admin layout --}}
@section('admin') {{-- Defines the section for admin content --}}

<div class="content-body" style="min-height: 788px;">
    <div class="container-fluid">

        <div class="modal fade" id="addProjectSidebar">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header"></div>
                    <div class="modal-body"></div>
                </div>
            </div>
        </div>

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <p class="mb-0">Your React dashboard</p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex"></div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        <div class="photo-content"></div>
                        <div class="profile-info">
                            <div class="profile-photo">
                                {{-- Display user profile image or a default placeholder --}}
                                <img src="{{ (!empty($user->profile_photo_path)) ? url('upload/user_images/'.$user->profile_photo_path) : url('upload/no_image.jpg') }}"
                                    class="img-fluid rounded-circle" alt="User Profile Image">
                            </div>
                            <div class="profile-details">
                                <div class="profile-name px-3 pt-2">
                                    <h4>{{ $user->name }}</h4> {{-- Display user's name --}}
                                    <p>Login User Name</p>
                                </div>
                                <div class="profile-email px-2 pt-2">
                                    <h4>{{ $user->email }}</h4> {{-- Display user's email --}}
                                    <p>Email</p>
                                </div>
                                <div class="dropdown ml-auto"></div>
                            </div>
                        </div>
                    </div>
                    {{-- Button to navigate to the profile edit page --}}
                    <a href="{{ route('user.profile.edit') }}" class="btn btn-secondary">Edit Profile</a>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection