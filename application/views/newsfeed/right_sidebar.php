		<!-- Right Sidebar -->

		<aside class="col-xl-4 order-xl-4 col-lg-6 order-lg-4 col-md-6 col-sm-12 col-xs-12">


			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Friend Suggestions</h6>
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
						</div>
						<span class="notification-icon">
							<a href="<?php echo base_url().'Friends/addFriend/'.$passedData[3][$i]["ID_USER"];?>" class="accept-request">
								<span class="icon-add without-text">
									<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-happy-face-icon"></use></svg>
								</span>
							</a>
						</span>

					</li>
					<?php }?>

				</ul>

			</div>

		</aside>

		<!-- ... end Right Sidebar -->