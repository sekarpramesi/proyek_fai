<div class="container">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="ui-block responsive-flex">
				<div class="ui-block-title">
					<div class="h6 title"><?php echo $passedData[1][0]["FIRST_NAME_USER"];?>'s Friends (<?php echo count($passedData[2]);?>)</div>
					<form class="w-search">
						<div class="form-group with-button is-empty">
							<input class="form-control" type="text" placeholder="Search Friends...">
							<button>
								<svg class="olymp-magnifying-glass-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-magnifying-glass-icon"></use></svg>
							</button>
						<span class="material-input"></span></div>
					</form>
					<a href="<?php echo base_url();?>app/#" class="more"><svg class="olymp-three-dots-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<?php for($i=0;$i<count($passedData[2]);$i++){?>
		<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<div class="ui-block">
				<div class="friend-item">
					<div class="friend-header-thumb">
						<img src="<?php echo base_url();?>app/img/friend1.jpg" alt="friend">
					</div>

					<div class="friend-item-content">

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg>
							<ul class="more-dropdown">
								<li>
									<a href="<?php echo base_url();?>app/#">Report Profile</a>
								</li>
								<li>
									<a href="<?php echo base_url();?>app/#">Block Profile</a>
								</li>
								<li>
									<a href="<?php echo base_url();?>app/#">Turn Off Notifications</a>
								</li>
							</ul>
						</div>
						<div class="friend-avatar">
							<div class="author-thumb">
								<img style="width:92px;height:92px;" src="<?php echo base_url();?>uploads/user/<?php echo $passedData[2][$i]["PHOTO_USER"];?>" alt="author">
							</div>
							<div class="author-content">
								<a href="<?php echo base_url();?>app/#" class="h5 author-name"><?php echo $passedData[2][$i]["FIRST_NAME_USER"].' '.$passedData[2][$i]["LAST_NAME_USER"];?></a>
								<div class="country"><?php echo $passedData[2][$i]["COUNTRY_USER"];?></div>
							</div>
						</div>

						<div class="swiper-container swiper-swiper-unique-id-0 initialized swiper-container-horizontal" data-slide="fade" id="swiper-unique-id-0">
							<div class="swiper-wrapper" style="width: 784px; transform: translate3d(-196px, 0px, 0px); transition-duration: 0ms;"><div class="swiper-slide swiper-slide-duplicate swiper-slide-prev swiper-slide-duplicate-next" data-swiper-slide-index="1" style="width: 196px;">
									<p class="friend-about" data-swiper-parallax="-500" style="transform: translate3d(-500px, 0px, 0px); transition-duration: 0ms;">
										<?php echo $passedData[2][$i]["BIO_USER"];?>
									</p>

									<div class="friend-since" data-swiper-parallax="-100" style="transform: translate3d(-100px, 0px, 0px); transition-duration: 0ms;">
										<span>Friends Since:</span>
										<div class="h6">December 2014</div>
									</div>
								</div>
								<div class="swiper-slide swiper-slide-active" data-swiper-slide-index="0" style="width: 196px;">
									<div class="friend-count" data-swiper-parallax="-500" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
										<a href="<?php echo base_url();?>app/#" class="friend-count-item">
											<div class="h6">52</div>
											<div class="title">Friends</div>
										</a>
										<a href="<?php echo base_url();?>app/#" class="friend-count-item">
											<div class="h6">240</div>
											<div class="title">Photos</div>
										</a>
										<a href="<?php echo base_url();?>app/#" class="friend-count-item">
											<div class="h6">16</div>
											<div class="title">Videos</div>
										</a>
									</div>
									<div class="control-block-button" data-swiper-parallax="-100" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
										<a href="<?php echo base_url();?>app/#" class="btn btn-control bg-blue">
											<svg class="olymp-happy-face-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-happy-face-icon"></use></svg>
										</a>

										<a href="<?php echo base_url();?>app/#" class="btn btn-control bg-purple">
											<svg class="olymp-chat---messages-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-chat---messages-icon"></use></svg>
										</a>

									</div>
								</div>

								<div class="swiper-slide swiper-slide-next swiper-slide-duplicate-prev" data-swiper-slide-index="1" style="width: 196px;">
									<p class="friend-about" data-swiper-parallax="-500" style="transform: translate3d(500px, 0px, 0px); transition-duration: 0ms;">
										<?php echo $passedData[2][$i]["BIO_USER"];?>
									</p>

									<div class="friend-since" data-swiper-parallax="-100" style="transform: translate3d(100px, 0px, 0px); transition-duration: 0ms;">
										<span>Friends Since:</span>
										<div class="h6">December 2014</div>
									</div>
								</div>
							<div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="0" style="width: 196px;">
									<div class="friend-count" data-swiper-parallax="-500" style="transform: translate3d(500px, 0px, 0px); transition-duration: 0ms;">
										<a href="<?php echo base_url();?>app/#" class="friend-count-item">
											<div class="h6">52</div>
											<div class="title">Friends</div>
										</a>
										<a href="<?php echo base_url();?>app/#" class="friend-count-item">
											<div class="h6">240</div>
											<div class="title">Photos</div>
										</a>
										<a href="<?php echo base_url();?>app/#" class="friend-count-item">
											<div class="h6">16</div>
											<div class="title">Videos</div>
										</a>
									</div>
									<div class="control-block-button" data-swiper-parallax="-100" style="transform: translate3d(100px, 0px, 0px); transition-duration: 0ms;">
										<a href="<?php echo base_url();?>app/#" class="btn btn-control bg-blue">
											<svg class="olymp-happy-face-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-happy-face-icon"></use></svg>
										</a>

										<a href="<?php echo base_url();?>app/#" class="btn btn-control bg-purple">
											<svg class="olymp-chat---messages-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-chat---messages-icon"></use></svg>
										</a>

									</div>
								</div></div>

							<!-- If we need pagination -->
							<div class="swiper-pagination pagination-swiper-unique-id-0 swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span><span class="swiper-pagination-bullet"></span></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php }?>
	</div>
</div>