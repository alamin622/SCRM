
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/css/adminlte.min.css">
  
   
 <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">


    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin') }}/img/logo.jpg">
    <title>Admin Panel</title>
    @yield('style')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>

        </ul>

        <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Profile -->
      <li class="nav-item dropdown" ">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
          <span class="badge badge-warning navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right " >
            
          <span class="dropdown-item "><i class="far fa-user" style="margin-right: .7rem"></i> {{Auth::user()->name}} </span>

          <div class="dropdown-divider"></div>
         

            <a class="nav-link href={{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="nav-icon " style="cursor: pointer"> Logout</i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
           
         
      </li>
    </ul>
        <!-- SEARCH FORM -->
      
    </nav>
    <!-- /.navbar -->

{{--------------------HRM----------------------------}}
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        @if (Auth::user()->type == 'ADM')
            <a href="{{ route('admin.dashboard') }} " class="brand-link ">
                <img src="{{ asset('admin') }}/img/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light ">SCRM</span>
            </a>
        @endif
        @if (Auth::user()->type == 'EMP')
            <a href="{{ route('employee.dashboard') }} " class="brand-link ">
                <img src="{{ asset('admin') }}/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light ">Dashboard</span>
            </a>
        @endif

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            


            <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                     @if (Auth::user()->type == 'ADM')
                         <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link  {{(request()->is('admin/dashboard')) ? 'active': '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>

                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                     @endif

                     @if (Auth::user()->type == 'EMP')
                         <li class="nav-item">
                            <a href="{{ route('employee.dashboard') }}" class="nav-link  {{(request()->is('employee/dashboard')) ? 'active': '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>

                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                     @endif



                   @if (Auth::user()->type == 'ADM')
                        <li class="nav-item mt-auto has-treeview ">
                            <a href="" class="nav-link ">
                                <i class="nav-icon fas fa-tags"></i>
                                <span class="badge badge-info right">2</span>
                                <p>
                                    Categories
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>

                            
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{ route('category.index') }}" class="nav-link {{(request()->is('admin/category')) ? 'active': '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                        <p>Customer Category</p>
                                    </a>
                                </li>

                                {{--  @endif  --}}


                                <li class="nav-item mt-auto">
                                    <a href="{{ route('type.index') }}" class="nav-link {{(request()->is('admin/type')) ? 'active': '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Customer Type
                                        </p>
                                    </a>
                                </li>


                                    {{--
                                <li class="nav-item mt-auto">
                                    <a href="{{ route('sale.index') }}" class="nav-link {{(request()->is('admin/sale')) ? 'active': '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Sales Category
                                        </p>
                                    </a>
                                </li>


                                <li class="nav-item mt-auto">
                                    <a href="{{ route('degree.index') }}" class="nav-link {{(request()->is('admin/degree')) ? 'active': '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Customer Degree
                                        </p>
                                    </a>
                                </li>
                                - --}}
                            </ul>
                        </li>
                    @endif

                    @if (Auth::user()->type == 'EMP')
                        <li class="nav-item mt-auto has-treeview ">
                            <a href="" class="nav-link ">
                                <i class="nav-icon fas fa-tags"></i>
                                <span class="badge badge-info right">2</span>
                                <p>
                                    Categories
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>

                            {{--  @if(hasRole(['admin','employee']))  --}}
                            {{--   --}}
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{ route('employeecategory.index') }}" class="nav-link {{(request()->is('admin/category')) ? 'active': '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                        <p>Customer Category</p>
                                    </a>
                                </li>

                                {{--  @endif  --}}

                                <li class="nav-item mt-auto">
                                    <a href="{{ route('employeetype.index') }}" class="nav-link {{(request()->is('employee/type')) ? 'active': '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Customer Type
                                        </p>
                                    </a>
                                </li>

                                    {{--
                                <li class="nav-item mt-auto">
                                    <a href="{{ route('sale.index') }}" class="nav-link {{(request()->is('admin/sale')) ? 'active': '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Sales Category
                                        </p>
                                    </a>
                                </li>


                                <li class="nav-item mt-auto">
                                    <a href="{{ route('degree.index') }}" class="nav-link {{(request()->is('admin/degree')) ? 'active': '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Customer Degree
                                        </p>
                                    </a>
                                </li>
                                - --}}
                            </ul>
                        </li>
                    @endif

                        @if (Auth::user()->type == 'ADM')
                            <li class="nav-item mt-auto has-treeview ">
                                <a href="" class="nav-link ">
                                    <i class="nav-icon fas fa-box"></i>
                                    <span class="badge badge-info right">2</span>
                                    <p>
                                        Visiting Report
                                    </p>
                                    <i class="right fas fa-angle-left"></i>
                                </a>

                                <ul class="nav nav-treeview">

                                    <li class="nav-item">
                                        <a href="{{ route('post.index') }}" class="nav-link {{(request()->is('admin/post')) ? 'active': '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>List Visiting Report</p>
                                        </a>
                                    </li>
                                <li class="nav-item">
                                        <a href="{{ route('post.create') }}" class="nav-link {{(request()->is('admin/post/create')) ? 'active': '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Create Visiting Report</p>
                                        </a>
                                    </li>


                                </ul>
                            </li>
                        @endif

                        @if (Auth::user()->type == 'EMP')
                            <li class="nav-item mt-auto has-treeview ">
                                <a href="" class="nav-link ">
                                    <i class="nav-icon fas fa-box"></i>
                                    <span class="badge badge-info right">1</span>
                                    <p>
                                        Visiting Report
                                    </p>
                                    <i class="right fas fa-angle-left"></i>
                                </a>

                                <ul class="nav nav-treeview">

                                    <li class="nav-item">
                                        <a href="{{ route('employeepost.index') }}" class="nav-link {{(request()->is('employee/post')) ? 'active': '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>List Visiting Report</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('employeepost.create') }}" class="nav-link {{(request()->is('employee/post')) ? 'active': '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>create Visiting Report</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        @endif
                        @if (Auth::user()->type == 'ADM')
                        <li class="nav-item mt-auto has-treeview  ">
                            <a href="" class="nav-link  ">
                                <i class="nav-icon fas fa-user"></i>
                                <span class="badge badge-info right">2</span>
                                <p>
                                    Customer Profile
                                </p>
                                <i class="right fas fa-angle-left"></i>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('customer.index') }}" class="nav-link {{(request()->is('admin/customer')) ? 'active': '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Profile List</p>
                                    </a>
                                </li>
                              <li class="nav-item">
                                    <a href="{{ route('customer.create') }}" class="nav-link {{(request()->is('admin/customer/create')) ? 'active': '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Profile Create</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        @endif

                        @if (Auth::user()->type == 'EMP')
                            <li class="nav-item mt-auto has-treeview  ">
                                <a href="" class="nav-link  ">
                                    <i class="nav-icon fas fa-user"></i>
                                    <span class="badge badge-info right">2</span>
                                    <p>
                                        Customer Profile
                                    </p>
                                    <i class="right fas fa-angle-left"></i>
                                </a>

                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('employeecustomer.index') }}" class="nav-link {{(request()->is('employee/customer')) ? 'active': '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Profile List</p>
                                        </a>
                                    </li>
                                <li class="nav-item">
                                        <a href="{{ route('employeecustomer.create') }}" class="nav-link {{(request()->is('employee/customer/create')) ? 'active': '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Profile Create</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        @endif

                        @if (Auth::user()->type == 'ADM')
                            <li class="nav-item mt-auto has-treeview  ">
                                <a href="" class="nav-link  ">
                                    <i class="nav-icon fas fa-user"></i>
                                    <span class="badge badge-info right">2</span>
                                    <p>
                                        HRM Employee
                                    </p>
                                    <i class="right fas fa-angle-left"></i>
                                </a>

                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('employee.index') }}" class="nav-link {{(request()->is('admin/employee')) ? 'active': '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> HRM Employee List</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('employee.create') }}" class="nav-link {{(request()->is('admin/employee/create')) ? 'active': '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> HRM Employee Create</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        @endif
                        @if (Auth::user()->type == 'EMP')
                            <li class="nav-item mt-auto has-treeview  ">
                                <a href="" class="nav-link  ">
                                    <i class="nav-icon fas fa-user"></i>
                                    <span class="badge badge-info right">2</span>
                                    <p>
                                        HRM Employee
                                    </p>
                                    <i class="right fas fa-angle-left"></i>
                                </a>

                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('employeeemployee.index') }}" class="nav-link {{(request()->is('admin/employee')) ? 'active': '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> HRM Employee List</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('employeeemployee.create') }}" class="nav-link {{(request()->is('admin/employee/create')) ? 'active': '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> HRM Employee Create</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        @endif

                            @if (Auth::user()->type == 'ADM')
                                <li class="nav-item mt-auto has-treeview ">
                                    <a href="" class="nav-link  ">
                                        <i class="nav-icon fas fa-user"></i>
                                        <span class="badge badge-info right">2</span>
                                        <p>
                                            Sales Incharge
                                        </p>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>

                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('sales_incharge.index') }}" class="nav-link {{(request()->is('admin/sales_incharge')) ? 'active': '' }}">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Sales Incharge List</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('sales_incharge.create') }}" class="nav-link {{(request()->is('admin/sales_incharge/create')) ? 'active': '' }}">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p> Sales Incharge Create</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                           @endif
                           @if (Auth::user()->type == 'ADM')
                                <li class="nav-item mt-auto">
                                    <a href="{{ route('user.index') }}" class="nav-link {{(request()->is('admin/user')) ? 'active': '' }}">
                                        <i class="nav-icon fas fa-users"></i>
                                        <p>
                                            User
                                        </p>
                                    </a>
                                </li>
                            @endif
                   @if (Auth::user()->type == 'ADM')
                    <li class="nav-item mt-auto">
                        <a href="{{ route('role.index') }}" class="nav-link {{(request()->is('admin/role')) ? 'active': '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                               Role
                            </p>
                        </a>
                    </li>
                    @endif
                        @if (Auth::user()->type == 'ADM')
                        <li class="nav-item mt-auto">
                            <a href="{{ route('division.index') }}" class="nav-link {{(request()->is('admin/division')) ? 'active': '' }}">
                                <i class="nav-icon fas fa-box"></i>
                                <p>
                                   Division
                                </p>
                            </a>
                        </li>
                        @endif
                         @if (Auth::user()->type == 'EMP')
                        <li class="nav-item mt-auto">
                            <a href="{{ route('employeedivision.index') }}" class="nav-link {{(request()->is('employee/division')) ? 'active': '' }}">
                                <i class="nav-icon fas fa-box"></i>
                                <p>
                                   Division
                                </p>
                            </a>
                        </li>
                        @endif

                         @if (Auth::user()->type == 'ADM')
                        <li class="nav-item mt-auto">
                            <a href="{{ route('zone.index') }}" class="nav-link {{(request()->is('admin/zone')) ? 'active': '' }}">
                                <i class="nav-icon fas fa-box"></i>
                                <p>
                                    Zone
                                </p>
                            </a>
                        </li>
                        @endif
                         @if (Auth::user()->type == 'EMP')
                        <li class="nav-item mt-auto">
                            <a href="{{ route('employeezone.index') }}" class="nav-link {{(request()->is('employee/zone')) ? 'active': '' }}">
                                <i class="nav-icon fas fa-box"></i>
                                <p>
                                    Zone
                                </p>
                            </a>
                        </li>
                        @endif

                        @if (Auth::user()->type == 'ADM')
                        <li class="nav-item mt-auto">
                            <a href="{{ route('area.index') }}" class="nav-link {{(request()->is('admin/area')) ? 'active': '' }}">
                                <i class="nav-icon fas fa-box"></i>
                                <p>
                                   Area
                                </p>
                            </a>
                        </li>
                        @endif
                        @if (Auth::user()->type == 'EMP')
                        <li class="nav-item mt-auto">
                            <a href="{{ route('employeearea.index') }}" class="nav-link {{(request()->is('employee/area')) ? 'active': '' }}">
                                <i class="nav-icon fas fa-box"></i>
                                <p>
                                   Area
                                </p>
                            </a>
                        </li>
                        @endif

                    <li class="nav-item mt-auto">
                        <a class="nav-link href={{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt" style="cursor: pointer"> Logout</i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

            {{--        <li class="text-center mt-5">
                        <a href="{{ route('website') }}" class="btn btn-primary text-white" target="_blank">
                            <p class="mb-0">
                                View Website
                            </p>
                        </a>
                    </li>
                    --}}
                    </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy;  <a href="https://adminlte.io">Cybernatic Infotech Limited</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->


<form id="logout-form" action="" method="POST" style="display: none;">
    @csrf
</form>

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->

<!-- Bootstrap -->
<script src="{{ asset('admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('admin') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin') }}/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('admin') }}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="{{ asset('admin') }}/plugins/raphael/raphael.min.js"></script>
<script src="{{ asset('admin') }}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="{{ asset('admin') }}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('admin') }}/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin') }}/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('admin') }}/dist/js/pages/dashboard2.js') }}"></script>



