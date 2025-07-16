@extends('admin.admin_master') {{-- Extends the main admin master layout --}}
@section('admin') {{-- Defines the section for admin content --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> {{-- Includes jQuery library --}}

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
                    <h4>Hi, {{ $user->name }} welcome back!</h4> {{-- Displays personalized welcome message with user's name --}}
                    <span>React</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex"></div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">User Profile Edit</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            {{-- Profile update form --}}
                            <form method="post" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                                @csrf {{-- CSRF token for security --}}

                                {{-- User Name Input --}}
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control input-default" value="{{ $user->name }}">
                                </div>

                                {{-- User Email Input --}}
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control input-default" value="{{ $user->email }}">
                                </div>

                                {{-- Profile Photo Upload Input --}}
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="profile_photo_path" class="custom-file-input" id="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>

                                {{-- Display current/new profile image --}}
                                <div class="form-group">
                                    <img id="showImage" src="{{ (!empty($user->profile_photo_path)) ? url('upload/user_images/'.$user->profile_photo_path) : url('upload/no_image.jpg') }}" style="width: 100px; height: 100px;">
                                </div>

                                {{-- Submit button to update profile --}}
                                <input type="submit" class="btn btn-success" value="Update Profile">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    // JavaScript to display selected image preview
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>

@endsection