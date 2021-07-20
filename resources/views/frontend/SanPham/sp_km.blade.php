@extends('layouts.frontend_layout')
@section('active_sanpham')
    class="nav-item active"
@endsection
@section('content')
    {{-- {{$CaPheKM}} --}}
    <section class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url({{ asset('frontend/images/bg_3.jpg') }});"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">SẢN PHẨM</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('Trangchu.index') }}">TRANG
                                    CHỦ</a></span> <span>SẢN PHẨM</span></p>
                    </div>

                </div>
            </div>
        </div>
    </section>
    {{--  --}}
    <section class="ftco-menu mb-5 pb-5">
        <div class="container">

            <div class="row d-md-flex">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-4 col-lg-3 ">
                            <div class="border-search category">
                                <div class="">
                                    <form action="{{ route('SanPham.search_sanpham') }}" class="search-form" method="POST">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <div class="icon">
                                                <button type="submit"><span class="icon-search"></span></button>
                                            </div>
                                            <input type="text" name="keyword" id="keyword" class="form-control"
                                                placeholder="Tìm Kiếm...">
                                        </div>
                                    </form>
                                </div>
                                <div class="">{{-- gắng cứng --}}
                                    <a href="{{ route('SanPham.the', 'MỚI') }}"><button
                                            class="btn btn-primary btn-outline-primary btn-search">Sản Phẩm Mới</button></a>
                                </div>
                                <div class="">{{-- gắng cứng --}}
                                    <a href="{{ route('SanPham.the', 'BÁN CHẠY NHẤT') }}"> <button
                                            class="btn btn-primary btn-outline-primary btn-search">Sản Phẩm Bán
                                            Chạy</button></a>
                                </div>
                                <div class="">{{-- cần kiểm tra xem có khuyến mãi không --}}
                                    <a href="{{ route('SanPham.status') }}"><button
                                            class="btn btn-primary btn-outline-primary btn-search"> Sản Phẩm Khuyến
                                            Mãi</button></a>
                                </div>

                                @if (isset($LoaiSP))
                                    @foreach ($LoaiSP as $LSP)
                                        <div class="">{{-- vòng lập loại sản phẩm --}}
                                            <a href="{{ route('SanPham.lsp', $LSP->id) }}"><button
                                                    class="btn btn-primary btn-outline-primary btn-search">{{ $LSP->tenloaisanpham }}</button></a>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="">{{-- thêm 1 đoạn cho nó khớp với khung hình --}}
                                    <h4 class="subheading-search">Cà Phê Nhé</h4>
                                    <p>Một lời hẹn rất riêng của người Việt. Một lời ngỏ mộc mạc để mình ngồi
                                        lại bên nhau và sẻ chia câu chuyện của riêng mình.</p>
                                </div>

                            </div>
                        </div>

                        <div class="col-12 col-md-8 col-lg-9"> {{-- thêm 1 cái id để khi tìm kiếm sẽ thay đổi nó --}}
                            @if(isset($KM))
                            @foreach ($KM as $CT)
                                <div class="row">{{-- phần của khuyến mãi --}}
                                    <div class="col-md-12 heading-section ftco-animate text-center">
                                        <span class="subheading mb-5">{{ $CT->tenkhuyenmai }}</span>{{-- tên khuyến mãi --}}
                                        <p>Thời gian bắt đầu: {{ $CT->thoigianbatdau }} -> Thời gian kết thúc:
                                            {{ $CT->thoigianketthuc }}</p>
                                        {{-- nội dung --}}
                                    </div>
                                    @if(isset($CaPheKM))
                                    @foreach ($CaPheKM as $KM)
                                        @if ($KM->id_khuyenmai == $CT->id)
                                            <div class="col-md-4  menu-t">
                                                <div class="menu-entry">
                                                    <a href="{{ route('SanPham.show', $KM->id_sanpham) }}" class="img"
                                                        style="background-image: url({{ asset('uploads/SanPham/' . $KM->hinhanh) }});"><span
                                                        class="badge badge-pill badge-info ban">{{ $KM->the == 'THƯỜNG' ? '' : $KM->the }}</span></a>
                                                    <div class="text text-center pt-4">
                                                        <h3><a href="{{ route('SanPham.show', $KM->id_sanpham) }}">{{ $KM->tensanpham }}</a></h3>
                                                        <p>Kích thước: {{ $KM->tenquycach }}</p>
                                                        <p class="price">
                                                            <span>{{ number_format($KM->giasanpham, 0, ',', '.') }}VNĐ ( -
                                                                {{ $KM->muckhuyenmai }} %)</span>
                                                            {{-- <span>{{ $KM->giasanpham }} -> <b
                                                                    style="font-size: 1.3em">{{ $KM->giasanpham - $KM->giasanpham * ($KM->muckhuyenmai / 100) }}</b></span> --}}
                                                        </p>
                                                        <p><a href="#" class="btn btn-primary btn-outline-primary">Thêm Vào
                                                                Giỏ
                                                                Hàng</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    @endif
                                </div>
                            @endforeach
                            @endif

                        </div>
                    </div>
                </div>
    </section>

@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/css.css') }}" />
@endsection
