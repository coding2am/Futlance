@extends('layouts.frontend_template')
@section('title', 'About Page')
@section('content')
<style>
    .aboutus-section {
        padding: 90px 0;
    }
    .aboutus-title {
        font-size: 30px;
        letter-spacing: 0;
        line-height: 32px;
        margin: 0 0 39px;
        padding: 0 0 11px;
        position: relative;
        text-transform: uppercase;
        color: #000;
    }
    .aboutus-title::after {
        background: #15558d none repeat scroll 0 0;
        bottom: 0;
        content: "";
        height: 2px;
        left: 0;
        position: absolute;
        width: 54px;
    }
    .aboutus-text {
        color: #606060;
        font-size: 13px;
        line-height: 22px;
        margin: 0 0 35px;
    }

    a:hover, a:active {
        color: #15558d;
        text-decoration: none;
        outline: 0;
    }
    .aboutus-more {
        border: 1px solid #15558d;
        border-radius: 25px;
        color: #15558d;
        display: inline-block;
        font-size: 14px;
        font-weight: 700;
        letter-spacing: 0;
        padding: 7px 20px;
        text-transform: uppercase;
    }
    .feature .feature-box .iconset {
        background: #fff none repeat scroll 0 0;
        float: left;
        position: relative;
        width: 18%;
    }
    .feature .feature-box .iconset::after {
        background: #15558d none repeat scroll 0 0;
        content: "";
        height: 150%;
        left: 43%;
        position: absolute;
        top: 100%;
        width: 1px;
    }

    .feature .feature-box .feature-content h4 {
        color: #0f0f0f;
        font-size: 18px;
        letter-spacing: 0;
        line-height: 22px;
        margin: 0 0 5px;
    }


    .feature .feature-box .feature-content {
        float: left;
        padding-left: 28px;
        width: 78%;
    }
    .feature .feature-box .feature-content h4 {
        color: #0f0f0f;
        font-size: 18px;
        letter-spacing: 0;
        line-height: 22px;
        margin: 0 0 5px;
    }
    .feature .feature-box .feature-content p {
        color: #606060;
        font-size: 13px;
        line-height: 22px;
    }
    .icon {
        color : #f4b841;
        padding:0px;
        font-size:40px;
        border: 1px solid #15558d;
        border-radius: 100px;
        color: #15558d;
        font-size: 28px;
        height: 70px;
        line-height: 70px;
        text-align: center;
        width: 70px;
    }
    }
</style>
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
        <div class="aboutus-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="aboutus">
                            <h2 class="aboutus-title">About Us</h2>
                            <p class="text-dark">
                                futlance.com began in 2020. <br> We created this site with the user's perspective in mind. We wanted to offer a amazing fatures that will lead to a easier user experience. We keep it simple, so users can focus on their process.
                            </p>
                            <a class="aboutus-more" href="#">read more</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="aboutus-banner">
                        <img src="{{ asset('my_assets/frontend/assets/futlance_design/1.svg') }}" width="350">
                        </div>
                    </div>
                    <div class="col-md-5 offset-md-1">
                        <div class="feature">
                            <div class="feature-box">
                                <div class="clearfix">
                                    <div class="iconset">
                                        <i class="fas fa-heart icon"></i>
                                    </div>
                                    <div class="feature-content">
                                        <h4>Work with heart</h4>
                                        <p>Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="feature-box">
                                <div class="clearfix">
                                    <div class="iconset">
                                        <i class="fas fa-cog icon"></i>
                                    </div>
                                    <div class="feature-content">
                                        <h4>Reliable services</h4>
                                        <p>Donec vitae sapien ut libero venenatis faucibu. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt</p>
                                    </div>
                                </div>
                            </div>
                            <div class="feature-box">
                                <div class="clearfix">
                                    <div class="iconset">
                                        <i class="fas fa-headset icon"></i>
                                    </div>
                                    <div class="feature-content">
                                        <h4>Great support</h4>
                                        <p>Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>					
    </div>
</div>		
<!-- /Page Content -->
@endsection