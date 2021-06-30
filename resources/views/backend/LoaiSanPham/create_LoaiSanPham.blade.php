<form method="POST">
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <div class="form-check">
                    <label>Trạng Thái </label>
                    <input type="checkbox" name="trangthai" value='1' class="form-check-input" checked="">
                </div>
            </div>
            <div class="form-group">
                <label>Tên Loại Sản Phẩm</label>
                <input type="text" class='form-control' maxlength="50" name="tenloaisanpham" required>
            </div>
            <button id="form-create" data-url="{{ route('loai-san-pham.store') }}" type="submit" class="btn btn-success"
                style="width: 100%">Thêm</button>
        </div>
    </div>
</form>
