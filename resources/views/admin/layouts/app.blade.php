<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

      <Title> DASHBOARD</Title>
 <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


        <!-- Theme Config Js -->
        <script src="{{asset('assets/js/head.js')}}"></script>

        <!-- Bootstrap css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />

        <!-- App css -->
        <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- Icons css -->
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
</head>
<body>
     <!-- Begin page -->
     <div id="wrapper">


        <!-- ========== Menu ========== -->
        <div class="app-menu">

            <!-- Brand Logo -->
            <div class="logo-box">
           <!-- Brand Logo Light -->
     <a href="{{route('admin.home')}}" class="logo-light">
        <img src="{{asset('images/logo.png')}}" alt="logo" style="width: 100px;">

    </a>

    <!-- Brand Logo Dark -->
    <a href="{{route('admin.home')}}" class="logo-dark">
        <img src="{{asset('images/logo.png')}}" alt="dark logo" style="width: 100px;">
        
    </a>
            </div>

            <!-- menu-left -->
            <div class="scrollbar">

                <!-- User box -->
                <div class="user-box text-center">
                    <img src="assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle avatar-md">
                    <div class="dropdown">
                        <a href="javascript: void(0);" class="dropdown-toggle h5 mb-1 d-block" data-bs-toggle="dropdown">Geneva Kennedy</a>
                        <div class="dropdown-menu user-pro-dropdown">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-user me-1"></i>
                                <span>My Account</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-settings me-1"></i>
                                <span>Settings</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-lock me-1"></i>
                                <span>Lock Screen</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-log-out me-1"></i>
                                <span>Logout</span>
                            </a>

                        </div>
                    </div>
                    <p class="text-muted mb-0">Admin Head</p>
                </div>

                <!--- Menu -->
                <ul class="menu">

                    <li class="menu-title">Navigation</li>

                    <li class="menu-item bg-success text-white">
                        <a href="{{route('admin.home')}}"  class="menu-link ">
                            <span class="menu-icon"><i data-feather="airplay"></i></span>
                            <span class=""> Dashboards </span>

                        </a>

                    </li>

                    <li class="menu-item">
                        <a href="#menuCrm" data-bs-toggle="collapse" class="menu-link">
                            <span class="menu-icon"><i data-feather="users"></i></span>
                            <span class="menu-text"> CRM </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="menuCrm">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a href="{{route('admin.product')}}" class="menu-link">
                                        <span class="menu-text">Product</span>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <a href="{{route('admin.category')}}" class="menu-link">
                                        <span class="menu-text">Categories</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{route('admin.gender')}}" class="menu-link">
                                        <span class="menu-text">Genders</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('admin.blog')}}" class="menu-link">
                                        <span class="menu-text">Blog</span>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <a href="{{route('admin.order')}}" class="menu-link">
                                        <span class="menu-text">Orders</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{URL::TO('/dashboard/customize')}}" class="menu-link">
                                        <span class="menu-text">Customize Jacket </span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{route('customer')}}" class="menu-link">
                                        <span class="menu-text">Customers</span>
                                    </a>
                                </li>
                                                           </ul>
                        </div>
                    </li>
                </ul>
                <!--- End Menu -->
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- ========== Left menu End ========== -->

 <!-- ========== Topbar Start ========== -->
 <div class="navbar-custom">
    <div class="topbar">
        <div class="topbar-menu d-flex align-items-center gap-1">

            <!-- Topbar Brand Logo -->
            <div class="logo-box">
                <!-- Brand Logo Light -->
                <a href="index.html" class="logo-light">
                    <img src="{{asset('assets/images/logo-light.png')}}" alt="logo" class="logo-lg">
                    <img src="{{asset('assets/images/logo-sm.png')}}" alt="small logo" class="logo-sm">
                </a>

                <!-- Brand Logo Dark -->
                <a href="index.html" class="logo-dark">
                    <img src="{{asset('assets/images/logo-dark.png')}}" alt="dark logo" class="logo-lg">
                    <img src="{{asset('assets/images/logo-sm.png')}}" alt="small logo" class="logo-sm">
                </a>
            </div>

            <!-- Sidebar Menu Toggle Button -->
            <button class="button-toggle-menu">
                <i class="mdi mdi-menu"></i>
            </button>

            

       
        </div>

        <ul class="topbar-menu d-flex align-items-center">
            <!-- Topbar Search Form -->
            <li class="app-search dropdown me-3 d-none d-lg-block">
                <form>
                    <input type="search" class="form-control rounded-pill" placeholder="Search..." id="top-search">
                    <span class="fe-search search-icon font-16"></span>
                </form>
                <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h5 class="text-overflow mb-2">Found 22 results</h5>
                    </div>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-home me-1"></i>
                        <span>Analytics Report</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-aperture me-1"></i>
                        <span>How can I help you?</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings me-1"></i>
                        <span>User profile settings</span>
                    </a>

                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                    </div>

                    <div class="notification-list">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="d-flex align-items-start">
                                <img class="d-flex me-2 rounded-circle" src="assets/images/users/user-2.jpg" alt="Generic placeholder image" height="32">
                                <div class="w-100">
                                    <h5 class="m-0 font-14">Erwin E. Brown</h5>
                                    <span class="font-12 mb-0">UI Designer</span>
                                </div>
                            </div>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="d-flex align-items-start">
                                <img class="d-flex me-2 rounded-circle" src="assets/images/users/user-5.jpg" alt="Generic placeholder image" height="32">
                                <div class="w-100">
                                    <h5 class="m-0 font-14">Jacob Deo</h5>
                                    <span class="font-12 mb-0">Developer</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </li>

            <!-- Fullscreen Button -->
            <li class="d-none d-md-inline-block">
                <a class="nav-link waves-effect waves-light" href="" data-toggle="fullscreen">
                    <i class="fe-maximize font-22"></i>
                </a>
            </li>

            <!-- Search Dropdown (for Mobile/Tablet) -->
            <li class="dropdown d-lg-none">
                <a class="nav-link dropdown-toggle waves-effect waves-light arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="ri-search-line font-22"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                    <form class="p-3">
                        <input type="search" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                    </form>
                </div>
            </li>

           
