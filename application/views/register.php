					<div class="tab-pane active" id="home" role="tabpanel" data-mh="log-tab">
						<div class="title h6">Register to Olympus</div>
						<form class="content" id="register" method="post" action ="<?php echo base_url();?>Home/register">
							<div class="row">
								<div class="col-lg-6 col-md-6">
									<div class="form-group label-floating is-empty">
										<label class="control-label">First Name</label>
										<input class="form-control" name="txtFirstName" placeholder="" type="text">
									</div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="form-group label-floating is-empty">
										<label class="control-label">Last Name</label>
										<input class="form-control" name="txtLastName" placeholder="" type="text">
									</div>
								</div>
								<div class="col-xl-12 col-lg-12 col-md-12">
									<div class="form-group label-floating is-empty">
										<label class="control-label">Your Email</label>
										<input class="form-control" name="txtEmail" placeholder="" type="email">
									</div>
									<div class="form-group label-floating is-empty">
										<label class="control-label">Your Password</label>
										<input class="form-control" name="txtPassword" placeholder="" type="password">
									</div>

									<div class="form-group label-floating is-empty">
										<label class="control-label">Confirm Password</label>
										<input class="form-control" name="txtConfPassword" placeholder="" type="password">
									</div>

									<!--<div class="remember">
										<div class="checkbox">
											<label>
												<input name="optionsCheckboxes" type="checkbox">
												I accept the <a href="<?php echo base_url();?>app/#">Terms and Conditions</a> of the website
											</label>
										</div>
									</div>-->

									<input type="submit" value="Complete Registration!" id="btnRegister" name="btnRegister" class="btn btn-purple btn-lg full-width"/>
								</div>
							</div>
						</form>
					</div>

					<!--onclick="document.forms['register'].submit();"-->