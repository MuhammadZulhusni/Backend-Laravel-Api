@extends('admin.admin_master') {{-- Extends the admin master layout --}}
@section('admin') {{-- Defines the content section for this page --}}

<div class="content-body" style="min-height: 788px;"> {{-- Main content wrapper with minimum height --}}
    <div class="container-fluid"> {{-- Fluid container for responsive layout --}}
        <div class="modal fade" id="addProjectSidebar"> {{-- Modal for adding a project (currently empty) --}}
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        {{-- Modal header placeholder --}}
                    </div>
                    <div class="modal-body">
                        {{-- Modal body placeholder --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row page-titles mx-0"> {{-- Row for page titles/breadcrumbs --}}
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    {{-- Welcome text placeholder --}}
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                {{-- Right-aligned content placeholder --}}
            </div>
        </div>
        <div class="row"> {{-- Content row for the review table --}}
            <div class="col-lg-12"> {{-- Full-width column for the card --}}
                <div class="card"> {{-- Card component for the review page --}}
                    <div class="card-header">
                        <h4 class="card-title">Review Page </h4> {{-- Card title --}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive"> {{-- Makes table responsive on small screens --}}
                            <table class="table table-responsive-md"> {{-- Table for displaying reviews --}}
                                <thead>
                                    <tr>
                                        <th><strong>Client Title </strong></th> {{-- Table header for client title --}}
                                        <th><strong>Client Description</strong></th> {{-- Table header for client description --}}
                                        <th><strong>Client Image</strong></th> {{-- Table header for client image --}}
                                        <th></th> {{-- Empty header for action buttons --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($review as $item) {{-- Loops through each review item --}}
                                    <tr>
                                        <td> {{ $item->client_title }} </td> {{-- Displays client title --}}
                                        <td>{{ Str::limit($item->client_description, 15, '..') }} </td> {{-- Displays truncated client description --}}
                                        <td> <img src="{{ asset($item->client_img) }}" style="width: 70px; height: 40px;"> </td> {{-- Displays client image --}}
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('edit.review',$item->id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a> {{-- Edit button --}}
                                                <a href="{{ route('delete.review',$item->id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a> {{-- Delete button --}}
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection {{-- Ends the content section --}}