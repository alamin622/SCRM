@extends('layouts.admin')
@section('content')
<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Role List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
                        <li class="breadcrumb-item active">Role</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header ">
                            <h3 class="card-title">Role List</h3>
                            <div class="d-flex justify-content-end">
                                <a href="{{route('role.create')}}" class="btn btn-primary">Create Role</a>
                        </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 250px">Sl No.</th>
                                    <th> Role Name</th>
                                    <th> Slug</th>

                                    <th style="width: 100px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($roles->count()>0)
                                

                                @foreach($roles as $role)

                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                   
                                    <td>{{$role->name}}</td>
                                    <td>{{$role->slug}}</td>

                                    <td class="d-flex">
                                        <a href="{{ route('role.edit', [$role->id]) }}" class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> </a>
                                        <form action="{{ route('role.destroy', [$role->id]) }}" class="mr-1" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> </button>
                                        </form>
                                        </td>
                                     </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="5">
                                        <h5 class="text-center">No Role Found</h5>
                                    </td>
                                </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer d-flex justify-content-center">
                           
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
