@extends('layouts.backend_layout')
@section('content')
    <div class="main_content_iner ">
        <div class="d-flex justify-content-between" style="margin: 10px;">
            <a class="btn btn-success" href="{{ route('hoa-don.create') }}">Trở Về</a>
            @if (Session::has('GioHang'))
                <a class="btn btn-warning" href="{{ route('hoa-don.in') }}">In Hóa Đơn</a>
            @endif
        </div>
        <form class="add-form" method="POST" action="{{ route('hoa-don.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="card QA_section border-0">
                        <div class="card-body ">
                            <div class="row justify-content-between mt_30">
                                {{-- Tổng Tiền --}}
                                <div class="col-md-4" style="font-size: 9px;">
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
                                                            <td>{{ number_format($item['CTSP']->giasanpham) . ' VNĐ' }}<br>
                                                                <span>
                                                                    @if ($item['GiamGia'] > 0)
                                                                        {{ '-' . number_format($item['GiamGia']) }} VNĐ
                                                                    @else

                                                                    @endif
                                                                </span>
                                                            </td>
                                                            <td>{{ number_format($item['SoLuong']) }}</td>
                                                            <td>{{ number_format($item['TongGia']) . ' VNĐ' }}</td>
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
                                                        {{ number_format(Session::get('GioHang')->totalPrice) . ' VNĐ' }}
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between" style="margin-bottom: 15px;">
                                                    <div>Tổng Tiền Giảm Giá</div>
                                                    <div>
                                                        {{ '-' . number_format(Session::get('GioHang')->totalDiscount) . ' VNĐ' }}
                                                    </div>
                                                </div>
                                                <div id="DiscountMember">
                                                    @if (Session::get('GioHang')->PhoneMember != 0)
                                                        <div class="d-flex justify-content-between"
                                                            style="margin-bottom: 15px;">
                                                            <div>Giảm Giá Cho Thành Viên</div>
                                                            <div>
                                                                {{ '-' . number_format(Session::get('GioHang')->DiscountMember) . ' VNĐ' }}
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="d-flex justify-content-between"
                                                        style="margin-bottom: 15px;">
                                                        <div>Tổng Tiền Phải Thanh Toán</div>
                                                        <div>
                                                            {{ number_format(Session::get('GioHang')->Total) . ' VNĐ' }}
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
                                                    <div class="d-flex justify-content-between"
                                                        style="margin-bottom: 15px;">
                                                        <div>Tổng Tiền Phải Thanh Toán</div>
                                                        <div></div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {{-- Khách Mua Hàng --}}
                                <div class="col-md-5" id="KhachMuaHang">
                                    <div class="total-payment p-3" style="border: 1px solid #000000;">
                                        <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
                                            <h4 class="header-title" style="display: inline">Khách Mua Hàng</h4>
                                            <button class="btn btn-light">Thêm Khách Mới</button>
                                        </div>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="payment-title">Số Điện Thoại</td>
                                                    <td><input id="SDT" type="number" class="form-control form-control-sm">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="payment-title">Tên Khách Hàng</td>
                                                    <td><input id="hoten" maxlength="50" type="text"
                                                            class="form-control form-control-sm"></td>
                                                </tr>
                                                <tr>
                                                    <td class="payment-title">Địa Chỉ</td>
                                                    <td><input id="diachi" type="text" class="form-control form-control-sm">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="payment-title">Điểm Tích Lũy</td>
                                                    <td id="diemtichluy"></td>
                                                </tr>
                                            </tbody>
                                        </table>
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
@section('modal')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/alertifyjs/css/alertify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/alertifyjs/css/themes/default.min.css') }}">
@endsection
@section('script')
    <script src="{{ asset('frontend/alertifyjs/alertify.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() { //kiểm tra nhập 10 số.
            $("#SDT").keypress(function() {
                if (this.value.length == 10) {
                    return false;
                }
            })
        });
        $(document).on('blur', '#SDT', function() { //ajax tìm khách hàng và giảm giá thành viên.
            var sdt = $(this).val();
            if (sdt.length == 0 || sdt.length > 9 && sdt.length < 11) {
                $.ajax({
                    url: "searchCustomer-hoa-don/",
                    method: "GET",
                    data: {
                        sdt: sdt
                    },
                    success: function(data) {
                        $('#KhachMuaHang').html(data);
                        alertify.success('Đã Tìm');
                        $(document).ready(function() {
                            $("#SDT").keypress(function() {
                                if (this.value.length == 10) {
                                    return false;
                                }
                            })
                        });
                    }
                })
                $.ajax({
                    url: "discountMember-hoa-don/",
                    method: "GET",
                    data: {
                        sdt: sdt
                    },
                    success: function(data) {
                        $('#DiscountMember').html(data);
                    }
                })
            }
        });
    </script>
@endsection
