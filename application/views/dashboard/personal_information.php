		<div class="col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-xs-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Personal Information</h6>
				</div>
				<div class="ui-block-content">
					<form method="POST" action="<?php echo base_url();?>Dashboard/updateProfile">
						<div class="row">

							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="form-group label-floating">
									<label class="control-label">First Name</label>
									<input name="txtFirstName" class="form-control" placeholder="" type="text" value="<?php echo $passedData[1][0]["FIRST_NAME_USER"];?>">
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="form-group label-floating">
									<label class="control-label">Last Name</label>
									<input name="txtLastName" class="form-control" placeholder="" type="text" value="<?php echo $passedData[1][0]["LAST_NAME_USER"];?>">
								</div>
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="form-group label-floating">
									<label class="control-label">Address</label>
									<input name="txtAddress" class="form-control" placeholder="" type="text" value="<?php echo $passedData[1][0]["ADDRESS_USER"];?>">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="form-group label-floating">
									<label class="control-label">ZipCode</label>
									<input name="txtZipCode" class="form-control" placeholder="" type="text" value="<?php echo $passedData[1][0]["ZIPCODE_USER"];?>">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="form-group label-floating is-select">
									<label class="control-label">Country</label>
									<select class="selectpicker form-control">
										<option value="US">United States</option>
										<option value="AU">Australia</option>
									</select>
								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="form-group label-floating">
									<label class="control-label">Write a little description about you</label>
									<textarea name="txtBioUser" class="form-control" placeholder=""><?php echo $passedData[1][0]["BIO_USER"];?></textarea>
								</div>

							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<button name="btnSaveChanges" class="btn btn-primary btn-lg full-width">Save all Changes</button>
							</div>

						</div>
					</form>
				</div>
			</div>
		</div>