@extends('layouts.backend_layout')
@section('content')
    <div class="main_content_iner ">
        <form class="add-form" method="POST" action="{{ route('khach-hang.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="btn-pm">
                <div class="mb-3 btn-1">
                    <button type="submit" class="btn btn-success"><span class="btn-label">
                            <i class="fa fa-plus"></i></span>Lưu</button>
                    <a class="btn btn-danger" href="{{ route('khach-hang.index') }}"><span class="btn-label">
                            <i class="fa fa-times"></i></span>Thoát</a>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="white_card">
                        <div class="white_card_header">
                            <div class="main-title">
                                <h3 class="m-0">Thêm Khách Hàng</h3>
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
                                        <label>Số Điện Thoại<b style="color:red"> *</b></label>
                                        <input type="number" class='@error(' sdt') is-invalid @enderror form-control'
                                            id="SDT" name="sdt" required>
                                    </div>
                                    @error('sdt')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Họ Tên<b style="color:red"> *</b></label>
                                        <input type="int" class='@error(' tenkhachhang') is-invalid @enderror form-control'
                                            maxlength="50" name="tenkhachhang" required>
                                    </div>
                                    @error('tenkhachhang')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Điểm Tích Luỹ</label>
                                        <input type="number" class='@error(' diemtichluy') is-invalid @enderror
                                            form-control' name="diemtichluy" value="0" required>
                                    </div>
                                    @error('diemtichluy')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Địa Chỉ<b style="color:red"> *</b></label>
                                        <textarea type="text" class='@error(' diachi') is-invalid @enderror form-control'
                                            maxlength="150" name="diachi" required></textarea>
                                    </div>
                                    @error('diachi')
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
@section('script')
    <script>
        $(document).ready(function() {
            $("#SDT").keypress(function() {
                if (this.value.length == 10) {
                    return false;
                }
            })
        });

    </script>
@endsection
