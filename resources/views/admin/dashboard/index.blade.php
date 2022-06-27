@extends('layouts.admin')

@section('content')

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->

<div class="row" style="margin: 8px">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $postCount}}</h3>

                <p>AlL Posts</p>
            </div>
            <div class="icon">
                <i class="fas fa-pen-square"></i>
            </div>

        </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $categoryCount}}<sup style="font-size: 20px"></sup></h3>

                <p>Categories</p>
            </div>
            <div class="icon">
                <i class="fas fa-tags"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{$customerCount}}</h3>

                <p>Total customer</p>
            </div>
            <div class="icon">
                <i class="fas fa-tag"></i>
            </div>

        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{$userCount}}</h3>
                <p>User</p>
            </div>
            <div class="icon">
                <i class="fas fa-user"></i>
            </div>
        </div>

    </div>
    <!-- ./col --></div>
</div>
    <!-- posts  -->



        <div class="row" style="margin: 8px">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $postCount}}</h3>

                        <p>AlL Posts</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-pen-square"></i>
                    </div>

                </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $categoryCount}}<sup style="font-size: 20px"></sup></h3>

                        <p>Categories</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-tags"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->


            </div>
            <!-- ./col --></div>
        </div>
@endsection
