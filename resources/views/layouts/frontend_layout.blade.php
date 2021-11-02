<!DOCTYPE html>
<html lang="vi">

<head>
    <title>Sun Coffee - Chuyên Cung Cấp Các Loại Cà Phê Đóng Gói</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- demo pay pal --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Ensures optimal rendering on mobile devices. -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->

    <link rel="icon" href="{{ asset('uploads/Logo/logo_sun_coffee.png') }}" type="image/png"> {{-- LOGO --}}

    <link rel="stylesheet" href="{{ asset('frontend/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    @yield('css')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('Trangchu.index') }}">Sun<small>coffee</small></a>
            {{-- ? --}}
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
            {{-- /? --}}
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li @yield('active_trangchu') class="nav-item"><a href="{{ route('Trangchu.index') }}" class="nav-link">Trang Chủ</a></li>
                    <li @yield('active_sanpham') class="nav-item"><a href="{{ route('SanPham.index') }}" class="nav-link">Sản Phẩm</a></li>
                    <li @yield('active_menu') class="nav-item"><a href="{{ route('Menu.index') }}" class="nav-link">Menu</a></li>
                    <li @yield('active_vechungtoi') class="nav-item"><a href="{{ route('VeChungToi.index') }}" class="nav-link">Về Chúng Tôi</a></li>
                    <li @yield('active_lienlac') class="nav-item"><a href="{{ route('LienLac.index') }}" class="nav-link">Liên Lạc</a></li>
                    <li class="nav-item cart">
                        <a href="{{ route('GioHang.index') }}" class="nav-link">
                            <span class="icon icon-shopping_cart"></span>
                            <span class="bag d-flex justify-content-center align-items-center">
                                <small id="cart-quantity">
                                    @if (Session::has('GioHangOnline') != null)
                                        {{ Session::get('GioHangOnline')->totalQuanty }}
                                    @else
                                        0
                                    @endif
                                </small>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    @yield('content')


    <footer class="ftco-footer ftco-section img">
        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col-lg-3 col-md-6">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2"><a class="large_logo" href="{{ route('Trangchu.index') }}"><img src="{{ asset('uploads/Logo/logo.png') }}" alt=""></a></h2>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2"><a class="text-white" href="{{ route('VeChungToi.index') }}">Về chúng tôi</a></h2>
                        <a class="mtop-5" href="{{ route('VeChungToi.index') }}">Sun Coffee là chuỗi cà phê
                            được thành lập vào năm 2020 nhưng với tư duy sáng tạo và phong cách mới mẻ đã đem đến
                            những hương vị mới về cà phê.</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2"><a class="text-white" href="{{ route('VeChungToi.index') }}">Dịch vụ</a> </h2>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('VeChungToi.index') }}">Mua hàng dễ dàng</a></li>
                            <li><a href="{{ route('VeChungToi.index') }}">Dịch vụ chu đáo, nhanh chóng</a></li>
                            <li><a href="{{ route('VeChungToi.index') }}">Chất lượng cà phê thượng hạng</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2"><a class="text-white" href="{{ route('LienLac.index') }}">Liên
                                hệ với chúng tôi</a> </h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon2 icon-map-marker"></span><span class="text"><a href="{{ route('LienLac.index') }}">137/3C, khu phố 2, phường
                                            An Phú, thành phố Thuận An, tỉnh Bình Dương</a></span></li>
                                <li><span class="icon icon2 icon-phone"></span><span class="text"><a href="tel://0916 105 406">+84 916 105 406</a> </span></li>
                                <li><span class="icon icon2 icon-envelope"></span><span class="text"><a href="mailto:SunCoffee137@gmail.com">SunCoffee137@gmail.com</a> </span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row mb-5">
                <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Về chúng tôi</h2>
                        <p>Sun Coffee là chuỗi cà phê được thành lập vào năm 2020 nhưng với tư duy sáng tạo và phong
                            cách mới mẻ đã đem đến những hương vị mới về cà phê.</p>
                    </div>
                </div>
                <div style="text-align: center" class="col-lg-4 col-md-6 mb-5 mb-md-5">
                    <div class="ftco-footer-widget mb-4 ml-md-4">
                        <h2 class="ftco-heading-2">Dịch vụ</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Mua hàng dễ dàng</a></li>
                            <li><a href="#" class="py-2 d-block">Dịch vụ chu đáo, nhanh chóng</a></li>
                            <li><a href="#" class="py-2 d-block">Chất lượng cà phê thượng hạgn</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-5 mb-md-5">
                    <div class="ftco-footer-widget mb-4 ml-md-4">
                        <h2 class="ftco-heading-2">Bản đồ</h2>
                        <div>
                            <iframe style="height:100%; width: 100%"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3917.410462746698!2d106.70980511462409!3d10.932334692215882!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175281ca7aa9583%3A0xbd4e60821b659919!2zQUVPTiBNQUxMIELDjE5IIETGr8agTkcgQ0FOQVJZ!5e0!3m2!1sen!2s!4v1625337665714!5m2!1sen!2s"
                                style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2"><a href="{{ route('LienLac.index') }}">Liên hệ với chúng tôi</a>
                        </h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text"><a href="{{ route('LienLac.index') }}">137/3C, khu phố 2, phường
                                            An Phú, thành phố Thuận An, tỉnh Bình Dương</a> </span></li>
                                <li><a href="{{ route('LienLac.index') }}"><span class="icon icon-phone"></span><span class="text">+84 916 105
                                            406</span></a></li>
                                <li><a href="{{ route('LienLac.index') }}"><span class="icon icon-envelope"></span><span class="text">
                                            SunCoffee137@gmail.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-md-12 text-center">

                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <script>
                            // document.write(new Date().getFullYear());
                        </script> Sun Coffee được thành lập bởi <i class="icon-heart" aria-hidden="true"></i>
                        <a href="{{ route('Trangchu.index') }}" target="_blank">Lê Minh Luân và
                            Phạm Lê Hoàng Tuấn</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>



    </footer>

    {{-- Nút quay về đầu trang --}}
    <button style="width: fit-content;height: fit-content;" id="myBtn" title="Lên đầu trang"><i style="font-size: 45px " class="icon-arrow-circle-up"></i></button>


    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg>
    </div>
    @yield('modal')
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/aos.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('frontend/js/scrollax.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    @yield('script')
    {{-- Zalo chat --}}
    <div class="zalo-chat-widget" data-oaid="2447460426002912278" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="600" data-width="350" data-height="420"></div>

    <script src="https://sp.zalo.me/plugins/sdk.js"></script>

    {{-- Button back to top --}}
    <script>
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {

            if (document.body.scrollTop > 600 || document.documentElement.scrollTop > 600) {
                document.getElementById("myBtn").style.display = "block";
            } else {
                document.getElementById("myBtn").style.display = "none";
            }
        }

        document.getElementById('myBtn').addEventListener("click", function() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        });
    </script>

</body>

</html>
