@extends('helper.layouts.app')

@section('content')
	<!-- HEADER DESKTOP-->
	<header class="header-desktop">
		<div class="section__content section__content--p30">
			<div class="container-fluid">
				<div class="header-wrap">
					<div class="form-header">
						<ul>
							<li>
								<a href="call-now.html" class="btn btn-primary">Call Now</a>
							</li>
						</ul>
					</div>
					<div class="not-active text-danger">
						<i class="fas fa-circle"></i> 
						Not Active
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
									<img src="{{url('/')}}/public/admin/assets-helper/images/customer-dp.jpg" alt="Maria" />
								</div>
								<div class="content">
									<a class="js-acc-btn" href="#">Maria Smith</a>
								</div>
								<div class="account-dropdown js-dropdown">
									<div class="info clearfix">
										<div class="image">
											<a href="my-account.html">
												<img src="{{url('/')}}/public/admin/assets-helper/images/icon/avatar-01.jpg" alt="John Doe" />
											</a>
										</div>
										<div class="content">
											<h5 class="name">
												<a href="my-account.html">john doe</a>
											</h5>
											<span class="email">johndoe@example.com</span>
											<span class="email">020 3092 6664</span><br>
											<span class="email">Newington, Greater London</span>
										</div>
									</div>
									<div class="account-dropdown__body">
										<div class="account-dropdown__item">
											<!--my-account.html-->
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
										<a href="my-complaints.html"><span>Open Requests</span></a>
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
										<span>Reward Points</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row m-t-25">
					<div class="col-sm-12">
						<div class="accordion" id="accordionExample">
							<div class="card">	
								<div class="card-header">
		                           <h4 class="mb-0 pull-left">Cleaning Availibility (Choose your availibility for cleaning service)</h4>
		                           <a href="find-post-code.html" class="btn-primary btn pull-right">Find Postcode</a>
		                        </div>										
									<div class="card-body">
			                           <div class="table-responsive">
			                               <table class="table table-striped table-bordered availability-table">
			                                <thead> 
			                                    <tr> 
			                                        <th width="120">Days</th> 
			                                        <th>Available Times</th>         
			                                    </tr> 
			                                </thead>
			                                <tbody> 
			                                    <tr> 
			                                        <th>Mon</th> 
			                                        <td>
			                                            <div class="btn-group btn-group-toggle d-flex" data-toggle="buttons">
			                                              <label class="btn btn-outline-primary col active collapsed" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
			                                                <input type="radio" name="options" id="option1" autocomplete="off" checked=""> 04:00  to 08:00
			                                              </label>
			                                              <label class="btn btn-outline-primary col">
			                                                <input type="radio" name="options" id="option2" autocomplete="off"> 08:00 to 12:00
			                                              </label>
			                                              <label class="btn btn-outline-primary col">
			                                                <input type="radio" name="options" id="option3" autocomplete="off"> 12:00 to 16:00
			                                              </label>
			                                              <label class="btn btn-outline-primary col">
			                                                <input type="radio" name="options" id="option4" autocomplete="off"> 16:00 to 20:00
			                                              </label>
			                                              <label class="btn btn-outline-primary col">
			                                                <input type="radio" name="options" id="option5" autocomplete="off"> 20:00 to 24:00
			                                              </label>
			                                            </div>

			                                            <div class="collapse" id="collapseExample" style="">
			                                              <div class="card d-flex flex-row sub-available">
			                                                <ul class="week-days">
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox4">
			                                                       <label for="checkbox4">04</label>
			                                                    </li> 
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox43">
			                                                       <label for="checkbox43">&nbsp;</label>
			                                                    </li> 
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox5">
			                                                       <label for="checkbox5">05</label>
			                                                    </li>
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox53">
			                                                       <label for="checkbox53">&nbsp;</label>
			                                                    </li>
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox6">
			                                                       <label for="checkbox6">06</label>
			                                                    </li>
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox63">
			                                                       <label for="checkbox63">&nbsp;</label>
			                                                    </li>
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox7">
			                                                       <label for="checkbox7">07</label>
			                                                    </li>
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox73">
			                                                       <label for="checkbox73">&nbsp;</label>
			                                                    </li>
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox8">
			                                                       <label for="checkbox8">08</label>
			                                                    </li>
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox83">
			                                                       <label for="checkbox83">&nbsp;</label>
			                                                    </li>
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox9">
			                                                       <label for="checkbox9">09</label>
			                                                    </li>
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox93">
			                                                       <label for="checkbox93">&nbsp;</label>
			                                                    </li>
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox10">
			                                                       <label for="checkbox10">10</label>
			                                                    </li>
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox103">
			                                                       <label for="checkbox103">&nbsp;</label>
			                                                    </li>
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox11">
			                                                       <label for="checkbox11">11</label>
			                                                    </li>
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox113">
			                                                       <label for="checkbox113">&nbsp;</label>
			                                                    </li>
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox12">
			                                                       <label for="checkbox12">12</label>
			                                                    </li>
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox123">
			                                                       <label for="checkbox123">&nbsp;</label>
			                                                    </li>
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox13">
			                                                       <label for="checkbox13">13</label>
			                                                    </li>
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox133">
			                                                       <label for="checkbox133">&nbsp;</label>
			                                                    </li>
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox14">
			                                                       <label for="checkbox14">14</label>
			                                                    </li>
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox143">
			                                                       <label for="checkbox143">&nbsp;</label>
			                                                    </li>
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox15">
			                                                       <label for="checkbox15">15</label>
			                                                    </li>
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox153">
			                                                       <label for="checkbox153">&nbsp;</label>
			                                                    </li>
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox16">
			                                                       <label for="checkbox16">16</label>
			                                                    </li>
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox163">
			                                                       <label for="checkbox163">&nbsp;</label>
			                                                    </li>
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox17">
			                                                       <label for="checkbox17">17</label>
			                                                    </li>
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox173">
			                                                       <label for="checkbox173">&nbsp;</label>
			                                                    </li>
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox18">
			                                                       <label for="checkbox18">18</label>
			                                                    </li>
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox183">
			                                                       <label for="checkbox183">&nbsp;</label>
			                                                    </li>
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox19">
			                                                       <label for="checkbox19">19</label>
			                                                    </li>
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox193">
			                                                       <label for="checkbox193">&nbsp;</label>
			                                                    </li>
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox20">
			                                                       <label for="checkbox20">20</label>
			                                                    </li>
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox203">
			                                                       <label for="checkbox203">&nbsp;</label>
			                                                    </li>
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox21">
			                                                       <label for="checkbox21">21</label>
			                                                    </li>
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox213">
			                                                       <label for="checkbox213">&nbsp;</label>
			                                                    </li>
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox22">
			                                                       <label for="checkbox22">22</label>
			                                                    </li>
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox223">
			                                                       <label for="checkbox223">&nbsp;</label>
			                                                    </li>
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox23">
			                                                       <label for="checkbox23">23</label>
			                                                    </li>      
			                                                    <li>
			                                                       <input type="checkbox" id="checkbox233">
			                                                       <label for="checkbox233">&nbsp;</label>
			                                                    </li>                                            
			                                                </ul>         
			                                              </div>                                              
			                                            </div>

			                                        </td>                       
			                                    </tr> 
			                                    <tr> 
			                                        <th>Tue</th> 
			                                        <td>
			                                            <div class="btn-group btn-group-toggle d-flex" data-toggle="buttons">
			                                              <label class="btn btn-outline-primary col collapsed active" data-toggle="collapse" data-target="#Tue-coll" aria-expanded="false" aria-controls="Tue-coll">
			                                                <input type="radio" name="options" id="option1" autocomplete="off" checked=""> 04:00  to 08:00
			                                              </label>
			                                              <label class="btn btn-outline-primary col">
			                                                <input type="radio" name="options" id="option2" autocomplete="off"> 08:00 to 12:00
			                                              </label>
			                                              <label class="btn btn-outline-primary col">
			                                                <input type="radio" name="options" id="option3" autocomplete="off"> 12:00 to 16:00
			                                              </label>
			                                              <label class="btn btn-outline-primary col">
			                                                <input type="radio" name="options" id="option4" autocomplete="off"> 16:00 to 20:00
			                                              </label>
			                                              <label class="btn btn-outline-primary col">
			                                                <input type="radio" name="options" id="option5" autocomplete="off"> 20:00 to 24:00
			                                              </label>
			                                            </div>
			                                            <div class="collapse" id="Tue-coll" style="">
			                                              <div class="card d-flex flex-row sub-available">
			                                                 <ul class="week-days">
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue4" checked="">
			                                                           <label for="checkbox-tue4">04</label>
			                                                        </li> 
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue43" checked="">
			                                                           <label for="checkbox-tue43">&nbsp;</label>
			                                                        </li> 
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue5" checked="">
			                                                           <label for="checkbox-tue5">05</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue53" checked="">
			                                                           <label for="checkbox-tue53">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue6" checked="">
			                                                           <label for="checkbox-tue6">06</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue63" checked="">
			                                                           <label for="checkbox-tue63">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue7" checked="">
			                                                           <label for="checkbox-tue7">07</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue73">
			                                                           <label for="checkbox-tue73">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue8">
			                                                           <label for="checkbox-tue8">08</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue83">
			                                                           <label for="checkbox-tue83">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue9">
			                                                           <label for="checkbox-tue9">09</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue93">
			                                                           <label for="checkbox-tue93">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue10">
			                                                           <label for="checkbox-tue10">10</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue103">
			                                                           <label for="checkbox-tue103">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue11">
			                                                           <label for="checkbox-tue11">11</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue113">
			                                                           <label for="checkbox-tue113">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue12">
			                                                           <label for="checkbox-tue12">12</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue123">
			                                                           <label for="checkbox-tue123">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue13">
			                                                           <label for="checkbox-tue13">13</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue133">
			                                                           <label for="checkbox-tue133">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue14">
			                                                           <label for="checkbox-tue14">14</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue143">
			                                                           <label for="checkbox-tue143">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue15">
			                                                           <label for="checkbox-tue15">15</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue153">
			                                                           <label for="checkbox-tue153">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue16">
			                                                           <label for="checkbox-tue16">16</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue163">
			                                                           <label for="checkbox-tue163">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue17">
			                                                           <label for="checkbox-tue17">17</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue173">
			                                                           <label for="checkbox-tue173">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue18">
			                                                           <label for="checkbox-tue18">18</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue183">
			                                                           <label for="checkbox-tue183">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue19">
			                                                           <label for="checkbox-tue19">19</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue193">
			                                                           <label for="checkbox-tue193">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue20">
			                                                           <label for="checkbox-tue20">20</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue203">
			                                                           <label for="checkbox-tue203">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue21">
			                                                           <label for="checkbox-tue21">21</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue213">
			                                                           <label for="checkbox-tue213">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue22">
			                                                           <label for="checkbox-tue22">22</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue223">
			                                                           <label for="checkbox-tue223">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue23">
			                                                           <label for="checkbox-tue23">23</label>
			                                                        </li>      
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-tue233">
			                                                           <label for="checkbox-tue233">&nbsp;</label>
			                                                        </li>                                            
			                                                </ul>                                                                   
			                                              </div>
			                                              <table class="table table-striped table-bordered find-postcode-table">
			                                                <thead> 
			                                                    <tr> 
			                                                        <th width="120">District</th> 
			                                                        <th>Expanded Postcodes</th>         
			                                                    </tr> 
			                                                </thead>
			                                                <tbody> 
			                                                    <tr> 
			                                                        <th>
			                                                            <ul class="week-days">
			                                                                <li>
			                                                                    <input type="checkbox" id="e-0" checked="">
			                                                                    <label for="e-0">E</label>
			                                                                </li>
			                                                            </ul>
			                                                        </th> 
			                                                        <td>
			                                                            <div class="card district-selection">
			                                                                <ul class="week-days">
			                                                                  <li>
			                                                                     <input type="checkbox" id="e-1" checked="">
			                                                                     <label for="e-1">E1</label>
			                                                                  </li> 
			                                                                  <li>
			                                                                     <input type="checkbox" id="e-2" checked="">
			                                                                     <label for="e-2">E2</label>
			                                                                  </li> 
			                                                                  <li>
			                                                                     <input type="checkbox" id="e-3" checked="">
			                                                                     <label for="e-3">E3</label>
			                                                                  </li>                                                                 
			                                                                </ul>                                                                  
			                                                              </div>
			                                                        </td>                       
			                                                    </tr>     
			                                                </tbody>
			                                               </table>

			                                               <a class="btn btn-secondary" href="find-post-code.html">Edit Postcode</a>
			                                            </div>
			                                        </td>                       
			                                    </tr> 

			                                    <tr> 
			                                        <th>Wed</th> 
			                                        <td>
			                                            <div class="btn-group btn-group-toggle d-flex" data-toggle="buttons">
			                                              <label class="btn btn-outline-primary col" data-toggle="collapse" data-target="#Wed-coll" aria-expanded="false" aria-controls="Wed-coll">
			                                                <input type="radio" name="options" id="option1" autocomplete="off" checked=""> 04:00  to 08:00
			                                              </label>
			                                              <label class="btn btn-outline-primary col">
			                                                <input type="radio" name="options" id="option2" autocomplete="off"> 08:00 to 12:00
			                                              </label>
			                                              <label class="btn btn-outline-primary col">
			                                                <input type="radio" name="options" id="option3" autocomplete="off"> 12:00 to 16:00
			                                              </label>
			                                              <label class="btn btn-outline-primary col">
			                                                <input type="radio" name="options" id="option4" autocomplete="off"> 16:00 to 20:00
			                                              </label>
			                                              <label class="btn btn-outline-primary col">
			                                                <input type="radio" name="options" id="option5" autocomplete="off"> 20:00 to 24:00
			                                              </label>
			                                            </div>
			                                            <div class="collapse" id="Wed-coll">
			                                              <div class="card d-flex flex-row sub-available">
			                                                  <ul class="week-days">
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed4">
			                                                           <label for="checkbox-wed4">04</label>
			                                                        </li> 
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed43">
			                                                           <label for="checkbox-wed43">&nbsp;</label>
			                                                        </li> 
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed5">
			                                                           <label for="checkbox-wed5">05</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed53">
			                                                           <label for="checkbox-wed53">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed6">
			                                                           <label for="checkbox-wed6">06</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed63">
			                                                           <label for="checkbox-wed63">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed7">
			                                                           <label for="checkbox-wed7">07</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed73">
			                                                           <label for="checkbox-wed73">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed8">
			                                                           <label for="checkbox-wed8">08</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed83">
			                                                           <label for="checkbox-wed83">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed9">
			                                                           <label for="checkbox-wed9">09</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed93">
			                                                           <label for="checkbox-wed93">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed10">
			                                                           <label for="checkbox-wed10">10</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed103">
			                                                           <label for="checkbox-wed103">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed11">
			                                                           <label for="checkbox-wed11">11</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed113">
			                                                           <label for="checkbox-wed113">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed12">
			                                                           <label for="checkbox-wed12">12</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed123">
			                                                           <label for="checkbox-wed123">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed13">
			                                                           <label for="checkbox-wed13">13</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed133">
			                                                           <label for="checkbox-wed133">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed14">
			                                                           <label for="checkbox-wed14">14</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed143">
			                                                           <label for="checkbox-wed143">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed15">
			                                                           <label for="checkbox-wed15">15</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed153">
			                                                           <label for="checkbox-wed153">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed16">
			                                                           <label for="checkbox-wed16">16</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed163">
			                                                           <label for="checkbox-wed163">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed17">
			                                                           <label for="checkbox-wed17">17</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed173">
			                                                           <label for="checkbox-wed173">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed18">
			                                                           <label for="checkbox-wed18">18</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed183">
			                                                           <label for="checkbox-wed183">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed19">
			                                                           <label for="checkbox-wed19">19</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed193">
			                                                           <label for="checkbox-wed193">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed20">
			                                                           <label for="checkbox-wed20">20</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed203">
			                                                           <label for="checkbox-wed203">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed21">
			                                                           <label for="checkbox-wed21">21</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed213">
			                                                           <label for="checkbox-wed213">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed22">
			                                                           <label for="checkbox-wed22">22</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed223">
			                                                           <label for="checkbox-wed223">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed23">
			                                                           <label for="checkbox-wed23">23</label>
			                                                        </li>      
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-wed233">
			                                                           <label for="checkbox-wed233">&nbsp;</label>
			                                                        </li>                                            
			                                                </ul>                                                                   
			                                              </div>
			                                            </div>
			                                        </td>                       
			                                    </tr> 

			                                    <tr> 
			                                        <th>Thu</th> 
			                                        <td>
			                                            <div class="btn-group btn-group-toggle d-flex" data-toggle="buttons">
			                                              <label class="btn btn-outline-primary col" data-toggle="collapse" data-target="#Thur-coll" aria-expanded="false" aria-controls="Thur-coll">
			                                                <input type="radio" name="options" id="option1" autocomplete="off" checked=""> 04:00  to 08:00
			                                              </label>
			                                              <label class="btn btn-outline-primary col">
			                                                <input type="radio" name="options" id="option2" autocomplete="off"> 08:00 to 12:00
			                                              </label>
			                                              <label class="btn btn-outline-primary col">
			                                                <input type="radio" name="options" id="option3" autocomplete="off"> 12:00 to 16:00
			                                              </label>
			                                              <label class="btn btn-outline-primary col">
			                                                <input type="radio" name="options" id="option4" autocomplete="off"> 16:00 to 20:00
			                                              </label>
			                                              <label class="btn btn-outline-primary col">
			                                                <input type="radio" name="options" id="option5" autocomplete="off"> 20:00 to 24:00
			                                              </label>
			                                            </div>
			                                            <div class="collapse" id="Thur-coll">
			                                              <div class="card d-flex flex-row sub-available">
			                                                   <ul class="week-days">
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur4">
			                                                           <label for="checkbox-thur4">04</label>
			                                                        </li> 
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur43">
			                                                           <label for="checkbox-thur43">&nbsp;</label>
			                                                        </li> 
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur5">
			                                                           <label for="checkbox-thur5">05</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur53">
			                                                           <label for="checkbox-thur53">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur6">
			                                                           <label for="checkbox-thur6">06</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur63">
			                                                           <label for="checkbox-thur63">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur7">
			                                                           <label for="checkbox-thur7">07</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur73">
			                                                           <label for="checkbox-thur73">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur8">
			                                                           <label for="checkbox-thur8">08</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur83">
			                                                           <label for="checkbox-thur83">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur9">
			                                                           <label for="checkbox-thur9">09</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur93">
			                                                           <label for="checkbox-thur93">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur10">
			                                                           <label for="checkbox-thur10">10</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur103">
			                                                           <label for="checkbox-thur103">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur11">
			                                                           <label for="checkbox-thur11">11</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur113">
			                                                           <label for="checkbox-thur113">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur12">
			                                                           <label for="checkbox-thur12">12</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur123">
			                                                           <label for="checkbox-thur123">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur13">
			                                                           <label for="checkbox-thur13">13</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur133">
			                                                           <label for="checkbox-thur133">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur14">
			                                                           <label for="checkbox-thur14">14</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur143">
			                                                           <label for="checkbox-thur143">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur15">
			                                                           <label for="checkbox-thur15">15</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur153">
			                                                           <label for="checkbox-thur153">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur16">
			                                                           <label for="checkbox-thur16">16</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur163">
			                                                           <label for="checkbox-thur163">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur17">
			                                                           <label for="checkbox-thur17">17</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur173">
			                                                           <label for="checkbox-thur173">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur18">
			                                                           <label for="checkbox-thur18">18</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur183">
			                                                           <label for="checkbox-thur183">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur19">
			                                                           <label for="checkbox-thur19">19</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur193">
			                                                           <label for="checkbox-thur193">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur20">
			                                                           <label for="checkbox-thur20">20</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur203">
			                                                           <label for="checkbox-thur203">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur21">
			                                                           <label for="checkbox-thur21">21</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur213">
			                                                           <label for="checkbox-thur213">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur22">
			                                                           <label for="checkbox-thur22">22</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur223">
			                                                           <label for="checkbox-thur223">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur23">
			                                                           <label for="checkbox-thur23">23</label>
			                                                        </li>      
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-thur233">
			                                                           <label for="checkbox-thur233">&nbsp;</label>
			                                                        </li>                                            
			                                                </ul>                                                                   
			                                              </div>
			                                            </div>
			                                        </td>                       
			                                    </tr> 

			                                    <tr> 
			                                        <th>Fri</th> 
			                                        <td>
			                                            <div class="btn-group btn-group-toggle d-flex" data-toggle="buttons">
			                                              <label class="btn btn-outline-primary col" data-toggle="collapse" data-target="#Fri-coll" aria-expanded="false" aria-controls="Fri-coll">
			                                                <input type="radio" name="options" id="option1" autocomplete="off" checked=""> 04:00  to 08:00
			                                              </label>
			                                              <label class="btn btn-outline-primary col">
			                                                <input type="radio" name="options" id="option2" autocomplete="off"> 08:00 to 12:00
			                                              </label>
			                                              <label class="btn btn-outline-primary col">
			                                                <input type="radio" name="options" id="option3" autocomplete="off"> 12:00 to 16:00
			                                              </label>
			                                              <label class="btn btn-outline-primary col">
			                                                <input type="radio" name="options" id="option4" autocomplete="off"> 16:00 to 20:00
			                                              </label>
			                                              <label class="btn btn-outline-primary col">
			                                                <input type="radio" name="options" id="option5" autocomplete="off"> 20:00 to 24:00
			                                              </label>
			                                            </div>
			                                            <div class="collapse" id="Fri-coll">
			                                              <div class="card d-flex flex-row sub-available">
			                                                    <ul class="week-days">
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri4">
			                                                           <label for="checkbox-fri4">04</label>
			                                                        </li> 
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri43">
			                                                           <label for="checkbox-fri43">&nbsp;</label>
			                                                        </li> 
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri5">
			                                                           <label for="checkbox-fri5">05</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri53">
			                                                           <label for="checkbox-fri53">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri6">
			                                                           <label for="checkbox-fri6">06</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri63">
			                                                           <label for="checkbox-fri63">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri7">
			                                                           <label for="checkbox-fri7">07</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri73">
			                                                           <label for="checkbox-fri73">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri8">
			                                                           <label for="checkbox-fri8">08</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri83">
			                                                           <label for="checkbox-fri83">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri9">
			                                                           <label for="checkbox-fri9">09</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri93">
			                                                           <label for="checkbox-fri93">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri10">
			                                                           <label for="checkbox-fri10">10</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri103">
			                                                           <label for="checkbox-fri103">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri11">
			                                                           <label for="checkbox-fri11">11</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri113">
			                                                           <label for="checkbox-fri113">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri12">
			                                                           <label for="checkbox-fri12">12</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri123">
			                                                           <label for="checkbox-fri123">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri13">
			                                                           <label for="checkbox-fri13">13</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri133">
			                                                           <label for="checkbox-fri133">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri14">
			                                                           <label for="checkbox-fri14">14</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri143">
			                                                           <label for="checkbox-fri143">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri15">
			                                                           <label for="checkbox-fri15">15</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri153">
			                                                           <label for="checkbox-fri153">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri16">
			                                                           <label for="checkbox-fri16">16</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri163">
			                                                           <label for="checkbox-fri163">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri17">
			                                                           <label for="checkbox-fri17">17</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri173">
			                                                           <label for="checkbox-fri173">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri18">
			                                                           <label for="checkbox-fri18">18</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri183">
			                                                           <label for="checkbox-fri183">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri19">
			                                                           <label for="checkbox-fri19">19</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri193">
			                                                           <label for="checkbox-fri193">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri20">
			                                                           <label for="checkbox-fri20">20</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri203">
			                                                           <label for="checkbox-fri203">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri21">
			                                                           <label for="checkbox-fri21">21</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri213">
			                                                           <label for="checkbox-fri213">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri22">
			                                                           <label for="checkbox-fri22">22</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri223">
			                                                           <label for="checkbox-fri223">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri23">
			                                                           <label for="checkbox-fri23">23</label>
			                                                        </li>      
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-fri233">
			                                                           <label for="checkbox-fri233">&nbsp;</label>
			                                                        </li>                                            
			                                                </ul>                                                                    
			                                              </div>
			                                            </div>
			                                        </td>                       
			                                    </tr> 

			                                    <tr> 
			                                        <th>Sat</th> 
			                                        <td>
			                                            <div class="btn-group btn-group-toggle d-flex" data-toggle="buttons">
			                                              <label class="btn btn-outline-primary col" data-toggle="collapse" data-target="#Sat-coll" aria-expanded="false" aria-controls="Sat-coll">
			                                                <input type="radio" name="options" id="option1" autocomplete="off" checked=""> 04:00  to 08:00
			                                              </label>
			                                              <label class="btn btn-outline-primary col">
			                                                <input type="radio" name="options" id="option2" autocomplete="off"> 08:00 to 12:00
			                                              </label>
			                                              <label class="btn btn-outline-primary col">
			                                                <input type="radio" name="options" id="option3" autocomplete="off"> 12:00 to 16:00
			                                              </label>
			                                              <label class="btn btn-outline-primary col">
			                                                <input type="radio" name="options" id="option4" autocomplete="off"> 16:00 to 20:00
			                                              </label>
			                                              <label class="btn btn-outline-primary col">
			                                                <input type="radio" name="options" id="option5" autocomplete="off"> 20:00 to 24:00
			                                              </label>
			                                            </div>
			                                            <div class="collapse" id="Sat-coll">
			                                              <div class="card d-flex flex-row sub-available">
			                                                    <ul class="week-days">
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat4">
			                                                           <label for="checkbox-sat4">04</label>
			                                                        </li> 
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat43">
			                                                           <label for="checkbox-sat43">&nbsp;</label>
			                                                        </li> 
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat5">
			                                                           <label for="checkbox-sat5">05</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat53">
			                                                           <label for="checkbox-sat53">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat6">
			                                                           <label for="checkbox-sat6">06</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat63">
			                                                           <label for="checkbox-sat63">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat7">
			                                                           <label for="checkbox-sat7">07</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat73">
			                                                           <label for="checkbox-sat73">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat8">
			                                                           <label for="checkbox-sat8">08</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat83">
			                                                           <label for="checkbox-sat83">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat9">
			                                                           <label for="checkbox-sat9">09</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat93">
			                                                           <label for="checkbox-sat93">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat10">
			                                                           <label for="checkbox-sat10">10</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat103">
			                                                           <label for="checkbox-sat103">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat11">
			                                                           <label for="checkbox-sat11">11</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat113">
			                                                           <label for="checkbox-sat113">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat12">
			                                                           <label for="checkbox-sat12">12</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat123">
			                                                           <label for="checkbox-sat123">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat13">
			                                                           <label for="checkbox-sat13">13</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat133">
			                                                           <label for="checkbox-sat133">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat14">
			                                                           <label for="checkbox-sat14">14</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat143">
			                                                           <label for="checkbox-sat143">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat15">
			                                                           <label for="checkbox-sat15">15</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat153">
			                                                           <label for="checkbox-sat153">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat16">
			                                                           <label for="checkbox-sat16">16</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat163">
			                                                           <label for="checkbox-sat163">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat17">
			                                                           <label for="checkbox-sat17">17</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat173">
			                                                           <label for="checkbox-sat173">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat18">
			                                                           <label for="checkbox-sat18">18</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat183">
			                                                           <label for="checkbox-sat183">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat19">
			                                                           <label for="checkbox-sat19">19</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat193">
			                                                           <label for="checkbox-sat193">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat20">
			                                                           <label for="checkbox-sat20">20</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat203">
			                                                           <label for="checkbox-sat203">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat21">
			                                                           <label for="checkbox-sat21">21</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat213">
			                                                           <label for="checkbox-sat213">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat22">
			                                                           <label for="checkbox-sat22">22</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat223">
			                                                           <label for="checkbox-sat223">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat23">
			                                                           <label for="checkbox-sat23">23</label>
			                                                        </li>      
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sat233">
			                                                           <label for="checkbox-sat233">&nbsp;</label>
			                                                        </li>                                            
			                                                </ul>                                                                     
			                                              </div>
			                                            </div>
			                                        </td>                       
			                                    </tr>

			                                    <tr> 
			                                        <th>Sun</th> 
			                                        <td>
			                                            <div class="btn-group btn-group-toggle d-flex" data-toggle="buttons">
			                                              <label class="btn btn-outline-primary col" data-toggle="collapse" data-target="#Sun-coll" aria-expanded="false" aria-controls="Sun-coll">
			                                                <input type="radio" name="options" id="option1" autocomplete="off" checked=""> 04:00  to 08:00
			                                              </label>
			                                              <label class="btn btn-outline-primary col">
			                                                <input type="radio" name="options" id="option2" autocomplete="off"> 08:00 to 12:00
			                                              </label>
			                                              <label class="btn btn-outline-primary col">
			                                                <input type="radio" name="options" id="option3" autocomplete="off"> 12:00 to 16:00
			                                              </label>
			                                              <label class="btn btn-outline-primary col">
			                                                <input type="radio" name="options" id="option4" autocomplete="off"> 16:00 to 20:00
			                                              </label>
			                                              <label class="btn btn-outline-primary col">
			                                                <input type="radio" name="options" id="option5" autocomplete="off"> 20:00 to 24:00
			                                              </label>
			                                            </div>
			                                            <div class="collapse" id="Sun-coll">
			                                              <div class="card d-flex flex-row sub-available">
			                                                    <ul class="week-days">
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun4">
			                                                           <label for="checkbox-sun4">04</label>
			                                                        </li> 
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun43">
			                                                           <label for="checkbox-sun43">&nbsp;</label>
			                                                        </li> 
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun5">
			                                                           <label for="checkbox-sun5">05</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun53">
			                                                           <label for="checkbox-sun53">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun6">
			                                                           <label for="checkbox-sun6">06</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun63">
			                                                           <label for="checkbox-sun63">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun7">
			                                                           <label for="checkbox-sun7">07</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun73">
			                                                           <label for="checkbox-sun73">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun8">
			                                                           <label for="checkbox-sun8">08</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun83">
			                                                           <label for="checkbox-sun83">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun9">
			                                                           <label for="checkbox-sun9">09</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun93">
			                                                           <label for="checkbox-sun93">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun10">
			                                                           <label for="checkbox-sun10">10</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun103">
			                                                           <label for="checkbox-sun103">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun11">
			                                                           <label for="checkbox-sun11">11</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun113">
			                                                           <label for="checkbox-sun113">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun12">
			                                                           <label for="checkbox-sun12">12</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun123">
			                                                           <label for="checkbox-sun123">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun13">
			                                                           <label for="checkbox-sun13">13</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun133">
			                                                           <label for="checkbox-sun133">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun14">
			                                                           <label for="checkbox-sun14">14</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun143">
			                                                           <label for="checkbox-sun143">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun15">
			                                                           <label for="checkbox-sun15">15</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun153">
			                                                           <label for="checkbox-sun153">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun16">
			                                                           <label for="checkbox-sun16">16</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun163">
			                                                           <label for="checkbox-sun163">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun17">
			                                                           <label for="checkbox-sun17">17</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun173">
			                                                           <label for="checkbox-sun173">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun18">
			                                                           <label for="checkbox-sun18">18</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun183">
			                                                           <label for="checkbox-sun183">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun19">
			                                                           <label for="checkbox-sun19">19</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun193">
			                                                           <label for="checkbox-sun193">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun20">
			                                                           <label for="checkbox-sun20">20</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun203">
			                                                           <label for="checkbox-sun203">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun21">
			                                                           <label for="checkbox-sun21">21</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun213">
			                                                           <label for="checkbox-sun213">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun22">
			                                                           <label for="checkbox-sun22">22</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun223">
			                                                           <label for="checkbox-sun223">&nbsp;</label>
			                                                        </li>
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun23">
			                                                           <label for="checkbox-sun23">23</label>
			                                                        </li>      
			                                                        <li>
			                                                           <input type="checkbox" id="checkbox-sun233">
			                                                           <label for="checkbox-sun233">&nbsp;</label>
			                                                        </li>                                            
			                                                </ul>                                                                    
			                                              </div>
			                                            </div>
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
				<div class="row m-t-25">
					<div class="col-md-6">
						<div class="card">
							<div class="card-header">
								<h4>Week Schedule</h4>
							</div>
							<div class="card-body">
								<div class="week-schedule">
									<div class="row">
										<div class="col-md-12">
											<div class="schedule-box">
												<div class="profile-part">
													<div class="avatar">
														<a href=""><img src="{{url('/')}}/public/admin/assets-helper/images/admin-pic.jpg" alt="img" class="img-responsive"></a>
													</div>
													<p>John Smith</p>
													<div class="map">
														<a href=""><img src="{{url('/')}}/public/admin/assets-helper/images/map-img.jpg" alt="map" class="img-responsive"></a>
													</div>
												</div>
												<strong>Customer: <span>John Smith</span></strong><br>
												<strong>Visit Ad. </strong>
												<p>John Smith</p>
												<strong>Visit Date & Time </strong>
												<p>12/09/2018 at 5:00</p>
												<p class="text-danger">Home Site Images</p>
												<ul class="homesite-images">
													<li>
														<img src="{{url('/')}}/public/admin/assets-helper/images/site-image.jpg" class="img-responsive" alt="image">
													</li>
													<li>
														<img src="{{url('/')}}/public/admin/assets-helper/images/site-image1.jpg" class="img-responsive" alt="image">
													</li>
													<li>
														<img src="{{url('/')}}/public/admin/assets-helper/images/site-image2.jpg" class="img-responsive" alt="image">
													</li>
													<li><a href="#">View All</a></li>
												</ul>
												<strong>Clean Type:</strong> <span> Domestic</span>
											</div>
											<div class="schedule-box">
												<div class="profile-part">
													<div class="avatar">
														<a href=""><img src="{{url('/')}}/public/admin/assets-helper/images/admin-pic.jpg" alt="img" class="img-responsive"></a>
													</div>
													<p>John Smith</p>
													<div class="map">
														<a href=""><img src="{{url('/')}}/public/admin/assets-helper/images/map-img.jpg" alt="map" class="img-responsive"></a>
													</div>
												</div>
												<strong>Customer: <span>John Smith</span></strong><br>
												<strong>Visit Ad. </strong>
												<p>John Smith</p>
												<strong>Visit Date & Time </strong>
												<p>12/09/2018 at 5:00</p>
												<p class="text-danger">Home Site Images</p>
												<ul class="homesite-images">
													<li>
														<img src="{{url('/')}}/public/admin/assets-helper/images/site-image.jpg" class="img-responsive" alt="image">
													</li>
													<li>
														<img src="{{url('/')}}/public/admin/assets-helper/images/site-image1.jpg" class="img-responsive" alt="image">
													</li>
													<li>
														<img src="{{url('/')}}/public/admin/assets-helper/images/site-image2.jpg" class="img-responsive" alt="image">
													</li>
													<li><a href="#">View All</a></li>
												</ul>
												<strong>Clean Type:</strong> <span> Domestic</span>
											</div>
											<div class="schedule-box">
												<div class="profile-part">
													<div class="avatar">
														<a href=""><img src="{{url('/')}}/public/admin/assets-helper/images/admin-pic.jpg" alt="img" class="img-responsive"></a>
													</div>
													<p>John Smith</p>
													<div class="map">
														<a href=""><img src="{{url('/')}}/public/admin/assets-helper/images/map-img.jpg" alt="map" class="img-responsive"></a>
													</div>
												</div>
												<strong>Customer: <span>John Smith</span></strong><br>
												<strong>Visit Ad. </strong>
												<p>John Smith</p>
												<strong>Visit Date & Time </strong>
												<p>12/09/2018 at 5:00</p>
												<p class="text-danger">Home Site Images</p>
												<ul class="homesite-images">
													<li>
														<img src="{{url('/')}}/public/admin/assets-helper/images/site-image.jpg" class="img-responsive" alt="image">
													</li>
													<li>
														<img src="{{url('/')}}/public/admin/assets-helper/images/site-image1.jpg" class="img-responsive" alt="image">
													</li>
													<li>
														<img src="{{url('/')}}/public/admin/assets-helper/images/site-image2.jpg" class="img-responsive" alt="image">
													</li>
													<li><a href="#">View All</a></li>
												</ul>
												<strong>Clean Type:</strong> <span> Domestic</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-sm-4">
										<select class="form-control">
											<option>Month</option>
											<option>Jan</option>
											<option>Feb</option>
											<option>Mar</option>
											<option>April</option>
											<option>May</option>
											<option>June</option>
											<option>July</option>
											<option>Aug</option>
											<option>Sep</option>
											<option>Oct</option>
											<option>Nov</option>
											<option>Dec</option>
										</select>
									</div>
									<!--/.col-->
									<div class="col-sm-8 ">
										<div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
											<div class="btn-group mr-3" data-toggle="buttons" aria-label="First group">
												<label class="btn btn-outline-secondary">
													<input type="radio" name="options" id="option1"> Day
												</label>
												<label class="btn btn-outline-secondary">
													<input type="radio" name="options" id="option3"> Week
												</label>
												<label class="btn btn-outline-secondary active">
													<input type="radio" name="options" id="option2" checked=""> Month
												</label>                                        
											</div>
										</div>
									</div><!--/.col-->
								</div><!--/.row-->
								<div class="chart-wrapper mt-4" >
									<img src="{{url('/')}}/public/admin/assets-helper/images/chart.jpg" class="img-responsive" alt="img">
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
	                                                                <img src="{{url('/')}}/public/admin/assets-helper/images/icon/avatar-02.jpg" alt="John Smith">
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
	                                                                <img src="{{url('/')}}/public/admin/assets-helper/images/icon/avatar-03.jpg" alt="Nicholas Martinez">
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
	                                                                <img src="{{url('/')}}/public/admin/assets-helper/images/icon/avatar-04.jpg" alt="Michelle Sims">
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
	                                                                <img src="{{url('/')}}/public/admin/assets-helper/images/icon/avatar-05.jpg" alt="Michelle Sims">
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
	                                                                <img src="{{url('/')}}/public/admin/assets-helper/images/icon/avatar-04.jpg" alt="Michelle Sims">
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
	                                                                <img src="{{url('/')}}/public/admin/assets-helper/images/icon/avatar-05.jpg" alt="Michelle Sims">
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
	                                                        <img src="{{url('/')}}/public/admin/assets-helper/images/icon/avatar-02.jpg" alt="John Smith">
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
	                                                        <img src="{{url('/')}}/public/admin/assets-helper/images/icon/avatar-02.jpg" alt="John Smith">
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
			</div>
		</div>
	</div>
@endsection