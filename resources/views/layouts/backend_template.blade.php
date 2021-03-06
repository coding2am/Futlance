<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('my_assets/backend/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('my_assets/backend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('my_assets/backend/css/f_a.min.css') }}">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{ asset('my_assets/backend/css/feathericon.min.css') }}">

    <link rel="stylesheet" href="{{ asset('my_assets/backend/plugins/morris/morris.css') }}">
    
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('my_assets/backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('my_assets/backend/css/custom.css') }}">

</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <div class="header">

            <!-- Logo -->
            <div class="header-left">
                <a href="index.html" class="logo">
                    <h1>Futlance</h1>
                    {{-- <img src="{{ asset('my_assets/backend/img/logo.png') }}" alt="Logo"> --}}
                </a>
                <a href="index.html" class="logo logo-small">
                    <h1>F</h1>
                    {{-- <img src="{{ asset('my_assets/backend/img/logo-small.png') }}" alt="Logo" width="30" height="30"> --}}
                </a>
            </div>
            <!-- /Logo -->

            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fe fe-text-align-left"></i>
            </a>

            <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search here">
                    <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>

            <!-- Mobile Menu Toggle -->
            <a class="mobile_btn" id="mobile_btn">
                <i class="fa fa-bars"></i>
            </a>
            <!-- /Mobile Menu Toggle -->

            <!-- Header Right Menu -->
            <ul class="nav user-menu">

                <!-- Notifications -->
                <li class="nav-item dropdown noti-dropdown">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="fe fe-bell"></i> <span class="badge badge-pill">3</span>
                    </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Notifications</span>
                            <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="media">
                                            <span class="avatar avatar-sm">
                                                <img class="avatar-img rounded-circle" alt="User Image"
                                                    src="{{ asset('my_assets/backend/img/doctors/doctor-thumb-01.jpg') }}">
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">Dr. Ruby Perrin</span>
                                                    Schedule <span class="noti-title">her appointment</span></p>
                                                <p class="noti-time"><span class="notification-time">4 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="media">
                                            <span class="avatar avatar-sm">
                                                <img class="avatar-img rounded-circle" alt="User Image"
                                                    src="{{ asset('my_assets/backend/img/patients/patient1.jpg') }}">
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">Charlene Reed</span>
                                                    has booked her appointment to <span class="noti-title">Dr. Ruby
                                                        Perrin</span></p>
                                                <p class="noti-time"><span class="notification-time">6 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="media">
                                            <span class="avatar avatar-sm">
                                                <img class="avatar-img rounded-circle" alt="User Image"
                                                    src="assets/img/patients/patient2.jpg">
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">Travis Trimble</span>
                                                    sent a amount of $210 for his <span
                                                        class="noti-title">appointment</span></p>
                                                <p class="noti-time"><span class="notification-time">8 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="media">
                                            <span class="avatar avatar-sm">
                                                <img class="avatar-img rounded-circle" alt="User Image"
                                                    src="{{ asset('my_assets/backend/img/patients/patient3.jpg') }}">
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">Carl Kelly</span> send
                                                    a message <span class="noti-title"> to his doctor</span></p>
                                                <p class="noti-time"><span class="notification-time">12 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="#">View all Notifications</a>
                        </div>
                    </div>
                </li>
                <!-- /Notifications -->

                <!-- User Menu -->
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle"
                                src="{{asset(Auth::user()->photo)}}" width="31"
                                alt="Ryan Taylor">
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                            <img src="{{asset(Auth::user()->photo)}}" alt="User Image"
                                    class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                            <h6>{{Auth::user()->name}}</h6>
                                <p class="text-muted mb-0">Administrator</p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="#">My Profile</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                <!-- /User Menu -->

            </ul>
            <!-- /Header Right Menu -->

        </div>
        <!-- /Header -->

        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">
                            <span>Main</span>
                        </li>
                        <li class="{{ Request::is('admin*') ? 'active' : '' }}">
                            <a href="{{ route('dashboard') }}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                        </li>
                        <li class="{{ Request::is('booking*') ? 'active' : '' }}">
                            <a href="{{ route('booking.index') }}"><i class="fe fe-layout"></i>
                                <span>Bookings</span></a>
                        </li>
                        {{-- Users --}}
                        <li class="submenu">
                            <a href="{{ route('user.index') }}"><i class="fe fe-users"></i> <span> Users </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{ route('user.index') }}">Customers</a></li>
                                <li><a href="{{ route('user.member') }}">Members</a></li>
                                <li><a href="{{ route('user.owner') }}">Owners</a></li>
                            </ul>
                        </li>
                        <li class="{{ Request::is('city*') ? 'active' : '' }}">
                            <a href="{{ route('city.index') }}"><i class="fe fe-map"></i> <span>Cities</span></a>
                        </li>
                        <li class="{{ Request::is('quarter*') ? 'active' : '' }}">
                            <a href="{{ route('quarter.index') }}"><i class="fe fe-map"></i> <span>Quarters</span></a>
                        </li>
                        <li class="{{ Request::is('court*') ? 'active' : '' }}">
                            <a href="{{ route('court.index') }}"><i class="fe fe-tag"></i> <span>Courts</span></a>
                        </li>
                        <li class="{{ Request::is('payment_method*') ? 'active' : '' }}">
                            <a href="{{ route('payment_method.index') }}"><i class="fe fe-credit-card"></i> <span>Payment Methods</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Sidebar -->

        @yield('content')

    </div>
    <!-- /Main Wrapper -->


    <!-- jQuery -->
    <script src="{{ asset('my_assets/backend/js/jquery-3.2.1.min.js') }}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('my_assets/backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('my_assets/backend/js/bootstrap.min.js') }}"></script>

    <!-- Slimscroll JS -->
    <script src="{{ asset('my_assets/backend/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Datatable -->
    <script src="{{ asset('my_assets/backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('my_assets/backend/plugins/datatables/datatables.min.js') }}"></script>

    <script src="{{ asset('my_assets/backend/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('my_assets/backend/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('my_assets/backend/js/chart.morris.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('my_assets/backend/js/script.js') }}"></script>

    @yield('script')
</body>

</html>
