@extends('layouts.backend_layout')
@section('content')
    <div class="main_content_iner ">
        <form class="add-form" method="POST" action="{{ route('chi-tiet-san-pham.store') }}"
            enctype="multipart/form-data">
            @csrf
            <div class="btn-pm">
                <div class="mb-3 btn-1">
                    <button type="submit" class="btn btn-success"><span class="btn-label"><i
                                class="fa fa-plus"></i></span>Lưu</button>
                    <a class="btn btn-danger" href="{{ route('san-pham.show', $SanPham->id) }}"><span class="btn-label"><i
                                class="fa fa-times"></i></span>Thoát</a>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="white_card">
                        <div class="white_card_header">
                            <div class="main-title">
                                <h3 class="m-0">Thêm Chi Tiết Sản Phẩm</h3>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <input type="text" name="id_sanpham" value="{{ $SanPham->id }}" hidden>
                            <div class="form-group">
                                <div class="form-check">
                                    <label>Trạng Thái </label>
                                    <input type="checkbox" name="trangthai" value='1' class="form-check-input" checked="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="form-group">
                                        <label>Khích Thước<b style="color:red"> *</b></label>
                                        <input type="text" class='@error(' kichthuoc') is-invalid @enderror form-control'
                                            maxlength="50" name="kichthuoc">
                                    </div>
                                    @error('kichthuoc')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label>Số Lượng<b style="color:red"> *</b></label>
                                        <input type="number" class='@error(' soluong') is-invalid @enderror form-control'
                                            name="soluong">
                                    </div>
                                    @error('soluong')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label>Giá Sản Phẩm<b style="color:red"> *</b></label>
                                        <input type="number" class='@error(' giasanpham') is-invalid @enderror form-control'
                                            name="giasanpham">
                                    </div>
                                    @error('giasanpham')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label>Ngày Sản Xuất<b style="color:red"> *</b></label>
                                        <input type="date" class='@error(' ngaysanxuat') is-invalid @enderror form-control'
                                            name="ngaysanxuat">
                                    </div>
                                    @error('ngaysanxuat')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label>Hạng Sử Dụng<b style="color:red"> *</b></label>
                                        <input type="date" class='@error(' hansudung') is-invalid @enderror form-control'
                                            name="hansudung">
                                    </div>
                                    @error('hansudung')
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
