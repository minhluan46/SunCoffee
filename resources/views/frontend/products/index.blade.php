@extends('layouts.frontend_layout')
@section('content')


    {{-- <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url({{ asset('frontend/images/bg_3.jpg') }});"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">Sản phẩm</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home_user.index') }}">Trang
                                    chủ</a></span> <span>Sản phẩm</span></p>
                    </div>

                </div>
            </div>
        </div>
    </section> --}}
    {{-- {{$product->detailProduct->id}} --}}

    {{-- Slide --}}
    <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url({{ asset('frontend/images/bg_3.jpg') }});"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">Sản phẩm</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home_user.index') }}">Trang
                                    chủ</a></span> <span>Sản phẩm</span></p>
                    </div>

                </div>
            </div>
        </div>
        <div class="slider-item" style="background-image: url({{ asset('frontend/images/bg_1.jpg') }});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                    <div class="col-md-8 col-sm-12 text-center ftco-animate">
                        <span class="subheading">Sản phẩm</span>
                        <h1 class="mb-4">Nơi trải nghiệm cà phê tuyệt với nhất.</h1>
                        <p class="mb-4 mb-md-5">Cà phê là sự trung hòa giữa trà và rượu, không mạnh như rượu nhưng cũng
                            không nhẹ như trà. Cà phê thức uống thật khác biệt.</p>
                    </div>

                </div>
            </div>
        </div>

        {{-- <div class="slider-item" style="background-image: url({{ asset('frontend/images/bg_2.jpg') }});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                    <div class="col-md-8 col-sm-12 text-center ftco-animate">
                        <span class="subheading">Welcome</span>
                        <h1 class="mb-4">Amazing Taste &amp; Beautiful Place</h1>
                        <p class="mb-4 mb-md-5">A small river named Duden flows by their place and supplies it with the
                            necessary regelialia.</p>
                        <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="#"
                                class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
                    </div>

                </div>
            </div>
        </div>

        <div class="slider-item" style="background-image: url({{ asset('frontend/images/bg_3.jpg') }});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                    <div class="col-md-8 col-sm-12 text-center ftco-animate">
                        <span class="subheading">Welcome</span>
                        <h1 class="mb-4">Creamy Hot and Ready to Serve</h1>
                        <p class="mb-4 mb-md-5">A small river named Duden flows by their place and supplies it with the
                            necessary regelialia.</p>
                        <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="#"
                                class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
                    </div>

                </div>
            </div>
        </div> --}}
    </section>


    <section class="ftco-menu mb-5 pb-5">
        <div class="container">
            <div class="row d-md-flex">
                {{-- @foreach ($type_product as $t_p) --}}
                    <div class="col-lg-12 ftco-animate p-md-5">

                        <div class="row">
                            <div class="col-md-12 nav-link-wrap mb-5">
                                <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="v-pills-0-tab" data-toggle="pill" href="#v-pills-0" role="tab" aria-controls="v-pills-0" aria-selected="true">Coffee</a>
            
                                  <a class="nav-link" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="false">Main Dish</a>
            
                                  <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Drinks</a>
            
                                  <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Desserts</a>
                                </div>
                            </div>
                            @foreach ($type_product as $t_p)
                            <div class="col-md-12 d-flex align-items-center">

                                <div class="tab-content ftco-animate" id="v-pills-tabContent">

                                    {{-- tab cup coffee --}}
                                    <div class="tab-pane fade show active" id="v-pills-0" role="tabpanel"
                                        aria-labelledby="v-pills-0-tab">
                                        <div class="row">

                                            @foreach ($product as $item)
                                                {{-- @if ($item->loaiSP->tenloaisanpham == $t_p->tenloaisanpham) --}}
                                                <div class="col-md-3">
                                                    <div class="menu-entry">
                                                        <a href="#" class="img"
                                                            style="background-image: url({{ asset('uploads/SanPham/' . $item->hinhanh) }});"></a>
                                                        <div class="text text-center pt-4">
                                                            <h3><a href="#">{{ $item->tensanpham }}-
                                                                    {{ $item->loaiSP->tenloaisanpham }}</a></h3>

                                                            {{-- <p>{{ $item->mota }}</p> --}}
                                                            {{-- {{$item->detailProduct}} --}}
                                                            {{-- <p><a  href="{{ route('product_user.product_detail',[$item->id, $dtPro->id])}}" class="btn btn-primary btn-outline-primary">Xem thêm</a></p> --}}
                                                            {{-- @foreach ($item->detailProduct as $dtPro)
                                                            <p><a href="{{ route('product_user.product_detail', [$item->id, $dtPro->id]) }}"
                                                                    class="btn btn-primary btn-outline-primary"><b>{{ $dtPro->kichthuoc }}</b></a>
                                                            </p>
                                                        @endforeach --}}
                                                            <form>
                                                                <fieldset>
                                                                    @csrf
                                                                    <input type="button" data-toggle="modal"
                                                                        data-target="#xemthem" value="Xem Thêm"
                                                                        class="btn btn-primary btn-outline-primary xemthem"
                                                                        id="testxem" data-id_product="{{ $item->id }}">

                                                                </fieldset>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- @endif --}}
                                            @endforeach
                                        </div>
                                    </div>




                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                {{-- @endforeach --}}
            </div>
        </div>
    </section>



    <div class="modal fade" id="xemthem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div style="background: wheat;" class="modal-content">
                <div class="modal-header">
                    <h5 style="font-size: -webkit-xxx-large;" class="modal-title product_quickview_title" id="">
                        {{-- <span id="product_quick_view_id"></span> --}}
                        <span id="product_quick_view_title"></span>

                    </h5>
                    <button style="font-size: 1em" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span style="font-size: 2em" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <style type="text/css">
                        span#product_quickview_content img {
                            width: 100%;
                        }

                        @media screen and (min-width: 768px) {
                            .modal-dialog {
                                width: 700px;
                                /* New width for default modal */
                            }

                            .modal-sm {
                                width: 350px;
                                /* New width for small modal */
                            }
                        }

                        @media screen and (min-width: 992px) {
                            .modal-lg {
                                width: 1200px;
                                /* New width for large modal */
                            }
                        }

                    </style>
                    <div class="baotrum">
                        <div class="taice1">

                            <span id="product_quickview_image"></span>
                            <span id="product_quickview_gallery"></span>


                        </div>
                        <form class="bom">
                            @csrf
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 mb-5 ftco-animate">
                                        <span id="product_quick_view_image"></span>
                                    </div>
                                    <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                                        <h3></h3>
                                        <p> <b>Mô ta: </b><span id="product_quick_view_desc"></span></p>
                                        <p> <b>Kích thước: </b></p>
                                        
                                        <select name="" id="" class="form-control">
                                            @foreach($product as $item)
                                            {{$item->detailProduct}}
                                            {{-- @if($item->detailProduct != '') --}}
                                            @foreach($item->detailProduct as $test)
                                                @if($test->id_sanpham == 'SP20210701162414')
                                                <option value="">{{$test->kichthuoc}} -- {{$test->giasanpham}}</option>
                                                @endif
                                            @endforeach
                                            {{-- @endif --}}
                                            @endforeach
                                        </select>
                                        {{-- @endif --}}
                                        

                                        <form action="" method="POST">
                                            {{ csrf_field() }}
                                            <p class="price"><span></span></p>
                                            <div class="row mt-4">

                                                <div class="w-100"></div>
                                                <div class="input-group col-md-6 d-flex mb-3">
                                                    {{-- <span class="input-group-btn mr-2">
                                                    <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="#quantity">
                                                        <i class="icon-minus"></i>
                                                    </button>
                                                </span> --}}
                                                    <input type="number" id="quantity" name="quantity"
                                                        class="form-control input-number" value="1" min="1" max="100">

                                                    {{-- <span class="input-group-btn ml-2">
                                                    <button type="button" class="quantity-right-plus btn" data-type="plus" data-target="#quantity" data-field="#quantity">
                                                        <i class="icon-plus"></i>
                                                    </button>
                                                </span> --}}
                                                </div>
                                            </div>
                                            <input type="hidden" value="" name="product_id_hidden">
                                            <input type="hidden" value="" name="product_detail_id_hidden">
                                            <button class="btn btn-primary py-3 px-5" type="submit"><a><b
                                                        style="color: black; font-size: 1.5em !important">Thêm vào giỏ
                                                        hàng</b></a> </button>
                                            {{-- <p><a href="cart.html" class="btn btn-primary py-3 px-5">Thêm vào giỏ hàng</a></p> --}}
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-default redirect-cart">Đi tới giỏ hàng</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script type="text/javascript">
        $('.xemthem').click(function() {
            var product_id = $(this).data('id_product');
            // alert(product_id);
            var _token = $('input[name="_token"]').val();
            // alert(_token);
            $.ajax({
                // url:"{{url('/quickview')}}",
                url:"{{route('product_user.quick_view')}}",
                method:"POST",
                dataType:"JSON",
                data:{product_id:product_id, _token:_token},
                success : function(data){
                    // alert(data.product_id);
                    $('#product_quick_view_title').html(data.product_name);
                    $('#product_quick_view_desc').html(data.product_desc);
                    $('#product_quick_view_image').html(data.product_image);
                    $('#product_quick_view_id').html(data.product_id);

                }
            });

        });
    </script>
@endsection
