@extends('layouts.frontend_layout')
@section('content')
    <div>

		@include('frontend.layout.slide_show')

        {{-- Kham pha --}}
        <section class="ftco-about d-md-flex">
            <div class="one-half img" style="background-image: url({{ asset('frontend/images/about.jpg') }});"></div>
            <div class="one-half ftco-animate">
                <div class="overlap">
                    <div class="heading-section ftco-animate ">
                        <span class="subheading">Khám phá</span><br>
                        <h2 class="mb-4">Cùng Sun Coffee</h2>
                    </div>
                    <div>
                        <p>Có bao giờ bạn tự hỏi, ly cà phê thơm ngát trên tay mình đã trải qua những chặng đường nào? Khi
                            nhân viên phục vụ mang đến cho bạn một ly cà phê, đó chỉ là hành động cuối cùng của một hành
                            trình dài và kỳ diệu: từ việc chọn vùng đất hợp thổ nhưỡng, sàng lọc giống, tới trồng cây, chăm
                            bón và thu hái.

                        </p>
                        <p>Từ những cửa hàng đầu tiên, chúng tôi đã bắt đầu hợp tác với Cầu Đất Farm để trồng cà phê theo
                            tiêu chuẩn riêng. Vùng đất phủ sương nằm ở độ cao 1.650m so với mặt nước biển này là nơi tốt
                            nhất để trồng giống cà phê Arabica ở Việt Nam. Chính “độ cao vàng” ấy đã cho ra hạt cà phê
                            Arabica thơm nhẹ, chua thanh tuyệt hảo.</p>
                    </div>
                </div>
            </div>
        </section>
{{-- 
        <div>
            <p></p>
        </div> --}}
        {{-- Cac mon ban chay --}}
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center mb-5 pb-3">
                    <div class="col-md-7 heading-section ftco-animate text-center">
                        <span class="subheading">Khám phá</span><br />
                        <h2 class="mb-4">Cà phê bán chạy nhất hiện nay</h2>
                        <p>Cà phê là thức uống quen thuộc mỗi buổi sáng giúp tôi có thể cảm nhận được cả thế giới chuyển động trong cơ thể.</p>
                    </div>
                </div>
				<div style="margin: auto;padding: 1em;background: saddlebrown;" class="row">

					@foreach ($product as $item)
					<div class="col-md-3">
                        <div class="menu-entry">
                            <div style="text-align: center;" class="show_detail" data-id="{{$item->id}}" data-toggle="modal" data-target="#show_detail">
                                <img style=" border-radius: 10%;border: 3px solid wheat;" src="{{ asset('uploads/SanPham/'.$item->hinhanh) }}" alt="dsfad">
                                {{-- <a href="#" class="img"
                            style="background-image: url({{ asset('uploads/SanPham/'.$item->hinhanh) }});"></a> --}}
                            </div>
                            
                            {{-- <a href="#" class="img"
                                style="background-image: url({{ asset('uploads/SanPham/'.$item->hinhanh) }});"></a> --}}
                                {{-- <p><img class="img" src="{{ asset('uploads/SanPham/'.$item->hinhanh) }}"></p> --}}
                            <div class="text text-center pt-4">
                                <h3><a class="show_detail" data-id="{{$item->id}}" data-toggle="modal" data-target="#show_detail">{{$item->tensanpham}}</a></h3>

                                {{-- <h3><a href="#">{{$item->tensanpham}}</a></h3> --}}
                               
                                {{-- <p>{{$item->mota}}</p> --}}
                                <p class="price"><span> <h5><b>Coffee: {{$item->loaiSP->tenloaisanpham}}</b></h5></span></p>
                                {{-- <form>
                                    <fieldset>
                                        @csrf
                                        <input type="button" data-toggle="modal"
                                            data-target="#xemthem" value="Xem Thêm"
                                            class="btn btn-primary btn-outline-primary xemthem"
                                            id="testxem" data-id_product="{{ $item->id }}">

                                    </fieldset>
                                </form> --}}
                                <p><a href="{{ route('product_user.product_detail',$item->id)}}" class="btn btn-primary btn-outline-primary">Mua ngay !</a></p>






                                {{-- @foreach($item->detailProduct as $dtPro) --}}
                                
                                {{-- <p><a href="{{ route('product_user.product_detail',[$item->id, $dtPro->id])}}" class="btn btn-primary btn-outline-primary"><b>Size {{$dtPro->kichthuoc}}</b></a></p> --}}
                                
                                {{-- URL::route('admin-photo-delete', [$id, $photo->id] --}}
                                {{-- <p><a href="{{ URL::route('product_user.product_detail',[$item->id, $dtPro->id] )}}" class="btn btn-primary btn-outline-primary"><b>{{$dtPro->kichthuoc}}</b></a></p> --}}

                                {{-- @endforeach --}}
                                {{-- <p><a href="{{ route('product_user.product_detail',$item->id)}}" class="btn btn-primary btn-outline-primary">Xem thêm</a></p> --}}
                            </div>
                        </div>
                    </div>
					@endforeach
				</div>
            </div>
        </section>

        {{-- Gioi thieu Menu --}}
        <section class="ftco-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 pr-md-5">
                        <div class="heading-section text-md-right ftco-animate">
                            <span class="subheading">Khám phá</span><br />
                            <h2 class="mb-4">Cà phê của chúng tôi</h2>
                            <p class="mb-4">“Cà phê nhé" - Một lời hẹn rất riêng của người Việt. Một lời ngỏ mộc mạc để mình
                                ngồi lại bên nhau và sẻ chia câu chuyện của riêng mình..</p>
                            <p><a href="{{ route('product_user.menu_page')}}" class="btn btn-primary btn-outline-primary px-4 py-3">Xem sản phẩm</a></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="menu-entry">
                                    <a href="{{ route('product_user.menu_page')}}" class="img"
                                        style="background-image: url({{ asset('frontend/images/menu-1.jpg') }});"></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="menu-entry mt-lg-4">
                                    <a href="{{ route('product_user.menu_page')}}" class="img"
                                        style="background-image: url({{ asset('frontend/images/menu-2.jpg') }});"></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="menu-entry">
                                    <a href="{{ route('product_user.menu_page')}}" class="img"
                                        style="background-image: url({{ asset('frontend/images/menu-3.jpg') }});"></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="menu-entry mt-lg-4">
                                    <a href="{{ route('product_user.menu_page')}}" class="img"
                                        style="background-image: url({{ asset('frontend/images/menu-4.jpg') }});"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Cau chuyen cua Sun Coffee --}}
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center mb-5 pb-3">
                    <div class="col-md-7 heading-section ftco-animate text-center">
                        <h2 class="mb-4">Những câu chuyện về cà phê</h2>
                        <p>Cà phê chỉ có một màu đen quen thuộc nhưng tùy tâm trạng của mỗi người mà quyết định ngọt hay
                            đắng.</p>
                    </div>
                </div>
                <div class="row d-flex">
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry align-self-stretch">
                            <a href="blog-single.html" class="block-20"
                                style="background-image: url({{ asset('frontend/images/image_1.jpg') }});">
                            </a>
                            <div class="text py-4 d-block">
                                <div class="meta">
                                    <div><a href="#">Sept 10, 2018</a></div>
                                    <div><a href="#">Admin</a></div>
                                    <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                                </div>
                                <h3 class="heading mt-2"><a href="#">The Delicious Pizza</a></h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry align-self-stretch">
                            <a href="blog-single.html" class="block-20"
                                style="background-image: url({{ asset('frontend/images/image_2.jpg') }});">
                            </a>
                            <div class="text py-4 d-block">
                                <div class="meta">
                                    <div><a href="#">Sept 10, 2018</a></div>
                                    <div><a href="#">Admin</a></div>
                                    <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                                </div>
                                <h3 class="heading mt-2"><a href="#">The Delicious Pizza</a></h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry align-self-stretch">
                            <a href="blog-single.html" class="block-20"
                                style="background-image: url({{ asset('frontend/images/image_3.jpg') }});">
                            </a>
                            <div class="text py-4 d-block">
                                <div class="meta">
                                    <div><a href="#">Sept 10, 2018</a></div>
                                    <div><a href="#">Admin</a></div>
                                    <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                                </div>
                                <h3 class="heading mt-2"><a href="#">The Delicious Pizza</a></h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>







        {{-- <section class="ftco-section ftco-services">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 ftco-animate">
                        <div class="media d-block text-center block-6 services">
                            <div class="icon d-flex justify-content-center align-items-center mb-5">
                                <span class="flaticon-choices"></span>
                            </div>
                            <div class="media-body">
                                <h3 class="heading">Easy to Order</h3>
                                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost
                                    unorthographic.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 ftco-animate">
                        <div class="media d-block text-center block-6 services">
                            <div class="icon d-flex justify-content-center align-items-center mb-5">
                                <span class="flaticon-delivery-truck"></span>
                            </div>
                            <div class="media-body">
                                <h3 class="heading">Fastest Delivery</h3>
                                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost
                                    unorthographic.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 ftco-animate">
                        <div class="media d-block text-center block-6 services">
                            <div class="icon d-flex justify-content-center align-items-center mb-5">
                                <span class="flaticon-coffee-bean"></span>
                            </div>
                            <div class="media-body">
                                <h3 class="heading">Quality Coffee</h3>
                                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost
                                    unorthographic.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        {{-- <section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url(images/bg_2.jpg);"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                                <div class="block-18 text-center">
                                    <div class="text">
                                        <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                                        <strong class="number" data-number="100">0</strong>
                                        <span>Coffee Branches</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                                <div class="block-18 text-center">
                                    <div class="text">
                                        <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                                        <strong class="number" data-number="85">0</strong>
                                        <span>Number of Awards</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                                <div class="block-18 text-center">
                                    <div class="text">
                                        <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                                        <strong class="number" data-number="10567">0</strong>
                                        <span>Happy Customer</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                                <div class="block-18 text-center">
                                    <div class="text">
                                        <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                                        <strong class="number" data-number="900">0</strong>
                                        <span>Staff</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        {{-- <section class="ftco-menu">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-md-7 heading-section text-center ftco-animate">
                        <span class="subheading">Discover</span>
                        <h2 class="mb-4">Our Products</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                            live the blind texts.</p>
                    </div>
                </div>
                <div class="row d-md-flex">
                    <div class="col-lg-12 ftco-animate p-md-5">
                        <div class="row">
                            <div class="col-md-12 nav-link-wrap mb-5">
                                <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab"
                                    role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1"
                                        role="tab" aria-controls="v-pills-1" aria-selected="true">Main Dish</a>

                                    <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab"
                                        aria-controls="v-pills-2" aria-selected="false">Drinks</a>

                                    <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab"
                                        aria-controls="v-pills-3" aria-selected="false">Desserts</a>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex align-items-center">

                                <div class="tab-content ftco-animate" id="v-pills-tabContent">

                                    <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel"
                                        aria-labelledby="v-pills-1-tab">
                                        <div class="row">
                                            <div class="col-md-4 text-center">
                                                <div class="menu-wrap">
                                                    <a href="#" class="menu-img img mb-4"
                                                        style="background-image: url(images/dish-1.jpg);"></a>
                                                    <div class="text">
                                                        <h3><a href="#">Grilled Beef</a></h3>
                                                        <p>Far far away, behind the word mountains, far from the countries
                                                            Vokalia and Consonantia.</p>
                                                        <p class="price"><span>$2.90</span></p>
                                                        <p><a href="#" class="btn btn-primary btn-outline-primary">Add to
                                                                cart</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <div class="menu-wrap">
                                                    <a href="#" class="menu-img img mb-4"
                                                        style="background-image: url(images/dish-2.jpg);"></a>
                                                    <div class="text">
                                                        <h3><a href="#">Grilled Beef</a></h3>
                                                        <p>Far far away, behind the word mountains, far from the countries
                                                            Vokalia and Consonantia.</p>
                                                        <p class="price"><span>$2.90</span></p>
                                                        <p><a href="#" class="btn btn-primary btn-outline-primary">Add to
                                                                cart</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <div class="menu-wrap">
                                                    <a href="#" class="menu-img img mb-4"
                                                        style="background-image: url(images/dish-3.jpg);"></a>
                                                    <div class="text">
                                                        <h3><a href="#">Grilled Beef</a></h3>
                                                        <p>Far far away, behind the word mountains, far from the countries
                                                            Vokalia and Consonantia.</p>
                                                        <p class="price"><span>$2.90</span></p>
                                                        <p><a href="#" class="btn btn-primary btn-outline-primary">Add to
                                                                cart</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="v-pills-2" role="tabpanel"
                                        aria-labelledby="v-pills-2-tab">
                                        <div class="row">
                                            <div class="col-md-4 text-center">
                                                <div class="menu-wrap">
                                                    <a href="#" class="menu-img img mb-4"
                                                        style="background-image: url(images/drink-1.jpg);"></a>
                                                    <div class="text">
                                                        <h3><a href="#">Lemonade Juice</a></h3>
                                                        <p>Far far away, behind the word mountains, far from the countries
                                                            Vokalia and Consonantia.</p>
                                                        <p class="price"><span>$2.90</span></p>
                                                        <p><a href="#" class="btn btn-primary btn-outline-primary">Add to
                                                                cart</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <div class="menu-wrap">
                                                    <a href="#" class="menu-img img mb-4"
                                                        style="background-image: url(images/drink-2.jpg);"></a>
                                                    <div class="text">
                                                        <h3><a href="#">Pineapple Juice</a></h3>
                                                        <p>Far far away, behind the word mountains, far from the countries
                                                            Vokalia and Consonantia.</p>
                                                        <p class="price"><span>$2.90</span></p>
                                                        <p><a href="#" class="btn btn-primary btn-outline-primary">Add to
                                                                cart</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <div class="menu-wrap">
                                                    <a href="#" class="menu-img img mb-4"
                                                        style="background-image: url(images/drink-3.jpg);"></a>
                                                    <div class="text">
                                                        <h3><a href="#">Soda Drinks</a></h3>
                                                        <p>Far far away, behind the word mountains, far from the countries
                                                            Vokalia and Consonantia.</p>
                                                        <p class="price"><span>$2.90</span></p>
                                                        <p><a href="#" class="btn btn-primary btn-outline-primary">Add to
                                                                cart</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="v-pills-3" role="tabpanel"
                                        aria-labelledby="v-pills-3-tab">
                                        <div class="row">
                                            <div class="col-md-4 text-center">
                                                <div class="menu-wrap">
                                                    <a href="#" class="menu-img img mb-4"
                                                        style="background-image: url(images/dessert-1.jpg);"></a>
                                                    <div class="text">
                                                        <h3><a href="#">Hot Cake Honey</a></h3>
                                                        <p>Far far away, behind the word mountains, far from the countries
                                                            Vokalia and Consonantia.</p>
                                                        <p class="price"><span>$2.90</span></p>
                                                        <p><a href="#" class="btn btn-primary btn-outline-primary">Add to
                                                                cart</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <div class="menu-wrap">
                                                    <a href="#" class="menu-img img mb-4"
                                                        style="background-image: url(images/dessert-2.jpg);"></a>
                                                    <div class="text">
                                                        <h3><a href="#">Hot Cake Honey</a></h3>
                                                        <p>Far far away, behind the word mountains, far from the countries
                                                            Vokalia and Consonantia.</p>
                                                        <p class="price"><span>$2.90</span></p>
                                                        <p><a href="#" class="btn btn-primary btn-outline-primary">Add to
                                                                cart</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <div class="menu-wrap">
                                                    <a href="#" class="menu-img img mb-4"
                                                        style="background-image: url(images/dessert-3.jpg);"></a>
                                                    <div class="text">
                                                        <h3><a href="#">Hot Cake Honey</a></h3>
                                                        <p>Far far away, behind the word mountains, far from the countries
                                                            Vokalia and Consonantia.</p>
                                                        <p class="price"><span>$2.90</span></p>
                                                        <p><a href="#" class="btn btn-primary btn-outline-primary">Add to
                                                                cart</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        {{-- <section class="ftco-section img" id="ftco-testimony" style="background-image: url(images/bg_1.jpg);"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-md-7 heading-section text-center ftco-animate">
                        <span class="subheading">Testimony</span>
                        <h2 class="mb-4">Customers Says</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                            live the blind texts.</p>
                    </div>
                </div>
            </div>
            <div class="container-wrap">
                <div class="row d-flex no-gutters">
                    <div class="col-lg align-self-sm-end ftco-animate">
                        <div class="testimony">
                            <blockquote>
                                <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an
                                    almost unorthographic life One day however a small.&rdquo;</p>
                            </blockquote>
                            <div class="author d-flex mt-4">
                                <div class="image mr-3 align-self-center">
                                    <img src="images/person_1.jpg" alt="">
                                </div>
                                <div class="name align-self-center">Louise Kelly <span class="position">Illustrator
                                        Designer</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg align-self-sm-end">
                        <div class="testimony overlay">
                            <blockquote>
                                <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an
                                    almost unorthographic life One day however a small line of blind text by the name of
                                    Lorem Ipsum decided to leave for the far World of Grammar.&rdquo;</p>
                            </blockquote>
                            <div class="author d-flex mt-4">
                                <div class="image mr-3 align-self-center">
                                    <img src="images/person_2.jpg" alt="">
                                </div>
                                <div class="name align-self-center">Louise Kelly <span class="position">Illustrator
                                        Designer</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg align-self-sm-end ftco-animate">
                        <div class="testimony">
                            <blockquote>
                                <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an
                                    almost unorthographic life One day however a small line of blind text by the name.
                                    &rdquo;</p>
                            </blockquote>
                            <div class="author d-flex mt-4">
                                <div class="image mr-3 align-self-center">
                                    <img src="images/person_3.jpg" alt="">
                                </div>
                                <div class="name align-self-center">Louise Kelly <span class="position">Illustrator
                                        Designer</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg align-self-sm-end">
                        <div class="testimony overlay">
                            <blockquote>
                                <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an
                                    almost unorthographic life One day however.&rdquo;</p>
                            </blockquote>
                            <div class="author d-flex mt-4">
                                <div class="image mr-3 align-self-center">
                                    <img src="images/person_2.jpg" alt="">
                                </div>
                                <div class="name align-self-center">Louise Kelly <span class="position">Illustrator
                                        Designer</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg align-self-sm-end ftco-animate">
                        <div class="testimony">
                            <blockquote>
                                <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an
                                    almost unorthographic life One day however a small line of blind text by the name.
                                    &rdquo;</p>
                            </blockquote>
                            <div class="author d-flex mt-4">
                                <div class="image mr-3 align-self-center">
                                    <img src="images/person_3.jpg" alt="">
                                </div>
                                <div class="name align-self-center">Louise Kelly <span class="position">Illustrator
                                        Designer</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="ftco-appointment">
            <div class="overlay"></div>
            <div class="container-wrap">
                <div class="row no-gutters d-md-flex align-items-center">
                    <div class="col-md-6 d-flex align-self-stretch">
                        <div id="map"></div>
                    </div>
                    <div class="col-md-6 appointment ftco-animate">
                        <h3 class="mb-3">Book a Table</h3>
                        <form action="#" class="appointment-form">
                            <div class="d-md-flex">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="First Name">
                                </div>
                                <div class="form-group ml-md-4">
                                    <input type="text" class="form-control" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="d-md-flex">
                                <div class="form-group">
                                    <div class="input-wrap">
                                        <div class="icon"><span class="ion-md-calendar"></span></div>
                                        <input type="text" class="form-control appointment_date" placeholder="Date">
                                    </div>
                                </div>
                                <div class="form-group ml-md-4">
                                    <div class="input-wrap">
                                        <div class="icon"><span class="ion-ios-clock"></span></div>
                                        <input type="text" class="form-control appointment_time" placeholder="Time">
                                    </div>
                                </div>
                                <div class="form-group ml-md-4">
                                    <input type="text" class="form-control" placeholder="Phone">
                                </div>
                            </div>
                            <div class="d-md-flex">
                                <div class="form-group">
                                    <textarea name="" id="" cols="30" rows="2" class="form-control"
                                        placeholder="Message"></textarea>
                                </div>
                                <div class="form-group ml-md-4">
                                    <input type="submit" value="Appointment" class="btn btn-primary py-3 px-4">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section> --}}




    </div>
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
