<div class="main-header">
	<div class="content-bg-wrap">
		<div class="content-bg bg-events"></div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 m-auto col-md-8 col-sm-12 col-xs-12">
				<div class="main-header-content">
					<h1>Create and Manage Events</h1>
					<p>Welcome to your personal planner assistant. Here you’ll see all your next events and invites that
						your friends sent you. You can create 3 different types of events: Personal
						(for your daily errands), Private (for you and friends only) and Public (open to everyone).
						Create your events, invite friends and have fun!
					</p>
				</div>
			</div>
		</div>
	</div>

	<img class="img-bottom" src="<?php echo base_url();?>app/img/event-bottom.png" alt="friends">
</div>

<div class="container">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="ui-block responsive-flex">
				<div class="ui-block-title">
					<ul class="nav nav-tabs calendar-events-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="<?php echo base_url();?>app/#events" role="tab">
								Calendar and Events
							</a>
						</li>

						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="<?php echo base_url();?>app/#notifications" role="tab">
								Event Invites <span class="items-round-little bg-breez">2</span>
							</a>
						</li>

					</ul>
					<a href="<?php echo base_url();?>app/#" class="more"><svg class="olymp-three-dots-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="tab-content">
	<div class="tab-pane active" id="events" role="tabpanel">

		<div class="container">
			<div class="row">
				<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">
					<div class="ui-block">
						<div class="today-events calendar">
							<div class="today-events-thumb">
								<div class="date">
									<div class="day-number">26</div>
									<div class="day-week">Saturday</div>
									<div class="month-year">March, 2016</div>
								</div>
							</div>

							<div class="list">
								<div class="control-block-button">
									<a href="<?php echo base_url();?>app/#" class="btn btn-control bg-breez" data-toggle="modal" data-target="#create-event">
										<svg class="olymp-plus-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-plus-icon"></use></svg>
									</a>
								</div>

								<div id="accordion-1" role="tablist" aria-multiselectable="true" class="day-event" date-month="12" date-day="2">
									<div class="card">
										<div class="card-header" role="tab" id="headingOne-1">
											<div class="event-time">
												<time datetime="2004-07-24T18:18">9:00am</time>
										<div class="more"><svg class="olymp-three-dots-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg>
											<ul class="more-dropdown">
												<li>
													<a href="<?php echo base_url();?>app/#">Mark as Completed</a>
												</li>
												<li>
													<a href="<?php echo base_url();?>app/#">Delete Event</a>
												</li>
											</ul>
										</div>
											</div>
											<h5 class="mb-0 title">
												<a data-toggle="collapse" data-parent="#accordion" href="<?php echo base_url();?>app/#collapseOne-1" aria-expanded="true" aria-controls="collapseOne">
													Breakfast at the Agency<i class="fa fa-angle-down" aria-hidden="true"></i>
													<span class="event-status-icon" data-toggle="modal" data-target="#public-event">
														<svg class="olymp-calendar-icon" data-toggle="tooltip" data-placement="top" data-original-title="UNCOMPLETED"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-calendar-icon"></use></svg>
													</span>
												</a>
											</h5>
										</div>

										<div id="collapseOne-1" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
											<div class="card-body">
												Hi Guys! I propose to go a litle earlier at the agency to have breakfast and talk a little more about the new design project we have been working on. Cheers!
											</div>
											<div class="place inline-items">
												<svg class="olymp-add-a-place-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-add-a-place-icon"></use></svg>
												<span>Daydreamz Agency</span>
											</div>

											<ul class="friends-harmonic inline-items">
												<li>
													<a href="<?php echo base_url();?>app/#">
														<img src="<?php echo base_url();?>app/img/friend-harmonic5.jpg" alt="friend">
													</a>
												</li>
												<li>
													<a href="<?php echo base_url();?>app/#">
														<img src="<?php echo base_url();?>app/img/friend-harmonic10.jpg" alt="friend">
													</a>
												</li>
												<li>
													<a href="<?php echo base_url();?>app/#">
														<img src="<?php echo base_url();?>app/img/friend-harmonic7.jpg" alt="friend">
													</a>
												</li>
												<li>
													<a href="<?php echo base_url();?>app/#">
														<img src="<?php echo base_url();?>app/img/friend-harmonic8.jpg" alt="friend">
													</a>
												</li>
												<li>
													<a href="<?php echo base_url();?>app/#">
														<img src="<?php echo base_url();?>app/img/friend-harmonic2.jpg" alt="friend">
													</a>
												</li>
												<li class="with-text">
													Will Assist
												</li>
											</ul>
										</div>


									</div>

									<div class="card">
										<div class="card-header" role="tab" id="headingTwo-1">
											<div class="event-time">
												<time datetime="2004-07-24T18:18">12:00pm</time>
										<div class="more"><svg class="olymp-three-dots-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg>
											<ul class="more-dropdown">
												<li>
													<a href="<?php echo base_url();?>app/#">Mark as Completed</a>
												</li>
												<li>
													<a href="<?php echo base_url();?>app/#">Delete Event</a>
												</li>
											</ul>
										</div>
											</div>
											<h5 class="mb-0 title">
												<a data-toggle="collapse" data-parent="#accordion" href="<?php echo base_url();?>app/#collapseTwo-1" aria-expanded="true" aria-controls="collapseTwo-1">
													Send the new “Olympus” project files to the Agency<i class="fa fa-angle-down" aria-hidden="true"></i>
													<span class="event-status-icon completed" data-toggle="tooltip" data-placement="top" data-original-title="COMPLETED">
														<svg class="olymp-checked-calendar-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-checked-calendar-icon"></use></svg>
													</span>
												</a>
											</h5>
										</div>

										<div id="collapseTwo-1" class="collapse" role="tabpanel" aria-labelledby="headingTwo-1">
											<div class="card-body">
												Hi Guys! I propose to go a litle earlier at the agency to have breakfast and talk a little more about the new design project we have been working on. Cheers!
											</div>
										</div>

									</div>

									<div class="card">
										<div class="card-header" role="tab" id="headingThree-1">
											<div class="event-time">
												<time datetime="2004-07-24T18:18">6:30pm</time>
										<div class="more"><svg class="olymp-three-dots-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg>
											<ul class="more-dropdown">
												<li>
													<a href="<?php echo base_url();?>app/#">Mark as Completed</a>
												</li>
												<li>
													<a href="<?php echo base_url();?>app/#">Delete Event</a>
												</li>
											</ul>
										</div>
											</div>
											<h5 class="mb-0 title">
												<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="<?php echo base_url();?>app/#collapseThree-1" aria-expanded="false" aria-controls="collapseThree">
													Take Querty to the Veterinarian
													<span class="event-status-icon" data-toggle="modal" data-target="#private-event">
														<svg class="olymp-calendar-icon" data-toggle="tooltip" data-placement="top" data-original-title="UNCOMPLETED"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-calendar-icon"></use></svg>
													</span>
												</a>
											</h5>
										</div>
										<div class="place inline-items">
											<svg class="olymp-add-a-place-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-add-a-place-icon"></use></svg>
											<span>Daydreamz Agency</span>
										</div>
									</div>

								</div>

							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
					<div class="ui-block">
						<div id="calendar-full-1" class="fc fc-ltr fc-unthemed">
							<div class="fc-toolbar">
								<div class="fc-left">
									<div class="fc-button-group">
										<button type="button" class="fc-prev-button fc-button fc-state-default fc-corner-left">
											<span class="fc-icon fc-icon-left-single-arrow"></span>
										</button>
									</div>
								</div>
								<div class="fc-center">
									<h6 class="date">April 14, <span>2017</span></h6>
								</div>

								<ul class="nav nav-tabs fc-right" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="<?php echo base_url();?>app/#month" role="tab">
											<svg class="olymp-month-calendar-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-month-calendar-icon"></use></svg>
										</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="<?php echo base_url();?>app/#week" role="tab">
											<svg class="olymp-week-calendar-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-week-calendar-icon"></use></svg>
										</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="<?php echo base_url();?>app/#day" role="tab">
											<svg class="olymp-day-calendar-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-day-calendar-icon"></use></svg>
										</a>
									</li>
								</ul>

								<div class="fc-right">
									<div class="fc-button-group">
										<button type="button" class="fc-next-button fc-button fc-state-default fc-corner-right">
											<span class="fc-icon fc-icon-right-single-arrow"></span>
										</button>
									</div>
								</div>

								<div class="fc-clear"></div>
							</div>
							<div class="fc-view-container" style="">

								<div class="tab-content">
									<div class="tab-pane active" id="month" role="tabpanel">
										<div class="fc-view fc-month-view fc-basic-view" style="">
											<table>
												<thead class="fc-head">
												<tr>
													<td class="fc-head-container fc-widget-header">
														<div class="fc-row fc-widget-header">
															<table>
																<thead>
																<tr>
																	<th class="fc-day-header fc-widget-header fc-mon">Mon</th>
																	<th class="fc-day-header fc-widget-header fc-tue">Tue</th>
																	<th class="fc-day-header fc-widget-header fc-wed">Wed</th>
																	<th class="fc-day-header fc-widget-header fc-thu">Thu</th>
																	<th class="fc-day-header fc-widget-header fc-fri">Fri</th>
																	<th class="fc-day-header fc-widget-header fc-sat">Sat</th>
																	<th class="fc-day-header fc-widget-header fc-sun">Sun</th>
																</tr>
																</thead>
															</table>
														</div>
													</td>
												</tr>
												</thead>
												<tbody class="fc-body">
												<tr>
													<td class="fc-widget-content">
														<div class="fc-day-grid-container" style="">
															<div class="fc-day-grid">
																<div class="fc-row fc-week fc-widget-content" style="height: 103px;">
																	<div class="fc-bg">
																		<table>
																			<tbody>
																			<tr>
																				<td class="fc-day fc-widget-content fc-mon fc-other-month fc-past" data-date="2017-03-27"></td>
																				<td class="fc-day fc-widget-content fc-tue fc-other-month fc-past" data-date="2017-03-28"></td>
																				<td class="fc-day fc-widget-content fc-wed fc-other-month fc-past" data-date="2017-03-29"></td>
																				<td class="fc-day fc-widget-content fc-thu fc-other-month fc-past" data-date="2017-03-30"></td>
																				<td class="fc-day fc-widget-content fc-fri fc-other-month fc-past" data-date="2017-03-31"></td>
																				<td class="fc-day fc-widget-content fc-sat fc-past" data-date="2017-04-01"></td>
																				<td class="fc-day fc-widget-content fc-sun fc-past" data-date="2017-04-02"></td>
																			</tr>
																			</tbody>
																		</table>
																	</div>
																	<div class="fc-content-skeleton">
																		<table>
																			<thead>
																			<tr>
																				<td class="fc-day-number fc-mon fc-other-month fc-past" data-date="2017-03-27">27</td>
																				<td class="fc-day-number fc-tue fc-other-month fc-past" data-date="2017-03-28">28</td>
																				<td class="fc-day-number fc-wed fc-other-month fc-past" data-date="2017-03-29">29</td>
																				<td class="fc-day-number fc-thu fc-other-month fc-past" data-date="2017-03-30">30</td>
																				<td class="fc-day-number fc-fri fc-other-month fc-past" data-date="2017-03-31">31</td>
																				<td class="fc-day-number fc-sat fc-past" data-date="2017-04-01">1</td>
																				<td class="fc-day-number fc-sun fc-past" data-date="2017-04-02">2</td>
																			</tr>
																			</thead>
																		</table>
																	</div>
																</div>
																<div class="fc-row fc-week fc-widget-content" style="height: 103px;">
																	<div class="fc-bg">
																		<table>
																			<tbody>
																			<tr>
																				<td class="fc-day fc-widget-content fc-mon fc-past" data-date="2017-04-03"></td>
																				<td class="fc-day fc-widget-content fc-tue fc-past" data-date="2017-04-04"></td>
																				<td class="fc-day fc-widget-content fc-wed fc-past" data-date="2017-04-05"></td>
																				<td class="fc-day fc-widget-content fc-thu fc-past" data-date="2017-04-06"></td>
																				<td class="fc-day fc-widget-content fc-fri fc-today fc-state-highlight" data-date="2017-04-07"></td>
																				<td class="fc-day fc-widget-content fc-sat fc-future" data-date="2017-04-08"></td>
																				<td class="fc-day fc-widget-content fc-sun fc-future" data-date="2017-04-09"></td>
																			</tr>
																			</tbody>
																		</table>
																	</div>
																	<div class="fc-content-skeleton">
																		<table>
																			<thead>
																			<tr>
																				<td class="fc-day-number fc-mon fc-past" data-date="2017-04-03">3</td>
																				<td class="fc-day-number fc-tue fc-past" data-date="2017-04-04">4</td>
																				<td class="fc-day-number fc-wed fc-past" data-date="2017-04-05">5</td>
																				<td class="fc-day-number fc-thu fc-past" data-date="2017-04-06">6</td>
																				<td class="fc-day-number fc-fri fc-today fc-state-highlight" data-date="2017-04-07">7</td>
																				<td class="fc-day-number fc-sat fc-future" data-date="2017-04-08">8
																					<ul class="calendar-block-events">
																						<li data-toggle="modal" data-target="#public-event">
																							<span class="event-status b-day"></span>
																							Chris Greyson’s Bday
																						</li>

																						<li data-toggle="modal" data-target="#private-event">
																							<span class="event-status completed"></span>
																							Make Dinner Plans...
																						</li>
																					</ul>

																				</td>
																				<td class="fc-day-number fc-sun fc-future" data-date="2017-04-09">9</td>
																			</tr>
																			</thead>
																		</table>
																	</div>
																</div>
																<div class="fc-row fc-week fc-widget-content" style="height: 103px;">
																	<div class="fc-bg">
																		<table>
																			<tbody>
																			<tr>
																				<td class="fc-day fc-widget-content fc-mon fc-future" data-date="2017-04-10"></td>
																				<td class="fc-day fc-widget-content fc-tue fc-future" data-date="2017-04-11"></td>
																				<td class="fc-day fc-widget-content fc-wed fc-future" data-date="2017-04-12"></td>
																				<td class="fc-day fc-widget-content fc-thu fc-future" data-date="2017-04-13"></td>
																				<td class="fc-day fc-widget-content fc-fri fc-future" data-date="2017-04-14"></td>
																				<td class="fc-day fc-widget-content fc-sat fc-future" data-date="2017-04-15"></td>
																				<td class="fc-day fc-widget-content fc-sun fc-future" data-date="2017-04-16"></td>
																			</tr>
																			</tbody>
																		</table>
																	</div>
																	<div class="fc-content-skeleton">
																		<table>
																			<thead>
																			<tr>
																				<td class="fc-day-number fc-mon fc-future" data-date="2017-04-10">10</td>
																				<td class="fc-day-number fc-tue fc-future" data-date="2017-04-11">11</td>
																				<td class="fc-day-number fc-wed fc-future" data-date="2017-04-12">12</td>
																				<td class="fc-day-number fc-thu fc-future" data-date="2017-04-13">13</td>
																				<td class="fc-day-number fc-fri fc-future" data-date="2017-04-14">14</td>
																				<td class="fc-day-number fc-sat fc-future" data-date="2017-04-15">15</td>
																				<td class="fc-day-number fc-sun fc-future" data-date="2017-04-16">16</td>
																			</tr>
																			</thead>
																		</table>
																	</div>
																</div>
																<div class="fc-row fc-week fc-widget-content" style="height: 103px;">
																	<div class="fc-bg">
																		<table>
																			<tbody>
																			<tr>
																				<td class="fc-day fc-widget-content fc-mon fc-future" data-date="2017-04-17"></td>
																				<td class="fc-day fc-widget-content fc-tue fc-future" data-date="2017-04-18"></td>
																				<td class="fc-day fc-widget-content fc-wed fc-future" data-date="2017-04-19"></td>
																				<td class="fc-day fc-widget-content fc-thu fc-future" data-date="2017-04-20"></td>
																				<td class="fc-day fc-widget-content fc-fri fc-future" data-date="2017-04-21"></td>
																				<td class="fc-day fc-widget-content fc-sat fc-future" data-date="2017-04-22"></td>
																				<td class="fc-day fc-widget-content fc-sun fc-future" data-date="2017-04-23"></td>
																			</tr>
																			</tbody>
																		</table>
																	</div>
																	<div class="fc-content-skeleton">
																		<table>
																			<thead>
																			<tr>
																				<td class="fc-day-number fc-mon fc-future" data-date="2017-04-17">17</td>
																				<td class="fc-day-number fc-tue fc-future" data-date="2017-04-18">18</td>
																				<td class="fc-day-number fc-wed fc-future" data-date="2017-04-19">19</td>
																				<td class="fc-day-number fc-thu fc-future" data-date="2017-04-20">20</td>
																				<td class="fc-day-number fc-fri fc-future" data-date="2017-04-21">21</td>
																				<td class="fc-day-number fc-sat fc-future" data-date="2017-04-22">22</td>
																				<td class="fc-day-number fc-sun fc-future" data-date="2017-04-23">23</td>
																			</tr>
																			</thead>
																		</table>
																	</div>
																</div>
																<div class="fc-row fc-week fc-widget-content" style="height: 103px;">
																	<div class="fc-bg">
																		<table>
																			<tbody>
																			<tr>
																				<td class="fc-day fc-widget-content fc-mon fc-future" data-date="2017-04-24"></td>
																				<td class="fc-day fc-widget-content fc-tue fc-future" data-date="2017-04-25"></td>
																				<td class="fc-day fc-widget-content fc-wed fc-future" data-date="2017-04-26"></td>
																				<td class="fc-day fc-widget-content fc-thu fc-future" data-date="2017-04-27"></td>
																				<td class="fc-day fc-widget-content fc-fri fc-future" data-date="2017-04-28"></td>
																				<td class="fc-day fc-widget-content fc-sat fc-future" data-date="2017-04-29"></td>
																				<td class="fc-day fc-widget-content fc-sun fc-future" data-date="2017-04-30"></td>
																			</tr>
																			</tbody>
																		</table>
																	</div>
																	<div class="fc-content-skeleton">
																		<table>
																			<thead>
																			<tr>
																				<td class="fc-day-number fc-mon fc-future" data-date="2017-04-24">24</td>
																				<td class="fc-day-number fc-tue fc-future" data-date="2017-04-25">25</td>
																				<td class="fc-day-number fc-wed fc-future" data-date="2017-04-26">26
																					<ul class="calendar-block-events">
																						<li data-toggle="modal" data-target="#public-event">
																							<span class="event-status uncompleted"></span>
																							Breakfast at the...
																						</li>

																						<li data-toggle="modal" data-target="#private-event">
																							<span class="event-status completed"></span>
																							Send the new...
																						</li>

																						<li data-toggle="modal" data-target="#public-event">
																							<span class="event-status uncompleted"></span>
																							Take Querty to the...
																						</li>
																					</ul>
																				</td>
																				<td class="fc-day-number fc-thu fc-future" data-date="2017-04-27">27</td>
																				<td class="fc-day-number fc-fri fc-future" data-date="2017-04-28">28</td>
																				<td class="fc-day-number fc-sat fc-future" data-date="2017-04-29">29</td>
																				<td class="fc-day-number fc-sun fc-future" data-date="2017-04-30">30
																					<ul class="calendar-block-events">
																						<li data-toggle="modal" data-target="#public-event">
																							<span class="event-status uncompleted"></span>
																							Videocall to talk...
																						</li>

																						<li data-toggle="modal" data-target="#private-event">
																							<span class="event-status uncompleted"></span>
																							Jenny’s Birthday...
																						</li>
																					</ul>
																				</td>
																			</tr>
																			</thead>
																		</table>
																	</div>
																</div>
																<div class="fc-row fc-week fc-widget-content" style="height: 108px;">
																	<div class="fc-bg">
																		<table>
																			<tbody>
																			<tr>
																				<td class="fc-day fc-widget-content fc-mon fc-other-month fc-future" data-date="2017-05-01"></td>
																				<td class="fc-day fc-widget-content fc-tue fc-other-month fc-future" data-date="2017-05-02"></td>
																				<td class="fc-day fc-widget-content fc-wed fc-other-month fc-future" data-date="2017-05-03"></td>
																				<td class="fc-day fc-widget-content fc-thu fc-other-month fc-future" data-date="2017-05-04"></td>
																				<td class="fc-day fc-widget-content fc-fri fc-other-month fc-future" data-date="2017-05-05"></td>
																				<td class="fc-day fc-widget-content fc-sat fc-other-month fc-future" data-date="2017-05-06"></td>
																				<td class="fc-day fc-widget-content fc-sun fc-other-month fc-future" data-date="2017-05-07"></td>
																			</tr>
																			</tbody>
																		</table>
																	</div>
																	<div class="fc-content-skeleton">
																		<table>
																			<thead>
																			<tr>
																				<td class="fc-day-number fc-mon fc-other-month fc-future" data-date="2017-05-01">1</td>
																				<td class="fc-day-number fc-tue fc-other-month fc-future" data-date="2017-05-02">2</td>
																				<td class="fc-day-number fc-wed fc-other-month fc-future" data-date="2017-05-03">3</td>
																				<td class="fc-day-number fc-thu fc-other-month fc-future" data-date="2017-05-04">4</td>
																				<td class="fc-day-number fc-fri fc-other-month fc-future" data-date="2017-05-05">5</td>
																				<td class="fc-day-number fc-sat fc-other-month fc-future" data-date="2017-05-06">6</td>
																				<td class="fc-day-number fc-sun fc-other-month fc-future" data-date="2017-05-07">7</td>
																			</tr>
																			</thead>
																		</table>
																	</div>
																</div>
															</div>
														</div>
													</td>
												</tr>
												</tbody>
											</table>
										</div>

										<div class="ui-block-title ui-block-title-small">
											<h6 class="title">WEDNESDAY, MARCH 30</h6>
										</div>

										<div class="today-events calendar">
											<div class="list">

												<div class="control-block-button">

													<a href="<?php echo base_url();?>app/#" class="btn btn-control bg-breez" data-toggle="modal" data-target="#create-event">
														<svg class="olymp-plus-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-plus-icon"></use></svg>
													</a>

												</div>

												<div id="accordion-3" role="tablist" aria-multiselectable="true" class="day-event">

													<div class="card">
														<div class="card-header" role="tab" id="headingOne-3">
															<div class="event-time">
																<time class="published" datetime="2017-03-24T18:18">10:50am</time>
																<div class="more"><svg class="olymp-three-dots-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg>
																	<ul class="more-dropdown">
																		<li>
																			<a href="<?php echo base_url();?>app/#">Mark as Completed</a>
																		</li>
																		<li>
																			<a href="<?php echo base_url();?>app/#">Delete Event</a>
																		</li>
																	</ul>
																</div>
															</div>
															<h5 class="mb-0 title">
																<a data-toggle="collapse" data-parent="#accordion" href="<?php echo base_url();?>app/#collapseOne" aria-expanded="true" aria-controls="collapseOne">
																	Videocall to talk with the agency’s new client<i class="fa fa-angle-down" aria-hidden="true"></i>
																	<span class="event-status-icon" data-toggle="modal" data-target="#public-event">
																		<svg class="olymp-calendar-icon" data-toggle="tooltip" data-placement="top" data-original-title="UNCOMPLETED"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-calendar-icon"></use></svg>
																	</span>
																</a>
															</h5>
														</div>

														<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
															<div class="card-body">
																I have to remeber to be a little earlier at the agency to discuss with the guys all the questions we have for our new client and to show them the new logo.
															</div>
															<div class="place inline-items">
																<svg class="olymp-add-a-place-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-add-a-place-icon"></use></svg>
																<span>Daydreamz Agency</span>
															</div>

														</div>


													</div>

													<div class="card">
														<div class="card-header" role="tab" id="headingThree-3">
															<div class="event-time">
																<time class="published" datetime="2017-03-24T18:18">10:50am</time>
																<div class="more"><svg class="olymp-three-dots-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg>
																	<ul class="more-dropdown">
																		<li>
																			<a href="<?php echo base_url();?>app/#">Mark as Completed</a>
																		</li>
																		<li>
																			<a href="<?php echo base_url();?>app/#">Delete Event</a>
																		</li>
																	</ul>
																</div>
															</div>
															<h5 class="mb-0 title">
																<a class="collapsed" data-toggle="collapse" data-parent="#accordion-3" href="<?php echo base_url();?>app/#collapseThree-3" aria-expanded="false" aria-controls="collapseThree-3">
																	Jenny’s Birthday Party<i class="fa fa-angle-down" aria-hidden="true"></i>
																	<span class="event-status-icon" data-toggle="modal" data-target="#private-event">
																		<svg class="olymp-calendar-icon" data-toggle="tooltip" data-placement="top" data-original-title="UNCOMPLETED"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-calendar-icon"></use></svg>
																	</span>
																</a>
															</h5>
														</div>
														<div id="collapseThree-3" class="collapse" role="tabpanel" aria-labelledby="headingThree">
															<div class="card-body">
																Hi Guys! I propose to go a litle earlier at the agency to have breakfast and talk a little more about the new design project we have been working on. Cheers!
															</div>
															<div class="place inline-items">
																<svg class="olymp-add-a-place-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-add-a-place-icon"></use></svg>
																<span>Daydreamz Agency</span>
															</div>

															<ul class="friends-harmonic inline-items">
																<li>
																	<a href="<?php echo base_url();?>app/#">
																		<img src="<?php echo base_url();?>app/img/friend-harmonic5.jpg" alt="friend">
																	</a>
																</li>
																<li>
																	<a href="<?php echo base_url();?>app/#">
																		<img src="<?php echo base_url();?>app/img/friend-harmonic10.jpg" alt="friend">
																	</a>
																</li>
																<li>
																	<a href="<?php echo base_url();?>app/#">
																		<img src="<?php echo base_url();?>app/img/friend-harmonic7.jpg" alt="friend">
																	</a>
																</li>
																<li>
																	<a href="<?php echo base_url();?>app/#">
																		<img src="<?php echo base_url();?>app/img/friend-harmonic8.jpg" alt="friend">
																	</a>
																</li>
																<li>
																	<a href="<?php echo base_url();?>app/#">
																		<img src="<?php echo base_url();?>app/img/friend-harmonic2.jpg" alt="friend">
																	</a>
																</li>
																<li class="with-text">
																	Will Assist
																</li>
															</ul>
														</div>
													</div>

												</div>

											</div>
										</div>
									</div>

									<div class="tab-pane" id="week" role="tabpanel">
										<div class="fc-view fc-agendaWeek-view fc-agenda-view" style=""><table><thead class="fc-head"><tr><td class="fc-head-container fc-widget-header"><div class="fc-row fc-widget-header" style="margin-right: 16.333px;"><table><thead><tr><th class="fc-axis fc-widget-header" style="width: 1px;"></th><th class="fc-day-header fc-widget-header fc-mon" data-date="2017-04-10">SUNDAY 20</th><th class="fc-day-header fc-widget-header fc-tue" data-date="2017-04-11">MONDAY 21</th><th class="fc-day-header fc-widget-header fc-wed" data-date="2017-04-12">TUESDAY 22</th><th class="fc-day-header fc-widget-header fc-thu" data-date="2017-04-13">WEDNESDAY 23</th><th class="fc-day-header fc-widget-header fc-fri" data-date="2017-04-14">THURSDAY 24</th><th class="fc-day-header fc-widget-header fc-sat" data-date="2017-04-15">FRIDAY 25</th><th class="fc-day-header fc-widget-header fc-sun" data-date="2017-04-16">SATURDAY 26</th></tr></thead></table></div></td></tr></thead>
											<tbody class="fc-body"><tr><td class="fc-widget-content">

											<div class="fc-time-grid-container fc-scroller" style="height: 400px;"><div class="fc-time-grid"><div class="fc-bg"><table><tbody><tr><td class="fc-axis fc-widget-content" style="width: 1px;"></td>
											<td class="fc-day fc-widget-content fc-mon fc-today fc-state-highlight" data-date="2017-04-10"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2017-04-11"></td><td class="fc-day fc-widget-content fc-wed fc-future" data-date="2017-04-12"></td><td class="fc-day fc-widget-content fc-thu fc-future" data-date="2017-04-13"></td><td class="fc-day fc-widget-content fc-fri fc-future" data-date="2017-04-14"></td><td class="fc-day fc-widget-content fc-sat fc-future" data-date="2017-04-15"></td><td class="fc-day fc-widget-content fc-sun fc-future" data-date="2017-04-16"></td></tr></tbody></table></div><div class="fc-slats"><table><tbody><tr data-time="06:00:00"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"><span>6AM</span></td><td class="fc-widget-content"></td></tr><tr data-time="06:30:00" class="fc-minor"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"></td><td class="fc-widget-content"></td></tr><tr data-time="07:00:00"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"><span>7AM</span></td><td class="fc-widget-content"></td></tr><tr data-time="07:30:00" class="fc-minor"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"></td><td class="fc-widget-content"></td></tr><tr data-time="08:00:00"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"><span>8AM</span></td><td class="fc-widget-content"><ul class="calendar-block-events">
												<li data-toggle="modal" data-target="#public-event">
													<span class="event-status uncompleted"></span>
													Breakfast at the Agency
												</li>
											</ul></td></tr><tr data-time="08:30:00" class="fc-minor"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"></td><td class="fc-widget-content"></td></tr><tr data-time="09:00:00"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"><span>9AM</span></td><td class="fc-widget-content"></td></tr><tr data-time="09:30:00" class="fc-minor"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"></td><td class="fc-widget-content"></td></tr><tr data-time="10:00:00"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"><span>10AM</span></td><td class="fc-widget-content"></td></tr><tr data-time="10:30:00" class="fc-minor"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"></td><td class="fc-widget-content"></td></tr><tr data-time="11:00:00"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"><span>11AM</span></td><td class="fc-widget-content"></td></tr><tr data-time="11:30:00" class="fc-minor"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"></td><td class="fc-widget-content"></td></tr><tr data-time="12:00:00"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"><span>12PM</span></td><td class="fc-widget-content"></td></tr><tr data-time="12:30:00" class="fc-minor"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"></td><td class="fc-widget-content"></td></tr><tr data-time="13:00:00"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"><span>1PM</span></td><td class="fc-widget-content"><ul class="calendar-block-events"><li data-toggle="modal" data-target="#private-event">
												<span class="event-status completed"></span>
												Send the new “Olympus” project files to the Agency
											</li>
												</ul></td></tr><tr data-time="13:30:00" class="fc-minor"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"></td><td class="fc-widget-content"></td></tr><tr data-time="14:00:00"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"><span>2PM</span></td><td class="fc-widget-content"></td></tr><tr data-time="14:30:00" class="fc-minor"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"></td><td class="fc-widget-content"></td></tr><tr data-time="15:00:00"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"><span>3PM</span></td><td class="fc-widget-content"></td></tr><tr data-time="15:30:00" class="fc-minor"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"></td><td class="fc-widget-content"></td></tr><tr data-time="16:00:00"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"><span>4PM</span></td><td class="fc-widget-content"></td></tr><tr data-time="16:30:00" class="fc-minor"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"></td><td class="fc-widget-content"></td></tr><tr data-time="17:00:00"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"><span>5PM</span></td><td class="fc-widget-content"></td></tr><tr data-time="17:30:00" class="fc-minor"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"></td><td class="fc-widget-content"></td></tr><tr data-time="18:00:00"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"><span>6PM</span></td><td class="fc-widget-content"></td></tr><tr data-time="18:30:00" class="fc-minor"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"></td><td class="fc-widget-content"></td></tr><tr data-time="19:00:00"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"><span>7PM</span></td><td class="fc-widget-content"></td></tr><tr data-time="19:30:00" class="fc-minor"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"></td><td class="fc-widget-content"></td></tr><tr data-time="20:00:00"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"><span>8PM</span></td><td class="fc-widget-content"></td></tr><tr data-time="20:30:00" class="fc-minor"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"></td><td class="fc-widget-content"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><tbody><tr><td class="fc-axis" style="width: 1px;"></td><td><div class="fc-content-col"><div class="fc-event-container fc-helper-container"></div><div class="fc-event-container"></div><div class="fc-highlight-container"></div><div class="fc-bgevent-container"></div><div class="fc-business-container"></div></div></td><td><div class="fc-content-col"><div class="fc-event-container fc-helper-container"></div><div class="fc-event-container"></div><div class="fc-highlight-container"></div><div class="fc-bgevent-container"></div><div class="fc-business-container"></div></div></td><td><div class="fc-content-col"><div class="fc-event-container fc-helper-container"></div><div class="fc-event-container"></div><div class="fc-highlight-container"></div><div class="fc-bgevent-container"></div><div class="fc-business-container"></div></div></td><td><div class="fc-content-col"><div class="fc-event-container fc-helper-container"></div><div class="fc-event-container"></div><div class="fc-highlight-container"></div><div class="fc-bgevent-container"></div><div class="fc-business-container"></div></div></td><td><div class="fc-content-col"><div class="fc-event-container fc-helper-container"></div><div class="fc-event-container"></div><div class="fc-highlight-container"></div><div class="fc-bgevent-container"></div><div class="fc-business-container"></div></div></td><td><div class="fc-content-col"><div class="fc-event-container fc-helper-container"></div><div class="fc-event-container"></div><div class="fc-highlight-container"></div><div class="fc-bgevent-container"></div><div class="fc-business-container"></div></div></td><td><div class="fc-content-col"><div class="fc-event-container fc-helper-container"></div><div class="fc-event-container"></div><div class="fc-highlight-container"></div><div class="fc-bgevent-container"></div><div class="fc-business-container"></div></div></td></tr></tbody></table></div><hr class="fc-divider fc-widget-header" style="display: none;"></div></div></td></tr></tbody>
											</table>
										</div>

										<div class="ui-block-title ui-block-title-small">
											<h6 class="title">THURSDAY, MARCH 24</h6>
										</div>

										<div class="no-past-events">
											<div class="control-block-button">

												<a href="<?php echo base_url();?>app/#" class="btn btn-control bg-breez" data-toggle="modal" data-target="#create-event">
													<svg class="olymp-plus-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-plus-icon"></use></svg>
													<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 36px; top: -41.2px; background-color: rgb(255, 255, 255); transform: scale(2.60417);"></div></div>
												</a>

											</div>
											<svg class="olymp-month-calendar-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-month-calendar-icon"></use></svg>
											<span>There are no events to show</span>
											<a href="<?php echo base_url();?>app/#" class="h6" data-toggle="modal" data-target="#create-event">Create an Event</a>
										</div>
									</div>

									<div class="tab-pane" id="day" role="tabpanel">
										<div class="fc-view fc-agendaDay-view fc-agenda-view" style="">
											<table>
												<thead class="fc-head">
												<tr>
													<td class="fc-head-container fc-widget-header">
														<div class="fc-row fc-widget-header" style="margin-right: 16px;">
															<table>
																<thead>
																<tr>
																	<th class="fc-axis fc-widget-header" style="width: 1px;"></th>
																	<th class="fc-day-header fc-widget-header fc-mon" data-date="2017-04-10">Monday</th>
																</tr>
																</thead>
															</table>
														</div>

										</td></tr></thead><tbody class="fc-body"><tr><td class="fc-widget-content">
											<div class="fc-time-grid-container fc-scroller" style="height: 400px;"><div class="fc-time-grid"><div class="fc-bg"><table><tbody><tr><td class="fc-axis fc-widget-content" style="width: 40px;"></td><td class="fc-day fc-widget-content fc-mon fc-today fc-state-highlight" data-date="2017-04-10"></td></tr></tbody></table></div><div class="fc-slats"><table><tbody><tr data-time="06:00:00"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"><span>6AM</span></td><td class="fc-widget-content"></td></tr><tr data-time="06:30:00" class="fc-minor"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"></td><td class="fc-widget-content"></td></tr><tr data-time="07:00:00"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"><span>7AM</span></td><td class="fc-widget-content"></td></tr><tr data-time="07:30:00" class="fc-minor"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"></td><td class="fc-widget-content"></td></tr><tr data-time="08:00:00"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"><span>8AM</span></td><td class="fc-widget-content"></td></tr><tr data-time="08:30:00" class="fc-minor"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"></td><td class="fc-widget-content"></td></tr><tr data-time="09:00:00"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"><span>9AM</span></td><td class="fc-widget-content"></td></tr><tr data-time="09:30:00" class="fc-minor"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"></td><td class="fc-widget-content"></td></tr><tr data-time="10:00:00"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"><span>10AM</span></td><td class="fc-widget-content"></td></tr><tr data-time="10:30:00" class="fc-minor"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"></td><td class="fc-widget-content"></td></tr><tr data-time="11:00:00"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"><span>11AM</span></td><td class="fc-widget-content"></td></tr><tr data-time="11:30:00" class="fc-minor"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"></td><td class="fc-widget-content"></td></tr><tr data-time="
											:00:00">
												<td class="fc-axis fc-time fc-widget-content" style="width: 40px;">
													<span>12PM
													</span>
												</td>
												<td class="fc-widget-content"><ul class="calendar-block-events">
													<li data-toggle="modal" data-target="#public-event">
														<span class="event-status b-day"></span>
														Chris Greyson’s Bday
													</li>
												</ul></td></tr><tr data-time="12:30:00" class="fc-minor"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"></td><td class="fc-widget-content"></td></tr><tr data-time="13:00:00"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"><span>1PM</span></td><td class="fc-widget-content"></td></tr><tr data-time="13:30:00" class="fc-minor"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"></td><td class="fc-widget-content"></td></tr><tr data-time="14:00:00"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"><span>2PM</span></td><td class="fc-widget-content"><ul class="calendar-block-events">
												<li data-toggle="modal" data-target="#public-event">
													<span class="event-status completed"></span>
													Make Dinner Plans with Jennifer
												</li>
											</ul></td></tr><tr data-time="14:30:00" class="fc-minor"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"></td><td class="fc-widget-content"></td></tr><tr data-time="15:00:00"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"><span>3PM</span></td><td class="fc-widget-content"></td></tr><tr data-time="15:30:00" class="fc-minor"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"></td><td class="fc-widget-content"></td></tr><tr data-time="16:00:00"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"><span>4PM</span></td><td class="fc-widget-content"></td></tr><tr data-time="16:30:00" class="fc-minor"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"></td><td class="fc-widget-content"></td></tr><tr data-time="17:00:00"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"><span>5PM</span></td><td class="fc-widget-content"></td></tr><tr data-time="17:30:00" class="fc-minor"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"></td><td class="fc-widget-content"></td></tr><tr data-time="18:00:00"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"><span>6PM</span></td><td class="fc-widget-content"></td></tr><tr data-time="18:30:00" class="fc-minor"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"></td><td class="fc-widget-content"></td></tr><tr data-time="19:00:00"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"><span>7PM</span></td><td class="fc-widget-content"></td></tr><tr data-time="19:30:00" class="fc-minor"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"></td><td class="fc-widget-content"></td></tr><tr data-time="20:00:00"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"><span>8PM</span></td><td class="fc-widget-content"></td></tr><tr data-time="20:30:00" class="fc-minor"><td class="fc-axis fc-time fc-widget-content" style="width: 40px;"></td><td class="fc-widget-content"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><tbody><tr><td class="fc-axis" style="width: 40px;"></td><td><div class="fc-content-col"><div class="fc-event-container fc-helper-container"></div><div class="fc-event-container"></div><div class="fc-highlight-container"></div><div class="fc-bgevent-container"></div><div class="fc-business-container"></div></div></td></tr></tbody></table></div><hr class="fc-divider fc-widget-header" style="display: none;"></div></div></td></tr></tbody></table></div>

										<div class="ui-block-title ui-block-title-small">
											<h6 class="title">TUESDAY, MARCH 8</h6>
										</div>

										<div class="today-events calendar">
											<div class="list">

												<div class="control-block-button">

													<a href="<?php echo base_url();?>app/#" class="btn btn-control bg-breez" data-toggle="modal" data-target="#create-event">
														<svg class="olymp-plus-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-plus-icon"></use></svg>
													</a>

												</div>

												<div id="accordion" role="tablist" aria-multiselectable="true" class="day-event">

													<div class="card checked">
														<div class="card-header" role="tab" id="headingOne">
															<div class="event-time">
																<time datetime="2004-07-24T18:18">9:00am</time>
																<div class="more"><svg class="olymp-three-dots-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg>
																	<ul class="more-dropdown">
																		<li>
																			<a href="<?php echo base_url();?>app/#">Mark as Completed</a>
																		</li>
																		<li>
																			<a href="<?php echo base_url();?>app/#">Delete Event</a>
																		</li>
																	</ul>
																</div>
															</div>
															<h5 class="mb-0 title">
																<a data-toggle="collapse" data-parent="#accordion" href="<?php echo base_url();?>app/#" aria-expanded="true">
																	Chris Greyson’s Bday
																	<span class="event-status-icon checked" data-toggle="tooltip" data-placement="top" data-original-title="CHECKED">
																		<svg class="olymp-checked-calendar-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-checked-calendar-icon"></use></svg>
																	</span>
																</a>
															</h5>
														</div>
													</div>

													<div class="card">
														<div class="card-header" role="tab" id="headingThree">
															<div class="event-time">
																<time class="published" datetime="2017-03-24T18:18">1:30am</time>
																<div class="more"><svg class="olymp-three-dots-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg>
																	<ul class="more-dropdown">
																		<li>
																			<a href="<?php echo base_url();?>app/#">Mark as Completed</a>
																		</li>
																		<li>
																			<a href="<?php echo base_url();?>app/#">Delete Event</a>
																		</li>
																	</ul>
																</div>
															</div>
															<h5 class="mb-0 title">
																<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="<?php echo base_url();?>app/#collapseThree" aria-expanded="false" aria-controls="collapseThree">
																	Make Dinner Plans with Jennifer
																	<svg class="olymp-dropdown-arrow-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
																	<span class="event-status-icon completed" data-toggle="modal" data-target="#public-event">
																		<svg class="olymp-checked-calendar-icon" data-toggle="tooltip" data-placement="top" data-original-title="UNCOMPLETED"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-checked-calendar-icon"></use></svg>
																	</span>
																</a>
															</h5>
														</div>
														<div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
															<div class="card-body">
																I have to make reservations at that new restaurant downtown.
															</div>
														</div>
													</div>

												</div>

											</div>
										</div>
									</div>
								</div>


							</div>
						</div>


					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="tab-pane" id="notifications" role="tabpanel">
		<div class="container">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="ui-block">

						<table class="event-item-table event-item-table-fixed-width">

							<thead>

							<tr>

								<th class="author">
									NOTIFICATION
								</th>

								<th class="location">
									PLACE
								</th>

								<th class="upcoming">
									DATE
								</th>

								<th class="description">
									DESCRIPTION
								</th>

								<th class="users">
									ASSISTANTS
								</th>

								<th class="add-event">

								</th>
							</tr>

							</thead>

							<tbody>
							<tr class="event-item">
								<td class="author">
									<div class="event-author inline-items">
										<div class="author-thumb">
											<img src="<?php echo base_url();?>app/img/avatar62-sm.jpg" alt="author">
										</div>
										<div class="author-date">
											<a href="<?php echo base_url();?>app/#" class="author-name h6">Mathilda Brinker</a> invited you <br> to an event <a href="<?php echo base_url();?>app/#">Reunion Dinner.</a>
										</div>
									</div>
								</td>
								<td class="location">
									<div class="place inline-items">
										<svg class="olymp-add-a-place-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-add-a-place-icon"></use></svg>
										<span>Panucci Restaurant</span>
									</div>
								</td>
								<td class="upcoming">
									<div class="date-event inline-items align-left">
										<svg class="olymp-small-calendar-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-small-calendar-icon"></use></svg>

										<span class="month">Aug 14, 2016 at 7:00pm</span>

									</div>
								</td>
								<td class="description">
									<p class="description">Hey! I thought we could all get together and grab something to eat to remember old times!</p>
								</td>
								<td class="users">
									<ul class="friends-harmonic">
										<li>
											<a href="<?php echo base_url();?>app/#">
												<img src="<?php echo base_url();?>app/img/friend-harmonic5.jpg" alt="friend">
											</a>
										</li>
										<li>
											<a href="<?php echo base_url();?>app/#">
												<img src="<?php echo base_url();?>app/img/friend-harmonic10.jpg" alt="friend">
											</a>
										</li>
										<li>
											<a href="<?php echo base_url();?>app/#">
												<img src="<?php echo base_url();?>app/img/friend-harmonic7.jpg" alt="friend">
											</a>
										</li>
										<li>
											<a href="<?php echo base_url();?>app/#">
												<img src="<?php echo base_url();?>app/img/friend-harmonic8.jpg" alt="friend">
											</a>
										</li>
										<li>
											<a href="<?php echo base_url();?>app/#">
												<img src="<?php echo base_url();?>app/img/friend-harmonic2.jpg" alt="friend">
											</a>
										</li>
										<li>
											<a href="<?php echo base_url();?>app/#" class="all-users bg-breez">+24</a>
										</li>
									</ul>
								</td>
								<td class="add-event">
									<a href="<?php echo base_url();?>app/20-CalendarAndEvents-MonthlyCalendar.html" class="btn btn-breez btn-sm">Add to Calendar</a>
									<a href="<?php echo base_url();?>app/#" class="btn btn-sm btn-border-think custom-color c-grey">Decline / Delete</a>
								</td>
							</tr>
							<tr class="event-item">
								<td class="author">
									<div class="event-author inline-items">
										<div class="author-thumb">
											<img src="<?php echo base_url();?>app/img/avatar78-sm.jpg" alt="author">
										</div>
										<div class="author-date">
											<a href="<?php echo base_url();?>app/#" class="author-name h6">Walter Havock </a>invited you to <br> an event <a href="<?php echo base_url();?>app/#"> Daydreamz New <br> Year’s Party.</a>
										</div>
									</div>
								</td>
								<td class="location">
									<div class="place inline-items">
										<svg class="olymp-add-a-place-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-add-a-place-icon"></use></svg>
										<span>Daydreamz Agency</span>
									</div>
								</td>
								<td class="upcoming">
									<div class="date-event inline-items align-left">
										<svg class="olymp-small-calendar-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-small-calendar-icon"></use></svg>

										<span class="month">Dec 29, 2016 at 7:00pm</span>

									</div>
								</td>
								<td class="description">
									<p class="description">Let’s celebrate the new year together! We are organizing a big party for all the agency...</p>
								</td>
								<td class="users">
									<ul class="friends-harmonic">
										<li>
											<a href="<?php echo base_url();?>app/#">
												<img src="<?php echo base_url();?>app/img/friend-harmonic5.jpg" alt="friend">
											</a>
										</li>
										<li>
											<a href="<?php echo base_url();?>app/#">
												<img src="<?php echo base_url();?>app/img/friend-harmonic10.jpg" alt="friend">
											</a>
										</li>
										<li>
											<a href="<?php echo base_url();?>app/#">
												<img src="<?php echo base_url();?>app/img/friend-harmonic7.jpg" alt="friend">
											</a>
										</li>
										<li>
											<a href="<?php echo base_url();?>app/#">
												<img src="<?php echo base_url();?>app/img/friend-harmonic8.jpg" alt="friend">
											</a>
										</li>

									</ul>
								</td>
								<td class="add-event">
									<a href="<?php echo base_url();?>app/20-CalendarAndEvents-MonthlyCalendar.html" class="btn btn-breez btn-sm">Add to Calendar</a>
									<a href="<?php echo base_url();?>app/#" class="btn btn-sm btn-border-think custom-color c-grey">Decline / Delete</a>
								</td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="public-event">
	<div class="modal-dialog ui-block window-popup event-private-public public-event">
		<a href="<?php echo base_url();?>app/#" class="close icon-close" data-dismiss="modal" aria-label="Close">
			<svg class="olymp-close-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-close-icon"></use></svg>
		</a>
		<article class="hentry post has-post-thumbnail thumb-full-width private-event">

			<div class="private-event-head inline-items">
				<img src="<?php echo base_url();?>app/img/avatar77-sm.jpg" alt="author">

				<div class="author-date">
					<a class="h3 event-title" href="<?php echo base_url();?>app/#">Green Goo in Gotham</a>
					<div class="event__date">
						<time class="published" datetime="2017-03-24T18:18">
							Saturday at 9:00am
						</time>
					</div>
				</div>

				<div class="more"><svg class="olymp-three-dots-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg>
					<ul class="more-dropdown">
						<li>
							<a href="<?php echo base_url();?>app/#">Edit Event Settings</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>app/#">Mark as Completed</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>app/#">Delete Event</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="post-thumb">
				<img src="<?php echo base_url();?>app/img/event-public.jpg" alt="photo">
			</div>

			<div class="row">
				<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
					<div class="post__author author vcard inline-items">
						<img src="<?php echo base_url();?>app/img/avatar5-sm.jpg" alt="author">

						<div class="author-date">
							<a class="h6 post__author-name fn" href="<?php echo base_url();?>app/#">Green Goo Rock</a> created the <a href="<?php echo base_url();?>app/#">Event</a>
							<div class="post__date">
								<time class="published" datetime="2017-03-24T18:18">
									March 11 at 9:52pm
								</time>
							</div>
						</div>

					</div>

					<p>
						We’ll be playing in the Gotham Bar in May. Come and have a great time with us! Entry: $12
					</p>
				</div>
				<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
					<div class="event-description">
						<h6 class="event-description-title">Public Event</h6>
						<div class="place inline-items">
							<svg class="olymp-add-a-place-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-add-a-place-icon"></use></svg>
							<span>Gotham Bar</span>
						</div>

						<div class="place inline-items">
							<svg class="olymp-add-a-place-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-add-a-place-icon"></use></svg>
							<span>Mar 26, 2016 at 9:00am UTC-8</span>
						</div>

						<ul class="friends-harmonic">
							<li>
								<a href="<?php echo base_url();?>app/#">
									<img src="<?php echo base_url();?>app/img/friend-harmonic5.jpg" alt="friend">
								</a>
							</li>
							<li>
								<a href="<?php echo base_url();?>app/#">
									<img src="<?php echo base_url();?>app/img/friend-harmonic10.jpg" alt="friend">
								</a>
							</li>
							<li>
								<a href="<?php echo base_url();?>app/#">
									<img src="<?php echo base_url();?>app/img/friend-harmonic7.jpg" alt="friend">
								</a>
							</li>
							<li>
								<a href="<?php echo base_url();?>app/#">
									<img src="<?php echo base_url();?>app/img/friend-harmonic8.jpg" alt="friend">
								</a>
							</li>
							<li>
								<a href="<?php echo base_url();?>app/#">
									<img src="<?php echo base_url();?>app/img/friend-harmonic2.jpg" alt="friend">
								</a>
							</li>
							<li>
								<a href="<?php echo base_url();?>app/#" class="all-users bg-breez">+24</a>
							</li>

							<li class="with-text">
								Will Assist
							</li>
						</ul>

						<a href="<?php echo base_url();?>app/#" class="btn btn-blue btn-sm full-width">Invite Friends</a>

						<a href="<?php echo base_url();?>app/#" class="btn btn-breez btn-sm full-width">Add to Calendar / Assist</a>
					</div>
				</div>
			</div>


			<div class="post-additional-info inline-items">

				<a href="<?php echo base_url();?>app/#" class="post-add-icon inline-items">
					<svg class="olymp-heart-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-heart-icon"></use></svg>
					<span>8</span>
				</a>

				<ul class="friends-harmonic">
					<li>
						<a href="<?php echo base_url();?>app/#">
							<img src="<?php echo base_url();?>app/img/friend-harmonic1.jpg" alt="friend">
						</a>
					</li>
					<li>
						<a href="<?php echo base_url();?>app/#">
							<img src="<?php echo base_url();?>app/img/friend-harmonic9.jpg" alt="friend">
						</a>
					</li>
					<li>
						<a href="<?php echo base_url();?>app/#">
							<img src="<?php echo base_url();?>app/img/friend-harmonic7.jpg" alt="friend">
						</a>
					</li>
					<li>
						<a href="<?php echo base_url();?>app/#">
							<img src="<?php echo base_url();?>app/img/friend-harmonic4.jpg" alt="friend">
						</a>
					</li>
					<li>
						<a href="<?php echo base_url();?>app/#">
							<img src="<?php echo base_url();?>app/img/friend-harmonic8.jpg" alt="friend">
						</a>
					</li>
				</ul>

				<div class="names-people-likes">
					<a href="<?php echo base_url();?>app/#">Diana </a>, <a href="<?php echo base_url();?>app/#">Nicholas</a> and
					<br>15 more liked this
				</div>


				<div class="comments-shared">
					<a href="<?php echo base_url();?>app/#" class="post-add-icon inline-items">
						<svg class="olymp-speech-balloon-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-speech-balloon-icon"></use></svg>
						<span>16 Comments</span>
					</a>
				</div>


			</div>

			<div class="control-block-button post-control-button">

				<a href="<?php echo base_url();?>app/#" class="btn btn-control">
					<svg class="olymp-like-post-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-like-post-icon"></use></svg>
				</a>

				<a href="<?php echo base_url();?>app/#" class="btn btn-control">
					<svg class="olymp-comments-post-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-comments-post-icon"></use></svg>
				</a>

				<a href="<?php echo base_url();?>app/#" class="btn btn-control">
					<svg class="olymp-share-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-share-icon"></use></svg>
				</a>

			</div>

		</article>

		<div class="mCustomScrollbar ps ps--theme_default" data-mcs-theme="dark" data-ps-id="a52cc8f3-de88-8b67-4665-f66086e9f49c">

			<ul class="comments-list">
				<li>
					<div class="post__author author vcard inline-items">
						<img src="<?php echo base_url();?>app/img/author-page.jpg" alt="author">

						<div class="author-date">
							<a class="h6 post__author-name fn" href="<?php echo base_url();?>app/02-ProfilePage.html">James Spiegel</a>
							<div class="post__date">
								<time class="published" datetime="2017-03-24T18:18">
									38 mins ago
								</time>
							</div>
						</div>

						<a href="<?php echo base_url();?>app/#" class="more"><svg class="olymp-three-dots-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>

					</div>

					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium der doloremque laudantium.</p>

					<a href="<?php echo base_url();?>app/#" class="post-add-icon inline-items">
						<svg class="olymp-heart-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-heart-icon"></use></svg>
						<span>3</span>
					</a>
					<a href="<?php echo base_url();?>app/#" class="reply">Reply</a>
				</li>
				<li>
					<div class="post__author author vcard inline-items">
						<img src="<?php echo base_url();?>app/img/avatar1-sm.jpg" alt="author">

						<div class="author-date">
							<a class="h6 post__author-name fn" href="<?php echo base_url();?>app/#">Mathilda Brinker</a>
							<div class="post__date">
								<time class="published" datetime="2017-03-24T18:18">
									1 hour ago
								</time>
							</div>
						</div>

						<a href="<?php echo base_url();?>app/#" class="more"><svg class="olymp-three-dots-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>

					</div>

					<p>Ratione voluptatem sequi en lod nesciunt. Neque porro quisquam est, quinder dolorem ipsum
						quia dolor sit amet, consectetur adipisci velit en lorem ipsum duis aute irure dolor in reprehenderit in voluptate velit esse cillum.
					</p>

					<a href="<?php echo base_url();?>app/#" class="post-add-icon inline-items">
						<svg class="olymp-heart-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-heart-icon"></use></svg>
						<span>8</span>
					</a>
					<a href="<?php echo base_url();?>app/#" class="reply">Reply</a>
				</li>
				<li>
					<div class="post__author author vcard inline-items">
						<img src="<?php echo base_url();?>app/img/avatar10-sm.jpg" alt="author">

						<div class="author-date">
							<a class="h6 post__author-name fn" href="<?php echo base_url();?>app/#">Elaine Dreyfuss</a>
							<div class="post__date">
								<time class="published" datetime="2017-03-24T18:18">
									5 mins ago
								</time>
							</div>
						</div>

						<a href="<?php echo base_url();?>app/#" class="more"><svg class="olymp-three-dots-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>

					</div>

					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium der doloremque laudantium.</p>

					<a href="<?php echo base_url();?>app/#" class="post-add-icon inline-items">
						<svg class="olymp-heart-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-heart-icon"></use></svg>
						<span>8</span>
					</a>
					<a href="<?php echo base_url();?>app/#" class="reply">Reply</a>
				</li>
			</ul>

		<div class="ps__scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps__scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__scrollbar-y-rail" style="top: 0px; right: 0px;"><div class="ps__scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>

		<form class="comment-form inline-items">

			<div class="post__author author vcard inline-items">
				<img src="<?php echo base_url();?>app/img/author-page.jpg" alt="author">

				<div class="form-group with-icon-right is-empty">
					<textarea class="form-control" placeholder=""></textarea>
					<div class="add-options-message">
						<a href="<?php echo base_url();?>app/#" class="options-message">
							<svg class="olymp-camera-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-camera-icon"></use></svg>
						</a>
					</div>
				<span class="material-input"></span></div>
			</div>

		</form>
	</div>
