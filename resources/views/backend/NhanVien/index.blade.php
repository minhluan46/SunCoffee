@extends('layouts.backend_layout')
@section('active_quanlynhanvien')
    class="nav-item active"
@endsection
@section('content')
    <div class="main_content_iner ">
        {{-- header --}}
        <div class="btn-pm d-flex justify-content-between">
            <div class="mb-3 btn-1">
                <a class="btn btn-success" href="{{ route('nhan-vien.create') }}">Thêm Nhân Viên</a>
                <a class="btn btn-info" href="{{ route('loai-nhan-vien.index') }}">Xem Loại Nhân Viên</a>
            </div>
            <div class="serach_field-area d-flex align-items-center mb-3">
                <div class="search_inner">
                    <form method="GET">
                        <div class="search_field">
                            <input type="text" placeholder="Tên, loại, sđt..." name="search">
                        </div>
                        <button id="form-search" data-url="{{ route('nhan-vien.search') }}" type="submit">
                            <img src="{{ asset('backend/img/icon/icon_search.svg') }}" alt=""></button>
                    </form>
                </div>
            </div>
        </div>
        {{-- content --}}
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card">
                        <div class="white_card_header">
                            <div class="main-title">
                                <h2 class="m-0">Danh Sách Nhân Viên</h2>
                            </div>
                        </div>
                        <div class="white_card_body">
                            {{-- thông báo thành công --}}
                            @if (session('success'))
                                <input type="text" class="alert-success" id="alert-success" value="{{ session('success') }}" hidden>
                            @endif
                            {{-- data sheet --}}
                            <div class="table-responsive">
                                <table class="table" style="text-align: center">
                                    <thead>
                                        <tr>
                                            {{-- <th scope="col" style="text-align: left">#</th> --}}
                                            <th scope="col" style="text-align: left">Hình Ảnh</th>
                                            <th scope="col">Tên Nhân Viên</th>
                                            <th scope="col">Số điện thoại</th>
                                            <th scope="col">Loại Nhân Viên</th>
                                            <th scope="col">Trạng Thái</th>
                                            <th scope="col">Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dataSheet">
                                        @if (isset($NhanVien))
                                            @foreach ($NhanVien as $value)
                                                <tr id="{{ $value->id }}">
                                                    {{-- <td style="text-align: left">{{ $value->id }}</td> --}}
                                                    <td style="text-align: left"><img src="{{ asset('uploads/NhanVien/' . $value->hinhanh) }}" style="width: 100px; height: 100px; border-radius: 5px;"></td>
                                                    <td>{{ $value->tennhanvien }}</td>
                                                    <td>{{ $value->sdt }}</td>
                                                    <td>
                                                        @if (isset($LoaiNhanVien))
                                                            @foreach ($LoaiNhanVien as $valuelnv)
                                                                @if ($value->id_loainhanvien == $valuelnv->id)
                                                                    {{ $valuelnv->tenloainhanvien }}
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <span class="badge {{ $value->trangthai == 1 ? 'bg-success' : 'bg-danger' }}">
                                                            {{ $value->trangthai == 1 ? 'Còn Làm' : 'Đã Nghỉ' }}</span>
                                                    </td>
                                                    <td>
                                                        <a onclick="Show('{{ route('nhan-vien.show', $value->id) }}')" href="javascript:(0)" class="action_btn mr_10"><i class="fas fa-eye"></i></a>
                                                        <a href="{{ route('nhan-vien.edit', $value->id) }}" class="action_btn mr_10"><i class="fas fa-edit"></i></a>
                                                        <a data-url="{{ route('nhan-vien.destroy', $value->id) }}" data-id="{{ $value->id }}" href="javascript:(0)" class="action_btn form-delete"><i
                                                                class="fas fa-trash-alt"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            @if (isset($NhanVien))
                                {{-- pagination --}}
                                <div class='col-12 d-flex justify-content-center' style='padding: 15px'>
                                    {{ $NhanVien->links() }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Tiêu Đề</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/alertifyjs/css/alertify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/alertifyjs/css/themes/default.min.css') }}">
@endsection
@section('script')
    <script src="{{ asset('frontend/alertifyjs/alertify.min.js') }}"></script>
    <script type="text/javascript">
        window.onload = function() {
            if ($('#alert-success').hasClass('alert-success')) {
                alertify.success($('#alert-success').val());
            }
        };
        $('#form-search').on('click', function(e) { //tìm
            e.preventDefault(); // dừng  sự kiện submit.
            if ($("input[name='search']").val().length > 0) {
                $.ajax({
                    url: $(this).data('url'),
                    method: 'GET',
                    data: {
                        search: $("input[name='search']").val()
                    },
                    success: function(response) {
                        $('.pagination').hide();
                        $("input[name='search']").val("");
                        $('#dataSheet').html(response);
                        alertify.success("Đã Tìm");
                    },
                    error: function(response) {
                        alertify.error("Lỗi Tìm Kiếm");
                    }
                })
            } else {
                location.reload();
            }
        });

        function Show(url) { // trang chi tiết.
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    $('.modal-body').html(response);
                    $("#exampleModalLabel").text("Chi tiết Nhân Viên");
                    $("#exampleModal").modal('show');
                },
                error: function(response) {

                    alertify.error("Có Trang Chi Tiết");
                }
            })
        };

        function Delete(url, id) { // xóa.
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    $('#' + id).html("");
                    alertify.success(response.success);
                },
                error: function(response) {

                    alertify.error("Lỗi Nhân Viên Đang Được Sử Dụng");
                }
            })
        };
        $(document).on('click', '.form-delete', function() { // gọi xóa.
            if (confirm("Đồng Ý Để Xóa?")) {
                Delete($(this).data('url'), $(this).data('id'));
            }
        });
    </script>
@endsection
