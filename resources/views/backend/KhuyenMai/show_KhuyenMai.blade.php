@extends('layouts.backend_layout')
@section('content')
    <div class="main_content_iner ">
        <form class="add-form" method="POST" action="" enctype="multipart/form-data">
            <div class="btn-pm">
                <div class="mb-3 btn-1">
                    <a class="btn btn-danger" href="{{ route('san-pham.index') }}"><span class="btn-label"><i
                                class="fa fa-times"></i></span>Thoát</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="white_card">
                        <div class="white_card_header">
                            <div class="main-title">
                                <h3 class="m-0">Thông Tin Sản Phẩm</h3>
                            </div>
                        </div>
                        <div class="white_card_body">

                            <div class="row">
                                <div class="col-lg-3">
                                    <img src="{{ asset('uploads/SanPham/' . $SanPham->hinhanh) }}"
                                        style="width: 280px; height: 280px; border-radius: 5px; ">
                                </div>
                                <div class="col-lg-8">

                                    <div class=" mb_5">
                                        <label style="color: red">{{ $SanPham->tensanpham }}</label>
                                    </div>

                                    <div class=" mb_5">
                                        <b>Mã Sản Phẩm: </b>
                                        <label>{{ $SanPham->id }}</label>
                                    </div>

                                    <div class=" mb_5">
                                        <b>Thẻ: </b>
                                        <label>{{ $SanPham->the }}</label>
                                    </div>

                                    <div class=" mb_5">
                                        <b>Loại Sản Phẩm: </b>
                                        <label>
                                            @if (isset($LoaiSanPham))
                                                @foreach ($LoaiSanPham as $valuelsp)
                                                    @if ($SanPham->id_loaisanpham == $valuelsp->id)
                                                        {{ $valuelsp->tenloaisanpham }}
                                                    @endif
                                                @endforeach
                                            @endif
                                        </label>
                                    </div>

                                    <div class=" mb_5">
                                        <b>Trạng Thái: </b>
                                        <label>{{ $SanPham->trangthai == 1 ? 'Đang Bán' : 'Ngừng Bán' }}</label>
                                    </div>

                                    <div class=" mb_5">
                                        <b>Mô Tả: </b>
                                        <label>{{ $SanPham->mota }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
