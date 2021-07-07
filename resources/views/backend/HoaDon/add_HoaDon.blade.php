@extends('layouts.backend_layout')
@section('content')
    <div class="main_content_iner ">
        <div class="d-flex justify-content-between" style="margin: 10px;">
            <a class="btn btn-success" href="{{ route('hoa-don.create') }}">Trở Về</a>
            @if (Session::has('GioHang'))
                <a class="btn btn-warning" href="{{ route('hoa-don.in') }}">In Hóa Đơn</a>
            @endif
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card QA_section border-0">
                    <div class="card-body ">
                        <div class="row justify-content-between mt_30">
                            {{-- Khách Mua Hàng --}}
                            <div class="col-md-5">
                                <div class="total-payment p-3" style="border: 1px solid #000000;">
                                    <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
                                        <h4 class="header-title" style="display: inline">Khách Mua Hàng</h4>
                                        <button onclick="Create('{{ route('khach-hang.create') }}')"
                                            class="btn btn-light">Thêm Khách Mới</button>
                                    </div>
                                    <div id="KhachMuaHang">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="payment-title">Số Điện Thoại</td>
                                                    <td><input id="SDTs" type="number" class="form-control form-control-sm">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            {{-- Tổng Tiền --}}
                            <div class="col-md-4">
                                <span style="font-size: 20px; text-align: center">Xem Trước</span>
                                <div class="total-payment-2 p-3">
                                    <h4 class="header-title" style="text-align: center;margin-bottom: 30px;">Hóa Đơn Bán
                                        Hàng</h4>
                                    <div class="d-flex justify-content-around" style="margin-bottom: 15px;">
                                        <div>Ngày Bán: {{ date('d/m/Y') }}</div>
                                        <div>NVBH: Lê Minh Luân</div>
                                    </div>
                                    <hr style="margin: 0px;border-bottom: 1px solid #dee2e6;">
                                    <table class="table" style="text-align: center;font-size: 9px;">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align: Left">Mặt Hàng</th>
                                                <th scope="col">Đơn Giá</th>
                                                <th scope="col">Số Lượng</th>
                                                <th scope="col">Tổng Tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (Session::has('GioHang'))
                                                @foreach (Session::get('GioHang')->products as $item)
                                                    <tr>
                                                        <td style="text-align: Left; width:120px;">
                                                            {{ $item['SanPham']->tensanpham }}<br>
                                                            <span
                                                                style="color: darkgrey">{{ $item['CTSP']->kichthuoc }}</span>
                                                        </td>
                                                        <td>{{ number_format($item['CTSP']->giasanpham, 0, ',', '.') . ' VNĐ' }}<br>
                                                            <span>
                                                                @if ($item['GiamGia'] > 0)
                                                                    {{ '-' . number_format($item['GiamGia'], 0, ',', '.') }} VNĐ
                                                                @else

                                                                @endif
                                                            </span>
                                                        </td>
                                                        <td>{{ number_format($item['SoLuong'], 0, ',', '.') }}</td>
                                                        <td>{{ number_format($item['TongGia'], 0, ',', '.') . ' VNĐ' }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                    <hr style="border-top: 1px solid #dee2e6">
                                    <div style="font-size: 12px;">
                                        @if (Session::has('GioHang'))
                                            <div class="d-flex justify-content-between" style="margin-bottom: 15px;">
                                                <div>Tổng Tiền Hóa Đơn</div>
                                                <div>
                                                    {{ number_format(Session::get('GioHang')->totalPrice, 0, ',', '.') . ' VNĐ' }}
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between" style="margin-bottom: 15px;">
                                                <div>Tổng Tiền Giảm Giá</div>
                                                <div>
                                                    {{ '-' . number_format(Session::get('GioHang')->totalDiscount, 0, ',', '.') . ' VNĐ' }}
                                                </div>
                                            </div>
                                            <div id="DiscountMember">
                                                @if (Session::get('GioHang')->PhoneMember != 0)
                                                    <div class="d-flex justify-content-between"
                                                        style="margin-bottom: 15px;">
                                                        <div>Giảm Giá Cho Thành Viên</div>
                                                        <div>
                                                            {{ '-' . number_format(Session::get('GioHang')->DiscountMember, 0, ',', '.') . ' VNĐ' }}
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="d-flex justify-content-between" style="margin-bottom: 15px;">
                                                    <div>Tổng Tiền Phải Thanh Toán</div>
                                                    <div>
                                                        {{ number_format(Session::get('GioHang')->Total, 0, ',', '.') . ' VNĐ' }}
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="d-flex justify-content-between" style="margin-bottom: 15px;">
                                                <div>Tổng Tiền Hóa Đơn</div>
                                                <div></div>
                                            </div>
                                            <div class="d-flex justify-content-between" style="margin-bottom: 15px;">
                                                <div>Tổng Tiền Giảm Giá</div>
                                                <div></div>
                                            </div>
                                            <div id="DiscountMember">
                                                <div class="d-flex justify-content-between" style="margin-bottom: 15px;">
                                                    <div>Tổng Tiền Phải Thanh Toán</div>
                                                    <div></div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
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
        $(document).ready(function() { //kiểm tra nhập 10 số.
            $("#SDTs").keypress(function() {
                if (this.value.length == 10) {
                    return false;
                }
            })
        });

        function SKDM(sdt) { // tìm khách hàng và giảm giá thành viên.
            $.ajax({
                url: "searchCustomer/",
                method: "GET",
                data: {
                    sdt: sdt
                },
                success: function(data) {
                    $('#KhachMuaHang').html(data);
                    alertify.success('Đã Tìm');
                    $(document).ready(function() {
                        $("#SDTs").keypress(function() {
                            if (this.value.length == 10) {
                                return false;
                            }
                        })
                    });
                }
            })
            $.ajax({
                url: "discountMember/",
                method: "GET",
                data: {
                    sdt: sdt
                },
                success: function(data) {
                    $('#DiscountMember').html(data);
                }
            })
        };
        $(document).on('blur', '#SDTs', function() { // gọi SKDM.
            var sdt = $(this).val();
            if (sdt.length == 0 || sdt.length > 9 && sdt.length < 11) {
                SKDM(sdt);
            }
        });

        function Create(url) { // trang thêm.
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    $('.modal-body').html(response);
                    $("#exampleModalLabel").text("Thêm Khách Hàng");
                    $("#exampleModal").modal('show');
                    $(document).ready(function() { //kiểm tra nhập 10 số.
                        $("#SDT").keypress(function() {
                            if (this.value.length == 10) {
                                return false;
                            }
                        })
                    });
                    Store();
                },
                error: function(response) {

                    alertify.error("Lỗi Trang Thêm Khách Hàng");
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
                        sdt: $("input[name='sdt']").val(),
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
                            SKDM($("input[name='sdt']").val());
                        }
                    },
                    error: function(response) {

                        alertify.error("Lỗi Thêm Khách Hàng");
                    }
                })
            })
        };
    </script>
@endsection
