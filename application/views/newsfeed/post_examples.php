
				<div id="newsfeed-items-grid">
				<?php
				for($i=0;$i<count($passedData[0]);$i++){
					echo '<div class="ui-block">
						<article class="hentry post">

							<div class="post__author author vcard inline-items">
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
										<span>'.count($passedData[1][$i]).'</span>
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

									<p>'.$passedData[1][$j]["CONTENT_COMMENT_POST"].'</p>
								</li>';
							}
						}
						echo '</ul>

						<!--<a href='.base_url().'app/#" class="more-comments">View more comments <span>+</span></a>-->

						<form class="comment-form inline-items" method="POST" 
						action="'.base_url().'Post/insertComment/'.$passedData[0][$i]["ID_POST"].'">

							<div class="post__author author vcard inline-items">
								<img src="'.base_url().'uploads/user/'.$passedData[2]["PHOTO_USER"].'" alt="author">

								<div class="form-group with-icon-right ">
									<textarea name="txtComment" class="form-control" placeholder=""  ></textarea>
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
				}?>	
			</div>
			