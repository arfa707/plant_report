<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dais &mdash; Admin</title>
    <link rel="shortcut icon" href="{{ asset('assets11/img/school.svg') }}" type="image/x-icon">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets11/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets11/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets11/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets11/css/select2-bootstrap4.css') }}" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets11/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets11/css/components.css') }}">

    <script src="{{ asset('assets11/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('assets11/js/sweetalert.min.js') }}"></script>

    {{-- ####################################### --}}
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

<link href="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/bootstrap/4.0.0/css/bootstrap.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/ionicons/css/ionicons.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/animate/animate.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/apple/style.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/apple/style-responsive.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/apple/theme/default.css') }}" rel="stylesheet" id="theme" />
<!-- ================== END BASE CSS STYLE ================== -->

<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="{{ asset('assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css') }}" rel="stylesheet" />
<!-- ================== END PAGE LEVEL STYLE ================== -->

<!-- ================== BEGIN BASE JS ================== -->
<script src="{{ asset('assets/plugins/pace/pace.min.js') }}"></script>

</head>

<body>

	<div id="page-loader" class="fade show"><span class="spinner"></span></div>

	<div id="page-container" class="page-container fade page-without-sidebar page-header-fixed page-with-top-menu">
        {{-- <div id="header" class="header navbar-default">
            <div class="navbar-header">
                <a href="{{ route('home') }}" class="navbar-brand"><span class="navbar-logo"><i
                            class="ion-ios-cloud"></i></span> <b>Plant Report Manajemen</b></a>
            </div>
            <ul class="navbar-nav navbar-right">
                <li class="dropdown navbar-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset ('assets/img/user/user-13.jpg') }}" alt="" />
                        <span class="d-none d-md-inline">Hi..{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            class="d-none">
                            @csrf
                        </form>
                    </ul>
                </li>
            </ul>
        </div>
        
        <div id="top-menu" class="top-menu">
            <ul class="nav">
           
                <li class="{{ setActive('admin/dashboard') }}"><a class="nav-link"
                    href="{{ route('admin.dashboard.index') }}"><i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span></a></li>
        
        
        
                <li class="has-sub {{ setActive('admin/role'). setActive('admin/permission'). setActive('admin/user') }}">
                    @if(auth()->user()->can('roles.index') || auth()->user()->can('permission.index') || auth()->user()->can('users.index'))
                    <a href="javascript:;">
                        <b class="caret"></b>
                        <i class="ion-ios-infinite-outline bg-gradient-aqua"></i> 
                        <span>Users Management</span>
                    </a>
                    @endif
                    <ul class="sub-menu">
                        @can('roles.index')
                        <li class="{{ setActive('admin/role') }}"><a class="nav-link"
                            href="{{route ('admin.role.index')}}"><i class="fas fa-unlock"></i>  - Roles</a>
                    </li>
                    @endcan
        
                        @can('permissions.index')
                        <li class="{{ setActive('admin/permission') }}"><a class="nav-link" href="{{ route('admin.permission.index') }}"><i class="fas fa-key"></i>  -- Permissions</a></li>
                    @endcan
        
                    @can('users.index')
                    <li class="{{ setActive('admin/user') }}"><a class="nav-link"
                 href="{{ route('admin.user.index') }}"><i class="fas fa-users"></i>  --- Users</a>
                    </li>
                @endcan
                    </ul>
                </li>
        
        
                <li class="menu-control menu-control-left">
                    <a href="javascript:;" data-click="prev-menu"><i class="fa fa-angle-left"></i></a>
                </li>
                <li class="menu-control menu-control-right">
                    <a href="javascript:;" data-click="next-menu"><i class="fa fa-angle-right"></i></a>
                </li>
            </ul>
        </div> --}}
        @include('layouts.header')
		
		<!-- begin #content -->
		<div id="content" class="content">

  @yield('content')

		</div>

	</div>










    
    <script>
        //ajax delete
        function Delete(id)
            {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
    
                swal({
                    title: "APAKAH KAMU YAKIN ?",
                    text: "INGIN MENGHAPUS DATA INI!",
                    icon: "warning",
                    buttons: [
                        'TIDAK',
                        'YA'
                    ],
                    dangerMode: true,
                }).then(function(isConfirm) {
                    if (isConfirm) {
    
                        //ajax delete
                        jQuery.ajax({
                            url: "{{ route("admin.role.index") }}/"+id,
                            data:     {
                                "id": id,
                                "_token": token
                            },
                            type: 'DELETE',
                            success: function (response) {
                                if (response.status == "success") {
                                    swal({
                                        title: 'BERHASIL!',
                                        text: 'DATA BERHASIL DIHAPUS!',
                                        icon: 'success',
                                        timer: 1000,
                                        showConfirmButton: false,
                                        showCancelButton: false,
                                        buttons: false,
                                    }).then(function() {
                                        location.reload();
                                    });
                                }else{
                                    swal({
                                        title: 'GAGAL!',
                                        text: 'DATA GAGAL DIHAPUS!',
                                        icon: 'error',
                                        timer: 1000,
                                        showConfirmButton: false,
                                        showCancelButton: false,
                                        buttons: false,
                                    }).then(function() {
                                        location.reload();
                                    });
                                }
                            }
                        });
    
                    } else {
                        return true;
                    }
                })
            }
    </script>

    <!-- General JS Scripts -->
    <script src="{{ asset('assets11/modules/popper.js') }}"></script>
    <script src="{{ asset('assets11/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets11/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets11/js/stisla.js') }}"></script>
    <script src="{{ asset('assets11/modules/select2/dist/js/select2.full.min.js') }}"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ asset('assets11/js/scripts.js') }}"></script>
    <script src="{{ asset('assets11/js/custom.js') }}"></script>


{{-- $$$$$$$$$$$$$$$$$$$ --}}

{{-- <script src="{{ asset('assets/plugins/jquery/jquery-3.2.1.min.js') }}"></script> --}}
	<script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js') }}"></script>

	<script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/js-cookie/js.cookie.js') }}"></script>
	<script src="{{ asset('assets/js/theme/apple.min.js') }}"></script>
	<script src="{{ asset('assets/js/apps.min.js') }}"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="{{ asset('assets/plugins/DataTables/media/js/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('assets/js/demo/table-manage-responsive.demo.min.js') }}"></script>

    <script>
        //active select2
        $(document).ready(function () {
            $('select').select2({
                theme: 'bootstrap4',
                width: 'style',
            });
        });

        //flash message
        @if(session()->has('success'))
        swal({
            type: "success",
            icon: "success",
            title: "BERHASIL!",
            text: "{{ session('success') }}",
            timer: 1500,
            showConfirmButton: false,
            showCancelButton: false,
            buttons: false,
        });
        @elseif(session()->has('error'))
        swal({
            type: "error",
            icon: "error",
            title: "GAGAL!",
            text: "{{ session('error') }}",
            timer: 1500,
            showConfirmButton: false,
            showCancelButton: false,
            buttons: false,
        });
        @endif
    </script>
</body>
<script>
    $(document).ready(function() {
        App.init();
    });
</script>
</html>