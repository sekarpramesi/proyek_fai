
<!DOCTYPE html>
<html lang="en">
<head>

	<title>NetMed</title>

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
					<!--register form-->
					<?php $this->load->view('register');?>
					<!--end register form-->
					<!--login form-->
					<?php $this->load->view('login');?>
					<!--end login form-->
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