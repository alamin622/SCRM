@extends('layouts.admin')
@section('content')
<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Attachment List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
                        <li class="breadcrumb-item active">Attachment</li>
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
                            <h3 class="card-title">Attachment List</h3>
                            <div class="d-flex justify-content-end">
                                <a href="{{route('attachment.create')}}" class="btn btn-primary">Create attachment</a>
                        </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 10px">Sl No.</th>
                                    <th>name</th>
                                    <th>image</th>
                                    <th>path</th>
                                    <th>size</th>
                                    <th>extension</th>
                                    <th style="width: 40px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($attachments->count()>0)
                                <?php $number = 1; ?>
                               
                                @foreach($attachments as $attachment)
                                <tr>
                                    <td>{{$number}}</td>
                                    <?php $number++; ?>
                                    <td>{{$attachment->name}}</td>
                                    <td>{{$attachment->image}}</td>
                                    <td>{{$attachment->path}}</td>
                                    <td>{{$attachment->size}}</td>
                                    <td>{{$attachment->extension}}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('attachment.edit', [$attachment->id]) }}" class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> </a>
                                        <form action="{{ route('attachment.destroy', [$attachment->id]) }}" class="mr-1" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> </button>
                                        </form>
                                        <a href="{{ route('attachment.show', [$attachment->id]) }}" class="btn btn-sm btn-success mr-1"> <i class="fas fa-eye"></i> </a>
                                    </td>
                                     </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="7">
                                        <h5 class="text-center">No attachment Found</h5>
                                    </td>
                                </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>

@endsection
