@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">View Profile Management Info</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('customer.index') }}">Profile Management Info list</a></li>
                        <li class="breadcrumb-item active">View Profile Management Info</li>
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
                                <h3 class="card-title">View Profile Management Info</h3>
                                <a href="{{ route('customer.index') }}" class="btn btn-primary">Go Back to Profile Management Info List</a>
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
                                            <td>{{ $customer->name }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px"> Nick Name</th>
                                            <td>{{ $customer->nickname }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px"> Customer ID</th>
                                            <td>{{ $customer->cus_id }}</td>
                                        </tr>

                                        <tr>
                                            <th style="width: 200px">phone</th>
                                            <td>{{ $customer->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px">Email</th>
                                            <td>{{ $customer->email  }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px">Present Address</th>
                                            <td>{{ $customer->present_address }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px">Permanent Address</th>
                                            <td>{{ $customer->permanent_address }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px">Image</th>
                                            <td>
                                                <div style="max-width: 70px; max-height:70px;overflow:hidden">
                                                    <img src="{{ asset($customer->image) }}" class="img-fluid img-rounded" alt="">
                                                </div>
                                            </td>
                                           {{-- <td>
                                                <ul class="list-inline">

                                                    @foreach($customer->attachments as $attachment)
                                                        <li class="list-inline-item">
                                                            <img width="70px" height="80px" src="{{ asset($attachment->path) }}" class="img-fluid img-rounded" alt="">
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </td>--}}
                                        </tr>


                                        <tr>
                                            <th style="width: 200px">Religion</th>
                                            <td>{{ $customer->religion }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px">Birth Date</th>
                                            <td>{{ $customer->birthdate }}</td>
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
                                        <th style="width: 200px">Category Name</th>
                                        <td>{{optional($customer->category)->name }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 200px">Business Year</th>
                                        <td>{{ $customer->business_year }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 200px">Shop Name</th>
                                        <td>{{ $customer->shop_name }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 200px">Nid Number</th>
                                        <td>{{ $customer->nid_number }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 200px">Nid image</th>
                                        <td>
                                            <div style="max-width: 70px; max-height:70px;overflow:hidden">
                                                <img src="{{ asset($customer->nid_image) }}" class="img-fluid img-rounded" alt="">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 200px">Occupation</th>
                                        <td>{{ $customer->occupation }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 200px">Shop image</th>
                                        <td>
                                            <div style="max-width: 70px; max-height:70px;overflow:hidden">
                                                <img src="{{ asset($customer->shop_image) }}" class="img-fluid img-rounded" alt="">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 200px">Division</th>
                                        <td>{{optional ($customer->division)->name }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 200px">Zone</th>
                                        <td>{{optional ($customer->zone)->name }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 200px">Area</th>
                                        <td>{{ optional($customer->area)->name }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 200px">Customer Type </th>
                                        <td>{{optional($customer->type)->name }}</td>
                                    </tr>
                                    <table class="table table-bordered table-primar">
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <div class="col-lg-6">
                            <div class="card-body">
                                <h5 class="card-header" style="background-color: #999999; text-align: center";>Family Information</h5>

                                    <table class="table table-bordered table-primar">
                                        <tbody>
                                        <tr>
                                            <th style="width: 200px">Marriage DOB</th>
                                            <td>{{ $customer->marriage_dob }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px">Family Member</th>
                                            <td>{{ $customer->family_member }}</td>
                                        </tr>

                                        <tr>
                                            <th style="width: 200px">Father Name</th>
                                            <td>{{ $customer->father_name }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px"> Mother Name</th>
                                            <td>{{ $customer->mother_name }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px">Children DOB</th>
                                            <td>{{ $customer->children_dob }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px">Children DOB</th>
                                            <td>{{ $customer->number_of_children }}</td>
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
