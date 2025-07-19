@extends('admin.admin_master') {{-- Extends the main admin layout. --}}
@section('admin') {{-- Defines the section for this page's content. --}}

{{-- Includes jQuery library. This is typically placed in the head or just before the closing </body> tag in the master layout for better performance. --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="content-body" style="min-height: 788px;">
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Footer </h4> {{-- Page title displayed within the card header. --}}
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="post" action="{{ route('footer.update') }}"> {{-- Form to update footer details. --}}
                                @csrf {{-- CSRF token for security. Essential for all POST forms in Laravel. --}}

                                <input type="hidden" name="id" value="{{ $footer->id }}"> {{-- Hidden input field to pass the footer ID for the update operation. --}}

                                {{-- Form Group: Footer Address --}}
                                <div class="form-group">
                                    <label class="info-title">Footer Address </label>
                                    <textarea name="address" class="form-control" rows="4" id="comment">{{ $footer->address }}</textarea> {{-- Textarea for footer address, pre-filled with existing data. --}}
                                    @error('address') {{-- Displays validation error message if the 'address' field fails validation. --}}
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Form Group: Footer Email --}}
                                <div class="form-group">
                                    <label class="info-title">Footer Email </label>
                                    <input type="email" name="email" class="form-control input-default " value="{{ $footer->email }}"> {{-- Input field for footer email, pre-filled. --}}
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Form Group: Footer Phone --}}
                                <div class="form-group">
                                    <label class="info-title">Footer Phone </label>
                                    <input type="text" name="phone" class="form-control input-default " value="{{ $footer->phone }}"> {{-- Input field for footer phone number, pre-filled. --}}
                                    @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Form Group: Facebook Link --}}
                                <div class="form-group">
                                    <label class="info-title">Facebook </label>
                                    <input type="text" name="facebook" class="form-control input-default " value="{{ $footer->facebook }}"> {{-- Input field for Facebook social link, pre-filled. --}}
                                    @error('facebook')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Form Group: YouTube Link --}}
                                <div class="form-group">
                                    <label class="info-title">Youtube </label>
                                    <input type="text" name="youtube" class="form-control input-default " value="{{ $footer->youtube }}"> {{-- Input field for YouTube social link, pre-filled. --}}
                                    @error('youtube')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Form Group: Twitter Link --}}
                                <div class="form-group">
                                    <label class="info-title">Twitter </label>
                                    <input type="text" name="twitter" class="form-control input-default " value="{{ $footer->twitter }}"> {{-- Input field for Twitter social link, pre-filled. --}}
                                    @error('twitter')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Form Group: Footer Credit --}}
                                <div class="form-group">
                                    <label class="info-title">Footer Credit </label>
                                    <input type="text" name="footer_credit" class="form-control input-default " value="{{ $footer->footer_credit }}"> {{-- Input field for the footer credit text, pre-filled. --}}
                                    @error('footer_credit')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <input type="submit" class="btn btn-success" value="Update Footer"> {{-- Submit button to update the footer information. --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- jQuery script for image preview. This script is included in the original code, but appears to be misplaced here as there is no image upload field on this specific 'Edit Footer' form. It would be relevant if there was an 'client_img' field as seen in 'Add Review' or 'Edit Review' pages. It's kept here for structural integrity with the provided snippet. --}}
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