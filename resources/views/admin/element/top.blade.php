<div class="right-sidebar transition">
    <a href="javascript:void(0)" class="panel-close"><i class="ti-close"></i></a>
    <div class="card">
        <div class="card-header">
           <h4>Add</h4>
        </div>               
        <ul class="list-group list-group-flush">                             
            <li class="list-group-item">
                <a href="#"> <i class="fa fa-angle-right"></i> Customer</a>
            </li>                   
            <li class="list-group-item">
                <a href="#"> <i class="fa fa-angle-right"></i> Just Helper Team</a>
            </li>                   
            <li class="list-group-item">
                <a href="#"> <i class="fa fa-angle-right"></i> Helper</a>
            </li>                   
        </ul>             
    </div>


    <div class="card">
        <div class="card-header">
           <h4>Search</h4>
        </div>
        <div class="card-body d-flex">
           <input type="text" class="form-control" placeholder="Search...">
           <button type="submit" class="btn btn-primary">Search</button>
        </div>  
        <ul class="list-group list-group-flush">                             
            <li class="list-group-item">
                <a href="#"> <i class="fa fa-angle-right"></i> Search sample list</a>
            </li>
            <li class="list-group-item">
                <a href="#"> <i class="fa fa-angle-right"></i> Search sample list</a>
            </li>
            <li class="list-group-item">
                <a href="#"> <i class="fa fa-angle-right"></i> Search sample list</a>
            </li>
            <li class="list-group-item">
                <a href="#"> <i class="fa fa-angle-right"></i> Search sample list</a>
            </li>
            <li class="list-group-item">
                <a href="#"> <i class="fa fa-angle-right"></i> Search sample list</a>
            </li>
        </ul>             
    </div>
     <div class="profile-nav alt">
                    <div class="card">
                        <div class="card-header user-header alt">
                            <div class="media">
                                <a href="#">
                                    <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="public/admin/images/admin.jpg">
                                </a>
                                <div class="media-body">
                                    <h3 class="display-6">Jim Doe</h3>
                                    <p class="mb-0">Project Manager</p>                                            
                                </div>

                                  <a href="{{ route('admin.logout') }}"
                                  onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();" class="btn btn-link p-0 text-danger pull-right">
                                  Sign Out
                                </a>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                                </form>
                            </div>
                        </div>


                        <ul class="list-group list-group-flush"> 
                            <li class="list-group-item">
                                <a href="#"> <i class="fa fa-bell-o"></i> Notification <span class="badge badge-success pull-right">11</span></a>
                            </li>
                            <li class="list-group-item">
                                <a href="#"> <i class="fa fa-users"></i> Just Helper Team <span class="badge badge-warning pull-right r-activity">03</span></a>
                            </li>
                        </ul>

                    </div>
     </div>
     <div class="card">
        <div class="card-header">
           <h4>Settings</h4>
        </div>
        <ul class="list-group list-group-flush">                             
            <li class="list-group-item">
                <a href="#"> <i class="fa fa-user"></i> Personal Setting</a>
            </li>                                  
            <li class="list-group-item">
                <a href="#"> <i class="ti-email"></i> Emails</a>
            </li>
            <li class="list-group-item">
                <a href="#"> <i class="fa fa-bolt"></i> Material</a>
            </li>           
        </ul>
    </div>

    <div class="card">
        <div class="card-header">
           <h4>You have 5 Notification</h4>
        </div>
        <ul class="list-group list-group-flush">                             
            <li class="list-group-item">
                <a href="#"> <i class="fa fa-angle-right"></i> Notification sample list</a>
            </li>
            <li class="list-group-item">
                <a href="#"> <i class="fa fa-angle-right"></i> Notification sample list</a>
            </li>
            <li class="list-group-item">
                <a href="#"> <i class="fa fa-angle-right"></i> Notification sample list</a>
            </li>
            <li class="list-group-item">
                <a href="#"> <i class="fa fa-angle-right"></i> Notification sample list</a>
            </li>
            <li class="list-group-item">
                <a href="#"> <i class="fa fa-angle-right"></i> Notification sample list</a>
            </li>
        </ul>
    </div>
</div>