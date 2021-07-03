@extends('layouts.frontend_layout')
@section('content')
<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url({{asset('frontend/images/bg_3.jpg')}});" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center">

          <div class="col-md-7 col-sm-12 text-center ftco-animate">
            <h1 class="mb-3 mt-5 bread">Liên hệ</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home_user.index') }}">Trang chủ</a></span> <span>Liên hệ</span></p>
          </div>

        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section contact-section">
    <div class="container mt-5">
      <div class="row block-9">
        <div class="col-md-4 contact-info ftco-animate">
          <div class="row">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d397.1711694326231!2d106.73958486799773!3d10.929087625370238!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174d9c5f3343745%3A0x2ce30c5ae5bdc7d!2zQ8O0bmcgVHkgVE5ISCBNVFYgS2jhuqNpIFF1w6Ju!5e0!3m2!1sen!2s!4v1625335842231!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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
              <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Tin nhắn đến chúng tôi"></textarea>
            </div>
            <div class="form-group">
              <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- <div id="map"></div> -->

  {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d397.1711694326231!2d106.73958486799773!3d10.929087625370238!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174d9c5f3343745%3A0x2ce30c5ae5bdc7d!2zQ8O0bmcgVHkgVE5ISCBNVFYgS2jhuqNpIFF1w6Ju!5e0!3m2!1sen!2s!4v1625335842231!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> --}}
@endsection