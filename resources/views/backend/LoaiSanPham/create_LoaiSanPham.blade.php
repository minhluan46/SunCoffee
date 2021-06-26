@extends('layouts.backend_layout')
@section('content')
    <div class="main_content_iner ">
        <form class="add-form" method="POST" action="{{ route('loai-san-pham.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="btn-pm">
                <div class="mb-3 btn-1">
                    <button type="submit" class="btn btn-success"><span class="btn-label"><i
                                class="fa fa-plus"></i></span>Lưu</button>
                    <a class="btn btn-danger" href="{{ route('loai-san-pham.index') }}"><span class="btn-label"><i
                                class="fa fa-times"></i></span>Thoát</a>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="white_card">
                        <div class="white_card_header">
                            <div class="main-title">
                                <h3 class="m-0">Thêm Loại Sản Phẩm</h3>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <label>Trạng Thái </label>
                                            <input type="checkbox" name="trangthai" value='1' class="form-check-input"
                                                checked="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Tên Loại Sản Phẩm</label>
                                        <input type="text" class='@error(' tenloaisanpham') is-invalid @enderror
                                            form-control' maxlength="50" name="tenloaisanpham" required>
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
