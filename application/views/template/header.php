
<!-- Header -->
<header class="header" id="site-header">

	<div class="page-title">
		<a href="<?php echo base_url();?>Newsfeed/index" style="color:white;"><h6>Newsfeed</h6></a>
	</div>

	<div class="header-content-wrapper">
		<form class="search-bar w-search notification-list friend-requests">
			<div class="form-group with-button">
				<input class="form-control js-user-search" placeholder="Search here people or pages..." type="text">
				<button>
					<svg class="olymp-magnifying-glass-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-magnifying-glass-icon"></use></svg>
				</button>
			</div>
		</form>

		<a href="<?php echo base_url();?>app/#" class="link-find-friend">Find Friends</a>

		<div class="control-block">

			<div class="control-icon more has-items">
				<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-happy-face-icon"></use></svg>
				<div class="label-avatar bg-blue"><?php echo count($friendsRequest);?></div>

				<div class="more-dropdown more-with-triangle triangle-top-center">
					<div class="ui-block-title ui-block-title-small">
						<h6 class="title">FRIEND REQUESTS</h6>
						<a href="<?php echo base_url();?>app/#">Find Friends</a>
						<a href="<?php echo base_url();?>app/#">Settings</a>
					</div>

					<div class="mCustomScrollbar" data-mcs-theme="dark">
							<ul class="notification-list friend-requests">
							<?php for($i=0;$i<count($friendsRequest);$i++){?>
							<li>
								<div class="author-thumb">
									<img src="<?php echo base_url().'uploads/user/'.$friendsRequest[$i]["PHOTO_USER"];?>" alt="author">
								</div>
								<div class="notification-event">
									<a href="<?php echo base_url();?>app/#" class="h6 notification-friend"><?php echo $friendsRequest[$i]["FIRST_NAME_USER"];?></a>
									<span class="chat-message-item">Mutual Friend: </span>
								</div>
											<span class="notification-icon">
												<a href="<?php echo base_url().'Friends/acceptFriend/'.$friendsRequest[$i]["ID_USER"];?>" class="accept-request">
													<span class="icon-add without-text">
														<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-happy-face-icon"></use></svg>
													</span>
												</a>

												<a href="<?php echo base_url().'Friends/declineFriend/'.$friendsRequest[$i]["ID_RELATIONSHIP"];?>" class="accept-request request-del">
													<span class="icon-minus">
														<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-happy-face-icon"></use></svg>
													</span>
												</a>

											</span>

								<div class="more">
									<svg class="olymp-three-dots-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg>
								</div>
							</li>
							<?php }?>
						</ul>
					</div>

					<a href="<?php echo base_url();?>app/#" class="view-all bg-blue">Check all your Events</a>
				</div>
			</div>

			<div class="control-icon more has-items">
				<svg class="olymp-chat---messages-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-chat---messages-icon"></use></svg>
				<div class="label-avatar bg-purple">2</div>

				<div class="more-dropdown more-with-triangle triangle-top-center">
					<div class="ui-block-title ui-block-title-small">
						<h6 class="title">Chat / Messages</h6>
						<a href="<?php echo base_url();?>Chat/MarkAllRead">Mark all as read</a>
						<a href="<?php echo base_url();?>Settings/Chat">Settings</a>
					</div>

					<div class="mCustomScrollbar" data-mcs-theme="dark">
						<ul class="notification-list chat-message">
							<li class="message-unread">
								<div class="author-thumb">
									<img src="<?php echo base_url();?>app/img/avatar59-sm.jpg" alt="author">
								</div>
								<div class="notification-event">
									<a href="<?php echo base_url();?>app/#" class="h6 notification-friend">Diana Jameson</a>
									<span class="chat-message-item">Hi James! It’s Diana, I just wanted to let you know that we have to reschedule...</span>
									<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
								</div>
								<span class="notification-icon">
									<svg class="olymp-chat---messages-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-chat---messages-icon"></use></svg>
								</span>
								<div class="more">
									<svg class="olymp-three-dots-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg>
								</div>
							</li>

							<li>
								<div class="author-thumb">
									<img src="<?php echo base_url();?>app/img/avatar60-sm.jpg" alt="author">
								</div>
								<div class="notification-event">
									<a href="<?php echo base_url();?>app/#" class="h6 notification-friend">Jake Parker</a>
									<span class="chat-message-item">Great, I’ll see you tomorrow!.</span>
									<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
								</div>
								<span class="notification-icon">
									<svg class="olymp-chat---messages-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-chat---messages-icon"></use></svg>
								</span>

								<div class="more">
									<svg class="olymp-three-dots-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg>
								</div>
							</li>
							<li>
								<div class="author-thumb">
									<img src="<?php echo base_url();?>app/img/avatar61-sm.jpg" alt="author">
								</div>
								<div class="notification-event">
									<a href="<?php echo base_url();?>app/#" class="h6 notification-friend">Elaine Dreyfuss</a>
									<span class="chat-message-item">We’ll have to check that at the office and see if the client is on board with...</span>
									<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 9:56pm</time></span>
								</div>
									<span class="notification-icon">
										<svg class="olymp-chat---messages-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-chat---messages-icon"></use></svg>
									</span>
								<div class="more">
									<svg class="olymp-three-dots-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg>
								</div>
							</li>

							<li class="chat-group">
								<div class="author-thumb">
									<img src="<?php echo base_url();?>app/img/avatar11-sm.jpg" alt="author">
									<img src="<?php echo base_url();?>app/img/avatar12-sm.jpg" alt="author">
									<img src="<?php echo base_url();?>app/img/avatar13-sm.jpg" alt="author">
									<img src="<?php echo base_url();?>app/img/avatar10-sm.jpg" alt="author">
								</div>
								<div class="notification-event">
									<a href="<?php echo base_url();?>app/#" class="h6 notification-friend">You, Faye, Ed &amp; Jet +3</a>
									<span class="last-message-author">Ed:</span>
									<span class="chat-message-item">Yeah! Seems fine by me!</span>
									<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 16th at 10:23am</time></span>
								</div>
									<span class="notification-icon">
										<svg class="olymp-chat---messages-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-chat---messages-icon"></use></svg>
									</span>
								<div class="more">
									<svg class="olymp-three-dots-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg>
								</div>
							</li>
						</ul>
					</div>

					<a href="<?php echo base_url();?>app/#" class="view-all bg-purple">View All Messages</a>
				</div>
			</div>

			<div class="author-page author vcard inline-items more">
				<div class="author-thumb">
					<img alt="author" style="width:36px;height:36px;" src="<?php echo base_url();?>uploads/user/<?php echo $profile[0]['PHOTO_USER'];?>" class="avatar">
					<span class="icon-status online"></span>
					<div class="more-dropdown more-with-triangle">
						<div class="mCustomScrollbar" data-mcs-theme="dark">
							<div class="ui-block-title ui-block-title-small">
								<h6 class="title">Your Account</h6>
							</div>

							<ul class="account-settings">
								<li>
									<a href="<?php echo base_url();?>Dashboard/index">

										<svg class="olymp-menu-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-menu-icon"></use></svg>

										<span>Profile Settings</span>
									</a>
								</li>
								<li>
									<a href="<?php echo base_url();?>Home/Logout">
										<svg class="olymp-logout-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-logout-icon"></use></svg>

										<span>Log Out</span>
									</a>
								</li>
							</ul>
						</div>

					</div>
				</div>
				<a href="<?php echo base_url();?>User/index" class="author-name fn">
					<div class="author-title">
						<?php echo $profile[0]["FIRST_NAME_USER"]." ".$profile[0]["LAST_NAME_USER"];?><svg class="olymp-dropdown-arrow-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
					</div>
					<!--<span class="author-subtitle">SPACE COWBOY</span>-->
				</a>
			</div>

		</div>
	</div>

