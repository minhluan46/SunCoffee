@extends('layouts.backend_layout')
@section('content')
    <div class="main_content_iner ">
        {{-- header --}}
        <div class="btn-pm d-flex justify-content-between">
            <div class="mb-3 btn-1">
                <a onclick="Create('{{ route('loai-san-pham.create') }}')" class="btn btn-success" href="javascript:(0)">Thêm Loại Sản Phẩm</a>
                <a class="btn btn-info" href="{{ route('san-pham.index') }}">Xem Sản Phẩm</a>
            </div>
            <div class="serach_field-area d-flex align-items-center mb-3">
                <div class="search_inner">
                    <form method="GET">
                        <div class="search_field">
                            <input type="text" placeholder="Tên..." name="search">
                        </div>
                        <button id="form-search" data-url="{{ route('loai-san-pham.search') }}" type="submit">
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
                                <h3 class="m-0">Loại Sản Phẩm</h3>
                            </div>
                        </div>
                        <div class="white_card_body">
                            {{-- data sheet --}}
                            <div class="table-responsive">
                                <table class="table" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="text-align: left">#</th>
                                            <th scope="col">Tên Loại Sản Phẩm</th>
                                            <th scope="col">Trạng Thái</th>
                                            <th scope="col">Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dataSheet">
                                        @if (isset($LoaiSanPham))
                                            @foreach ($LoaiSanPham as $value)
                                                <tr id="{{ $value->id }}">
                                                    <td style="text-align: left">{{ $value->id }}
                                                    </td>
                                                    <td>{{ $value->tenloaisanpham }}</td>
                                                    <td>
                                                        @if ($value->trangthai == 1)
                                                            <span class="badge rounded-pill bg-primary">Sản phẩm Có Hạng Sử Dụng</span>
                                                        @elseif($value->trangthai == 2)
                                                            <span class="badge rounded-pill bg-success">Sản Phẩm Dùng Trong Ngày</span>
                                                        @else
                                                            <span class="badge rounded-pill bg-danger">Không Được Phép Thêm Sản Phẩm</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="javascript:(0)" class="action_btn mr_10 view-add" data-url="{{ route('quy-cach.create') }}" data-id="{{ $value->id }}">
                                                            <i class="fas fa-plus-square"></i></a>

                                                        <a href="javascript:(0)" class="action_btn mr_10 view-show" data-url="{{ route('loai-san-pham.show', $value->id) }}">
                                                            <i class="fas fa-eye"></i></a>

                                                        <a href="javascript:(0)" class="action_btn mr_10 view-edit" data-url="{{ route('loai-san-pham.edit', $value->id) }}">
                                                            <i class="fas fa-edit"></i></a>

                                                        <a href="javascript:(0)" class="action_btn mr_10 form-delete" data-url="{{ route('loai-san-pham.destroy', $value->id) }}"
                                                            data-id="{{ $value->id }}">
                                                            <i class="fas fa-trash-alt"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            @if (isset($LoaiSanPham))
                                {{-- pagination --}}
                                <div class='col-12 d-flex justify-content-center' style='padding: 15px'>
                                    {{ $LoaiSanPham->links() }}
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
                url: "{{ route('loai-san-pham.load') }}",
                method: 'GET',
                success: function(response) {
                    $('#dataSheet').html(response);
                },
                error: function(response) {

                    alertify.error("Lỗi Tải Dữ Liệu");
                }
            });
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
                        alertify.error("Lỗi");
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
                    $("#exampleModalLabel").text("Thêm Loại Sản Phẩm");
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
                        trangthai: $('select[name = "trangthai"]').val(),
                        tenloaisanpham: $("input[name='tenloaisanpham']").val(),
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

                        alertify.error("Lỗi Thêm Mới");
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
                    $("#exampleModalLabel").text("Sửa Loại Sản Phẩm");
                    $("#exampleModal").modal('show');
                    Update();
                },
                error: function(response) {

                    alertify.error("Lỗi Tải Trang");
                }
            })
        };

        function loadUpdate(id) { // tải lại cập nhật.
            $.ajax({
                url: "loai-san-pham/" + id + "/loadUpdate",
                method: 'GET',
                success: function(response) {
                    $('#' + id).html(response);
                },
                error: function(response) {

                    alertify.error("Lỗi Tải Dữ Liệu");
                }
            });
        };

        function Update() { // cập nhật.
            $('#form-edit').on('click', function(e) {
                e.preventDefault(); // dừng  sự kiện submit.
                var id = $(this).data('id');
                $.ajax({
                    url: $(this).data('url'),
                    method: 'PUT',
                    data: {
                        _token: $("input[name='_token']").val(),
                        trangthai: $('select[name = "trangthai"]').val(),
                        tenloaisanpham: $("input[name='tenloaisanpham']").val(),
                    },
                    success: function(response) {
                        if (response.errors) {
                            alert(response.errors);
                        } else {
                            $("#exampleModal").modal('hide');
                            alertify.success(response.success);
                            loadUpdate(id);
                        }
                    },
                    error: function(response) {

                        alertify.error("Lỗi Cập nhật");
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
        /////////////////////////////////////////////////////////////////////////////////////////// quy cach.
        function Add(url, id) { // trang thêm quy cách.
            $.ajax({
                url: url,
                method: 'GET',
                data: {
                    id: id
                },
                success: function(response) {
                    $('.modal-body').html(response);
                    $("#exampleModalLabel").text("Thêm Chi Tiết Sản Phẩm");
                    $("#exampleModal").modal('show');
                    StoreQC();
                },
                error: function(response) {
                    alertify.error("Lỗi Tải Trang");
                }
            })
        };
        $(document).on('click', '.view-add', function() { // gọi add.
            Add($(this).data('url'), $(this).data('id'));
        });

        function StoreQC() { // thêm quy cách.
            $('#form-createQC').on('click', function(e) {
                e.preventDefault(); // dừng  sự kiện submit.
                var url = "loai-san-pham/" + $("input[name='id_loaisanpham']").val() + "/show"
                $.ajax({
                    url: $(this).data('url'),
                    method: 'POST',
                    data: {
                        _token: $("input[name='_token']").val(),
                        trangthai: $('select[name = "trangthai"]').val(),
                        tenquycach: $("input[name='tenquycach']").val(),
                        id_loaisanpham: $("input[name='id_loaisanpham']").val(),
                    },
                    success: function(response) {
                        if (response.errors) {
                            alert(response.errors);
                        } else {
                            alertify.success(response.success);
                            Show(url);
                        }
                    },
                    error: function(response) {

                        alertify.error("Lỗi Thêm Mới");
                    }
                })
            })
        };

        function Show(url) { // trang chi tiết loại sản phảm.
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    $('.modal-body').html(response);
                    $("#exampleModalLabel").text("Chi Tiết Loại Sản Phẩm");
                    $("#exampleModal").modal('show');
                },
                error: function(response) {
                    alertify.error("Lỗi Tải Trang");
                }
            })
        };
        $(document).on('click', '.view-show', function() { // gọi show.
            Show($(this).data('url'));
        });

        function UpdateQC() { // cập nhật quy cách.
            $('#form-editQC').on('click', function(e) {
                e.preventDefault(); // dừng  sự kiện submit.
                var url = "loai-san-pham/" + $("input[name='id_loaisanpham']").val() + "/show"
                $.ajax({
                    url: $(this).data('url'),
                    method: 'PUT',
                    data: {
                        _token: $("input[name='_token']").val(),
                        trangthai: $('select[name = "trangthai"]').val(),
                        tenquycach: $("input[name='tenquycach']").val(),
                        id_loaisanpham: $("input[name='id_loaisanpham']").val(),
                    },
                    success: function(response) {
                        if (response.errors) {
                            alert(response.errors);
                        } else {
                            Show(url);
                            alertify.success(response.success);
                        }
                    },
                    error: function(response) {

                        alertify.error("Lỗi Cập Nhật");
                    }
                })
            })
        };

        function EditQC(url) { // trang cập nhật quy cách.
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    $('.modal-body').html(response);
                    $("#exampleModalLabel").text("Sửa Quy Cách");
                    $("#exampleModal").modal('show');
                    UpdateQC();
                },
                error: function(response) {

                    alertify.error("Lỗi Tải Trang");
                }
            })
        };
        $(document).on('click', '.view-editQC', function() { // gọi EditQC.
            EditQC($(this).data('url'));
        });

        function DeleteQC(url, id) { //xóa quy cách.
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    if (response.errors) {
                        alert(response.errors);
                    } else {
                        Show("loai-san-pham/" + id + "/show");
                        alertify.success(response.success);
                    }
                },
                error: function(response) {

                    alertify.error("Quy Cách Này Đã Được Sử Dụng");
                }
            })
        };
        $(document).on('click', '.form-deleteQC', function() { // gọi DeleteQC.
            if (confirm("Xóa Tất Cả Sản Phẩm Thuộc Quy Cách Này?")) {
                DeleteQC($(this).data('url'), $(this).data('id'));
            }
        });
    </script>
@endsection
