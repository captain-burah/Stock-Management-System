@extends('layouts.panelLayout')

@section('masterContent')
<div class="wrapper" id="app">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <span class="nav-link"> You can manage all your stocks, sales, customers and employees from this prestigious panel.</span>
      </li>

    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link  text-center">
      <span class="brand-text font-weight-light">Management Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('img/manager.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Mr. {{Auth::user()->fname}} {{Auth::user()->lname}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
          <!--
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Starter Pages
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Active Page</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Inactive Page</p>
                  </a>
                </li>
              </ul>
            </li>
            -->
            <li class="nav-item py-1">
              <router-link to="/manager_panel" class="nav-link text-white">
                <i class="nav-icon fas fa-dollar-sign"></i>
                <p>
                  Sales Mgt
                </p>
              </router-link>
            </li>
            <li class="nav-item py-2">
              <router-link to="/stocks_mgt"  class="nav-link text-white">
                    <i class="nav-icon fas fa-palette "></i>
                    <p>
                    Stocks Mgt
                    </p>
                </router-link>
            </li>
            <li class="nav-item py-2">
              <router-link to="/customers_mgt"  class="nav-link text-white">
                  <i class="nav-icon fas fa-people-carry"></i>
                  <p>
                    View Customers
                  </p>
                </router-link>
            </li>
            <li class="nav-item py-2">
              <router-link to="/users_mgt"  class="nav-link text-white">
                  <i class="nav-icon fas fa-users-cog"></i>
                  <p>
                    User Accounts
                  </p>
                </router-link>
            </li>
            <li class="nav-item py-2">
              <a href="{{ route('logout')}}" class="nav-link text-white"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                <i class="nav-icon fas fa-power-off"></i>
                <p>
                  {{ __('Log Out')}}
                </p>
              </a>
              <form id="logout-form" action="{{ route('logout')}}" method="POST" style="display:none;">
                @csrf
              </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper bg-wallColor">   
  <!-- Main content -->
  <div class="content-header">
    <div class="container-fluid">
        <!-- for example router view -->
        <router-view></router-view>
        
        <vue-progress-bar></vue-progress-bar>
    </div>        <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 Asian Paints.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->
@endsection