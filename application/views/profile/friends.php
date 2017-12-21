
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="ui-block responsive-flex">
				<div class="ui-block-title">
					<div class="h6 title"><?php echo $passedData[1][0]["FIRST_NAME_USER"];?>'s Friends <?php echo count($passedData[2]);?></div>
					<form class="w-search">
						<div class="form-group with-button">
							<input class="form-control" type="text" placeholder="Search Friends...">
							<button>
								<svg class="olymp-magnifying-glass-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-magnifying-glass-icon"></use></svg>
							</button>
						</div>
					</form>
					<a href="<?php echo base_url();?>app/#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
			</div>
		</div>
	</div>



<!-- Friends -->

	<div class="row">
		<?php for($i=0;$i<count($passedData[2]);$i++){?>
			<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<div class="ui-block">
					<div class="friend-item">
						<div class="friend-header-thumb">
							<img src="" alt="friend">
						</div>

						<div class="friend-item-content">

							<div class="friend-avatar">
								<div class="author-thumb">
									<img style="width:92px;height:92px;" src="<?php echo base_url().'uploads/user/'.$passedData[2][$i]["PHOTO_USER"];?>" alt="author">
								</div>
								<div class="author-content">
									<a href="<?php echo base_url();?>app/#" class="h5 author-name"><?php echo $passedData[2][$i]["FIRST_NAME_USER"];?></a>
									<div class="country">San Francisco, CA</div>
								</div>
							</div>

							<div class="swiper-container" data-slide="fade">
								<div class="swiper-wrapper">
									<div class="swiper-slide">
										<div class="friend-count" data-swiper-parallax="-500">
											<a href="<?php echo base_url();?>app/#" class="friend-count-item">
												<div class="h6">52</div>
												<div class="title">Friends</div>
											</a>
										</div>
										<div class="control-block-button" data-swiper-parallax="-100">
											<a href="<?php echo base_url().'Friends/blockFriend/'.$passedData[2][$i]["ID_USER"];?>" class="btn btn-control bg-blue">
												<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-happy-face-icon"></use></svg>
											</a>

											<a href="<?php echo base_url();?>app/#" class="btn btn-control bg-purple">
												<svg class="olymp-chat---messages-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-chat---messages-icon"></use></svg>
											</a>

										</div>
									</div>

									<div class="swiper-slide">
										<p class="friend-about" data-swiper-parallax="-500">
											<?php echo $passedData[2][$i]["BIO_USER"];?>
										</p>

										<div class="friend-since" data-swiper-parallax="-100">
											<span>Friends Since:</span>
											<div class="h6">December 2014</div>
										</div>
									</div>
								</div>

								<!-- If we need pagination -->
								<div class="swiper-pagination"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php }?>
	</div>


<!-- ... end Friends -->
