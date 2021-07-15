@extends('layouts.backend_layout')
@section('content')
    <div class="main_content_iner ">
        {{-- header --}}
        <div class="btn-pm d-flex justify-content-between">
            <div class="mb-3 btn-1">
                <a onclick="Create('{{ route('loai-nhan-vien.create') }}')" class="btn btn-success" href="javascript:(0)">Thêm Mới</a>
                <a class="btn btn-info" href="{{ route('nhan-vien.index') }}">Nhân Viên</a>
            </div>
            <div class="serach_field-area d-flex align-items-center mb-3">
                <div class="search_inner">
                    <form method="GET">
                        <div class="search_field">
                            <input type="text" placeholder="Tên..." name="search">
                        </div>
                        <button id="form-search" data-url="{{ route('loai-nhan-vien.search') }}" type="submit">
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
                                <h3 class="m-0">Loại Nhân Viên</h3>
                            </div>
                        </div>
                        <div class="white_card_body">
                            {{-- data sheet --}}
                            <div class="table-responsive">
                                <table class="table" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="text-align: left">#</th>
                                            <th scope="col">Tên Loại Nhân Viên</th>
                                            <th scope="col">Trạng Thái</th>
                                            <th scope="col">Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dataSheet">
                                        @if (isset($LoaiNhanVien))
                                            @foreach ($LoaiNhanVien as $value)
                                                <tr id="{{ $value->id }}">
                                                    <td style="text-align: left">{{ $value->id }}</td>
                                                    <td>{{ $value->tenloainhanvien }}</td>
                                                    <td>
                                                        <span class="badge rounded-pill {{ $value->trangthai == 1 ? 'bg-success' : 'bg-danger' }}">
                                                            {{ $value->trangthai == 1 ? 'Hoạt Động' : 'Tạm Dừng' }}</span>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:(0)" class="action_btn mr_10 view-edit" data-url="{{ route('loai-nhan-vien.edit', $value->id) }}">
                                                            <i class="fas fa-edit"></i></a>

                                                        <a href="javascript:(0)" class="action_btn mr_10 form-delete" data-url="{{ route('loai-nhan-vien.destroy', $value->id) }}"
                                                            data-id="{{ $value->id }}">
                                                            <i class="fas fa-trash-alt"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            @if (isset($LoaiNhanVien))
                                {{-- pagination --}}
                                <div class='col-12 d-flex justify-content-center' style='padding: 15px'>
                                    {{ $LoaiNhanVien->links() }}
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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tiêu Đề</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
        function loadData() { // tải lại.
            $.ajax({
                url: "{{ route('loai-nhan-vien.load') }}",
                method: 'GET',
                success: function(response) {
                    $('#dataSheet').html(response);
                },
                error: function(response) {
                    alertify.error("Lỗi Tải Dữ Liệu");
                }
            });
        }
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

        function Create(url) { // trang thêm.
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {

                    $('.modal-body').html(response);
                    $("#exampleModalLabel").text("Thêm Loại Nhân Viên");
                    $("#exampleModal").modal('show');
                    Store();
                },
                error: function(response) {

                    alertify.error("Lỗi Tải Trang");
                }
            })
        };

        function Store() { // thêm.
            $('#form-create').on('click', function(e) {
                e.preventDefault(); // dừng  sự kiện submit.
                $.ajax({
                    url: $(this).data('url'),
                    method: 'POST',
                    data: {
                        _token: $("input[name='_token']").val(),
                        trangthai: $('input[name = "trangthai"]:checked').length,
                        tenloainhanvien: $("input[name='tenloainhanvien']").val()
                    },
                    success: function(response) {
                        if (response.errors) {
                            alert(response.errors);
                        } else {
                            $("#exampleModal").modal('hide');
                            alertify.success(response.success);
                            loadData();
                        }
                    },
                    error: function(response) {

                        alertify.error("Có Thêm Mới");
                    }
                })
            })
        };

        function Edit(url) { // trang cập nhật.
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {

                    $('.modal-body').html(response);
                    $("#exampleModalLabel").text("Sửa Loại Nhân Viên");
                    $("#exampleModal").modal('show');
                    Update();
                },
                error: function(response) {

                    alertify.error("Có Tải Trang");
                }
            })
        };

        function Update() { // cập nhật.
            $('#form-edit').on('click', function(e) {
                e.preventDefault(); // dừng  sự kiện submit.

                $.ajax({
                    url: $(this).data('url'),
                    method: 'PUT',
                    data: {
                        _token: $("input[name='_token']").val(),
                        trangthai: $('input[name = "trangthai"]:checked').length,
                        tenloainhanvien: $("input[name='tenloainhanvien']").val()
                    },
                    success: function(response) {
                        if (response.errors) {
                            alert(response.errors);
                        } else {
                            $("#exampleModal").modal('hide');
                            alertify.success(response.success);
                            loadData();
                        }
                    },
                    error: function(response) {

                        alertify.error("Lỗi Cập Nhật");
                    }
                })
            })
        };
        $(document).on('click', '.view-edit', function() { // gọi edit.
            Edit($(this).data('url'));
        });

        function Delete(url, id) { // xóa.
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    $('#' + id).html("");
                    alertify.success(response.success);
                },
                error: function(response) {

                    alertify.error("Loại Sản Phẩm Này Đã Được Sử Dụng");
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
