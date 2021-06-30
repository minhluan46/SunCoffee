@isset($KhuyenMai)
    <div class="row">
        <div class="col-sm-12">
            <h4><b>{{ $KhuyenMai->tenkhuyenmai }} </b> <span>({{ $KhuyenMai->id }})</span></h4>
            <h4><b>Thời Gian Bắt Đầu: </b> <span>{{ $KhuyenMai->thoigianbatdau }}</span></h4>
            <h4><b>Thời Gian Kết Thúc: </b> <span>{{ $KhuyenMai->thoigianketthuc }}</span></h4>
            <h4><b>Mức Khuyến Mãi Tối Đa: </b> <span>{{ $KhuyenMai->muckhuyenmaitoida . '%' }}</span></h4>
            <h4><b>Trạng Thái: </b> <span>{{ $KhuyenMai->trangthai == 1 ? 'Còn Khuyến Mãi' : 'Đã Hết' }}</span></h4>
            <h4><b>Mô Tả: </b> <span>{{ $KhuyenMai->mota }}</span></h4>
        </div>
    </div>
    <hr>
    {{-- chi tiết sảm phẩm --}}
    @isset($ChiTietKhuyenMai)
        <table class="table" style="text-align: center">
            <thead>
                <tr>
                    <th scope="col" style="text-align: left">Sản Phẩm</th>
                    <th scope="col">Kích Thước</th>
                    <th scope="col">Loại</th>
                    <th scope="col">Mức Khuyến Mãi</th>
                    <th scope="col">Giá Khuyến Mãi</th>
                    <th scope="col">Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ChiTietKhuyenMai as $valuectkm)
                    <tr>
                        <td style="text-align: left">
                            @isset($ChiTietSanPham)
                                @foreach ($ChiTietSanPham as $itemCTSP)
                                    @if ($valuectkm->id_chitietsanpham == $itemCTSP->id)
                                        @isset($SanPham)
                                            @foreach ($SanPham as $itemSP)
                                                @if ($itemCTSP->id_sanpham == $itemSP->id)
                                                    {{ $itemSP->tensanpham }}
                                                @endif
                                            @endforeach
                                        @endisset
                                    @endif
                                @endforeach
                            @endisset
                        </td>
                        <td>
                            @isset($ChiTietSanPham)
                                @foreach ($ChiTietSanPham as $itemCTSP)
                                    @if ($valuectkm->id_chitietsanpham == $itemCTSP->id)
                                        {{ $itemCTSP->kichthuoc }}
                                    @endif
                                @endforeach
                            @endisset
                        </td>
                        <td>
                            @isset($ChiTietSanPham)
                                @foreach ($ChiTietSanPham as $itemCTSP)
                                    @if ($valuectkm->id_chitietsanpham == $itemCTSP->id)
                                        @isset($SanPham)
                                            @foreach ($SanPham as $itemSP)
                                                @if ($itemCTSP->id_sanpham == $itemSP->id)
                                                    @isset($LoaiSanPham)
                                                        @foreach ($LoaiSanPham as $itemLSP)
                                                            @if ($itemSP->id_loaisanpham == $itemLSP->id)
                                                                {{ $itemLSP->tenloaisanpham }}
                                                            @endif
                                                        @endforeach

                                                    @endisset
                                                @endif
                                            @endforeach
                                        @endisset
                                    @endif
                                @endforeach
                            @endisset
                        </td>
                        <td>{{ $valuectkm->muckhuyenmai . '%' }}</td>
                        <td>{{ number_format($valuectkm->giakhuyenmai) . 'VNĐ' }}</td>
                        <td>
                            <a href="javascript:(0)" class="action_btn mr_10 view-edit-CTKM"
                                data-idctsp="{{ $valuectkm->id_chitietsanpham }}" data-idkm="{{ $KhuyenMai->id }}">
                                <i class="fas fa-edit"></i></a>

                            <a href="javascript:(0)" class="action_btn mr_10 form-delete-CTKM"
                                data-idctsp="{{ $valuectkm->id_chitietsanpham }}" data-idkm="{{ $KhuyenMai->id }}">
                                <i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endisset
@endisset
