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
                                  <td class="product-remove"><a href="{{route('cart_user.delete_product',$ct->rowId)}}"><span class="icon-close"></span></a></td>
                                  

                                  
                                  <td class="image-prod"><div class="img" style="background-image:url({{ asset('uploads/SanPham/' . $ct->options->image) }});"></div></td>
                                  
                                  <td class="product-name">
                                      <h3>{{ $ct->name }}</h3><br/>
                                      <p>kích thước: <b>{{$ct->options->size}}</b></p>
                                  </td>
                                  {{-- <td>{{$ct->options->type}}</td> --}}
                                  {{-- <td>{{$ct->options->size}}</td> --}}
                                  <td class="price">{{number_format($ct->price,0,',',".").' '.'VND'}}</td>
                                  
                                  <td class="quantity">
                                      <div class="input-group mb-3">
                                        <input style="color: wheat;background: black;  width: inherit;text-align: center; margin: inherit;border: 2px solid;"  type="text" id="quantity-item-{{$ct->rowId}}" data-cart_qty="{{$ct->qty}}" data-row_id="{{$ct->rowId}}" value="{{$ct->qty}}" min="1" max="100">
                                        <button style="width: inherit; margin: 0.5em;background: wheat; border-radius: 7%;" class="edit-all"><i class="ti-save"><span style="color: darkred;" class="icon-repeat"></span></i></button>
                                    </div>
                                    {{-- {{$ct->qty}} --}}
                                </td>
                                  
                                  <td class="total"><?php $subtotal = $ct->qty * $ct->price; echo number_format($subtotal,0,',',".").' '.'VND' ?></td>
                                </tr><!-- END TR-->
                                @endforeach
                              </tbody>
                            </table>
                        </div>
                  </div>
              </div>
              <div class="row justify-content-end">
                  <div class="mt-5 cart-wrap ftco-animate">
                      <div style="font-size: 1.2em;" class="cart-total mb-3">
                          <h3>TỔNG ĐƠN HÀNG</h3>
                          <p class="d-flex">
                              <span>Tổng</span>
                              <span>{{Cart::Subtotal(0,',',".").'  '.'VND'}}</span>
                          </p>
                          <p class="d-flex">
                              <span>Thuế</span>
                              <span>{{Cart::tax(0,',',".").'  '.'VND'}}</span>
                          </p>
                          {{-- <p class="d-flex">
                              <span>Khuyến mãi</span>
                              <span>$3.00</span>
                          </p> --}}
                          <hr>
                          <p class="d-flex total-price">
                              <span>Thành tiền</span>
                              <span>{{Cart::total(0,',',".").'  '.'VND'}}</span>
                          </p>
                      </div>
                      <p class="text-center"><a style="font-size: 1em;" href="{{route('cart_user.check_out')}}" class="btn btn-primary py-3 px-4">THANH TOÁN</a></p>
                  </div>
              </div>
              </div>
          </section>

      {{-- <section class="ftco-section">
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
      </section> --}}
@endsection
@section('javascript')
    <script type="text/javascript">
        // $('.xemthem').click(function() {
        //     var product_id = $(this).data('id_product');
        //     alert(product_id);
        //     var _token = $('input[name="_token"]').val();
        //     // alert(_token);
        //     $.ajax({
        //         // url:"{{url('/quickview')}}",
        //         url:"{{route('product_user.quick_view')}}",
        //         method:"POST",
        //         dataType:"JSON",
        //         data:{product_id:product_id, _token:_token},
        //         success : function(data){
        //             // alert(data.product_id);
        //             $('#product_quick_view_title').html(data.product_name);
        //             $('#product_quick_view_desc').html(data.product_desc);
        //             $('#product_quick_view_image').html(data.product_image);
        //             $('#product_quick_view_id').html(data.product_id);

        //         }
        //     });

        // });
        $(".edit-all").on("click", function(){
            alert("Edit all");
            var list =[];
            $("tr td").each(function(){
                $(this).find("input").each(function(){
                    var el = {key: $(this).data("row_id"), value: $(this).val()};
                    list.push(el);
                });
            });
            console.log(list);
            $.ajax({
                // url:"{{url('/quickview')}}",
                url: "{{route('cart_user.update_qty')}}",
                // method:"POST",
                type: 'POST',
                // dataType:"JSON",
                data:{
                    "_token": "{{csrf_token()}}",
                    "data": list,
                },
                success : function(data){
                    location.reload();
                }
            });

        });
    </script>
@endsection
