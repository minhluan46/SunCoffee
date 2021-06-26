@extends('layouts.backend_layout')
@section('content')
    <div class="main_content_iner ">
        <form class="add-form" method="POST" action="{{ route('loai-san-pham.update', $LoaiSanPham->id) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="btn-pm">
                <div class="mb-3 btn-1">
                    <button type="submit" class="btn btn-success"><span class="btn-label"><i
                                class="fa fa-plus"></i></span>Lưu</button>
                    <a class="btn btn-danger" href="{{ route('loai-san-pham.index') }}"><span class="btn-label"><i
                                class="fa fa-times"></i></span>Thoát</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="white_card">
                        <div class="white_card_header">
                            <div class="main-title">
                                <h3 class="m-0">Cập Nhật Loại Sản Phẩm</h3>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="form-group">
                                <div class="form-check">
                                    <label>Trạng Thái</label>
                                    <input type="checkbox" name="trangthai" value='1'
                                        {{ $LoaiSanPham->trangthai == 1 ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Tên Loại Sản Phẩm</label>
                                        <input type="text" class='@error(' tenloaisanpham') is-invalid @enderror
                                            form-control' maxlength="50" name="tenloaisanpham"
                                            value="{{ $LoaiSanPham->tenloaisanpham }}" required>
                                    </div>
                                    @error('tenloaisanpham')
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
