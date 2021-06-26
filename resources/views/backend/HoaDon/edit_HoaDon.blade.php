@if (isset($HoaDon))
    <div>
        <div>
            <p>{{ $HoaDon->id }}</p>
            <p>{{ $HoaDon->ngaylap }}</p>
            <p>{{ $HoaDon->tongtienhoadon }}</p>
            <p>{{ $HoaDon->giamgia }}</p>
        </div>
        <div>
            <p>{{ $HoaDon->thanhtien }}</p>
            <p>{{ $HoaDon->diemtichluy }}</p>
            <p>{{ $HoaDon->sdtkhachhang }}</p>
            <p>{{ $HoaDon->diachikhachhang }}</p>
        </div>
        <div>
            <p>{{ $HoaDon->khachhangghichu }}</p>
            <p>{{ $HoaDon->id_khachhang }}</p>
            <p>{{ $HoaDon->id_nhanvien }}</p>
            <p>{{ $HoaDon->trangthai }}</p>
        </div>
    </div>
@endif
