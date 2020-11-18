@extends('layouts.frontend_template')
@section('title', 'Booking Success')
@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Booking</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Booking</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content success-page-cont">
    <div class="container-fluid">
				
        <div class="row justify-content-center">
            <div class="col-lg-6">
						
                <!-- Success Card -->
                <div class="card success-card">
                    <div class="card-body">
                        <div class="success-cont">
                        <img src="{{ asset('my_assets/frontend/assets/futlance_design/success.gif')}}" width="250">
                            <h3>Your booking was successful!</h3>
                            <p>
                                Booked at <strong>{{ $booking->court->name }}</strong><br> 
                                on <strong> 
                                        <span>{{ date_format(date_create($booking->booking_date),"d-M-Y") }}</span>
                                        <span style="font-weight: normal!important;">from</span>  <span class="text-success">{{ date_format(date_create($booking->start_time),"H:i A") }} </span>
                                        <span style="font-weight: normal!important;">to</span>  <span class="text-success">{{ date_format(date_create($booking->end_time),"H:i A") }}</span>
                                    </strong>
                            </p>
                            <a href="{{ route('booking.invoice',$booking->id) }}" class="btn btn-primary view-inv-btn">View Invoice</a>
                        </div>
                    </div>
                </div>
                <!-- /Success Card -->
							
            </div>
        </div>
					
    </div>
</div>		
<!-- /Page Content -->
@endsection