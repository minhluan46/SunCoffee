@extends('layouts.frontend_layout')
@section('content')
    {{-- Thông báo thêm thành công --}}
    {{-- @if (session('messsge'))
        <input type="text" class="success-updateQuantityOnline" id="success-updateQuantityOnline" value="{{ session('messsge') }}" hidden>
    @endif --}}
    {{--  --}}
    <section class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url({{ asset('frontend/images/bg_3.jpg') }});" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">
                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">GIỎ HÀNG</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Trang chủ</a></span> <span>GIỎ HÀNG</span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-cart">
        @if (Session::has('GioHangOnline') != null)
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-md-12 ftco-animate">
                        <div class="cart-list" id="cart-value">
                            <table class="table">
                                <thead class="thead-primary">
                                    <tr class="text-center">
                                        <th><a class="removed_all" href="javascript:(0)"><span class="icon-close icon-close-all"></span></th>
                                        <th>&nbsp;</th>
                                        <th>Sản Phẩm</th>
                                        <th>Giá Bán</th>
                                        <th>Số Lượng</th>
                                        <th>Tổng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (Session::get('GioHangOnline')->products as $item) {{-- danh sách sản phẩm --}}
                                        <tr class="text-center" id="{{ $item['CTSP']->id }}">
                                            <td class="product-remove"><a href="javascript:(0)" class="removed" data-id="{{ $item['CTSP']->id }}"
                                                    data-name="{{ $item['SanPham']->tensanpham . ' (' . $item['CTSP']->tenquycach . ')' }}">
                                                    <span class="icon-close"></span></a></td>
                                            <td class="image-prod">
                                                <div class="img" style="background-image:url({{ asset('uploads/SanPham/' . $item['SanPham']->hinhanh) }});"></div>
                                            </td>
                                            <td class="product-name product-name-left">
                                                <h3>{{ $item['SanPham']->tensanpham }}</h3>
                                                <span>{{ $item['CTSP']->tenquycach }}</span>
                                            </td>
                                            <td class="price">
                                                @if ($item['GiamGia'] > 0)
                                                    <p>{{ number_format($item['CTSP']->giasanpham - $item['GiamGia'], 0, ',', '.') . ' VNĐ' }}</p>
                                                    <span class="discount">{{ number_format($item['CTSP']->giasanpham, 0, ',', '.') . ' VNĐ' }}</span>
                                                @else
                                                    <p>{{ number_format($item['CTSP']->giasanpham, 0, ',', '.') . ' VNĐ' }}</p>
                                                @endif
                                            </td>
                                            <td class="quantity">
                                                <div class="input-group mb-3">
                                                    <input type="number" name="quantity" class="quantity form-control input-number" value="{{ $item['SoLuong'] }}" min="1"
                                                        data-id="{{ $item['CTSP']->id }}">
                                                </div>
                                            </td>
                                            <td class="total">{{ number_format($item['TongGia'] - $item['GiamGia'] * $item['SoLuong'], 0, ',', '.') . ' VNĐ' }}</td>
                                        </tr><!-- END TR-->
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <p class="text-center"><a href="javascript:(0)" class="update-all btn btn-primary py-3 px-4">Cập Nhật Số Lượng</a></p>
                <div class="row justify-content-end">
                    <div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
                        <div class="cart-total mb-3"> {{-- danh sách sản phẩm --}}
                            <h3>Tổng Giỏ Hàng</h3>
                            <p class="d-flex">
                                <span>Tổng Tiền</span>
                                <span id="cart-totalPrice">{{ number_format(Session::get('GioHangOnline')->totalPrice, 0, ',', '.') . ' VNĐ' }}</span>
                            </p>
                            <p class="d-flex">
                                <span>Giảm Giá</span>
                                <span id="cart-totalDiscount">{{ number_format(Session::get('GioHangOnline')->totalDiscount, 0, ',', '.') . ' VNĐ' }}</span>
                            </p>
                            <hr>
                            <p class="d-flex total-price">
                                <span>Thành Tiền</span>
                                <span id="cart-Total">{{ number_format(Session::get('GioHangOnline')->Total, 0, ',', '.') . ' VNĐ' }}</span>
                            </p>
                        </div>
                        <p class="text-center"><a href="{{ route('GioHang.show') }}" class="btn btn-primary py-3 px-4">Tiến Hành Thanh Toán</a></p>
                    </div>
                </div>
                <div id="removed-value"></div>
            </div>
        @else
            khi không có sản phẩm trong giỏ hàng. (note)
        @endif
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
    <link rel="stylesheet" href="{{ asset('frontend/alertifyjs/css/alertify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/alertifyjs/css/themes/default.min.css') }}">
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
@section('script')
    <script src="{{ asset('frontend/alertifyjs/alertify.min.js') }}"></script>
    <script type="text/javascript">
        // window.onload = function() {
        //     if ($('#success-updateQuantityOnline').hasClass('success-updateQuantityOnline')) {
        //         alertify.message($('#success-updateQuantityOnline').val());
        //     }
        // };
        $('.removed_all').on('click', function() { // xóa  tất cả.
            if (confirm("Bỏ Tất Cả Sản Phẩm")) {
                $.ajax({
                    url: "/bo-tat-ca",
                    method: "POST",
                    data: {
                        _token: $("input[name='_token']").val(),
                    },
                    success: function(response) {
                        location.reload();
                        alertify.message("Đang Xóa Giỏ Hàng");
                    }
                });
            }
        });
        $('.removed').on('click', function() { // xóa từng sản phẩm.
            var id = $(this).data('id');
            var name = $(this).data('name');
            if (confirm("Bỏ " + name)) {
                $.ajax({
                    url: "loai-bo-san-phan/" + id,
                    method: "POST",
                    data: {
                        _token: $("input[name='_token']").val(),
                    },
                    success: function(response) {
                        $('#removed-value').html(response);
                        $('#cart-quantity').text($('#soluong').val());
                        $('#cart-totalPrice').text($('#tongcong').val());
                        $('#cart-totalDiscount').text($('#giamgia').val());
                        $('#cart-Total').text($('#thanhtien').val());
                        $('#' + id).html("");
                        alertify.warning("Đã Bỏ " + name);
                    }
                });
            }
        });
        $('.update-all').on('click', function() { // cập nhật số lượng sản phẩm.
            if (confirm("Cập Nhật Số Lượng")) {
                var lists = [];
                $('table tbody tr td').each(function() {
                    $(this).find('input').each(function() {
                        var element = {
                            id: $(this).data('id'),
                            sl: $(this).val()
                        };
                        lists.push(element);
                    });
                });
                $.ajax({
                    url: "/cap-nhat-so-luong",
                    method: "POST",
                    data: {
                        _token: $("input[name='_token']").val(),
                        data: lists,
                    },
                    success: function(response) {
                        location.reload();
                        alertify.message("Đang Cập Nhật Giỏ Hàng");
                    }
                });
            }
        });
    </script>
@endsection
