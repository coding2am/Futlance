@extends('layouts.backend_template')
@section('title', 'court detail')
@section('content')
<!-- Page Wrapper -->
<style>
    .detailImage
    {
        /* width: 300px!important; */
        height: 250px!important;
        object-fit: cover;
    }
</style>
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Courts</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('court.index') }}">Courts</a></li>
                        <li class="breadcrumb-item active">Court Detail</li>
                    </ul>
                </div>
            </div>
            <!-- Detail Page -->
            <div class="container-fluid">
                <div class="card table-border border-dark text-dark bg-light mb-3 col-md-8 offset-md-2 mt-5">
                    <div class="card-header bg-light">
                        <h3 class="text-center">Court Detail Page</h3>
                    </div>
                    <div class="card-body">
                    <div>
                        <div class="card border-dark">
                            <img src="{{asset($court->photo)}}" class="img-fluid detailImage">
                        </div>
                    </div>
                    <h5 class="card-title"> 
                       <div class="row">
                            <div class="text-muted col-md-6">Court Name:</div>  
                            <div class="text-dark col-md-6">{{$court->name}}</div>       
                        </div>
                    </h5>
                    <h5 class="card-title"> 
                        <div class="row">
                            <div class="text-muted col-md-6">Court Owner:</div> 
                            <div class="text-dark col-md-6">{{$court->user->name}}</div> 
                        </div>
                    </h5>
                    <h5 class="card-title"> 
                        <div class="row">
                            <div class="text-muted col-md-6">Price per hour:</div> 
                            <div class="text-dark col-md-6">{{$court->price_per_hour}} mmk</div>
                        </div>
                    </h5>
                    <h5 class="card-title"> 
                       <div class="row">
                        <div class="text-muted col-md-6">Location:</div> 
                        <div class="text-dark col-md-6">{{$court->quarter->name}} Quarter</div> 
                       </div>
                    </h5>
                    <h5 class="card-title"> 
                       <div class="row">
                        <div class="text-muted col-md-6">Court Status:</div> 
                        <div class="text-dark col-md-6">@if($court->status == 0)Running @else Closed @endif</div> 
                       </div>
                    </h5>
                    <h5 class="card-title"> 
                        <div class="row">
                            <div class="text-muted col-md-6">Created at:</div> 
                            <div class="text-dark col-md-6">{{$court->created_at->diffForHumans()}}</div> 
                        </div>
                    </h5>
                    </div>
                    <div class="col-md-6 offset-md-3 my-3">
                    <a href="{{route('court.index')}}" class="btn btn-block btn-outline-dark">Go Back</a>
                    </div>
                    
                  </div>
            </div>
        </div>
    </div>
</div>
<!-- /Page Wrapper -->
    
@endsection
