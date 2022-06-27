@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Representative Visiting History List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                        <li class="breadcrumb-item active">Representative Visiting History list</li>
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
                                <h3 class="card-title">Representative Visiting History List</h3>
                                <a href="{{ route('employeepost.create') }}" class="btn btn-primary">Create Representative Visiting History</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 10px">Sl No.</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Customer Type</th>
                                    <th>Area</th>
                                    <th>Visiting hours</th>
                                    <th>Start Time</th>
                                    <th>End time</th>
                                    <th>Visit Date</th>
                                    <th>Created At</th>
                                    <th style="width: 40px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($posts->count())
                                <?php $number = 1; ?>

                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $number }}</td>
                                              <?php $number++; ?>
                                            <td>
                                                <ul class="list-inline d-flex" >
                                                        @foreach($post->attachments as $attachment)
                                                            <li class="list-inline-item" >
                                                                <img width="100px" height="60px" src="{{ asset($attachment->path) }}" class="img-fluid img-rounded" alt="">
                                                            </li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{optional($post->type)->name }}</td>
                                            <td>{{optional($post->area)->name }}</td>

                                            <td style="width: 130px">
                                                @php
                                                    $dt = \Carbon\Carbon::parse($post->visiting_hours);
                                                    $visitingHours = \Carbon\CarbonInterval::createFromFormat('H:i:s', $dt->toTimeString())->forHumans();
                                                @endphp
                                                {{ $visitingHours }}
                                            </td>
                                            <td style="width: 130px">{{ $post->start_time}}</td>
                                            <td style="width: 130px">{{ $post->end_time }}</td>
                                            <td style="width: 130px">{{ $post->VisitDate }}</td>
                                            <td style="width: 130px">{{ $post->created_at->format('d M, Y') }}</td>
                                           {{-- <td style="width: 130px">{{ $post->updated_at->format('d M, Y') }}</td>--}}
                                            <td class="d-flex">
                                                <a href="{{ route('employeepost.show', [$post->id]) }}" class="btn btn-sm btn-success mr-1"> <i class="fas fa-eye"></i> </a>
                                                <a href="{{ route('employeepost.edit', [$post->id]) }}" class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> </a>

                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="18">
                                            <h5 class="text-center">No Representative Visiting History found.</h5>
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer d-flex justify-content-center">
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
