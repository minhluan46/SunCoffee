@extends('layouts.frontend_layout')
@section('content')
<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center">

          <div class="col-md-7 col-sm-12 text-center ftco-animate">
            <h1 class="mb-3 mt-5 bread">Contact Us</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Contact</span></p>
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
            <div class="col-md-12 mb-4">
              <h2 class="h4">Contact Information</h2>
            </div>
            <div class="col-md-12 mb-3">
              <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
            </div>
            <div class="col-md-12 mb-3">
              <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
            </div>
            <div class="col-md-12 mb-3">
              <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
            </div>
            <div class="col-md-12 mb-3">
              <p><span>Website:</span> <a href="#">yoursite.com</a></p>
            </div>
          </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-6 ftco-animate">
          <form action="#" class="contact-form">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Your Name">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Your Email">
                </div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Subject">
            </div>
            <div class="form-group">
              <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
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

  <div>
    <div>
      <div style="text-align: center;">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.512700148381!2d106.69923491462255!3d10.77198889232453!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f40c7eb9c5d%3A0xd552bc9b7f536c13!2zNjUgSHXhu7NuaCBUaMO6YyBLaMOhbmc!5e0!3m2!1sen!2s!4v1621959718733!5m2!1sen!2s"
          width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
    </div>
  </div>
@endsection