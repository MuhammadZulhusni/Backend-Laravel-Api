@extends('admin.admin_master') {{-- Extends the main admin master layout. --}}
@section('admin') {{-- Designates this content to be injected into the 'admin' section of the master layout. --}}

<div class="content-body" style="min-height: 788px;"> {{-- Main content area. --}}
    <div class="container-fluid"> {{-- Bootstrap container for fluid layout. --}}

        {{-- Row for page titles and breadcrumbs. --}}
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    {{-- Placeholder for welcome text or page title. --}}
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                {{-- Placeholder for action buttons or additional page title elements. --}}
            </div>
        </div>

        {{-- Row for the main content card displaying project data. --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Project Page</h4> {{-- Title of the card. --}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th><strong>Project Name</strong></th>
                                        <th><strong>Project Description</strong></th>
                                        <th><strong>Project Img One</strong></th>
                                        <th></th> {{-- Column for actions. --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Loop through each project item to display its details. --}}
                                    @foreach($projects as $item)
                                        <tr>
                                            <td> {{ $item->project_name }} </td> {{-- Displays the project name. --}}
                                            <td>{{ Str::limit($item->project_description, 15, '..') }} </td> {{-- Displays a truncated project description. --}}
                                            <td> <img src="{{ asset($item->img_one) }}" style="width: 70px; height: 40px;"> </td> {{-- Displays the first project image. --}}
                                            <td>
                                                <div class="d-flex">
                                                    {{-- Link to edit the project. --}}
                                                    <a href="{{ route('edit.project',$item->id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                    {{-- Link to delete the project. --}}
                                                    <a href="{{ route('delete.project',$item->id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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

@endsection