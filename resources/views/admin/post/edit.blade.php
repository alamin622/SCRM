@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Visiting Report</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Representative Visiting Report list</a></li>
                        <li class="breadcrumb-item active">Edit Representative Visiting Report</li>
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
                                <h3 class="card-title">Edit  Visiting Report - </h3>
                                <a href="{{ route('post.index') }}" class="btn btn-primary">Go Back to  Visiting Report List</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                    <div class="card-body">
                                        <form action="{{ route('post.update', [$post->id]) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            @include('includes.errors')
                                            <div class="form-row">
                                            <div class="form-group col-lg-12">
                                                <label for="title"> title</label>
                                                <input type="name" name="title" value="{{ $post->title }}" class="form-control" placeholder="Enter title">
                                            </div>
                                                <div class="form-group col-lg-6 ">
                                                    <label for="division">Division Name</label>
                                                    <select name="division" id="division" class="form-control">
                                                        <option value="" style="display: none" selected>Select Division Name</option>
                                                        @foreach($divisions as $d)
                                                            <option value="{{ $d->id }}" @if($post->division_id == $d->id) selected @endif> {{ $d->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <label for="zone">Zone Name</label>
                                                    <select name="zone" id="zone" class="form-control">
                                                        <option value="" style="display: none" selected>Select Zone Name</option>
                                                        @foreach($divisions as $division)
                                                            @foreach($division->zones as $zone)
                                                                <option data-chained="{{$division->id}}" value="{{$zone->id}}" @if($post->zone_id == $zone->id) selected @endif>
                                                                    {{$zone->name}}
                                                                </option>
                                                            @endforeach
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <label for="area">Area Name</label>
                                                    <select name="area" id="area" class="form-control">
                                                        <option value="" style="display: none" selected>Select Area Name</option>

                                                        @foreach($zones as $zone)
                                                            @foreach($zone->areas as $area)
                                                                <option data-chained="{{$zone->id}}" value="{{$area->id}}" @if($post->area_id == $area->id) selected @endif>
                                                                    {{$area->name}}
                                                                </option>
                                                            @endforeach
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label for="category">Customers Name</label>
                                                    <select name="customer" id="customer" class="form-control">
                                                        <option value="" style="display: none" selected>Select Customer Name</option>
                                                        @foreach($customers as $c)
                                                            <option value="{{ $c->id }}" @if($post->customer_id == $c->id) selected @endif> {{ $c->name }} </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                 <div class="form-group  col-lg-6">
                                                    <label for="type">Customer type</label>
                                                    <select name="type" id="type" class="form-control">

                                                        <option value="" style="display: none" selected>Select Customer type</option>
                                                        @foreach($types as $t)
                                                            <option  <?php if($t->name=='D') echo 'Selected' ?> value="{{ $t->id }}">  {{ $t->name }} </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            <div class="form-group col-lg-6">
                                                <label for="start_time">Stat Time</label>
                                                <input type="time" name="start_time" value="{{ $post->start_time }}" class="form-control" placeholder="NExt visit Date Time">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="end_time">End Time</label>
                                                <input type="time" name="end_time" value="{{ $post->end_time }}" class="form-control" placeholder="NExt visit Date Time">
                                            </div>


                                                <div class="form-group col-lg-6">
                                                    <label for="nextVisitDateTime">Next visit Date & Time</label>
                                                    <input type="datetime-local" name="nextVisitDateTime" value="{{ $post->nextVisitDateTime }}" class="form-control" placeholder="VisitDate ">
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <label for="VisitDate">Visit Date</label>
                                                    <input type="date" name="VisitDate" value="{{ $post->VisitDate }}" class="form-control" placeholder="VisitDate ">
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <label for="visiting_hours">Visiting Hours</label>
                                                    <input type="time" name="visiting_hours" value="{{ $post->visiting_hours }}" class="form-control" placeholder="Visiting Hours">
                                                </div>




                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <label for="image"> Image</label>
                                                            <div class="custom-file">
                                                                <input type="file" name="image[]" multiple class="custom-file-input" id="image">
                                                                <label class="custom-file-label" for="image">Choose file</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 text-right">
                                                            <div style="max-width: 100px; max-height: 100px; overflow:hidden; margin-left: auto">
                                                                @foreach($post->attachments as $attachment)
                                                                    <li class="list-inline-item" >
                                                                        <img width="100px"  height="60px" src="{{ asset($attachment->path) }}" class="img-fluid img-rounded" alt="">
                                                                    </li>
                                                                @endforeach </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea name="description" id="description" rows="4" class="form-control"
                                                          placeholder="Enter description">{{ $post->description }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-lg btn-primary">Update  Visiting Report</button>
                                            </div>
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
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('/admin/css/summernote-bs4.min.css') }}">
@endsection

@section('script')
    <script src="{{ asset('/admin/js/summernote-bs4.min.js') }}"></script>
    <script>
        $('#description').summernote({
            placeholder: 'Hello Bootstrap 4',
            tabsize: 2,
            height: 300
        });

        $(document).ready(function(){
            $('#datepicker').datepicker({
                //..
                format: 'dd/mm/yyyy',
                startDate: '+1d',
                endDate: '+7d',
                multidate: 2 //Just allow 2 dates to be picked start and enddate
            });
        });
    </script>
@endsection
