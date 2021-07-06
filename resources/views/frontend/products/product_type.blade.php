@extends('layouts.frontend_layout')
@section('content')

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
                        <span class="subheading">Danh Sách Sản phẩm</span>
                        <h1 class="mb-4">Nơi trải nghiệm cà phê tuyệt với nhất.</h1>
                        <p class="mb-4 mb-md-5">Cà phê là sự trung hòa giữa trà và rượu, không mạnh như rượu nhưng cũng
                            không nhẹ như trà. Cà phê thức uống thật khác biệt.</p>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <section class="ftco-menu mb-5 pb-5">
        <div class="container">
            <div class="row d-md-flex">
                <div style="background: saddlebrown;border-radius: 10%;" class="col-lg-12 ftco-animate p-md-5">
                    <div class="row">
                        <div class="col-md-12 nav-link-wrap mb-5">
                            <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <h1>Danh Sách Cà Phê {{ $title }} </h1>
                            </div>
                        </div>
                        <div class="col-md-12 d-flex align-items-center">

                            <div class="tab-content ftco-animate" id="v-pills-tabContent">

                                <div class="tab-pane fade show active" id="v-pills-0" role="tabpanel"
                                    aria-labelledby="v-pills-0-tab">
                                    <div class="row">
                                        @foreach ($product as $item)
                                            <div class="col-md-3">
                                                <div class="menu-entry">
                                                    <div style="text-align: center;" class="show_detail" data-id="{{$item->id}}" data-toggle="modal" data-target="#show_detail">
                                                        <img style="     border-radius: 10%;border: 3px solid wheat;max-width: -webkit-fill-available;max-height: -webkit-fill-available;" src="{{ asset('uploads/SanPham/'.$item->hinhanh) }}" alt="dsfad">
                                                    </div>
                                                    {{-- <a href="#" class="img"
                                                        style="background-image: url({{ asset('uploads/SanPham/' . $item->hinhanh) }});"></a> --}}
                                                    <div class="text text-center pt-4">
                                                        <h3><a href="product-single.html">{{ $item->tensanpham }}</a></h3>
                                                        {{-- <p>{{ $item->mota }}</p> --}}
                                                        <p><a href="{{ route('product_user.product_detail', $item->id) }}"
                                                                class="btn btn-primary btn-outline-primary">Mua ngay !</a>
                                                        </p>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                            @foreach ($product as $item)
                                                {{ $item->detailProduct }}
                                                {{-- @if ($item->detailProduct != '') --}}
                                                @foreach ($item->detailProduct as $test)
                                                    @if ($test->id_sanpham == 'SP20210701162414')
                                                        <option value="">{{ $test->kichthuoc }} --
                                                            {{ $test->giasanpham }}
                                                        </option>
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
    <div class="modal fade" id="show_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div style="background: wheat;" class="modal-content">
                <div class="modal-header">
                    <h5 style="font-size: -webkit-xxx-large;" class="modal-title show_detail_title" id="">

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
                        <h3><span id="show_detail_title"></span></h3>
                        <div class="taice1">

                            {{-- <span id="product_quickview_image"></span>
                            <span id="product_quickview_gallery"></span> --}}


                        </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 mb-5 ftco-animate">
                                        <span id="product_quick_view_image"></span>
                                    </div>
                                    <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                                        {{-- <h3><span id="show_detail_title"></span></h3> --}}
                                        <p> <b>Mô ta: </b><span id="product_quick_view_desc"></span></p>
                                        <p> <b>Kích thước: </b></p>
                                        
                                        <select name="" id="" class="form-control">
                                            @foreach($product as $item)
                                            {{$item->detailProduct}}
                                            @foreach($item->detailProduct as $test)
                                                <option value="">{{$test->kichthuoc}} -- {{$test->giasanpham}}</option>
                                            @endforeach
                                            @endforeach
                                        </select>
                                        
                                    </div>
                                </div>
                            </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script type="text/javascript">
    $('.show_detail').click(function(){
        var pro_id = $(this).data('id');
        alert(pro_id);
        $.ajax({
                url: "{{ route('product_user.show_detail') }}",
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "data": pro_id,
                },
                success: function(data) {
                    $('#show_detail_title').html(data.product_name);
                    alert("Update success");


                }
        });
    });
    
        // $('.xemthem').click(function() {
        //     var product_id = $(this).data('id_product');
        //     // alert(product_id);
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
    </script>
@endsection