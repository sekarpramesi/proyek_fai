<!-- Main Content Groups -->
	<div class="row">
		<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<div class="ui-block" data-mh="friend-groups-item">
				<div class="friend-item friend-groups create-group" data-mh="friend-groups-item">

					<a href="<?php echo base_url();?>app/#" class="create-group full-block" data-toggle="modal" data-target="#create-group"></a>
					<div class="content">

						<a href="<?php echo base_url();?>app/#" class="  btn btn-control bg-blue" data-toggle="modal" data-target="#create-friend-group-1">
							<svg class="olymp-plus-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-plus-icon"></use></svg>
						</a>

						<div class="author-content">
							<a href="<?php echo base_url();?>app/#" class="h5 author-name">Create Group</a>
							<div class="country">Create your own group</div>
						</div>

					</div>

				</div>
			</div>

		</div>
		<?php for($i=0;$i<count($passedData[2]);$i++){
			echo '
			<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<div class="ui-block" data-mh="friend-groups-item">
					<div class="friend-item friend-groups">

						<div class="friend-item-content">

							<div class="more">
								<svg class="olymp-three-dots-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">
									<li>
										<a href="<?php echo base_url();?>app/#">Leave Group</a>
									</li>
								</ul>
							</div>
							<div class="friend-avatar">
								<div class="author-thumb">
									<img src="<?php echo base_url();?>app/img/logo.png" alt="Olympus">
								</div>
								<div class="author-content">
									<a href="<?php echo base_url();?>app/#" class="h5 author-name">'.$passedData[2][$i]["NAME_GROUP"].'</a>
									<div class="country">6 Friends in the Group</div>
								</div>
							</div>

							<ul class="friends-harmonic">
								<li>
									<a href="<?php echo base_url();?>app/#">
										<img src="<?php echo base_url();?>app/img/friend-harmonic5.jpg" alt="friend">
									</a>
								</li>
							</ul>


							<div class="control-block-button">
								<a href="<?php echo base_url();?>app/#" class="  btn btn-control bg-blue" data-toggle="modal" data-target="#create-friend-group-add-friends">
									<svg class="olymp-happy-faces-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-happy-faces-icon"></use></svg>
								</a>

								<a href="<?php echo base_url();?>app/#" class="btn btn-control btn-grey-lighter">
									<svg class="olymp-settings-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-settings-icon"></use></svg>
								</a>

							</div>
						</div>
					</div>
				</div>
			</div>';
		}?>

	</div>


<!-- ... end Main Content Groups -->