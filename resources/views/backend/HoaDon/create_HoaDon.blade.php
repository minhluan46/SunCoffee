@extends('layouts.backend_layout')
@section('content')
    <div class="main_content_iner ">
        <div class="btn-pm">
            <div class="mb-3 btn-1">
                <a class="btn btn-success" onclick="showModalAddProduct()" href="javascript:(0)"><span
                        class="btn-label"></span>Thêm Sản Phẩm</a>
            </div>
        </div>
        <form class="add-form" method="POST" action="{{ route('hoa-don.create') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="card QA_section border-0">
                        <div class="card-body QA_table ">
                            {{-- Item sản phẩm --}}
                            <div class="table-responsive shopping-cart " id="itemHoaDon">
                                <table class="table mb-0" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0" style="text-align: left">Sản Phẩm</th>
                                            <th class="border-top-0">Giá Bán</th>
                                            <th class="border-top-0">Giảm Giá</th>
                                            <th class="border-top-0" style="text-align: left">Số Lượng</th>
                                            <th class="border-top-0">Tổng Cộng</th>
                                            <th class="border-top-0">Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (Session::has('GioHang') != null)
                                            @foreach (Session::get('GioHang')->products as $item)
                                                <tr>
                                                    <td style="text-align: left"><img
                                                            src="{{ asset('uploads/SanPham/' . $item['SanPham']->hinhanh) }}"
                                                            alt="" height="60">
                                                        <p style="padding-left: 10px"
                                                            class="d-inline-block align-middle mb-0 f_s_16 f_w_600 color_theme2">
                                                            {{ $item['SanPham']->tensanpham }}<br><span
                                                                class="text-muted font_s_13">{{ $item['CTSP']->kichthuoc }}</span>
                                                        </p>
                                                    </td>
                                                    <td>{{ number_format($item['CTSP']->giasanpham) }} VNĐ</td>
                                                    <td>
                                                        @if ($item['GiamGia'] > 0)
                                                            {{ '-' . number_format($item['GiamGia']) }} VNĐ
                                                        @else

                                                        @endif
                                                    </td>
                                                    <td><input id="SoLuongSanPham" data-id="{{ $item['CTSP']->id }}"
                                                            type="number" class="form-control form-control-sm w-25"
                                                            value="{{ $item['SoLuong'] }}"></td>
                                                    <td>{{ number_format($item['TongGia']) }} VNĐ</td>
                                                    <td>
                                                        <a href="javascript:(0)" data-id="{{ $item['CTSP']->id }}"
                                                            class="action_btn deleteItemHoaDon">
                                                            <i class="fas fa-times-circle"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            {{-- Tổng Tiền --}}
                            <div class="row justify-content-end mt_30">
                                <div class="col-md-6">
                                    <div class="total-payment p-3">
                                        <h4 class="header-title">Tổng tiền thanh toán</h4>
                                        <table class="table">
                                            @if (Session::has('GioHang') != null)
                                                <tbody>
                                                    <tr>
                                                        <td class="payment-title">Tổng Cộng</td>
                                                        <td id="totalPriceCart">
                                                            {{ number_format(Session::get('GioHang')->totalPrice) . ' VNĐ' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="payment-title">Tổng Giảm Giá</td>
                                                        <td id="totalDiscountCart">
                                                            {{ '-' . number_format(Session::get('GioHang')->totalDiscount) . ' VNĐ' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="payment-title">Thành Tiền</td>
                                                        <td class="text-dark">
                                                            <strong
                                                                id="TotalCart">{{ number_format(Session::get('GioHang')->Total) . ' VNĐ' }}</strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a class="btn btn-success"
                                                                href="{{ route('hoa-don.payment') }}">Thanh
                                                                Toán</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            @else
                                                <tbody>
                                                    <tr>
                                                        <td class="payment-title">Tổng Cộng</td>
                                                        <td id="totalPriceCart"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="payment-title">Tổng Giảm Giá</td>
                                                        <td id="totalDiscountCart"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="payment-title">Thành Tiền</td>
                                                        <td class="text-dark"><strong id="TotalCart"></strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a class="btn btn-success"
                                                                href="{{ route('hoa-don.payment') }}">Thanh
                                                                Toán</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            @endif
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('modal')
    {{-- modal thêm sản phẩm --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm Sản Phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <div class="serach_field-area d-flex align-items-center mb-3">
                            <div class="search_inner">
                                <div class="search_field">
                                    <input type="text" name="keyword" placeholder="Search" id="keyword">
                                </div>
                                <button type="submit" onclick="search()"> <img
                                        src="{{ asset('backend/img/icon/icon_search.svg') }}" alt="">
                                </button>
                            </div>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Sản Phẩm</th>
                                <th scope="col" style="text-align: center">Kích Thước</th>
                                <th scope="col" style="text-align: center">Giá Bán</th>
                                <th scope="col" style="text-align: center">Giảm Giá</th>
                                <th scope="col" style="text-align: center">Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody id="listProduct">
                            @if (isset($SanPham))
                                @foreach ($SanPham as $item)
                                    <tr>
                                        <td><img src="{{ asset('uploads/SanPham/' . $item->hinhanh) }}" alt=""
                                                height="60">
                                            <p class="d-inline-block align-middle mb-0 f_s_16 f_w_600 color_theme2"
                                                style="padding-left: 10px">{{ $item->tensanpham }}</p>
                                        </td>
                                        <td>
                                            <select onchange="kichthuoc(this,'{{ $item->id }}')"
                                                data-ia="{{ $item->id }}" class="form-control form-control-sm">
                                                <option value="0">Chọn Kích Thước</option>
                                                @if (isset($ChiTietSanPham))
                                                    @foreach ($ChiTietSanPham as $itemCTHD)
                                                        @if ($itemCTHD->id_sanpham == $item->id)
                                                            <option value="{{ $itemCTHD->id }}">
                                                                {{ $itemCTHD->kichthuoc }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </select>
                                        </td>
                                        <td style="text-align: center" id="giaban{{ $item->id }}"></td>
                                        <td style="text-align: center" id="giamgia{{ $item->id }}"></td>
                                        <td style="text-align: center"><a href="javascript:(0)"
                                                id="them{{ $item->id }}" class="action_btn">
                                                <i class="fas fa-plus-circle"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/alertifyjs/css/alertify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/alertifyjs/css/themes/default.min.css') }}">
@endsection
@section('script')
    <script src="{{ asset('frontend/alertifyjs/alertify.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() { //kiểm tra nhập 10 số.
            $("#SDT").keypress(function() {
                if (this.value.length == 10) {
                    return false;
                }
            })
        });
        $(document).on('blur', '#SoLuongSanPham', function() { //thai đổi số lượng.
            var quantity = $(this).val();
            var id = $(this).data("id");
            $.ajax({ //ajax tìm khách hàng.
                url: "quantityChange-hoa-don/" + id + "/" + quantity,
                method: "GET",
                success: function(data) {
                    LoadTotal(data);
                    alertify.success('Đã Cập Nhật');
                }
            })
        });
        $("#itemHoaDon").on("click", ".deleteItemHoaDon", function() { //ajax xóa sản phẩm trong giỏ hàng.
            $.ajax({
                url: "deleteItemHoaDon-hoa-don/" + $(this).data("id"),
                method: "GET",
                success: function(data) {
                    LoadTotal(data);
                    alertify.success('Đã Xóa');
                }
            })
        });

        function showModalAddProduct() { // Hiện modal thêm san phẩm.
            $('#exampleModal').modal('show');
        }

        function LoadTotal(data) { //cập nhật giao diện.
            $('#itemHoaDon').html(data);
            $('#totalPriceCart').text($('#tongcong').val() + " VNĐ");
            $('#totalDiscountCart').text("-" + $('#giamgia').val() + " VNĐ");
            $('#TotalCart').text($('#thanhtien').val() + " VNĐ");
            if ($('#tongcong').val() == 0) {
                $('#totalPriceCart').text("");
                $('#totalDiscountCart').text("");
                $('#TotalCart').text("");
            }
        };

        function kichthuoc(obj, idSP) { //Lấy ra giá sản phẩm và khuyến mãi dựa vào kích thước.
            var value = obj.value;
            $.ajax({ // ajax lấy giá bán và gắn sự kiện onlick addcart().
                url: "priceProduct-hoa-don/" + value,
                method: "GET",
                data: {},
                success: function(data) {
                    $('#giaban' + idSP).html(data);
                    $('#them' + idSP).attr("onclick", "addcart('" + value + "')");
                }
            })
            $.ajax({ //ajax lấy khuyến mãi.
                url: "discountProduct-hoa-don/" + value,
                method: "GET",
                data: {},
                success: function(data) {
                    $('#giamgia' + idSP).html(data);
                }
            })
        }

        function addcart(id) { //ajax thêm sản phẩm vào giỏ hàng.
            $.ajax({
                url: "addCart-hoa-don/" + id,
                method: "GET",
                success: function(data) {
                    LoadTotal(data);
                    alertify.success('Đã Thêm');
                }
            })
        }

        function search() { // ajax tìm sản phẩm.
            var keyword = $('#keyword').val();
            $.ajax({
                url: "searchProduct-hoa-don",
                method: "GET",
                data: {
                    keyword: keyword
                },
                success: function(data) {
                    $('#listProduct').html(data);
                    alertify.success('Đã Tìm');
                }
            })
        }
    </script>
@endsection
