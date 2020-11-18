@extends('layouts.frontend_template')
@section('title','Profile')
@section('content')
<style>
    .userProfileImage {
        width: 120px!important;
        height: 120px!important;
        object-fit: cover;
    }
</style>
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">User Profile</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->
<!-- Page Content -->
<div class="content">
    <div class="container">
        {{-- profile card --}}
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">                                                           
                        <div class="row align-items-center">
                            <div class="col-auto profile-image">
                                <a href="#">
                                    <img class="rounded-circle userProfileImage" alt="User Image" src="{{ asset($user->photo) }}">
                                </a>
                            </div>
                            <div class="col ml-md-n2 profile-user-info">
                                <h4 class="user-name mb-0">{{ $user->name }}</h4>
                                <h6 class="text-muted">{{ $user->email }}</h6>
                                <h6 class="text-muted">{{ $user->phone }}</h6>
                                <div class="user-Location"><i class="fa fa-map-marker"></i> {{$user->address}}</div>
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
            </div>
        </div>
        {{-- profile card --}}

        {{-- edit profile  --}}
        <div class="col-md-10 offset-md-1">
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
                <form action="{{ route('user.update',$user->id) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <input name="oldphoto" type="hidden" value="{{ $user->photo }}">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input name="newphoto" type='file' id="imageUpload" accept=".png, .jpg, .jpeg" disabled="" data-user_id = ""  />
                            <label for="imageUpload"></label>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="inputName"> Name</label>
                                <input name="name" class="form-control py-4" id="inputName" type="text" placeholder="Enter Name" value="{{ $user->name }}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="phone">Phone Number</label>
                                <input name="phone" class="form-control py-4" id="phone" type="text" placeholder="Enter Phone Number" value="{{ $user->phone }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                <input class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" name="email" value="{{ $user->email }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="address"> Address </label>
                        <textarea class="form-control" name="address">{{ $user->address }}</textarea>
                    </div>

                    <div class="form-group hideForm d-flex align-items-center justify-content-between mt-4 mb-0">
                        <button type="submit" class="btn btn-outline-primary"> Save </button>
                    </div>
                </form>
            </fieldset>
    </div>
        {{-- edit profile  --}}
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