@extends('layouts.frontend_template')
@section('title', 'About Page')
@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">About Us</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->
<!-- Page Content -->
<div class="content success-page-cont">
    <div class="container-fluid">
				
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-6">
				<h1>About us</h1>			
            </div>
        </div>
					
    </div>
</div>		
<!-- /Page Content -->
@endsection