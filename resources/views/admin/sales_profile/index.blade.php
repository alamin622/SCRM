@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Sales Profile Info List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                        <li class="breadcrumb-item active">Sales Profile Info list</li>
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
                                <h3 class="card-title">Sales Profile Info List</h3>
                                <a href="{{ route('sales_profile.create') }}" class="btn btn-primary">Create Sales Profile Info</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 10px">Sl</th>
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
                                @if($sales_profiles->count())

                                    @foreach ($sales_profiles as $salesProfile)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                             <?php $number++; ?>    <td>
                                                <div style="max-width: 70px; max-height:70px;overflow:hidden">
                                                    <img src="{{ asset($salesProfile->image) }}" class="img-fluid img-rounded" alt="">
                                                </div>
                                            </td>

                                            <td>{{ $salesProfile->name }}</td>
                                            <td>{{ $salesProfile->phone }}</td>
                                            <td>{{ $salesProfile->email }}</td>
                                            <td>{{ $salesProfile->present_address }}</td>
                                            <td>{{ $salesProfile->permanent_address }}</td>
                                            <td>{{ $salesProfile->nid_number }}</td>
                                            <td>{{ $salesProfile->religion }}</td>
                                            <td>{{ $salesProfile->created_at }}</td>


                                            <td class="d-flex">
                                                <a href="{{ route('sales_profile.show', [$salesProfile->id]) }}" class="btn btn-sm btn-success mr-1"> <i class="fas fa-eye"></i> </a>
                                                <a href="{{ route('sales_profile.edit', [$salesProfile->id]) }}" class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> </a>
                                                <form action="{{ route('customer.destroy', [$salesProfile->id]) }}" class="mr-1" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="30">
                                            <h5 class="text-center">No Sales Profile Info found.</h5>
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer d-flex justify-content-center">
                            {{ $sales_profiles->links() }}
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
