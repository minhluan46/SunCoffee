@extends('layouts.frontend_layout')
@section('content')
    <section class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url({{ asset('frontend/images/bg_3.jpg') }});" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">Checkout</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checout</span>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 ftco-animate">
                    <form action="#" class="billing-form ftco-bg-dark ftco-bg-dark-info p-3 p-md-5">
                        <h3 class="mb-4 billing-heading">Thông Tin Khách Mua Hàng</h3>
                        <div class="row align-items-end">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="firstname">Họ Tên</label>
                                    <input type="text" class="form-control form-control-info">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="firstname">Số Điện Thoại</label>
                                    <input type="text" class="form-control form-control-info">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="firstname">Ghi Chú</label>
                                    <textarea class="form-control form-control-info" cols="30" rows="7"></textarea>
                                </div>
                            </div>
                        </div>
                    </form><!-- END -->

                    <div class="row mt-5 pt-3 d-flex">
                        <div class="col-md-6">
                            <div class="cart-detail cart-total ftco-bg-dark ftco-bg-dark-info  ftco-bg-dark-bill p-3 p-md-4">
                                <h4 class="subheading-bill">Cà Phê Nhé</h4>
                                <p>Một lời hẹn rất riêng của người Việt. Một lời ngỏ mộc mạc để mình ngồi
                                    lại bên nhau và sẻ chia câu chuyện của riêng mình.</p>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="cart-detail cart-total ftco-bg-dark ftco-bg-dark-info ftco-bg-dark-bill p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Tổng Giỏ Hàng</h3>
                                <p class="d-flex">
                                    <span>Tổng</span>
                                    <span>30.000 VNĐ</span>
                                </p>
                                <p class="d-flex">
                                    <span>Giảm Giá</span>
                                    <span>2.000 VNĐ</span>
                                </p>
                                <p class="d-flex">
                                    <span>Thành Viên</span>
                                    <span>0.000 VNĐ</span>
                                </p>
                                <hr>
                                <p class="d-flex total-price">
                                    <span>Thành Tiền</span>
                                    <span>28.000 VNĐ</span>
                                </p>
                                <p><a href="#" class="btn btn-primary py-3 px-4">Place an order</a></p>
                            </div>
                        </div>

                    </div>
                </div> <!-- .col-md-8 -->

                <div class="col-xl-4 sidebar ftco-animate">
                    <div class="cart-detail ftco-bg-dark ftco-bg-dark-info ftco-bg-dark-sale p-3 p-md-4">
                        <h4 class="subheading-bill">Khuyến mãi ngày hè</h4>
                        <div class="productsale-slider-right-to-left owl-carousel">
                            <div class="menu-entry menu-entry-slider">
                                <a href="#" class="img" style="background-image: url({{ asset('frontend/images/menu-1.jpg') }});"></a>
                                <div class="text text-center pt-4">
                                    <h3><a href="#">Coffee Capuccino</a></h3>
                                    <p class="price"><span>10.000 VNĐ</span></p>
                                    <p><a href="#" class="btn btn-primary btn-outline-primary">Thêm Vào Giỏ Hàng</a></p>
                                </div>
                            </div>
                            <div class="menu-entry menu-entry-slider">
                                <a href="#" class="img" style="background-image: url({{ asset('frontend/images/menu-2.jpg') }});"></a>
                                <div class="text text-center pt-4">
                                    <h3><a href="#">Coffee Capuccino</a></h3>
                                    <p class="price"><span>10.000 VNĐ</span></p>
                                    <p><a href="#" class="btn btn-primary btn-outline-primary">Thêm Vào Giỏ Hàng</a></p>
                                </div>
                            </div>
                            <div class="menu-entry menu-entry-slider">
                                <a href="#" class="img" style="background-image: url({{ asset('frontend/images/menu-3.jpg') }});"></a>
                                <div class="text text-center pt-4">
                                    <h3><a href="#">Coffee Capuccino</a></h3>
                                    <p class="price"><span>10.000 VNĐ</span></p>
                                    <p><a href="#" class="btn btn-primary btn-outline-primary">Thêm Vào Giỏ Hàng</a></p>
                                </div>
                            </div>
                            <div class="menu-entry menu-entry-slider">
                                <a href="#" class="img" style="background-image: url({{ asset('frontend/images/menu-4.jpg') }});"></a>
                                <div class="text text-center pt-4">
                                    <h3><a href="#">Coffee Capuccino</a></h3>
                                    <p class="price"><span>10.000 VNĐ</span></p>
                                    <p><a href="#" class="btn btn-primary btn-outline-primary">Thêm Vào Giỏ Hàng</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- .section -->
@endsection
@section('css')
    <style>
        .menu-entry-slider .img {
            display: block;
            height: 300px;
        }

        .menu-entry-slider .text h3 a {
            color: #fff;
            font-size: 17px;
        }

        .billing-form .form-control-info {
            border: 1px solid hsla(0, 0%, 100%, 0.50) !important;
            color: rgb(255, 255, 255) !important;
        }

        .ftco-bg-dark-bill {
            height: 345px;
        }

        .ftco-bg-dark-info {
            box-shadow: 0 4px 8px 0 rgb(255 255 255 / 20%), 0 6px 20px 0 rgb(255 255 255 / 19%);
        }

        .ftco-bg-dark-sale {
            height: 580px;
        }

        .subheading-bill {
            font-size: 30px;
            margin-bottom: 0;
            font-family: "Great Vibes", cursive;
            color: #c49b63;
            margin-top: 10px;
            margin-bottom: 5px;
            text-align: center;
        }

    </style>
@endsection
