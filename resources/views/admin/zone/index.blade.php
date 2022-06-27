@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Zone List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
                        <li class="breadcrumb-item active">Zone</li>
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
                            <h3 class="card-title">Zone List</h3>
                            <div class="d-flex justify-content-end">
                                <a href="{{route('zone.create')}}" class="btn btn-primary">Create Zone</a>
                        </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 250px">Sl No.</th>
                                    <th> Division Name</th>
                                    <th> Zone name</th>


                                    <th style="width: 100px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($zones->count()>0)
                                <?php $number = 1; ?>

                                @foreach($zones as $zone)

                                <tr>
                                    <td>{{$number}}</td>
                                    <?php $number++; ?>
                                    <td>{{optional($zone->division)->name }}</td>
                                    <td>{{$zone->name}}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('zone.edit', [$zone->id]) }}" class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> </a>
                                        <form action="{{ route('zone.destroy', [$zone->id]) }}" class="mr-1" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> </button>
                                        </form>
                                        <a href="{{ route('zone.show', [$zone->id]) }}" class="btn btn-sm btn-success mr-1"> <i class="fas fa-eye"></i> </a>
                                    </td>
                                     </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="5">
                                        <h5 class="text-center">No Zone Found</h5>
                                    </td>
                                </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer d-flex justify-content-center">
                            {{$zones->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
