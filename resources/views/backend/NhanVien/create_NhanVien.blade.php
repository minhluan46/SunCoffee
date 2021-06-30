@extends('layouts.backend_layout')
@section('content')
    <div class="main_content_iner ">
        <form class="add-form" method="POST" action="{{ route('nhan-vien.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="btn-pm">
                <div class="mb-3 btn-1">
                    <button type="submit" class="btn btn-success"><span class="btn-label">Lưu</button>
                    <a class="btn btn-danger" href="{{ route('nhan-vien.index') }}">Thoát</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="main-title">
                                <h3 class="m-0">Thêm Nhân Viên</h3>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="form-group">
                                <div class="form-check">
                                    <label>Trạng Thái : </label>
                                    <input type="checkbox" name="trangthai" value='1' class="form-check-input" checked="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="row">

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Số Điện Thoại<b style="color:red"> *</b></label>
                                                <input type="number" class='@error(' sdt') is-invalid @enderror
                                                    form-control' id="SDT" name="sdt" required>
                                            </div>
                                            @error('sdt')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Mật Khẩu<b style="color:red"> *</b></label>
                                                <input type="password" class='@error(' password') is-invalid @enderror
                                                    form-control' maxlength="200" name="password" required>
                                            </div>
                                            @error('password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Họ Tên<b style="color:red"> *</b></label>
                                                <input type="int" class='@error(' tennhanvien') is-invalid @enderror
                                                    form-control' maxlength="50" name="tennhanvien" required>
                                            </div>
                                            @error('tennhanvien')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Nhập Lại Mật Khẩu<b style="color:red"> *</b></label>
                                                <input type="password" class='@error(' password_confirm') is-invalid
                                                    @enderror form-control' maxlength="200" name="password_confirm"
                                                    required>
                                            </div>
                                            @error('password_confirm')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Tên Đăng Nhập<b style="color:red"> *</b></label>
                                                <input type="int" class='@error(' tentaikhoan') is-invalid @enderror
                                                    form-control' maxlength="50" name="tentaikhoan" required>
                                            </div>
                                            @error('tentaikhoan')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Lương<b style="color:red"> *</b></label>
                                                <input type="number" class='max10 @error(' luong') is-invalid @enderror
                                                    form-control' maxlength="10" name="luong" required>
                                            </div>
                                            @error('luong')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Ngày Sinh<b style="color:red"> *</b></label>
                                                <input type="date" class='@error(' ngaysinh') is-invalid @enderror
                                                    form-control' name="ngaysinh" required>
                                            </div>
                                            @error('ngaysinh')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Giới Tính<b style="color:red"> *</b></label>
                                                <select class="@error(' gioitinh') is-invalid @enderror form-control"
                                                    name="gioitinh">
                                                    <option value="1">Nam</option>
                                                    <option value="0">Nữ</option>
                                                </select>
                                            </div>
                                            @error('gioitinh')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Loại Nhân Viên<b style="color:red"> *</b></label>
                                                <select class="@error(' id_loainhanvien') is-invalid @enderror form-control"
                                                    name="id_loainhanvien" required>
                                                    @if (isset($LoaiNhanVien))
                                                        @foreach ($LoaiNhanVien as $valuelnv)
                                                            <option value="{{ $valuelnv->id }}">
                                                                {{ $valuelnv->tenloainhanvien }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            @error('id_loainhanvien')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Địa Chỉ<b style="color:red"> *</b></label>
                                                <textarea type="text" class='@error(' diachi') is-invalid @enderror
                                                    form-control' maxlength="100" name="diachi" required></textarea>
                                            </div>
                                            @error('diachi')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-12">
                                            <label>Ảnh Đại Diện</label> <br>
                                            <input type="file" class="image @error(' hinhanh') is-invalid @enderror"
                                                id="image" name="hinhanh" onchange="UpImg()">
                                            <div id="displayIMG"></div>
                                            @error('hinhanh')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
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
