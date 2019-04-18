<template>
   <div id="sidebar">
       <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <router-link to="/home" class="brand-link">
            <!-- <img src="{{URL::asset('assets/admin/default/logo.png')}}" alt="Teif Logo" class="brand-image img-circle elevation-3" -->
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Teif BackEnd</span>
        </router-link>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <!-- @role('Director') -->
                        <!-- @if($logged_user->photo != null) -->
                            <!-- <img src="assets/organisation/img/directors/passports/{{$logged_user->photo}}" class="img-circle elevation-2" alt="User Image"> -->
                        <!-- @else -->
                            <!-- <img src="assets/organisation/img/website/empty.png" class="img-circle elevation-2" alt="User Image"> -->
                        <!-- @endif -->
                    <!-- @endrole -->
                    <!-- {{--  @role('Superadmin') -->
                        <!-- <img src="assets/organisation/img/admins/passports/{{$logged_user->photo}}" class="img-circle elevation-2" alt="User Image"> -->
                    <!-- @endrole  --}} -->
                    <!-- @role('Admin') -->
                         <!-- @if($logged_user->photo != null) -->
                            <!-- <img src="assets/organisation/img/admins/passports/{{$logged_user->photo}}" class="img-circle elevation-2" alt="User Image"> -->
                        <!-- @else -->
                            <!-- <img src="assets/organisation/img/website/empty.png" class="img-circle elevation-2" alt="User Image"> -->
                        <!-- @endif -->
                    <!-- @endrole -->
                    <!-- @role('Employee') -->
                        <!-- @if($logged_user->photo != null) -->
                            <!-- <img src="assets/organisation/img/emloyees/passports/{{$logged_user->photo}}" class="img-circle elevation-2" alt="User Image"> -->
                        <!-- @else -->
                            <!-- <img src="assets/organisation/img/website/empty.png" class="img-circle elevation-2" alt="User Image"> -->
                        <!-- @endif
                    @endrole -->
                </div>
                <div class="info">
                <a href="" class="d-block">
                        <!-- {{$logged_user->full_name}}<br> -->
                        <!-- {{$logged_user->position_name}}<br> -->
                        </a>
                </div>
            </div>

             <!-- Sidebar Menu -->
          <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <!-- @role('Superadmin') -->
                   <li class="nav-item">
                        <router-link to="/courses" class="nav-link">
                            <i class="fa fa-users purple  nav-icon"></i>
                            <p>Courses</p>
                        </router-link>
                    </li>
                     <li class="nav-item has-treeview">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon  red fas fa-cog"></i>
                            <p>Management
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                          <!-- {{--  @role('Admin')  --}} -->
                            <li class="nav-item">
                                <router-link to="/users" class="nav-link">
                                    <i class="fa fa-users blue  nav-icon"></i>
                                    <p>Users</p>
                                </router-link>
                            </li>
                          <!-- {{--  @endrole  --}} -->
                            <li class="nav-item">

                                <router-link to="/permissions" class="nav-link">
                                    <i class="fa fa-cog red nav-icon"></i>
                                    <p>Roles & Permissions</p>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                <!-- @endrole -->
                <li class="nav-item">
                    <router-link to="/settings" class="nav-link">
                         <i class="nav-icon red fas fa-tools"></i>
                             <p> Settings </p>
                    </router-link>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
   </div>
</template>
<script>
    export default {
        name:"SideBar",
    }
</script>
