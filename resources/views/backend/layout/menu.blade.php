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
            <a href="{{ route('home.index') }}" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend/img/menu-icon/dashboard.svg') }}" alt="">
                </div>
                <div class="nav_title">
                    <span>Thông Kê</span>
                </div>
            </a>
        </li>
        <li class="">
            <a href="{{ route('hoa-don.create') }}" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend/img/menu-icon/2.svg') }}" alt="">
                </div>
                <div class="nav_title">
                    <span>Lập Hoá Đơn</span>
                </div>
            </a>
        </li>
        <li class="">
            <a href="{{ route('san-pham.index') }}" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend/img/menu-icon/2.svg') }}" alt="">
                </div>
                <div class="nav_title">
                    <span>Quản Lý Sản Phẩm</span>
                </div>
            </a>
        </li>
        @if (Auth::user()->tennhanvien == 'Admin')
            <li class="">
                <a href="{{ route('khuyen-mai.index') }}" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{ asset('backend/img/menu-icon/2.svg') }}" alt="">
                    </div>
                    <div class="nav_title">
                        <span>Quản Lý Khuyến mãi</span>
                    </div>
                </a>
            </li>
            <li class="">
                <a href="{{ route('nhan-vien.index') }}" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{ asset('backend/img/menu-icon/2.svg') }}" alt="">
                    </div>
                    <div class="nav_title">
                        <span>Quản Lý Nhân Viên</span>
                    </div>
                </a>
            </li>
            <li class="">
                <a href="{{ route('khach-hang.index') }}" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{ asset('backend/img/menu-icon/2.svg') }}" alt="">
                    </div>
                    <div class="nav_title">
                        <span>Quản Lý Khách Hàng</span>
                    </div>
                </a>
            </li>
            {{-- <li class="">
                <a href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{ asset('backend/img/menu-icon/9.svg') }}" alt="">
                    </div>
                    <div class="nav_title">
                        <span>Thiết Lập</span>
                    </div>
                </a>
            </li> --}}
        @endif
    </ul>
</nav>
