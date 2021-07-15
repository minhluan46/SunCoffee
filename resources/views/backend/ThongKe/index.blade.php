@extends('layouts.backend_layout')
@section('content')
    <div class="main_content_iner ">
        <div class="row ">
            <div class="col-xl-12 ">
                <div class="white_card mb_30 card_height_100">
                    <div class="row">
                        <div class="col-xl-8 ">
                            <div class="white_card_header">
                                <div class="row align-items-center justify-content-between flex-wrap">
                                    <div class="col-lg-12">
                                        <div class="main-title">
                                            <h3 class="m-0">Biểu Đồ Doanh Số Bán Hàng</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div id="myfirstchart" style="height: 250px;"></div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="col-xl-12 pt-3">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label>Từ Ngày</label>
                                            <input type="date" class='form-control' name="fromdate" id="fromdate">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label>Đến Ngày</label>
                                            <input type="date" class='form-control' name="todate" id="todate">
                                        </div>
                                    </div>
                                    <div class="col-xl-12"><button id="filer_from_to" type="button" class="btn-w100 btn btn-outline-primary">Tìm Thống Kê</button></div>
                                </div>
                                {{-- <button type="button" class="btn btn-outline-primary">Hôm nay</button>
                                <button type="button" class="btn btn-outline-primary">Tuần này</button>
                                <button type="button" class="btn btn-outline-primary">Tháng này</button>
                                <button type="button" class="btn btn-outline-primary">Năm này</button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="white_card card_height_100 mb_30 user_crm_wrapper">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single_crm">
                            <div class="crm_head d-flex align-items-center justify-content-between">
                                <i class="fas fa-coffee f_s_20 white_text"></i>
                            </div>
                            <div class="crm_body">
                                @isset($SanPham)
                                    <h4> {{ number_format(count($SanPham), 0, ',', '.') }}</h4>
                                @endisset
                                <p>Sản Phẩm</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="single_crm">
                            <div class="crm_head crm_bg_1 d-flex align-items-center justify-content-between">
                                <i class="fas fa-users-cog f_s_20 white_text"></i>
                            </div>
                            <div class="crm_body">
                                @isset($NhanVien)
                                    <h4> {{ number_format(count($NhanVien) - 2, 0, ',', '.') }}</h4>
                                @endisset
                                <p>Nhân Viên</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="single_crm">
                            <div class="crm_head crm_bg_2 d-flex align-items-center justify-content-between">
                                <i class="fas fa-users f_s_20 white_text"></i>
                            </div>
                            <div class="crm_body">
                                @isset($KhachHang)
                                    <h4> {{ number_format(count($KhachHang) - 1, 0, ',', '.') }}</h4>
                                @endisset
                                <p>Khách Hàng</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="single_crm">
                            <div class="crm_head d-flex align-items-center justify-content-between">
                                <i class="fas fa-file-invoice-dollar f_s_20 white_text"></i>
                            </div>
                            <div class="crm_body">
                                @isset($HoaDonOnline)
                                    <h4> {{ number_format(count($HoaDonOnline), 0, ',', '.') }}</h4>
                                @endisset
                                <p>Hóa Đơn<br>(Mua Online)</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="single_crm">
                            <div class="crm_head crm_bg_1 d-flex align-items-center justify-content-between">
                                <i class="fas fa-file-invoice-dollar f_s_20 white_text"></i>
                            </div>
                            <div class="crm_body">
                                @isset($HoaDon)
                                    <h4> {{ number_format(count($HoaDon), 0, ',', '.') }}</h4>
                                @endisset
                                <p>Hóa Đơn<br>(Mua Tại Cửa Hàng)</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="single_crm">
                            <div class="crm_head crm_bg_2 d-flex align-items-center justify-content-between">
                                <i class="fas fa-gift f_s_20 white_text"></i>
                            </div>
                            <div class="crm_body">
                                @isset($KhuyenMai)
                                    <h4> {{ number_format(count($KhuyenMai), 0, ',', '.') }}</h4>
                                @endisset
                                <p>Khuyến Mãi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/alertifyjs/css/alertify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/alertifyjs/css/themes/default.min.css') }}">
    <!-- morris css -->
    <link rel="stylesheet" href="{{ asset('backend/vendors/morris/morris.css') }}">
    <style>
        .btn-w100 {
            width: 100%;
        }

        .single_crm {
            height: 175px;
        }

    </style>
@endsection
@section('script')
    <script src="{{ asset('frontend/alertifyjs/alertify.min.js') }}"></script>
    <!-- morris css -->
    <script src="{{ asset('backend/vendors/morris/morris.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/morris/raphael-min.js') }}"></script>

    <script type="text/javascript">
        statsForThisMonth(); // chạy luôn function khi đến trang này.

        function statsForThisMonth() {
            $.ajax({
                url: 'admin/thong-ke/thang-nay',
                method: 'POST',
                dataType: 'JSON',
                data: {
                    _token: $("input[name='_token']").val(),
                },
                success: function(response) {
                    chart.setData(response);
                    alertify.success("Đã Tải Thống Kê Từ 30 Ngày Trước");
                },
                error: function(response) {
                    alertify.error("Không Thể Tải Thống Kê Cho 30 ngày trước");
                }
            })
        }
        $('#filer_from_to').on('click', function() {
            var fromdate = $('#fromdate').val();
            var todate = $('#todate').val();
            $.ajax({
                url: 'admin/thong-ke/tu-den',
                method: 'POST',
                dataType: 'JSON',
                data: {
                    _token: $("input[name='_token']").val(),
                    fromdate: fromdate,
                    todate: todate,
                },
                success: function(response) {
                    if (response.errors) {
                        alert(response.errors);
                    } else {
                        chart.setData(response);
                        alertify.success("Đã Tìm Từ ngày " + fromdate + " Đến Ngày " + todate);
                    }
                },
                error: function(response) {
                    alertify.error("Không Tìm Thấy Thống Kê");
                }
            })
        });
        ////////////////////////////
        var chart = new Morris.Bar({
            // ID of the element in which to draw the chart.
            element: 'myfirstchart',
            //
            barColors: ['#FF7EA5', '#20DEFF', '#C388F6', '#F5F5FF', '#ff004d'],
            // lineColors:['#FF7EA5', '#20DEFF', '#C388F6', '#F5F5FF', '#ff004d'],
            parsrTime: false,
            hideHover: 'auto',
            xkey: 'thoigian',
            ykeys: ['doanhso', 'loinhuan', 'soluongdaban', 'soluongdonhang'],
            labels: ['Doanh Số', 'Lợi Nhuận', 'Số Lượng Đã Bán', 'Số Lượng Đơn Hàng']
        });
    </script>
@endsection
