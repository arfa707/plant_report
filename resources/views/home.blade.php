<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Color Admin | Page with Transparent Sidebar</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="{{asset('assets/plugins/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/bootstrap/4.0.0/css/bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/ionicons/css/ionicons.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/animate/animate.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/css/apple/style.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/css/apple/style-responsive.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/css/apple/theme/default.css')}}" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{asset('assets/plugins/pace/pace.min.js')}}"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body>
	<!-- begin #page-loader -->
	{{-- <div id="page-loader" class="fade show"><span class="spinner"></span></div> --}}
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	{{-- <div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed"> --}}

		<!-- end #header -->
		
		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar sidebar-transparent">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="false" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
                    <li class="{{ setActive('admin/dashboard') }}"><a class="nav-link"
                        href="{{ route('admin.dashboard.index') }}"><i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span></a></li>

                        @can('events.index')
                        <li class="{{ setActive('admin/event') }}"><a class="nav-link" href="{{ route('admin.event.index') }}"><i class="fas fa-folder"></i>
                    <span>Transaksi</span></a></li>
                    @endcan
				
				</ul>
				<!-- end sidebar user -->
			
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">

			<div class="panel panel-inverse">
				<div class="panel-heading">
		
					<h4 class="panel-title">Panel Title here</h4>
				</div>
				<div class="panel-body">
					Panel Content Here
				</div>
			</div>
			<!-- end panel -->
		</div>

	{{-- </div> --}}
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{asset('assets/plugins/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
	<script src="{{asset('assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js')}}"></script>

	<script src="{{asset('assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{asset('assets/plugins/js-cookie/js.cookie.js')}}"></script>
	<script src="{{asset('assets/js/theme/apple.min.js')}}"></script>
	<script src="{{asset('assets/js/apps.min.js')}}"></script>
	<!-- ================== END BASE JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
</body>
</html>
