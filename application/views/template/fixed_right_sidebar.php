<!-- Fixed Sidebar Right -->

<div class="fixed-sidebar right">
	<div class="fixed-sidebar-right sidebar--small" id="sidebar-right">

		<div class="mCustomScrollbar" data-mcs-theme="dark">
			<ul class="chat-users">
				<!--Not expanded-->
				<?php for($i=0;$i<count($friends);$i++){?>
				<li class="inline-items js-chat-open-custom" data-name="<?php echo $friends[$i]["FIRST_NAME_USER"];?>"
					data-toId="<?php echo $friends[$i]["ID_USER"];?>" 
					data-fromId="<?php echo $profile[0]["ID_USER"];?>">
					<div class="author-thumb">
						<img style="width:40px;height:40px;" alt="author" src="<?php echo base_url().'uploads/user/'.$friends[$i]["PHOTO_USER"];?>" class="avatar">
						<span class="icon-status online"></span>
					</div>
				</li>
				<?php }?>
			</ul>
		</div>

		<div class="search-friend inline-items">
			<a href="<?php echo base_url();?>app/#" class="js-sidebar-open">
				<svg class="olymp-menu-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-menu-icon"></use></svg>
			</a>
		</div>

		<a href="<?php echo base_url();?>Chat/index" class="olympus-chat inline-items">
			<svg class="olymp-chat---messages-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-chat---messages-icon"></use></svg>
		</a>

	</div>

	<div class="fixed-sidebar-right sidebar--large" id="sidebar-right-1">

		<div class="mCustomScrollbar" data-mcs-theme="dark">

			<div class="ui-block-title ui-block-title-small">
				<a href="<?php echo base_url();?>app/#" class="title">Close Friends</a>
				<a href="<?php echo base_url();?>app/#">Settings</a>
			</div>
			<!--expanded-->
			<ul class="chat-users">
				<?php for($i=0;$i<count($friends);$i++){?>
				<li class="inline-items js-chat-open-custom" data-id="<?php echo $friends[$i]["FIRST_NAME_USER"];?>">

					<div class="author-thumb">
						<img alt="author" src="<?php echo base_url().'uploads/user/'.$friends[$i]["PHOTO_USER"];?>" class="avatar" width="40px" height="40px">
						<span class="icon-status online"></span>
					</div>

					<div class="author-status">
						<a href="<?php echo base_url();?>app/#" class="h6 author-name"><?php echo $friends[$i]["FIRST_NAME_USER"].' '.$friends[$i]["LAST_NAME_USER"];?></a>
						<span class="status">ONLINE</span>
					</div>

					<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg>

						<ul class="more-icons">
							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-add-to-conversation-icon"></use></svg>
							</li>
						</ul>

					</div>

				</li>
				<?php }?>
			</ul>


			<div class="ui-block-title ui-block-title-small">
				<a href="<?php echo base_url();?>app/#" class="title">GROUP CHAT</a>
				<a href="<?php echo base_url();?>app/#">Settings</a>
			</div>
			<!--GROUP CHAT-->
			<!--<ul class="chat-users">
				<li class="inline-items js-chat-open">

					<div class="author-thumb">
						<img alt="author" src="<?php echo base_url();?>app/img/avatar64-sm.jpg" class="avatar">
						<span class="icon-status online"></span>
					</div>

					<div class="author-status">
						<a href="<?php echo base_url();?>app/#" class="h6 author-name">Sarah Hetfield</a>
						<span class="status">ONLINE</span>
					</div>

					<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg>

						<ul class="more-icons">
							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-comments-post-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-add-to-conversation-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-block-from-chat-icon"></use></svg>
							</li>
						</ul>

					</div>
				</li>
			<--</ul>-->

		</div>

		<div class="search-friend inline-items">
			<form class="form-group">
				<input class="form-control" placeholder="Search Friends..." value="" type="text">
			</form>

			<a>
			</a>

			<a href="<?php echo base_url();?>app/#" class="js-sidebar-open">
				<svg class="olymp-close-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-close-icon"></use></svg>
			</a>


		</div>

		<a href="<?php echo base_url();?>Chat/Index" class="olympus-chat inline-items">

			<h6 class="olympus-chat-title">OLYMPUS CHAT</h6>
			<svg class="olymp-chat---messages-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-chat---messages-icon"></use></svg>
		</a>

	</div>
</div>

<!-- ... end Fixed Sidebar Right -->

<!-- Fixed Sidebar Right -->

<div class="fixed-sidebar right fixed-sidebar-responsive">

	<div class="fixed-sidebar-right sidebar--small" id="sidebar-right-responsive">

		<a href="<?php echo base_url();?>app/#" class="olympus-chat inline-items js-chat-open-custom">
			<svg class="olymp-chat---messages-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-chat---messages-icon"></use></svg>
		</a>

	</div>

</div>

<!-- ... end Fixed Sidebar Right -->
