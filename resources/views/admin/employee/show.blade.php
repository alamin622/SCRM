@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">View HRm Employee</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('employee.index') }}">HRM Employee list</a></li>
                        <li class="breadcrumb-item active">View HRM Employee</li>
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
                                <h3 class="card-title">View HRM Employee</h3>
                                <a href="{{ route('employee.index') }}" class="btn btn-primary">Go Back to HRM Employee List</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                          <div class="card-body">
                                <h5 class="card-header" style="background-color: #999999; text-align: center";>Profile Information</h5>

                                    <table class="table table-bordered table-primar">
                                        <tbody>
                                        <tr>
                                            <th style="width: 200px"> Name</th>
                                            <td>{{ optional($employee->user)->name }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px"> Nick Name</th>
                                            <td>{{ optional($employee->user)->nickname }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px"> Employee ID</th>
                                            <td>{{ $employee->emp_id }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px">phone</th>
                                            <td>{{ $employee->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px">Email</th>
                                            <td>{{ optional($employee->user)->email  }}</td>
                                        </tr>

                                            <th style="width: 200px">Present Address</th>
                                            <td>{{ $employee->present_address }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px">Permanent Address</th>
                                            <td>{{ $employee->permanent_address }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px">Image</th>
                                            <td>
                                                <div style="max-width: 70px; max-height:70px;overflow:hidden">
                                                    <img src="{{ asset($employee->image) }}" class="img-fluid img-rounded" alt="">
                                                </div>
                                            </td>
                                        </tr>


                                        <tr>
                                            <th style="width: 200px">Religion</th>
                                            <td>{{ $employee->religion }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px">Birth Date</th>
                                            <td>{{ $employee->birthdate }}</td>
                                        </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card-body">
                                    <h5 class="card-header" style="background-color: #999999; text-align: center";>Job  Information</h5>
                                    <table class="table table-bordered table-primar">
                                        <tbody>

                                    <tr>
                                        <th style="width: 200px">Nid Number</th>
                                        <td>{{ $employee->nid_number }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 200px">Business Year</th>
                                        <td>{{ $employee->business_year }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 200px">Shop Name</th>
                                        <td>{{ $employee->shop_name }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 200px">Nid image</th>
                                        <td>
                                            <div style="max-width: 70px; max-height:70px;overflow:hidden">
                                                <img src="{{ asset($employee->nid_image) }}" class="img-fluid img-rounded" alt="">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 200px">Occupation</th>
                                        <td>{{ $employee->occupation }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 200px">Shop image</th>
                                        <td>
                                            <div style="max-width: 70px; max-height:70px;overflow:hidden">
                                                <img src="{{ asset($employee->shop_image) }}" class="img-fluid img-rounded" alt="">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 200px">Division</th>
                                        <td>{{ optional($employee->division)->name }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 200px">Zone</th>
                                        <td>{{ optional($employee->zone)->name }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 200px">Area</th>
                                        <td>{{optional ($employee->area)->name }}</td>
                                    </tr>

                                        </tbody>
                                    </table>
                                </div>
                        </div>
                        </div>
                            <div class="col-lg-6">
                            <div class="card-body">
                                <h5 class="card-header" style="background-color: #999999; text-align: center";>Family Information</h5>

                                    <table class="table table-bordered table-primar">
                                        <tbody>
                                        <tr>
                                            <th style="width: 200px">Marriage DOB</th>
                                            <td>{{ $employee->marriage_dob }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px">Family Member</th>
                                            <td>{{ $employee->family_member }}</td>
                                        </tr>

                                        <tr>
                                            <th style="width: 200px">Father Name</th>
                                            <td>{{ $employee->father_name }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px"> Mother Name</th>
                                            <td>{{ $employee->mother_name }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px">Children DOB</th>
                                            <td>{{ $employee->children_dob }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px">Children DOB</th>
                                            <td>{{ $employee->number_of_children }}</td>
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
