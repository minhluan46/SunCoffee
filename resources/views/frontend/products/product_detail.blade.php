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
                            src="{{ asset('uploads/SanPham/' . $product->hinhanh) }}" class="img-fluid"
                            alt="Colorlib Template"></a>
                </div>
                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <form>
                        <fieldset>
                            @csrf
                            <input id type="hidden" value="{{ $product->id }}" name="product_id_hidden">
                            <h3>{{ $product->tensanpham }}</h3>
                            <p> <b>Mô ta: </b>{{ $product->mota }}</p>


                            <select id="pro_detail_id" class="form-control">
                                @foreach ($product_detail as $pro_detail)
                                    <option value="{{ $pro_detail->id }}">
                                        {{ $pro_detail->kichthuoc }} -- {{ $pro_detail->giasanpham }}</option>
                                @endforeach
                            </select>
                            {{-- <button id="save-cart" style="width: inherit; margin: 0.5em;background: wheat; border-radius: 7%;"><i class="ti-save"><span style="color: darkred;" class="icon-repeat"></span></i></button> --}}


                        </fieldset>
                    </form>
                    <div class="w-100"></div>
                    <div style="text-align: -webkit-center; padding: 1em;">
                        <div class="input-group col-md-6 d-flex mb-3">
                            <span class="input-group-btn mr-2">
                                <button type="button" class="quantity-left-minus btn" data-type="minus"
                                    data-field="#quantity">
                                    <i class="icon-minus"></i>
                                </button>
                            </span>
                            <input type="number" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">

                            <span class="input-group-btn ml-2">
                                <button type="button" class="quantity-right-plus btn" data-type="plus" data-target=""
                                    data-field="">
                                    <i class="icon-plus"></i>
                                </button>
                            </span>
                        </div>
                    </div>


                    <button id="save-cart"
                        style=" width: -webkit-fill-available;margin: 0.5em;padding: 0.2em;background: wheat;"><b>Thêm vào
                            giỏ hàng</b></button>

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
            {{-- <div class="row">
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
            </div> --}}
        </div>
    </section>

@endsection
@section('javascript')
    <script type="text/javascript">
        $('.quantity-right-plus').on("click", function() {

            // alert($('#quantity').val());
            var i = parseInt($('#quantity').val()) + 1;
            $('#quantity').val(i);
        });
        $('.quantity-left-minus').on("click", function() {

            //   alert($('#quantity').val());
            var i = parseInt($('#quantity').val()) - 1;
            $('#quantity').val(i);
        });

        $('#save-cart').on("click", function() {

            // alert($('#pro_detail_id').val());
            // alert($('#quantity').val());
            var el = {
                key: $('#pro_detail_id').val(),
                qty: $('#quantity').val(),
            };
            alert(el);
            $.ajax({
                url: "{{ route('product_user.save_cart') }}",
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "data": el,
                },
                success: function(data) {
                    location.reload();
                    alert("Update success");
                }
            });


        });

        // $(".edit-all").on("click", function() {
        //     alert("Edit all");
        //     var list = [];
        //     $("tr td").each(function() {
        //         $(this).find("input").each(function() {
        //             var el = {
        //                 key: $(this).data("row_id"),
        //                 value: $(this).val()
        //             };
        //             list.push(el);
        //         });
        //     });
        //     console.log(list);
        //     $.ajax({
        //         // url:"{{ url('/quickview') }}",
        //         url: "{{ route('cart_user.update_qty') }}",
        //         // method:"POST",
        //         type: 'POST',
        //         // dataType:"JSON",
        //         data: {
        //             "_token": "{{ csrf_token() }}",
        //             "data": list,
        //         },
        //         success: function(data) {
        //             location.reload();
        //         }
        //     });

        // });
    </script>
@endsection
