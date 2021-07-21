@extends('layouts.frontend_layout')
@section('active_trangchu')
    class="nav-item active"
@endsection
@section('content')
    {{-- Thông báo thêm thành công --}}
    @if (session('success'))
        <input type="text" class="Successful_message" id="Successful_message" value="{{ session('success') }}" hidden>
    @endif
    {{-- Slider --}}
    <section class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url({{ asset('frontend/images/bg_1.jpg') }});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
                    <div class="col-md-8 col-sm-12 text-center ftco-animate">
                        <span class="subheading">Khám phá</span>
                        <h1 class="mb-4">Cùng Sun Coffee</h1>
                        <p class="mb-4 mb-md-5">Nơi bạn có thể tận hưởng được mọi thứ về cà phê theo một cách hoàn hảo nhất.
                        </p>
                        <p><a href="{{ route('SanPham.index') }}" class="btn btn-primary p-3 px-xl-4 py-xl-3">Mua ngay</a>
                            <a href="{{ route('VeChungToi.index') }}" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">Về Chúng Tôi</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="slider-item" style="background-image: url({{ asset('frontend/images/bg_2.jpg') }});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
                    <div class="col-md-8 col-sm-12 text-center ftco-animate">
                        <span class="subheading">Khám phá</span>
                        <h1 class="mb-4">Hương vị cà phê tuyệt vời &amp; Không gian yên tĩnh</h1>
                        <p class="mb-4 mb-md-5">Uống cà phê chúng ta nên uống không đường, có như vậy mới thưởng thức trọn
                            vẹn những tinh hoa của cà phê chính gốc.</p>
                        <p><a href="{{ route('SanPham.index') }}" class="btn btn-primary p-3 px-xl-4 py-xl-3">Mua ngay</a>
                            <a href="{{ route('VeChungToi.index') }}" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">Về Chúng Tôi</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="slider-item" style="background-image: url({{ asset('frontend/images/bg_3.jpg') }});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
                    <div class="col-md-8 col-sm-12 text-center ftco-animate">
                        <span class="subheading">Khám phá</span>
                        <h1 class="mb-4">Dịch vụ tốt nhất</h1>
                        <p class="mb-4 mb-md-5">Chuỗi cửa hàng của Sun Coffee luôn chào đón và phục vụ theo cách tốt nhất để
                            khách hàng luôn cảm thấy thoải mái.</p>
                        <p><a href="{{ route('SanPham.index') }}" class="btn btn-primary p-3 px-xl-4 py-xl-3">Mua ngay</a>
                            <a href="{{ route('VeChungToi.index') }}" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">Về Chúng Tôi</a>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>
    {{-- cho nó dài đến hết --}}
    <section class="ftco-intro">
        <div class="container-wrap">
            <div class="wrap d-md-flex align-items-xl-end">
                <div class="info">
                    <div class="row no-gutters">
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="icon"><span class="icon-phone"></span></div>
                            <div class="text">
                                <h3>+84916105408</h3>
                                <p>Sun Coffee - Mang lại hương vị cà phê Việt.</p>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="icon"><span class="icon-my_location"></span></div>
                            <div class="text">
                                <h3>Địa chỉ</h3>
                                <p> 137/3, khu phố 2, phường An Phú, thành phố Thuận An, Bình Dương.</p>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="icon"><span class="icon-clock-o"></span></div>
                            <div class="text">
                                <h3>Mở cửa từ thứ 2 - thứ 7</h3>
                                <p>8:00am - 9:00pm</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- giới thiêu rồi chuyêmr đến menu --}}
    <section class="ftco-about d-md-flex">
        <div class="one-half img" style="background-image: url({{ asset('frontend/images/about.jpg') }});"></div>
        <div class="one-half ftco-animate">
            <div class="overlap">
                <div class="heading-section ftco-animate ">
                    <span class="subheading">Khám phá</span>
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
    {{--  --}}
    {{-- cho nó thành slider sản phẩm --}}
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <span class="subheading">Khám phá</span>
                    <h2 class="mb-4">Cà phê bán chạy nhất hiện nay</h2>
                    <p>Cà phê là thức uống quen thuộc mỗi buổi sáng giúp tôi có thể cảm nhận được cả thế giới chuyển động
                        trong cơ thể.</p>
                </div>
            </div>
            {{--  --}}
            <div class="productnew-slider owl-carousel">
                @isset($CaPheHatBanChayNhat)
                    @foreach ($CaPheHatBanChayNhat as $item)
                        <div class="menu-entry menu-entry-slider">
                            <a href="{{ route('SanPham.show', $item->id) }}" class="img" style="background-image: url({{ asset('uploads/SanPham/' . $item->hinhanh) }});"></a>
                            <div class="text text-center pt-4">
                                <h3><a href="{{ route('SanPham.show', $item->id) }}">{{ $item->tensanpham }}</a></h3>
                                <p class="price"><span>{{ number_format($item->giasanpham, 0, ',', '.') . ' VNĐ' }}</span>
                                </p>
                            </div>
                        </div>
                    @endforeach
                @endisset
            </div>
            {{--  --}}
        </div>
    </section>


    {{-- 1 vài sản phẩm --}}
    <section class="ftco-section ftco-section-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 pr-md-5">
                    <div class="heading-section text-md-right ftco-animate">
                        <span class="subheading">Khám phá</span>
                        <h2 class="mb-4">Cà phê của chúng tôi</h2>
                        <p class="mb-4">“Cà phê nhé" - Một lời hẹn rất riêng của người Việt. Một lời ngỏ mộc mạc để mình
                            ngồi lại bên nhau và sẻ chia câu chuyện của riêng mình.</p>
                        <p><a href="{{ route('SanPham.index') }}" class="btn btn-primary btn-outline-primary px-4 py-3">Xem sản phẩm</a></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="menu-entry">
                                <a href="#" class="img" style="background-image: url({{ asset('frontend/images/menu-1.jpg') }});"></a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="menu-entry mt-lg-4">
                                <a href="#" class="img" style="background-image: url({{ asset('frontend/images/menu-2.jpg') }});"></a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="menu-entry">
                                <a href="#" class="img" style="background-image: url({{ asset('frontend/images/menu-3.jpg') }});"></a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="menu-entry mt-lg-4">
                                <a href="#" class="img" style="background-image: url({{ asset('frontend/images/menu-4.jpg') }});"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                    <div class="billing-form ftco-bg-dark ftco-bg-dark-info p-3 p-md-5">
                        <h3 class="mb-4 billing-heading billing-heading-center">Đặt Hàng Thành Công</h3>
                        <h4 class="mb-4 billing-heading billing-heading-center">Chúng Tôi Sẽ Xác Nhận Đơn Hàng Của Bạn</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')

    <style>
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

        .ftco-section-bottom {
            padding-top: 0px;
        }

    </style>
@endsection
@section('script')
    <script type="text/javascript">
        window.onload = function() {
            if ($('#Successful_message').hasClass('Successful_message')) {
                $('#exampleModal').modal('show');
            }
        };
    </script>
@endsection
