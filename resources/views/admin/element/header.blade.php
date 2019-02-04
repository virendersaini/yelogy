 <header id="header" class="header">
    <div class="header-menu">
        <div class="col-sm-10">                   
            <ul class="d-flex top-menus">
                <li><a href="#">Just Helper</a></li>  
            </ul>
        </div>
        <div class="col-sm-2">
            
             <a href="{{ route('admin.logout') }}"
                                  onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();" class="btn btn-link p-0 text-danger pull-right">
                                  Sign Out
                                </a>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                                </form>
            <!--<div class="header-left">                       
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle">
                    <i class="ti-search"></i>                            
                  </button>       
                </div>

                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle">
                    <i class="ti-bell"></i>
                    <span class="count bg-danger">5</span>
                  </button>       
                </div>

                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle">
                    <i class="ti-plus"></i>                            
                  </button>                        
                </div>
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle">
                    <i class="ti-settings"></i>                            
                  </button>                        
                </div> 
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle">
                    <i class="ti-user"></i>                            
                  </button>                        
                </div>      
            </div>                    
        </div>-->
    </div>
</header>