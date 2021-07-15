@extends('layouts.backend_layout')
@section('content')
    <div class="main_content_iner ">
        {{-- header --}}
        <div class="btn-pm d-flex justify-content-between">
            <div class="mb-3 btn-1">
                <a onclick="Create('{{ route('khach-hang.create') }}')" class="btn btn-success" href="javascript:(0)">Thêm Mới</a>
            </div>
            <div class="serach_field-area d-flex align-items-center mb-3">
                <div class="search_inner">
                    <form method="GET">
                        <div class="search_field">
                            <input type="text" placeholder="Tên, sđt..." name="search">
                        </div>
                        <button id="form-search" data-url="{{ route('khach-hang.search') }}" type="submit">
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
                                <h3 class="m-0">Khách Hàng</h3>
                            </div>
                        </div>
                        <div class="white_card_body">
                            {{-- data sheet --}}
                            <div class="table-responsive">
                                <table class="table" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="text-align: left">#</th>
                                            <th scope="col">Họ Tên</th>
                                            <th scope="col">Số Điện Thoại</th>
                                            <th scope="col">Địa Chỉ</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Điểm</th>
                                            <th scope="col">Trạng Thái</th>
                                            <th scope="col">Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dataSheet">
                                        @if (isset($KhachHang))
                                            @foreach ($KhachHang as $value)
                                                <tr id="{{ $value->id }}">
                                                    <td style="text-align: left">{{ $value->id }}</td>
                                                    <td>{{ $value->tenkhachhang }}</td>
                                                    <td>{{ $value->sdt }}</td>
                                                    <td style="text-align: left; width: 20%">{{ $value->diachi }}</td>
                                                    <td style="text-align: left">{{ $value->email }}</td>
                                                    <td>{{ number_format($value->diemtichluy, 0, ',', '.') }}</td>
                                                    <td>
                                                        @if ($value->trangthai == 1)
                                                            <span class="badge rounded-pill bg-success">Được Dùng</span>
                                                        @else
                                                            <span class="badge rounded-pill bg-danger">Đã Khoá</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:(0)" class="action_btn mr_10 view-edit" data-url="{{ route('khach-hang.edit', $value->id) }}">
                                                                <i class="fas fa-edit"></i></a>

                                                            <a href="javascript:(0)" class="action_btn mr_10 form-delete" data-url="{{ route('khach-hang.destroy', $value->id) }}"
                                                                data-id="{{ $value->id }}">
                                                                <i class="fas fa-trash-alt"></i></a>
                                                        </div>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            @if (isset($KhachHang))
                                {{-- pagination --}}
                                <div class='col-12 d-flex justify-content-center' style='padding: 15px'>
                                    {{ $KhachHang->links() }}
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
        /////////////////////////////////////////////////////////////////////////////////////////// index
        function SDT() { // nhập 10 ký tự.
            $(document).ready(function() {
                $("#SDT").keypress(function() {
                    if (this.value.length == 10) {
                        return false;
                    }
                })
            })
        };

        function loadData() { // tải lại.
            $.ajax({
                url: "{{ route('khach-hang.load') }}",
                method: 'GET',
                success: function(response) {
                    $('#dataSheet').html(response);
                },
                error: function(response) {
                    alertify.error("Lỗi Tải Dữ Liệu");
                }
            });
        };
        /////////////////////////////////////////////////////////////////////////////////////////// create
        function Create(url) { // trang thêm.
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    $('.modal-body').html(response);
                    $("#exampleModalLabel").text("Thêm Khách Hàng");
                    $("#exampleModal").modal('show');
                    SDT();
                    Store();
                },
                error: function(response) {
                    alertify.error("Lỗi Tải Trang");
                }
            })
        };
        /////////////////////////////////////////////////////////////////////////////////////////// store
        function Store() { // thêm.
            $('#form-create').on('click', function(e) {
                e.preventDefault(); // dừng  sự kiện submit.
                $.ajax({
                    url: $(this).data('url'),
                    method: 'POST',
                    data: {
                        _token: $("input[name='_token']").val(),
                        trangthai: $('input[name = "trangthai"]:checked').length,
                        sdt: $("input[name='sdt']").val(),
                        email: $("input[name='email']").val(),
                        tenkhachhang: $("input[name='tenkhachhang']").val(),
                        diemtichluy: $("input[name='diemtichluy']").val(),
                        diachi: $("textarea[name='diachi']").val(),
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
        /////////////////////////////////////////////////////////////////////////////////////////// edit
        function Edit(url) { // trang cập nhật.
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    $('.modal-body').html(response);
                    $("#exampleModalLabel").text("Sửa Loại Nhân Viên");
                    $("#exampleModal").modal('show');
                    Money();
                    SDT();
                    Update();
                },
                error: function(response) {
                    alertify.error("Lỗi Tải Trang");
                }
            })
        };

        function Money() { // định dạng tiền.
            (function($) {
                $.fn.simpleMoneyFormat = function() {
                    this.each(function(index, el) {
                        var elType = null; // input or other
                        var value = null;
                        // get value
                        if ($(el).is('input') || $(el).is('textarea')) {
                            value = $(el).val().replace(/,/g, '');
                            elType = 'input';
                        } else {
                            value = $(el).text().replace(/,/g, '');
                            elType = 'other';
                        }
                        // if value changes
                        $(el).on('paste keyup', function() {
                            value = $(el).val().replace(/,/g, '');
                            formatElement(el, elType, value); // format element
                        });
                        formatElement(el, elType, value); // format element
                    });

                    function formatElement(el, elType, value) {
                        var result = '';
                        var valueArray = value.split('');
                        var resultArray = [];
                        var counter = 0;
                        var temp = '';
                        for (var i = valueArray.length - 1; i >= 0; i--) {
                            // kiểm tra nếu nó là số thì cộng vào.
                            if (!isNaN(valueArray[i])) {
                                temp += valueArray[i];
                                counter++
                                if (counter == 3) {
                                    resultArray.push(temp);
                                    counter = 0;
                                    temp = '';
                                }
                            }
                        };
                        if (counter > 0) {
                            resultArray.push(temp);
                        }
                        for (var i = resultArray.length - 1; i >= 0; i--) {
                            var resTemp = resultArray[i].split('');
                            for (var j = resTemp.length - 1; j >= 0; j--) {
                                result += resTemp[j];
                            };
                            if (i > 0) {
                                result += '.'
                            }
                        };
                        if (elType == 'input') {
                            $(el).val(result);
                        } else {
                            $(el).empty().text(result);
                        }
                    }
                };
            }(jQuery));

            $('.money').simpleMoneyFormat(); // áp dụng cho class money.
        }
        /////////////////////////////////////////////////////////////////////////////////////////// update
        function Update() { // cập nhật.
            $('#form-edit').on('click', function(e) {
                e.preventDefault(); // dừng  sự kiện submit.
                var id = $(this).data('id');
                $.ajax({
                    url: $(this).data('url'),
                    method: 'PUT',
                    data: {
                        _token: $("input[name='_token']").val(),
                        trangthai: $('input[name = "trangthai"]:checked').length,
                        sdt: $("input[name='sdt']").val(),
                        email: $("input[name='email']").val(),
                        tenkhachhang: $("input[name='tenkhachhang']").val(),
                        diemtichluy: $("input[name='diemtichluy']").val(),
                        diachi: $("textarea[name='diachi']").val(),
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
                        alertify.error("Lỗi Cập Nhật");
                    }
                })
            })
        };
        $(document).on('click', '.view-edit', function() { // gọi edit.
            Edit($(this).data('url'));
        });

        function loadUpdate(id) { // tải lại cập nhật.
            $.ajax({
                url: "khach-hang/" + id + "/loadUpdate",
                method: 'GET',
                success: function(response) {
                    $('#' + id).html(response);
                },
                error: function(response) {
                    alertify.error("Lỗi Tải Dữ Liệu");
                }
            });
        };
        /////////////////////////////////////////////////////////////////////////////////////////// delete
        function Delete(url, id) { // xóa.
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    $('#' + id).html("");
                    alertify.success(response.success);
                },
                error: function(response) {
                    alertify.error("Khách Hang Này Đã Được Sử Dụng");
                }
            })
        };
        $(document).on('click', '.form-delete', function() { // gọi xóa.
            if (confirm("Đồng Ý Để Xóa?")) {
                Delete($(this).data('url'), $(this).data('id'));
            }
        });
        /////////////////////////////////////////////////////////////////////////////////////////// serach
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
    </script>
@endsection
