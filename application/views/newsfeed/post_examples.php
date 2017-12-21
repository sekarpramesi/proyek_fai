
				<div id="newsfeed-items-grid">
				<?php
                    if ($passedData[0][0]["CONTENT_POST"]!="" || $passedData[0][0]["CONTENT_POST"]!=null)
                    {
                        for ($i = 0; $i < count($passedData[0]); $i++) {
                            //echo count($passedData[0]);
                            echo '<div class="ui-block">
						<article class="hentry post">

							<div class="post__author author vcard inline-items">
								<img src=' . base_url() . 'uploads/user/' . $passedData[0][$i]["PHOTO_USER"] . '" alt="a">

								<div class="author-date">
									<a class="h6 post__author-name fn" href=' . base_url() . 'app/">' . $passedData[0][$i]['FIRST_NAME_USER'] . '</a>
									<div class="post__date">
										<time class="published" datetime="2004-07-24T18:18">
											' . $passedData[0][$i]["TIMESTAMP_POST"] . '
										</time>
									</div>
								</div>

								<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="' . base_url() . 'app/icons/icons.svg#olymp-three-dots-icon"></use></svg>
									<ul class="more-dropdown">
										<li>
											<a href=' . base_url() . 'app/#">Edit Post</a>
										</li>
										<li>
											<a href=' . base_url() . 'app/#">Delete Post</a>
										</li>
										<li>
											<a href=' . base_url() . 'app/#">Turn Off Notifications</a>
										</li>
										<li>
											<a href=' . base_url() . 'app/#">Select as Featured</a>
										</li>
									</ul>
								</div>

							</div>

							<p>' . $passedData[0][$i]["CONTENT_POST"] . '
							</p>

							<div class="post-additional-info inline-items">

								<a href=' . base_url() . 'app/#" class="post-add-icon inline-items">
									<svg class="olymp-heart-icon"><use xlink:href="' . base_url() . 'app/icons/icons.svg#olymp-heart-icon"></use></svg>
									<span>0</span>
								</a>

								<!--<ul class="friends-harmonic">
									<li>
										<a href=' . base_url() . 'app/#">
											<img src=' . base_url() . 'app/img/friend-harmonic7.jpg" alt="friend">
										</a>
									</li>
								</ul>-->

								<!--div class="names-people-likes">
									<a href=' . base_url() . 'app/#">You</a>, <a href=' . base_url() . 'app/#">Elaine</a> and
									<br>22 more liked this
								</div>-->


								<div class="comments-shared">
									<a href=' . base_url() . 'app/#" class="post-add-icon inline-items">
										<svg class="olymp-speech-balloon-icon"><use xlink:href="' . base_url() . 'app/icons/icons.svg#olymp-speech-balloon-icon"></use></svg>
										<span>' . count($passedData[1][$i]) . '</span>
									</a>

									<a href=' . base_url() . 'app/#" class="post-add-icon inline-items">
										<svg class="olymp-share-icon"><use xlink:href="' . base_url() . 'app/icons/icons.svg#olymp-share-icon"></use></svg>
										<span>24</span>
									</a>
								</div>


							</div>

							<div class="control-block-button post-control-button">

								<a href=' . base_url() . 'app/#" class="btn btn-control">
									<svg class="olymp-like-post-icon"><use xlink:href="' . base_url() . 'app/icons/icons.svg#olymp-like-post-icon"></use></svg>
								</a>

								<a href=' . base_url() . 'app/#" class="btn btn-control">
									<svg class="olymp-comments-post-icon"><use xlink:href="' . base_url() . 'app/icons/icons.svg#olymp-comments-post-icon"></use></svg>
								</a>

								<a href=' . base_url() . 'app/#" class="btn btn-control">
									<svg class="olymp-share-icon"><use xlink:href="' . base_url() . 'app/icons/icons.svg#olymp-share-icon"></use></svg>
								</a>

							</div>

						</article>

						<ul class="comments-list">';
                            for ($j = 0; $j < count($passedData[1]); $j++) {

                                if ($passedData[0][$i]["ID_POST"] == $passedData[1][$j]["ID_POST"]) {
                                    echo '<li>
									<div class="post__author author vcard inline-items">
										<img src=' . base_url() . 'app/img/author-page.jpg" alt="author">

										<div class="author-date">
											<a class="h6 post__author-name fn" href=' . base_url() . 'app/02-ProfilePage.html">' . $passedData[1][$j]["FIRST_NAME_USER"] . '</a>
											<div class="post__date">
												<time class="published" datetime="2004-07-24T18:18">
													' . $passedData[1][$j]["TIMESTAMP_COMMENT_POST"] . '
												</time>
											</div>
										</div>

										<a href=' . base_url() . 'app/#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href=' . base_url() . 'app/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>

									</div>

									<p>' . $passedData[1][$j]["CONTENT_COMMENT_POST"] . '</p>
								</li>';
                                }
                            }
                       echo '</ul>';


						echo '<form class="comment-form inline-items" action="'.base_url()."Newsfeed/insertComment/".$passedData[0][$i]["ID_POST"].'">
							<div class="post__author author vcard inline-items">
								<img src=' . base_url() . 'app/img/author-page.jpg" alt="author">

								<div class="form-group with-icon-right ">
									<textarea class="form-control" placeholder="" name="txtComment" ></textarea>
									<div class="add-options-message">
										<a href="' . base_url() . 'app/#" class="options-message" data-toggle="modal" data-target="#update-header-photo">
											<svg class="olymp-camera-icon"><use xlink:href="' . base_url() . 'app/icons/icons.svg#olymp-camera-icon"></use></svg>
										</a>
									</div>
								</div>
							</div>
								<button class="btn btn-md-2 btn-primary" name="btninsertcomment">Post Comment</button>
						</form>

					</div>';
                        }
                    }

				?>
			</div>

