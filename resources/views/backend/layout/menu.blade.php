<nav class="sidebar dark_sidebar">
    <div class="logo d-flex justify-content-between">
        <a class="large_logo" href="#"><img src="{{ asset('backend/img/logo_white.png') }}" alt=""></a>
        <a class="small_logo" href="#"><img src="{{ asset('backend/img/mini_logo.png ') }}" alt=""></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        @if (Auth::user()->id_loainhanvien == 'LNV00000000000000')
            <li class="">
                <a href="{{ route('thong-ke.index') }}" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{ asset('backend/img/menu-icon/dashboard.svg') }}" alt="">
                    </div>
                    <div @yield('active_thongke') class="nav_title">
                        <span>Thông Kê</span>
                    </div>
                </a>
            </li>
        @endif
        <li class="">
            <a href="{{ route('hoa-don.create') }}" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend/img/menu-icon/2.svg') }}" alt="">
                </div>
                <div @yield('active_laphoadon') class="nav_title">
                    <span>Lập Hoá Đơn</span>
                </div>
            </a>
        </li>
        <li class="">
            <a href="{{ route('hoa-don.index') }}" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend/img/menu-icon/2.svg') }}" alt="">
                </div>
                <div @yield('active_danhsachhoadon') class="nav_title">
                    <span>Danh Sách Hoá Đơn</span>
                </div>
            </a>
        </li>
        <li class="">
            <a href="{{ route('hoa-don.handleDelivery') }}" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend/img/menu-icon/2.svg') }}" alt="">
                </div>
                <div @yield('active_hoadonchuasuly') class="nav_title">
                    <span>Hóa Đơn Chưa Xử Lý <span class="badge bg-danger" id="soluongcanxu" style="color: white"></span></span>
                </div>
            </a>
        </li>
        @section('countHoaDonCanXuLy')
            <script type="text/javascript">
                function countHoaDonCanXuLy() {
                    $.ajax({
                        url: '/admin/hoa-don/so-luong',
                        method: 'GET',
                        success: function(data) {
                            if (data != 0) {
                                $('#soluongcanxu').text(data);
                            } else {
                                $('#soluongcanxu').text("");
                            }
                        }
                    });
                };
                countHoaDonCanXuLy();
            </script>
        @endsection
        @if (Auth::user()->id_loainhanvien == 'LNV00000000000000')
            <li class="">
                <a href="{{ route('san-pham.index') }}" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{ asset('backend/img/menu-icon/2.svg') }}" alt="">
                    </div>
                    <div @yield('active_quanlysanpham') class="nav_title">
                        <span>Quản Lý Sản Phẩm <span class="badge bg-danger countSanPhamCanXuLy" style="color: white"></span></span>
                    </div>
                </a>
            </li>
            @section('countSanPhamCanXuLy')
                <script type="text/javascript">
                    function countSanPhamCanXuLy() {
                        $.ajax({
                            url: '/admin/san-pham/so-luong-xu-ly',
                            method: 'GET',
                            success: function(data) {
                                if (data != 0) {
                                    $('.countSanPhamCanXuLy').text(data);
                                } else {
                                    $('.countSanPhamCanXuLy').text("");

                                }
                            }
                        });
                    };
                    countSanPhamCanXuLy();
                </script>
            @endsection
        @endif
        <li class="">
            <a href="{{ route('khuyen-mai.index') }}" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend/img/menu-icon/2.svg') }}" alt="">
                </div>
                <div @yield('active_quanlykhuyenmai') class="nav_title">
                    <span>Quản Lý Khuyến mãi</span>
                </div>
            </a>
        </li>
        @if (Auth::user()->id_loainhanvien == 'LNV00000000000000')
            <li class="">
                <a href="{{ route('nhan-vien.index') }}" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{ asset('backend/img/menu-icon/2.svg') }}" alt="">
                    </div>
                    <div @yield('active_quanlynhanvien') class="nav_title">
                        <span>Quản Lý Nhân Viên</span>
                    </div>
                </a>
            </li>
            <li class="">
                <a href="{{ route('khach-hang.index') }}" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{ asset('backend/img/menu-icon/2.svg') }}" alt="">
                    </div>
                    <div @yield('active_quanlykhachhang') class="nav_title">
                        <span>Quản Lý Khách Hàng</span>
                    </div>
                </a>
            </li>
        @endif
    </ul>
</nav>
