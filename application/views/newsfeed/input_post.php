			<div class="ui-block">
				<div class="news-feed-form">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active inline-items" data-toggle="tab" href="<?php echo base_url();?>app/#home-1" role="tab" aria-expanded="true">

								<svg class="olymp-status-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-status-icon"></use></svg>

								<span>Status</span>
							</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane active" id="home-1" role="tabpanel" aria-expanded="true">
							<form>
								<div class="author-thumb">
									<img src="<?php echo base_url();?>app/img/author-page.jpg" alt="author">
								</div>
								<div class="form-group with-icon label-floating is-empty">
									<label class="control-label">Share what you are thinking here...</label>
									<textarea class="form-control" placeholder=""></textarea>
								</div>
								<div class="add-options-message">
									<a href="#" class="options-message" data-toggle="tooltip" data-placement="top" data-original-title="ADD PHOTOS">
										<svg class="olymp-camera-icon" data-toggle="modal" data-target="#update-header-photo"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="icons/icons.svg#olymp-camera-icon"></use></svg>
									</a>

									<button class="btn btn-primary btn-md-2">Post Status</button>
								</div>

							</form>
						</div>

					</div>
				</div>
			</div>