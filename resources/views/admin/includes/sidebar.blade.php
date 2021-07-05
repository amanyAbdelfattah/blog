<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <li class="nav-item dropdown row justify-content-end">
    <h5 class="text-center" style="padding-top: 23px; color:white; font-weight:600">{{__('Dashboard.Hi')}}, {{ Auth::user()->name }}</h5>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin-view')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{__('Dashboard.Dashboard')}}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>
    
    <!-- User Tab-->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-users-cog"></i>
            <span>{{__('Dashboard.ControlUsers')}}</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('user.index')}}"><i class="fas fa-fw fa-user"></i> {{__('Dashboard.AllUsers')}}</a>
                <a class="collapse-item" href="{{route('user.create')}}"><i class="fas fa-fw fa-user-plus"></i> {{__('Dashboard.AddUser')}}</a>
                <a class="collapse-item" href="{{route('jobreq.index')}}"><i class="fas fa-address-card"></i> {{__('Dashboard.ApplicantRequests')}}</a>
            </div>
        </div>
    </li>
    <!--End User Tab-->

    <!-- Post Tab-->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-book"></i>
            <span>{{__('Dashboard.ControlPosts')}}</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('post.index')}}"><i class="fas fa-paste"></i> {{__('Dashboard.AllPosts')}}</a>
                <a class="collapse-item" href="{{route('post.create')}}"><i class="fas fa-edit"></i> {{__('Dashboard.AddPost')}}</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-hand-holding-water"></i>
            <span>{{__('Dashboard.ControlServices')}}</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('service.index')}}"><i class="fas fa-couch"></i> {{__('Dashboard.AllServices')}}</a>
                <a class="collapse-item" href="{{route('service.create')}}"><i class="fas fa-plus-circle"></i> {{__('Dashboard.AddServices')}}</a>
            </div>
        </div>
    </li>
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-cut"></i>
            <span>{{__('Dashboard.ControlCategories')}}</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('categories.index')}}"><i class="fas fa-shopping-basket"></i> {{__('Dashboard.AllCategories')}}</a>
                <a class="collapse-item" href="{{route('categories.create')}}"><i class="fas fa-plus-circle"></i> {{__('Dashboard.AddCategory')}}</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('order.index')}}"><i class="fas fa-bell"></i>
            <span>{{__('Dashboard.AllOrders')}}</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->