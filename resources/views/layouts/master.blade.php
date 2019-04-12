<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>{{ config('app.name', 'Project Management System') }}</title>
  
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="/css/app.css">
  
  </head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
  
  <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>


  <!-- SEARCH -->
      
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" 
            @keyup.enter="searchit"
            v-model="search"
            type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" @click="searchit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
      
      
      <div class="nav-item">
        <a class="nav-link" href="/chat"><i class="fas fa-comments"></i></a>
      </div>
      
      <div class="nav-item">
          
              <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fa fa-power-off text-red"></i>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
            </a>
          </div>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">   
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
      <img src="./images/collaboration.png" alt="PMS logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">PMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./images/man.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        
          <a href="/dashboard" class="d-block">
            {{ Auth::user()->name }}
            <p>{{ Auth::user()->type }}</p>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
            <router-link to="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt text-orange"></i>
              <p>
                Dashboard
              </p>

              </router-link>
            
          </li>
          <li class="nav-item">
            <router-link to="/profile" class="nav-link">
              <i class="nav-icon fas fa-user text-cyan"></i>
              <p>
                Profile
              </p>
            </router-link>
          </li>

          @can('isMember')
            <li class="nav-item">
            <router-link to="/myprojects" class="nav-link">
              <i class="nav-icon fas fa-file-signature text-teal"></i>
              <p>
                My Project
              </p>
            </router-link>
          </li>

          @endcan
        

           @can('isManager')
           <li class="nav-item">
            <router-link to="/clients" class="nav-link">
              <i class="nav-icon fas fa-address-book text-orange"></i>
              <p>
                Clients
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/projects" class="nav-link">
              <i class="nav-icon fas fa-project-diagram text-teal"></i>
              <p>
                Projects
              </p>
            </router-link>
          </li>
             <li class="nav-item">
            <router-link to="/team" class="nav-link">
              <i class="nav-icon fas fa-sitemap text-green"></i>
              <p>
                Team
              </p>
            </router-link>
          </li>
            
          @endcan


          @can('isAdmin')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-network-wired text-purple"></i>
              <p>
                Manage
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/users" class="nav-link">
                  <i class="fas fa-users nav-icon text-yellow"></i>
                  <p>Users</p>
                </router-link>
              </li>
               <li class="nav-item">
                  <router-link to="/projects" class="nav-link">
                    <i class="nav-icon fas fa-project-diagram text-teal"></i>
                    <p>
                    Projects
                    </p>
                  </router-link>
                </li>
            
            </ul>
          </li>
          @endcan
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      
        <router-view></router-view>
        
        <vue-progress-bar></vue-progress-bar>
        @yield('content')
        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer text-center">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      To Be Continued..
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019-2019 <a href="#">Project Management System</a></strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

@auth
<script>
  window.user = @json(auth()->user())
</script>
@endauth

<script src="/js/app.js"></script>
</body>
</html>
