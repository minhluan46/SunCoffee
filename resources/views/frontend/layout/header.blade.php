<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home_user.index')}}"><img src="{{ asset('frontend/images/logo_sun_coffee.png')}}" alt="logo Coffee"
                style="width: 3em;">
            <p class="p-2">Sun Coffee</p>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{(Route::currentRouteName('home_user.index')== "home_user.index") ? "active" : ""}}"><a href="{{ route('home_user.index')}}" class="nav-link">Trang chủ</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="room.html" id="dropdown04" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Cửa hàng</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="{{ route('product_user.index')}}">Sản phẩm</a>
                        {{-- <a class="dropdown-item" href="product-single.html">Single Product</a>
                        <a class="dropdown-item" href="room.html">Cart</a> --}}
                        {{-- <a class="dropdown-item" href="checkout.html">Checkout</a> --}}
                    </div>
                </li>
                {{-- <li class="nav-item"><a href="menu.html" class="nav-link">Menu</a></li> --}}
                <li class="nav-item {{(Route::currentRouteName('service_user.index')== "service_user.index") ? "active" : ""}}"><a href="{{ route('service_user.index')}}" class="nav-link">Dịch Vụ</a></li>
                <li class="nav-item {{(Route::currentRouteName('blog_user.index')== "blog_user.index") ? "active" : ""}}"><a href="{{ route('blog_user.index')}}" class="nav-link">Bài viết</a></li>
                <li class="nav-item {{(Route::currentRouteName('about_user.index')== "about_user.index") ? "active" : ""}}"><a href="{{ route('about_user.index')}}" class="nav-link">Về chúng tôi</a></li>
                <li class="nav-item {{(Route::currentRouteName('contact.index')== "contact.index") ? "active" : ""}}"><a href="{{ route('contact_user.index')}}" class="nav-link">Liên lạc</a></li>
                <li class="nav-item cart"><a href="{{ route('cart_user.index')}}" class="nav-link"><span
                            class="icon icon-shopping_cart"></span><span
                            class="bag d-flex justify-content-center align-items-center"><small>{{Cart::count()}}</small></span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->