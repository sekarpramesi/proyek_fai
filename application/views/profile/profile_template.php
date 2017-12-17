
<!-- Top Header -->

<!--<div class="container">-->
	<!--<div class="row">-->
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="ui-block">
				<div class="top-header">
					<div class="top-header-thumb">
						<img src="<?php echo base_url();?>app/img/top-header1.jpg" alt="nature">
					</div>
					<div class="profile-section">
						<div class="row">
							<div class="col-lg-5 col-md-5 ">
								<ul class="profile-menu">
									<li>
										<a href="<?php echo base_url();?>User/Index" class="active">Timeline</a>
									</li>
									<li>
										<a href="<?php echo base_url();?>User/About">About</a>
									</li>
									<li>
										<a href="<?php echo base_url();?>User/Friends">Friends</a>
									</li>
								</ul>
							</div>
							<!--
							<div class="col-lg-5 ml-auto col-md-5">
								<ul class="profile-menu">
									<li>
										<a href="<?php echo base_url();?>app/07-ProfilePage-Photos.html">Photos</a>
									</li>
									<li>
										<a href="<?php echo base_url();?>app/09-ProfilePage-Videos.html">Videos</a>
									</li>
								</ul>
							</div>
						-->
						</div>

						<div class="control-block-button">


							<div class="btn btn-control bg-primary more">
								<svg class="olymp-settings-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-settings-icon"></use></svg>

								<ul class="more-dropdown more-with-triangle triangle-bottom-right">
									<li>
										<a href="<?php echo base_url();?>app/#" data-toggle="modal" data-target="#update-header-photo">Update Profile Photo</a>
									</li>
									<li>
										<a href="<?php echo base_url();?>app/#" data-toggle="modal" data-target="#update-header-photo">Update Header Photo</a>
									</li>
									<li>
										<a href="<?php echo base_url();?>Account/Settings">Account Settings</a>
									</li>
								</ul>
							</div>
							<a>
							</a>
							<a>
							</a>
						</div>
					</div>
					<div class="top-header-author">
						<a href="#" class="author-thumb">
							<img style="width:124px;height:124px;" src="<?php echo base_url();?>uploads/user/<?php echo $passedData[1][0]["PHOTO_USER"];?>" alt="author">
						</a>
						<div class="author-content">
							<a href="<?php echo base_url();?>User/index" class="h4 author-name"><?php echo $passedData[1][0]["FIRST_NAME_USER"].' '.$passedData[1][0]["LAST_NAME_USER"];?></a>
							<div class="country"><?php echo $passedData[1][0]["COUNTRY_USER"];?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<!--</div>
<!--</div>

<!-- ... end Top Header -->


<?php //var_dump($passedData);?>
<div class="container">
<?php 

	$this->load->view($passedData[0],$passedData[1]);
	
?>
</div>
