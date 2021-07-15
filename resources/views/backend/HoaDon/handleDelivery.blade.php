@extends('layouts.backend_layout')
@section('content')
    <div class="main_content_iner ">
        {{-- header --}}
        <div class="btn-pm d-flex justify-content-between">
            <div class="mb-3 btn-1">
            </div>
            <div class="serach_field-area d-flex align-items-center mb-3">
            </div>
        </div>
        {{-- content --}}
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card">
                        <div class="white_card_header">
                            <div class="main-title">
                                <h3 class="m-0">Hóa Đơn Cần Được Xác Nhận</h3>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="table-responsive">
                                <table class="table" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="text-align: left">#</th>
                                            <th scope="col">Thời Gian Đặt Hàng</th>
                                            <th scope="col">SĐT Khách Hàng</th>
                                            <th scope="col">Tên Khách Hàng</th>
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
                                                        {{ $value->tenkhachhang }}
                                                    </td>
                                                    <td>
                                                        @if ($value->trangthai == 2)
                                                            <span class='badge rounded-pill bg-primary'>Cần Xác Nhận</span>
                                                        @else
                                                            <span class='badge rounded-pill bg-danger'>Đã Đống</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a data-id="{{ $value->id }}" href="javascript:(0)" class="action_btn mr_10 view-show">
                                                            <i class="fas fa-eye"></i></a>

                                                        <a data-id="{{ $value->id }}" href="javascript:(0)" class="action_btn mr_10 form-updatestatus-xl">
                                                            <i class="fas fa-truck "></i></a>

                                                        <a data-id="{{ $value->id }}" href="javascript:(0)" class="action_btn form-delete-xl">
                                                            <i class="fas fa-window-close"></i></a>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                url: '/admin/hoa-don/show/' + id,
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

        function UpdateStatus(id, message) { //cập nhật trạng thái và tăng điểm tích lũy.
            $.ajax({
                url: '/admin/hoa-don/cap-nhat-xu-ly/' + id,
                method: 'PUT',
                data: {
                    _token: $("input[name='_token']").val(),
                },
                success: function(data) {
                    if (data.errors) {
                        alertify.error(data.errors);
                    } else {
                        $("#" + id).html(data);
                        ShowHoaDon(id);
                        countHoaDonCanXuLy();
                        alertify.success(message);
                        //////////////////////////// gửi email.
                    }
                },
                error: function(response) {

                    alertify.error("Lỗi Cập Nhật");
                }

            })
        };
        $(document).on('click', '.form-updatestatus-xl', function() { // dành cho xử lý hóa đơn.
            if (confirm("Xác Nhận Sẽ Giao Hàng?")) {
                UpdateStatus($(this).data('id'), "Đã Xác Nhận");
            }
        })
        $(document).on('click', '.form-updatestatus', function() { // dành cho sau khi xử lý hóa đơn.
            if (confirm("Cập Nhật Trạng Thái?")) {
                UpdateStatus($(this).data('id'), "Đã Cập Nhật");
            }
        })

        function Delete(id, message) { //xóa.
            $.ajax({
                url: 'xoa-xu-ly/' + id,
                method: 'GET',
                success: function(data) {
                    $("#" + id).html("");
                    countHoaDonCanXuLy();
                    alertify.success(message);
                },
                error: function(response) {

                    alertify.error("Lỗi Hủy Đơn Hàng");
                }
            })
        };
        $(document).on('click', '.form-delete-xl', function() { // dành cho xử lý hóa đơn.
            if (confirm("Hủy Đơn Hàng?")) {
                Delete($(this).data('id'), "Đã Hủy Đơn Hàng");
            }
        });
        $(document).on('click', '.form-delete', function() { // dành cho sau khi xử lý hóa đơn.
            if (confirm("Đồng Ý Để Xóa?")) {
                Delete($(this).data('id'), "Đã Xóa Đơn Hàng");
            }
        });
    </script>
@endsection
