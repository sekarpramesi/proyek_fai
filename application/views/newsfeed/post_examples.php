
<div id="newsfeed-items-grid">
	<?php
		for($i=0;$i<count($passedData[0]);$i++){
			echo '<div class="ui-block">';
					if($passedData[0][$i]["TYPE_POST"]==1){
						echo '<article class="hentry post has-post-thumbnail">';
					}else if($passedData[0][$i]["TYPE_POST"]==2){
						echo '<article class="hentry post video">';
						
					}else{
						echo '<article class="hentry post">';
					}

				echo '<div class="post__author author vcard inline-items">
						<img src="'.base_url().'uploads/user/'.$passedData[0][$i]["PHOTO_USER"].'" alt="a">

						<div class="author-date">
							<a class="h6 post__author-name fn" href='.base_url().'app/">'.$passedData[0][$i]['FIRST_NAME_USER'].'</a>
							<div class="post__date">
								<time class="published" datetime="2004-07-24T18:18">
									'.$passedData[0][$i]["TIMESTAMP_POST"].'
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

					<p>'.$passedData[0][$i]["CONTENT_POST"].'
					</p>';
					if($passedData[0][$i]["TYPE_POST"]==1){
						echo '<div class="post-thumb">
						<img class="gif-play-image" src="'.base_url().'uploads/post/photo/'.$passedData[0][$i]['EXTRA_CONTENT_POST'].'" alt="gif">
						</div>';
					}else if($passedData[0][$i]["TYPE_POST"]==2){
						echo'
						<div class="post-video">
							<div class="video-thumb f-none">
								<img src="'.base_url().'uploads/post/video/'.$passedData[0]['EXTRA_CONTENT_POST'].'" alt="photo">
								<a href="'.base_url().'uploads/post/video/'.$passedData[0]['EXTRA_CONTENT_POST'].'" class="play-video">
									<svg class="olymp-play-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="'.base_url().'app/icons/icons.svg#olymp-play-icon"></use></svg>
								</a>
							</div>
						</div>';
					}
					echo '<div class="post-additional-info inline-items">


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
								<span></span>
							</a>

							<a href='.base_url().'app/#" class="post-add-icon inline-items">
								<svg class="olymp-share-icon"><use xlink:href="'.base_url().'app/icons/icons.svg#olymp-share-icon"></use></svg>
								<span>24</span>
							</a>
						</div>

					</div>
					';
					$content="";
					if($passedData[0][$i]["EXTRA_CONTENT_POST"]==""){
						$content="blank";
					}else{
						$content=$passedData[0][$i]["EXTRA_CONTENT_POST"];
					}
					echo '
					<div class="control-block-button post-control-button">
						<div class="group-share-modal">
						<a href="#" data-toggle="modal" data-userIdShare="'.$passedData[2]["ID_USER"].'" 
							data-typePost="'.$passedData[0][$i]["TYPE_POST"].'" data-id="'.$passedData[0][$i]["ID_POST"].'" data-content="'.$passedData[0][$i]["CONTENT_POST"].'" data-extraContent="'.$content.'" data-user="'.$passedData[0][$i]["FIRST_NAME_USER"].'" "data-target="#share-post" class="btn btn-control share-modal">
							<svg class="olymp-share-icon"><use xlink:href="'.base_url().'app/icons/icons.svg#olymp-share-icon"></use></svg>
						</a>
						</div>
					</div>';

				echo '</article>

				<ul class="comments-list">';
					for($j=0;$j<count($passedData[1]);$j++){
					
					if($passedData[0][$i]["ID_POST"]==$passedData[1][$j]["ID_POST"]){
						echo '<li>
							<div class="post__author author vcard inline-items">
								<img src="'.base_url().'uploads/user/'.$passedData[1][$j]["PHOTO_USER"].'" alt="author">

								<div class="author-date">
									<a class="h6 post__author-name fn" href='.base_url().'app/02-ProfilePage.html">'.$passedData[1][$j]["FIRST_NAME_USER"].'</a>
									<div class="post__date">
										<time class="published" datetime="2004-07-24T18:18">
											'.$passedData[1][$j]["TIMESTAMP_COMMENT_POST"].'
										</time>
									</div>
								</div>

								<a href='.base_url().'app/#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href='.base_url().'app/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>

							</div>

							<p>'.$passedData[1][$j]["CONTENT_COMMENT"].'</p>
						</li>';
					}
				}
				echo '</ul>

				<!--<a href='.base_url().'app/#" class="more-comments">View more comments <span>+</span></a>-->

				<form class="comment-form inline-items" method="POST" 
				action="'.base_url().'Newsfeed/insertComment/'.$passedData[0][$i]["ID_POST"].'">

					<div class="post__author author vcard inline-items">
						<img src="'.base_url().'uploads/user/'.$passedData[2]["PHOTO_USER"].'" alt="author">

						<div class="form-group with-icon-right ">
							<textarea name="txtComment" class="form-control" placeholder=""></textarea>
							<div class="add-options-message">
								<a href="'.base_url().'app/#" class="options-message" data-toggle="modal" data-target="#update-header-photo">
									<svg class="olymp-camera-icon"><use xlink:href="'.base_url().'app/icons/icons.svg#olymp-camera-icon"></use></svg>
								</a>
							</div>
						</div>
					</div>
						<button name="btnComment"class="btn btn-md-2 btn-primary">Post Comment</button>
				</form>

			</div>';
		}
	?>	
</div>

<!-- Window Popup Favourite Page -->

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





