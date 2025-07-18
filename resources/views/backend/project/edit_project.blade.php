@extends('admin.admin_master') 
@section('admin') {{-- Starts the 'admin' section where content will be injected --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> {{-- Includes jQuery library --}}

{{-- Main content body --}}
<div class="content-body" style="min-height: 788px;">
    <div class="container-fluid">
        {{-- Modal for adding a project (currently empty) --}}
        <div class="modal fade" id="addProjectSidebar">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        {{-- Header content for the modal --}}
                    </div>
                    <div class="modal-body">
                        {{-- Body content for the modal --}}
                    </div>
                </div>
            </div>
        </div>

        {{-- Page titles and breadcrumbs (currently empty) --}}
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    {{-- Welcome text content --}}
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                {{-- Content for page title actions --}}
            </div>
        </div>

        {{-- Row for the main content card --}}
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Project</h4> {{-- Card title for editing a project --}}
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            {{-- Project edit form --}}
                            <form method="post" action="{{ route('project.update') }}" enctype="multipart/form-data">
                                @csrf {{-- CSRF token for security --}}

                                <input type="hidden" name="id" value="{{ $project->id }}"> {{-- Hidden input for project ID --}}

                                {{-- Project Name input field --}}
                                <div class="form-group">
                                    <label class="info-title">Project Name</label>
                                    <input type="text" name="project_name" class="form-control input-default" value="{{ $project->project_name }}">
                                    @error('project_name') {{-- Error message for project_name validation --}}
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Project Description textarea --}}
                                <div class="form-group">
                                    <label class="info-title">Project Description</label>
                                    <textarea name="project_description" class="form-control" rows="4" id="comment">{{ $project->project_description }}</textarea>
                                    @error('project_description') {{-- Error message for project_description validation --}}
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Project Features textarea --}}
                                <div class="form-group">
                                    <label class="info-title">Project Features</label>
                                    <textarea name="project_features" class="form-control" rows="4" id="comment">{{ $project->project_features }}</textarea>
                                    @error('project_features') {{-- Error message for project_features validation --}}
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Live Preview Link input field --}}
                                <div class="form-group">
                                    <label class="info-title">Live Preview Link</label>
                                    <input type="text" name="live_preview" class="form-control input-default" value="{{ $project->live_preview }}">
                                    @error('live_preview') {{-- Error message for live_preview validation --}}
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Image One upload field --}}
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="img_one" class="custom-file-input" id="image">
                                        <label class="custom-file-label">Choose Image One</label>
                                    </div>
                                </div>

                                {{-- Display current Image One --}}
                                <div class="form-group">
                                    <img id="showImage" src="{{ asset($project->img_one) }}" style="width: 100px; height: 100px;">
                                </div>

                                {{-- Image Two upload field --}}
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="img_two" class="custom-file-input" id="image2">
                                        <label class="custom-file-label">Choose Image Two</label>
                                    </div>
                                </div>

                                {{-- Display current Image Two --}}
                                <div class="form-group">
                                    <img id="showImage2" src="{{ asset($project->img_two) }}" style="width: 100px; height: 100px;">
                                </div>

                                {{-- Submit button to update project --}}
                                <input type="submit" class="btn btn-success" value="Update Project">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- JavaScript to display selected image for Image One --}}
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

{{-- JavaScript to display selected image for Image Two --}}
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