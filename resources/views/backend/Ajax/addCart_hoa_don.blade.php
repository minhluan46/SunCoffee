@if (Session::has('GioHang') != null)
    <table class="table" style="text-align: center">
        <thead>
            <tr>
                <th class="border-top-0" style="text-align: left">Sản Phẩm</th>
                <th class="border-top-0">Giá Bán</th>
                <th class="border-top-0">Giảm Giá</th>
                <th class="border-top-0">Số Lượng</th>
                <th class="border-top-0">Tổng Cộng</th>
                <th class="border-top-0">Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach (Session::get('GioHang')->products as $item)
                <tr>
                    <td style="text-align: left"><img
                            src="{{ asset('uploads/SanPham/' . $item['SanPham']->hinhanh) }}" alt="" height="60">
                        <p style="padding-left: 10px"
                            class="d-inline-block align-middle mb-0 f_s_16 f_w_600 color_theme2">
                            {{ $item['SanPham']->tensanpham }}<br><span
                                class="text-muted font_s_13">{{ $item['CTSP']->kichthuoc }}</span>
                        </p>
                    </td>
                    <td>{{ number_format($item['CTSP']->giasanpham) }} VNĐ</td>
                    <td>{{ '-' . number_format($item['GiamGia']) }} VNĐ</td>
                    <td>{{ $item['SoLuong'] }}</td>
                    <td>{{ number_format($item['TongGia']) }} VNĐ</td>
                    <td>
                        <a href="javascript:(0)" data-id="{{ $item['CTSP']->id }}" class="action_btn deleteItemCart">
                            <i class="far fa-times-circle"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <input hidden type="text" id="tongcong" value="{{ number_format(Session::get('GioHang')->totalPrice) }}">
    <input hidden type="text" id="soluong" value="{{ number_format(Session::get('GioHang')->totalQuanty) }}">
    <input hidden type="text" id="giamgia" value="{{ number_format(Session::get('GioHang')->totalDiscount) }}">
    <input hidden type="text" id="thanhtien" value="{{ number_format(Session::get('GioHang')->Total) }}">
@endif
