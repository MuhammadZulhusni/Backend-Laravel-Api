@extends('admin.admin_master') {{-- Extends the main admin layout --}}
@section('admin') {{-- Defines the content section for this page --}}

<div class="content-body" style="min-height: 788px;">
    <div class="container-fluid">
        {{-- Modal for adding projects (currently empty) --}}
        <div class="modal fade" id="addProjectSidebar">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        {{-- Header content for the modal --}}
                    </div>
                    <div class="modal-body">
                        {{-- Body content for the modal --}}
                    </div>
                </div>
            </div>
        </div>
        {{-- Page titles and breadcrumb section (currently empty) --}}
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    {{-- Welcome text content --}}
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                {{-- Right-aligned content --}}
            </div>
        </div>
        {{-- Main content row --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Information Page</h4> {{-- Card title --}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th><strong>About</strong></th>
                                        <th><strong>Refund Policy</strong></th>
                                        <th><strong>Trems And Condition</strong></th>
                                        <th><strong>Privacy And Policy</strong></th>
                                        <th></th> {{-- Action column header --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Loop through each item in the $result collection --}}
                                    @foreach($result as $item)
                                    <tr>
                                        {{-- Display 'about' content, limited to 20 characters, unescaped to render HTML --}}
                                        <td>{!! Str::limit($item->about, 20, '..') !!}</td>
                                        {{-- Display 'refund' content, limited to 20 characters, unescaped to render HTML --}}
                                        <td>{!! Str::limit($item->refund, 20, '..') !!}</td>
                                        {{-- Display 'trems' content, limited to 20 characters, unescaped to render HTML --}}
                                        <td>{!! Str::limit($item->trems, 20, '..') !!}</td>
                                        {{-- Display 'privacy' content, limited to 20 characters, unescaped to render HTML --}}
                                        <td>{!! Str::limit($item->privacy, 20, '..') !!}</td>
                                        <td>
                                            <div class="d-flex">
                                                {{-- Edit button linking to the edit route --}}
                                                <a href="{{ route('edit.information',$item->id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                {{-- Delete button linking to the delete route --}}
                                                <a href="{{ route('delete.information',$item->id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach {{-- Ends the foreach loop --}}
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