<!-- Window-popup Create Friends Group -->
<div class="modal fade" id="create-friend-group-1">
	<div class="modal-dialog ui-block window-popup create-friend-group create-friend-group-1">
		<a href="<?php echo base_url();?>app/#" class="close icon-close" data-dismiss="modal" aria-label="Close">
			<svg class="olymp-close-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-close-icon"></use></svg>
		</a>

	<div class="ui-block-title">
		<h6 class="title">Create Friend Group</h6>
	</div>

	<div class="ui-block-content">
		<form class="form-group label-floating">
			<label class="control-label">Group Name</label>
			<input class="form-control" placeholder="" value="Highschool Friends" type="text">
		</form>

		<form class="form-group with-button">
			<input class="form-control" placeholder="" value="Group Avatar (120x120px min)" type="text">

			<button class="bg-grey">
				<svg class="olymp-computer-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-computer-icon"></use></svg>
			</button>

		</form>

		<form class="form-group label-floating is-select">
			<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-happy-face-icon"></use></svg>

			<select class="selectpicker form-control style-2 show-tick" multiple data-max-options="2" data-live-search="true">
				<option title="Green Goo Rock" data-content='<div class="inline-items">
										<div class="author-thumb">
											<img src="<?php echo base_url();?>app/img/avatar52-sm.jpg" alt="author">
										</div>
											<div class="h6 author-title">Green Goo Rock</div>

										</div>'>Green Goo Rock
				</option>

				<option title="Mathilda Brinker" data-content='<div class="inline-items">
											<div class="author-thumb">
												<img src="<?php echo base_url();?>app/img/avatar74-sm.jpg" alt="author">
											</div>
											<div class="h6 author-title">Mathilda Brinker</div>
										</div>'>Mathilda Brinker
				</option>

				<option title="Marina Valentine" data-content='<div class="inline-items">
											<div class="author-thumb">
												<img src="<?php echo base_url();?>app/img/avatar48-sm.jpg" alt="author">
											</div>
											<div class="h6 author-title">Marina Valentine</div>
										</div>'>Marina Valentine
				</option>

				<option title="Dave Marinara" data-content='<div class="inline-items">
											<div class="author-thumb">
												<img src="<?php echo base_url();?>app/img/avatar75-sm.jpg" alt="author">
											</div>
											<div class="h6 author-title">Dave Marinara</div>
										</div>'>Dave Marinara
				</option>

				<option title="Rachel Howlett" data-content='<div class="inline-items">
											<div class="author-thumb">
												<img src="<?php echo base_url();?>app/img/avatar76-sm.jpg" alt="author">
											</div>
											<div class="h6 author-title">Rachel Howlett</div>
										</div>'>Rachel Howlett
				</option>

			</select>
		</form>

		<a href="<?php echo base_url();?>app/#" class="btn btn-blue btn-lg full-width">Create Group</a>
	</div>


</div>
</div>
<!-- ... end Window-popup Create Friends Group -->