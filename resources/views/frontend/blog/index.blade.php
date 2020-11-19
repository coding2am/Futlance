@extends('layouts.frontend_template')
@section('title','Blogs and News')
@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blogs</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Blogs and News</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->
<!-- Page Content -->
<div class="content">
    <div class="container">
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
    </div>
</div>
<!-- /Page Content -->
@endsection