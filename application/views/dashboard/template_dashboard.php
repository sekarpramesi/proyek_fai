

<!-- Profile Settings Responsive -->

<div class="profile-settings-responsive">

	<a href="<?php echo base_url();?>app/#" class="js-profile-settings-open profile-settings-open">
		<i class="fa fa-angle-right" aria-hidden="true"></i>
		<i class="fa fa-angle-left" aria-hidden="true"></i>
	</a>
	<div class="mCustomScrollbar" data-mcs-theme="dark">
		<div class="ui-block">
			<div class="your-profile">
				<div class="ui-block-title ui-block-title-small">
					<h6 class="title">Your PROFILE</h6>
				</div>

				<div id="accordion1" role="tablist" aria-multiselectable="true">
					<div class="card">
						<div class="card-header" role="tab" id="headingOne-1">
							<h6 class="mb-0">
								<a data-toggle="collapse" data-parent="#accordion" href="<?php echo base_url();?>app/#collapseOne-1" aria-expanded="true" aria-controls="collapseOne">
									Profile Settings
									<svg class="olymp-dropdown-arrow-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
								</a>
							</h6>
						</div>

						<div id="collapseOne-1" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
							<ul class="your-profile-menu">
								<li>
									<a href="<?php echo base_url();?>Dashboard/Index">Personal Information</a>
								</li>
								<li>
									<a href="<?php echo base_url();?>Dashboard/Account">Account Settings</a>
								</li>
								<li>
									<a href="<?php echo base_url();?>Dashboard/ChangePassword">Change Password</a>
								</li>
								<li>
									<a href="<?php echo base_url();?>Dashboard/Interests">Hobbies and Interests</a>
								</li>
								<li>
									<a href="<?php echo base_url();?>Dashboard/SchoolCompany">Education and Employement</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- ... end Profile Settings Responsive -->

<!-- Main Header Your Account -->

<div class="main-header">
	<div class="content-bg-wrap">
		<div class="content-bg bg-account"></div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 m-auto col-md-8 col-sm-12 col-xs-12">
				<div class="main-header-content">
					<h1>Your Account Dashboard</h1>
					<p>Welcome to your account dashboard! Here you’ll find everything you need to change your
						profile information, settings, read notifications and requests, view your latest messages,
						change your pasword and much more! Also you can create or manage your own favourite page, have fun!
					</p>
				</div>
			</div>
		</div>
	</div>

	<img class="img-bottom" src="<?php echo base_url();?>app/img/account-bottom.png" alt="friends">
</div>

<!-- ... end Main Header Your Account -->


<!-- Your Account Personal Information -->

<div class="container">
	<div class="row">

		<?php $this->load->view($passedData[0],$passedData[1]);?>
		<div class="col-xl-3 order-xl-1 col-lg-3 order-lg-1 col-md-12 order-md-2 col-sm-12 col-xs-12 responsive-display-none">
			<div class="ui-block">
				<div class="your-profile">
					<div class="ui-block-title ui-block-title-small">
						<h6 class="title">Your PROFILE</h6>
					</div>

					<div id="accordion" role="tablist" aria-multiselectable="true">
						<div class="card">
							<div class="card-header" role="tab" id="headingOne">
								<h6 class="mb-0">
									<a data-toggle="collapse" data-parent="#accordion" href="<?php echo base_url();?>app/#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										Profile Settings
										<svg class="olymp-dropdown-arrow-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
									</a>
								</h6>
							</div>

							<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
								<ul class="your-profile-menu">
								<li>
									<a href="<?php echo base_url();?>Dashboard/Index">Personal Information</a>
								</li>
								<li>
									<a href="<?php echo base_url();?>Dashboard/Account">Account Settings</a>
								</li>
								<li>
									<a href="<?php echo base_url();?>Dashboard/ChangePassword">Change Password</a>
								</li>
								<li>
									<a href="<?php echo base_url();?>Dashboard/Interests">Hobbies and Interests</a>
								</li>
								<li>
									<a href="<?php echo base_url();?>Dashboard/SchoolCompany">Education and Employement</a>
								</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- ... end Your Account Personal Information -->


