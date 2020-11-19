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
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-link active" id="nav-pending-tab" data-toggle="tab" href="#nav-pending" role="tab" aria-controls="nav-pending" aria-selected="true"> Booking - Pending </a>
                        <a class="nav-link" id="nav-confirm-tab" data-toggle="tab" href="#nav-confirm" role="tab" aria-controls="nav-confirm" aria-selected="false"> Booking - Confirm </a>
                        <a class="nav-link" id="nav-cancel-tab" data-toggle="tab" href="#nav-cancel" role="tab" aria-controls="nav-cancel" aria-selected="false"> Booking - Cancel </a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active py-4" id="nav-pending" role="tabpanel" aria-labelledby="nav-pending-tab">    
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered display" >
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Date </th>
                                        <th> Booking No </th>
                                        <th> Total </th>
                                        <th> Status </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $num = 1;
                                    @endphp
                                    @foreach ($pending_bookings as $pending_booking)
                                    <tr>
                                        <td> {{ $num++  }}.</td>
                                        <td> 
                                            <div class="text-dark">{{ date_format(date_create($pending_booking->booking_date),"d-M-Y") }}</div>
                                            <div class="row">
                                                <div class="text-success col-md-5"><small>{{ date_format(date_create($pending_booking->start_time),"H:i A") }}</small></div>
                                                <div class="text-success col-md-5"><small>{{ date_format(date_create($pending_booking->end_time),"H:i A") }}</small></div>
                                            </div> 
                                        </td>
                                        <td> {{ $pending_booking->booking_no }} </td>
                                        <td> {{ $pending_booking->total_amount }} MMK </td>
                                        <th> 
                                            @if ($pending_booking->status == 0)
                                                <div>
                                                   <p class="text-success">Pending</p>
                                                </div>
                                            @else
                                                <div>
                                                    <p class="text-success">Confirmed</p>
                                                </div>
                                            @endif
                                        </th>
                                        <td>
                                            <div class="row offset-md-2">
                                                <div class="mr-1">
                                                    <a href="{{ route('owner.booking_detail', $pending_booking->id ) }}" class="btn btn-sm btn-info">
                                                        <i class="fas fa-info"></i>
                                                    </a>
                                                </div>
                                                <div class="mr-1">
                                                    <form method="post" action="{{route('owner.booking_confirm',$pending_booking->id)}}">
                                                        @csrf
                                                        @method('put')    
                                                        <button href="" type="submit" class="btn btn-sm btn-success">
                                                        <i class="fas fa-check"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                <div>
                                                    <a href="#" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-times"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                    </div>
                        
                    <div class="tab-pane fade py-4" id="nav-confirm" role="tabpanel" aria-labelledby="nav-confirm-tab">
                            
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered display">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Date </th>
                                        <th> Booking No </th>
                                        <th> Total </th>
                                        <th> Status </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $num = 1;
                                    @endphp
                                    @foreach ($confirmed_bookings as $confirmed_booking)
                                    <tr>
                                        <td> {{ $num++ }}. </td>
                                        <td> {{ $confirmed_booking->booking_date }} </td>
                                        <td> {{ $confirmed_booking->booking_no }} </td>
                                        <td> {{ $confirmed_booking->total_amount }} MMK</td>
                                        <th> 
                                            @if ($confirmed_booking->status == 0)
                                            <div>
                                               <p class="text-success">Pending</p>
                                            </div>
                                            @else
                                                <div>
                                                    <p class="text-success">Confirmed</p>
                                                </div>
                                            @endif
                                        </th>
                                        <td>
                                            <a href="{{ route('owner.booking_detail', $confirmed_booking->id) }}" class="btn btn-outline-info">
                                                <i class="fas fa-info"></i>
                                            </a>
                                            <a href="#" class="btn btn-outline-danger">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                        
                    <div class="tab-pane fade py-4" id="nav-cancel" role="tabpanel" aria-labelledby="nav-cancel-tab">
                            
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered display">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Date </th>
                                        <th> Booking No </th>
                                        <th> Total </th>
                                        <th> Status </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <tr>
                                        <td>  </td>
                                        <td>  </td>
                                        <td>  </td>
                                        <td>  </td>
                                        <th> </th>
                                        <td>
                                            <a href="#" class="btn btn-outline-info">
                                                <i class="fas fa-info"></i>
                                            </a>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>    
        </div>

    </div>

</div>		
<!-- /Page Content -->
@endsection
{{-- @section('script')
<script type="text/javascript">
    $('#sampleTable').DataTable();
    $('table.display').DataTable();
</script> 
@endsection --}}