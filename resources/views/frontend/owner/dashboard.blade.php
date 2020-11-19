@extends('layouts.frontend_template')
@section('title','Profile')
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
                                {{-- <div class="patient-details mt-1">
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

                <div class="row">
                    <div class="col-md-12">
                        <div class="card dash-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-lg-4">
                                        <div class="dash-widget dct-border-rht">
                                            <div class="circle-bar circle-bar1">
                                                <div class="circle-graph1" data-percent="75">
                                                    <img src="{{ asset('my_assets/frontend/assets/img/icon-01.png') }}" class="img-fluid" alt="patient">
                                                </div>
                                            </div>
                                            <div class="dash-widget-info">
                                                <h6>You Owed</h6>
                                                <h3 class="text-info">{{count($owed_courts)}}</h3>
                                                <p class="text-muted">Court(s) in our site</p>
                                            </div>
                                        </div>
                                    </div>
												
                                    <div class="col-md-12 col-lg-4">
                                        <div class="dash-widget dct-border-rht">
                                            <div class="circle-bar circle-bar2">
                                                <div class="circle-graph2" data-percent="65">
                                                    <img src="{{ asset('my_assets/frontend/assets/img/icon-02.png') }}" class="img-fluid" alt="Patient">
                                                </div>
                                            </div>
                                            <div class="dash-widget-info">
                                                <h6>You have</h6>
                                            <h3 class="text-info">{{ count($ownBookings) }}</h3>
                                                <p class="text-muted">total booking</p>
                                            </div>
                                        </div>
                                    </div>
												
                                    <div class="col-md-12 col-lg-4">
                                        <div class="dash-widget">
                                            <div class="circle-bar circle-bar3">
                                                <div class="circle-graph3" data-percent="50">
                                                <img src="{{asset('my_assets/frontend/assets/img/icon-03.png')}}" class="img-fluid" alt="Patient">
                                                </div>
                                            </div>
                                            <div class="dash-widget-info">
                                                <h6>You got</h6>
                                                <h3 class="text-info">{{ number_format($totalIncome) }} MMK</h3>
                                                <p class="text-muted">income money</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

				{{-- start --}}
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="mb-4">Bookings List</h4>
                        <div class="appointment-tab">
									
                            <!-- Appointment Tab -->
                            <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#upcoming-appointments" data-toggle="tab">Recent</a>
                                </li>
                            </ul>
                            <!-- /Appointment Tab -->
										
                            <div class="tab-content">
										
                                <!-- Upcoming Appointment Tab -->
                                <div class="tab-pane show active" id="upcoming-appointments">
                                    <div class="card card-table mb-0">
                                        <div class="card-body">
                                            <table class="datatable table table-hover table-center mb-0">
                                                <thead>
                                                    @php
                                                    $num = 1;
                                                    @endphp
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Booking No</th>
                                                        <th>Date</th>
                                                        <th>Booking by</th>
                                                        <th>Court</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($ownBookings as $booking)
                                                        <tr>
                                                            <td>{{ $num++ }}</td>
                                                            <td>{{ $booking->booking_no }}</td>
                                                            <td>
                                                                {{-- <td>{{ $booking->booking_date }} <span class="text-primary d-block">{{ $booking->start_time }} - {{ $booking->end_time }}</span></td> --}}
                                                                <div class="text-dark">{{ $booking->booking_date }}</div>
                                                                <div class="row">
                                                                    <div class="text-success col-md-4"><small>{{ $booking->start_time }}</small></div>
                                                                    <div class="text-success col-md-4"><small>{{ $booking->end_time }}</small></div>
                                                                </div>
                                                            </td>
                                                            <td>{{ $booking->user->name }}</td>
                                                            <td>{{ $booking->court->name }}</td>
                                                            <td>
                                                                @if ($booking->status == 0)
                                                                    <div>
                                                                       <p class="text-success">Pending</p>
                                                                    </div>
                                                                @else
                                                                    <div>
                                                                        <p class="text-success">Confirmed</p>
                                                                    </div>
                                                                @endif
                                                            <td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Upcoming Appointment Tab -->
									   
                                <!-- Today Appointment Tab -->
                                <div class="tab-pane" id="today-appointments">
                                    <div class="card card-table mb-0">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Patient Name</th>
                                                            <th>Appt Date</th>
                                                            <th>Purpose</th>
                                                            <th>Type</th>
                                                            <th class="text-center">Paid Amount</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="patient-profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient6.jpg" alt="User Image"></a>
                                                                    <a href="patient-profile.html">Elsie Gilley <span>#PT0006</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>14 Nov 2019 <span class="d-block text-info">6.00 PM</span></td>
                                                            <td>Fever</td>
                                                            <td>Old Patient</td>
                                                            <td class="text-center">$300</td>
                                                            <td class="text-right">
                                                                <div class="table-action">
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>
																				
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                        <i class="fas fa-check"></i> Accept
                                                                    </a>
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                                        <i class="fas fa-times"></i> Cancel
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="patient-profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient7.jpg" alt="User Image"></a>
                                                                    <a href="patient-profile.html">Joan Gardner <span>#PT0006</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>14 Nov 2019 <span class="d-block text-info">5.00 PM</span></td>
                                                            <td>General</td>
                                                            <td>Old Patient</td>
                                                            <td class="text-center">$100</td>
                                                            <td class="text-right">
                                                                <div class="table-action">
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>
																				
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                        <i class="fas fa-check"></i> Accept
                                                                    </a>
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                                        <i class="fas fa-times"></i> Cancel
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="patient-profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient8.jpg" alt="User Image"></a>
                                                                    <a href="patient-profile.html">Daniel Griffing <span>#PT0007</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>14 Nov 2019 <span class="d-block text-info">3.00 PM</span></td>
                                                            <td>General</td>
                                                            <td>New Patient</td>
                                                            <td class="text-center">$75</td>
                                                            <td class="text-right">
                                                                <div class="table-action">
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>
																				
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                        <i class="fas fa-check"></i> Accept
                                                                    </a>
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                                        <i class="fas fa-times"></i> Cancel
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="patient-profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient9.jpg" alt="User Image"></a>
                                                                    <a href="patient-profile.html">Walter Roberson <span>#PT0008</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>14 Nov 2019 <span class="d-block text-info">1.00 PM</span></td>
                                                            <td>General</td>
                                                            <td>Old Patient</td>
                                                            <td class="text-center">$350</td>
                                                            <td class="text-right">
                                                                <div class="table-action">
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>
																				
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                        <i class="fas fa-check"></i> Accept
                                                                    </a>
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                                        <i class="fas fa-times"></i> Cancel
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="patient-profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient10.jpg" alt="User Image"></a>
                                                                    <a href="patient-profile.html">Robert Rhodes <span>#PT0010</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>14 Nov 2019 <span class="d-block text-info">10.00 AM</span></td>
                                                            <td>General</td>
                                                            <td>New Patient</td>
                                                            <td class="text-center">$175</td>
                                                            <td class="text-right">
                                                                <div class="table-action">
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>
																				
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                        <i class="fas fa-check"></i> Accept
                                                                    </a>
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                                        <i class="fas fa-times"></i> Cancel
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="patient-profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient11.jpg" alt="User Image"></a>
                                                                    <a href="patient-profile.html">Harry Williams <span>#PT0011</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>14 Nov 2019 <span class="d-block text-info">11.00 AM</span></td>
                                                            <td>General</td>
                                                            <td>New Patient</td>
                                                            <td class="text-center">$450</td>
                                                            <td class="text-right">
                                                                <div class="table-action">
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>
																				
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                        <i class="fas fa-check"></i> Accept
                                                                    </a>
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                                        <i class="fas fa-times"></i> Cancel
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>		
                                            </div>	
                                        </div>	
                                    </div>	
                                </div>
                                <!-- /Today Appointment Tab -->
											
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end --}}
            </div>
        </div>

    </div>

</div>		
<!-- /Page Content -->
@endsection