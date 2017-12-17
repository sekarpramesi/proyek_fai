
<!DOCTYPE html>
<html lang="en">
<head>

	<title><?php echo $title;?></title>

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
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app/css/simplecalendar.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app/css/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app/css/swiper.min.css">

	<!-- Lightbox popup script-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app/css/magnific-popup.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app/css/bootstrap-select.css">
</head>
<body>

<!-- Fixed Sidebar Left -->
<?php $this->load->view('template/fixed_left_sidebar',$friends);?>
<!-- ... end Fixed Sidebar Left-->

<!-- Fixed Sidebar Right -->
<?php $this->load->view('template/fixed_right_sidebar',$friends);?>
<!-- ... end Fixed Sidebar Right -->


<!-- Header -->
<?php $this->load->view('template/header',$profile);?>

<!-- ... end Header -->






<!--<div class="container">
	<div class="row">-->

		<!-- Main Content -->
		<?php for($i=0;$i<count($container);$i++){
			$this->load->view($container[$i],$passedData[$i]);
		}?>
		<!-- ... end Main Content -->

	<!--</div>
</div>-->

<!-- Window-popup Update Header Photo -->


<!-- ... end Window-popup Update Header Photo -->


<!-- Window-popup Choose from my Photo -->


<!-- ... end Window-popup Choose from my Photo -->

<!-- Window-popup-CHAT for responsive min-width: 768px -->


<!-- ... end Window-popup-CHAT for responsive min-width: 768px -->



<a class="back-to-top" href="#">
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

<!-- Load more news AJAX script -->
<script src="<?php echo base_url();?>app/js/ajax-pagination.js"></script>

<!-- Select / Sorting script -->
<script src="<?php echo base_url();?>app/js/selectize.min.js"></script>

<!-- Datepicker input field script-->
<script src="<?php echo base_url();?>app/js/moment.min.js"></script>
<script src="<?php echo base_url();?>app/js/daterangepicker.min.js"></script>

<!-- Widget with events script-->
<script src="<?php echo base_url();?>app/js/simplecalendar.js"></script>

<!-- Lightbox plugin script-->
<script src="<?php echo base_url();?>app/js/jquery.magnific-popup.min.js"></script>

<!-- Swiper / Sliders -->
<script src="<?php echo base_url();?>app/js/swiper.jquery.min.js"></script>

<script src="<?php echo base_url();?>app/js/mediaelement-and-player.min.js"></script>
<script src="<?php echo base_url();?>app/js/mediaelement-playlist-plugin.min.js"></script>

</body>
</html>