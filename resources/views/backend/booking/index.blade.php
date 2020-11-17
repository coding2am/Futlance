@extends('layouts.backend_template')
@section('title', 'Bookings List')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Bookings</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Bookings</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
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
                            <table class="datatable table table-hover table-center mb-0">
                                <thead>
                                    @php
                                    $num = 1;
                                    @endphp
                                    <tr>
                                        <th>#</th>
                                        <th>Booking No</th>
                                        <th>Date</th>
                                        <th>Booking by</th>
                                        <th>Court</th>
                                        <th>Payment method</th>
                                        <th>Request booking at</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $booking)
                                        <tr>
                                            <td>{{ $num++ }}</td>
                                            <td>{{ $booking->booking_no }}</td>
                                            <td>
                                                {{-- <td>{{ $booking->booking_date }} <span class="text-primary d-block">{{ $booking->start_time }} - {{ $booking->end_time }}</span></td> --}}
                                                <div class="text-dark">{{ $booking->booking_date }}</div>
                                                <div class="row">
                                                    <div class="text-success col-md-4"><small>{{ $booking->start_time }}</small></div>
                                                    <div class="text-success col-md-4"><small>{{ $booking->end_time }}</small></div>
                                                </div>
                                            </td>
                                            <td>{{ $booking->user->name }}</td>
                                            <td>{{ $booking->court->name }}</td>
                                            <td>{{ $booking->paymentMethod->name }}</td>
                                            <td>{{ $booking->created_at->diffForHumans()}}</td>
                                            <td>
                                                @if ($booking->status == 0)
                                                    <div>
                                                       <p class="text-success">Pending</p>
                                                    </div>
                                                @else
                                                    <div>
                                                        <p class="text-success">Confirmed</p>
                                                    </div>
                                                @endif
                                            <td>
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
<!-- /Page Wrapper -->
@endsection