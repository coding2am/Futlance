@extends('layouts.frontend_template')
@section('title','Court Edit')
@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Court Edit</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Court Edit</h2>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div>
                                <h2 class="text text-center text-muted my-5">Court Registraction Form</h2>
                            </div>
                                <form method="post" action="{{ route('owner.court.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row no-gutters">
                                        {{-- photo --}}
                                        <div class="form-group col-md-10 offset-md-1">
                                            <label>Photo:(<small class="text-danger">*
                                                    jpeg | jpg | bmp | png</small>)</label>
                                            <input type="file" name="photo"
                                                class="form-control-file @error('photo') is-invalid @enderror">
                                            @error('photo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row no-gutters">
                                        {{-- name --}}
                                        <div class="form-group col-md-4 offset-md-1">
                                            <label>Name</label>
                                            <input name="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name') }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        {{-- price --}}
                                        <div class="form-group col-md-4 offset-md-1">
                                            <label>Price <span class="text-muted">(Price per hour)</span></label>
                                            <div>
                                                <input name="price" type="number"
                                                    class="form-control @error('price') is-invalid @enderror"
                                                    value="{{ old('price') }}">
                                                @error('price')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row no-gutters">
                                        {{-- city --}}
                                        <div class="form-group col-md-4 offset-md-1">
                                            <label>City</label>
                                            <div>
                                                <select name="quarter" class="custom-select city">
                                                    <optgroup label="Choose City">
                                                        @foreach ($cities as $city)
                                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                        @endforeach
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        {{-- quarter --}}
                                        <div class="form-group col-md-4 offset-md-1">
                                            <label>Quarter</label>
                                            <div>
                                                <select name="quarter" class="custom-select quarter" disabled="true">
                                                    <optgroup label="Choose Quarter" class="quarter_option">
                                                        @foreach ($quarters as $quarter)
                                                            <option value="{{ $quarter->id }}">{{ $quarter->name }}</option>
                                                        @endforeach
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        {{-- owner user_id --}}
                                        <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                                        {{-- button --}}
                                        <div class="form-group col-md-9 offset-md-1">
                                            <button type="submit" class="btn btn-block btn-dark">Create</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>		
<!-- /Page Content -->
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.city').change(function() {
                let city_id = $(this).val();
                // alert(city_id);
                $.post("{{ route('filterCity') }}", {
                    cid: city_id
                }, function(response) {
                    //   console.log(response);
                    var html = "";
                    for (let row of response) {
                        html += `<option value="${row.id}">${row.name}</option>`;
                    }
                    $('.quarter_option').html(html);
                    $('.quarter').prop('disabled', false);

                })
            })
        })

    </script>
@endsection