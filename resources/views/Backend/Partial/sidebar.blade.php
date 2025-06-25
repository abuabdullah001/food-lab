   <div class="app-menu navbar-menu">
       <!-- LOGO -->
       <div class="navbar-brand-box">
           <!-- Dark Logo-->
           <a href="index.html" class="logo logo-dark">
               <span class="logo-sm">
                   <img src="{{ asset('Backend') }}/assets/images/logo-sm.png" alt="" height="22">
               </span>
               <span class="logo-lg">
                   <img src="{{ asset('Backend') }}/assets/images/logo-dark.png" alt="" height="17">
               </span>
           </a>
           <!-- Light Logo-->
           <a href="index.html" class="logo logo-light">
               <span class="logo-sm">
                   <img src="{{ asset('Backend') }}/assets/images/logo-sm.png" alt="" height="22">
               </span>
               <span class="logo-lg">
                   <img src="{{ asset('Backend') }}/assets/images/logo-light.png" alt="" height="17">
               </span>
           </a>
           <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
               <i class="ri-record-circle-line"></i>
           </button>
       </div>

       <div class="dropdown sidebar-user m-1 rounded">
           <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <span class="d-flex align-items-center gap-2">
                   <img class="rounded header-profile-user" src="{{ asset('Backend') }}/assets/images/users/avatar-1.jpg" alt="Header Avatar">
                   <span class="text-start">
                       <span class="d-block fw-medium sidebar-user-name-text">Anna Adame</span>
                       <span class="d-block fs-14 sidebar-user-name-sub-text"><i class="ri ri-circle-fill fs-10 text-success align-baseline"></i> <span class="align-middle">Online</span></span>
                   </span>
               </span>
           </button>
           <div class="dropdown-menu dropdown-menu-end">
               <!-- item-->
               <h6 class="dropdown-header">Welcome Anna!</h6>
               <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
               <a class="dropdown-item" href="apps-chat.html"><i class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Messages</span></a>
               <a class="dropdown-item" href="apps-tasks-kanban.html"><i class="mdi mdi-calendar-check-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Taskboard</span></a>
               <a class="dropdown-item" href="pages-faqs.html"><i class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Help</span></a>
               <div class="dropdown-divider"></div>
               <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Balance : <b>$5971.67</b></span></a>
               <a class="dropdown-item" href="pages-profile-settings.html"><span class="badge bg-success-subtle text-success mt-1 float-end">New</span><i class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Settings</span></a>
               <a class="dropdown-item" href="auth-lockscreen-basic.html"><i class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Lock screen</span></a>
               <a class="dropdown-item" href="auth-logout-basic.html"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
           </div>
       </div>
       <div id="scrollbar">
           <div class="container-fluid">


               <div id="two-column-menu">
               </div>
               <ul class="navbar-nav" id="navbar-nav">
                   <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                   <li class="nav-item">
                       <a class="nav-link menu-link" href="{{url('/dashboard')}}">
                           <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                       </a>



                   <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Shop Manage</span></li>


                   <li class="nav-item">
                       <a class="nav-link menu-link" href="#sidebarAuth" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
                           <i class="ri-account-circle-line"></i> <span data-key="t-authentication">Product Manage</span>
                       </a>
                       <div class="collapse menu-dropdown" id="sidebarAuth">
                           <ul class="nav nav-sm flex-column">
                               <li class="nav-item">
                                   <a href="#sidebarSignIn" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSignIn" data-key="t-signin"> cousine Mange
                                   </a>
                                   <div class="collapse menu-dropdown" id="sidebarSignIn">
                                       <ul class="nav nav-sm flex-column">
                                           <li class="nav-item">
                                               <a href="{{route('cousine.index')}}" class="nav-link {{ request()->routeIs('cousine.index') ? 'active' : '' }}" data-key="t-basic"> cousine
                                               </a>
                                           </li>

                                       </ul>
                                   </div>

                               </li>

                               <li class="nav-item">
                                   <a href="#restriction" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSignIn" data-key="t-signin"> Dietry Restrictions Mange
                                   </a>
                                   <div class="collapse menu-dropdown" id="restriction">
                                       <ul class="nav nav-sm flex-column">
                                           <li class="nav-item">
                                               <a href="{{route('dietry.restrictions.index')}}" class="nav-link {{ request()->routeIs('dietry.restrictions.index') ? 'active' : '' }}" data-key="t-basic"> Dietry Restrictions
                                               </a>
                                           </li>

                                       </ul>
                                   </div>
                               </li>

                               <li class="nav-item">
                                   <a href="{{route('allergens.index')}}" class="nav-link {{ request()->routeIs('allergens.index') ? 'active' : '' }}" data-key="t-basic"> Allergen
                                   </a>
                               </li>

                               <li class="nav-item">
                                   <a href="{{route('products.index')}}" class="nav-link {{ request()->routeIs('products.index') ? 'active' : '' }}" data-key="t-basic">All Product
                                   </a>
                               </li>
                               <li class="nav-item">
                                   <a href="{{route('products.create')}}" class="nav-link {{ request()->routeIs('products.create') ? 'active' : '' }}" data-key="t-basic">Create Product
                                   </a>
                               </li>








                           </ul>
                       </div>
                   </li>


                   <li class="menu-title"><span data-key="t-menu">HRM</span></li>
                   <li class="nav-item">
                       <a class="nav-link menu-link {{ request()->routeIs('user.index') ? 'active' : '' }}" href="{{route('user.index')}}">
                           <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">User</span>
                       </a>


                   <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Settings</span></li>

                   <li class="nav-item">
                       <a class="nav-link menu-link" href="#role" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
                           <i class="ri-account-circle-line"></i> <span data-key="t-authentication">Role & Permission</span>
                       </a>
                       <div class="collapse menu-dropdown" id="role">
                           <ul class="nav nav-sm flex-column">
                               <li class="nav-item">
                                   <a href="{{ route('role.index') }}" class="nav-link {{ request()->routeIs('role.index') ? 'active' : '' }}" Rolerole="button" aria-expanded="false"> Role
                                   </a>

                               </li>

                               <li class="nav-item">
                                   <a href="{{ route('permission.index') }}" class="nav-link {{ request()->routeIs('permission.index') ? 'active' : '' }}" Rolerole="button" aria-expanded="false"> Permission Manage
                                   </a>

                               </li>
                           </ul>
                       </div>
                   </li>




               </ul>
           </div>
           <!-- Sidebar -->
       </div>

       <div class="sidebar-background"></div>
   </div>