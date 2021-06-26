@extends('layouts.backend_layout')
@section('content')
    <div class="main_content_iner ">
        <div class="btn-pm">
            <div class="mb-3 btn-1">
                <a class="btn btn-danger" href="{{ route('san-pham.index') }}"><span class="btn-label"><i
                            class="fa fa-times"></i></span>Thoát</a>
            </div>
        </div>
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
        {{--  --}}
        <div class="row row2">
            <div class="col-12">
                <div class="white_card ">
                    <div class="white_card_header">
                        <a class="btn btn-success" href="{{ route('chi-tiet-san-pham.create',$SanPham->id) }}"><span class="btn-label"><i
                                    class="fa fa-plus"></i></span>Thêm Mới</a>
                        <div class="main-title">
                            <h3 class="m-0">Chi Tiết Sản Phẩm</h3>
                        </div>
                    </div>
                    <div class="white_card_body">


                        {{--  --}}
                        <div class="chitiet">
                            {{-- thông báo thành công --}}
                            @if (session('messsge'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>{{ session('messsge') }}</strong>
                                </div>
                            @endif
                            <table class="table">
                                <thead>
                                    <tr>
                                        {{-- <th scope="col">#</th> --}}
                                        <th scope="col">Kích Thước</th>
                                        <th scope="col">Số Lượng</th>
                                        <th scope="col">Giá Bán</th>
                                        <th scope="col">Ngày Sản Xuất</th>
                                        <th scope="col">Ngày Hết Hạng</th>
                                        <th scope="col">Trạng Thái</th>
                                        <th scope="col">Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($ChiTietSanPham))
                                        @foreach ($ChiTietSanPham as $valuectsp)
                                            <tr>
                                                {{-- <td>{{ $valuectsp->id }}</td> --}}
                                                <td>{{ $valuectsp->kichthuoc }}</td>
                                                <td>{{ $valuectsp->soluong }}</td>
                                                <td>{{ $valuectsp->giasanpham }}</td>
                                                <td>{{ $valuectsp->ngaysanxuat }}</td>
                                                <td>{{ $valuectsp->hansudung }}</td>
                                                <td>
                                                    <span
                                                        class="badge rounded-pill {{ $valuectsp->trangthai == 1 ? 'bg-success' : 'bg-danger' }}">
                                                        {{ $valuectsp->trangthai == 1 ? 'Còn Hàng' : 'Hết Hàng' }}</span>
                                                </td>
                                                <td>
                                                    <div class="action_btns d-flex">
                                                        <a href="{{ route('chi-tiet-san-pham.edit', $valuectsp->id) }}"
                                                            class="action_btn mr_10"><i class="far fa-edit"></i></a>
                                                        <a href="{{ route('chi-tiet-san-pham.destroy', $valuectsp->id) }}"
                                                            class="action_btn"><i class="fas fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--  --}}

        {{--  --}}
    </div>
@endsection
