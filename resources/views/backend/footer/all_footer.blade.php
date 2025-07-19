@extends('admin.admin_master') {{-- Extends the main admin layout. --}}
@section('admin') {{-- Defines the section for this page's content. --}}

<div class="content-body" style="min-height: 788px;">
    <div class="container-fluid">
        {{-- Modal and page title boilerplate removed for brevity. --}}

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Footer Content Page </h4> {{-- Page title. --}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th><strong>Footer Address </strong></th>
                                        <th><strong>Footer Email</strong></th>
                                        <th><strong>Footer Phone</strong></th>
                                        <th></th> {{-- Column for action buttons. --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($footer as $item) {{-- Loops through each footer item. --}}
                                    <tr>
                                        <td>{{ Str::limit($item->address, 25, '..') }} </td> {{-- Displays truncated footer address. --}}
                                        <td> {{ $item->email }} </td> {{-- Displays footer email. --}}
                                        <td> {{ $item->phone }} </td> {{-- Displays footer phone number. --}}
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('edit.footer',$item->id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a> {{-- Edit button for the footer item. --}}
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