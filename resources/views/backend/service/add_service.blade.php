@extends('admin.admin_master') {{-- Extends the admin master layout --}}
@section('admin') {{-- Defines the content section for this view --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> {{-- Includes jQuery library --}}

<div class="content-body" style="min-height: 788px;"> {{-- Main content wrapper --}}
    <div class="container-fluid"> {{-- Bootstrap container for fluid layout --}}
        {{-- Empty modal for adding projects (placeholder) --}}
        <div class="modal fade" id="addProjectSidebar"> </div>

        <div class="row page-titles mx-0"> {{-- Row for page titles/breadcrumbs --}}
            {{-- Placeholder for content within page titles --}}
        </div>

        <div class="row"> {{-- Main row for the "Add Service" form --}}
            <div class="col-xl-12 col-lg-12"> {{-- Full-width column for the card --}}
                <div class="card"> {{-- Card component --}}
                    <div class="card-header">
                        <h4 class="card-title">Add Service</h4> {{-- Card title --}}
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="post" action="{{ route('service.store') }}" enctype="multipart/form-data"> {{-- Form to submit new service data --}}
                                @csrf {{-- CSRF token for security --}}

                                <div class="form-group">
                                    <label class="info-title">Service Name</label>
                                    <input type="text" name="service_name" class="form-control input-default">
                                    @error('service_name') {{-- Displays validation error for service_name --}}
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="info-title">Service Description</label>
                                    <textarea name="service_description" class="form-control" rows="4" id="comment"></textarea>
                                    @error('service_description') {{-- Displays validation error for service_description --}}
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="service_logo" class="custom-file-input" id="image"> {{-- File input for service logo --}}
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <img id="showImage" src="{{ url('upload/no_image.jpg') }}" style="width: 100px; height: 100px;"> {{-- Image preview area --}}
                                </div>

                                <input type="submit" class="btn btn-success" value="Add Service"> {{-- Submit button --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    // jQuery script to display image preview when file is selected
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

@endsection {{-- Ends the content section --}}