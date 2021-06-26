@if (isset($HoaDon))
    <b>Mã:( <span style="color: red">{{ $HoaDon->id }}</span>)</b><br>
    <b>Ngày Lập: </b>{{ $HoaDon->ngaylap }} <br>
    <b>Tổng Tiền Hóa Đơn:</b> {{ number_format($HoaDon->tongtienhoadon) }}VNĐ <br>
    <b>Giảm Giá: </b> {{ number_format($HoaDon->giamgia) }}VNĐ <br>
    <b>Thành Tiền: </b> {{ number_format($HoaDon->thanhtien) }}VNĐ <br>

    <b>Khách Hàng: </b> {{ $KhachHang->tenkhachhang }} <br>
    <b>SĐT Khách Hàng: </b> {{ $HoaDon->sdtkhachhang }} <br>
    <b>ĐC Khách Hàng: </b> {{ $HoaDon->diachikhachhang }} <br>
    <b>Điểm Tích Lũy: </b> {{ number_format($HoaDon->diemtichluy) }} Điểm<br>
    <b>Nhân Viên Bán Hàng: </b> {{ $NhanVien->tennhanvien }} <br>
    <b>Trạng Thái: </b>{{ $HoaDon->trangthai == 1 ? 'Hoạt Động' : 'Ngừng' }} <br>

    <b>Khách Hàng Ghi Chú: </b> {{ $HoaDon->khachhangghichu }}

@endif
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
                                        {{ $itemSP->tensanpham }} <br> {{ $itemCTSP->kichthuoc }}
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach ($ChiTietSanPham as $itemCTSP)
                            @if ($itemCTSP->id == $item->id_chitietsanpham)
                                {{  number_format($itemCTSP->giasanpham) }}VNĐ
                            @endif
                        @endforeach
                    </td>
                    <td>{{  number_format($item->giamgia) }}VNĐ</td>
                    <td>{{  number_format($item->soluong) }}</td>
                    <td>{{  number_format($item->tonggiasanpham) }}VNĐ</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
