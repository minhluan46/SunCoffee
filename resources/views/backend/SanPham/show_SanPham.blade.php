@isset($SanPham)
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-4 col-sm-4">
                    <img src="{{ asset('uploads/SanPham/' . $SanPham->hinhanh) }}"
                        style="width: 250px; height: 250px; border-radius: 5px;">
                </div>
                <div class="col-8 col-sm-8">
                    <h4><b>{{ $SanPham->tensanpham }} </b> <span>({{ $SanPham->id }})</span></h4>
                    <h4><b>Thẻ: </b> <span>{{ $SanPham->the }}</span></h4>
                    <h4><b>Loại Sản Phẩm: </b> <span>
                            @if (isset($LoaiSanPham))
                                @foreach ($LoaiSanPham as $valuelsp)
                                    @if ($SanPham->id_loaisanpham == $valuelsp->id)
                                        {{ $valuelsp->tenloaisanpham }}
                                    @endif
                                @endforeach
                            @endif
                        </span></h4>
                    <h4><b>Trạng Thái: </b> <span>{{ $SanPham->trangthai == 1 ? 'Đang Bán' : 'Ngừng Bán' }}</span></h4>
                    <h4><b>Mô Tả: </b> <span>{{ $SanPham->mota }}</span></h4>
                </div>
            </div>
        </div>
    </div>
    <hr>
    {{-- chi tiết sảm phẩm --}}
    @isset($ChiTietSanPham)
        <table class="table" style="text-align: center">
            <thead>
                <tr>
                    <th scope="col" style="text-align: left">Kích Thước</th>
                    <th scope="col">Số Lượng</th>
                    <th scope="col">Giá Bán</th>
                    <th scope="col">Ngày Sản Xuất</th>
                    <th scope="col">Ngày Hết Hạng</th>
                    <th scope="col">Trạng Thái</th>
                    <th scope="col">Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ChiTietSanPham as $valuectsp)
                    <tr>
                        <td style="text-align: left">{{ $valuectsp->kichthuoc }}</td>
                        <td>{{ number_format($valuectsp->soluong) }}</td>
                        <td>{{ number_format($valuectsp->giasanpham) }}</td>
                        <td>{{ $valuectsp->ngaysanxuat }}</td>
                        <td>{{ $valuectsp->hansudung }}</td>
                        <td>
                            <span class="badge rounded-pill {{ $valuectsp->trangthai == 1 ? 'bg-success' : 'bg-danger' }}">
                                {{ $valuectsp->trangthai == 1 ? 'Còn Hàng' : 'Hết Hàng' }}</span>
                        </td>
                        <td>
                            <a href="javascript:(0)" class="action_btn mr_10 view-edit-CTSP"
                                data-url="{{ route('chi-tiet-san-pham.edit', $valuectsp->id) }}"
                                data-id="{{ $valuectsp->id }}">
                                <i class="fas fa-edit"></i></a>

                            <a href="javascript:(0)" class="action_btn mr_10 form-delete-CTSP"
                                data-url="{{ route('chi-tiet-san-pham.destroy', $valuectsp->id) }}"
                                data-idsp="{{ $SanPham->id }}">
                                <i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endisset
@endisset