<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('admin') }}/plugins/jquery/jquery.min.js"></script>
<script src="{{ asset('admin') }}/plugins/chart.js/Chart.min.js"></script>
<script src="{{ asset('admin') }}/plugins/sparklines/sparkline.js"></script>
<script src="{{ asset('admin') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('admin') }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="{{ asset('admin') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="{{ asset('admin') }}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('admin') }}/plugins/daterangepicker/daterangepicker.js"></script>
<script src="{{ asset('admin') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="{{ asset('admin') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
{{--<script src="{{ asset('admin') }}/plugins/js/pages/dashboard.js"></script>--}}


<script src="{{ asset('admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('admin') }}/jquery_chained/jquery.chained.min.js"></script>
<script src="{{ asset('admin') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('admin') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('admin') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('admin') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('admin') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('admin') }}/plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('admin') }}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('admin') }}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="{{ asset('admin') }}/bootstrap-tagsinput.js"></script>
<script src="{{ asset('admin') }}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin') }}/js/adminlte.min.js"></script>
<script src="{{ asset('admin') }}/js/jquery.printPage.js"></script>
<script src="{{ asset('admin') }}/js/app.js"></script>
{{--<script src="{{ asset('admin') }}/js/bs-custom-file-input.min.js"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@yield('script')


<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>


<script>

    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}");
    @endif
    $(document).ready(function () {
        // bsCustomFileInput.init()
    })


  </script>
  
</body>
</html>
