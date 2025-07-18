@extends('admin.admin_master') {{-- Extends the main admin layout --}}
@section('admin') {{-- Defines the content section for this page --}}

<div class="content-body" style="min-height: 788px;">
    <div class="container-fluid">
        {{-- Modal for adding projects (currently empty/unused in this context) --}}
        <div class="modal fade" id="addProjectSidebar">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        {{-- Modal header content --}}
                    </div>
                    <div class="modal-body">
                        {{-- Modal body content --}}
                    </div>
                </div>
            </div>
        </div>

        {{-- Page titles and breadcrumb section (content omitted) --}}
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                {{-- Left-aligned content for page titles --}}
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                {{-- Right-aligned content for page titles --}}
            </div>
        </div>

        {{-- Main content row for adding information --}}
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Information</h4> {{-- Card title for the form --}}
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            {{-- Form to add new information --}}
                            <form method="post" action="{{ route('information.store') }}">
                                @csrf {{-- CSRF token for security --}}

                                {{-- Textarea for 'About' information, using Summernote editor --}}
                                <div class="form-group">
                                    <label class="info-title">About Information</label>
                                    <textarea class="form-control" name="about" id="summernote"></textarea>
                                </div>

                                {{-- Textarea for 'Refund Policy', using Summernote editor --}}
                                <div class="form-group">
                                    <label class="info-title">Refund Policy</label>
                                    <textarea class="form-control" name="refund" id="summernote2"></textarea>
                                </div>

                                {{-- Textarea for 'Terms and Condition', using Summernote editor --}}
                                <div class="form-group">
                                    <label class="info-title">Trems And Condition</label>
                                    <textarea class="form-control" name="trems" id="summernote3"></textarea>
                                </div>

                                {{-- Textarea for 'Privacy and Policy', using Summernote editor --}}
                                <div class="form-group">
                                    <label class="info-title">Privacy And Policy</label>
                                    <textarea class="form-control" name="privacy" id="summernote4"></textarea>
                                </div>

                                {{-- Submit button for the form --}}
                                <input type="submit" class="btn btn-success" value="Add Information">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Summernote CSS and JavaScript includes --}}
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

{{-- Initialize Summernote editor for 'about' field --}}
<script type="text/javascript">
    $('#summernote').summernote({
        height: 400
    });
</script>

{{-- Initialize Summernote editor for 'refund' field --}}
<script type="text/javascript">
    $('#summernote2').summernote({
        height: 400
    });
</script>

{{-- Initialize Summernote editor for 'trems' field --}}
<script type="text/javascript">
    $('#summernote3').summernote({
        height: 400
    });
</script>

{{-- Initialize Summernote editor for 'privacy' field --}}
<script type="text/javascript">
    $('#summernote4').summernote({
        height: 400
    });
</script>

@endsection {{-- Ends the content section --}}