@extends('layouts.frontend_template')
@section('title', 'Court Detail')
@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Court Detail</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Court Detail</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->
			
<!-- Page Content -->
<div class="content">
    <div class="container">

        <!-- Doctor Widget -->
        <div class="card">
            <div class="card-body">
                <div class="doctor-widget">
                    <div class="doc-info-left">
                        <div class="doctor-img">
                            <img src="{{ asset($court->photo) }}" class="img-fluid" alt="court Image" height="300">
                        </div>
                        <div class="doc-info-cont">
                            <h4 class="doc-name">{{ $court->name }}</h4>
                            <div class="rating">
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                            </div>
                            <div class="clinic-details">
                                <p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{ $court->quarter->name }}, {{ $court->quarter->city->name }} - <a href="javascript:void(0);">Get Directions</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="doc-info-right">
                        <div class="clini-infos">
                            <ul>
                                <li><i class="far fa-thumbs-up"></i> 99%</li>
                                <li><i class="fas fa-map-marker-alt"></i>{{ $court->quarter->name }}, {{ $court->quarter->city->name }}</li>
                                <li><i class="far fa-money-bill-alt"></i> {{ $court->price_per_hour }} MMK per hour </li>
                            </ul>
                        </div>
                        <div class="doctor-action">
                            <a href="javascript:void(0)" class="btn btn-white call-btn">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="chat.html" class="btn btn-white msg-btn">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="javascript:void(0)" class="btn btn-white call-btn" data-toggle="modal" data-target="#voice_call">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="javascript:void(0)" class="btn btn-white call-btn" data-toggle="modal" data-target="#video_call">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                        <div class="clinic-booking">
                            <a class="apt-btn" href="{{ route('court_booking', $court->id) }}">Book Appointment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Doctor Widget -->
					
        <!-- Doctor Details Tab -->
        <div class="card">
            <div class="card-body pt-0">
						
                <!-- Tab Menu -->
                <nav class="user-tabs mb-4">
                    <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                        <li class="nav-item">
                            <a class="nav-link" href="#doc_locations" data-toggle="tab">Locations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#doc_business_hours" data-toggle="tab">Business Hours</a>
                        </li>
                    </ul>
                </nav>
                <!-- /Tab Menu -->
							
                <!-- Tab Content -->
                <div class="tab-content pt-0">
								
                    <!-- Locations Content -->
                    <div role="tabpanel" id="doc_locations" class="tab-pane fade show active">
								
                        <!-- Location List -->
                        <div class="location-list">
                            <div class="row">
                                <div class="col-md-12">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3755.587027381866!2d96.15383511441544!3d19.73019873621068!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c8bbf43aa1d44f%3A0xbc74cf92a9d53d6c!2sThe%20Hotel%20Grand%20Aster!5e0!3m2!1sen!2smm!4v1605704279468!5m2!1sen!2smm" width="800" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                </div>
                            </div>
                        </div>
                        <!-- /Location List -->
									

                    </div>
                    <!-- /Locations Content -->
								
                    <!-- Business Hours Content -->
                    <div role="tabpanel" id="doc_business_hours" class="tab-pane fade">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
										
                                <!-- Business Hours Widget -->
                                <div class="widget business-widget">
                                    <div class="widget-content">
                                        <div class="listing-hours">
                                            <div class="listing-day">
                                                <div class="day">Monday</div>
                                                <div class="time-items">
                                                    <span class="time">06:00 AM - 09:00 PM</span>
                                                </div>
                                            </div>
                                            <div class="listing-day">
                                                <div class="day">Tuesday</div>
                                                <div class="time-items">
                                                    <span class="time">06:00 AM - 09:00 PM</span>
                                                </div>
                                            </div>
                                            <div class="listing-day">
                                                <div class="day">Wednesday</div>
                                                <div class="time-items">
                                                    <span class="time">06:00 AM - 09:00 PM</span>
                                                </div>
                                            </div>
                                            <div class="listing-day">
                                                <div class="day">Thursday</div>
                                                <div class="time-items">
                                                    <span class="time">06:00 AM - 09:00 PM</span>
                                                </div>
                                            </div>
                                            <div class="listing-day">
                                                <div class="day">Friday</div>
                                                <div class="time-items">
                                                    <span class="time">06:00 AM - 09:00 PM</span>
                                                </div>
                                            </div>
                                            <div class="listing-day">
                                                <div class="day">Saturday</div>
                                                <div class="time-items">
                                                    <span class="time">06:00 AM - 09:00 PM</span>
                                                </div>
                                            </div>
                                            <div class="listing-day closed">
                                                <div class="day">Sunday</div>
                                                <div class="time-items">
                                                    <span class="time">06:00 AM - 09:00 PM</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Business Hours Widget -->
									
                            </div>
                        </div>
                    </div>
                    <!-- /Business Hours Content -->
								
                </div>
            </div>
        </div>
        <!-- /Doctor Details Tab -->

    </div>
</div>		
<!-- /Page Content -->
@endsection