
<!-- Top Header -->

<div class="container">
	<div class="row">
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
										<a href="<?php echo base_url();?>app/02-ProfilePage.html" class="active">Timeline</a>
									</li>
									<li>
										<a href="<?php echo base_url();?>app/05-ProfilePage-About.html">About</a>
									</li>
									<li>
										<a href="<?php echo base_url();?>app/06-ProfilePage.html">Friends</a>
									</li>
								</ul>
							</div>
							<div class="col-lg-5 ml-auto col-md-5">
								<ul class="profile-menu">
									<li>
										<a href="<?php echo base_url();?>app/07-ProfilePage-Photos.html">Photos</a>
									</li>
									<li>
										<a href="<?php echo base_url();?>app/09-ProfilePage-Videos.html">Videos</a>
									</li>
									<li>
										<div class="more">
											<svg class="olymp-three-dots-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg>
											<ul class="more-dropdown more-with-triangle">
												<li>
													<a href="<?php echo base_url();?>app/#">Report Profile</a>
												</li>
												<li>
													<a href="<?php echo base_url();?>app/#">Block Profile</a>
												</li>
											</ul>
										</div>
									</li>
								</ul>
							</div>
						</div>

						<div class="control-block-button">
							<a href="<?php echo base_url();?>app/35-YourAccount-FriendsRequests.html" class="btn btn-control bg-blue">
								<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-happy-face-icon"></use></svg>
							</a>

							<a href="<?php echo base_url();?>app/#" class="btn btn-control bg-purple">
								<svg class="olymp-chat---messages-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-chat---messages-icon"></use></svg>
							</a>

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
										<a href="<?php echo base_url();?>app/29-YourAccount-AccountSettings.html">Account Settings</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="top-header-author">
						<a href="<?php echo base_url();?>app/02-ProfilePage.html" class="author-thumb">
							<img src="<?php echo base_url();?>app/img/author-main1.jpg" alt="author">
						</a>
						<div class="author-content">
							<a href="<?php echo base_url();?>app/02-ProfilePage.html" class="h4 author-name">James Spiegel</a>
							<div class="country">San Francisco, CA</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- ... end Top Header -->



<div class="container">
<?php foreach($profile_container as $pc){
		$this->load->view($pc);
	}
?>
</div>
