@extends('layouts.frontend_template')
@section('title','Court')
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
                <!-- Recent Orders -->
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('owner.court.create') }}" class="btn btn-sm btn-info float-right mb-2">
                            <i class="fas fa-plus"></i> Add New
                        </a>
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
                        <div class="table-responsive">
                            <table class="datatable table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Quarter</th>
                                        <th>Owner</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1;
                                    @endphp
                                    @foreach ($courts as $court)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                <a href="{{route('court.show',$court->id)}}" class="avatar avatar-sm mr-2"><img
                                                            class="avatar-img mr-2"
                                                            src="{{ asset($court->photo) }}"
                                                            alt="Court Image">{{ substr($court->name,0,10) }}</a>
                                                </h2>
                                            </td>
                                            <td>{{ $court->quarter->name }}</td>
                                            <td>{{ $court->user->name }}</td>
                                            <td>
                                                <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                                    <a href="{{ route('owner.court.edit', $court->id) }}"
                                                        class="btn btn-sm btn-info mr-1">Edit</a>
                                                    {{-- <form method="post"
                                                    action="{{ route('court.destroy', $court->id) }}"
                                                        class="d-inline-block"
                                                        onsubmit="return confirm('Are you Sure to Delete?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" name="btnsubmit" value="Delete"
                                                            class="btn btn-sm btn-danger">
                                                    </form> --}}
                                                </div>
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
        </div>

    </div>

</div>		
<!-- /Page Content -->
@endsection