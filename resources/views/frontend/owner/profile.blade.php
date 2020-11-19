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
                        <div class="row align-items-center">
                            <div class="col-auto profile-image">
                                <a href="#">
                                    <img class="rounded-circle userProfileImage" alt="User Image" src="{{ asset($owner->photo) }}">
                                </a>
                            </div>
                            <div class="col ml-md-n2 profile-user-info">
                                <h4 class="user-name mb-0">{{ $owner->name }}</h4>
                                <h6 class="text-muted">{{ $owner->email }}</h6>
                                {{-- <h6 class="text-muted">{{ $user->phone }}</h6> --}}
                                <div class="user-Location"><i class="fa fa-map-marker-alt"></i> {{$owner->address}}</div>
                            </div>
                            <div class="col-auto profile-btn">
                                <div class="col-xl-1 col-lg-1 col-md-12 col-sm-12 col-12 order-xl-3 order-lg-3 order-md-2 order-sm-2 order-2">
                                    <button class="btn btn-info float-right profile_editBtn" type="button"> 
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger float-right profile_cancelBtn" type="button"> 
                                        <i class="fas fa-window-close"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 {{-- edit profile  --}}
                    {{-- flash back message start--}}
                    @if (!empty(session()->get('success')))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong class="mr-1">Update Success !</strong>{!! session()->get('error') !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    {{-- flash back message end--}}
                    <fieldset disabled>
                        <form action="{{ route('user.update',$owner->id) }}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <input name="oldphoto" type="hidden" value="{{ $owner->photo }}">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input name="newphoto" type='file' id="imageUpload" accept=".png, .jpg, .jpeg" disabled="" data-user_id = ""  />
                                    <label for="imageUpload"></label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputName"> Name</label>
                                        <input name="name" class="form-control py-4" id="inputName" type="text" placeholder="Enter Name" value="{{ $owner->name }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="phone">Phone Number</label>
                                        <input name="phone" class="form-control py-4" id="phone" type="text" placeholder="Enter Phone Number" value="{{ $owner->phone }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputEmailAddress">Email</label>
                                        <input class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" name="email" value="{{ $owner->email }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="address"> Address </label>
                                <textarea class="form-control" name="address">{{ $owner->address }}</textarea>
                            </div>

                            <div class="form-group hideForm d-flex align-items-center justify-content-between mt-4 mb-0">
                                <button type="submit" class="btn btn-outline-primary"> Save </button>
                            </div>
                        </form>
                    </fieldset>
                {{-- edit profile  --}}
            </div>
        </div>

    </div>

</div>		
<!-- /Page Content -->
@endsection
@section('script')
<script>
    $(document).ready(function(){

        $('.profile_editBtn').show();
        $('.profile_cancelBtn').hide();

        $('.profile_editBtn').on('click', function(){
            $("fieldset").removeAttr("disabled");
            $("#imageUpload").removeAttr("disabled");

            $('.profile_editBtn').hide();
            $('.profile_cancelBtn').show();

        });

        $('.profile_cancelBtn').on('click', function(){
            $('#imageUpload').prop('disabled', true);
            $('fieldset').prop('disabled', true);


            $('.profile_editBtn').show();
            $('.profile_cancelBtn').hide();

        });
    });
</script>
@endsection