@extends('admin.admin_master') {{-- Extends the main admin layout template. --}}
@section('admin') {{-- Defines the section named 'admin' where content will be placed. --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> {{-- Includes the jQuery library for dynamic functionalities. --}}

<div class="content-body" style="min-height: 788px;"> {{-- Main content area with a minimum height. --}}
    <div class="container-fluid"> {{-- Container for fluid layout within the content body. --}}

        {{-- Add Project Modal (currently empty, likely a placeholder for a sidebar modal) --}}
        <div class="modal fade" id="addProjectSidebar">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        {{-- Modal header content (e.g., title, close button) --}}
                    </div>
                    <div class="modal-body">
                        {{-- Modal body content (e.g., form fields) --}}
                    </div>
                </div>
            </div>
        </div>

        {{-- Page titles and breadcrumbs section (currently minimal content). --}}
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    {{-- Placeholder for welcome text or page title. --}}
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                {{-- Placeholder for action buttons or additional page title elements. --}}
            </div>
        </div>

        {{-- Main row for the Add Project card. --}}
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Project</h4> {{-- Title of the card: "Add Project". --}}
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            {{-- Form to add a new project. --}}
                            <form method="post" action="{{ route('project.store') }}" enctype="multipart/form-data">
                                @csrf {{-- CSRF token for security to prevent cross-site request forgeries. --}}

                                {{-- Project Name input field. --}}
                                <div class="form-group">
                                    <label class="info-title">Project Name</label>
                                    <input type="text" name="project_name" class="form-control input-default">
                                    @error('project_name') {{-- Displays validation error for project_name. --}}
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Project Description textarea. --}}
                                <div class="form-group">
                                    <label class="info-title">Project Description</label>
                                    <textarea name="project_description" class="form-control" rows="4" id="comment"></textarea>
                                    @error('project_description') {{-- Displays validation error for project_description. --}}
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Project Features textarea. --}}
                                <div class="form-group">
                                    <label class="info-title">Project Features</label>
                                    <textarea name="project_features" class="form-control" rows="4" id="comment"></textarea>
                                    @error('project_features') {{-- Displays validation error for project_features. --}}
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Live Preview Link input field. --}}
                                <div class="form-group">
                                    <label class="info-title">Live Preview Link</label>
                                    <input type="text" name="live_preview" class="form-control input-default">
                                    @error('live_preview') {{-- Displays validation error for live_preview. --}}
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Image One upload field. --}}
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="img_one" class="custom-file-input" id="image">
                                        <label class="custom-file-label">Choose Image One</label>
                                    </div>
                                </div>

                                {{-- Display area for selected Image One (defaults to no_image.jpg). --}}
                                <div class="form-group">
                                    <img id="showImage" src="{{ url('upload/no_image.jpg') }}" style="width: 100px; height: 100px;">
                                </div>

                                {{-- Image Two upload field. --}}
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="img_two" class="custom-file-input" id="image2">
                                        <label class="custom-file-label">Choose Image Two</label>
                                    </div>
                                </div>

                                {{-- Display area for selected Image Two (defaults to no_image.jpg). --}}
                                <div class="form-group">
                                    <img id="showImage2" src="{{ url('upload/no_image.jpg') }}" style="width: 100px; height: 100px;">
                                </div>

                                {{-- Submit button to add the project. --}}
                                <input type="submit" class="btn btn-success" value="Add Project">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- JavaScript to preview Image One before upload. --}}
<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });   
</script>

{{-- JavaScript to preview Image Two before upload. --}}
<script type="text/javascript">
    $(document).ready(function(){
        $('#image2').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage2').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });   
</script>

@endsection 