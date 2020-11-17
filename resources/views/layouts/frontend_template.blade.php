<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('my_assets/frontend/assets/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('my_assets/frontend/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('my_assets/frontend/assets/plugins/fontawesome/css/all.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('my_assets/frontend/assets/css/style.css') }}">

</head>

<body class="account-page">

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <header class="header">
            <nav class="navbar navbar-expand-lg header-nav">
                <div class="navbar-header">
                    <a id="mobile_btn" href="javascript:void(0);">
                        <span class="bar-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </a>
                    <a href="{{ route('homepage') }}" class="navbar-brand logo">
                        {{-- <img src="{{ asset('my_assets/frontend/assets/img/logo.png') }}" class="img-fluid" alt="Logo"> --}}
                        <h1 class="logo-font">Futlance</h1>
                    </a>
                </div>
                <div class="main-menu-wrapper">
                    <div class="menu-header">
                        <a href="{{ route('homepage') }}" class="menu-logo">
                            {{-- <img src="{{ asset('my_assets/frontend/assets/img/logo.png') }}" class="img-fluid"
                                alt="Logo"> --}}
                                <h1 class="logo-font">Futlance</h1>
                        </a>
                        <a id="menu_close" class="menu-close" href="javascript:void(0);">
                            <i class="fas fa-times"></i>
                        </a>
                    </div>
                    <ul class="main-nav">
                        <li class="has-submenu">
                            <a href="{{ route('homepage') }}">Home</a>
                        </li>
                        <li class="has-submenu">
                            <a href="{{ route('homepage') }}">Courts</a>
                        </li>
                        <li class="has-submenu">
                            <a href="{{ route('homepage') }}">About us</a>
                        </li>
                        <li class="has-submenu">
                            <a href="{{ route('homepage') }}">Contact</a>
                        </li>
                        <li class="has-submenu">
                            <a href="{{ route('homepage') }}">Blog</a>
                        </li>
                        {{-- mobile btn --}}
                        <li class="login-link">
                            <a href="{{ route('user.signin') }}">Login / Signup</a>
                        </li>
                    </ul>
                </div>
                <ul class="nav header-navbar-rht">
                    <li class="nav-item contact-item">
                        <div class="header-contact-img">
                            <i class="far fa-hospital"></i>
                        </div>
                        <div class="header-contact-detail">
                            <p class="contact-header">Contact</p>
                            <p class="contact-info-header"> 09764821245</p>
                        </div>
                    </li>
                    {{-- web btn --}}
                    @guest
                        <li class="nav-item">
                            <a class="nav-link header-login" href="{{ route('user.signin') }}">login / Signup </a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link text-dark dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <i class="fas fa-angle-down"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                @if (Auth::user()->getRoleNames()[0] == 'admin')
                                    <a class="dropdown-item" href="{{ url('/admin') }}">Admin Dashboard</a>
                                @elseif(Auth::user()->getRoleNames()[0] == 'owner')
                                <a class="dropdown-item" href="{{ url('/owner_dashboard') }}">Owner Dashboard</a>
                                @endif

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
                    @endguest
                </ul>
            </nav>
        </header>
        <!-- /Header -->

        @yield('content')

        <!-- Footer -->
        <footer class="footer">

            <!-- Footer Top -->
            <div class="footer-top">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">

                            <!-- Footer Widget -->
                            <div class="footer-widget footer-about">
                                <div class="footer-logo">
                                    {{-- <img src="{{ asset('my_assets/frontend/assets/img/footer-logo.png') }}" alt="logo"> --}}
                                    <h1 class="logo-font text-light">Futlance</h1>
                                </div>
                                <div class="footer-about-content">
                                    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. </p> --}}
                                    <div class="social-icon">
                                        <ul>
                                            <li>
                                                <a href="#" target="_blank"><i class="fab fa-facebook-f"></i> </a>
                                            </li>
                                            <li>
                                                <a href="#" target="_blank"><i class="fab fa-twitter"></i> </a>
                                            </li>
                                            <li>
                                                <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" target="_blank"><i class="fab fa-dribbble"></i> </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /Footer Widget -->

                        </div>

                        <div class="col-lg-3 col-md-6">

                            <!-- Footer Widget -->
                            <div class="footer-widget footer-menu">
                                <h2 class="footer-title">For Customers</h2>
                                <ul>
                                    <li><a href="search.html">Search Courts</a></li>
                                    <li><a href="login.html">Login</a></li>
                                    <li><a href="register.html">Register</a></li>
                                    <li><a href="booking.html">Booking</a></li>
                                    <li><a href="patient-dashboard.html">Customer Dashboard</a></li>
                                </ul>
                            </div>
                            <!-- /Footer Widget -->

                        </div>

                        <div class="col-lg-3 col-md-6">

                            <!-- Footer Widget -->
                            <div class="footer-widget footer-menu">
                                <h2 class="footer-title">For Owner</h2>
                                <ul>
                                    <li><a href="appointments.html">Booking</a></li>
                                    <li><a href="login.html">Login</a></li>
                                    <li><a href="doctor-register.html">Register</a></li>
                                    <li><a href="doctor-dashboard.html">Owner Dashboard</a></li>
                                </ul>
                            </div>
                            <!-- /Footer Widget -->

                        </div>

                        <div class="col-lg-3 col-md-6">

                            <!-- Footer Widget -->
                            <div class="footer-widget footer-contact">
                                <h2 class="footer-title">Contact Us</h2>
                                <div class="footer-contact-info">
                                    <div class="footer-address">
                                        <span><i class="fas fa-map-marker-alt"></i></span>
                                        <p> Pyinmana,<br> Nay Pyi Taw </p>
                                    </div>
                                    <p>
                                        <i class="fas fa-phone-alt"></i>
                                        09764821245
                                    </p>
                                    <p class="mb-0">
                                        <i class="fas fa-envelope"></i>
                                        info@futlance.com
                                    </p>
                                </div>
                            </div>
                            <!-- /Footer Widget -->

                        </div>

                    </div>
                </div>
            </div>
            <!-- /Footer Top -->

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="container-fluid">

                    <!-- Copyright -->
                    <div class="copyright">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="copyright-text">
                                    <p class="mb-0">&copy; 2020 Futlance. All rights reserved.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">

                                <!-- Copyright Menu -->
                                <div class="copyright-menu">
                                    <ul class="policy-menu">
                                        <li><a href="term-condition.html">Terms and Conditions</a></li>
                                        <li><a href="privacy-policy.html">Policy</a></li>
                                    </ul>
                                </div>
                                <!-- /Copyright Menu -->

                            </div>
                        </div>
                    </div>
                    <!-- /Copyright -->

                </div>
            </div>
            <!-- /Footer Bottom -->

        </footer>
        <!-- /Footer -->

    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('my_assets/frontend/assets/js/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('my_assets/frontend/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('my_assets/frontend/assets/js/bootstrap.min.js') }}"></script>

    <!-- Slick JS -->
    <script src="{{ asset('my_assets/frontend/assets/js/slick.js') }}"></script>

    <!-- Sticky Sidebar JS -->
    <script src="{{ asset('my_assets/frontend/assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ asset('my_assets/frontend/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('my_assets/frontend/assets/js/script.js') }}"></script>
    @yield('script')
</body>

</html>
