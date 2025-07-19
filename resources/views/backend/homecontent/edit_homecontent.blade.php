@extends('admin.admin_master') {{-- Extends the main admin layout. --}}
@section('admin') {{-- Defines the section for this page's content. --}}

<div class="content-body" style="min-height: 788px;"> {{-- Main content wrapper. --}}
    <div class="container-fluid"> {{-- Fluid container for layout. --}}

        {{-- Add Project Modal (empty placeholder). --}}
        <div class="modal fade" id="addProjectSidebar">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header"></div>
                    <div class="modal-body"></div>
                </div>
            </div>
        </div>

        {{-- Page titles row (empty placeholder). --}}
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text"></div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex"></div>
        </div>

        {{-- Main content row for editing home content. --}}
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Home Content</h4> {{-- Card title. --}}
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            {{-- Form to edit existing home content. --}}
                            <form method="post" action="{{ route('homecontent.update') }}">
                                @csrf {{-- CSRF token for security. --}}

                                <input type="hidden" name="id" value="{{ $homecontent->id }}"> {{-- Hidden input for content ID. --}}

                                {{-- Home Title input field. --}}
                                <div class="form-group">
                                    <label class="info-title">Home Title</label>
                                    <input type="text" name="home_title" class="form-control input-default" value="{{ $homecontent->home_title }}">
                                    @error('home_title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                {{-- Home Sub Title input field. --}}
                                <div class="form-group">
                                    <label class="info-title">Home Sub Title</label>
                                    <input type="text" name="home_subtitle" class="form-control input-default" value="{{ $homecontent->home_subtitle }}">
                                    @error('home_subtitle') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                {{-- Tech Description textarea (Summernote enabled). --}}
                                <div class="form-group">
                                    <label class="info-title">Tech Description</label>
                                    <textarea class="form-control" name="tech_description" id="summernote">{{ $homecontent->tech_description }}</textarea>
                                </div>

                                {{-- Total Student input field. --}}
                                <div class="form-group">
                                    <label class="info-title">Total Student</label>
                                    <input type="text" name="total_student" class="form-control input-default" value="{{ $homecontent->total_student }}">
                                    @error('total_student') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                {{-- Total Course input field. --}}
                                <div class="form-group">
                                    <label class="info-title">Total Course</label>
                                    <input type="text" name="total_course" class="form-control input-default" value="{{ $homecontent->total_course }}">
                                    @error('total_course') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                {{-- Total Review input field. --}}
                                <div class="form-group">
                                    <label class="info-title">Total Review</label>
                                    <input type="text" name="total_review" class="form-control input-default" value="{{ $homecontent->total_review }}">
                                    @error('total_review') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                {{-- Video Description textarea (Summernote enabled). --}}
                                <div class="form-group">
                                    <label class="info-title">Video Description</label>
                                    <textarea class="form-control" name="video_description" id="summernote2">{{ $homecontent->video_description }}</textarea>
                                </div>

                                {{-- Video URL input field. --}}
                                <div class="form-group">
                                    <label class="info-title">Video URL</label>
                                    <input type="text" name="video_url" class="form-control input-default" value="{{ $homecontent->video_url }}">
                                    @error('video_url') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                {{-- Submit button to update home content. --}}
                                <input type="submit" class="btn btn-success" value="Update Home Content">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Summernote CSS and JS inclusion for rich text editing. --}}
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
    $('#summernote').summernote({ height: 200 }); // Initialize Summernote for Tech Description.
    $('#summernote2').summernote({ height: 200 }); // Initialize Summernote for Video Description.
</script>

@endsection 