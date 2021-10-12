@if (isset($HoaDon))
    <div class="row">
        <div class="col-4 col-sm-4">
            <h4><b>Mã: </b> <span>({{ $HoaDon->id }})</span></h4>
            <h4><b>Ngày Lập: </b> <span>{{ Date_format(Date_create($HoaDon->ngaylap), 'd/m/Y H:i:s') }}</span></h4>
            <h4><b>Người Lập: </b> <span>{{ $NhanVien->tennhanvien }}</span></h4>
            <h4><b>Tổng Tiền: </b> <span>{{ number_format($HoaDon->tongtienhoadon, 0, ',', '.') }} VNĐ</span></h4>
            <h4><b>Giảm Giá: </b> <span>{{ number_format($HoaDon->giamgia, 0, ',', '.') }} VNĐ</span></h4>
            @if ($HoaDon->tongtienhoadon - $HoaDon->giamgia - $HoaDon->thanhtien != 0)
                <h4><b>Giảm Giá Thành Viên: </b>
                    <span>{{ number_format($HoaDon->tongtienhoadon - $HoaDon->giamgia - $HoaDon->thanhtien, 0, ',', '.') }}
                        VNĐ</span></h4>
            @endif
            <h4><b>Thành Tiền: </b> <span>{{ number_format($HoaDon->thanhtien, 0, ',', '.') }} VNĐ</span></h4>
            <h4><b>Trạng Thái: </b>
                {{-- @if ($HoaDon->trangthai == 3)
                    <span>Đã Hủy</span>
                @elseif($HoaDon->trangthai == 2)
                    <span>Cần Xác Nhận</span>
                @elseif($HoaDon->trangthai == 1)
                    <span>Hoàn Thành</span>
                @else
                    <span>Đã Đống</span>
                @endif --}}
                @if ($HoaDon->trangthai == 2)
                    <span>Cần Xác Nhận</span>
                @elseif($HoaDon->trangthai == 1)
                    <span>Hoàn Thành</span>
                @elseif($HoaDon->trangthai == 4)
                    <span>Cần Xác Nhận ( đã thanh toán)</span>
                @elseif($HoaDon->trangthai == 5)
                    <span>Hoàn Thành ( đã thanh toán)</span>
                @elseif($HoaDon->trangthai == 6)
                    <span>Đã Đóng ( đã thanh toán)</span>
                @else
                    <span>Đã Đóng</span>
                @endif
                </span>
            </h4>
        </div>
        <div class="col-8 col-sm-8">
            <h4><b>Khách Hàng: </b> <span>{{ $HoaDon->tenkhachhang }}</span></h4>
            <h4><b>Email: </b> <span>{{ $HoaDon->emailkhachhang }}</span></h4>
            <h4><b>SĐT Khách Hàng: </b> <span>{{ $HoaDon->sdtkhachhang }}</span></h4>
            <h4><b>Địa Chỉ Khách Hàng: </b> <span>{{ $HoaDon->diachikhachhang }}</span></h4>
            <h4><b>Điểm Tích Lũy: </b> <span>{{ number_format($HoaDon->diemtichluy, 0, ',', '.') }} Điểm</span></h4>
            <h4><b>Khách Hàng Ghi Chú: </b> <span>{{ $HoaDon->ghichukhachhang }}</span></h4>
        </div>
    </div>
@endif
<hr>
@if (isset($ChiTietHoaDon))
    <table class="table" style="text-align: center">
        <thead>
            <tr>
                <th scope="col" style="text-align: left">Mặt Hàng</th>
                <th scope="col">Đơn Giá</th>
                <th scope="col">Giảm Giá</th>
                <th scope="col">Số Lượng</th>
                <th scope="col">Tổng Tiền</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ChiTietHoaDon as $item)
                <tr>
                    <td style="text-align: left">
                        @foreach ($ChiTietSanPham as $itemCTSP)
                            @if ($itemCTSP->id == $item->id_chitietsanpham)
                                @foreach ($SanPham as $itemSP)
                                    @if ($itemCTSP->id_sanpham == $itemSP->id)
                                        {{ $itemSP->tensanpham }} <br> {{ $itemCTSP->tenquycach }}
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach ($ChiTietSanPham as $itemCTSP)
                            @if ($itemCTSP->id == $item->id_chitietsanpham)
                                {{ number_format($itemCTSP->giasanpham, 0, ',', '.') }} VNĐ
                            @endif
                        @endforeach
                    </td>
                    <td>{{ number_format($item->giamgia, 0, ',', '.') }} VNĐ</td>
                    <td>{{ number_format($item->soluong, 0, ',', '.') }}</td>
                    <td>{{ number_format($item->tonggia, 0, ',', '.') }} VNĐ</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a target="_blank" style="float: right;" class="btn btn-info"
        href="{{ route('hoa-don.print_bill', $HoaDon->id) }}">In Hóa Đơn</a>
@endif
