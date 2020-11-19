@extends('layouts.frontend_template')
@section('title','Booking Detail')
@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Dashboard</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->
			
<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
							
                <!-- Profile Sidebar -->
                <div class="profile-sidebar">
                    <div class="widget-profile pro-widget-content">
                        <div class="profile-info-widget">
                            <a href="#" class="booking-doc-img">
                                <img src="{{ asset($owner->photo) }}" alt="User Image">
                            </a>
                            <div class="profile-det-info">
                                <h3>{{ $owner->name }}</h3>
											
                                <div class="patient-details">
                                    <h5 class="mb-0">{{ $owner->email }}</h5>
                                </div>
                                {{-- <div class="patient-details">
                                    <h5 class="mb-0">{{ $owner->address }}</h5>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-widget">
                        <nav class="dashboard-menu">
                            <ul>
                                <li class="{{ Request::is('owner_dashboard*') ? 'active' : '' }}">
                                    <a href="{{route('owner_dashboard')}}">
                                        <i class="fas fa-columns"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('owner_profile*') ? 'active' : '' }}">
                                    <a href="{{route('owner_profile')}}">
                                        <i class="fas fa-user"></i>
                                        <span>Profile</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('owner_booking*') ? 'active' : '' }}">
                                <a href="{{ route('owner.booking') }}">
                                        <i class="fas fa-calendar-check"></i>
                                        <span>Bookings</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('owner_court*') ? 'active' : '' }}">
                                    <a href="{{ route('owner.court') }}">
                                        <i class="fas fa-list-ol"></i>
                                        <span>Courts</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                     <i class="fas fa-sign-out-alt"></i>
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /Profile Sidebar -->
							
            </div>
						
            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('owner.booking') }}" class="btn btn-sm btn-info float-left mb-2">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                </div>
                <div class="invoice-content">
                    <div class="invoice-item">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="invoice-logo">
                                   <h1 class="logo_font">Futlance</h1>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p class="invoice-details">
                                    <strong>Order:</strong> {{ $booking->booking_no }} <br>
                                    <strong>Issued:</strong> {{ date_format(date_create($booking->booking_date),"d-M-Y") }}
                                </p>
                            </div>
                        </div>
                    </div>
								
                    <!-- Invoice Item -->
                    <div class="invoice-item">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="invoice-info">
                                    <strong class="customer-text">Invoice From</strong>
                                    <p class="invoice-details invoice-details-two">
                                        {{ $booking->court->name }} <br>
                                        {{ $booking->court->quarter->name }}<br>
                                        {{ $booking->court->quarter->city->name }} <br>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="invoice-info invoice-info2">
                                    <strong class="customer-text">Invoice To</strong>
                                    <p class="invoice-details">
                                        {{ $booking->user->name }} <br>
                                        {{ $booking->user->phone }} <br>
                                        {{ $booking->user->address }} <br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Item -->
								
                    <!-- Invoice Item -->
                    <div class="invoice-item">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="invoice-info">
                                    <strong class="customer-text">Payment Method</strong>
                                    <p class="invoice-details invoice-details-two">
                                        {{ $booking->paymentMethod->name }}<br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Item -->
								
                    <!-- Invoice Item -->
                    <div class="invoice-item invoice-table-wrap">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="invoice-table table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Court Name</th>
                                                <th class="text-center">Time</th>
                                                <th class="text-center">Pre-paid</th>
                                                <th class="text-right">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $booking->court->name }}</td>
                                                <td class="text-center">
                                                    <span >{{ date_format(date_create($booking->start_time),"H:i A") }} </span>
                                                    <span class="font-weight-bold text-dark" >to</span> <span >{{ date_format(date_create($booking->end_time),"H:i A") }}</span>
                                                </td>
                                                <td class="text-center">35%</td>
                                                <td class="text-right">{{ $booking->total_amount }} MMK</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4 ml-auto">
                                <div class="table-responsive">
                                    <table class="invoice-table-two table">
                                        <tbody>
                                            <tr>
                                                <th>Total:</th>
                                                <td><span>{{ $booking->total_amount }} MMK</span></td>
                                            </tr>
                                            <tr>
                                                <th>Pre-Paid:</th>
                                                <td><span>{{ ($booking->total_amount * 0.3) }} MMK</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Item -->
								
                    <!-- Invoice Information -->
                    <div class="other-info">
                        <h4>From <span class="font-weight-bold">{{ $booking->court->name }}</span></h4>
                        <p class="text-muted mb-0">{{ $booking->comment }}</p>
                    </div>
                    <!-- /Invoice Information -->
								
                </div>
            </div>
        </div>

    </div>

</div>		
<!-- /Page Content -->
@endsection