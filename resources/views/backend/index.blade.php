@extends('layouts.backend_template')
@section('title','Dashboard')
@section('content')
<style>
    .fixedImg {
        width: 50px!important;
        height: 50px!important;
        object-fit: cover;
        border-radius: 50%;
    }
</style>
<!-- Page Wrapper -->
<div class="page-wrapper">
			
    <div class="content container-fluid">
					
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Welcome Admin!</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon text-primary border-primary">
                                <i class="fas fa-users"></i>
                            </span>
                            <div class="dash-count">
                            <h3>{{ count($users) }}</h3>
                            </div>
                        </div>
                        <div class="dash-widget-info">
                            <h6 class="text-muted">Customers</h6>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-primary w-50"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon text-success">
                                <i class="fas fa-futbol"></i>
                            </span>
                            <div class="dash-count">
                                <h3>{{ count($courts) }}</h3>
                            </div>
                        </div>
                        <div class="dash-widget-info">
										
                            <h6 class="text-muted">Courts</h6>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-success w-50"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon text-danger border-danger">
                                <i class="fas fa-bookmark"></i>
                            </span>
                            <div class="dash-count">
                                <h3>{{ count($bookings) }}</h3>
                            </div>
                        </div>
                        <div class="dash-widget-info">
										
                            <h6 class="text-muted">Booking</h6>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-danger w-50"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon text-warning border-warning">
                                <i class="fe fe-folder"></i>
                            </span>
                            <div class="dash-count">
                                <h3>$62523</h3>
                            </div>
                        </div>
                        <div class="dash-widget-info">
										
                            <h6 class="text-muted">Revenue</h6>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-warning w-50"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-6">
						
                <!-- Sales Chart -->
                <div class="card card-chart">
                    <div class="card-header">
                        <h4 class="card-title text-info">Revenue</h4>
                    </div>
                    <div class="card-body">
                        <div id="morrisArea"></div>
                    </div>
                </div>
                <!-- /Sales Chart -->
							
            </div>
            <div class="col-md-12 col-lg-6">
						
                <!-- Invoice Chart -->
                <div class="card card-chart">
                    <div class="card-header">
                        <h4 class="card-title text-info">Status</h4>
                    </div>
                    <div class="card-body">
                        <div id="morrisLine"></div>
                    </div>
                </div>
                <!-- /Invoice Chart -->
							
            </div>	
        </div>
        <div class="row">
            <div class="col-md-6 d-flex">
						
                <!-- Recent Orders -->
                <div class="card card-table flex-fill">
                    <div class="card-header">
                        <h4 class="card-title text-info">Some User List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($fiveUsers as $fiveUser)
                                    <tr>
                                        <td>
                                        <img src="{{asset($fiveUser->photo)}}" class="fixedImg">
                                            {{ $fiveUser->name }}
                                        </td>
                                        <td>{{ $fiveUser->phone }}</td>
                                        <td>
                                            @if($fiveUser->status == 0)
                                            <div>
                                                <i class="fas fa-dot-circle text-success"></i>
                                            </div>
                                            @else
                                            <div>
                                                <i class="fas fa-dot-circle text-danger"></i>
                                            </div>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /Recent Orders -->
							
            </div>
            <div class="col-md-6 d-flex">
						
                <!-- Feed Activity -->
                <div class="card  card-table flex-fill">
                    <div class="card-header">
                        <h4 class="card-title text-info">Some Courts List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                                <thead>
                                    <tr>													
                                        <th>Court Name</th>
                                        <th>Price Per Houer</th>
                                        <th>Status</th>													
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($fiveCourts as $fiveCourt)
                                    <tr>
                                        <td>
                                            <img src="{{asset($fiveCourt->photo)}}" class="fixedImg">
                                            {{ $fiveCourt->name }}
                                        </td>
                                        <td>{{ $fiveCourt->price_per_hour }} MMK</td>
                                        <td>
                                            @if($fiveCourt->status == 0)
                                            <div>
                                                <i class="fas fa-dot-circle text-success"></i>
                                            </div>
                                            @else
                                            <div>
                                                <i class="fas fa-dot-circle text-danger"></i>
                                            </div>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /Feed Activity -->
							
            </div>
        </div>


        {{-- <div class="row">
            <div class="col-md-12">
						
                <!-- Recent Orders -->
                <div class="card card-table">
                    <div class="card-header">
                        <h4 class="card-title">Appointment List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Doctor Name</th>
                                        <th>Speciality</th>
                                        <th>Patient Name</th>
                                        <th>Apointment Time</th>
                                        <th>Status</th>
                                        <th class="text-right">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-01.jpg" alt="User Image"></a>
                                                <a href="profile.html">Dr. Ruby Perrin</a>
                                            </h2>
                                        </td>
                                        <td>Dental</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient1.jpg" alt="User Image"></a>
                                                <a href="profile.html">Charlene Reed </a>
                                            </h2>
                                        </td>
                                        <td>9 Nov 2019 <span class="text-primary d-block">11.00 AM - 11.15 AM</span></td>
                                        <td>
                                            <div class="status-toggle">
                                                <input type="checkbox" id="status_1" class="check" checked>
                                                <label for="status_1" class="checktoggle">checkbox</label>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            $200.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image"></a>
                                                <a href="profile.html">Dr. Darren Elder</a>
                                            </h2>
                                        </td>
                                        <td>Dental</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient2.jpg" alt="User Image"></a>
                                                <a href="profile.html">Travis Trimble </a>
                                            </h2>
                                        </td>
													
                                        <td>5 Nov 2019 <span class="text-primary d-block">11.00 AM - 11.35 AM</span></td>
                                        <td>
                                            <div class="status-toggle">
                                                <input type="checkbox" id="status_2" class="check" checked>
                                                <label for="status_2" class="checktoggle">checkbox</label>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            $300.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-03.jpg" alt="User Image"></a>
                                                <a href="profile.html">Dr. Deborah Angel</a>
                                            </h2>
                                        </td>
                                        <td>Cardiology</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient3.jpg" alt="User Image"></a>
                                                <a href="profile.html">Carl Kelly</a>
                                            </h2>
                                        </td>
                                        <td>11 Nov 2019 <span class="text-primary d-block">12.00 PM - 12.15 PM</span></td>
                                        <td>
                                            <div class="status-toggle">
                                                <input type="checkbox" id="status_3" class="check" checked>
                                                <label for="status_3" class="checktoggle">checkbox</label>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            $150.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-04.jpg" alt="User Image"></a>
                                                <a href="profile.html">Dr. Sofia Brient</a>
                                            </h2>
                                        </td>
                                        <td>Urology</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient4.jpg" alt="User Image"></a>
                                                <a href="profile.html"> Michelle Fairfax</a>
                                            </h2>
                                        </td>
                                        <td>7 Nov 2019<span class="text-primary d-block">1.00 PM - 1.20 PM</span></td>
                                        <td>
                                            <div class="status-toggle">
                                                <input type="checkbox" id="status_4" class="check" checked>
                                                <label for="status_4" class="checktoggle">checkbox</label>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            $150.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-05.jpg" alt="User Image"></a>
                                                <a href="profile.html">Dr. Marvin Campbell</a>
                                            </h2>
                                        </td>
                                        <td>Orthopaedics</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient5.jpg" alt="User Image"></a>
                                                <a href="profile.html">Gina Moore</a>
                                            </h2>
                                        </td>
													
                                        <td>15 Nov 2019 <span class="text-primary d-block">1.00 PM - 1.15 PM</span></td>
                                        <td>
                                            <div class="status-toggle">
                                                <input type="checkbox" id="status_5" class="check" checked>
                                                <label for="status_5" class="checktoggle">checkbox</label>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            $200.00
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /Recent Orders -->
							
            </div>
        </div> --}}
					
    </div>			
</div>
<!-- /Page Wrapper -->
@endsection