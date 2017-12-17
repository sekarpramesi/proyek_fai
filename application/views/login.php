					<div class="tab-pane" id="profile" role="tabpanel" data-mh="log-tab">
						<div class="title h6">Login to your Account</div>
						<form class="content" id="login" action="<?php echo base_url();?>Home/login" method="POST">
							<div class="row">
								<div class="col-xl-12 col-lg-12 col-md-12">
									<div class="form-group label-floating is-empty">
										<label class="control-label">Your Email</label>
										<input class="form-control" name="txtEmail" placeholder="" type="email">
									</div>
									<div class="form-group label-floating is-empty">
										<label class="control-label">Your Password</label>
										<input class="form-control" name="txtPassword" placeholder="" type="password">
									</div>

									<div class="remember">

										<div class="checkbox">
											<label>
												<input name="optionsCheckboxes" type="checkbox">
												Remember Me
											</label>
										</div>
										<a href="<?php echo base_url();?>app/#" class="forgot">Forgot my Password</a>
									</div>

									<input type="submit" id="btnLogin" name="btnLogin" class="btn btn-lg btn-primary full-width" value="Login"/>
									<!--
									<div class="or"></div>

									<a href="<?php echo base_url();?>app/#" class="btn btn-lg bg-facebook full-width btn-icon-left"><i class="fa fa-facebook" aria-hidden="true"></i>Login with Facebook</a>

									<a href="<?php echo base_url();?>app/#" class="btn btn-lg bg-twitter full-width btn-icon-left"><i class="fa fa-twitter" aria-hidden="true"></i>Login with Twitter</a>-->


									<p>Don’t you have an account? <a href="<?php echo base_url();?>app/#">Register Now!</a> it’s really simple and you can start enjoying all the benefits!</p>
								</div>
							</div>
						</form>
					</div>