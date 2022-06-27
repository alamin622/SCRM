@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Create  Visiting Report</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('post.index') }}"> Visiting Report list</a></li>
                        <li class="breadcrumb-item active">Create  Visiting Report</li>
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
                                <h3 class="card-title">Create  Visiting Report</h3>
                                <a href="{{ route('post.index') }}" class="btn btn-primary">Go Back to  Visiting Report List</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            @include('includes.errors')
                                            <div class="form-row">
                                            <div class="form-group col-lg-12">
                                                <label for="title" class="required">Title</label>
                                                <input type="name" name="title" value="{{ old('title') }}" class="form-control" placeholder="Enter title">
                                            </div>
                                                <div class="form-group  col-lg-6">
                                                    <label for="division">Division Name</label>
                                                    <select name="division" id="division" class="form-control">
                                                        <option value="{{ old('division') }}" style="display: none" selected>Select Division Name</option>
                                                        @foreach($divisions as $d)
                                                            <option value="{{ $d->id }}"> {{ $d->name }} </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group  col-lg-6">
                                                    <label for="zone">Zone Name</label>
                                                    <select name="zone" id="zone" class="form-control">
                                                        <option value="{{ old('zone') }}" style="display: none" selected>Select Zone Name</option>
                                                        @foreach($divisions as $division)
                                                            @foreach($division->zones as $zone)
                                                                <option data-chained="{{$division->id}}" value="{{$zone->id}}">
                                                                    {{$zone->name}}
                                                                </option>
                                                            @endforeach
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group  col-lg-6">
                                                    <label for="area">Area Name</label>
                                                    <select name="area" id="area" class="form-control">
                                                        <option value="{{ old('area') }}" style="display: none" selected>Select Area Name</option>

                                                        @foreach($zones as $zone)
                                                            @foreach($zone->areas as $area)
                                                                <option data-chained="{{$zone->id}}" value="{{$area->id}}">
                                                                    {{$area->name}}
                                                                </option>
                                                            @endforeach
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group  col-lg-6">
                                                    <label for="customer">Customer Name</label>
                                                    <select name="customer" id="customer" class="form-control">
                                                        <option value="{{ old('customer') }}" style="display: none" selected>Select Customer Name</option>
                                                        @foreach($areas as $area)
                                                            @foreach($area->customers as $customer)
                                                                <option data-chained="{{$area->id}}" value="{{$customer->id}}">
                                                                    {{$customer->name}}
                                                                </option>
                                                            @endforeach
                                                        @endforeach

                                                    </select>
                                                </div>
                                                <div class="form-group  col-lg-6">
                                                    <label for="type">Customer type</label>
                                                    <select name="type" id="type" class="form-control">

                                                        <option value="{{ old('type') }}" style="display: none" selected>Select Customer type</option>
                                                        @foreach($types as $t)
                                                            <option  <?php if($t->name=='D') echo 'Selected' ?> value="{{ $t->id }}">  {{ $t->name }} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label for="start_time"> Start Time</label>
                                                    <input class="form-control" value="{{ old('start_time') }}" type="time" id="start_time" name="start_time" placeholder="Start Time">
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label for="end_time">End Time</label>
                                                    <input class="form-control"value="{{ old('end_time') }}"  type="time" id="end_time" name="end_time" placeholder="End Time" >
                                                </div>
                                            <div class="form-group col-lg-6 ">
                                                <label for="nextVisitDateTime">Next visit Date & Time</label>
                                                <input class="form-control" value="{{ old('nextVisitDateTime') }}" type="datetime-local" id="nextVisitDateTime" name="nextVisitDateTime" placeholder="NExt Visit DateTime" >
                                            </div>
                                                <div class="form-group col-lg-6 ">
                                                    <label for="VisitDate"> visit Date</label>
                                                    <input class="form-control" value="{{ old('VisitDate') }}" type="date" id="VisitDate" name="VisitDate" placeholder="Visit Date" >
                                                </div>


                                                <div class="mb-3  form-group col-lg-6 ">
                                                    <label for="image" class="form-label">Image</label>
                                                    <input class="form-control" value="{{ old('image') }}" type="file" id="image" name="image[]" multiple>
                                                </div>

                                            <div class="form-group col-lg-12 ">
                                                <label for="description" class="required">Description</label>
                                                <textarea name="description" id="description" rows="4" class="form-control"
                                                          placeholder="Enter description">{{ old('description') }}</textarea>
                                            </div>
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
        $("#zone").chained("#division");
        $("#area").chained("#zone");
        $("#customer").chained("#area");
        /*$("#type").chained("#customer");*/
    </script>
@endsection


