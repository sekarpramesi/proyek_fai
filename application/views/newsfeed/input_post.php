			<div class="ui-block">
				<div class="news-feed-form">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active inline-items" data-toggle="tab" href="<?php echo base_url();?>#" role="tab" aria-expanded="true">

								<svg class="olymp-status-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-status-icon"></use></svg>

								<span>Status</span>
							</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane active" id="home-1" role="tabpanel" aria-expanded="true">
								<?php echo form_open_multipart('Newsfeed/insertPost');?>
								<div class="author-thumb">
									<img style="width:36px;height:36px;" src="<?php echo base_url();?>uploads/user/<?php echo $passedData[2]["PHOTO_USER"];?>" alt="author">
								</div>
								<div class="form-group with-icon label-floating is-empty">
									<label class="control-label">Share what you are thinking here...</label>
									<textarea name="txtPost" class="form-control" placeholder=""></textarea>
								</div>
								<div class="add-options-message">
									<script>
										$(document).ready(function(){
											$("#upload_link").on('click', function(e){
												    e.preventDefault();
												    $("#upload:hidden").trigger('click');
											});
										});
									</script>
									<input name="filePost" id="upload" type="file" hidden="true"/>
									<a href="" id="upload_link" class="options-message" data-toggle="tooltip" data-placement="top" data-original-title="ADD PHOTOS/VIDEOS">
										<svg class="olymp-camera-icon" data-toggle="modal" data-target="#update-header-photo"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-camera-icon"></use></svg>
									</a>

									<button name="btnInsertPost" class="btn btn-primary btn-md-2">Post Status</button>
								</div>

							<?php echo form_close();?>
						</div>

					</div>
				</div>
			</div>