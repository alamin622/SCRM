@extends('layouts.admin')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Category List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
                        <li class="breadcrumb-item active">Category</li>
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
                            <h3 class="card-title" >Category List</h3>
                            <div class="d-flex justify-content-end">
                                <a href="{{route('category.create')}}" class="btn btn-primary">Create category</a>
                        </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                
                                <thead>
                                <tr>
                                    <th style="width: 250px">Sl No.</th>
                                    <th> Category Name</th>

                                    <th style="width: 100px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($categories->count()>0)


                                @foreach($categories as $category)

                                <tr>
                                    <td>{{$loop->iteration}}</td>

                                    <td>{{$category->name}}</td>


                                    <td class="d-flex">
                                        <a href="{{ route('category.edit', [$category->id]) }}" class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> </a>
                                        <form action="{{ route('category.destroy', [$category->id]) }}" class="mr-1" method="POST">
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
                                        <h5 class="text-center">No Category Found</h5>
                                    </td>
                                </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer d-flex justify-content-center">
                            {{$categories->links()}}
                    </div>
                    <!-- this row will not appear when printing -->
                    <!-- this row will not appear when printing -->
                   

                      
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
