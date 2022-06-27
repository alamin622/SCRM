@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">View Divisional Incharge</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('sales_incharge.index') }}">Sales Incharge list</a></li>
                        <li class="breadcrumb-item active">View Sales Incharge</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">View Sales Incharge</h3>
                                <a href="{{ route('sales_incharge.index') }}" class="btn btn-primary">Go Back to Sales Incharge List</a>
                            </div>
                        </div>

                        <div class="col-lg-12 d-flex justify-content-center " >
                            <div class="col-lg-8  ">
                          <div class="card-body text-center " >

                                <h5 class="card-header" style="background-color: #999999; text-align: center";>Personal Information</h5>

                                    <table class="table table-bordered table-primar  ">
                                        <tbody>

                                        <tr>
                                            <th style="width: 200px">Employee Name </th>
                                            <td>{{ optional(optional($salesIncharge->employee)->user)->name }} </td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px">Office Type</th>
                                            <td>{{ $salesIncharge->office_type }}</td>
                                        </tr>
                                            <tr>
                                                <th style="width: 200px">Created At</th>
                                                <td>{{ $salesIncharge->created_at }}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 200px">Updated At</th>
                                                <td>{{ $salesIncharge->updated_at }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            </div>

                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>
@endsection
