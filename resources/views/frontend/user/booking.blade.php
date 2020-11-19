@extends('layouts.frontend_template')
@section('title','Booking History')
@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Booking History</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Booking History</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->
<!-- Page Content -->
<div class="content">
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($bookings as $booking)
            <div class="col-sm-4 my-3">
                <div class="card bookingCard">
                    <div class="ribbon ribbon-top-right 
                    @if($booking->status == 0) ribbon_pending 
                    @elseif($booking->status == 1) ribbon_confirm
                    @elseif($booking->status == 2) ribbon_cancel
                    @endif">
                        <span> 
                            @if ($booking->status == 0)
                                <div>
                                   <p class="text-light">Pending</p>
                                </div>
                            @elseif ($booking->status == 1) 
                                <div>
                                    <p class="text-light">Confirmed</p>
                                </div>
                            @else
                            <div>
                                <p class="text-light">Canceled</p>
                            </div>
                            @endif
                        </span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"> {{ $booking->booking_no }} </h5>
                        <p class="card-text"> Total: {{ $booking->total_amount }} MMK </p>

                        <a href="{{ route('booking.invoice', $booking->id) }}" class="btn btn-primary btn-sm">
                            View Invoice
                        </a>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- /Page Content -->
@endsection