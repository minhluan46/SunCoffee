<!DOCTYPE html>
<html lang="vi">

<head>
    <title>Sun Coffee - nội dung</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="{{ asset('/backend/img/mini_logo.png') }}" type="image/png"> {{-- LOGO --}}

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

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
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
            {{-- /? --}}
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li @yield('active_trangchu') class="nav-item"><a href="{{ route('Trangchu.index') }}"
                            class="nav-link">Trang Chủ</a></li>
                    <li @yield('active_sanpham') class="nav-item"><a href="{{ route('SanPham.index') }}"
                            class="nav-link">Sản Phẩm</a></li>
                    <li @yield('active_menu') class="nav-item"><a href="{{ route('Menu.index') }}"
                            class="nav-link">Menu</a></li>
                    <li @yield('active_vechungtoi') class="nav-item"><a href="{{ route('VeChungToi.index') }}"
                            class="nav-link">Về Chúng Tôi</a></li>
                    <li @yield('active_lienlac') class="nav-item"><a href="{{ route('LienLac.index') }}"
                            class="nav-link">Liên Lạc</a></li>
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



    <button style="width: fit-content;
            height: fit-content;" id="myBtn" title="Lên đầu trang"><img style="border-radius: 25%"
            src='{{ asset('frontend/images/back_to_top.png') }}' title='lên đầu trang' width='50px' /></button>

    <footer class="ftco-footer ftco-section img">
        <div class="overlay"></div>
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Về chúng tôi</h2>
                        <p>Sun Coffee là chuỗi cà phê được thành lập vào năm 2020 nhưng với tư duy sáng tạo và phong
                            cách
                            mới mẻ đã đem đến những hương vị mới về cà phê.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            {{-- <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li> --}}
                            {{-- <li class="ftco-animate"><a href="https://www.facebook.com/Sun-Coffee-101268012234926"><span class="icon-facebook"></span></a></li> --}}
                            {{-- <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li> --}}
                        </ul>
                    </div>
                </div>
                {{-- <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Recent Blog</h2>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url({{ asset('frontend/images/image_1.jpg') }});"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url({{ asset('frontend/images/image_2.jpg') }});"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a>
                                </h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
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
                        {{-- <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Mua hàng dễ dàng</a></li>
                            <li><a href="#" class="py-2 d-block">Dịch vụ chu đáo, nhanh chóng</a></li>
                            <li><a href="#" class="py-2 d-block">Chất lượng cà phê thượng hạgn</a></li>
                        </ul> --}}
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2"><a href="{{ route('LienLac.index') }}">Liên hệ với chúng tôi</a>
                        </h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text"><a
                                            href="{{ route('LienLac.index') }}">137/3C, khu phố 2, phường
                                            An Phú, thành phố Thuận An, tỉnh Bình Dương</a> </span></li>
                                <li><a href="{{ route('LienLac.index') }}"><span class="icon icon-phone"></span><span
                                            class="text">+84 916 105
                                            406</span></a></li>
                                <li><a href="{{ route('LienLac.index') }}"><span
                                            class="icon icon-envelope"></span><span class="text">
                                            SunCoffee137@gmail.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <script>
                            // document.write(new Date().getFullYear());
                        </script> Quán cà phê Sun Coffee được thành lập <i class="icon-heart"
                            aria-hidden="true"></i> bởi <a href="https://colorlib.com" target="_blank">Lê Minh Luân và
                            Hoàng Tuấn</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
        <div id="back-to-top" class="back-to-top" data-toggle="tooltip" data-placement="left" title="Trở lên đầu trang">
            <span class="glyphicon glyphicon-circle-arrow-up text-primary"></span>
        </div>

    </footer>


    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" />
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
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script> --}}
    {{-- <script src="{{ asset('frontend/js/google-map.js') }}"></script> --}}
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    @yield('script')
    {{-- Zalo chat --}}
    <div class="zalo-chat-widget" data-oaid="2447460426002912278" data-welcome-message="Rất vui khi được hỗ trợ bạn!"
        data-autopopup="600" data-width="350" data-height="420"></div>

    <script src="https://sp.zalo.me/plugins/sdk.js"></script>

    {{-- Facebook cmt --}}
    {{-- <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0&appId=990194298485785&autoLogAppEvents=1"
        nonce="ww9We3TL"></script> --}}

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
