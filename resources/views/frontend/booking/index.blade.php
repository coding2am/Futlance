@extends('layouts.frontend_template')
@section('title', 'Booking')
@section('content')

    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Booking</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Booking</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->
    <!-- Page Content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="booking-doc-info">
                                <a href="doctor-profile.html" class="booking-doc-img">
                                    <img src="{{ asset('my_assets/frontend/assets/img/doctors/doctor-thumb-02.jpg') }}"
                                        alt="User Image">
                                </a>
                                <div class="booking-info">
                                    <h4><a href="doctor-profile.html">Dr. Darren Elder</a></h4>
                                    <div class="rating">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="d-inline-block average-rating">35</span>
                                    </div>
                                    <p class="text-muted mb-0"><i class="fas fa-map-marker-alt"></i> Newyork, USA</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Schedule Widget -->
                    <div class="card p-3">
                        <div class="row col-md-12">
                            <div class="form-group col-md-12">
                                <label for="date">Date</label>
                                <input type="date" name="date" id="date" class="form-control date">
                            </div>
                            {{-- taken section message--}}
                            <div class="col-md-12">
                                <div class="returnMsg">
                                    <span class="text-muted"></span>
                                </div>
                            </div>
                            {{-- taken section message--}}

                            {{-- date error message start--}}
                            <div class="col-md-12">
                                <div class="returnError">
                                    <span class="text-muted"></span>
                                </div>
                            </div>
                            {{-- date error message end--}}
                            <div class="form-group col-md-6">
                                <label for="from">From</label>
                                <input type="time" name="from" id="from" class="form-control time" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="to">To</label>
                                <input type="time" name="to" id="to" class="form-control time" disabled>
                            </div>
                            {{-- time error message start--}}
                            <div class="col-md-12">
                                <div class="returnTimeError">
                                    <span class="text-muted"></span>
                                </div>
                            </div>
                            {{-- time error message end--}}
                        </div>
                        <div class="row col-md-12">
                            <div class="form-group col-md-6">
                                <input type="reset" class="btn btn-block btn-outline-info" value="Reset">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="submit" class="btn btn-block btn-outline-success" value="Checkout">
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
        // date change function start
        $('.date').change(function() {
            let date = $(this).val();
            //alert(date);
            $.post("{{ route('filterTime') }}", {
                date: date,
            }, function(response) {
                //console.log(response);
                var html = "";
                for (let row of response) {
                    html +=
                        `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong class="mr-1">Already Taken Sections!</strong>${row.start_time} -- ${row.end_time}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>`;
                }
                $('.returnMsg').html(html);
                $('.time').prop('disabled', false);

            })
        

            $.post("{{ route('filterCheckDate') }}", {
                date: date
            }, function(response) {
                //console.log(response);
                var html = "";
                if (response) {
                    html +=
                        `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong class="mr-1">Booking Error!</strong>${response} 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>`;
                }
                $('.returnError').html(html);
                $('.time').prop('disabled', false);

            })
        })
        // date change function end

        // from time change function start
        $('#from').change(function() {
            let from = $(this).val();
            $.post("{{ route('filterCheckStartTime') }}", {
                from: from,
            }, function(response) {
                //console.log(response);
                var html = "";
                if(response)
                {
                    html += `
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong class="mr-1">Booking Time Over!</strong>${response}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>`;
                }
                            
                $('.returnTimeError').html(html);       
            });

        });
        // from time change function end

        // TO time change function start
        $('#to').change(function() {
            let to = $(this).val();
            $.post("{{ route('filterCheckEndTime') }}", {
                to: to,
            }, function(response) {
                //console.log(response);
                var html = "";
                if(response)
                {
                    html += `
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong class="mr-1">Booking Time Over!</strong>${response}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>`;
                }
                            
                $('.returnTimeError').html(html);        
            });

        });
        // TO time change function end

    })            

</script>
@endsection
