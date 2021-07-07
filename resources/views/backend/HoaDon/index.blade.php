@extends('layouts.backend_layout')
@section('content')
    <div class="main_content_iner ">
        {{-- header --}}
        <div class="btn-pm d-flex justify-content-between">
            <div class="mb-3 btn-1">
                <a class="btn btn-success" href="{{ route('hoa-don.create') }}">Thêm Mới</a>
            </div>
            <div class="serach_field-area d-flex align-items-center mb-3">
                <div class="search_inner">
                    <form method="GET">
                        <div class="search_field">
                            <input type="text" placeholder="Tìm..." name="search">
                        </div>
                        <button id="form-search" data-url="{{ route('hoa-don.search') }}" type="submit">
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
                                <h3 class="m-0">Hóa Đơn</h3>
                            </div>
                        </div>
                        <div class="white_card_body">
                            {{-- thông báo thành công --}}
                            @if (session('messsge'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>{{ session('messsge') }}</strong>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="text-align: left">#</th>
                                            <th scope="col">Ngày Lập</th>
                                            <th scope="col">SĐT Khách Hàng</th>
                                            <th scope="col">Khách Hàng</th>
                                            <th scope="col">Người Lập</th>
                                            <th scope="col">Trạng Thái</th>
                                            <th scope="col">Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dataSheet">
                                        @if (isset($HoaDon))
                                            @foreach ($HoaDon as $value)
                                                <tr id="{{ $value->id }}">
                                                    <td style="text-align: left">{{ $value->id }}</td>
                                                    <td>{{ $value->ngaylap }}</td>
                                                    <td>{{ $value->sdtkhachhang }}</td>
                                                    <td>
                                                        @foreach ($KhachHang as $itemKH)
                                                            @if ($value->id_khachhang == $itemKH->id)
                                                                {{ $itemKH->tenkhachhang }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach ($NhanVien as $itemNV)
                                                            @if ($value->id_nhanvien == $itemNV->id)
                                                                {{ $itemNV->tennhanvien }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td><span
                                                            class="badge rounded-pill {{ $value->trangthai == 1 ? 'bg-success' : 'bg-danger' }}">
                                                            {{ $value->trangthai == 1 ? 'Hoạt Động' : 'Đã Ngừng' }}</span>
                                                    </td>
                                                    <td>
                                                        <a data-id="{{ $value->id }}" href="javascript:(0)"
                                                            class="action_btn mr_10 view-show">
                                                            <i class="fas fa-eye"></i></a>

                                                        <a data-id="{{ $value->id }}" href="javascript:(0)"
                                                            class="action_btn mr_10 form-updatestatus">
                                                            <i class="fas fa-pencil-alt "></i></a>

                                                        <a data-id="{{ $value->id }}" href="javascript:(0)"
                                                            class="action_btn form-delete">
                                                            <i class="fas fa-trash-alt"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            @if (isset($HoaDon))
                                {{-- pagination --}}
                                <div class='col-12 d-flex justify-content-center' style='padding: 15px'>
                                    {{ $HoaDon->links() }}
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hóa Đơn</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" id="content-HD">

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
        function ShowHoaDon(id) { //hiển thị chi tiết hóa đơn.
            $.ajax({
                url: 'hoa-don/show/' + id,
                method: 'GET',
                success: function(data) {
                    $("#content-HD").html(data);
                    $("#exampleModalLabel").text("Chi Tiết Hóa Đơn");
                    $("#exampleModal").modal('show');
                }
            })
        };
        $(document).on('click', '.view-show', function() {
            ShowHoaDon($(this).data('id'));
        });

        function UpdateStatus(id) { //cập nhật trạng thái.
            $.ajax({
                url: 'hoa-don/updateStatus/' + id,
                method: 'PUT',
                data: {
                    _token: $("input[name='_token']").val(),
                },
                success: function(data) {
                    $("#" + id).html(data);
                    alertify.success("Đã Cập Nhật");
                }
            })
        };
        $(document).on('click', '.form-updatestatus', function() {
            if (confirm("Cập Nhật Trạng Thái?")) {
                UpdateStatus($(this).data('id'));
            }
        })

        function Delete(id) { //xóa.
            $.ajax({
                url: 'hoa-don/destroy/' + id,
                method: 'GET',
                data: {
                    _token: $("input[name='_token']").val(),
                },
                success: function(data) {
                    $("#" + id).html("");
                    alertify.success("Đã Xóa");
                }
            })
        };
        $(document).on('click', '.form-delete', function() {
            if (confirm("Đồng Ý Để Xóa?")) {
                Delete($(this).data('id'));
            }
        });

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
