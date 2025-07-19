@extends('admin.admin_master') {{-- Extends the main admin layout template. --}}
@section('admin') {{-- Defines the section where content for this page will be placed. --}}

<div class="content-body" style="min-height: 788px;"> {{-- Main content area with a minimum height. --}}
    <div class="container-fluid"> {{-- Container for fluid layout. --}}

        {{-- Add Project Modal (currently an empty placeholder). --}}
        <div class="modal fade" id="addProjectSidebar">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header"></div>
                    <div class="modal-body"></div>
                </div>
            </div>
        </div>

        {{-- Page titles and breadcrumbs section (currently minimal content). --}}
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text"></div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex"></div>
        </div>

        {{-- Main row for the Add Courses card. --}}
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Courses</h4> {{-- Title of the card. --}}
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            {{-- Form to add a new course. --}}
                            <form method="post" action="{{ route('courses.store') }}" enctype="multipart/form-data">
                                @csrf {{-- CSRF token for security. --}}

                                {{-- Short Title input field. --}}
                                <div class="form-group">
                                    <label class="info-title">Short Title</label>
                                    <input type="text" name="short_title" class="form-control input-default">
                                    @error('short_title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                {{-- Short Description textarea. --}}
                                <div class="form-group">
                                    <label class="info-title">Short Description</label>
                                    <textarea name="short_description" class="form-control" rows="4" id="comment"></textarea>
                                    @error('short_description') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                {{-- Small Image upload field. --}}
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="small_img" class="custom-file-input" id="image">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>

                                {{-- Display area for selected Small Image (defaults to no_image.jpg). --}}
                                <div class="form-group">
                                    <img id="showImage" src="{{ url('upload/no_image.jpg') }}" style="width: 100px; height: 100px;">
                                </div>

                                {{-- Long Title input field. --}}
                                <div class="form-group">
                                    <label class="info-title">Long Title</label>
                                    <input type="text" name="long_title" class="form-control input-default">
                                    @error('long_title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                {{-- Long Description textarea (Summernote enabled). --}}
                                <div class="form-group">
                                    <label class="info-title">Long Description</label>
                                    <textarea class="form-control" name="long_description" id="summernote2"></textarea>
                                </div>

                                {{-- Total Duration input field. --}}
                                <div class="form-group">
                                    <label class="info-title">Total Duration</label>
                                    <input type="text" name="total_duration" class="form-control input-default">
                                    @error('total_duration') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                {{-- Total Lecture input field. --}}
                                <div class="form-group">
                                    <label class="info-title">Total Lecture</label>
                                    <input type="text" name="total_lecture" class="form-control input-default">
                                    @error('total_lecture') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                {{-- Total Students input field. --}}
                                <div class="form-group">
                                    <label class="info-title">Total Students</label>
                                    <input type="text" name="total_student" class="form-control input-default">
                                    @error('total_student') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                {{-- Skill All textarea (Summernote enabled). --}}
                                <div class="form-group">
                                    <label class="info-title">Skill All</label>
                                    <textarea class="form-control" name="skill_all" id="summernote3"></textarea>
                                </div>

                                {{-- Video URL input field. --}}
                                <div class="form-group">
                                    <label class="info-title">Video URL</label>
                                    <input type="text" name="video_url" class="form-control input-default">
                                    @error('video_url') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                {{-- Submit button to add the course. --}}
                                <input type="submit" class="btn btn-success" value="Add Course">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- JavaScript to display selected image preview. --}}
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

{{-- Summernote CSS and JS inclusion for rich text editing. --}}
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
    $('#summernote2').summernote({ height: 200 }); // Initialize Summernote for long_description.
    $('#summernote3').summernote({ height: 200 }); // Initialize Summernote for skill_all.
</script>

@endsection 