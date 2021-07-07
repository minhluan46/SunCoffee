@extends('layouts.frontend_layout')
@section('content')
    <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url({{ asset('frontend/images/bg_3.jpg') }});" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">Product Detail</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Product
                                Detail</span></p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate">
                    <a href="{{ asset('frontend/images/menu-2.jpg') }}" class="image-popup"><img src="{{ asset('frontend/images/menu-2.jpg') }} " class="img-fluid" alt="Colorlib Template"></a>
                </div>
                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <h3>Creamy Latte Coffee</h3>
                    <p class="price"><span>10.000 VNĐ</span></p>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a
                        paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                    {{-- <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would
                        have been rewritten a thousand times and everything that was left from its origin would be the word
                        "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing
                        the copy said could convince her and so it didn’t take long until a few insidious Copy Writers
                        ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they
                        abused her for their.</p> --}}
                    <div class="row mt-4">
                        {{-- <div class="col-md-6">
                            <div class="form-group d-flex">
                                <div class="select-wrap">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="" id="" class="form-control">
                                        <option value="">Small</option>
                                        <option value="">Medium</option>
                                        <option value="">Large</option>
                                        <option value="">Extra Large</option>
                                    </select>
                                </div>
                            </div>
                        </div> --}}
                        {{--  --}}
                        <div class="row row-left">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="radio">
                                        <label><input type="radio" name="optradio" class="mr-2"> Lớn (20.000 VNĐ)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="radio">
                                        <label><input type="radio" name="optradio" class="mr-2"> Vừa (15.000 VNĐ)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="radio">
                                        <label><input type="radio" name="optradio" class="mr-2" checked> Nhỏ (10.000 VNĐ)</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--  --}}
                        <div class="w-100"></div>
                        <div class="input-group col-md-6 d-flex mb-3">
                            <span class="input-group-btn mr-2">
                                <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                                    <i class="icon-minus"></i>
                                </button>
                            </span>
                            <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                            <span class="input-group-btn ml-2">
                                <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                    <i class="icon-plus"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                    <p><a href="cart.html" class="btn btn-primary py-3 px-5">Add to Cart</a></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-section-bottom">
        <div class="container">
            <div class="row justify-content-center pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <span class="subheading">Khám Phá</span>
                    <h2 class="mb-4">Những sảm phẩm liên quang</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                </div>
            </div>
            <div class="productnew-slider owl-carousel">
                @isset($CaPheBanChayNhatHienNay)
                    @foreach ($CaPheBanChayNhatHienNay as $item)
                        <div class="menu-entry menu-entry-slider">
                            <a href="{{ route('SanPham.show', $item->id) }}" class="img" style="background-image: url({{ asset('uploads/SanPham/' . $item->hinhanh) }});"></a>
                            <div class="text text-center pt-4">
                                <h3><a href="{{ route('SanPham.show', $item->id) }}">{{ $item->tensanpham }}</a></h3>
                                <p class="price"><span>{{ number_format($item->giasanpham, 0, ',', '.') . ' VNĐ' }}</span></p>
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

        .ftco-section-bottom {
            padding-top: 0px;
        }

        .row.row-left {
            margin-left: 2px;
            text-transform: uppercase;
        }

    </style>
@endsection
