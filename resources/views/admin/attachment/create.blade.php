@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Create attachment</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('attachment.index') }}">attachment list</a></li>
                        <li class="breadcrumb-item active">Create attachment</li>
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
                                <h3 class="card-title">Create attachment</h3>
                                <a href="{{ route('attachment.index') }}" class="btn btn-primary">Go Back to attachment List</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                    <form action="{{ route('attachment.store') }}" method="POST">
                                        @csrf
                                        <div class="card-body">
                                            @include('includes.errors')
                                            <div class="form-group">
                                                <label for="name"> name</label>
                                                <input type="name" name="name" class="form-control" id="name" placeholder="Enter name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Image</label>
                                                <input class="form-control" type="file" id="image" name="image">
                                            </div>
                                            <div class="form-group">
                                                <label for="path">Path</label>
                                                <input type="name" name="path" class="form-control" id="path" placeholder="Enter name">
                                            </div>
                                            <div class="form-group">
                                                <label for="size">Size</label>
                                                <input type="name" name="size" class="form-control" id="size" placeholder="Enter name">
                                            </div>
                                            <div class="form-group">
                                                <label for="extension">Extension</label>
                                                <input type="name" name="extension" class="form-control" id="extension" placeholder="Enter name">
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
