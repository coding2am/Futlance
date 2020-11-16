@extends('layouts.frontend_template')
@section('title', 'Home Page')
@section('content')
<style>
    .courtImage {
        width: 400px!important;
        height: 200px!important;
        object-fit: cover;
    }
</style>
<!-- Home Banner -->
<section class="section section-search">
    <div class="container-fluid">
        <div class="banner-wrapper">
            <div class="banner-header text-center">
                <h1>Search Doctor, Make an Appointment</h1>
                <p>Discover the best doctors, clinic & hospital the city nearest to you.</p>
            </div>
                         
            <!-- Search -->
            <div class="search-box">
                <form action="">
                    <div class="form-group search-location">
                        <select name="quarter" class="custom-select city">
                            <optgroup label="Choose City">
                                @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                              </optgroup>
                        </select>
                        <span class="form-text">Based on your City</span>
                    </div>
                    <div class="form-group search-info">
                        <select name="quarter" class="custom-select quarter" disabled="true">
                            <optgroup label="Choose Quarter" class="quarter_option">
                                @foreach($quarters as $quarter)
                                <option value="{{ $quarter->id }}">{{ $quarter->name }}</option>
                                @endforeach
                            </optgroup>
                        </select>
                        {{-- <span class="form-text">Ex : Dental or Sugar Check up etc</span> --}}
                    </div>
                </form>
                <button type="submit" class="btn btn-primary search-btn mt-0"><i class="fas fa-search"></i> <span>Search</span></button>
            </div>
            <!-- /Search -->
						
        </div>
    </div>
</section>
<!-- /Home Banner -->

<!-- Popular Courts Section -->
<section class="section section-doctor">
    <div class="container-fluid">
       <div class="row">
            <!-- <div class="col-lg-4">
                <div class="section-header ">
                    <h2>Book Our Doctor</h2>
                    <p>Lorem Ipsum is simply dummy text </p>
                </div>
                <div class="about-content">
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.</p>
                    <p>web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes</p>					
                    <a href="javascript:;">Read More..</a>
                </div>
            </div> -->
            <div class="col-lg-12">
                <div class="doctor-slider slider">		
                    <!-- Court Widget -->
                    @foreach ($courts as $court)
                    <div class="profile-widget">
                        <div class="doc-img">
                            <a href="doctor-profile.html">
                                <img class="img-fluid courtImage" alt="User Image" src="{{ asset($court->photo) }}">
                            </a>
                            <a href="javascript:void(0)" class="fav-btn">
                                <i class="far fa-bookmark"></i>
                            </a>
                        </div>
                        <div class="pro-content">
                            <h3 class="title">
                                <a href="doctor-profile.html">{{ $court->name }}</a> 
                                <i class="fas fa-check-circle verified"></i>
                            </h3>
                            {{-- <p class="speciality">MDS - Periodontology and Oral Implantology, BDS</p> --}}
                            <div class="rating">
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <span class="d-inline-block average-rating">(17)</span>
                            </div>
                            <ul class="available-info">
                                <li>
                                    <i class="fas fa-map-marker-alt"></i> {{ $court->quarter->name }}
                                </li>
                                <li>
                                    <i class="far fa-clock"></i> Available on Fri, 22 Mar
                                </li>
                                <li>
                                    <i class="far fa-money-bill-alt"></i> {{ $court->price_per_hour }} MMK
                                    <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
                                </li>
                            </ul>
                            <div class="row row-sm">
                                {{-- <div class="col-6">
                                    <a href="doctor-profile.html" class="btn view-btn">View Profile</a>
                                </div> --}}
                                <div class="col-12">
                                    <a href="{{ route('court_booking', $court->id) }}" class="btn book-btn">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- /Court Widget -->
								
                </div>
            </div>
       </div>
    </div>
</section>
<!-- /Popular Courts Section -->

<!-- Courts -->
<div class="container filtered_court">
    <div class="row mt-5 courts">
        @foreach ($courts as $court)
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset($court->photo) }}" class="card-img-top" alt="court photo">
                <div class="card-body">
                  <h5 class="card-title">{{ $court->name }}</h5>
                  <p class="card-text">{{ $court->price_per_hour }} Ks (per hour)</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
        </div>
        @endforeach
    </div>
</div>
<!-- /Courts -->
@endsection
@section('script')
  <script type="text/javascript">
    $(document).ready(function () {
        $('.filtered_court').hide();
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

    // $('.quarter').change(function() {
    //     let quarter_id = $(this).val();
    //     // alert(quarter_id);
    //     $.post("{{route('filterQuarter')}}",{qid:quarter_id},function (response) {
    //     //   console.log(response);
    //       var html = "";
    //       for(let row of response){
    //         html+=`
    //         <div class="col-md-4">
    //             <div class="card" style="width: 18rem;">
    //                 <img src="${ row.photo }" class="card-img-top" alt="court photo">
    //                 <div class="card-body">
    //                   <h5 class="card-title">${ row.name }</h5>
    //                   <p class="card-text">${ row.price_per_hour } Ks (per hour)</p>
    //                   <a href="#" class="btn btn-primary">Go somewhere</a>
    //                 </div>
    //               </div>
    //         </div>`;
    //       }
    //       $('.courts').html(html);          
    //     })
    // })

    $('.search-btn').click(function() {
        let quarter_id = $('.quarter').val();
        // console.log(quarter_id);
        $.post("{{route('filterQuarter')}}",{qid:quarter_id},function (response) {
        //   console.log(response);
            var html = "";
            for(let row of response){
            html+=`
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="${ row.photo }" class="card-img-top" alt="court photo">
                    <div class="card-body">
                        <h5 class="card-title">${ row.name }</h5>
                        <p class="card-text">${ row.price_per_hour } Ks (per hour)</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    </div>
            </div>`;
            }
            $('.section-doctor').hide();
            $('.filtered_court').show();
            $('.courts').html(html);          
        })
    })


    })
  </script>
@endsection
