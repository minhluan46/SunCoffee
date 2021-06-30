<nav class="sidebar dark_sidebar">
    <div class="logo d-flex justify-content-between">
        <a class="large_logo" href="{{ route('home.index') }}"><img src="{{ asset('backend/img/logo_white.png') }}"
                alt=""></a>
        <a class="small_logo" href="{{ route('home.index') }}"><img src="{{ asset('backend/img/mini_logo.png ') }}"
                alt=""></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li class="">
            <a href="{{ route('home.index') }}" aria-expanded="false" class="active">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend/img/menu-icon/dashboard.svg') }}" alt="">
                </div>
                <div class="nav_title">
                    <span>Thông Kê</span>
                </div>
            </a>
        </li>
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend/img/menu-icon/2.svg') }}" alt="">
                </div>
                <div class="nav_title">
                    <span>Quản Lý Đơn Hàng</span>
                </div>
            </a>
            <ul>
                <li><a href="{{ route('hoa-don.create') }}">Lập Hoá Đơn</a></li>
                <li><a href="{{ route('hoa-don.index') }}">Danh Sách Hoá Đơn</a></li>
                <li><a href="{{ route('chi-tiet-hoa-don.index') }}">Chi Tiết Hoá Đơn</a></li>
            </ul>
        </li>
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend/img/menu-icon/2.svg') }}" alt="">
                </div>
                <div class="nav_title">
                    <span>Quản Lý Sản Phẩm</span>
                </div>
            </a>
            <ul>
                <li><a href="{{ route('san-pham.index') }}">Danh Sách Sản Phẩm</a></li>
                <li><a href="{{ route('loai-san-pham.index') }}">Loại Sản Phẩm</a></li>
            </ul>
        </li>
        @if (Auth::user()->tennhanvien == 'Admin')
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{ asset('backend/img/menu-icon/2.svg') }}" alt="">
                    </div>
                    <div class="nav_title">
                        <span>Quản Lý Khuyến mãi</span>
                    </div>
                </a>
                <ul>
                    <li><a href="{{ route('khuyen-mai.index') }}">Khuyến Mãi</a></li>
                </ul>
            </li>
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{ asset('backend/img/menu-icon/2.svg') }}" alt="">
                    </div>
                    <div class="nav_title">
                        <span>Quản Lý Nhân Viên</span>
                    </div>
                </a>
                <ul>
                    <li><a href="{{ route('nhan-vien.index') }}">Nhân Viên</a></li>
                    <li><a href="{{ route('loai-nhan-vien.index') }}">Loại Nhân Viên</a></li>
                </ul>
            </li>
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{ asset('backend/img/menu-icon/2.svg') }}" alt="">
                    </div>
                    <div class="nav_title">
                        <span>Quản Lý Khách Hàng</span>
                    </div>
                </a>
                <ul>
                    <li><a href="{{ route('khach-hang.index') }}">Khách Hàng</a></li>
                </ul>
            </li>
            <li class="">
                <a href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{ asset('backend/img/menu-icon/9.svg') }}" alt="">
                    </div>
                    <div class="nav_title">
                        <span>Thiết Lập</span>
                    </div>
                </a>
            </li>
        @endif
    </ul>
</nav>
