@extends('admin.admin_master') {{-- Extends the main admin layout. --}}
@section('admin') {{-- Defines the section for this page's content. --}}

{{-- Includes jQuery library. This is typically placed in the head or just before the closing </body> tag in the master layout for better performance. --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="content-body" style="min-height: 788px;">
    <div class="container-fluid">
        {{-- The modal and page title boilerplate comments were removed for brevity, assuming they are either handled elsewhere or not critical to this specific form's organization. --}}

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Chart </h4> {{-- Page title displayed within the card header. --}}
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="post" action="{{ route('chart.update') }}"> {{-- Form to update chart details. --}}
                                @csrf {{-- CSRF token for security. Essential for all POST forms in Laravel. --}}

                                <input type="hidden" name="id" value="{{ $chart->id }}"> {{-- Hidden input field to pass the chart ID for the update operation. --}}

                                {{-- Form Group: Technology --}}
                                <div class="form-group">
                                    <label class="info-title">Technology </label>
                                    <input type="text" name="Techonology" class="form-control input-default " value="{{ $chart->x_data }}"> {{-- Input field for technology name, pre-filled with existing data. --}}
                                    @error('Techonology') {{-- Displays validation error message if the 'Techonology' field fails validation. --}}
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Form Group: Projects --}}
                                <div class="form-group">
                                    <label class="info-title">Projects </label>
                                    <input type="text" name="Projects" class="form-control input-default " value="{{ $chart->y_data }}"> {{-- Input field for number of projects, pre-filled. --}}
                                    @error('Projects')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <input type="submit" class="btn btn-success" value="Update Chart"> {{-- Submit button to update the chart information. --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection 