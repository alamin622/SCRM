@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">View Representative Visiting History</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Representative Visiting History list</a></li>
                        <li class="breadcrumb-item active">View Representative Visiting History</li>
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
                                <h3 class="card-title">View Representative Visiting History</h3>
                                <a href="{{ route('post.index') }}" class="btn btn-primary">Go Back to Representative Visiting History List</a>
                            </div>
                        </div>
                        <div class="col-lg-12 d-flex" >
                            <div class="col-lg-6">
                                <div class="card-body">

                                        <h5 class="card-header" style="background-color: #999999; text-align: center";>Visit Information</h5>

                            <table class="table table-bordered table-pimary">
                                <tbody>
                                <tr>
                                    <th style="width: 200px">Image</th>
                                    <td>
                                        <ul class="list-inline">

                                            @foreach($post->attachments as $attachment)
                                                <li class="list-inline-item">
                                                    <img width="70px" src="{{ asset($attachment->path) }}" class="img-fluid img-rounded" alt="">
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 200px">Title</th>
                                    <td>{{ $post->title }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 200px">Start Visiting Time</th>
                                    <td>{{ $post->start_time }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 200px">End Visiting Time</th>
                                    <td>{{ $post->end_time }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 200px">Total Visiting Hours</th>
                                    <td style="width: 130px">
                                        @php
                                            $dt = \Carbon\Carbon::parse($post->visiting_hours);
                                            $visitingHours = \Carbon\CarbonInterval::createFromFormat('H:i:s', $dt->toTimeString())->forHumans();
                                        @endphp
                                        {{ $visitingHours }}
                                    </td>
                                </tr>

                                <tr>
                                    <th style="width: 200px">Next Visiting Date & Time</th>
                                    <td>{{ $post->nextVisitDateTime }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 200px"> Visit Date</th>
                                    <td>{{ $post->VisitDate }}</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                            <div class="col-lg-6">
                                <div class="card-body">

                                        <h5 class="card-header" style="background-color: #999999; text-align: center";>Other's Information</h5>

                                            <table class="table table-bordered table-pimary">
                                                <tbody>

                                                <tr>
                                                    <th style="width: 200px">Division</th>
                                                    <td>{{optional($post->division)->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 200px">Zone</th>
                                                    <td>{{optional($post->zone)->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 200px">Area</th>
                                                    <td>{{optional($post->area)->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 200px">Description</th>
                                                    <td>{!! $post->description !!}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 200px">Customer Type </th>
                                                    <td>{{optional($post->type)->name }}</td>
                                                </tr>

                                                <tr>
                                                    <th style="width: 200px">Customer Name</th>
                                                    <td>{{optional($post->customer)->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 200px">Created Date</th>
                                                    <td>{{ $post->created_at }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 200px">Updated Date</th>
                                                    <td>{!! $post->updated_at !!}</td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>

    </div>
                    </div>


    <!-- Card -->
@endsection
