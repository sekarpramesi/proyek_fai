		<!-- Right Sidebar -->

		<aside class="col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-xs-12">


			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Friend Suggestions<span style="color:red;">TODO</span></h6>
					<a href="<?php echo base_url();?>app/#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>

				<ul class="widget w-friend-pages-added notification-list friend-requests">
					<?php for($i=0;$i<count($passedData[3]);$i++){?>
					<li class="inline-items">
						<div class="author-thumb">
							<img src="<?php echo base_url().'uploads/user/'.$passedData[3][$i]["PHOTO_USER"];?>" alt="author">
						</div>
						<div class="notification-event">
							<a href="<?php echo base_url();?>app/#" class="h6 notification-friend"><?php echo $passedData[3][$i]["FIRST_NAME_USER"].' '.$passedData[3][$i]["LAST_NAME_USER"];?></a>
							<span class="chat-message-item">8 Friends in Common</span>
						</div>
						<span class="notification-icon">
							<a href="<?php echo base_url();?>app/#" class="accept-request">
								<span class="icon-add without-text">
									<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-happy-face-icon"></use></svg>
								</span>
							</a>
						</span>

					</li>
					<?php }?>

				</ul>

			</div>

			<div class="ui-block">

				<div class="ui-block-title">
					<h6 class="title">Activity Feed<span style="color:red;">TODO</span></h6>
					<a href="<?php echo base_url();?>app/#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>

				<ul class="widget w-activity-feed notification-list">
					<li>
						<div class="author-thumb">
							<img src="<?php echo base_url();?>app/img/avatar49-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="<?php echo base_url();?>app/#" class="h6 notification-friend">Marina Polson</a> commented on Jason Mark’s <a href="<?php echo base_url();?>app/#" class="notification-link">photo.</a>.
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">2 mins ago</time></span>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img src="<?php echo base_url();?>app/img/avatar9-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="<?php echo base_url();?>app/#" class="h6 notification-friend">Jake Parker </a> liked Nicholas Grissom’s <a href="<?php echo base_url();?>app/#" class="notification-link">status update.</a>.
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">5 mins ago</time></span>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img src="<?php echo base_url();?>app/img/avatar50-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="<?php echo base_url();?>app/#" class="h6 notification-friend">Mary Jane Stark </a> added 20 new photos to her <a href="<?php echo base_url();?>app/#" class="notification-link">gallery album.</a>.
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">12 mins ago</time></span>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img src="<?php echo base_url();?>app/img/avatar51-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="<?php echo base_url();?>app/#" class="h6 notification-friend">Nicholas Grissom </a> updated his profile <a href="<?php echo base_url();?>app/#" class="notification-link">photo</a>.
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">1 hour ago</time></span>
						</div>
					</li>
					<li>
						<div class="author-thumb">
							<img src="<?php echo base_url();?>app/img/avatar48-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="<?php echo base_url();?>app/#" class="h6 notification-friend">Marina Valentine </a> commented on Chris Greyson’s <a href="<?php echo base_url();?>app/#" class="notification-link">status update</a>.
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">1 hour ago</time></span>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img src="<?php echo base_url();?>app/img/avatar52-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="<?php echo base_url();?>app/#" class="h6 notification-friend">Green Goo Rock </a> posted a <a href="<?php echo base_url();?>app/#" class="notification-link">status update</a>.
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">1 hour ago</time></span>
						</div>
					</li>
					<li>
						<div class="author-thumb">
							<img src="<?php echo base_url();?>app/img/avatar10-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="<?php echo base_url();?>app/#" class="h6 notification-friend">Elaine Dreyfuss  </a> liked your <a href="<?php echo base_url();?>app/#" class="notification-link">blog post</a>.
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">2 hours ago</time></span>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img src="<?php echo base_url();?>app/img/avatar10-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="<?php echo base_url();?>app/#" class="h6 notification-friend">Elaine Dreyfuss  </a> commented on your <a href="<?php echo base_url();?>app/#" class="notification-link">blog post</a>.
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">2 hours ago</time></span>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img src="<?php echo base_url();?>app/img/avatar53-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="<?php echo base_url();?>app/#" class="h6 notification-friend">Bruce Peterson </a> changed his <a href="<?php echo base_url();?>app/#" class="notification-link">profile picture</a>.
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">15 hours ago</time></span>
						</div>
					</li>

				</ul>
			</div>


		</aside>

		<!-- ... end Right Sidebar -->