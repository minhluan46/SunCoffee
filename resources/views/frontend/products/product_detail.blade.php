@extends('layouts.frontend_layout')
@section('content')

    <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url({{ asset('frontend/images/bg_3.jpg') }});"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">CHI TIẾT SẢN PHẨM</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home_user.index') }}">Home</a></span>
                            <span>CHI TIẾT SẢN PHẨM</span>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate">
                    <a href="images/menu-2.jpg" class="image-popup"><img
                            src="{{ asset('uploads/SanPham/' . $product_detail->hinhanh) }}" class="img-fluid"
                            alt="Colorlib Template"></a>
                </div>
                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <h3>{{ $product_detail->tensanpham }}</h3>
                    <p>{{ $product_detail->mota }}</p>


                    <form action="{{ route('product_user.save_cart') }}" method="POST">
                        {{ csrf_field() }}
                        {{-- <p class="price" ><span>$4.90</span></p> --}}
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="form-group d-flex">
                                    <div class="select-wrap">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select style=" height: fit-content !important;
                                                        font-size: 2em !important;
                                                        width: fit-content !important;" name="" id="" class="form-control">
                                            @foreach ($pro_detail as $item)

                                                <option>
                                                    <b>{{ $item->kichthuoc }}</b> - <h3>
                                                        <span>{{ number_format($item->giasanpham) . 'VND' }}</span>
                                                    </h3>
                                                    <input type="hidden" value="{{ $item->id }}"
                                                        name="detail_pro_id_hidden">
                                                </option>

                                            @endforeach
                                            {{-- <option value="">Medium</option>
                                        <option value="">Large</option>
                                        <option value="">Extra Large</option> --}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="input-group col-md-6 d-flex mb-3">
                                <span class="input-group-btn mr-2">
                                    <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                                        <i class="icon-minus"></i>
                                    </button>
                                </span>
                                <input type="number" id="quantity" name="quantity" class="form-control input-number"
                                    value="1" min="1" max="100">
                                <input type="hidden" value="{{ $product_detail->id }}" name="product_id_hidden">
                                <span class="input-group-btn ml-2">
                                    <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                        <i class="icon-plus"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <button class="btn btn-primary py-3 px-5" type="submit"><a><b
                                    style="color: black; font-size: 1.5em !important">Thêm vào giỏ hàng</b></a> </button>
                        {{-- <p><a href="cart.html" class="btn btn-primary py-3 px-5">Thêm vào giỏ hàng</a></p> --}}
                    </form>
                </div>

            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <span class="subheading">Khám phá</span><br />
                    <h2 class="mb-4">Sản phẩm liên quan</h2>
                    <p>Cà phê và âm nhạc những thứ tôi không thể thiếu trong cuộc sống. Hãy thưởng thức những loại cà phê
                        đậm vị hơn nữa.</p>
                </div>
            </div>
            <div class="row">
                @foreach ($product as $item)
                    <div class="col-md-3">
                        <div class="menu-entry">
                            <a href="#" class="img"
                                style="background-image: url({{ asset('uploads/SanPham/' . $item->hinhanh) }});"></a>
                            <div class="text text-center pt-4">
                                <h3><a href="#">{{ $item->tensanpham }}</a></h3>
                                <p>{{ $item->mota }}</p>
                                <p><a href="{{ route('product_user.product_detail', $item->id) }}"
                                        class="btn btn-primary btn-outline-primary">Xem thêm</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
