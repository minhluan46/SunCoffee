@extends('layouts.frontend_layout')
@section('content')
    <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url({{ asset('frontend/images/bg_3.jpg') }});"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">GIỎ HÀNG</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home_user.index') }}">Trang
                                    chủ</a></span> <span>Giỏ hàng</span></p>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <?php
    $content = Cart::content();
    // echo '
    // <pre>';
    // print_r($content);
    // echo '<pre>';
    ?>
          
          <section class="ftco-section ftco-cart">
              <div class="container">
                  <div class="row">
                  <div class="col-md-12 ftco-animate">
                      <div class="cart-list">
                          <table class="table">
                              <thead class="thead-primary">
                                <tr class="text-center">
                                  <th>&nbsp;</th>
                                  <th>&nbsp;</th>
                                  <th>Sản phẩm</th>
                                  <th>Giá</th>
                                  <th>Số lượng</th>
                                  <th>Tổng tiền</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach ($content as $ct)
                                <tr class="text-center">
                                  <td class="product-remove"><a href="{{route('cart_user.delete_product',$ct->rowId)}}"><span class="icon-close"></span></a></td>
                                  
                                  <td class="image-prod"><div class="img" style="background-image:url({{ asset('uploads/SanPham/' . $ct->options->image) }});"></div></td>
                                  
                                  <td class="product-name">
                                      <h3>{{ $ct->name }}</h3>
                                  </td>
                                  
                                  <td class="price">{{$ct->price}}</td>
                                  
                                  <td class="quantity">
                                      <div class="input-group mb-3">
                                       <input type="text" name="quantity" class="quantity form-control input-number" value="{{$ct->qty}}" min="1" max="100">
                                    </div>
                                </td>
                                  
                                  <td class="total"><?php $subtotal = $ct->qty * $ct->price; echo number_format($subtotal).' '.'VND' ?></td>
                                </tr><!-- END TR-->
                                @endforeach
                              </tbody>
                            </table>
                        </div>
                  </div>
              </div>
              <div class="row justify-content-end">
                  <div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
                      <div class="cart-total mb-3">
                          <h3>Cart Totals</h3>
                          <p class="d-flex">
                              <span>Tổng</span>
                              <span>{{Cart::Subtotal().'  '.'VND'}}</span>
                          </p>
                          <p class="d-flex">
                              <span>Thuế</span>
                              <span>{{Cart::tax().'  '.'VND'}}</span>
                          </p>
                          {{-- <p class="d-flex">
                              <span>Khuyến mãi</span>
                              <span>$3.00</span>
                          </p> --}}
                          <hr>
                          <p class="d-flex total-price">
                              <span>Thành tiền</span>
                              <span>{{Cart::total().'  '.'VND'}}</span>
                          </p>
                      </div>
                      <p class="text-center"><a href="checkout.html" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
                  </div>
              </div>
              </div>
          </section>

      <section class="ftco-section">
          <div class="container">
              <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <span class="subheading">Discover</span>
              <h2 class="mb-4">Related products</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
          </div>
          <div class="row">
              <div class="col-md-3">
                  <div class="menu-entry">
                          <a href="#" class="img" style="background-image: url(images/menu-1.jpg);"></a>
                          <div class="text text-center pt-4">
                              <h3><a href="#">Coffee Capuccino</a></h3>
                              <p>A small river named Duden flows by their place and supplies</p>
                              <p class="price"><span>$5.90</span></p>
                              <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                          </div>
                      </div>
              </div>
              <div class="col-md-3">
                  <div class="menu-entry">
                          <a href="#" class="img" style="background-image: url(images/menu-2.jpg);"></a>
                          <div class="text text-center pt-4">
                              <h3><a href="#">Coffee Capuccino</a></h3>
                              <p>A small river named Duden flows by their place and supplies</p>
                              <p class="price"><span>$5.90</span></p>
                              <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                          </div>
                      </div>
              </div>
              <div class="col-md-3">
                  <div class="menu-entry">
                          <a href="#" class="img" style="background-image: url(images/menu-3.jpg);"></a>
                          <div class="text text-center pt-4">
                              <h3><a href="#">Coffee Capuccino</a></h3>
                              <p>A small river named Duden flows by their place and supplies</p>
                              <p class="price"><span>$5.90</span></p>
                              <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                          </div>
                      </div>
              </div>
              <div class="col-md-3">
                  <div class="menu-entry">
                          <a href="#" class="img" style="background-image: url(images/menu-4.jpg);"></a>
                          <div class="text text-center pt-4">
                              <h3><a href="#">Coffee Capuccino</a></h3>
                              <p>A small river named Duden flows by their place and supplies</p>
                              <p class="price"><span>$5.90</span></p>
                              <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                          </div>
                      </div>
              </div>
          </div>
          </div>
      </section>
@endsection
