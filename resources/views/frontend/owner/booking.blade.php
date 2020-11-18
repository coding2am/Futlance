@extends('layouts.frontend_template')
@section('title','Booking')
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
                                    <h5 class="mb-0">{{ $owner->phone }}</h5>
                                </div>
                                <div class="patient-details">
                                    <h5 class="mb-0">{{ $owner->address }}</h5>
                                </div>
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
                                        <i class="fas fa-user-injured"></i>
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
                {{-- start --}}
                <div class="table-responsive">
                    {{-- <h3 class="text text-center text-info"></h3> --}}
                    {{-- flash back message start--}}
                    @if (!empty(session()->get('success')))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong class="mr-1">Success!</strong>{!! session()->get('success') !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    {{-- flash back message end--}}
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
                                <th>Payment method</th>
                                <th>Request booking at</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ownBookings as $ownBooking)
                                <tr>
                                    <td>{{ $num++ }}</td>
                                    <td>{{ $ownBooking->booking_no }}</td>
                                    <td>
                                        {{-- <td>{{ $booking->booking_date }} <span class="text-primary d-block">{{ $booking->start_time }} - {{ $booking->end_time }}</span></td> --}}
                                        <div class="text-dark">{{ $ownBooking->booking_date }}</div>
                                        <div class="row">
                                            <div class="text-success col-md-4"><small>{{ $ownBooking->start_time }}</small></div>
                                            <div class="text-success col-md-4"><small>{{ $ownBooking->end_time }}</small></div>
                                        </div>
                                    </td>
                                    <td>{{ $ownBooking->user->name }}</td>
                                    <td>{{ $ownBooking->court->name }}</td>
                                    <td>{{ $ownBooking->paymentMethod->name }}</td>
                                    <td>{{ $ownBooking->created_at->diffForHumans()}}</td>
                                    <td>
                                        @if ($ownBooking->status == 0)
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
                {{-- end --}}
            </div>    
        </div>

    </div>

</div>		
<!-- /Page Content -->
@endsection