
<!-- Top Header -->
<script>
	$(document).ready(function(){
		
	});
</script>
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
								<ul class="profile-menu" id="groupTabs">
									<li id="li1" class="active">
										<a href="<?php echo base_url();?>Groups/index">My Groups</a>
									</li>								
									<li id="li2">
										<a href="<?php echo base_url();?>Groups/discover">Discover</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<!--</div>-->
<!--</div>-->

<!-- ... end Top Header -->

<div class="container">
<?php 

	$this->load->view($passedData[0],$passedData[2]);
	
?>
</div>



<!-- Window-popup Create Friends Group -->
<div class="modal fade" id="create-group" data-user="<?php echo $profile[0]["ID_USER"];?>">
	<div class="modal-dialog ui-block window-popup create-friend-group create-friend-group-1">
		<a href="<?php echo base_url();?>app/#" class="close icon-close" data-dismiss="modal" aria-label="Close">
			<svg class="olymp-close-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-close-icon"></use></svg>
		</a>

	<div class="ui-block-title">
		<h6 class="title">Create Group</h6>
	</div>

	<div class="ui-block-content">
		<form class="form-group label-floating">
			<label class="control-label">Group Name</label>
			<input id="nameGroup" name="nameGroup" class="form-control" placeholder="" value="" type="text">
		</form>

		<form class="form-group with-button">
			<input class="form-control" placeholder="" value="Group Avatar (120x120px min)" type="text">

			<button class="bg-grey">
				<svg class="olymp-computer-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-computer-icon"></use></svg>
			</button>

		</form>

		<form class="form-group label-floating is-select">
			<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-happy-face-icon"></use></svg>

			<select class="selectpicker form-control style-2 show-tick" multiple data-max-options="2" data-live-search="true">
				<option title="Green Goo Rock" data-content='<div class="inline-items">
										<div class="author-thumb">
											<img src="<?php echo base_url();?>app/img/avatar52-sm.jpg" alt="author">
										</div>
											<div class="h6 author-title">Green Goo Rock</div>

										</div>'>Green Goo Rock
				</option>

				<option title="Mathilda Brinker" data-content='<div class="inline-items">
											<div class="author-thumb">
												<img src="<?php echo base_url();?>app/img/avatar74-sm.jpg" alt="author">
											</div>
											<div class="h6 author-title">Mathilda Brinker</div>
										</div>'>Mathilda Brinker
				</option>

				<option title="Marina Valentine" data-content='<div class="inline-items">
											<div class="author-thumb">
												<img src="<?php echo base_url();?>app/img/avatar48-sm.jpg" alt="author">
											</div>
											<div class="h6 author-title">Marina Valentine</div>
										</div>'>Marina Valentine
				</option>

				<option title="Dave Marinara" data-content='<div class="inline-items">
											<div class="author-thumb">
												<img src="<?php echo base_url();?>app/img/avatar75-sm.jpg" alt="author">
											</div>
											<div class="h6 author-title">Dave Marinara</div>
										</div>'>Dave Marinara
				</option>

				<option title="Rachel Howlett" data-content='<div class="inline-items">
											<div class="author-thumb">
												<img src="<?php echo base_url();?>app/img/avatar76-sm.jpg" alt="author">
											</div>
											<div class="h6 author-title">Rachel Howlett</div>
										</div>'>Rachel Howlett
				</option>

			</select>
		</form>

		<button name="submitGroup" id="submitGroup" class="btn btn-blue btn-lg full-width">Create Group</button>
	</div>


</div>
</div>
<!-- ... end Window-popup Create Friends Group -->



<!-- Window-popup Create Friends Group Add Friends -->
<div class="modal fade" id="create-group-add-friends">
	<div class="modal-dialog ui-block window-popup create-friend-group create-friends-group-add-friends">
		<a href="<?php echo base_url();?>app/#" class="close icon-close" data-dismiss="modal" aria-label="Close">
			<svg class="olymp-close-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-close-icon"></use></svg>
		</a>

	<div class="ui-block-title">
		<h6 class="title">Add Friends to “Freelance Clients” Group</h6>
	</div>

	<div class="ui-block-content">
		<form class="form-group label-floating is-select">

			<select class="selectpicker form-control style-2 show-tick" multiple data-max-options="2" data-live-search="true">
				<option title="Green Goo Rock" data-content='<div class="inline-items">
										<div class="author-thumb">
											<img src="<?php echo base_url();?>app/img/avatar52-sm.jpg" alt="author">
										</div>
											<div class="h6 author-title">Green Goo Rock</div>

										</div>'>Green Goo Rock
				</option>

				<option title="Mathilda Brinker" data-content='<div class="inline-items">
											<div class="author-thumb">
												<img src="<?php echo base_url();?>app/img/avatar74-sm.jpg" alt="author">
											</div>
											<div class="h6 author-title">Mathilda Brinker</div>
										</div>'>Mathilda Brinker
				</option>

				<option title="Marina Valentine" data-content='<div class="inline-items">
											<div class="author-thumb">
												<img src="<?php echo base_url();?>app/img/avatar48-sm.jpg" alt="author">
											</div>
											<div class="h6 author-title">Marina Valentine</div>
										</div>'>Marina Valentine
				</option>

				<option title="Dave Marinara" data-content='<div class="inline-items">
											<div class="author-thumb">
												<img src="<?php echo base_url();?>app/img/avatar75-sm.jpg" alt="author">
											</div>
											<div class="h6 author-title">Dave Marinara</div>
										</div>'>Dave Marinara
				</option>

				<option title="Rachel Howlett" data-content='<div class="inline-items">
											<div class="author-thumb">
												<img src="<?php echo base_url();?>app/img/avatar76-sm.jpg" alt="author">
											</div>
											<div class="h6 author-title">Rachel Howlett</div>
										</div>'>Rachel Howlett
				</option>

			</select>
		</form>

		<a href="<?php echo base_url();?>app/#" class="btn btn-blue btn-lg full-width">Save Changes</a>
	</div>

</div>
</div>
<!-- ... end Window-popup Create Friends Group Add Friends -->

