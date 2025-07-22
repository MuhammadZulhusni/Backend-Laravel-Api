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
                        <h4 class="card-title">Chart Content Page </h4> {{-- Page title displayed on the card. --}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th><strong>Technology </strong></th>
                                        <th><strong>Projects</strong></th>
                                        <th></th> {{-- Column for action buttons. --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($chart as $item) {{-- Loops through each chart item. --}}
                                    <tr>
                                        <td> {{ $item->x_data }} </td> {{-- Displays the technology name (x-axis data). --}}
                                        <td> {{ $item->y_data }} </td> {{-- Displays the number of projects (y-axis data). --}}
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('edit.chart',$item->id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a> {{-- Edit button for the chart item. --}}
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