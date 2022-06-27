@extends('layouts.admin')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Area List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
                        <li class="breadcrumb-item active">Area</li>
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
                            <h3 class="card-title">Area List</h3>
                            <div class="d-flex justify-content-end">
                                <a href="{{route('area.create')}}" class="btn btn-primary">Create Area</a>
                        </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 250px">SL No.</th>
                                    <th> Division Name</th>
                                    <th> Zone Name</th>
                                    <th>Area Name</th>
                                    <th style="width: 100px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($areas->count()>0)

                                @foreach($areas as $area)

                                <tr>
                                    <td>{{$loop->iteration}}</td>

                                    <td>{{optional($area->division)->name }}</td>
                                    <td>{{optional($area->zone)->name }}</td>
                                    <td>{{$area->name}}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('area.edit', [$area->id]) }}" class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> </a>
                                        <form action="{{ route('area.destroy', [$area->id]) }}" class="mr-1" method="POST">
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
                                        <h5 class="text-center">No Area Found</h5>
                                    </td>
                                </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer d-flex justify-content-center">
                            {{$areas->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
