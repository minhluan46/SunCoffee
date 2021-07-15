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
                    <form action="{{ route('GioHang.orderOnline') }}" method="POST" class="billing-form ftco-bg-dark ftco-bg-dark-info p-3 p-md-5">
                        @csrf
                        <h3 class="mb-4 billing-heading billing-heading-center">Thông Tin Khách Mua Hàng</h3>
                        <div class="row align-items-end">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="firstname">Họ Tên<b style="color:red"> *</b></label>
                                    <input type="text" name="hoten" id="hoten" class="form-control form-control-info" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="firstname">Số Điện Thoại<b style="color:red"> *</b></label>
                                    <input id="SDT" name="sdt" type="number" class="form-control form-control-info" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="firstname">email<b style="color:red"> *</b></label>
                                    <input name="email" id="email" type="email" class="form-control form-control-info" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="firstname">Địa Chỉ<b style="color:red"> *</b></label>
                                    <input type="text" name="diachi" id="diachi" class="form-control form-control-info" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="firstname">Ghi Chú</label>
                                    <textarea name="ghichu" class="form-control form-control-info" cols="30" rows="7"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex">
                                <input type="submit" value="Xem Sản Phẩm" id="xemsanpham" class="btn btn-primary py-3 px-5">
                                <input type="submit" value="Đặt Hàng" id="dathang" class="btn btn-primary py-3 px-5" style="margin-left: 63px;">
                            </div>
                        </div>
                    </form><!-- END -->
                    {{-- @if (Session::has('GioHangOnline') != null)
                        <div class="billing-form ftco-bg-dark ftco-bg-dark-info p-3 p-md-5">
                            <h3 class="mb-4 billing-heading billing-heading-center">Thông Tin Giỏ Hàng</h3>
                            <table class="info-product ">
                                <thead>
                                    <tr class="text-center">
                                        <th>Sản Phẩm</th>
                                        <th>Giá Bán</th>
                                        <th>SL</th>
                                        <th>Tổng</th>
                                    </tr>
                                </thead>
                                <tbody class="info-product-tbody">
                                    @foreach (Session::get('GioHangOnline')->products as $item)
                                        <tr class="text-center">
                                            <td class="text-left">
                                                <span> {{ $item['SanPham']->tensanpham . ' (' . $item['CTSP']->kichthuoc . ')' }}</span>
                                            </td>
                                            <td>
                                                @if ($item['GiamGia'] > 0)
                                                    <span>{{ number_format($item['CTSP']->giasanpham - $item['GiamGia'], 0, ',', '.') . ' VNĐ' }}</span><br>
                                                    <span class="discount">{{ number_format($item['CTSP']->giasanpham, 0, ',', '.') . ' VNĐ' }}</span>
                                                @else
                                                    <span>{{ number_format($item['CTSP']->giasanpham, 0, ',', '.') . ' VNĐ' }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <span>{{ $item['SoLuong'] }}</span>
                                            </td>
                                            <td><span>{{ number_format($item['TongGia'] - $item['GiamGia'] * $item['SoLuong'], 0, ',', '.') . ' VNĐ' }}</span></td>
                                        </tr><!-- END TR-->
                                    @endforeach
                                </tbody>
                            </table>
                            <table class="info-product2">
                                <thead>
                                    <th>Tổng Tiền</th>
                                    <th>Giảm Giá</th>
                                    <th>Thành Tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ number_format(Session::get('GioHangOnline')->totalPrice, 0, ',', '.') . ' VNĐ' }}</td>
                                        <td>{{ number_format(Session::get('GioHangOnline')->totalDiscount, 0, ',', '.') . ' VNĐ' }}</td>
                                        <td class="info-product2-color">{{ number_format(Session::get('GioHangOnline')->Total, 0, ',', '.') . ' VNĐ' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endif --}}
                </div> <!-- .col-md-8 -->
                <div class="col-xl-4 sidebar ftco-animate">
                    <div class="cart-detail ftco-bg-dark ftco-bg-dark-info ftco-bg-dark-sale p-3 p-md-4 category">
                        <h4 class="subheading-bill">Khuyến mãi ngày hè</h4>
                        <div class="productsale-slider-right-to-left owl-carousel">
                            <div class="menu-entry menu-entry-slider">
                                <a href="#" class="img" style="background-image: url({{ asset('frontend/images/menu-1.jpg') }});"></a>
                                <div class="text text-center pt-4">
                                    <h3><a href="#">Coffee Capuccino</a></h3>
                                    <p class="price"><span>10.000 VNĐ</span></p>
                                </div>
                            </div>
                            <div class="menu-entry menu-entry-slider">
                                <a href="#" class="img" style="background-image: url({{ asset('frontend/images/menu-2.jpg') }});"></a>
                                <div class="text text-center pt-4">
                                    <h3><a href="#">Coffee Capuccino</a></h3>
                                    <p class="price"><span>10.000 VNĐ</span></p>
                                </div>
                            </div>
                            <div class="menu-entry menu-entry-slider">
                                <a href="#" class="img" style="background-image: url({{ asset('frontend/images/menu-3.jpg') }});"></a>
                                <div class="text text-center pt-4">
                                    <h3><a href="#">Coffee Capuccino</a></h3>
                                    <p class="price"><span>10.000 VNĐ</span></p>
                                </div>
                            </div>
                            <div class="menu-entry menu-entry-slider">
                                <a href="#" class="img" style="background-image: url({{ asset('frontend/images/menu-4.jpg') }});"></a>
                                <div class="text text-center pt-4">
                                    <h3><a href="#">Coffee Capuccino</a></h3>
                                    <p class="price"><span>10.000 VNĐ</span></p>
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
    <link rel="stylesheet" href="{{ asset('frontend/alertifyjs/css/alertify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/alertifyjs/css/themes/default.min.css') }}">
    <style>
        tbody.info-product-tbody td {
            height: 60px;
        }

        input.btn.btn-primary.py-3.px-5 {
            width: 45%;
        }

        .category {
            top: 100px;
            /* margin-top: 100px; */
            position: -webkit-sticky;
            position: sticky;
            left: 0;
        }

        table.info-product {
            width: 100%;
        }

        table.info-product2 {
            width: 100%;
            text-align: center;
            margin-top: 25px;
        }

        .info-product2-color {
            color: #c49b63;
        }

        .info-product tr {
            border-bottom: 1px solid;
        }

        .discount {
            text-decoration: line-through;
        }

        .billing-heading-center {
            text-align: center;
        }

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
@section('script')
    <script src="{{ asset('frontend/alertifyjs/alertify.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() { // nhập 10 số.
            $("#SDT").keypress(function() {
                if (this.value.length == 10) {
                    return false;
                }
            })
        });

        function validate() {
            if (remember.checked == 1) {
                alert("checked");
            }
        };

        $('#dathang').on('click', function() { // kiểm tra trước khi gửi.
            var hoten2 = $('#hoten').val();
            var SDTa = $('#SDT').val();
            var email = $('#email').val();
            var diachi = $('#diachi').val();
            if (hoten2.length > 0 && SDTa.length > 0 && email.length > 0 && diachi.length > 0) {
                var value = document.getElementById('SDT').value;
                if (value.length == 10) {
                    return true;
                }
                alertify.warning("Số Điện Thoại Chưa Đủ");
                return false;
            }
        })
    </script>
@endsection
