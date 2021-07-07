@extends('layouts.frontend_layout')
@section('active_sanpham')
    class="nav-item active"
@endsection
@section('content')
    <section class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url({{ asset('frontend/images/bg_3.jpg') }});"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">Order Online</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Shop</span></p>
                    </div>

                </div>
            </div>
        </div>
    </section>
    {{--  --}}
    <section class="ftco-menu mb-5 pb-5">
        <div class="container">

            <div class="row d-md-flex">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-4 col-lg-3 ">
                            <div class="border-search category">
                                <div class="">
                                    <form action="#" class="search-form">
                                        <div class="form-group">
                                            <div class="icon">
                                                <button type="submit"><span class="icon-search"></span></button>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Tìm Kiếm...">
                                        </div>
                                    </form>
                                </div>
                                <div class="">{{-- gắng cứng --}}
                                    <button class="btn btn-primary btn-outline-primary btn-search">Sản Phẩm Mới</button>
                                </div>
                                <div class="">{{-- gắng cứng --}}
                                    <button class="btn btn-primary btn-outline-primary btn-search">Sản Phẩm Bán
                                        Chạy</button>
                                </div>
                                <div class="">{{-- cần kiểm tra xem có khuyến mãi không --}}
                                    <button class="btn btn-primary btn-outline-primary btn-search">Sản Phẩm Khuyến
                                        Mãi</button>
                                </div>
                                <div class="">{{-- vòng lập loại sản phẩm --}}
                                    <button class="btn btn-primary btn-outline-primary btn-search">Cà Phê Hạt</button>
                                </div>
                                <div class="">{{-- vòng lập loại sản phẩm --}}
                                    <button class="btn btn-primary btn-outline-primary btn-search">Nước Uống</button>
                                </div>
                                <div class="">{{-- thêm 1 đoạn cho nó khớp với khung hình --}}
                                    <h4 class="subheading-search">Cà Phê Nhé</h4>
                                    <p>Một lời hẹn rất riêng của người Việt. Một lời ngỏ mộc mạc để mình ngồi
                                        lại bên nhau và sẻ chia câu chuyện của riêng mình.</p>
                                </div>

                            </div>
                        </div>

                        <div class="col-12 col-md-8 col-lg-9"> {{-- thêm 1 cái id để khi tìm kiếm sẽ thay đổi nó --}}
                            <div class="row">{{-- phần của khuyến mãi --}}
                                <div class="col-md-12 heading-section ftco-animate text-center">
                                    <span class="subheading mb-5">Khuyến mãi ngày hè</span>{{-- tên khuyến mãi --}}
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facere eveniet voluptas
                                        mollitia ipsam fugiat, culpa soluta earum, dolorum, magni aliquam provident?
                                        Numquam, ex. Blanditiis explicabo nisi eius ratione inventore provident.
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facere eveniet voluptas
                                        mollitia ipsam fugiat, culpa soluta earum, dolorum, magni aliquam provident?
                                        Numquam, ex. Blanditiis explicabo nisi eius ratione inventore provident.
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facere eveniet voluptas
                                        mollitia ipsam fugiat, culpa soluta earum, dolorum, magni aliquam provident?
                                        Numquam, ex. Blanditiis explicabo nisi eius ratione inventore provident.</p>
                                    {{-- nội dung --}}
                                </div>
                                <div class="col-md-4  menu-t">
                                    <div class="menu-entry">
                                        <a href="#" class="img"
                                            style="background-image: url({{ asset('frontend/images/menu-1.jpg') }});"></a>
                                        <div class="text text-center pt-4">
                                            <h3><a href="#">Coffee Capuccino</a></h3>
                                            <p class="price"><span>10.000 VNĐ</span></p>
                                            <p><a href="#" class="btn btn-primary btn-outline-primary">Thêm Vào Giỏ
                                                    Hàng</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4  menu-t">
                                    <div class="menu-entry">
                                        <a href="#" class="img"
                                            style="background-image: url({{ asset('frontend/images/menu-1.jpg') }});"></a>
                                        <div class="text text-center pt-4">
                                            <h3><a href="#">Coffee Capuccino</a></h3>
                                            <p class="price"><span>10.000 VNĐ</span></p>
                                            <p><a href="#" class="btn btn-primary btn-outline-primary">Thêm Vào Giỏ
                                                    Hàng</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4  menu-t">
                                    <div class="menu-entry">
                                        <a href="#" class="img"
                                            style="background-image: url({{ asset('frontend/images/menu-1.jpg') }});"></a>
                                        <div class="text text-center pt-4">
                                            <h3><a href="#">Coffee Capuccino</a></h3>
                                            <p class="price"><span>10.000 VNĐ</span></p>
                                            <p><a href="#" class="btn btn-primary btn-outline-primary">Thêm Vào Giỏ
                                                    Hàng</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4  menu-t">
                                    <div class="menu-entry">
                                        <a href="#" class="img"
                                            style="background-image: url({{ asset('frontend/images/menu-1.jpg') }});"></a>
                                        <div class="text text-center pt-4">
                                            <h3><a href="#">Coffee Capuccino</a></h3>
                                            <p class="price"><span>10.000 VNĐ</span></p>
                                            <p><a href="#" class="btn btn-primary btn-outline-primary">Thêm Vào Giỏ
                                                    Hàng</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row"> {{-- phần của cà phê hạt --}}
                                <div class="col-md-12 heading-section ftco-animate text-center">
                                    <span class="subheading mb-5">Cà Phê Hạt</span>
                                    {{-- <h2 class="mb-4">Cà Phê Hạt</h2> --}}
                                </div>
                                <div class="col-md-4  menu-t">
                                    <div class="menu-entry">
                                        <a href="#" class="img"
                                            style="background-image: url({{ asset('frontend/images/menu-1.jpg') }});"></a>
                                        <div class="text text-center pt-4">
                                            <h3><a href="#">Coffee Capuccino</a></h3>
                                            <p class="price"><span>10.000 VNĐ</span></p>
                                            <p><a href="#" class="btn btn-primary btn-outline-primary">Thêm Vào Giỏ
                                                    Hàng</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4  menu-t">
                                    <div class="menu-entry">
                                        <a href="#" class="img"
                                            style="background-image: url({{ asset('frontend/images/menu-1.jpg') }});"></a>
                                        <div class="text text-center pt-4">
                                            <h3><a href="#">Coffee Capuccino</a></h3>
                                            <p class="price"><span>10.000 VNĐ</span></p>
                                            <p><a href="#" class="btn btn-primary btn-outline-primary">Thêm Vào Giỏ
                                                    Hàng</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4  menu-t">
                                    <div class="menu-entry">
                                        <a href="#" class="img"
                                            style="background-image: url({{ asset('frontend/images/menu-1.jpg') }});"></a>
                                        <div class="text text-center pt-4">
                                            <h3><a href="#">Coffee Capuccino</a></h3>
                                            <p class="price"><span>10.000 VNĐ</span></p>
                                            <p><a href="#" class="btn btn-primary btn-outline-primary">Thêm Vào Giỏ
                                                    Hàng</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4  menu-t">
                                    <div class="menu-entry">
                                        <a href="#" class="img"
                                            style="background-image: url({{ asset('frontend/images/menu-1.jpg') }});"></a>
                                        <div class="text text-center pt-4">
                                            <h3><a href="#">Coffee Capuccino</a></h3>
                                            <p class="price"><span>10.000 VNĐ</span></p>
                                            <p><a href="#" class="btn btn-primary btn-outline-primary">Thêm Vào Giỏ
                                                    Hàng</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row"> {{-- phần của nước uống --}}
                                <div class="col-md-12 heading-section ftco-animate text-center">
                                    <span class="subheading mb-5">Nước Uống</span>
                                    {{-- <h2 class="mb-4">Cà Phê Hạt</h2> --}}
                                </div>
                                <div class="col-md-4  menu-t">
                                    <div class="menu-entry">
                                        <a href="#" class="img"
                                            style="background-image: url({{ asset('frontend/images/menu-1.jpg') }});"></a>
                                        <div class="text text-center pt-4">
                                            <h3><a href="#">Coffee Capuccino</a></h3>
                                            <p class="price"><span>10.000 VNĐ</span></p>
                                            <p><a href="#" class="btn btn-primary btn-outline-primary">Thêm Vào Giỏ
                                                    Hàng</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4  menu-t">
                                    <div class="menu-entry">
                                        <a href="#" class="img"
                                            style="background-image: url({{ asset('frontend/images/menu-1.jpg') }});"></a>
                                        <div class="text text-center pt-4">
                                            <h3><a href="#">Coffee Capuccino</a></h3>
                                            <p class="price"><span>10.000 VNĐ</span></p>
                                            <p><a href="#" class="btn btn-primary btn-outline-primary">Thêm Vào Giỏ
                                                    Hàng</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4  menu-t">
                                    <div class="menu-entry">
                                        <a href="#" class="img"
                                            style="background-image: url({{ asset('frontend/images/menu-1.jpg') }});"></a>
                                        <div class="text text-center pt-4">
                                            <h3><a href="#">Coffee Capuccino</a></h3>
                                            <p class="price"><span>10.000 VNĐ</span></p>
                                            <p><a href="#" class="btn btn-primary btn-outline-primary">Thêm Vào Giỏ
                                                    Hàng</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4  menu-t">
                                    <div class="menu-entry">
                                        <a href="#" class="img"
                                            style="background-image: url({{ asset('frontend/images/menu-1.jpg') }});"></a>
                                        <div class="text text-center pt-4">
                                            <h3><a href="#">Coffee Capuccino</a></h3>
                                            <p class="price"><span>10.000 VNĐ</span></p>
                                            <p><a href="#" class="btn btn-primary btn-outline-primary">Thêm Vào Giỏ
                                                    Hàng</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
    </section>

@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/css.css') }}" />
@endsection
