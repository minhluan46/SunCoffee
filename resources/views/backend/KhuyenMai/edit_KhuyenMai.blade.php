@extends('layouts.backend_layout')
@section('content')
    <div class="main_content_iner ">
        <form class="add-form" method="POST" action="{{ route('khuyen-mai.update', $SanPham->id) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="btn-pm">
                <div class="mb-3 btn-1">
                    <button type="submit" class="btn btn-success"><span class="btn-label"><i
                                class="fa fa-plus"></i></span>Lưu</button>
                    <a class="btn btn-danger" href="{{ route('khuyen-mai.index') }}"><span class="btn-label"><i
                                class="fa fa-times"></i></span>Thoát</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="white_card">
                        <div class="white_card_header">
                            <div class="main-title">
                                <h3 class="m-0">Cập Nhật Khuyến Mãi</h3>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">Trạng Thái </label>
                                    <input type="checkbox" name="trangthai" value='1' class="form-check-input"
                                        {{ $KhuyenMai->trangthai == 1 ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label>Tên Khuyến Mãi<b style="color:red"> *</b></label>
                                        <input type="text" class='@error(' tenkhuyenmai') is-invalid @enderror form-control'
                                            maxlength="100" name="tenkhuyenmai" value="{{ $KhuyenMai->tenkhuyenmai }}">
                                    </div>
                                    @error('tenkhuyenmai')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label>Thời Gian Bắt Đầu<b style="color:red"> *</b></label>
                                        <input type="date" class='@error(' thoigianbatdau') is-invalid @enderror
                                            form-control' name="thoigianbatdau" value="{{ $KhuyenMai->thoigianbatdau }}">
                                    </div>
                                    @error('thoigianbatdau')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label>Thời Gia Kết Thúc<b style="color:red"> *</b></label>
                                        <input type="date" class='@error(' thoigianketthuc') is-invalid @enderror
                                            form-control' name="thoigianketthuc"
                                            value="{{ $KhuyenMai->thoigianketthuc }}">
                                    </div>
                                    @error('thoigianketthuc')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label>Mức Khuyến Mãi Tối Đa<b style="color:red"> *</b></label>
                                        <input type="number" class='@error(' muckhuyenmaitoida') is-invalid @enderror
                                            form-control' name="muckhuyenmaitoida"
                                            value="{{ $KhuyenMai->muckhuyenmaitoida }}">
                                    </div>
                                    @error('muckhuyenmaitoida')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label>Mô Tả<b style="color:red"> *</b></label>
                                        <textarea type="text" class='@error(' mota') is-invalid @enderror form-control'
                                            name="mota">{{ $KhuyenMai->mota }}</textarea>
                                    </div>
                                    @error('mota')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
