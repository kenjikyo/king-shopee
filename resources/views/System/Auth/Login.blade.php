<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Login - King Shopee</title>
		<meta name="description" content="Doodle is a Dashboard & Admin Site Responsive Template by hencework." />
		<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Doodle Admin, Doodleadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
		<meta name="author" content="hencework"/>
		<base href="{{asset('')}}">
		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		
		<!-- vector map CSS -->
		<link href="assets/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
		
		<link href="assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
		
		<!-- Custom CSS -->
		<link href="assets/dist/css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<!--Preloader-->
		{{-- <div class="preloader-it">
			<div class="la-anim-1"></div>
		</div> --}}
		<!--/Preloader-->
		
		<div class="wrapper pa-0">
			<header class="sp-header">
				<div class="sp-logo-wrap pull-left">
					<a href="index.html">
						<img class="brand-img mr-10" src="assets/dist/img/logo.png" alt="brand"/>
						<span class="brand-text">king shopee</span>
					</a>
				</div>
				<div class="form-group mb-0 pull-right">
					<span class="inline-block pr-10">Don't have an account?</span>
					<a class="inline-block btn btn-info btn-rounded btn-outline" href="{{ route('getRegister') }}">Sign Up</a>
				</div>
				<div class="clearfix"></div>
			</header>
			
			<!-- Main Content -->
			<div class="page-wrapper pa-0 ma-0 auth-page">
				<div class="container-fluid">
					<!-- Row -->
					<div class="table-struct full-width full-height">
						<div class="table-cell vertical-align-middle auth-form-wrap">
							<div class="auth-form  ml-auto mr-auto no-float">
								<div class="row">
									<div class="col-sm-12 col-xs-12">
										<div class="mb-30">
											<h3 class="text-center txt-dark mb-10">Sign in to King Shopee</h3>
											<h6 class="text-center nonecase-font txt-grey">Enter your details below</h6>
										</div>	
										<div class="form-wrap">
											<form action="{{ route('postLogin') }}" method="post">
												{{csrf_field()}}
												<div class="form-group">
													<label class="control-label mb-10" for="exampleInputEmail_2">Email address</label>
													<input type="email" class="form-control" required="" name="Email" id="exampleInputEmail_2" placeholder="Enter email">
												</div>
												<div class="form-group">
													<label class="pull-left control-label mb-10" for="exampleInputpwd_2">Password</label>
													<a class="capitalize-font txt-primary block mb-10 pull-right font-12" name="Password" href="{{ route('getForgot') }}">forgot password ?</a>
													<div class="clearfix"></div>
													<input type="password" class="form-control" required="" name="Password" id="exampleInputpwd_2" placeholder="Enter pwd">
												</div>
												<div class="form-group">
													<div class="checkbox checkbox-primary pr-10 pull-left">
														<input id="checkbox_2" required="" type="checkbox">
														<label for="checkbox_2"> Keep me logged in</label>
													</div>
													<div class="clearfix"></div>
												</div>
												<div class="form-group text-center">
													<button type="submit" class="btn btn-info btn-rounded">sign in</button>
												</div>
											</form>
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->	
				</div>
				
			</div>
			<!-- /Main Content -->
		
		</div>
		<!-- /#wrapper -->
		
		<!-- JavaScript -->
		
		<!-- jQuery -->
		<script src="assets/vendors/bower_components/assets/dist/jquery.min.js"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="assets/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
		
		<!-- Slimscroll JavaScript -->
		<script src="assets/dist/js/jquery.slimscroll.js"></script>
		
		<!-- Init JavaScript -->
		<script src="assets/dist/js/init.js"></script>
		<script src="assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
		@if(Session::has('flash_type'))
        <script type="text/javascript">
            $.toast({
                heading: '{{ (Session::get('flash_type') == 'success') ? 'Success!' : 'Error!' }}',
                text: "{!! Session::get('flash_message') !!}",
                position: 'top-right',
                loaderBg: '{{ (Session::get('flash_type') == 'success') ? '#5ba035' : '#bf441d' }}',
                icon: '{{ (Session::get('flash_type') == 'success') ? 'success' : 'error' }}',
                hideAfter: 3000,
                stack: 1
            });
        </script>
    	@endif
	</body>
</html>
