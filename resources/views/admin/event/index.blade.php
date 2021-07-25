<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Color Admin | Form Plugins</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

    @include('layouts.sections.css')

</head>
<body>
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>

	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">


		
		<!-- begin #content -->
		<div id="content" class="content">

			<div class="row">
			    <div class="col-lg-3">
                    <div class="panel panel-inverse" data-sortable-id="form-plugins-2">
                        <div class="panel-heading">
                        
                            <h4 class="panel-title">Bootstrap Date Range Picker</h4>
                        </div>
                        <div class="panel-body panel-form">
                            <form class="form-horizontal form-bordered">
								<div class="form-group row">
									<label class="col-md-4 col-form-label">Default Date Ranges</label>
									<div class="col-md-8">
									    <div class="input-group" id="default-daterange">
										    <input type="text" name="default-daterange" class="form-control" value="" placeholder="click to select the date range" />
										    <span class="input-group-append">
										    	<span class="input-group-text"><i class="fa fa-calendar"></i></span>
											</span>
										</div>
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-md-4 col-form-label">Bootstrap Combobox</label>
									<div class="col-md-8">
                                        <select class="combobox">
                                            <option value="">Select Location</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="CT">Connecticut</option>
                                            <option value="NY">New York</option>
                                            <option value="MD">Maryland</option>
                                            <option value="VA">Virginia</option>
                                        </select>
									</div>
								</div>
						
							</form>
                        </div>
         
                    </div>


            </div>
		</div>
		<!-- end #content -->
    </div>
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
    @include('layouts.sections.js')
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	{{-- <script>
		$(document).ready(function() {
			App.init();
			FormPlugins.init();
		});
	</script> --}}
</body>
</html>
