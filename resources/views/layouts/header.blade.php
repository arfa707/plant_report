<div id="header" class="header navbar-default">
    <div class="navbar-header">
        <a href="{{ route('home') }}" class="navbar-brand"><span class="navbar-logo"><i
                    class="ion-ios-cloud"></i></span> <b>Plant Report Manajemen</b></a>
    </div>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown navbar-user">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{ asset ('assets/img/user/user-13.jpg') }}" alt="" />
                <span class="d-none d-md-inline">Hii..{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                    class="d-none">
                    @csrf
                </form>
            </ul>
        </li>
    </ul>
</div>

<div id="top-menu" class="top-menu">
    <ul class="nav">
   
        <li class="{{ setActive('admin/dashboard') }}"><a class="nav-link"
            href="{{ route('admin.dashboard.index') }}"><i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span></a></li>
   
            @can('events.index')
            <li class="{{ setActive('admin/event') }}"><a class="nav-link" href="{{ route('admin.event.index') }}"><i class="fas fa-folder"></i>
        <span>Transaksi</span></a></li>
        @endcan

            <li class="has-sub {{ setActive('admin/role'). setActive('admin/permission'). setActive('admin/user') }}">
                @if(auth()->user()->can('roles.index') || auth()->user()->can('permission.index') || auth()->user()->can('users.index'))
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="ion-ios-infinite-outline bg-gradient-aqua"></i> 
                    <span>Users Management</span>
                </a>
                @endif
                <ul class="sub-menu">
                    @can('roles.index')
                    <li class="{{ setActive('admin/role') }}"><a class="nav-link"
                        href="{{route ('admin.role.index')}}"><i class="fas fa-unlock"></i>  - Roles</a>
                </li>
                @endcan
    
                    @can('permissions.index')
                    <li class="{{ setActive('admin/permission') }}"><a class="nav-link" href="{{ route('admin.permission.index') }}"><i class="fas fa-key"></i>  -- Permissions</a></li>
                @endcan
    
                @can('users.index')
                <li class="{{ setActive('admin/user') }}"><a class="nav-link"
             href="{{ route('admin.user.index') }}"><i class="fas fa-users"></i>  --- Users</a>
                </li>
            @endcan


      

                </ul>
            </li>
    

           
        <li class="menu-control menu-control-left">
            <a href="javascript:;" data-click="prev-menu"><i class="fa fa-angle-left"></i></a>
        </li>
        <li class="menu-control menu-control-right">
            <a href="javascript:;" data-click="next-menu"><i class="fa fa-angle-right"></i></a>
        </li>
    </ul>
</div>