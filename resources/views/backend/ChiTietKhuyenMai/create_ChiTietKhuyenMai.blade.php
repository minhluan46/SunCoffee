<form method="POST">
    <div class="row">
        <div class="col-lg-12">
            <h4 style="text-align: center">{{ $KhuyenMai->tenkhuyenmai }}</h4>
            <input type="text" name="id_khuyenmai" value="{{ $KhuyenMai->id }}" hidden>
            <div class="form-group">
                <label>Sản Phẩm<b style="color:red"> *</b></label>
                <select id="select-sanpham" class="form-control" name="id_chitietsanpham" required
                    style="width: 100%; height: 200%">
                    @isset($ChiTietSanPham) {{-- chi tiết sản phẩm --}}
                        @foreach ($ChiTietSanPham as $valuectsp)
                            <option value="{{ $valuectsp->id }}">
                                @isset($SanPham) {{-- sản phẩm --}}
                                    @foreach ($SanPham as $item)
                                        @if ($item->id == $valuectsp->id_sanpham)
                                            {{ $item->tensanpham . '( ' . $valuectsp->kichthuoc . ' )' }}
                                        @endif
                                    @endforeach
                                @endisset
                            </option>
                        @endforeach
                    @endisset
                </select>
            </div>
            <div class="form-group">
                <label>Mức Khuyến Mãi<b style="color:red"> *</b></label>
                <input type="number" class='form-control form-control-sm' name="muckhuyenmai">
            </div>
            <div class="form-group">
                <label>Giá Khuyến Mãi<b style="color:red"> *</b></label>
                <input type="number" class='form-control form-control-sm money' name="giakhuyenmai">
            </div>
            <button id="form-create-CTKM" type="submit" class="btn btn-success" style="width: 100%"
                data-url="{{ route('chi-tiet-khuyen-mai.store') }}" data-id="{{ $KhuyenMai->id }}">Thêm</button>
        </div>
    </div>
</form>
