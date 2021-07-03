@extends('layouts.frontend_layout')
@section('content')
    <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url({{ asset('frontend/images/bg_3.jpg') }});"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">Về chúng tôi</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home_user.index') }}">Về chúng
                                    tôi</a></span> <span>Dịch Vụ</span></p>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="ftco-about d-md-flex">
        <div class="one-half img" style="background-image: url({{ asset('frontend/images/about.jpg') }});"></div>
        <div class="one-half ftco-animate">
            <div class="overlap">
                <div class="heading-section ftco-animate ">
                    <span class="subheading">Khám phá</span><br />
                    <h2 class="mb-4">Câu chuyện của chúng tôi</h2>
                </div>
                <div>
                    <p>“Cà phê nhé" - Một lời hẹn rất riêng của người Việt. Một lời ngỏ mộc mạc để mình ngồi lại bên nhau và
                        sẻ chia câu chuyện của riêng mình.</p>
                    <p>
                        Tại Sun Coffee, chúng tôi luôn trân trọng những câu chuyện và đề cao giá trị Kết nối con người.
                        Chúng tôi mong muốn Sun Coffee sẽ trở thành “Nhà Cà Phê", nơi mọi người xích lại gần nhau và tìm
                        thấy niềm vui, sự sẻ chia thân tình bên những tách cà phê đượm hương, chất lượng.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section img" id="ftco-testimony"
        style="background-image: url({{ asset('frontend/images/bg_1.jpg') }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <h2
                        class="section_heading line_after_heading block_brand_story_title line_after_heading_section max_title">
                        Hãy cùng nhìn lại những dấu ấn trong hành trình của chúng tôi</h2>
                    <div class="lists_year">
                        <div class="list_year_item display_flex">
                            <b style="width: 25%;
                                        font-size: 42px;
                                        text-align: center;
                                        font-weight: 700;
                                        color: #EA8025;
                                        margin-top: 0;
                                        padding-right: 15px;
                                        font-family: 'BebasNeue','Lato', " Times New Roman", serif; padding-top:
                                10px;">01/2020</b>
                            <div class="year_content">
                                <h3 class="year_content_title">RA MẮT CỬA HÀNG ĐẦU TIÊN tại Aeon Bình Dương Canary.</h3>
                                <p>Sau 3 tháng, Sun Coffee có phát triển cửa hàng đầu tiên tại Bình Dương. </p>
                            </div>
                        </div>
                        <div class="list_year_item display_flex">
                            <b style="width: 25%;
                                        font-size: 42px;
                                        text-align: center;
                                        font-weight: 700;
                                        color: #EA8025;
                                        margin-top: 0;
                                        padding-right: 15px;
                                        font-family: 'BebasNeue','Lato', " Times New Roman", serif; padding-top:
                                10px;">04/2020</b>
                            <div class="year_content">
                                <h3 class="year_content_title">THE COFEE HOUSE CÓ MẶT TẠI HÀ NỘI</h3>
                                <p>Tới nay, Nhà đã có 02 cửa hàng ở các khu vực trung tâm Thủ đô Hà Nội.</p>
                            </div>
                        </div>
                        <div class="list_year_item display_flex">
                            <b style="width: 25%;
                                        font-size: 42px;
                                        text-align: center;
                                        font-weight: 700;
                                        color: #EA8025;
                                        margin-top: 0;
                                        padding-right: 15px;
                                        font-family: 'BebasNeue','Lato', " Times New Roman", serif; padding-top:
                                10px;">08/2020</b>
                            <div class="year_content">
                                <h3 class="year_content_title">Xin chào ĐÀ NẴNG, BIÊN HOÀ VÀ VŨNG TÀU</h3>
                                <p>Chúng tôi đem trải nghiệm “Đi cà phê” lan toả rộng hơn, đến Đà Nẵng, Biên Hòa và Vũng
                                    Tàu.</p>
                            </div>
                        </div>
                        <div class="list_year_item display_flex">
                            <b style="width: 25%;
                                        font-size: 42px;
                                        text-align: center;
                                        font-weight: 700;
                                        color: #EA8025;
                                        margin-top: 0;
                                        padding-right: 15px;
                                        font-family: 'BebasNeue','Lato', " Times New Roman", serif; padding-top:
                                10px;">4/2021</b>
                            <div class="year_content">
                                <h3 class="year_content_title">Chinh phục HÀNH TRÌNH “TỪ NÔNG TRẠI ĐẾN LY CÀ PHÊ”</h3>
                                <div class="year_content_wrap">
                                    <div class="content_wrap_item">
                                        <p>CHÍNH THỨC VẬN HÀNH TRANG TRẠI</p>
                                        <p>Sau khi bộ phận Cà Phê của Cầu Đất Farm được sáp nhập vào Sun Coffee, dải
                                            sơn nguyên 1,650m trên cao sẽ là nơi chúng tôi gieo nên ước mơ đem hạt cà phê
                                            Việt ra ngoài thế giới.</p>
                                    </div>
                                    <div class="content_wrap_item">
                                        <p>RA MẮT CỬA HÀNG FLAGSHIP Sun Coffee SIGNATURE</p>
                                        <p>Nơi Sun Coffee chia sẻ trọn vẹn câu chuyện về đam mê cà phê với những người
                                            đồng điệu.</p>
                                    </div>
                                    <div class="content_wrap_item">
                                        <p>CHÍNH THỨC CÁN MỐC 10 CỬA HÀNG</p>
                                        <p>Sau 8 tháng ra mắt và hoạt động tại Việt Nam, Sun Coffee chính thức vượt
                                            ngưỡng 10 cửa hàng, với mong muốn "Ai cũng có 1 Sun Coffee gần nhà".</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>



    <section class="ftco-counter ftco-bg-dark img" id="section-counter"
        style="background-image: url({{ asset('frontend/images/bg_2.jpg') }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                                    <strong class="number" data-number="10">0</strong>
                                    <span>Thương hiệu cà phê</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                                    <strong class="number" data-number="8">0</strong>
                                    <span>Tổng số giải thưởng</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                                    <strong class="number" data-number="8067">0</strong>
                                    <span>Khách hàng hài lòngr</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                                    <strong class="number" data-number="100">0</strong>
                                    <span>Nhân viên</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
