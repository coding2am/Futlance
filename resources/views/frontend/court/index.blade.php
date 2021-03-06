@extends('layouts.frontend_template')
@section('title', 'Courts Page')
@section('content')
<style>
    .courtImage {
        width: 400px!important;
        height: 200px!important;
        object-fit: cover;
    }

    .left_border {
        border-color: #408BEA;
        border-left: solid 5px #408bea;
        padding-left: 10px;
    }
</style>

 <div class="container">
     <!-- Search -->
     <div class="row p-0 mt-5">
        <div class="col-md-4 mt-3">
            <select name="quarter" class="custom-select city">
                <optgroup label="Choose City">
                    @foreach($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                    </optgroup>
            </select>
            <span class="form-text">Based on your City</span>
        </div>
        <div class="col-md-6 mt-3">
            <select name="quarter" class="custom-select quarter" disabled="true">
                <optgroup label="Choose Quarter" class="quarter_option">
                    @foreach($quarters as $quarter)
                    <option value="{{ $quarter->id }}">{{ $quarter->name }}</option>
                    @endforeach
                </optgroup>
            </select>
        </div>
        <div class="col-md-2 mt-3">
            <button type="submit" class="btn btn-primary searchBtn"><i class="fas fa-search"></i> <span>Search</span></button>
        </div>
    </div>
    <!-- /Search -->
    <!-- Courts -->
    <h1 class="left_border mt-5 allCourts">Futsal Courts</h1>
    <div class="row mt-5 allCourts">
        @foreach ($courts as $court)
        <div class="col-md-3 col-sm-6">
            <div class="profile-widget">
                <div class="doc-img">
                    <a href="{{ route('court_detail', $court->id) }}">
                        <img class="img-fluid courtImage" alt="User Image" src="{{ asset($court->photo) }}">
                    </a>
                    <a href="javascript:void(0)" class="fav-btn">
                        <i class="far fa-bookmark"></i>
                    </a>
                </div>
                <div class="pro-content">
                    <h3 class="title">
                        <a href="{{ route('court_detail', $court->id) }}">{{ $court->name }}</a> 
                        <i class="fas fa-check-circle verified"></i>
                    </h3>
                    <div class="rating">
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                    </div>
                    <ul class="available-info">
                        <li>
                            <i class="fas fa-map-marker-alt"></i> {{ $court->quarter->name }}, {{ $court->quarter->city->name }}
                        </li>
                        <li>
                            <i class="far fa-clock"></i> Available on 6 Am to 9 Pm
                        </li>
                        <li>
                            <i class="far fa-money-bill-alt"></i> {{ $court->price_per_hour }} MMK
                            <i class="fas fa-info-circle" data-toggle="tooltip" title="Price Per Hour"></i>
                        </li>
                    </ul>
                    <div class="row row-sm">
                        <div class="col-6">
                            <a href="{{ route('court_detail', $court->id) }}" class="btn view-btn">View</a>
                        </div>
                        <div class="col-6">
                            <a href="@if(Auth::user()) {{route('court_booking', $court->id)}} @else {{route('user.signin')}}  @endif" class="btn book-btn">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- /Courts -->
</div>

<!-- Search Courts -->
<div class="container filtered_courts mt-5">
    <h1 class="left_border">Search Results</h1>
    <div class="row mt-5 courts">
    {{-- filtered courts --}}
    </div>
</div>
<!-- /Search Courts -->

@endsection
@section('script')
  <script type="text/javascript">
    $(document).ready(function () {
        $('.filtered_courts').hide();
        $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.city').change(function () {
            let city_id = $(this).val();
            // alert(city_id);
            $.post("{{route('filterCity')}}",{cid:city_id},function (response) {
            //   console.log(response);
            var html = "";
            for(let row of response){
                html+=`<option value="${row.id}">${row.name}</option>`;
            }
            $('.quarter_option').html(html);
            $('.quarter').prop('disabled',false);
            
            })
        })

        $('.searchBtn').click(function() {
            // alert('ok');
            let quarter_id = $('.quarter').val();
            // console.log(quarter_id);
            $.post("{{route('filterQuarter')}}",{qid:quarter_id},function (response) {
            //   console.log(response);
                var html = "";
                for(let row of response){
                html+=`
                <div class="col-md-3 col-sm-6">
                    <div class="profile-widget">
                        <div class="doc-img">
                            <a href="/court_detail/${ row.id }">
                                <img class="img-fluid courtImage" alt="Court Image" src="${ row.photo }">
                            </a>
                            <a href="javascript:void(0)" class="fav-btn">
                                <i class="far fa-bookmark"></i>
                            </a>
                        </div>
                        <div class="pro-content">
                            <h3 class="title">
                                <a href="/court_detail/${ row.id }">${ row.name }</a> 
                                <i class="fas fa-check-circle verified"></i>
                            </h3>
                            <div class="rating">
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                            </div>
                            <ul class="available-info">
                                <li>
                                    <i class="far fa-clock"></i> Available on 6 Am to 9 Pm
                                </li>
                                <li>
                                    <i class="far fa-money-bill-alt"></i> ${ row.price_per_hour } MMK
                                    <i class="fas fa-info-circle" data-toggle="tooltip" title="Price Per Hour"></i>
                                </li>
                            </ul>
                            <div class="row row-sm">
                                <div class="col-6">
                                    <a href="/court_detail/${ row.id }" class="btn view-btn">View</a>
                                </div>
                                <div class="col-6">
                                    <a href="@if(Auth::user()) /court_booking/${ row.id } @else {{route('user.signin')}}  @endif" class="btn book-btn">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`;
                }
                $('.allCourts').hide();
                $('.filtered_courts').show();
                $('.courts').html(html);          
            })
        })
    })
  </script>
@endsection
