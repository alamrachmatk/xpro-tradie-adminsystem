<template>
    <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img :src="'/template/dist/img/avatar.png'" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Jojo Kusuma</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><router-link :to="{ path: '/' }">
        <i class="fa fa-angle-left pull-right"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
        </router-link>
        </li>
        
       <li><router-link
                      :to="{ path: 'cust' }"
                    >
                        <i class="fa fa-users"></i> Customers
        </router-link></li>
        <li class="treeview menu-open active">
          <a href="#">
            <i class="fa fa-table"></i> <span>Job Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><router-link
                      :to="{ path: 'neworders' }"
                    >
                        <i class="fa fa-circle-o"></i> Checking New Orders
                    </router-link></li>
            <li><router-link
                      :to="{ path: 'biddings' }"
                    >
                        <i class="fa fa-circle-o"></i> Bidding Processing
                    </router-link></li>
                    <li><router-link
                      :to="{ path: 'workorders' }"
                    >
                        <i class="fa fa-circle-o"></i> Work Orders
                    </router-link></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-bell"></i> <span>System Installer</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/companies"><i class="fa fa-circle-o"></i> Companies </a></li>
            <li><a href="/companysettings"><i class="fa fa-circle-o"></i> Company Settings </a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-wrench"></i> <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
</template>