<!-- Window Popup Share Post -->

<div class="modal fade" id="share-post">
	<div class="modal-dialog ui-block window-popup fav-page-popup">
		<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
			<svg class="olymp-close-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-close-icon"></use></svg>
		</a>

		<div class="ui-block-title">
			<h6 id="share-title" class="title"></h6>
		</div>

		<div class="ui-block-content">
			<form class="form-share-post">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<form class="form-share-post">
						<div class="form-group label-floating innerForm">
							<label class="control-label">Write a little description about the page</label>
							<textarea id="text-area" name="txtSharePost" class="form-control" placeholder=""></textarea>
						</div>

						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="ui-block">
								<article class="hentry blog-post">
									<div id="extra-content-post">
									</div>
									<div class="post-content">
											<p class="share-post-content"></p>

											<div class="post-additional-info inline-items">

												<ul class="friends-harmonic">
													<li>
														<a href="#">
															<img src="<?php echo base_url();?>app/img/icon-chat27.png" alt="icon">
														</a>
													</li>
													<li>
														<a href="#">
															<img src="<?php echo base_url();?>app/img/icon-chat2.png" alt="icon">
														</a>
													</li>
												</ul>
												<div class="names-people-likes">
													26
												</div>

												<div class="comments-shared">
													<a href="#" class="post-add-icon inline-items">
														<svg class="olymp-speech-balloon-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-speech-balloon-icon"></use></svg>
														<span>0</span>
													</a>
												</div>

											</div>
										</div>
								</article>
							</div>
						</div>
						<input id="idPost" type="hidden" name="idPost" value="">
						<input id="idUser" type="hidden" name="idUser" value="">
						<button name="btnSharePost" id="submitSharePost" class="btn btn-primary btn-lg full-width">Share Post</button>
						</form>
					</div>


				</div>

			</form>
		</div>

	</div>
</div>

<!-- ... end Window Popup Favourite Page -->
