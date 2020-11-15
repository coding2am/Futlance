@extends('layouts.backend_template')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">
				
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Appointments</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Appointments</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="row">
            <div class="col-md-12">
						
                <!-- Recent Orders -->
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Booking No</th>
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
                                        <td>7 Nov 2019 <span class="text-primary d-block">1.00 PM - 1.20 PM</span></td>
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
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-06.jpg" alt="User Image"></a>
                                                <a href="profile.html">Dr. Katharine Berthold</a>
                                            </h2>
                                        </td>
                                        <td>Orthopaedics</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient6.jpg" alt="User Image"></a>
                                                <a href="profile.html">Elsie Gilley</a>
                                            </h2>
                                        </td>
													
                                        <td>16 Nov 2019 <span class="text-primary d-block">1.00 PM - 1.15 PM</span></td>
                                        <td>
                                            <div class="status-toggle">
                                                <input type="checkbox" id="status_5" class="check" checked>
                                                <label for="status_5" class="checktoggle">checkbox</label>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            $250.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-07.jpg" alt="User Image"></a>
                                                <a href="profile.html">Dr. Linda Tobin</a>
                                            </h2>
                                        </td>
                                        <td>Neurology</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient7.jpg" alt="User Image"></a>
                                                <a href="profile.html">Joan Gardner</a>
                                            </h2>
                                        </td>
													
                                        <td>18 Nov 2019 <span class="text-primary d-block">1.10 PM - 1.25 PM</span></td>
                                        <td>
                                            <div class="status-toggle">
                                                <input type="checkbox" id="status_5" class="check" checked>
                                                <label for="status_5" class="checktoggle">checkbox</label>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            $260.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-08.jpg" alt="User Image"></a>
                                                <a href="profile.html">Dr. Paul Richard</a>
                                            </h2>
                                        </td>
                                        <td>Dermatology</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient8.jpg" alt="User Image"></a>
                                                <a href="profile.html"> Daniel Griffing</a>
                                            </h2>
                                        </td>
													
                                        <td>18 Nov 2019 <span class="text-primary d-block">11.10 AM - 11.25 AM</span></td>
                                        <td>
                                            <div class="status-toggle">
                                                <input type="checkbox" id="status_5" class="check" checked>
                                                <label for="status_5" class="checktoggle">checkbox</label>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            $260.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-09.jpg" alt="User Image"></a>
                                                <a href="profile.html">Dr. John Gibbs</a>
                                            </h2>
                                        </td>
                                        <td>Dental</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient9.jpg" alt="User Image"></a>
                                                <a href="profile.html">Walter Roberson</a>
                                            </h2>
                                        </td>
													
                                        <td>21 Nov 2019 <span class="text-primary d-block">12.10 PM - 12.25 PM</span></td>
                                        <td>
                                            <div class="status-toggle">
                                                <input type="checkbox" id="status_5" class="check" checked>
                                                <label for="status_5" class="checktoggle">checkbox</label>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            $300.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-10.jpg" alt="User Image"></a>
                                                <a href="profile.html">Dr. Olga Barlow</a>
                                            </h2>
                                        </td>
                                        <td>Dental</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient10.jpg" alt="User Image"></a>
                                                <a href="profile.html">Robert Rhodes</a>
                                            </h2>
                                        </td>
													
                                        <td>23 Nov 2019 <span class="text-primary d-block">12.10 PM - 12.25 PM</span></td>
                                        <td>
                                            <div class="status-toggle">
                                                <input type="checkbox" id="status_5" class="check" checked>
                                                <label for="status_5" class="checktoggle">checkbox</label>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            $300.00
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /Recent Orders -->
							
            </div>
        </div>
    </div>			
</div>
<!-- /Page Wrapper -->
@endsection