</div>

<div class="modal fade" id="private-event">
	<div class="modal-dialog ui-block window-popup event-private-public private-event">
		<a href="<?php echo base_url();?>app/#" class="close icon-close" data-dismiss="modal" aria-label="Close">
			<svg class="olymp-close-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-close-icon"></use></svg>
		</a>
	<article class="hentry post has-post-thumbnail thumb-full-width private-event">

		<div class="private-event-head inline-items">
			<img src="<?php echo base_url();?>app/img/avatar77-sm.jpg" alt="author">

			<div class="author-date">
				<a class="h3 event-title" href="<?php echo base_url();?>app/#">Breakfast at the Agency</a>
				<div class="event__date">
					<time class="published" datetime="2017-03-24T18:18">
						Saturday at 9:00am
					</time>
				</div>
			</div>

			<div class="more"><svg class="olymp-three-dots-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg>
				<ul class="more-dropdown">
					<li>
						<a href="<?php echo base_url();?>app/#">Edit Event Settings</a>
					</li>
					<li>
						<a href="<?php echo base_url();?>app/#">Mark as Completed</a>
					</li>
					<li>
						<a href="<?php echo base_url();?>app/#">Delete Event</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="post-thumb">
			<img src="<?php echo base_url();?>app/img/event-private.jpg" alt="photo">
		</div>

		<div class="row">
			<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
				<div class="post__author author vcard inline-items">
					<img src="<?php echo base_url();?>app/img/author-page.jpg" alt="author">

					<div class="author-date">
						<a class="h6 post__author-name fn" href="<?php echo base_url();?>app/02-ProfilePage.html">James Spiegel</a> created the <a href="<?php echo base_url();?>app/#">Event</a>
						<div class="post__date">
							<time class="published" datetime="2017-03-24T18:18">
								March 11 at 9:52pm
							</time>
						</div>
					</div>

				</div>

				<p>
					Hi Guys! I propose to go a litle earlier at the agency to have breakfast and talk a little more about the
					new design project we have been working on. Cheers!
				</p>
			</div>
			<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
				<div class="event-description">
					<h6 class="event-description-title">Private Event</h6>
					<div class="place inline-items">
						<svg class="olymp-add-a-place-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-add-a-place-icon"></use></svg>
						<span>Daydreamz Agency</span>
					</div>

					<div class="place inline-items">
						<svg class="olymp-small-calendar-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-small-calendar-icon"></use></svg>
						<span>Mar 26, 2016 at 9:00am UTC-8</span>
					</div>

					<ul class="friends-harmonic">
						<li>
							<a href="<?php echo base_url();?>app/#">
								<img src="<?php echo base_url();?>app/img/friend-harmonic5.jpg" alt="friend">
							</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>app/#">
								<img src="<?php echo base_url();?>app/img/friend-harmonic10.jpg" alt="friend">
							</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>app/#">
								<img src="<?php echo base_url();?>app/img/friend-harmonic7.jpg" alt="friend">
							</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>app/#">
								<img src="<?php echo base_url();?>app/img/friend-harmonic8.jpg" alt="friend">
							</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>app/#">
								<img src="<?php echo base_url();?>app/img/friend-harmonic2.jpg" alt="friend">
							</a>
						</li>

						<li class="with-text">
							Will Assist
						</li>
					</ul>

					<a href="<?php echo base_url();?>app/#" class="btn btn-blue btn-sm full-width">Invite Friends</a>
				</div>
			</div>
		</div>



		<div class="post-additional-info inline-items">

			<a href="<?php echo base_url();?>app/#" class="post-add-icon inline-items">
				<svg class="olymp-heart-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-heart-icon"></use></svg>
				<span>8</span>
			</a>

			<ul class="friends-harmonic">
				<li>
					<a href="<?php echo base_url();?>app/#">
						<img src="<?php echo base_url();?>app/img/friend-harmonic1.jpg" alt="friend">
					</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>app/#">
						<img src="<?php echo base_url();?>app/img/friend-harmonic9.jpg" alt="friend">
					</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>app/#">
						<img src="<?php echo base_url();?>app/img/friend-harmonic7.jpg" alt="friend">
					</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>app/#">
						<img src="<?php echo base_url();?>app/img/friend-harmonic4.jpg" alt="friend">
					</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>app/#">
						<img src="<?php echo base_url();?>app/img/friend-harmonic8.jpg" alt="friend">
					</a>
				</li>
			</ul>

			<div class="names-people-likes">
				<a href="<?php echo base_url();?>app/#">Diana </a>, <a href="<?php echo base_url();?>app/#">Nicholas</a> and
				<br>15 more liked this
			</div>


			<div class="comments-shared">
				<a href="<?php echo base_url();?>app/#" class="post-add-icon inline-items">
					<svg class="olymp-speech-balloon-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-speech-balloon-icon"></use></svg>
					<span>16 Comments</span>
				</a>
			</div>


		</div>

		<div class="control-block-button post-control-button">

			<a href="<?php echo base_url();?>app/#" class="btn btn-control">
				<svg class="olymp-like-post-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-like-post-icon"></use></svg>
			</a>

			<a href="<?php echo base_url();?>app/#" class="btn btn-control">
				<svg class="olymp-comments-post-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-comments-post-icon"></use></svg>
			</a>

		</div>

	</article>

	<div class="mCustomScrollbar ps ps--theme_default" data-mcs-theme="dark" data-ps-id="05aaacde-69f8-355f-4b3f-39aeb172f4a9">

		<ul class="comments-list">
			<li>
				<div class="post__author author vcard inline-items">
					<img src="<?php echo base_url();?>app/img/author-page.jpg" alt="author">

					<div class="author-date">
						<a class="h6 post__author-name fn" href="<?php echo base_url();?>app/02-ProfilePage.html">James Spiegel</a>
						<div class="post__date">
							<time class="published" datetime="2017-03-24T18:18">
								38 mins ago
							</time>
						</div>
					</div>

					<a href="<?php echo base_url();?>app/#" class="more"><svg class="olymp-three-dots-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>

				</div>

				<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium der doloremque laudantium.</p>

				<a href="<?php echo base_url();?>app/#" class="post-add-icon inline-items">
					<svg class="olymp-heart-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-heart-icon"></use></svg>
					<span>3</span>
				</a>
				<a href="<?php echo base_url();?>app/#" class="reply">Reply</a>
			</li>
			<li>
				<div class="post__author author vcard inline-items">
					<img src="<?php echo base_url();?>app/img/avatar1-sm.jpg" alt="author">

					<div class="author-date">
						<a class="h6 post__author-name fn" href="<?php echo base_url();?>app/#">Mathilda Brinker</a>
						<div class="post__date">
							<time class="published" datetime="2017-03-24T18:18">
								1 hour ago
							</time>
						</div>
					</div>

					<a href="<?php echo base_url();?>app/#" class="more"><svg class="olymp-three-dots-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>

				</div>

				<p>Ratione voluptatem sequi en lod nesciunt. Neque porro quisquam est, quinder dolorem ipsum
					quia dolor sit amet, consectetur adipisci velit en lorem ipsum duis aute irure dolor in reprehenderit in voluptate velit esse cillum.
				</p>

				<a href="<?php echo base_url();?>app/#" class="post-add-icon inline-items">
					<svg class="olymp-heart-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-heart-icon"></use></svg>
					<span>8</span>
				</a>
				<a href="<?php echo base_url();?>app/#" class="reply">Reply</a>
			</li>
			<li>
				<div class="post__author author vcard inline-items">
					<img src="<?php echo base_url();?>app/img/avatar10-sm.jpg" alt="author">

					<div class="author-date">
						<a class="h6 post__author-name fn" href="<?php echo base_url();?>app/#">Elaine Dreyfuss</a>
						<div class="post__date">
							<time class="published" datetime="2017-03-24T18:18">
								5 mins ago
							</time>
						</div>
					</div>

					<a href="<?php echo base_url();?>app/#" class="more"><svg class="olymp-three-dots-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>

				</div>

				<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium der doloremque laudantium.</p>

				<a href="<?php echo base_url();?>app/#" class="post-add-icon inline-items">
					<svg class="olymp-heart-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-heart-icon"></use></svg>
					<span>8</span>
				</a>
				<a href="<?php echo base_url();?>app/#" class="reply">Reply</a>
			</li>
		</ul>

	<div class="ps__scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps__scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__scrollbar-y-rail" style="top: 0px; right: 0px;"><div class="ps__scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>

	<form class="comment-form inline-items">

		<div class="post__author author vcard inline-items">
			<img src="<?php echo base_url();?>app/img/author-page.jpg" alt="author">

			<div class="form-group with-icon-right is-empty">
				<textarea class="form-control" placeholder=""></textarea>
				<div class="add-options-message">
					<a href="<?php echo base_url();?>app/#" class="options-message">
						<svg class="olymp-camera-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-camera-icon"></use></svg>
					</a>
				</div>
			<span class="material-input"></span></div>
		</div>

	</form>
