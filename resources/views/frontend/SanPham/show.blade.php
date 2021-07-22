@extends('layouts.frontend_layout')
@section('content')
    <section class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url({{ asset('frontend/images/bg_3.jpg') }});" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">
                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">Chi tiết sản phẩm</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('Trangchu.index') }}">Trang chủ</a></span> <span>Chi tiết sản phẩm</span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                @isset($SanPham)
                    <div class="col-lg-6 mb-5 ftco-animate">
                        <a href="{{ asset('uploads/SanPham/' . $SanPham->hinhanh) }}" class="image-popup">
                            <img src="{{ asset('uploads/SanPham/' . $SanPham->hinhanh) }}" class="img-fluid" alt="Colorlib Template"></a>
                    </div>
                    <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                        <h3>{{ $SanPham->tensanpham }}</h3>
                        <p class="price"><span>
                                @isset($ChiTietSanPham)
                                    @if ($ChiTietSanPham[0]->muckhuyenmai != null)
                                        <span style="text-decoration: line-through;">{{ number_format($ChiTietSanPham[0]->giasanpham, 0, ',', '.') . ' VNĐ' }}</span>{{ ' - ' . $ChiTietSanPham[0]->tenquycach }}<br>
                                        {{ number_format($ChiTietSanPham[0]->giasanpham * (1 - $ChiTietSanPham[0]->muckhuyenmai / 100), 0, ',', '.') . ' VNĐ  (-' . $ChiTietSanPham[0]->muckhuyenmai . '%)' }}
                                    @else
                                        {{ number_format($ChiTietSanPham[0]->giasanpham, 0, ',', '.') . ' VNĐ - ' . $ChiTietSanPham[0]->tenquycach }}
                                    @endif
                                @endisset
                            </span></p>
                        <p>{{ $SanPham->mota }}</p>
                        <div class="row mt-4">
                            <div class="row row-left">
                                @isset($ChiTietSanPham)
                                    @foreach ($ChiTietSanPham as $stt => $item)
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="radio">
                                                    <label><input type="radio" class="optradio" name="optradio" class="mr-2" {{ $stt == 0 ? 'checked' : '' }} value="{{ $item->id }}">
                                                        {{-- {{ number_format($item->giasanpham, 0, ',', '.') . ' VNĐ  (' . $item->tenquycach . ')' }} --}}
                                                        @if ($item->muckhuyenmai != null)
                                                            {{ number_format($item->giasanpham * (1 - $item->muckhuyenmai / 100), 0, ',', '.') . ' VNĐ - ' . $item->tenquycach . ' (-' . $item->muckhuyenmai . '%)' }}
                                                        @else
                                                            {{ number_format($item->giasanpham, 0, ',', '.') . ' VNĐ - ' . $item->tenquycach }}
                                                        @endif
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endisset
                            </div>
                            {{--  --}}
                            <div class="w-100"></div>
                            <form method="POST" action="{{ route('GioHang.addCartOnline') }}">
                                @csrf
                                <div class="col-md-6 d-flex mb-3">
                                    <input type="number" id="quantity" name="quantity" class="form-control input-number input225w" value="1" min="1">
                                </div>
                                <div class="col-md-6 d-flex mb-3">
                                    @isset($ChiTietSanPham)
                                        <input type="text" name="id_product_details" id="id_product_details" value="{{ $ChiTietSanPham[0]->id }}" hidden>
                                        <input type="submit" value="Thêm Vào Giỏ Hàng" class="btn btn-primary py-3 px-5">
                                    @endisset
                                </div>
                            </form>
                        </div>
                    </div>
                @endisset
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
        <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="" data-numposts="5"></div>
    </section>

@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/alertifyjs/css/alertify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/alertifyjs/css/themes/default.min.css') }}">
    <style>
        /* ghi đè */
        .product-details h3 {
            text-transform: uppercase;
            font-size: 30px;
        }

        .product-details .price span {
            font-size: 27px;
            font-weight: 500;
        }

        /*  */
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

        .input225w {
            width: 225px;
        }

    </style>
@endsection
@section('script')
    <script src="{{ asset('frontend/alertifyjs/alertify.min.js') }}"></script>
    <script type="text/javascript">
        $('.optradio').on('change', function() { // thay đổi chi tiết sản phẩm
            var checkbox = document.getElementsByName("optradio");
            for (var i = 0; i < checkbox.length; i++) {
                if (checkbox[i].checked === true) {
                    $('#id_product_details').val(checkbox[i].value);
                }
            }
        });
    </script>
@endsection
