@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Create Profile Management Info</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('customer.index') }}">Profile Management Info list</a></li>
                        <li class="breadcrumb-item active">Create Profile Management Info</li>
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
                                <h3 class="card-title">Create Profile Management Info</h3>
                                <a href="{{ route('customer.index') }}" class="btn btn-primary">Go Back to Profile Management Info List</a>
                            </div>
                        </div>
                                    <form action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            @include('includes.errors')
                                            <div class="row">


                                                <!--------------------------------Profile Information--------------------------------->
                                            <div class="col-md-6">
                                                <div class="card card-primary">
                                                    <div class="card-header">
                                                        <h3 class="card-title" style="margin-right: 3rem">Profile Information</h3>
                                                        <div class="d-flex">
                                                            <h3 class="card-title "style="color: #111;margin-top: 5px;margin-right: 7px">Customer Type : </h3>

                                                            <div>.
                                                                <input type="hidden" id="type" name="type" value={{DB::table('types')->where('name','D')->get()[0]->id}}  readonly placeholder="D">
                                                                <input type="text" id="type"  name="typell" value="D"  readonly placeholder="D">


                                                            </div>
                                                            <div class="card-tools">
                                                                <button type="button"  class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                                    <i class="fas fa-minus" ></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <div class="card-body">

                                                            <div class="form-group">
                                                                <label for="name" class="required"> Name</label>
                                                                <input type="text" value="{{ old('name') }}" class="form-control" name="name" id="name" placeholder="Name">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="nickname">Nick Name</label>
                                                                <input type="text" value="{{ old('nickname') }}" class="form-control" name="nickname" id="nickname" placeholder="Nick Name">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email"  class="required">Email</label>
                                                                <input type="email" value="{{ old('email') }}" class="form-control" name="email" id="email" placeholder="Example@gmail.com">
                                                            </div>
                                                            <div class="form-group ">
                                                                <label for="phone"  class="required">Phone</label>
                                                                <input type="number" value="{{ old('phone') }}" class="form-control" name="phone" id="phone" placeholder="01755-980267">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cus_id"> Customer ID</label>
                                                                <input type="text" value="{{ old('cus_id') }}" class="form-control" name="cus_id" id="cus_id" placeholder="00 00 000 xxxx">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="present_address"  class="required">Present Address</label>
                                                                <input type="text" value="{{ old('present_address') }}" class="form-control" name="present_address" id="present_address" placeholder="Text Here">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="permanent_address">Permanent Address</label>
                                                                <input type="text" value="{{ old('permanent_address') }}" class="form-control" name="permanent_address" id="permanent_address" placeholder="Permanent Address">
                                                            </div>
                                                            <div class="  form-group  ">
                                                                <label for="image" class="form-label">Image</label>
                                                                <input class="form-control" type="file" value="{{ old('image') }}" id="image" name="image" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="religion">Religion</label>
                                                                <input type="text" value="{{ old('religion') }}" class="form-control" name="religion" id="religion"  placeholder="Religion">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="birthdate">Date of Birth</label>
                                                                <input type="date" value="{{ old('birthdate') }}" class="form-control" id="birthdate" name="birthdate" placeholder="BirthDate">
                                                            </div>

                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                                <!-- /.card -->
                                            </div>


                                                <!--------------------------------job Profile--------------------------------->
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
                                                                <input type="text" value="{{ old('occupation') }}" class="form-control" name="occupation" id="occupation" placeholder="occupation ">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="business_year">Business Year</label>
                                                                <input type="number" value="{{ old('business_year') }}" class="form-control" name="business_year" id="business_year" placeholder="Business Year">
                                                            </div>
                                                            <div class="form-group ">
                                                                <label for="division">Division Name</label>
                                                                <select name="division" id="division" class="form-control">
                                                                    <option value="{{ old('division') }}" style="display: none" selected>Select Division Name</option>
                                                                    @foreach($divisions as $d)
                                                                        <option value="{{ $d->id }}"> {{ $d->name }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group ">
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

                                                            <div class="form-group ">
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



                                                            <div class="form-group ">
                                                                <label for="category">Customer Category</label>
                                                                <select name="category" id="category" class="form-control">
                                                                    <option value="{{ old('category') }}" style="display: none" selected>Select Category</option>
                                                                    @foreach($categories as $c)
                                                                        <option value="{{ $c->id }}"> {{ $c->name }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="mb-3 form-group">
                                                                <label for="shop_name" class="form-label required" >Shop Name</label>
                                                                <input class="form-control" value="{{ old('shop_name') }}" type="text" id="shop_name" name="shop_name"  placeholder="Text Here">
                                                            </div>
                                                            <div class="mb-3 form-group">
                                                                <label for="shop_image" class="form-label">Shop Image</label>
                                                                <input class="form-control" value="{{ old('shop_image') }}" type="file" id="shop_image" name="shop_image"  placeholder="Text Here">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nid_number">Nid Number</label>
                                                                <input type="number" value="{{ old('nid_number') }}" class="form-control" name="nid_number" id="nid_number" placeholder="1501888968">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="nid_image">Nid image</label>
                                                                <input type="file" value="{{ old('nid_image') }}" class="form-control" name="nid_image" id="nid_image" placeholder="Select Image ">
                                                            </div>

                                                            <!-- /.card-body -->
                                                        </div>
                                                        <!-- /.card -->
                                                    </div>
                                                </div>


                                                <!--------------------------------Family Information--------------------------------->
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
                                                                <label for="marriage_dob">Marrige Date</label>
                                                                <input type="date" value="{{ old('marriage_dob') }}" class="form-control" name="marriage_dob" id="marriage_dob" placeholder="Marriage Birthdate">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="family_member">Family Member</label>
                                                                <input type="number" value="{{ old('family_member') }}" class="form-control" name="family_member" id="family_member" placeholder="Family Member">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="father_name">Father Name</label>
                                                                <input type="text"  value="{{ old('father_name') }}" class="form-control" name="father_name" id="father_name" placeholder="FatherName">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="mother_name">Mother Name</label>
                                                                <input type="text" value="{{ old('mother_name') }}" class="form-control" name="mother_name" id="mother_name" placeholder="Mother Name">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="number_of_children">Number of Children</label>
                                                                <input type="number" value="{{ old('number_of_children') }}" class="form-control" name="number_of_children" id="number_of_children" placeholder="Number of Children">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="children_dob">Children Birthdate</label>
                                                                <input type="date" value="{{ old('children_dob') }}" class="form-control" name="children_dob" id="children_dob" placeholder="Children Birthdate">
                                                            </div>

                                                            <!-- /.card-body -->
                                                        </div>
                                                        <!-- /.card -->
                                                    </div>
                                                </div>

                                            </div>
                                              <div class="card-footer">
                                            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                                        </div>
                                        </div>

                                    </form>
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
