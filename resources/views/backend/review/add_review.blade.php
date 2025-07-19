@extends('admin.admin_master') {{-- Extends the main admin layout --}}
@section('admin') {{-- Defines the section for admin-specific content --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> {{-- Includes jQuery library --}}


<div class="content-body" style="min-height: 788px;"> {{-- Main content wrapper --}}
    <div class="container-fluid"> {{-- Bootstrap container for fluid layout --}}
        <div class="modal fade" id="addProjectSidebar"> {{-- Modal for adding a project (currently empty) --}}
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        {{-- Modal header content (empty) --}}
                    </div>
                    <div class="modal-body">
                        {{-- Modal body content (empty) --}}
                    </div>
                </div>
            </div>
        </div>


        <div class="row page-titles mx-0"> {{-- Row for page titles and breadcrumbs --}}
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    {{-- Welcome text area (empty) --}}
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                {{-- Area for right-aligned elements (empty) --}}
            </div>
        </div>

        <div class="row"> {{-- Content row --}}

            <div class="col-xl-12 col-lg-12"> {{-- Column spanning full width on extra large and large screens --}}
                <div class="card"> {{-- Card component --}}
                    <div class="card-header">
                        <h4 class="card-title">Add Review </h4> {{-- Card title --}}
                    </div>
                    <div class="card-body">
                        <div class="basic-form"> {{-- Basic form styling --}}
                            <form method="post" action="{{ route('review.store') }}" enctype="multipart/form-data"> {{-- Form for adding a review, submits to 'review.store' route with file upload support --}}
                                @csrf {{-- CSRF token for security --}}

                                <div class="form-group"> {{-- Form group for client title --}}
                                    <label class="info-title">Client Title </label> {{-- Label for client title --}}
                                    <input type="text" name="client_title" class="form-control input-default "> {{-- Input field for client title --}}
                                    @error('client_title') {{-- Displays validation error for client_title --}}
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group"> {{-- Form group for client description --}}
                                    <label class="info-title">Client Description </label> {{-- Label for client description --}}
                                    <textarea name="client_description" class="form-control" rows="4" id="comment"></textarea> {{-- Textarea for client description --}}
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
                                @error('client_img') {{-- Displays validation error for client_img --}}
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <div class="form-group"> {{-- Form group for image preview --}}
                                    <img id="showImage" src="{{ url('upload/no_image.jpg') }}" style="width: 100px; height: 100px;"> {{-- Image preview with a default placeholder --}}
                                </div>

                                <input type="submit" class="btn btn-success" value="Add Review"> {{-- Submit button to add the review --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Closing divs for previous sections --}}
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