@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Sales Profile Info</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('sales_profile.index') }}">Sales Profile Info list</a></li>
                        <li class="breadcrumb-item active">Edit Sales Profile Info</li>
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
                                <h3 class="card-title">Edit Sales Profile Info - {{ $salesProfile->name }}</h3>
                                <a href="{{ route('sales_profile.index') }}" class="btn btn-primary">Go Back to Sales Profile Info List</a>
                            </div>
                        </div>

                                        <form action="{{ route('sales_profile.update', [$salesProfile->id]) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="card-body">
                                            @include('includes.errors')
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="card card-primary">
                                                            <div class="card-header">
                                                                <h3 class="card-title">Profile Information</h3>
                                                                <div class="card-tools">
                                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                                        <i class="fas fa-minus"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="name"> Name</label>
                                                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name"   value="{{ $salesProfile->name }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nickname">Nick Name</label>
                                                                    <input type="text" class="form-control" name="nickname" id="nickname" placeholder="Nick Name"   value="{{ $salesProfile->nickname}}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="email">Email</label>
                                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Example@gmail.com"   value="{{ $salesProfile->email }}">
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label for="phone">Phone</label>
                                                                    <input type="number" class="form-control" name="phone" id="phone" placeholder="Phone"  value="{{ $salesProfile->phone }}">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="present_address">Present Address</label>
                                                                    <input type="text" class="form-control" name="present_address" id="present_address" placeholder="Text Here"  value="{{ $salesProfile->present_address }}">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="permanent_address">Permanent Address</label>
                                                                    <input type="text" class="form-control" name="permanent_address" id="permanent_address" placeholder="Permanent Address"  value="{{ $salesProfile->permanent_address }}">
                                                                </div>


                                                                <div class=" form-group">
                                                                    <label for="image" class="form-label">Image</label>
                                                                    <input class="form-control" type="file" id="image" name="image"  value="{{ $salesProfile->image }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="religion">Religion</label>
                                                                    <input type="text" class="form-control" name="religion" id="religion"  placeholder="Religion" value="{{ $salesProfile->religion }}">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="birthdate">Date of Birth</label>
                                                                    <input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="BirthDate" value="{{ $salesProfile->birthdate }}">
                                                                </div>

                                                            </div>
                                                            <!-- /.card-body -->
                                                        </div>
                                                        <!-- /.card -->
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="card card-secondary">
                                                            <div class="card-header">
                                                                <h3 class="card-title">Family Information</h3>

                                                                <div class="card-tools">
                                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                                        <i class="fas fa-minus"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="card-body" style="display: block;">

                                                                <div class="form-group">
                                                                    <label for="marriage_dob">Marrige Dob</label>
                                                                    <input type="date" class="form-control" name="marriage_dob" id="marriage_dob" placeholder="Marriage Birthdate" value="{{ $salesProfile->marriage_dob }}">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="family_member">Family Member</label>
                                                                    <input type="number" class="form-control" name="family_member" id="family_member" placeholder="Family Member" value="{{ $salesProfile->family_member }}">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="father_name">Father Name</label>
                                                                    <input type="text" class="form-control" name="father_name" id="father_name" placeholder="FatherName" value="{{ $salesProfile->father_name }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="mother_name">Mother Name</label>
                                                                    <input type="text" class="form-control" name="mother_name" id="mother_name" placeholder="Mother Name" value="{{ $salesProfile->mother_name }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="number_of_children">Number of Children</label>
                                                                    <input type="number" class="form-control" name="number_of_children" id="number_of_children" placeholder="Number of Children" value="{{ $salesProfile->number_of_children }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="children_dob">Children Dob</label>
                                                                    <input type="date" class="form-control" name="children_dob" id="children_dob" placeholder="Children Birthdate" value="{{ $salesProfile->children_dob }}">
                                                                </div>

                                                                <!-- /.card-body -->
                                                            </div>
                                                            <!-- /.card -->
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="card card-secondary">
                                                            <div class="card-header">
                                                                <h3 class="card-title">Job Profile</h3>

                                                                <div class="card-tools">
                                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                                        <i class="fas fa-minus"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="card-body" style="display: block;">


                                                                <div class="form-group">
                                                                    <label for="occupation">Occupation</label>
                                                                    <input type="text" class="form-control" name="occupation" id="occupation" placeholder="occupation " value="{{ $salesProfile->occupation }}">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="business_year">Business Year</label>
                                                                    <input type="number" class="form-control" name="business_year" id="business_year" placeholder="Business Year" value="{{ $salesProfile->business_year }}">
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label for="division">Division Name</label>
                                                                    <select name="division" id="division" class="form-control">
                                                                        <option value="" style="display: none" selected>Select Division Name</option>
                                                                        @foreach($divisions as $d)
                                                                            <option value="{{ $d->id }}" @if($salesProfile->division_id == $d->id) selected @endif> {{ $d->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="form-group ">
                                                                    <label for="zone">Zone Name</label>
                                                                    <select name="zone" id="zone" class="form-control">
                                                                        <option value="" style="display: none" selected>Select Zone Name</option>
                                                                        @foreach($divisions as $division)
                                                                            @foreach($division->zones as $zone)
                                                                                <option data-chained="{{$division->id}}" value="{{$zone->id}}" @if($salesProfile->zone_id == $zone->id) selected @endif>
                                                                                    {{$zone->name}}
                                                                                </option>
                                                                            @endforeach
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="form-group ">
                                                                    <label for="area">Area Name</label>
                                                                    <select name="area" id="area" class="form-control">
                                                                        <option value="" style="display: none" selected>Select Area Name</option>

                                                                        @foreach($zones as $zone)
                                                                            @foreach($zone->areas as $area)
                                                                                <option data-chained="{{$zone->id}}" value="{{$area->id}}" @if($salesProfile->area_id == $area->id) selected @endif>
                                                                                    {{$area->name}}
                                                                                </option>
                                                                            @endforeach
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="form-group ">
                                                                    <label for="type">Customer type</label>
                                                                    <select name="type" id="type" class="form-control">
                                                                        <option value="" style="display: none" selected>Select Customer type</option>
                                                                        @foreach($types as $t)
                                                                            <option value="{{ $t->id }}" @if($salesProfile->type_id == $t->id) selected @endif> {{ $t->name }}</option>

                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="mb-3 form-group">
                                                                    <label for="shop_name" class="form-label">Shop Name</label>
                                                                    <input class="form-control" type="text" id="shop_name" name="shop_name"  placeholder="Text Here" value="{{ $salesProfile->shop_name }}">
                                                                </div>
                                                                <div class="mb-3 form-group">
                                                                    <label for="shop_image" class="form-label">Shop Image</label>
                                                                    <input class="form-control" type="file" id="shop_image" name="shop_image"  placeholder="Text Here" value="{{ $salesProfile->shop_image }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nid_number">Nid Number</label>
                                                                    <input type="number" class="form-control" name="nid_number" id="nid_number" placeholder="NID Number" value="{{ $salesProfile->nid_number }}">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="nid_image">Nid image</label>
                                                                    <input type="file" class="form-control" name="nid_image" id="nid_image" placeholder="Select Image " value="{{ $salesProfile->nid_image }}">
                                                                </div>

                                                                <!-- /.card-body -->
                                                            </div>
                                                            <!-- /.card -->
                                                        </div>
                                                    </div>

                                                </div>
                                              </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-lg btn-primary">Update Sales Profile Info</button>
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
        $("#zone").chained("#division");
        $("#area").chained("#zone");
    </script>
@endsection
