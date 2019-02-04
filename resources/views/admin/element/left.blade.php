<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#"><img src="{{url('public/admin/images/logo.png')}}" alt="Logo"></a>
            <a class="navbar-brand hidden" href="#"><img src="{{url('public/admin/images/logo2.png')}}" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="/admin"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li> 
                 <li class="{{ get_active_class('admin/producttype','admin/producttype/create', 'admin/producttype/*/*') }}"><i class="fa fa-edit"></i><a href="{{ route('producttype.index')}}">Brands</a></li>
                        <li class="{{ get_active_class('admin/product','admin/product/create', 'admin/product/*/*') }}"><i class="fa fa-edit"></i><a href="{{ route('product.index')}}">Products</a></li>
                        <li class="{{ get_active_class('admin/category','admin/category/create', 'admin/category/*/*') }}"><i class="fa fa-edit"></i><a href="{{ route('category.index')}}">Categories</a></li>
                        <li class="{{ get_active_class('admin/customer','admin/customer/create', 'admin/customer/*/*') }}"><i class="fa fa-edit"></i><a href="{{ route('customer.index')}}">Stores</a></li>
                         <li class="{{ get_active_class('admin/banners','admin/banner_create', 'admin/banner_edit') }}"><i class="fa fa-edit"></i><a href="{{ route('banners')}}">Banners</a></li>
                <!--  <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>products Managers</a>
                    <ul class="sub-menu children dropdown-menu">
                       
                           <li class="{{ get_active_class('admin/marketing','admin/marketing/create', 'admin/marketing/*/*') }}"><i class="  menu-icon fa fa-calendar"></i><a href="{{route('marketing.index')}}"> Maketing</a>
                        </li>
                        <li class="{{ get_active_class('admin/discs','admin/discs/create', 'admin/discs/*/*') }}"><i class="fa fa-edit"></i><a href="{{ route('discs.index')}}">Discs</a></li>
                        <li class="{{ get_active_class('admin/allergies','admin/allergies/create', 'admin/allergies/*/*') }}"><i class="fa fa-edit"></i><a href="{{ route('allergies.index')}}">Allergy</a></li>
                        <li class="{{ get_active_class('admin/helperquality','admin/helperquality/create', 'admin/helperquality/*/*') }}"><i class="fa fa-edit"></i><a href="{{ route('helperquality.index')}}">Helper Quality</a></li>
                        
                        <li class="{{ get_active_class('admin/tag-manager','admin/tag-manager/create', 'admin/tag-manager/*/*') }}"><i class="  menu-icon fa fa-calendar"></i><a href="{{route('tag-manager.index')}}"> Tags</a>
                            
                       
                        </li>
                    </ul>
                </li>-->
                   
              <!--  <li class="menu-item-has-children dropdown {{ get_active_class('admin/just-helper','admin/just-helper/create', 'admin/just-helper/*/*') }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Users</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li class="{{ get_active_class('admin/staff','admin/staff/create', 'admin/staff/*/*') }}"><i class="fa fa-edit"></i><a href="{{ route('staff.index')}}">JH Member</a></li>
                        <li class="{{ get_active_class('admin/customer','admin/customer/create', 'admin/customer/*/*') }}"><i class="fa fa-id-badge"></i><a href="{{ route('customer.index')}}">Customer</a></li>
                        <li class="{{ get_active_class('admin/just-helper','admin/just-helper/create', 'admin/just-helper/*/*') }}"><i class="fa fa-eraser"></i><a href="{{ route('just-helper.index')}}">Helper</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti-truck"></i>Sales</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-edit"></i><a href="#">Jobs</a></li>
                        <li><i class="fa fa-id-badge"></i><a href="#">Lead</a></li>
                        <li><i class="fa fa-eraser"></i><a href="#">Clean Management</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"> <i class="menu-icon fa fa-wrench"></i>Customer Service</a>
                </li>     
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa ti-zoom-in"></i>HRM</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="#">Helper Enquiry</a></li>
                        <li><i class="fa fa-table"></i><a href="#">Recruitment</a></li>
                        <li><i class="fa fa-table"></i><a href="#">HR</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"> <i class="menu-icon fa fa-table"></i> Reports</a>
                </li>
                <li>
                    <a href="#"> <i class="menu-icon fa fa-chain-broken"></i> Invoicing</a>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti-briefcase"></i>Masters</a>
                    <ul class="sub-menu children dropdown-menu master-dropdown-menu">
                        <li><i class="fa fa-list-ul"></i><a href="{{route('packages.index')}}">Packages</a></li>
                        <li><i class="fa fa-file-text-o"></i><a href="#">Documents</a></li> 
                        <li><i class="fa fa-bell-o"></i><a href="#">News and Updates</a></li>
                        <li><i class="fa fa-paste"></i><a href="#">Activity Logs</a></li>
                        <li><i class="fa fa-paste"></i><a href="#">Role and Permission</a></li>
                    </ul>
                </li> -->             
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>