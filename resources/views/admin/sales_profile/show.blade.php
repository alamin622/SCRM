@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">View Sales Profile Info</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('sales_profile.index') }}">Sales Profile Info list</a></li>
                        <li class="breadcrumb-item active">View Sales Profile Info</li>
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
                                <h3 class="card-title">View Sales Profile Info</h3>
                                <a href="{{ route('sales_profile.index') }}" class="btn btn-primary">Go Back to Sales Profile Info List</a>
                            </div>
                        </div>

                        <div class="col-lg-12 d-flex" >
                            <div class="col-lg-6">
                          <div class="card-body">

                                <h5 class="card-header" style="background-color: #999999; text-align: center";>Personal Information</h5>

                                    <table class="table table-bordered table-primar">
                                        <tbody>

                                        <tr>
                                            <th style="width: 200px"> Name</th>
                                            <td>{{ $salesProfile->name }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px">phone</th>
                                            <td>{{ $salesProfile->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px">Email</th>
                                            <td>{{ $salesProfile->email  }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px">Present Address</th>
                                            <td>{{ $salesProfile->present_address }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px">Permanent Address</th>
                                            <td>{{ $salesProfile->permanent_address }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px">Image</th>
                                            <td>
                                                <div style="max-width: 70px; max-height:70px;overflow:hidden">
                                                    <img src="{{ asset($salesProfile->image) }}" class="img-fluid img-rounded" alt="">
                                                </div>
                                            </td>
                                        </tr>


                                        <tr>
                                            <th style="width: 200px">Religion</th>
                                            <td>{{ $salesProfile->religion }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px">Birth Date</th>
                                            <td>{{ $salesProfile->birthdate }}</td>
                                        </tr>


                                        <tr>
                                            <th style="width: 200px">Marriage DOB</th>
                                            <td>{{ $salesProfile->marriage_dob }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px">Family Member</th>
                                            <td>{{ $salesProfile->family_member }}</td>
                                        </tr>

                                        <tr>
                                            <th style="width: 200px">Father Name</th>
                                            <td>{{ $salesProfile->father_name }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px"> Mother Name</th>
                                            <td>{{ $salesProfile->mother_name }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px">Children DOB</th>
                                            <td>{{ $salesProfile->children_dob }}</td>
                                        </tr>

                                        </tbody>
                                    </table>

                          </div>
                            </div>
                            <div class="col-lg-6">
                            <div class="card-body">

                                <h5 class="card-header" style="background-color: #999999; text-align: center";>Others Information</h5>

                                    <table class="table table-bordered table-primar">
                                        <tbody>
                                        <tr>
                                            <th style="width: 200px">Nid Number</th>
                                            <td>{{ $salesProfile->nid_number }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px">Nid image</th>
                                            <td>
                                                <div style="max-width: 70px; max-height:70px;overflow:hidden">
                                                    <img src="{{ asset($salesProfile->nid_image) }}" class="img-fluid img-rounded" alt="">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px">Occupation</th>
                                            <td>{{ $salesProfile->occupation }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px">Shop image</th>
                                            <td>
                                                <div style="max-width: 70px; max-height:70px;overflow:hidden">
                                                    <img src="{{ asset($salesProfile->shop_image) }}" class="img-fluid img-rounded" alt="">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th style="width: 200px">Division</th>
                                            <td>{{ ($salesProfile->division)->name }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px">Zone</th>
                                            <td>{{ ($salesProfile->zone)->name }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px">Area</th>
                                            <td>{{ ($salesProfile->area)->name }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px">$salesProfile Type </th>
                                            <td>{{optional($salesProfile->type)->name }}</td>
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
