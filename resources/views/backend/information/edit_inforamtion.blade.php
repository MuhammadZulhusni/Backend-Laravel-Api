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

                {{-- Main content row for editing information --}}
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Information</h4> {{-- Card title for the form --}}
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    {{-- Form to update existing information, linking to the update route with the information ID --}}
                                    <form method="post" action="{{ route('information.update',$information->id) }}" >
                                        @csrf {{-- CSRF token for security --}}

                                        {{-- Textarea for 'About' information, pre-filled with existing data and using Summernote editor --}}
                                        <div class="form-group">
                                            <label class="info-title">About Information </label>
                                            <textarea class="form-control" name="about" id="summernote">
                                                {{ $information->about }} {{-- Displays existing 'about' content --}}
                                            </textarea>
                                        </div>

                                        {{-- Textarea for 'Refund Policy', pre-filled with existing data and using Summernote editor --}}
                                        <div class="form-group">
                                            <label class="info-title">Refund Policy</label>
                                           <textarea class="form-control" name="refund" id="summernote2">
                                               {{ $information->refund }} {{-- Displays existing 'refund' content --}}
                                           </textarea>
                                        </div>

                                        {{-- Textarea for 'Terms and Condition', pre-filled with existing data and using Summernote editor --}}
                                        <div class="form-group">
                                            <label class="info-title">Trems And Condition</label>
                                            <textarea class="form-control" name="trems" id="summernote3">
                                                {{ $information->trems }} {{-- Displays existing 'trems' content --}}
                                            </textarea>
                                        </div>

                                        {{-- Textarea for 'Privacy and Policy', pre-filled with existing data and using Summernote editor --}}
                                        <div class="form-group">
                                            <label class="info-title">Privacy And Policy</label>
                                            <textarea class="form-control" name="privacy" id="summernote4">
                                                {{ $information->privacy }} {{-- Displays existing 'privacy' content --}}
                                            </textarea>
                                        </div>

                                        {{-- Submit button for the form --}}
                                        <input type="submit" class="btn btn-success" value="Update Information">
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