<!-- Language flag dropdown  -->
<li class="dropdown d-none d-md-inline-block">
<a class="nav-link dropdown-toggle waves-effect waves-light arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
<img src="{{ asset('assets/images/flags/us.jpg') }}" alt="user-image" class="me-0 me-sm-1" height="18">
</a>
<div class="dropdown-menu dropdown-menu-end dropdown-menu-animated">

<!-- item-->
<a href="javascript:void(0);" class="dropdown-item">
<img src="{{ asset('assets/images/flags/germany.jpg') }}" alt="user-image" class="me-1" height="12"> <span class="align-middle">German</span>
</a>

<!-- item-->
<a href="javascript:void(0);" class="dropdown-item">
<img src="{{ asset('assets/images/flags/italy.jpg') }}" alt="user-image" class="me-1" height="12"> <span class="align-middle">Italian</span>
</a>

<!-- item-->
<a href="javascript:void(0);" class="dropdown-item">
<img src="{{ asset('assets/images/flags/spain.jpg') }}" alt="user-image" class="me-1" height="12"> <span class="align-middle">Spanish</span>
</a>

<!-- item-->
<a href="javascript:void(0);" class="dropdown-item">
<img src="{{ asset('assets/images/flags/russia.jpg') }}" alt="user-image" class="me-1" height="12"> <span class="align-middle">Russian</span>
</a>

