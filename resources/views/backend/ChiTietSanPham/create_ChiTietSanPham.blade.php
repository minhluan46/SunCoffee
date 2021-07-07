<form method="POST">
    <div class="row">
        <div class="col-lg-12">
            <input type="text" name="id_sanpham" value="{{ $SanPham->id }}" hidden>
            <div class="form-group">
                <div class="form-check">
                    <label>Trạng Thái </label>
                    <input type="checkbox" name="trangthai" value='1' class="form-check-input" checked="">
                </div>
            </div>
            <div class="form-group">
                <label>Kích Thước<b style="color:red"> *</b></label>
                <input type="text" class='form-control' maxlength="50" name="kichthuoc">
            </div>
            <div class="form-group">
                <label>Số Lượng<b style="color:red"> *</b></label>
                <input type="text" class='form-control money' name="soluong">
            </div>
            <div class="form-group">
                <label>Giá Sản Phẩm<b style="color:red"> *</b></label>
                <input type="text" class='form-control money' name="giasanpham">
            </div>
            <div class="form-group">
                <label>Ngày Sản Xuất<b style="color:red"> *</b></label>
                <input type="date" class='form-control' name="ngaysanxuat">
            </div>
            <div class="form-group">
                <label>Hạng Sử Dụng<b style="color:red"> *</b></label>
                <input type="date" class='form-control' name="hansudung">
            </div>
            <button id="form-create" data-url="{{ route('chi-tiet-san-pham.store') }}" type="submit"
                class="btn btn-success" style="width: 100%">Thêm</button>
        </div>
    </div>
</form>