</div>
</div>

<div class="modal fade" id="create-event">
	<div class="modal-dialog ui-block window-popup create-event">
		<a href="<?php echo base_url();?>app/#" class="close icon-close" data-dismiss="modal" aria-label="Close">
			<svg class="olymp-close-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-close-icon"></use></svg>
		</a>

	<div class="ui-block-title">
		<h6 class="title">Create an Event</h6>
	</div>

	<div class="ui-block-content">
			<div class="form-group label-floating is-select">
				<label class="control-label">Personal Event</label>
				<div class="btn-group bootstrap-select form-control"><button type="button" class="btn dropdown-toggle btn-secondary" data-toggle="dropdown" role="button" title="Private Event"><span class="filter-option pull-left">Private Event</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="0" class="selected"><a tabindex="0" class=" dropdown-item" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">Private Event</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class=" dropdown-item" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Personal Event</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select class="selectpicker form-control" tabindex="-98">
					<option value="MA">Private Event</option>
					<option value="FE">Personal Event</option>
				</select></div>
			<span class="material-input"></span></div>

			<div class="form-group label-floating">
				<label class="control-label">Event Name</label>
				<input class="form-control" placeholder="" value="Take Querty to the Veterinarian" type="text">
				 <span class="material-input"></span></div>

			<div class="form-group label-floating is-empty">
				<label class="control-label">Event Location</label>
				<input class="form-control" placeholder="" value="" type="text">
				 <span class="material-input"></span></div>

			<div class="form-group date-time-picker label-floating">
				<label class="control-label">Event Date</label>
				<input name="datetimepicker" value="26/03/2016">
				<span class="input-group-addon">
					<svg class="olymp-calendar-icon icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-calendar-icon"></use></svg>
				</span>
			</div>

			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="form-group label-floating">
						<label class="control-label">Event Time</label>
						<input class="form-control" placeholder="" value="09:00" type="text">
						 <span class="material-input"></span></div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="form-group label-floating is-select">
						<label class="control-label">AM-PM</label>
						<div class="btn-group bootstrap-select form-control"><button type="button" class="btn dropdown-toggle btn-secondary" data-toggle="dropdown" role="button" title="AM"><span class="filter-option pull-left">AM</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="0" class="selected"><a tabindex="0" class=" dropdown-item" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">AM</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class=" dropdown-item" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">PM</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select class="selectpicker form-control" tabindex="-98">
							<option value="MA">AM</option>
							<option value="FE">PM</option>
						</select></div>
					<span class="material-input"></span></div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="form-group label-floating is-select">
						<label class="control-label">Timezone</label>
						<div class="btn-group bootstrap-select form-control"><button type="button" class="btn dropdown-toggle btn-secondary" data-toggle="dropdown" role="button" title="US (UTC-8)"><span class="filter-option pull-left">US (UTC-8)</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="0" class="selected"><a tabindex="0" class=" dropdown-item" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">US (UTC-8)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class=" dropdown-item" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">UK (UTC-0)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select class="selectpicker form-control" tabindex="-98">
							<option value="MA">US (UTC-8)</option>
							<option value="FE">UK (UTC-0)</option>
						</select></div>
					<span class="material-input"></span></div>
				</div>

			</div>

			<div class="form-group label-floating">
				<label class="control-label">Event Description</label>
					<textarea class="form-control" placeholder="">I need to take Querty for a check up and ask the doctor if he needs a new tank.
					</textarea>
				 <span class="material-input"></span></div>

			<form class="form-group label-floating is-select is-empty">
				<svg class="olymp-happy-face-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-happy-face-icon"></use></svg>

				<div class="btn-group bootstrap-select show-tick form-control style-2"><button type="button" class="btn dropdown-toggle btn-secondary" data-toggle="dropdown" role="button" title="Nothing selected"><span class="filter-option pull-left">Nothing selected</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><div class="bs-searchbox"><input type="text" class="form-control" autocomplete="off" role="textbox" aria-label="Search"></div><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="0"><a tabindex="0" class=" dropdown-item" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><div class="inline-items">
										<div class="author-thumb">
											<img src="<?php echo base_url();?>app/img/avatar52-sm.jpg" alt="author">
										</div>
											<div class="h6 author-title">Green Goo Rock</div>

										</div><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class=" dropdown-item" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><div class="inline-items">
											<div class="author-thumb">
												<img src="<?php echo base_url();?>app/img/avatar74-sm.jpg" alt="author">
											</div>
											<div class="h6 author-title">Mathilda Brinker</div>
										</div><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class=" dropdown-item" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><div class="inline-items">
											<div class="author-thumb">
												<img src="<?php echo base_url();?>app/img/avatar48-sm.jpg" alt="author">
											</div>
											<div class="h6 author-title">Marina Valentine</div>
										</div><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class=" dropdown-item" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><div class="inline-items">
											<div class="author-thumb">
												<img src="<?php echo base_url();?>app/img/avatar75-sm.jpg" alt="author">
											</div>
											<div class="h6 author-title">Dave Marinara</div>
										</div><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="4"><a tabindex="0" class=" dropdown-item" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><div class="inline-items">
											<div class="author-thumb">
												<img src="<?php echo base_url();?>app/img/avatar76-sm.jpg" alt="author">
											</div>
											<div class="h6 author-title">Rachel Howlett</div>
										</div><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select class="selectpicker form-control style-2 show-tick" multiple="" data-live-search="true" tabindex="-98">
					<option title="Green Goo Rock" data-content="<div class=&quot;inline-items&quot;>
										<div class=&quot;author-thumb&quot;>
											<img src=&quot;img/avatar52-sm.jpg&quot; alt=&quot;author&quot;>
										</div>
											<div class=&quot;h6 author-title&quot;>Green Goo Rock</div>

										</div>">Green Goo Rock
					</option>

					<option title="Mathilda Brinker" data-content="<div class=&quot;inline-items&quot;>
											<div class=&quot;author-thumb&quot;>
												<img src=&quot;img/avatar74-sm.jpg&quot; alt=&quot;author&quot;>
											</div>
											<div class=&quot;h6 author-title&quot;>Mathilda Brinker</div>
										</div>">Mathilda Brinker
					</option>

					<option title="Marina Valentine" data-content="<div class=&quot;inline-items&quot;>
											<div class=&quot;author-thumb&quot;>
												<img src=&quot;img/avatar48-sm.jpg&quot; alt=&quot;author&quot;>
											</div>
											<div class=&quot;h6 author-title&quot;>Marina Valentine</div>
										</div>">Marina Valentine
					</option>

					<option title="Dave Marinara" data-content="<div class=&quot;inline-items&quot;>
											<div class=&quot;author-thumb&quot;>
												<img src=&quot;img/avatar75-sm.jpg&quot; alt=&quot;author&quot;>
											</div>
											<div class=&quot;h6 author-title&quot;>Dave Marinara</div>
										</div>">Dave Marinara
					</option>

					<option title="Rachel Howlett" data-content="<div class=&quot;inline-items&quot;>
											<div class=&quot;author-thumb&quot;>
												<img src=&quot;img/avatar76-sm.jpg&quot; alt=&quot;author&quot;>
											</div>
											<div class=&quot;h6 author-title&quot;>Rachel Howlett</div>
										</div>">Rachel Howlett
					</option>

				</select></div>
			<span class="material-input"></span><span class="material-input"></span></form>

			<button class="btn btn-breez btn-lg full-width">Create Event</button>

	</div>

</div>
</div>