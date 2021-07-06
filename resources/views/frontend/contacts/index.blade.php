@extends('layouts.frontend_layout')
@section('content')
    <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url({{ asset('frontend/images/bg_3.jpg') }});"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">Liên hệ</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home_user.index') }}">Trang
                                    chủ</a></span> <span>Liên hệ</span></p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- <section class="ftco-section contact-section">
        <div class="container mt-5">
            <div class="row block-9">
                <div class="col-md-4 contact-info ftco-animate">
                    <div class="row">
                        <div class="fb-page" data-href="https://www.facebook.com/thesuncoffeemoingay" data-tabs="timeline"
                            data-width="500" data-height="450" data-small-header="false" data-adapt-container-width="true"
                            data-hide-cover="false" data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/thesuncoffeemoingay" class="fb-xfbml-parse-ignore"><a
                                    href="https://www.facebook.com/thesuncoffeemoingay">SUN coffee &amp; TEA</a>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-6 ftco-animate">
                    <form action="#" class="contact-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Tên của bạn">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Email của bạn">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Tiêu đề">
                        </div>
                        <div class="form-group">
                            <textarea name="" id="" cols="30" rows="7" class="form-control"
                                placeholder="Tin nhắn đến chúng tôi"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> --}}

    <section class=" contact-section" style="margin-top: 4em">
        <div class="container mt-5">
            <div class="container contact-info ftco-animate">
                <div style="display: flex;
                                  flex-direction: row;
                                  flex-wrap: wrap;
                                  justify-content: space-evenly;
                                  align-items: center;">
                    <div style="border-top: 1em solid white; text-align: center">

                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FSun-Coffee-101268012234926%2F%3Fref%3Dpage_internal&tabs=timeline&width=400&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="fit-content" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                       

                            {{-- <div>
                                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FSun-Coffee-101268012234926%2F%3Fref%3Dpage_internal&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                            </div> --}}
        
                    </div>
                    <div style="    background: burlywood;
                            padding: 1.3em;
                            text-align: center; "">
                        <div style="    display: flex;
                                    flex-direction: column;
                                    flex-wrap: nowrap;
                                    align-items: center;width: min-content">
                            <h2>Thông tin liên hệ</h2>
                            <p>
                            <h4>Địa chỉ:</h4>137/3C, khu phố 2, phường An Phú, thành phố Thuận An, tỉnh Bình Dương</p>
                            <p>
                            <h4>Số điện thoại:</h4>+84 916 105 406</p>
                            <p>
                            <h4></h4>
                            </p>
                            <p>
                            <h4>Email:</h4> 0306181384@caothang.edu.vn</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section contact-section">
        <div>
            <div>
                <div>
                    <div style="width:-webkit-fill-available">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3917.410462746698!2d106.70980511462409!3d10.932334692215882!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175281ca7aa9583%3A0xbd4e60821b659919!2zQUVPTiBNQUxMIELDjE5IIETGr8agTkcgQ0FOQVJZ!5e0!3m2!1sen!2s!4v1625337665714!5m2!1sen!2s"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <!-- <div id="map"></div> -->

    {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d397.1711694326231!2d106.73958486799773!3d10.929087625370238!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174d9c5f3343745%3A0x2ce30c5ae5bdc7d!2zQ8O0bmcgVHkgVE5ISCBNVFYgS2jhuqNpIFF1w6Ju!5e0!3m2!1sen!2s!4v1625335842231!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> --}}


    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0"
        nonce="RQTH2UoE"></script>

@endsection
