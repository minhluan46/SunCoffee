<form method="POST">
    <div class="row">
        <div class="col-lg-12">
            <input type="text" name="id_sanpham" value="{{ $ChiTietSanPham->id_sanpham }}" hidden>
            <div class="form-group">
                <div class="form-check">
                    <label>Trạng Thái </label>
                    <input type="checkbox" name="trangthai" value='1' class="form-check-input"
                        {{ $ChiTietSanPham->trangthai == 1 ? 'checked' : '' }}>
                </div>
            </div>
            <div class="form-group">
                <label>Khích Thước<b style="color:red"> *</b></label>
                <input type="text" class='form-control' maxlength="50" name="kichthuoc"
                    value="{{ $ChiTietSanPham->kichthuoc }}">
            </div>
            <div class="form-group">
                <label>Số Lượng<b style="color:red"> *</b></label>
                <input type="text" class='form-control money' name="soluong" value="{{ $ChiTietSanPham->soluong }}">
            </div>
            <div class="form-group">
                <label>Giá Sản Phẩm<b style="color:red"> *</b></label>
                <input type="text" class='form-control money' name="giasanpham"
                    value="{{ $ChiTietSanPham->giasanpham }}">
            </div>
            <div class="form-group">
                <label>Ngày Sản Xuất<b style="color:red"> *</b></label>
                <input type="date" class='form-control' name="ngaysanxuat" value="{{ $ChiTietSanPham->ngaysanxuat }}">
            </div>
            <div class="form-group">
                <label>Hạng Sử Dụng<b style="color:red"> *</b></label>
                <input type="date" class='form-control' name="hansudung" value="{{ $ChiTietSanPham->hansudung }}">
            </div>
            <button id="form-create-CTSP" data-url="{{ route('chi-tiet-san-pham.update', $ChiTietSanPham->id) }}"
                type="submit" class="btn btn-success" style="width: 100%">Cập Nhật</button>
        </div>
    </div>
</form>
