@extends('customer.layouts.app')

@section('content')
	<!-- HEADER DESKTOP-->
	<header class="header-desktop">
		<div class="section__content section__content--p30">
			<div class="container-fluid">
				<div class="header-wrap">
					<div class="form-header">
						<ul>
							<li>
								<a href="#" class="btn btn-primary">Call Now</a>
							</li>
						</ul>
					</div>
					<div class="header-button">
						<div class="head-search">
							<input type="text" placeholder="Search here" />
							<button type="button">
								<i class="zmdi zmdi-search"></i>
							</button>
						</div>
						<div class="noti-wrap">
							<div class="noti__item js-item-menu">
								<i class="zmdi zmdi-notifications"></i>
								<span class="quantity">3</span>
								<div class="notifi-dropdown js-dropdown">
									<div class="notifi__title">
										<p>You have 3 Notifications</p>
									</div>
									<div class="notifi__item">
										<div class="bg-c1 img-cir img-40">
											<i class="zmdi zmdi-email-open"></i>
										</div>
										<div class="content">
											<p>You got a email notification</p>
											<span class="date">April 12, 2018 06:50</span>
										</div>
									</div>
									<div class="notifi__item">
										<div class="bg-c2 img-cir img-40">
											<i class="zmdi zmdi-account-box"></i>
										</div>
										<div class="content">
											<p>Your account has been blocked</p>
											<span class="date">April 12, 2018 06:50</span>
										</div>
									</div>
									<div class="notifi__item">
										<div class="bg-c3 img-cir img-40">
											<i class="zmdi zmdi-file-text"></i>
										</div>
										<div class="content">
											<p>You got a new file</p>
											<span class="date">April 12, 2018 06:50</span>
										</div>
									</div>
									<div class="notifi__footer">
										<a href="#">All notifications</a>
									</div>
								</div>
							</div>
						</div>
						<div class="account-wrap">
							<div class="account-item clearfix js-item-menu">
								<div class="image">
									<img src="{{url('/')}}/public/admin/assets-customer/images/icon/avatar-01.jpg" alt="John Doe" />
								</div>
								<div class="content">
									<a class="js-acc-btn" href="#">john doe</a>
								</div>
								<div class="account-dropdown js-dropdown">
									<div class="info clearfix">
										<div class="image">
											<a href="#">
												<img src="{{url('/')}}/public/admin/assets-customer/images/icon/avatar-01.jpg" alt="John Doe" />
											</a>
										</div>
										<div class="content">
											<h5 class="name">
												<a href="#">john doe</a>
											</h5>
											<span class="email">johndoe@example.com</span>
											<span class="email">020 3092 6664</span><br>
											<span class="email">Newington, Greater London</span>
										</div>
									</div>
									<div class="account-dropdown__body">
										<div class="account-dropdown__item">
											<a href="#">
												<i class="zmdi zmdi-account"></i>Account
											</a>
										</div>	                                               
									</div>
									<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
	                                  {{ csrf_field() }}
	                                </form>
									<div class="account-dropdown__footer">
										<a href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
											<i class="zmdi zmdi-power"></i>Logout
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- HEADER DESKTOP-->

	<!-- MAIN CONTENT-->
	<div class="main-content">
		<div class="section__content section__content--p30">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="overview-wrap">
							<h2 class="title-1">Dashboard</h2>
						</div>
					</div>	                           
				</div>
				<div class="row m-t-25">
					<div class="col-sm-6 col-lg-3">
						<div class="overview-item">
							<div class="overview__inner">
								<div class="overview-box clearfix">
									<div class="icon">
										<i class="zmdi zmdi-calendar-note"></i>
									</div>
									<div class="text">
										<h2>386</h2>
										<span>Upcoming Clean</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-lg-3">
						<div class="overview-item">
							<div class="overview__inner">
								<div class="overview-box clearfix">
									<div class="icon">
										<i class="zmdi zmdi-timer"></i>
									</div>
									<div class="text">
										<h2>86</h2>
										<span>Past Clean</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-lg-3">
						<div class="overview-item">
							<div class="overview__inner">
								<div class="overview-box clearfix">
									<div class="icon">
										<i class="zmdi zmdi-ticket-star"></i>
									</div>
									<div class="text">
										<h2>386</h2>
										<a href="#"><span>Open Requests</span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-lg-3">
						<div class="overview-item">
							<div class="overview__inner">
								<div class="overview-box clearfix">
									<div class="icon">
										<i class="zmdi zmdi-hourglass-alt"></i>
									</div>
									<div class="text">
										<h2>500</h2>
										<span>Reward points</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row m-t-50">
					<div class="col-lg-6">
						<div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
							<div class="au-card-title" style="background-image:url('images/bg-title-01.jpg');">
								<div class="bg-overlay bg-overlay--black"></div>
								<h3>
									<i class="zmdi zmdi-account-calendar"></i>News & Updates</h3>
							</div>
							<div class="au-task js-list-load">
								<div class="au-task__title">
									<p>News for John Doe</p>
								</div>
								<div class="au-task-list js-scrollbar3">
									<div class="au-task__item">
										<div class="au-task__item-inner">
											<h5 class="task">
												<a href="#">Meeting about plan for Admin Template 2018</a>
											</h5>
											<span class="time">10:00 AM</span>
										</div>
									</div>
									<div class="au-task__item">
										<div class="au-task__item-inner">
											<h5 class="task">
												<a href="#">Create new task for Dashboard</a>
											</h5>
											<span class="time">11:00 AM</span>
										</div>
									</div>
									<div class="au-task__item">
										<div class="au-task__item-inner">
											<h5 class="task">
												<a href="#">Meeting about plan for Admin Template 2018</a>
											</h5>
											<span class="time">02:00 PM</span>
										</div>
									</div>
									<div class="au-task__item">
										<div class="au-task__item-inner">
											<h5 class="task">
												<a href="#">Create new task for Dashboard</a>
											</h5>
											<span class="time">03:30 PM</span>
										</div>
									</div>
									<div class="au-task__item js-load-item" style="display: none;">
										<div class="au-task__item-inner">
											<h5 class="task">
												<a href="#">Meeting about plan for Admin Template 2018</a>
											</h5>
											<span class="time">10:00 AM</span>
										</div>
									</div>
									<div class="au-task__item js-load-item" style="display: none;">
										<div class="au-task__item-inner">
											<h5 class="task">
												<a href="#">Create new task for Dashboard</a>
											</h5>
											<span class="time">11:00 AM</span>
										</div>
									</div>
								</div>
								<div class="au-task__footer">
									<button class="btn btn-primary au-btn js-load-btn">load more</button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
							<div class="au-card-title" style="background-image:url('images/bg-title-02.jpg');">
								<div class="bg-overlay bg-overlay--black"></div>
								<h3>
									<i class="zmdi zmdi-comment-text"></i>Notifications</h3>
							</div>
							<div class="au-inbox-wrap js-inbox-wrap">
								<div class="au-message js-list-load">
									<div class="au-message__noti">
										<p>You Have
											<span>2</span>

											new Notification
										</p>
									</div>
									<div class="au-message-list">
										<div class="au-message__item unread">
											<div class="au-message__item-inner">
												<div class="au-message__item-text">
													<div class="avatar-wrap">
														<div class="avatar">
															<img src="{{url('/')}}/public/admin/assets-customer/images/icon/avatar-02.jpg" alt="John Smith">
														</div>
													</div>
													<div class="text">
														<h5 class="name">John Smith</h5>
														<p>Have sent a photo</p>
													</div>
												</div>
												<div class="au-message__item-time">
													<span>12 Min ago</span>
												</div>
											</div>
										</div>
										<div class="au-message__item unread">
											<div class="au-message__item-inner">
												<div class="au-message__item-text">
													<div class="avatar-wrap online">
														<div class="avatar">
															<img src="{{url('/')}}/public/admin/assets-customer/images/icon/avatar-03.jpg" alt="Nicholas Martinez">
														</div>
													</div>
													<div class="text">
														<h5 class="name">Nicholas Martinez</h5>
														<p>You are now connected on message</p>
													</div>
												</div>
												<div class="au-message__item-time">
													<span>11:00 PM</span>
												</div>
											</div>
										</div>
										<div class="au-message__item">
											<div class="au-message__item-inner">
												<div class="au-message__item-text">
													<div class="avatar-wrap online">
														<div class="avatar">
															<img src="{{url('/')}}/public/admin/assets-customer/images/icon/avatar-04.jpg" alt="Michelle Sims">
														</div>
													</div>
													<div class="text">
														<h5 class="name">Michelle Sims</h5>
														<p>Lorem ipsum dolor sit amet</p>
													</div>
												</div>
												<div class="au-message__item-time">
													<span>Yesterday</span>
												</div>
											</div>
										</div>
										<div class="au-message__item">
											<div class="au-message__item-inner">
												<div class="au-message__item-text">
													<div class="avatar-wrap">
														<div class="avatar">
															<img src="{{url('/')}}/public/admin/assets-customer/images/icon/avatar-05.jpg" alt="Michelle Sims">
														</div>
													</div>
													<div class="text">
														<h5 class="name">Michelle Sims</h5>
														<p>Purus feugiat finibus</p>
													</div>
												</div>
												<div class="au-message__item-time">
													<span>Sunday</span>
												</div>
											</div>
										</div>
										<div class="au-message__item js-load-item" style="display: none;">
											<div class="au-message__item-inner">
												<div class="au-message__item-text">
													<div class="avatar-wrap online">
														<div class="avatar">
															<img src="{{url('/')}}/public/admin/assets-customer/images/icon/avatar-04.jpg" alt="Michelle Sims">
														</div>
													</div>
													<div class="text">
														<h5 class="name">Michelle Sims</h5>
														<p>Lorem ipsum dolor sit amet</p>
													</div>
												</div>
												<div class="au-message__item-time">
													<span>Yesterday</span>
												</div>
											</div>
										</div>
										<div class="au-message__item js-load-item" style="display: none;">
											<div class="au-message__item-inner">
												<div class="au-message__item-text">
													<div class="avatar-wrap">
														<div class="avatar">
															<img src="{{url('/')}}/public/admin/assets-customer/images/icon/avatar-05.jpg" alt="Michelle Sims">
														</div>
													</div>
													<div class="text">
														<h5 class="name">Michelle Sims</h5>
														<p>Purus feugiat finibus</p>
													</div>
												</div>
												<div class="au-message__item-time">
													<span>Sunday</span>
												</div>
											</div>
										</div>
									</div>
									<div class="au-message__footer">
										<button class="btn btn-primary au-btn js-load-btn">load more</button>
									</div>
								</div>
								<div class="au-chat">
									<div class="au-chat__title">
										<div class="au-chat-info">
											<div class="avatar-wrap online">
												<div class="avatar avatar--small">
													<img src="{{url('/')}}/public/admin/assets-customer/images/icon/avatar-02.jpg" alt="John Smith">
												</div>
											</div>
											<span class="nick">
												<a href="#">John Smith</a>
											</span>
										</div>
									</div>
									<div class="au-chat__content">
										<div class="recei-mess-wrap">
											<span class="mess-time">12 Min ago</span>
											<div class="recei-mess__inner">
												<div class="avatar avatar--tiny">
													<img src="{{url('/')}}/public/admin/assets-customer/images/icon/avatar-02.jpg" alt="John Smith">
												</div>
												<div class="recei-mess-list">
													<div class="recei-mess">Lorem ipsum dolor sit amet, consectetur adipiscing elit non iaculis</div>
													<div class="recei-mess">Donec tempor, sapien ac viverra</div>
												</div>
											</div>
										</div>
										<div class="send-mess-wrap">
											<span class="mess-time">30 Sec ago</span>
											<div class="send-mess__inner">
												<div class="send-mess-list">
													<div class="send-mess">Lorem ipsum dolor sit amet, consectetur adipiscing elit non iaculis</div>
												</div>
											</div>
										</div>
									</div>
									<div class="au-chat-textfield">
										<form class="au-form-icon">
											<input class="au-input au-input--full au-input--h65" type="text" placeholder="Type a message">
											<button class="au-input-icon">
												<i class="zmdi zmdi-camera"></i>
											</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>	
				
				<div class="week-schedule">
					<h3 class="mb-2">Week Schedule</h3>
					<div class="row">
						<div class="col-md-6 mt-2">
	                    	<div class="card">
								<div class="card-body">
									<div class="schedule-box">
										<div class="profile-part">
											<div class="avatar">
												<a href=""><img src="{{url('/')}}/public/admin/assets-customer/images/customer-dp.jpg" alt="img" class="img-responsive"></a>
											</div>
											<p>Maria Smith</p>
											<div class="map">
												<a href=""><img src="{{url('/')}}/public/admin/assets-customer/images/map-img.jpg" alt="map" class="img-responsive"></a>
											</div>
										</div>
										<strong>Helper: <span>Maria Smith</span></strong><br>
										<strong>Clean Package:</strong> <span> Standard Gold</span> <br>
										<strong>Visit Date &amp; Time </strong>
										<p>12/09/2018 at 5:00</p>
										<strong>Clean Type:</strong> <span> Domestic</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 mt-2">
	                    	<div class="card">
								<div class="card-body">
									<div class="schedule-box">
										<div class="profile-part">
											<div class="avatar">
												<a href=""><img src="{{url('/')}}/public/admin/assets-customer/images/customer-dp.jpg" alt="img" class="img-responsive"></a>
											</div>
											<p>Maria Smith</p>
											<div class="map">
												<a href=""><img src="{{url('/')}}/public/admin/assets-customer/images/map-img.jpg" alt="map" class="img-responsive"></a>
											</div>
										</div>
										<strong>Helper: <span>Maria Smith</span></strong><br>
										<strong>Clean Package:</strong> <span> Standard Gold</span> <br>
										<strong>Visit Date &amp; Time </strong>
										<p>12/09/2018 at 5:00</p>
										<strong>Clean Type:</strong> <span> Domestic</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection