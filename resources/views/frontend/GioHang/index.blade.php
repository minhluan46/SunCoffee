@extends('layouts.frontend_layout')
@section('content')
    <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url({{ asset('frontend/images/bg_3.jpg') }});" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">GIỎ HÀNG</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Trang
                                    chủ</a></span> <span>GIỎ HÀNG</span></p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th><a href="#"><span class="icon-close icon-close-all"></span></th>
                                    <th>&nbsp;</th>
                                    <th>Sản Phẩm</th>
                                    <th>Giá Bán</th>
                                    <th>Số Lượng</th>
                                    <th>Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td class="product-remove"><a href="#"><span class="icon-close"></span></a></td>

                                    <td class="image-prod">
                                        <div class="img" style="background-image:url({{ asset('frontend/images/menu-2.jpg') }});"></div>
                                    </td>

                                    <td class="product-name product-name-left">
                                        <h3>Creamy Latte Coffee</h3>
                                        <span>500G</span>
                                    </td>

                                    <td class="price">
                                        <p>9.000 VNĐ</p>
                                        <span class="discount">10.000 VNĐ</span>
                                    </td>

                                    <td class="quantity">
                                        <div class="input-group mb-3">
                                            <input type="text" name="quantity" class="quantity form-control input-number" value="2" min="1" max="100">
                                        </div>
                                    </td>

                                    <td class="total">18.000 VNĐ</td>
                                </tr><!-- END TR-->

                                <tr class="text-center">
                                    <td class="product-remove"><a href="#"><span class="icon-close"></span></a></td>

                                    <td class="image-prod">
                                        <div class="img" style="background-image:url({{ asset('frontend/images/dish-2.jpg') }});">
                                        </div>
                                    </td>

                                    <td class="product-name product-name-left">
                                        <h3>Grilled Ribs Beef</h3>
                                        <span>250G</span>
                                    </td>

                                    <td class="price">
                                        <p>10.000 VNĐ</p>
                                        <span class="discount"></span>
                                    </td>

                                    <td class="quantity">
                                        <div class="input-group mb-3">
                                            <input type="text" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
                                        </div>
                                    </td>

                                    <td class="total">10.000 VNĐ</td>
                                </tr><!-- END TR-->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Tổng Giỏ Hàng</h3>
                        <p class="d-flex">
                            <span>Tổng</span>
                            <span>30.000 VNĐ</span>
                        </p>
                        <p class="d-flex">
                            <span>Giảm Giá</span>
                            <span>2.000 VNĐ</span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Thành Tiền</span>
                            <span>28.000 VNĐ</span>
                        </p>
                    </div>
                    <p class="text-center"><a href="{{ route('GioHang.show') }}" class="btn btn-primary py-3 px-4">Tiến Hành Thanh Toán</a></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-section-bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <span class="subheading">Khám Phá</span>
                    <h2 class="mb-4">Những sảm phẩm liên quang</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                        the blind texts.</p>
                </div>
            </div>
            <div class="productnew-slider owl-carousel">
                @isset($CaPheBanChayNhatHienNay)
                    @foreach ($CaPheBanChayNhatHienNay as $item)
                        <div class="menu-entry menu-entry-slider">
                            <a href="{{ route('SanPham.show', $item->id) }}" class="img" style="background-image: url({{ asset('uploads/SanPham/' . $item->hinhanh) }});"></a>
                            <div class="text text-center pt-4">
                                <h3><a href="{{ route('SanPham.show', $item->id) }}">{{ $item->tensanpham }}</a></h3>
                                <p class="price"><span>{{ number_format($item->giasanpham, 0, ',', '.') . ' VNĐ' }}</span>
                                </p>
                                <p><a href="#" class="btn btn-primary btn-outline-primary">Thêm Vào Giỏ</a></p>
                            </div>
                        </div>
                    @endforeach
                @endisset
            </div>
        </div>
    </section>

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

        .icon-close-all {
            padding: 8px 11px;
            color: white;
            border: 1px solid white;
        }

        .icon-close-all:hover {
            padding: 8px 11px;
            color: #343a40;
            border: 1px solid white;
            background: white;
        }

        .product-name-left {
            text-align: left !important;
        }

        .price .discount {
            text-decoration: line-through;
        }

        .price p {
            margin-bottom: 0px;
        }

        .ftco-section-bottom {
            padding-top: 0px;
        }

    </style>
@endsection
