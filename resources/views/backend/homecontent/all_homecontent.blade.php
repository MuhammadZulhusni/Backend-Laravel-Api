@extends('admin.admin_master') {{-- Extends the main admin layout template. --}}
@section('admin') {{-- Defines the section where the page's content will be injected. --}}

<div class="content-body" style="min-height: 788px;"> {{-- Main content area of the page. --}}
    <div class="container-fluid"> {{-- Bootstrap fluid container for responsive layout. --}}

        {{-- Add Project Modal (currently an empty placeholder). --}}
        <div class="modal fade" id="addProjectSidebar">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header"></div>
                    <div class="modal-body"></div>
                </div>
            </div>
        </div>

        {{-- Page titles and breadcrumbs section (currently minimal content). --}}
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text"></div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex"></div>
        </div>

        {{-- Row for the main content card displaying home page content. --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Home Page Content</h4> {{-- Title of the card. --}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th><strong>Home Title</strong></th>
                                        <th><strong>Home Sub Title</strong></th>
                                        <th><strong>Tech Description</strong></th>
                                        <th></th> {{-- Column for action buttons. --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Loop through each home content item to display its data. --}}
                                    @foreach($homecontent as $item)
                                        <tr>
                                            <td> {{ $item->home_title }} </td> {{-- Displays the home title. --}}
                                            <td> {{ $item->home_subtitle }} </td> {{-- Displays the home subtitle. --}}
                                            <td>{!! Str::limit($item->tech_description, 15, '..') !!} </td> {{-- Displays truncated HTML content for tech description. --}}
                                            <td>
                                                <div class="d-flex">
                                                    {{-- Link to edit the home content. --}}
                                                    <a href="{{ route('edit.homecontent',$item->id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                    {{-- Link to delete the home content. --}}
                                                    <a href="{{ route('delete.homecontent',$item->id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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