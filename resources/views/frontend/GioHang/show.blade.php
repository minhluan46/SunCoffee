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
                    <div class="billing-form ftco-bg-dark ftco-bg-dark-info p-3 p-md-5">
                        <form action="{{ route('GioHang.orderOnline') }}" method="POST" class="">
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
                                <div class="col-md-12">
                                    <input type="submit" value="Đặt Hàng" id="dathang" class="btn btn-primary py-3 px-5" style="margin-left: 335px;width: 300px;margin-bottom: -77px;">
                                </div>
                            </div>
                        </form><!-- END -->
                        <button class="btn btn-primary py-3 px-5" id="xemsanpham" style="width: 300px;">Xem Sản Phẩm</button>
                    </div>

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
@section('modal')
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button style="outline: none" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" id="dataxemsanpham">
                </div>
            </div>
        </div>
    </div>
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
                alertify.warning("Số Điện Thoại Không Đúng Định Dạng");
                return false;
            }
        })

        $('#xemsanpham').on('click', function() { // xem giỏ hàng và kiểm tra thành viên.
            $.ajax({
                url: "xem-gio-hang",
                method: "GET",
                data: {
                    sdt: $("input[name='sdt']").val(),
                },
                success: function(data) {
                    $('#dataxemsanpham').html(data);
                    $('#exampleModal').modal('show');
                },
                errors: function(data) {
                    alertify.error("Lỗi Tải Trang");
                }
            })

        })
    </script>
@endsection
