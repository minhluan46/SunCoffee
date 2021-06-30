<form method="POST">
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <div class="form-check">
                    <label>Trạng Thái </label>
                    <input type="checkbox" name="trangthai" value='1' class="form-check-input"
                        {{ $LoaiSanPham->trangthai == 1 ? 'checked' : '' }}>
                </div>
            </div>
            <div class="form-group">
                <label>Tên Loại Sản Phẩm</label>
                <input type="text" class='form-control' maxlength="50" name="tenloaisanpham" required
                    value="{{ $LoaiSanPham->tenloaisanpham }}">
            </div>
            <button id="form-edit" data-url="{{ route('loai-san-pham.update', $LoaiSanPham->id) }}"
                data-id="{{ $LoaiSanPham->id }}" type="submit" class="btn btn-success" style="width: 100%">Cập Nhật</button>
        </div>
    </div>
</form>
