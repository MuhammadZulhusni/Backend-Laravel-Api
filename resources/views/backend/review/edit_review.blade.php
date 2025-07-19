@extends('admin.admin_master') {{-- Extends the admin master layout --}}
@section('admin') {{-- Defines the content section for this page --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> {{-- Includes jQuery library --}}

<div class="content-body" style="min-height: 788px;"> {{-- Main content wrapper --}}
    <div class="container-fluid"> {{-- Fluid container for responsive layout --}}
        <div class="modal fade" id="addProjectSidebar"> {{-- Modal for adding a project (empty) --}}
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header"></div> {{-- Empty modal header --}}
                    <div class="modal-body"></div> {{-- Empty modal body --}}
                </div>
            </div>
        </div>

        <div class="row page-titles mx-0"> {{-- Row for page titles and breadcrumbs --}}
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text"></div> {{-- Welcome text area (empty) --}}
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex"></div> {{-- Right-aligned content (empty) --}}
        </div>

        <div class="row"> {{-- Content row for the edit review form --}}
            <div class="col-xl-12 col-lg-12"> {{-- Full-width column for the card --}}
                <div class="card"> {{-- Card component for editing a review --}}
                    <div class="card-header">
                        <h4 class="card-title">Edit Review </h4> {{-- Card title --}}
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="post" action="{{ route('review.update') }}" enctype="multipart/form-data"> {{-- Form to update a review, with file upload --}}
                                @csrf {{-- CSRF token for security --}}
                                <input type="hidden" name="id" value="{{ $review->id }}"> {{-- Hidden input for review ID --}}

                                <div class="form-group"> {{-- Form group for client title --}}
                                    <label class="info-title">Client Title </label> {{-- Label for client title --}}
                                    <input type="text" name="client_title" class="form-control input-default " value="{{ $review->client_title }}"> {{-- Input field for client title, pre-filled --}}
                                    @error('client_title') {{-- Displays validation error for client_title --}}
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group"> {{-- Form group for client description --}}
                                    <label class="info-title">Client Description </label> {{-- Label for client description --}}
                                    <textarea name="client_description" class="form-control" rows="4" id="comment">{{ $review->client_description }}</textarea> {{-- Textarea for client description, pre-filled --}}
                                    @error('client_description') {{-- Displays validation error for client_description --}}
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="input-group mb-3"> {{-- Input group for file upload --}}
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span> {{-- Upload button text --}}
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="client_img" class="custom-file-input" id="image"> {{-- File input for client image --}}
                                        <label class="custom-file-label">Choose file</label> {{-- Label for file input --}}
                                    </div>
                                </div>

                                <div class="form-group"> {{-- Form group for image preview --}}
                                    <img id="showImage" src="{{ asset($review->client_img) }}" style="width: 100px; height: 100px;"> {{-- Image preview, pre-filled with current image --}}
                                </div>

                                <input type="submit" class="btn btn-success" value="Update Review"> {{-- Submit button to update the review --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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

@endsection 