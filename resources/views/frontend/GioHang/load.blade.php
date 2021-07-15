@if (Session::has('GioHangOnline') != null)
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th><a class="removed_all" href="javascript:(0)"><span class="icon-close icon-close-all"></span></th>
                                <th>&nbsp;</th>
                                <th>Sản Phẩm</th>
                                <th>Giá Bán</th>
                                <th>Số Lượng</th>
                                <th>Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Session::get('GioHangOnline')->products as $item) {{-- danh sách sản phẩm --}}
                                <tr class="text-center" id="{{ $item['CTSP']->id }}">
                                    <td class="product-remove"><a href="javascript:(0)" class="removed" data-id="{{ $item['CTSP']->id }}" data-name="{{ $item['SanPham']->tensanpham }}">
                                            <span class="icon-close"></span></a></td>
                                    <td class="image-prod">
                                        <div class="img" style="background-image:url({{ asset('uploads/SanPham/' . $item['SanPham']->hinhanh) }});"></div>
                                    </td>
                                    <td class="product-name product-name-left">
                                        <h3>{{ $item['SanPham']->tensanpham }}</h3>
                                        <span>{{ $item['CTSP']->kichthuoc }}</span>
                                    </td>
                                    <td class="price">
                                        @if ($item['GiamGia'] > 0)
                                            <p>{{ number_format($item['CTSP']->giasanpham - $item['GiamGia'], 0, ',', '.') . ' VNĐ' }}</p>
                                            <span class="discount">{{ number_format($item['CTSP']->giasanpham, 0, ',', '.') . ' VNĐ' }}</span>
                                        @else
                                            <p>{{ number_format($item['CTSP']->giasanpham, 0, ',', '.') . ' VNĐ' }}</p>
                                        @endif
                                    </td>
                                    <td class="quantity">
                                        <div class="input-group mb-3">
                                            <input type="number" name="quantity" class="quantity form-control input-number" value="{{ $item['SoLuong'] }}" min="1"
                                                data-id="{{ $item['CTSP']->id }}">
                                        </div>
                                    </td>
                                    <td class="total">{{ number_format($item['TongGia'] - $item['GiamGia'] * $item['SoLuong'], 0, ',', '.') . ' VNĐ' }}</td>
                                </tr><!-- END TR-->
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <p class="text-center"><a href="javascript:(0)" class="update-all btn btn-primary py-3 px-4">Cập Nhật Số Lượng</a></p> {{-- nút cập nhật --}}
        <div class="row justify-content-end">
            <div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3"> {{-- tổng thanh toán --}}
                    <h3>Tổng Giỏ Hàng</h3>
                    <p class="d-flex">
                        <span>Tổng Tiền</span>
                        <span>{{ number_format(Session::get('GioHangOnline')->totalPrice, 0, ',', '.') . ' VNĐ' }}</span>
                    </p>
                    <p class="d-flex">
                        <span>Giảm Giá</span>
                        <span>{{ number_format(Session::get('GioHangOnline')->totalDiscount, 0, ',', '.') . ' VNĐ' }}</span>
                    </p>
                    <hr>
                    <p class="d-flex total-price">
                        <span>Thành Tiền</span>
                        <span>{{ number_format(Session::get('GioHangOnline')->Total, 0, ',', '.') . ' VNĐ' }}</span>
                    </p>
                </div>
                <p class="text-center"><a href="{{ route('GioHang.show') }}" class="btn btn-primary py-3 px-4">Tiến Hành Thanh Toán</a></p>
            </div>
        </div>
    </div>
    <input type="text" name="soluong" value="{{ Session::get('GioHangOnline')->totalPrice }}">
@else
    khi không có sản phảm trong giỏ hàng. (Note)
@endif