</header>

<!-- ... end Header -->


<!-- Responsive Header -->

<header class="header header-responsive" id="site-header-responsive">

	<div class="header-content-wrapper">
		<ul class="nav nav-tabs mobile-app-tabs" role="tablist">
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="<?php echo base_url();?>app/#request" role="tab">
					<div class="control-icon has-items">
						<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-happy-face-icon"></use></svg>
						<div class="label-avatar bg-blue">6</div>
					</div>
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="<?php echo base_url();?>app/#chat" role="tab">
					<div class="control-icon has-items">
						<svg class="olymp-chat---messages-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-chat---messages-icon"></use></svg>
						<div class="label-avatar bg-purple">2</div>
					</div>
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="<?php echo base_url();?>app/#notification" role="tab">
					<div class="control-icon has-items">
						<svg class="olymp-thunder-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-thunder-icon"></use></svg>
						<div class="label-avatar bg-primary">8</div>
					</div>
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="<?php echo base_url();?>app/#search" role="tab">
					<svg class="olymp-magnifying-glass-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-magnifying-glass-icon"></use></svg>
					<svg class="olymp-close-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-close-icon"></use></svg>
				</a>
			</li>
		</ul>
	</div>

	<!-- Tab panes -->
	<div class="tab-content tab-content-responsive">

		<div class="tab-pane " id="request" role="tabpanel">

			<div class="mCustomScrollbar" data-mcs-theme="dark">
				<div class="ui-block-title ui-block-title-small">
					<h6 class="title">FRIEND REQUESTS</h6>
				</div>
							<ul class="notification-list friend-requests">
							<?php for($i=0;$i<count($friendsRequest);$i++){?>
							<li>
								<div class="author-thumb">
									<img src="<?php echo base_url().'uploads/user/'.$friendsRequest[$i]["PHOTO_USER"];?>" alt="author">
								</div>
								<div class="notification-event">
									<a href="<?php echo base_url();?>app/#" class="h6 notification-friend"><?php echo $friendsRequest[$i]["FIRST_NAME_USER"];?></a>
									<span class="chat-message-item">Mutual Friend: </span>
								</div>
											<span class="notification-icon">
												<a href="<?php echo base_url().'Friends/acceptFriend/'.$friendsRequest[$i]["ID_USER"];?>" class="accept-request">
													<span class="icon-add without-text">
														<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-happy-face-icon"></use></svg>
													</span>
												</a>

												<a href="<?php echo base_url().'Friends/declineFriend/'.$friendsRequest[$i]["ID_RELATIONSHIP"];?>" class="accept-request request-del">
													<span class="icon-minus">
														<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-happy-face-icon"></use></svg>
													</span>
												</a>

											</span>

								<div class="more">
									<svg class="olymp-three-dots-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg>
								</div>
							</li>
							<?php }?>
						</ul>
				<a href="<?php echo base_url();?>app/#" class="view-all bg-blue">Check all your Requests</a>
			</div>

		</div>

		<div class="tab-pane " id="chat" role="tabpanel">

			<div class="mCustomScrollbar" data-mcs-theme="dark">
				<div class="ui-block-title ui-block-title-small">
					<h6 class="title">Chat / Messages</h6>
					<a href="<?php echo base_url();?>app/#">Mark all as read</a>
					<a href="<?php echo base_url();?>app/#">Settings</a>
				</div>

				<ul class="notification-list chat-message">
					<li class="message-unread">
						<div class="author-thumb">
							<img src="<?php echo base_url();?>app/img/avatar59-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="<?php echo base_url();?>app/#" class="h6 notification-friend">Diana Jameson</a>
							<span class="chat-message-item">Hi James! It’s Diana, I just wanted to let you know that we have to reschedule...</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
						</div>
									<span class="notification-icon">
										<svg class="olymp-chat---messages-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-chat---messages-icon"></use></svg>
									</span>
						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img src="<?php echo base_url();?>app/img/avatar60-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="<?php echo base_url();?>app/#" class="h6 notification-friend">Jake Parker</a>
							<span class="chat-message-item">Great, I’ll see you tomorrow!.</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
						</div>
									<span class="notification-icon">
										<svg class="olymp-chat---messages-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-chat---messages-icon"></use></svg>
									</span>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg>
						</div>
					</li>
					<li>
						<div class="author-thumb">
							<img src="<?php echo base_url();?>app/img/avatar61-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="<?php echo base_url();?>app/#" class="h6 notification-friend">Elaine Dreyfuss</a>
							<span class="chat-message-item">We’ll have to check that at the office and see if the client is on board with...</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 9:56pm</time></span>
						</div>
										<span class="notification-icon">
											<svg class="olymp-chat---messages-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-chat---messages-icon"></use></svg>
										</span>
						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg>
						</div>
					</li>

					<li class="chat-group">
						<div class="author-thumb">
							<img src="<?php echo base_url();?>app/img/avatar11-sm.jpg" alt="author">
							<img src="<?php echo base_url();?>app/img/avatar12-sm.jpg" alt="author">
							<img src="<?php echo base_url();?>app/img/avatar13-sm.jpg" alt="author">
							<img src="<?php echo base_url();?>app/img/avatar10-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="<?php echo base_url();?>app/#" class="h6 notification-friend">You, Faye, Ed &amp; Jet +3</a>
							<span class="last-message-author">Ed:</span>
							<span class="chat-message-item">Yeah! Seems fine by me!</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 16th at 10:23am</time></span>
						</div>
										<span class="notification-icon">
											<svg class="olymp-chat---messages-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-chat---messages-icon"></use></svg>
										</span>
						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg>
						</div>
					</li>
				</ul>

				<a href="<?php echo base_url();?>app/#" class="view-all bg-purple">View All Messages</a>
			</div>

		</div>

		<div class="tab-pane " id="notification" role="tabpanel">

			<div class="mCustomScrollbar" data-mcs-theme="dark">
				<div class="ui-block-title ui-block-title-small">
					<h6 class="title">Notifications</h6>
					<a href="<?php echo base_url();?>app/#">Mark all as read</a>
					<a href="<?php echo base_url();?>app/#">Settings</a>
				</div>

				<ul class="notification-list">
					<li>
						<div class="author-thumb">
							<img src="<?php echo base_url();?>app/img/avatar62-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<div><a href="<?php echo base_url();?>app/#" class="h6 notification-friend">Mathilda Brinker</a> commented on your new <a href="<?php echo base_url();?>app/#" class="notification-link">profile status</a>.</div>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
						</div>
										<span class="notification-icon">
											<svg class="olymp-comments-post-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-comments-post-icon"></use></svg>
										</span>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg>
							<svg class="olymp-little-delete"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-little-delete"></use></svg>
						</div>
					</li>

					<li class="un-read">
						<div class="author-thumb">
							<img src="<?php echo base_url();?>app/img/avatar63-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<div>You and <a href="<?php echo base_url();?>app/#" class="h6 notification-friend">Nicholas Grissom</a> just became friends. Write on <a href="<?php echo base_url();?>app/#" class="notification-link">his wall</a>.</div>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">9 hours ago</time></span>
						</div>
										<span class="notification-icon">
											<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-happy-face-icon"></use></svg>
										</span>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg>
							<svg class="olymp-little-delete"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-little-delete"></use></svg>
						</div>
					</li>

					<li class="with-comment-photo">
						<div class="author-thumb">
							<img src="<?php echo base_url();?>app/img/avatar64-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<div><a href="<?php echo base_url();?>app/#" class="h6 notification-friend">Sarah Hetfield</a> commented on your <a href="<?php echo base_url();?>app/#" class="notification-link">photo</a>.</div>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 5:32am</time></span>
						</div>
										<span class="notification-icon">
											<svg class="olymp-comments-post-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-comments-post-icon"></use></svg>
										</span>

						<div class="comment-photo">
							<img src="<?php echo base_url();?>app/img/comment-photo1.jpg" alt="photo">
							<span>“She looks incredible in that outfit! We should see each...”</span>
						</div>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg>
							<svg class="olymp-little-delete"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-little-delete"></use></svg>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img src="<?php echo base_url();?>app/img/avatar65-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<div><a href="<?php echo base_url();?>app/#" class="h6 notification-friend">Green Goo Rock</a> invited you to attend to his event Goo in <a href="<?php echo base_url();?>app/#" class="notification-link">Gotham Bar</a>.</div>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 5th at 6:43pm</time></span>
						</div>
										<span class="notification-icon">
											<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-happy-face-icon"></use></svg>
										</span>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg>
							<svg class="olymp-little-delete"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-little-delete"></use></svg>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img src="<?php echo base_url();?>app/img/avatar66-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<div><a href="<?php echo base_url();?>app/#" class="h6 notification-friend">James Summers</a> commented on your new <a href="<?php echo base_url();?>app/#" class="notification-link">profile status</a>.</div>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 2nd at 8:29pm</time></span>
						</div>
										<span class="notification-icon">
											<svg class="olymp-heart-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-heart-icon"></use></svg>
										</span>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg>
							<svg class="olymp-little-delete"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-little-delete"></use></svg>
						</div>
					</li>
				</ul>

				<a href="<?php echo base_url();?>app/#" class="view-all bg-primary">View All Notifications</a>
			</div>

		</div>

		<div class="tab-pane " id="search" role="tabpanel">
				<form class="search-bar w-search notification-list friend-requests">
					<div class="form-group with-button">
						<input class="form-control js-user-search" placeholder="Search here people or pages..." type="text">
					</div>
				</form>


		</div>

	</div>
	<!-- ... end  Tab panes -->

</header>

<!-- ... end Responsive Header -->

<div class="header-spacer"></div>