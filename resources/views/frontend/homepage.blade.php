@extends('layouts.frontend_template')
@section('title', 'Home Page')
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
    .bgCard {
        background: rgba(0,0,0,0.3);
        border-radius: 20Px;
    }
</style>
<!-- Home Banner -->
<section class="section section-search">
    <div class="container-fluid">
        <div class="banner-wrapper">
            <div class="banner-header text-center">
                <h1>Search Court, Make a Booking</h1>
                <p class="bgCard text-light col-md-8 offset-md-2">Discover the best futsal courts the city nearest to you.</p>
            </div>
                         
            <!-- Search -->
            {{-- <div class="search-box"> --}}
                <div class="row p-0">
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
            {{-- </div> --}}
            <!-- /Search -->
						
        </div>
    </div>
</section>
<!-- /Home Banner -->

<!-- Popular Courts Section -->
<section class="section section-blogs hide-section">
    <div class="container-fluid">   
        <!-- Section Header -->
        <div class="section-header text-center">
            <h2>Popular Futsal Courts</h2>
            {{-- <p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> --}}
        </div>
        <!-- /Section Header -->
        <div class="row">
            <div class="col-lg-12">
                <div class="doctor-slider slider">		
                    <!-- Court Widget -->
                    @foreach ($courts as $court)
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
                    @endforeach
                    <!-- /Court Widget -->
                                
                </div>
            </div>
        </div>
        <div class="view-all text-center mb-5"> 
            <a href="{{ route('court_page') }}" class="btn btn-primary">View All</a>
        </div>
    </div>
</section>

<!-- /Popular Courts Section -->

<!-- Blog Section -->
<section class="section section-blogs hide-section">
    <div class="container-fluid">
            
        <!-- Section Header -->
        <div class="section-header text-center">
            <h2>Blogs and News</h2>
            <p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <!-- /Section Header -->
                
        <div class="row blog-grid-row">
            <div class="col-md-6 col-lg-3 col-sm-12">
                    
                <!-- Blog Post -->
                <div class="blog grid-blog">
                    <div class="blog-image">
                        <a href="#"><img class="img-fluid" src="{{ asset('my_assets/frontend/assets/img/blog/football_1.jpg') }}" alt="Post Image"></a>
                    </div>
                    <div class="blog-content">
                        <ul class="entry-meta meta-item">
                            <li><i class="far fa-clock"></i> 17 Nov 2020</li>
                        </ul>
                        <h3 class="blog-title">Asean Football Federation to reschedule five competitions due to COVID-19</h3>
                        <p class="mb-0">The ASEAN Football Federation has announced that it will reschedule the five tournaments that it oversees due to COVID-19 pandemic.</p>
                    </div>
                </div>
                <!-- /Blog Post -->
                        
            </div>
            <div class="col-md-6 col-lg-3 col-sm-12">
                    
                <!-- Blog Post -->
                <div class="blog grid-blog">
                    <div class="blog-image">
                        <a href="#"><img class="img-fluid" src="{{ asset('my_assets/frontend/assets/img/blog/football_2.jpg') }}" alt="Post Image"></a>
                    </div>
                    <div class="blog-content">
                        <ul class="entry-meta meta-item">
                            <li><i class="far fa-clock"></i> 16 Nov 2020</li>
                        </ul>
                        <h3 class="blog-title">Myanmar head coach Antoine Hey talks to the media in Yangon. Photo - Supplied</h3>
                        <p class="mb-0">The line-up players for the Myanmar national football team that will compete in international matches this year have been selected by head coach Antoine Hey, announced U Than Toe Aung.</p>
                    </div>
                </div>
                <!-- /Blog Post -->
                        
            </div>
            <div class="col-md-6 col-lg-3 col-sm-12">
                    
                <!-- Blog Post -->
                <div class="blog grid-blog">
                    <div class="blog-image">
                        <a href="#"><img class="img-fluid" src="{{ asset('my_assets/frontend/assets/img/blog/football_3.jpg') }}" alt="Post Image"></a>
                    </div>
                    <div class="blog-content">
                        <ul class="entry-meta meta-item">
                            <li><i class="far fa-clock"></i> 18 Nov 2020</li>
                        </ul>
                        <h3 class="blog-title">Shan United head coach, captain and PSM head coach. Photo - Shan United</h3>
                        <p class="mb-0">Myanmar National League team Shan United will play against PSM Makassar of Indonesia in the second match of the Asian Football Confederation Cup that will be held at Madaya Stadium in Indonesia today.</p>
                    </div>
                </div>
                <!-- /Blog Post -->
                        
            </div>
            <div class="col-md-6 col-lg-3 col-sm-12">
                    
                <!-- Blog Post -->
                <div class="blog grid-blog">
                    <div class="blog-image">
                        <a href="#"><img class="img-fluid" src="{{ asset('my_assets/frontend/assets/img/blog/football_4.jpg') }}" alt="Post Image"></a>
                    </div>
                    <div class="blog-content">
                        <ul class="entry-meta meta-item">
                            <li><i class="far fa-clock"></i> 15 Nov 2020</li>
                        </ul>
                        <h3 class="blog-title">Yangon United to face Brunei's Indera SC in AFC Cup 2020 playoff</h3>
                        <p class="mb-0">Myanmar National League club Yangon United will face against Brunei`s club Indera SC in AFC Cup 2020 play-off match in Brunei.</p>
                    </div>
                </div>
                <!-- /Blog Post -->
                        
            </div>
        </div>
        <div class="view-all text-center"> 
            <a href="{{ route('blog') }}" class="btn btn-primary">View All</a>
        </div>
    </div>
</section>
<!-- /Blog Section -->	

<!-- Courts -->
<div class="container-fluid filtered_courts mt-5">
    <h1 class="left_border">Search Results</h1>
    <div class="row mt-5 courts">
    {{-- filtered courts --}}
    </div>
</div>
<!-- /Courts -->

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
                $('.hide-section').hide();
                $('.filtered_courts').show();
                $('.courts').html(html);          
            })
        })
    })
  </script>
@endsection
