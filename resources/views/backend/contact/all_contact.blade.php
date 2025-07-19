@extends('admin.admin_master') {{-- Extends the main admin layout. --}}
@section('admin') {{-- Defines the section for this page's content. --}}

<div class="content-body" style="min-height: 788px;">
    <div class="container-fluid">
        {{-- Modal and page title boilerplate removed for brevity. --}}
        {{-- If there's an actual modal or page title section, it would be structured here. --}}

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Contact Message Page </h4> {{-- Page title displayed on the card. --}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th><strong>Name </strong></th>
                                        <th><strong>Email </strong></th>
                                        <th><strong>Message </strong></th>
                                        <th></th> {{-- Column for action buttons. --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($contact as $item) {{-- Loops through each contact message item. --}}
                                    <tr>
                                        <td> {{ $item->name }} </td> {{-- Displays the sender's name. --}}
                                        <td> {{ $item->email }} </td> {{-- Displays the sender's email. --}}
                                        <td>{{ Str::limit($item->message, 30, '..') }} </td> {{-- Displays a truncated version of the message. --}}
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('delete.message',$item->id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a> {{-- Delete button for the contact message. --}}
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