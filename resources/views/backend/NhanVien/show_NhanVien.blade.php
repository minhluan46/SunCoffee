@extends('layouts.backend_layout')
@section('content')
    <div class="main_content_iner ">
        <form class="add-form" method="POST" action="" enctype="multipart/form-data">
            <div class="btn-pm">
                <div class="mb-3 btn-1">
                    <a class="btn btn-danger" href="{{ route('nhan-vien.index') }}"><span class="btn-label"><i
                                class="fa fa-times"></i></span>Thoát</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="white_card">
                        <div class="white_card_header">
                            <div class="main-title">
                                <h3 class="m-0">Thông Tin Nhân Viên</h3>
                            </div>
                        </div>
                        <div class="white_card_body">

                            <div class="row">
                                <div class="col-lg-2">
                                    <div class=" mb_15">
                                        <span>Mã Nhân Viên:</span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class=" mb_15">
                                        <span>{{ $NhanVien->id }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-2">
                                    <div class=" mb_15">
                                        <span>Hình Ảnh:</span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class=" mb_15">
                                        <span><img src="{{ asset('uploads/NhanVien/' . $NhanVien->hinhanh) }}"
                                                style="width: 100px; height: 100px; border-radius: 5px;">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-2">
                                    <div class=" mb_15">
                                        <span>Họ Tên:</span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class=" mb_15">
                                        <span>{{ $NhanVien->tennhanvien }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-2">
                                    <div class=" mb_15">
                                        <span>Số Điện Thoại:</span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class=" mb_15">
                                        <span>{{ $NhanVien->sdt }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-2">
                                    <div class=" mb_15">
                                        <span>lương:</span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class=" mb_15">
                                        <span>{{ $NhanVien->luong }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-2">
                                    <div class=" mb_15">
                                        <span>Địa Chỉ:</span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class=" mb_15">
                                        <span>{{ $NhanVien->diachi }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-2">
                                    <div class=" mb_15">
                                        <span>Giới Tính:</span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class=" mb_15">
                                        <span>{{ $NhanVien->gioitinh == 1 ? 'Nam' : 'Nữ' }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-2">
                                    <div class=" mb_15">
                                        <span>Ngày Sinh:</span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class=" mb_15">
                                        <span>{{ $NhanVien->ngaysinh }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-2">
                                    <div class=" mb_15">
                                        <span>Loại Nhân Viên:</span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class=" mb_15">
                                        <span>
                                            @if (isset($LoaiNhanVien))
                                                @foreach ($LoaiNhanVien as $valuelnv)
                                                    @if ($NhanVien->id_loainhanvien == $valuelnv->id)
                                                        {{ $valuelnv->tenloainhanvien }}
                                                    @endif
                                                @endforeach
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-2">
                                    <div class=" mb_15">
                                        <span>Trạng Thái:</span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class=" mb_15">
                                        <span>{{ $NhanVien->trangthai == 1 ? 'Còn Làm' : 'Đã Nghỉ' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop
