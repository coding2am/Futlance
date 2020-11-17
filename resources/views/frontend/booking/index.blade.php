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
            {{-- <form> --}}
                {{-- @csrf --}}
                <div class="row">
                    <div class="col-md-7 col-lg-8">
                        <div class="card">
                            <div class="card-body">                                                           
                                <!-- Checkout Form -->
                                <form action="{{route('storeBooking')}}" method="post">
                                    @csrf  
                                    <!-- hidden values -->
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <input type="hidden" name="court_id" value="{{$court->id}}">
                                    <input type="hidden" id="section" name="section" value="">
                                    <input type="hidden" id="total" name="total" value="">
                                    <!-- /hidden values -->

                                    <!-- Booking Information -->
                                    <div class="info-widget">
                                        <h4 class="card-title">Booking Information</h4>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group card-label">
                                                    <label>Date</label>
                                                    <input id="date" name="date" type="date" class="form-control date">
                                                </div>
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
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group card-label">
                                                    <label>From</label>
                                                    <input id="from" name="start_time" type="time" class="form-control time" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group card-label">
                                                    <label>To</label>
                                                    <input id="to" name="end_time" type="time" class="form-control time" disabled>
                                                </div>
                                            </div>
                                            {{-- time error message start--}}
                                            <div class="col-md-12">
                                                <div class="returnTimeError">
                                                    <span class="text-muted"></span>
                                                </div>
                                            </div>
                                            {{-- time error message end--}}
                                        </div>
                                    </div>
                                    <!-- /Booking Information -->

                                    <!-- Personal Information -->
                                    <div class="info-widget">
                                        <h4 class="card-title">Personal Information</h4>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group card-label">
                                                    <label>Name</label>
                                                    <input name="name" class="form-control name" readonly type="text" 
                                                    @guest
                                                    @else value="{{ Auth::user()->name }}"
                                                    @endguest>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group card-label">
                                                    <label>Phone</label>
                                                    <input name="phone" class="form-control phone" readonly type="text"
                                                    @guest
                                                    @else value="{{ Auth::user()->phone }}"
                                                    @endguest>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Personal Information -->

                                    <!-- Payment Methods -->       
                                    <div class="payment-widget">
                                        <h4 class="card-title">Payment Method</h4>
                                        @foreach ($paymentMethods as $paymentMethod)
                                        <div class="payment-list">
                                            <label class="payment-radio credit-card-option">
                                                <input id="paymentMethod" name="paymentMethod" value="{{ $paymentMethod->id }}" type="radio">
                                                <span class="checkmark"></span>
                                                {{ $paymentMethod->name }}
                                            </label>
                                        </div>
                                        @endforeach
                                        <!-- /Payment Methods -->
                                    </div>

                                    <!-- Note -->
                                    <hr>
                                    <div class="info-widget mt-3">
                                        <h4 class="card-title">Additional</h4>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group card-label">
                                                    <label>Note</label>
                                                    <input id="note" name="note" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>   
                                        <!-- Terms Accept -->
                                        <div class="terms-accept">
                                            <div class="custom-checkbox">
                                            <input type="checkbox" id="terms_accept">
                                            <label for="terms_accept">I have read and accept <a href="#">Terms &amp; Conditions</a></label>
                                            </div>
                                        </div>
                                        <!-- /Terms Accept -->                                       
                                    </div>
                                    <!-- Note -->
                                    

                                    <!-- Submit Button -->
                                    <div>
                                        <input type="submit" class="btn submit-btn btn-success" value="Confirm and Pay">
                                    </div>
                                    <!-- /Submit Button -->
                                </form>           
                                <!-- /Checkout Form -->       
                            </div>
                        </div>
                    </div>
                    <!-- Booking Summery -->
                    <div class="col-md-5 col-lg-4 theiaStickySidebar">
                            
                        <!-- Booking Summary -->
                        <div class="card booking-card">
                            <div class="card-header">
                                <h4 class="card-title">Booking Summary</h4>
                            </div>
                            <div class="card-body">
                                    
                                <!-- Booking Doctor Info -->
                                <div class="booking-doc-info">
                                    <a href="doctor-profile.html" class="booking-doc-img">
                                        <img src="{{ asset($court->photo) }}" alt="User Image">
                                    </a>
                                    <div class="booking-info">
                                        <h4><a href="doctor-profile.html">{{ $court->name }}</a></h4>
                                        <div class="rating">
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                        </div>
                                        <div class="clinic-details">
                                            <p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{ $court->quarter->name }}, {{ $court->quarter->city->name }}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Booking Doctor Info -->
                                        
                                <div class="booking-summary">
                                    <div class="booking-item-wrap">
                                        <ul class="booking-date">
                                            <li>Date <span class="summaryDate"></span></li>
                                            <li>Time <span class="summaryTime"></span></li>
                                            <li>Section(s) <span class="summarySection"></span></li>
                                            <li>Pre-Paid(%) <span> 35 %</span></li>
                                        </ul>
                                        <ul class="booking-fee">
                                            <input class="price" type="hidden" value="{{ $court->price_per_hour }}">
                                            <li>Section Fee (1 sec = 1 hr) <span>{{ $court->price_per_hour }} MMK</span></li>
                                        </ul>
                                        <div class="booking-total">
                                            <ul class="booking-total-list">
                                                <li>
                                                    <span>Total</span>
                                                    <span class="total-cost summaryTotal"></span>
                                                </li>
                                                <li>
                                                    <span>Pre-Paid Amount</span>
                                                    <span class="total-cost summaryPrePaid"></span>
                                                </li>
                                            </ul>
                                        </div>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Booking Summary -->
                                
                    </div>
                    <!-- /Booking Summery -->
                </div>
            {{-- </form> --}}
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
                let html = "";
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
                let html = "";
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
                let html = "";
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
                let html = "";
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

        
        $("#date, #from, #to").change('keyup',function() {
            let date = $('#date').val();
            let start_time = $('#from').val();
            let end_time = $('#to').val();

            let fullTime = start_time + '-' + end_time;
            $('.summaryDate').html(date);
            $('.summaryTime').html(fullTime);


            s = start_time.split(':');
            e = end_time.split(':');

            min = e[1]-s[1];
            hour_carry = 0;
            if(min < 0){
                min += 60;
                hour_carry += 1;
            }
            hour = e[0]-s[0]-hour_carry;
            diff = hour + ":" + min;

            //converting to minutes
            let hourtToMin = hour * 60;
            let totalMinutes = hourtToMin + min;

            //converting to section
            var section = Math.floor(totalMinutes / 60);
            $('.summarySection').html(section);

            // console.log(section);
            let price_per_hour = parseInt($('.price').val());
            // alert(summaryFee);
            var summaryTotal = section * price_per_hour;
            $('.summaryTotal').html(summaryTotal + ' MMK');

            // prepaid
            let pre_paid = summaryTotal * 0.3;
            $('.summaryPrePaid').html(pre_paid + ' MMK');
            

            $('#section').val(section);
            $('#total').val(summaryTotal);

        })
    })            

</script>
@endsection
