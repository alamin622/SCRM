@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Profile management Info List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                        <li class="breadcrumb-item active">Profile management Info list</li>
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
                    <div id="" class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Profile management Info List</h3>
                                <a href="{{ route('employeecustomer.create') }}" class="btn btn-primary">Create Profile management Info</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 10px">Sl No.</th>
                                    <th>Image</th>
                                    <th> Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Present Address</th>
                                    <th>Permanent Address</th>
                                    <th>Nid Number</th>
                                    <th>Religion</th>
                                    <th style="width: 130px">Created Date</th>
                                    <th style="width: 40px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($customers->count())


                                    @foreach ($customers as $customer)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>


                                            {{--<td>
                                                <ul class="list-inline d-flex" >
                                                    @foreach($customer->attachments as $attachment)
                                                        <li class="list-inline-item" >
                                                            <img width="100px" src="{{ asset($attachment->path) }}" class="img-fluid img-rounded" alt="">
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </td>--}}
                                            <td>
                                                <div style="max-width: 70px; max-height:70px;overflow:hidden">
                                                    <img src="{{ asset($customer->image) }}" class="img-fluid img-rounded" alt="">
                                                </div>
                                            </td>
                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $customer->phone }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td>{{ $customer->present_address }}</td>
                                            <td>{{ $customer->permanent_address }}</td>
                                            <td>{{ $customer->nid_number }}</td>
                                            <td>{{ $customer->religion }}</td>
                                            <td>{{ $customer->created_at }}</td>
                                            <td class="d-flex">
                                                <a href="{{ route('employeecustomer.show', [$customer->id]) }}" class="btn btn-sm btn-success mr-1"> <i class="fas fa-eye"></i> </a>
                                                <a href="{{ route('employeecustomer.edit', [$customer->id]) }}" class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="30">
                                            <h5 class="text-center">No Profile management Info found.</h5>
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer d-flex justify-content-center">
                            {{ $customers->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script>

    </script>
@endsection
