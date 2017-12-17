	<div class="row">

		<!-- Main Content -->

		<div class="col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-xs-12">
			<div id="newsfeed-items-grid">
				<div id="newsfeed-items-grid">
				<?php
				for($i=0;$i<count($passedData[2]);$i++){
					echo '<div class="ui-block">
						<article class="hentry post">

							<div class="post__author author vcard inline-items">
								<img src="'.base_url().'uploads/user/'.$passedData[2][$i]["PHOTO_USER"].'" alt="a">

								<div class="author-date">
									<a class="h6 post__author-name fn" href='.base_url().'app/">'.$passedData[2][$i]['FIRST_NAME_USER'].'</a>
									<div class="post__date">
										<time class="published" datetime="2004-07-24T18:18">
											'.$passedData[2][$i]["TIMESTAMP_POST"].'
										</time>
									</div>
								</div>

								<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="'.base_url().'app/icons/icons.svg#olymp-three-dots-icon"></use></svg>
									<ul class="more-dropdown">
										<li>
											<a href='.base_url().'app/#">Edit Post</a>
										</li>
										<li>
											<a href='.base_url().'app/#">Delete Post</a>
										</li>
										<li>
											<a href='.base_url().'app/#">Turn Off Notifications</a>
										</li>
										<li>
											<a href='.base_url().'app/#">Select as Featured</a>
										</li>
									</ul>
								</div>

							</div>

							<p>'.$passedData[2][$i]["CONTENT_POST"].'
							</p>

							<div class="post-additional-info inline-items">

								<a href='.base_url().'app/#" class="post-add-icon inline-items">
									<svg class="olymp-heart-icon"><use xlink:href="'.base_url().'app/icons/icons.svg#olymp-heart-icon"></use></svg>
									<span>0</span>
								</a>

								<!--<ul class="friends-harmonic">
									<li>
										<a href='.base_url().'app/#">
											<img src='.base_url().'app/img/friend-harmonic7.jpg" alt="friend">
										</a>
									</li>
								</ul>-->

								<!--div class="names-people-likes">
									<a href='.base_url().'app/#">You</a>, <a href='.base_url().'app/#">Elaine</a> and
									<br>22 more liked this
								</div>-->


								<div class="comments-shared">
									<a href='.base_url().'app/#" class="post-add-icon inline-items">
										<svg class="olymp-speech-balloon-icon"><use xlink:href="'.base_url().'app/icons/icons.svg#olymp-speech-balloon-icon"></use></svg>
										<span>'.count($passedData[3][$i]).'</span>
									</a>

									<a href='.base_url().'app/#" class="post-add-icon inline-items">
										<svg class="olymp-share-icon"><use xlink:href="'.base_url().'app/icons/icons.svg#olymp-share-icon"></use></svg>
										<span>24</span>
									</a>
								</div>


							</div>

							<div class="control-block-button post-control-button">

								<a href='.base_url().'app/#" class="btn btn-control">
									<svg class="olymp-like-post-icon"><use xlink:href="'.base_url().'app/icons/icons.svg#olymp-like-post-icon"></use></svg>
								</a>

								<a href='.base_url().'app/#" class="btn btn-control">
									<svg class="olymp-comments-post-icon"><use xlink:href="'.base_url().'app/icons/icons.svg#olymp-comments-post-icon"></use></svg>
								</a>

								<a href='.base_url().'app/#" class="btn btn-control">
									<svg class="olymp-share-icon"><use xlink:href="'.base_url().'app/icons/icons.svg#olymp-share-icon"></use></svg>
								</a>

							</div>

						</article>

						<ul class="comments-list">';
							for($j=0;$j<count($passedData[3]);$j++){
							
							if($passedData[2][$i]["ID_POST"]==$passedData[3][$j]["ID_POST"]){
								echo '<li>
									<div class="post__author author vcard inline-items">
										<img src="'.base_url().'uploads/user/'.$passedData[3][$j]["PHOTO_USER"].'" alt="author">

										<div class="author-date">
											<a class="h6 post__author-name fn" href='.base_url().'app/02-ProfilePage.html">'.$passedData[3][$j]["FIRST_NAME_USER"].'</a>
											<div class="post__date">
												<time class="published" datetime="2004-07-24T18:18">
													'.$passedData[3][$j]["TIMESTAMP_COMMENT_POST"].'
												</time>
											</div>
										</div>

										<a href='.base_url().'app/#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href='.base_url().'app/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>

									</div>

									<p>'.$passedData[3][$j]["CONTENT_COMMENT_POST"].'</p>
								</li>';
							}
						}
						echo '</ul>

						<!--<a href='.base_url().'app/#" class="more-comments">View more comments <span>+</span></a>-->

						<form class="comment-form inline-items">

							<div class="post__author author vcard inline-items">
								<img src="'.base_url().'uploads/user/'.$passedData[1][0]["PHOTO_USER"].'" alt="author">

								<div class="form-group with-icon-right ">
									<textarea class="form-control" placeholder=""  ></textarea>
									<div class="add-options-message">
										<a href="'.base_url().'app/#" class="options-message" data-toggle="modal" data-target="#update-header-photo">
											<svg class="olymp-camera-icon"><use xlink:href="'.base_url().'app/icons/icons.svg#olymp-camera-icon"></use></svg>
										</a>
									</div>
								</div>
							</div>
								<button class="btn btn-md-2 btn-primary">Post Comment</button>
						</form>

					</div>';
				}?>	
				</div>

			</div>

			<!--<a id="load-more-button" href="<?php echo base_url();?>app/#" class="btn btn-control btn-more" data-load-link="items-to-load.html" data-container="newsfeed-items-grid"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>-->
		</div>

		<!-- ... end Main Content -->


		<!-- Left Sidebar -->

		<div class="col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-12 col-xs-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Profile Intro</h6>
				</div>
				<div class="ui-block-content">
					<ul class="widget w-personal-info item-block">
						<li>
							<span class="title">About Me:</span>
							<span class="text"><?php echo $passedData[1][0]["BIO_USER"];?></span>
						</li>
						<li>
							<span class="title">Favourite TV Shows:</span>
							<!--<span class="text">Breaking Good, RedDevil, People of Interest, The Running Dead, Found,  American Guy.</span>-->
						</li>
						<li>
							<span class="title">Favourite Music Bands / Artists:</span>
							<!--<span class="text">Iron Maid, DC/AC, Megablow, The Ill, Kung Fighters, System of a Revenge.</span>-->
						</li>
					</ul>

				</div>
			</div>

		</div>

		<!-- ... end Left Sidebar -->


		<!-- Right Sidebar -->

		<div class="col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-xs-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Last Photos</h6>
				</div>
				<div class="ui-block-content">
					<ul class="widget w-last-photo js-zoom-gallery">
						<li>
							<a href="<?php echo base_url();?>app/img/last-photo10-large.jpg">
								<img src="<?php echo base_url();?>app/img/last-photo10-large.jpg" alt="photo">
							</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>app/img/last-phot11-large.jpg">
								<img src="<?php echo base_url();?>app/img/last-phot11-large.jpg" alt="photo">
							</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>app/img/last-phot12-large.jpg">
								<img src="<?php echo base_url();?>app/img/last-phot12-large.jpg" alt="photo">
							</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>app/img/last-phot13-large.jpg">
								<img src="<?php echo base_url();?>app/img/last-phot13-large.jpg" alt="photo">
							</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>app/img/last-phot14-large.jpg">
								<img src="<?php echo base_url();?>app/img/last-phot14-large.jpg" alt="photo">
							</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>app/img/last-phot15-large.jpg">
								<img src="<?php echo base_url();?>app/img/last-phot15-large.jpg" alt="photo">
							</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>app/img/last-phot16-large.jpg">
								<img src="<?php echo base_url();?>app/img/last-phot16-large.jpg" alt="photo">
							</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>app/img/last-phot17-large.jpg">
								<img src="<?php echo base_url();?>app/img/last-phot17-large.jpg" alt="photo">
							</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>app/img/last-phot18-large.jpg">
								<img src="<?php echo base_url();?>app/img/last-phot18-large.jpg" alt="photo">
							</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title"><?php //echo $passedData[4][0]["count(*)"];?></h6>
				</div>
				<div class="ui-block-content">
					<ul class="widget w-faved-page"><!--js-zoom-gallery-->
						<?php for($i=0;$i<count($passedData[4]);$i++){?>
						<li>
							<a href="<?php echo base_url().'Friends/index/'.$passedData[4][$i]["ID_USER"];?>">
								<img src="<?php echo base_url();?>uploads/user/<?php echo $passedData[4][$i]["PHOTO_USER"];?>" alt="author">
							</a>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>

		<!-- ... end Right Sidebar -->

	</div>