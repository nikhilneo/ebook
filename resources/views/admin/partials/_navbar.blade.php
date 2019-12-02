
  <header class="main-header">
        <!-- Logo -->
        <a href="{{url('/admin')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>B</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Book</b>Shop</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
    
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="text-info user-image"><i class="fa fa-user-circle fa-2x"></i></span>
                  {{-- <img src="{{asset('admin-assets/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image"> --}}
                  <span class="hidden-xs">{{ Auth::guard('admin')->user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <div style="margin-top:1rem;" class="col-md-6 col-md-offset-3">
                      <a href="{{ url('/admin/profile') }}" class="btn btn-default btn-block">Profile</a>
                    </div>
                    <div style="margin-top:1rem; margin-bottom:1rem;" class="col-md-6 col-md-offset-3">
                      <a class="btn btn-default btn-block" href="{{ url('/admin/logout') }}"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">Logout</a>
                      <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
    
      <!-- =============================================== -->
    
      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <span class="text-info img-circle"><i class="fa fa-user-circle fa-2x"></i></span>
            </div>
            <div class="pull-left info">
              <p>{{ Auth::guard('admin')->user()->name }}</p>
              {{-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> --}}
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ Request::is('admin') ? 'active': '' }}">
              <a href="{{url('/admin')}}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            
            <li class="treeview {{ ( Request::is('admins') || Request::is('admin/register')) ? 'active menu-open': '' }}">
              <a href="#">
                <i class="fa fa-users"></i> <span>Admins</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ Request::is('admins') ? 'active': '' }}"><a href="{{url('admins/')}}"><i class="fa fa-list"></i> List</a></li>
                <li class="{{ Request::is('admin/register') ? 'active': '' }}"><a href="{{url('admin/register')}}"><i class="fa fa-plus"></i> Register </a></li>
              </ul>
            </li>
            
            <li class="treeview {{ ( Request::is('admin/books') || Request::is('admin/books/create')) ? 'active menu-open': '' }}">
              <a href="#">
                <i class="fa fa-book"></i> <span>Books</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ Request::is('admin/books') ? 'active': '' }}"><a href="{{url('/admin/books/')}}"><i class="fa fa-list"></i> List</a></li>
                <li class="{{ Request::is('admin/books/create') ? 'active': '' }}"><a href="{{url('/admin/books/create')}}"><i class="fa fa-plus"></i> Add New Book </a></li>
              </ul>
            </li>

            <li class="treeview {{ ( Request::is('admin/users') || Request::is('admin/users/register')) ? 'active menu-open': '' }}">
              <a href="#">
                <i class="fa fa-users"></i> <span>Users</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ Request::is('admin/users') ? 'active': '' }}"><a href="{{url('admin/users/')}}"><i class="fa fa-list"></i> List</a></li>
                <li class="{{ Request::is('admin/users/register') ? 'active': '' }}"><a href="{{url('admin/users/register')}}"><i class="fa fa-plus"></i> Register </a></li>
              </ul>
            </li>
            
            <li class="{{ Request::is('admin/orders') ? 'active': '' }}">
                <a href="{{url('admin/orders/')}}">
                  <i class="fa fa-shopping-bag"></i> <span>Orders</span>
                </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
    
      <!-- =============================================== -->