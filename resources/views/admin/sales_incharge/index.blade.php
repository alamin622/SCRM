@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Sales Incharge</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                        <li class="breadcrumb-item active">Sales Incharge list</li>
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
                                <h3 class="card-title">Sales Incharge List</h3>
                                <a href="{{ route('sales_incharge.create') }}" class="btn btn-primary">Create Sales Incharge</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 10px">Sl No.</th>
                                    <th>Employee Name</th>
                                    <th>Office type</th>
                                  {{--  <th>Name</th>--}}
                                    <th style="width: 130px">Created Date</th>
                                    <th style="width: 130px">updated Date</th>
                                    <th style="width: 40px">Status</th>
                                    <th style="width: 40px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($sales_incharges->count())

                                    @foreach ($sales_incharges as $salesIncharge)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>

                                            <td>{{ optional(optional($salesIncharge->employee)->user)->name }} </td>
                                            <td>{{$salesIncharge->office_type}}</td>
                                            {{--<td>{{($salesIncharge->office_id)}}</td>--}}
                                            <td>{{ $salesIncharge->created_at }}</td>
                                            <td>{{ $salesIncharge->updated_at }}</td>
                                            <td>


                                           {{-- <?php if($salesIncharge->status == '1'){ ?>

                                                <a href="{{ url('/status-update', $salesIncharge->id) }}" class="btn btn-success">Active</a>

                                              <?php }else{ ?>

                                                <a href="{{ url('/status-update', $salesIncharge->id) }}" class="btn btn-danger">Inactive</a>

                                              <?php } ?>--}}

                                                <?php if($salesIncharge->is_active){ ?>

                                                <a href="#" class="btn btn-success">Active</a>

                                                <?php }
                                                else{ ?>

                                                <a href="#" class="btn btn-danger">Inactive</a>

                                                <?php } ?>

                                            </td>
                                            <td class="d-flex">
                                                <a href="{{ route('sales_incharge.show', [$salesIncharge->id]) }}" class="btn btn-sm btn-success mr-1"> <i class="fas fa-eye"></i> </a>
                                                <a href="{{ route('sales_incharge.edit', [$salesIncharge->id]) }}" class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> </a>
                                                <form action="{{ route('sales_incharge.destroy', [$salesIncharge->id]) }}" class="mr-1" method="POST">
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
                                            <h5 class="text-center">No Sales Incharge found.</h5>
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer d-flex justify-content-center">
                            {{ $sales_incharges->links() }}
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
