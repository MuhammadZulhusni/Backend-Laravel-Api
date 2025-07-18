@extends('admin.admin_master') {{-- Extends the admin layout --}}
@section('admin') {{-- Content section --}}

<div class="content-body" style="min-height: 788px;"> {{-- Main content area --}}
    <div class="container-fluid"> {{-- Page content container --}}
        {{-- Empty modal for adding projects --}}
        <div class="modal fade" id="addProjectSidebar"> </div>

        <div class="row page-titles mx-0"> {{-- Page title row --}}
            {{-- Placeholder for title and buttons --}}
        </div>

        <div class="row"> {{-- Services display row --}}
            <div class="col-lg-12"> {{-- Full-width column for services card --}}
                <div class="card"> {{-- Card for service data --}}
                    <div class="card-header">
                        <h4 class="card-title">Service Page</h4> {{-- Card title --}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive"> {{-- Responsive table wrapper --}}
                            <table class="table table-responsive-md"> {{-- Services table --}}
                                <thead>
                                    <tr>
                                        <th><strong>Service Name</strong></th>
                                        <th><strong>Service Description</strong></th>
                                        <th><strong>Service Logo</strong></th>
                                        <th></th> {{-- Actions column --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Loop through each service item --}}
                                    @foreach($service as $item)
                                    <tr>
                                        <td> {{ $item->service_name }} </td> {{-- Service name --}}
                                        <td>{{ Str::limit($item->service_description, 15, '..') }} </td> {{-- Short description --}}
                                        <td> <img src="{{ asset($item->service_logo) }}" style="width: 70px; height: 40px;"> </td> {{-- Service logo --}}
                                        <td>
                                            <div class="d-flex"> {{-- Edit and Delete buttons --}}
                                                <a href="{{ route('edit.service',$item->id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a> {{-- Edit button --}}
                                                <a href="{{ route('delete.service',$item->id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a> {{-- Delete button --}}
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach {{-- End loop --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection {{-- End content section --}}