@extends('layouts.frontend_layout')
@section('active_lienlac')
    class="nav-item active"
@endsection
@section('content')

    <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url({{ asset('frontend/images/bg_3.jpg') }});" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">LIÊN LẠC</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('Trangchu.index') }}">TRANG CHỦ</a></span> <span>LIÊN LẠC</span>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section contact-section">
        <div class="container">
            <div class="row">
                <div class="col-md-5 ftco-animate fadeInUp ftco-animated">
                    <div class="fb-page" data-href="https://www.facebook.com/suncoffee137/" data-tabs="timeline" data-width="500" data-height="500" data- small-header="false"
                        data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="false">
                        <blockquote cite="https: //www.facebook. com / suncoffee137 / " class=" fb-xfbml-parse-ignore "><a href="https://www.facebook.com/suncoffee137/"> Sun Coffee </a> </blockquote>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-6 contact-info ftco-animate fadeInUp ftco-animated">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <h2>Thông tin liên Lạc</h2>
                        </div>
                        <div class="col-md-12 mb-3">
                            <h4><b>Địa chỉ: </b> 137/3C, khu phố 2, phường An Phú, thành phố Thuận An, tỉnh Bình Dương</h4>
                        </div>
                        <div class="col-md-12 mb-3">
                            <h4><b>Số điện thoại: </b><a href="tel://0916 105 406"> +84 916 105 406</a></h4>
                        </div>
                        <div class="col-md-12 mb-3">
                            <h4><b>Email: </b><a href="mailto:SunCoffee137@gmail.com"> SunCoffee137@gmail.com</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section contact-section  ftco-section-bottom">
        <div style="text-align: -webkit-center;">
            <div style="width:90%">
                <iframe style="height:600px; width: 100%"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3917.410462746698!2d106.70980511462409!3d10.932334692215882!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175281ca7aa9583%3A0xbd4e60821b659919!2zQUVPTiBNQUxMIELDjE5IIETGr8agTkcgQ0FOQVJZ!5e0!3m2!1sen!2s!4v1625337665714!5m2!1sen!2s"
                    style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/css.css') }}" />
@endsection
@section('script')
    <script async Hoãn crossorigin="nặc danh" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0" nonce="utdgGAev"> </script>
@endsection
