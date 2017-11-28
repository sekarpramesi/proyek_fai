
<!DOCTYPE html>
<html lang="en">
<head>

	<title>Landing Page</title>

	<!-- Required meta tags always come first -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<!-- Main Font -->
	<script src="<?php echo base_url();?>app/js/webfontloader.min.js"></script>

	<script>
		WebFont.load({
			google: {
				families: ['Roboto:300,400,500,700:latin']
			}
		});
	</script>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app/Bootstrap/dist/css/bootstrap-reboot.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app/Bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app/Bootstrap/dist/css/bootstrap-grid.css">

	<!-- Theme Styles CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app/css/theme-styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app/css/blocks.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app/css/fonts.css">

	<!-- Styles for plugins -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app/css/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app/css/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app/css/bootstrap-select.css">


</head>

<body class="landing-page">

<div class="content-bg-wrap">
	<div class="content-bg"></div>
</div>


<div class="header--standard header--standard-landing">
	<div class="container">
		<div class="header--standard-wrap">

			<a href="<?php echo base_url();?>app/#" class="logo">
				<img src="<?php echo base_url();?>app/img/logo-landing.png" alt="Olympus">
				<h6 class="logo-title">olympus</h6>
				SOCIAL NETWORK
			</a>

			<a href="<?php echo base_url();?>app/#" class="open-responsive-menu js-open-responsive-menu">
				<svg class="olymp-menu-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-menu-icon"></use></svg>
			</a>

			<div class="nav nav-pills nav1 header-menu">
				<div class="mCustomScrollbar">

				</div>
			</div>
		</div>
	</div>
</div>

<div class="header-spacer--standard"></div>


<!-- Login-Registration Form  -->

<div class="container">
	<div class="row display-flex">
		<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
			<div class="landing-content">
				<h1>Welcome to the Biggest Social Network in the World</h1>
				<p>We are the best and biggest social network with 5 billion active users all around the world. Share you
					thoughts, write blog posts, show your favourite music via Stopify, earn badges and much more!
				</p>
				<a href="#" class="btn btn-md btn-border c-white">Register Now!</a>
			</div>
		</div>

		<div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-xs-12">
			<div class="registration-login-form">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#home" role="tab">
							<svg class="olymp-login-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-login-icon"></use></svg>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#profile" role="tab">
							<svg class="olymp-register-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-register-icon"></use></svg>
						</a>
					</li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="home" role="tabpanel" data-mh="log-tab">
						<div class="title h6">Register to Olympus</div>
						<form class="content">
							<div class="row">
								<div class="col-lg-6 col-md-6">
									<div class="form-group label-floating is-empty">
										<label class="control-label">First Name</label>
										<input class="form-control" placeholder="" type="text">
									</div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="form-group label-floating is-empty">
										<label class="control-label">Last Name</label>
										<input class="form-control" placeholder="" type="text">
									</div>
								</div>
								<div class="col-xl-12 col-lg-12 col-md-12">
									<div class="form-group label-floating is-empty">
										<label class="control-label">Your Email</label>
										<input class="form-control" placeholder="" type="email">
									</div>
									<div class="form-group label-floating is-empty">
										<label class="control-label">Your Password</label>
										<input class="form-control" placeholder="" type="password">
									</div>

									<div class="form-group date-time-picker label-floating">
										<label class="control-label">Your Birthday</label>
										<input name="datetimepicker" value="10/24/1984" />
										<span class="input-group-addon">
											<svg class="olymp-calendar-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-calendar-icon"></use></svg>
										</span>
									</div>

									<div class="form-group label-floating is-select">
										<label class="control-label">Your Gender</label>
										<select class="selectpicker form-control">
											<option value="MA">Male</option>
											<option value="FE">Female</option>
										</select>
									</div>

									<div class="remember">
										<div class="checkbox">
											<label>
												<input name="optionsCheckboxes" type="checkbox">
												I accept the <a href="<?php echo base_url();?>app/#">Terms and Conditions</a> of the website
											</label>
										</div>
									</div>

									<a href="<?php echo base_url();?>app/#" class="btn btn-purple btn-lg full-width">Complete Registration!</a>
								</div>
							</div>
						</form>
					</div>

					<div class="tab-pane" id="profile" role="tabpanel" data-mh="log-tab">
						<div class="title h6">Login to your Account</div>
						<form class="content" id="login" action="<?php echo base_url();?>index.php/Home/login" method="POST">
							<div class="row">
								<div class="col-xl-12 col-lg-12 col-md-12">
									<div class="form-group label-floating is-empty">
										<label class="control-label">Your Email</label>
										<input class="form-control" name="tuserlogin" placeholder="" type="email">
									</div>
									<div class="form-group label-floating is-empty">
										<label class="control-label">Your Password</label>
										<input class="form-control" name="tpasslogin" placeholder="" type="password">
									</div>

									<div class="remember">

										<div class="checkbox">
											<label>
												<input name="optionsCheckboxes" type="checkbox">
												Remember Me
											</label>
										</div>
										<a href="<?php echo base_url();?>app/#" class="forgot">Forgot my Password</a>
									</div>

									<a href="#" onclick="document.forms['login'].submit();" id="btnLogin" name="btnLogin" class="btn btn-lg btn-primary full-width">Login</a>

									<div class="or"></div>

									<a href="<?php echo base_url();?>app/#" class="btn btn-lg bg-facebook full-width btn-icon-left"><i class="fa fa-facebook" aria-hidden="true"></i>Login with Facebook</a>

									<a href="<?php echo base_url();?>app/#" class="btn btn-lg bg-twitter full-width btn-icon-left"><i class="fa fa-twitter" aria-hidden="true"></i>Login with Twitter</a>


									<p>Don’t you have an account? <a href="<?php echo base_url();?>app/#">Register Now!</a> it’s really simple and you can start enjoing all the benefits!</p>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- ... end Login-Registration Form  -->


<a class="back-to-top" href="<?php echo base_url();?>app/#">
	<img src="<?php echo base_url();?>app/icons/back-to-top.svg" alt="arrow" class="back-icon">
</a>


<!-- jQuery first, then Other JS. -->
<script src="<?php echo base_url();?>app/js/jquery-3.2.0.min.js"></script>
<!-- Js effects for material design. + Tooltips -->
<script src="<?php echo base_url();?>app/js/material.min.js"></script>
<!-- Helper scripts (Tabs, Equal height, Scrollbar, etc) -->
<script src="<?php echo base_url();?>app/js/theme-plugins.js"></script>
<!-- Init functions -->
<script src="<?php echo base_url();?>app/js/main.js"></script>

<!-- Select / Sorting script -->
<script src="<?php echo base_url();?>app/js/selectize.min.js"></script>

<!-- Swiper / Sliders -->
<script src="<?php echo base_url();?>app/js/swiper.jquery.min.js"></script>

<!-- Datepicker input field script-->
<script src="<?php echo base_url();?>app/js/moment.min.js"></script>
<script src="<?php echo base_url();?>app/js/daterangepicker.min.js"></script>

<script src="<?php echo base_url();?>app/js/mediaelement-and-player.min.js"></script>
<script src="<?php echo base_url();?>app/js/mediaelement-playlist-plugin.min.js"></script>
<script type="text/javascript">

	    $("#login-submit").click(function(e) {
        e.preventDefault();
        $('#login-form').submit();
    });
</script>



</body>
</html>