</div>
</li>


            <!-- Notofication dropdown -->
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle waves-effect waves-light arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="fe-bell font-22"></i>
                    <span class="badge bg-danger rounded-circle noti-icon-badge">9</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg py-0">
                    <div class="p-2 border-top-0 border-start-0 border-end-0 border-dashed border">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0 font-16 fw-semibold"> Notification</h6>
                            </div>
                            <div class="col-auto">
                                <a href="javascript: void(0);" class="text-dark text-decoration-underline">
                                    <small>Clear All</small>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="px-1" style="max-height: 300px;" data-simplebar>

                        <h5 class="text-muted font-13 fw-normal mt-2">Today</h5>
                        <!-- item-->

                        <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card unread-noti shadow-none mb-1">
                            <div class="card-body">
                                <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="notify-icon bg-primary">
                                            <i class="mdi mdi-comment-account-outline"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 text-truncate ms-2">
                                        <h5 class="noti-item-title fw-semibold font-14">Datacorp <small class="fw-normal text-muted ms-1">1 min ago</small></h5>
                                        <small class="noti-item-subtitle text-muted">Caleb Flakelar commented on Admin</small>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card read-noti shadow-none mb-1">
                            <div class="card-body">
                                <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="notify-icon bg-info">
                                            <i class="mdi mdi-account-plus"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 text-truncate ms-2">
                                        <h5 class="noti-item-title fw-semibold font-14">Admin <small class="fw-normal text-muted ms-1">1 hours ago</small></h5>
                                        <small class="noti-item-subtitle text-muted">New user registered</small>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <h5 class="text-muted font-13 fw-normal mt-0">Yesterday</h5>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card read-noti shadow-none mb-1">
                            <div class="card-body">
                                <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="notify-icon">
                                            <img src="{{asset('assets/images/users/avatar-2.jpg')}}" class="img-fluid rounded-circle" alt="" />
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 text-truncate ms-2">
                                        <h5 class="noti-item-title fw-semibold font-14">Cristina Pride <small class="fw-normal text-muted ms-1">1 day ago</small></h5>
                                        <small class="noti-item-subtitle text-muted">Hi, How are you? What about our next meeting</small>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <h5 class="text-muted font-13 fw-normal mt-0">30 Dec 2021</h5>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card read-noti shadow-none mb-1">
                            <div class="card-body">
                                <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="notify-icon bg-primary">
                                            <i class="mdi mdi-comment-account-outline"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 text-truncate ms-2">
                                        <h5 class="noti-item-title fw-semibold font-14">Datacorp</h5>
                                        <small class="noti-item-subtitle text-muted">Caleb Flakelar commented on Admin</small>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card read-noti shadow-none mb-1">
                            <div class="card-body">
                                <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="notify-icon">
                                            <img src="assets/images/users/avatar-4.jpg" class="img-fluid rounded-circle" alt="" />
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 text-truncate ms-2">
                                        <h5 class="noti-item-title fw-semibold font-14">Karen Robinson</h5>
                                        <small class="noti-item-subtitle text-muted">Wow ! this admin looks good and awesome design</small>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <div class="text-center">
                            <i class="mdi mdi-dots-circle mdi-spin text-muted h3 mt-0"></i>
                        </div>
                    </div>

                    <!-- All-->
                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item border-top border-light py-2">
                        View All
                    </a>

                </div>
            </li>

            <!-- Light/Dark Mode Toggle Button -->
            <li class="d-none d-sm-inline-block">
                <div class="nav-link waves-effect waves-light" id="light-dark-mode">
                    <i class="ri-moon-line font-22"></i>
                </div>
            </li>

            <!-- User Dropdown -->
            <li class="dropdown">
                <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{asset('assets/images/users/user-1.jpg')}}" alt="user-image" class="rounded-circle">
                    <span class="ms-1 d-none d-md-inline-block">
                        {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock"></i>
                        <span>Lock Screen</span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();"
                      class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </div>
            </li>

            
        </ul>
    </div>

<!-- ========== Topbar End ========== -->



        <!-- ============================================================== -->
        <!-- Start Page Content here -->
@yield('content')
        <!-- ============================================================== -->
    </div>

        <!-- Vendor js -->
        <script src="{{asset('assets/js/vendor.min.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('assets/js/app.min.js')}}"></script>

        <!-- Plugins js -->
        <script src="{{asset('assets/libs/morris.js06/morris.min.js')}}"></script>
        <script src="{{asset('assets/libs/raphael/raphael.min.js')}}"></script>

        <!-- Dashboard init-->
        <script src="{{asset('assets/js/pages/dashboard-4.init.js')}}"></script>
</body>
</html>
