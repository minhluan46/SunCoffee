@extends('layouts.frontend_layout')
@section('content')
    
<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url({{asset('frontend/images/bg_3.jpg')}});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center">

          <div class="col-md-7 col-sm-12 text-center ftco-animate">
              <h1 class="mb-3 mt-5 bread">Dịch vụ</h1>
              <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home_user.index') }}">Trang chủ</a></span> <span>Dịch Vụ</span></p>
            </div>

        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section ftco-services">
      <div class="container">
          <div class="row">
        <div class="col-md-4 ftco-animate">
          <div class="media d-block text-center block-6 services">
            <div class="icon d-flex justify-content-center align-items-center mb-5">
                <span class="flaticon-choices"></span>
            </div>
            <div class="media-body">
              <h3 class="heading">Dễ dàng mua hàng</h3>
              <p>Giao diện dễ thao tác và đội ngũ nhân viên phụ vụ nhiệt tình.</p>
            </div>
          </div>      
        </div>
        <div class="col-md-4 ftco-animate">
          <div class="media d-block text-center block-6 services">
            <div class="icon d-flex justify-content-center align-items-center mb-5">
                <span class="flaticon-delivery-truck"></span>
            </div>
            <div class="media-body">
              <h3 class="heading">Giao hàng siêu nhanh</h3>
              <p>Sun Coffee hợp tác với nhiều đơn vị phân phối và đối tác giao hàng khác nhau. Do đó, thời gian cà phê đến tay bạn luôn là nhanh nhất.</p>
            </div>
          </div>      
        </div>
        <div class="col-md-4 ftco-animate">
          <div class="media d-block text-center block-6 services">
            <div class="icon d-flex justify-content-center align-items-center mb-5">
                <span class="flaticon-coffee-bean"></span></div>
            <div class="media-body">
              <h3 class="heading">Chất lượng cà phê thượng hạng</h3>
              <p>Cà phê được cung cấp trực tiếp từ sơn nguyên và trải qua quá trình chọn lọc và xử lí kĩ lưỡng nên luôn giữ được hương vị tuyệt hảo nhất.</p>
            </div>
          </div>    
        </div>
      </div>
      </div>
  </section>
@endsection