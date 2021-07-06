@extends('layouts.frontend_layout')
@section('content')
    <?php $content = Cart::content(); ?>
    <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url({{asset('frontend/images/bg_3.jpg')}});" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">THANH TOÁN</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home_user.index') }}">TRANG
                                    CHỦ</a></span> <span>THANH TOÁN</span>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
      <div >
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    {{-- <th>&nbsp;</th> --}}
                                    <th>Hình ảnh</th>
                                    <th>Sản phẩm</th>
                                    {{-- <th>Loại sản phẩm</th> --}}
                                    {{-- <th>Kích thước</th> --}}
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($content as $ct)
                                    <tr class="text-center">
                                        {{-- <td class="product-remove"><a href="{{route('cart_user.delete_product',$ct->rowId)}}"><span class="icon-close"></span></a></td> --}}



                                        <td class="image-prod">
                                            <div class="img"
                                                style="background-image:url({{ asset('uploads/SanPham/' . $ct->options->image) }});">
                                            </div>
                                        </td>

                                        <td class="product-name">
                                            <h3>{{ $ct->name }}</h3><br />
                                            <p>kích thước: <b>{{ $ct->options->size }}</b></p>
                                        </td>
                                        {{-- <td>{{$ct->options->type}}</td> --}}
                                        {{-- <td>{{$ct->options->size}}</td> --}}
                                        <td class="price">{{ number_format($ct->price, 0, ',', '.') . ' ' . 'VND' }}</td>

                                        <td class="quantity">
                                            <div class="input-group mb-3">
                                                <P
                                                    style="color: wheat;background: black;  width: inherit;text-align: center; margin: inherit;border: 2px solid;">
                                                    {{ $ct->qty }}</P>
                                                {{-- <input style="color: wheat;background: black;  width: inherit;text-align: center; margin: inherit;border: 2px solid;"  type="text" id="quantity-item-{{$ct->rowId}}" data-cart_qty="{{$ct->qty}}" data-row_id="{{$ct->rowId}}" value="{{$ct->qty}}" min="1" max="100"> --}}
                                                {{-- <button style="width: inherit; margin: 0.5em;background: wheat; border-radius: 7%;" class="edit-all"><i class="ti-save"><span style="color: darkred;" class="icon-repeat"></span></i></button> --}}
                                            </div>
                                            {{-- {{$ct->qty}} --}}
                                        </td>

                                        <td class="total"><?php
                                            $subtotal = $ct->qty * $ct->price;
                                            echo number_format($subtotal, 0, ',', '.') . ' ' . 'VND';
                                            ?></td>
                                    </tr><!-- END TR-->
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
      </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12 ftco-animate">
                    <form action="#" class="billing-form ftco-bg-dark p-3 p-md-5">
                        <h3 class="mb-4 billing-heading">Chi tiết hóa đơn</h3>
                        <div class="row align-items-end">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="firstname">Họ và tên: </label>
                                    <input type="text" class="form-control" placeholder="Hãy nhập họ và tên của bạn">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            {{-- <div class="col-md-12">
                                <div class="form-group">
                                    <label for="country">State / Country</label>
                                    <div class="select-wrap">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="" id="" class="form-control">
                                            <option value="">France</option>
                                            <option value="">Italy</option>
                                            <option value="">Philippines</option>
                                            <option value="">South Korea</option>
                                            <option value="">Hongkong</option>
                                            <option value="">Japan</option>
                                        </select>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="w-100"></div>
                            <div style="margin-top: 1em;" class="col-md-12">
                                <div class="form-group">
                                    <label for="streetaddress">Địa chỉ: </label>
                                    <input type="text" class="form-control" placeholder="Hãy nhập địa chỉ của bạn">
                                </div>


                                <input class="billing_address_1" name="" type="hidden" value="">
                                <input class="billing_address_2" name="" type="hidden" value="">
                            </div>
                            <div class="w-100"></div>
                            <div style="margin-top: 1em;" class="col-md-6">
                                <label for="towncity">Tỉnh / Thành phố: </label>

                                <select style="background: black; color: wheat;" style="background: black"
                                    name="calc_shipping_provinces" required="">
                                    <option value="">Tỉnh / Thành phố</option>
                                </select>
                            </div>
                            <div style="margin-top: 1em;" class="col-md-6">
                                <label for="towncity">Quận / Huyện:</label>

                                <select style="background: black; color: wheat;" name="calc_shipping_district" required="">
                                    <option value="">Quận / Huyện</option>
                                </select>
                            </div>
                            <div class="w-300"></div>
                            <div style="margin-top: 1em;"  class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Số điện thoại</label>
                                    <input type="phone" class="form-control" placeholder="Hãy nhập số điện thoại của bạn">
                                </div>
                            </div>
                            <div style="margin-top: 1em;" class="col-md-6">
                                <div class="form-group">
                                    <label for="emailaddress">Email: </label>
                                    <input type="email" class="form-control" placeholder="Hãy nhập Email của bạn">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            {{-- <div class="col-md-12">
                                <div class="form-group mt-4">
                                    <div class="radio">
                                        <label class="mr-3"><input type="radio" name="optradio"> Create an Account? </label>
                                        <label><input type="radio" name="optradio"> Ship to different address</label>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </form><!-- END -->


                    <div class="row mt-5 pt-3 d-flex">
                        <div class="col-md-6 d-flex">
                            <div class="cart-detail cart-total ftco-bg-dark p-3 p-md-4">
                              <h3>TỔNG ĐƠN HÀNG</h3>
                              <p class="d-flex">
                                  <span>Tổng</span>
                                  <span>{{ Cart::Subtotal(0, ',', '.') . '  ' . 'VND' }}</span>
                              </p>
                              <p class="d-flex">
                                  <span>Thuế</span>
                                  <span>{{ Cart::tax(0, ',', '.') . '  ' . 'VND' }}</span>
                              </p>
                              {{-- <p class="d-flex">
                                <span>Khuyến mãi</span>
                                <span>$3.00</span>
                            </p> --}}
                              <hr>
                              <p class="d-flex total-price">
                                  <span>Thành tiền</span>
                                  <span>{{ Cart::total(0, ',', '.') . '  ' . 'VND' }}</span>
                              </p>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="cart-detail ftco-bg-dark p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Phương thức thanh toán</h3>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" name="optradio" class="mr-2"> Giao hàng trực tiếp</label>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" name="optradio" class="mr-2"> Check Payment</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="" class="mr-2"> I have read and accept the
                                                terms and conditions</label>
                                        </div>
                                    </div>
                                </div> --}}
                                <p><a style="font-size: 1.2em" href="#" class="btn btn-primary py-3 px-4">Đặt hàng ngay !!</a></p>
                            </div>
                        </div>
                    </div>
                </div> <!-- .col-md-8 -->
            </div>
        </div>
    </section> <!-- .section -->



@endsection
@section('javascript')
    <script src="https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js"></script>
    <script type="text/javascript">
        if (address_2 = localStorage.getItem('address_2_saved')) {
            $('select[name="calc_shipping_district"] option').each(function() {
                if ($(this).text() == address_2) {
                    $(this).attr('selected', '')
                }
            })
            $('input.billing_address_2').attr('value', address_2)
        }
        if (district = localStorage.getItem('district')) {
            $('select[name="calc_shipping_district"]').html(district)
            $('select[name="calc_shipping_district"]').on('change', function() {
                var target = $(this).children('option:selected')
                target.attr('selected', '')
                $('select[name="calc_shipping_district"] option').not(target).removeAttr('selected')
                address_2 = target.text()
                $('input.billing_address_2').attr('value', address_2)
                district = $('select[name="calc_shipping_district"]').html()
                localStorage.setItem('district', district)
                localStorage.setItem('address_2_saved', address_2)
            })
        }
        $('select[name="calc_shipping_provinces"]').each(function() {
            var $this = $(this),
                stc = ''
            c.forEach(function(i, e) {
                e += +1
                stc += '<option value=' + e + '>' + i + '</option>'
                $this.html('<option value="">Tỉnh / Thành phố</option>' + stc)
                if (address_1 = localStorage.getItem('address_1_saved')) {
                    $('select[name="calc_shipping_provinces"] option').each(function() {
                        if ($(this).text() == address_1) {
                            $(this).attr('selected', '')
                        }
                    })
                    $('input.billing_address_1').attr('value', address_1)
                }
                $this.on('change', function(i) {
                    i = $this.children('option:selected').index() - 1
                    var str = '',
                        r = $this.val()
                    if (r != '') {
                        arr[i].forEach(function(el) {
                            str += '<option value="' + el + '">' + el + '</option>'
                            $('select[name="calc_shipping_district"]').html(
                                '<option value="">Quận / Huyện</option>' + str)
                        })
                        var address_1 = $this.children('option:selected').text()
                        var district = $('select[name="calc_shipping_district"]').html()
                        localStorage.setItem('address_1_saved', address_1)
                        localStorage.setItem('district', district)
                        $('select[name="calc_shipping_district"]').on('change', function() {
                            var target = $(this).children('option:selected')
                            target.attr('selected', '')
                            $('select[name="calc_shipping_district"] option').not(target)
                                .removeAttr('selected')
                            var address_2 = target.text()
                            $('input.billing_address_2').attr('value', address_2)
                            district = $('select[name="calc_shipping_district"]').html()
                            localStorage.setItem('district', district)
                            localStorage.setItem('address_2_saved', address_2)
                        })
                    } else {
                        $('select[name="calc_shipping_district"]').html(
                            '<option value="">Quận / Huyện</option>')
                        district = $('select[name="calc_shipping_district"]').html()
                        localStorage.setItem('district', district)
                        localStorage.removeItem('address_1_saved', address_1)
                    }
                })
            })
        })
    </script>


@endsection
