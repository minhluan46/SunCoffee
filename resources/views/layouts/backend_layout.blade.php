<!DOCTYPE html>
<html lang="vi">
{{-- <meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
 <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Sun Coffee</title>

    <link rel="icon" href="{{ asset('/backend/img/mini_logo.png') }}" type="image/png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}" /> {{-- bootstrap --}}
    <!-- themefy CSS -->
    {{--  --}}
    {{-- <link rel="stylesheet" href="{{ asset('backend/vendors/themefy_icon/themify-icons.css') }}" /> --}}
    {{-- icon ở menu --}}
    <!-- select2 CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('backend/vendors/niceselect/css/nice-select.css') }}" /> --}}
    <!-- owl carousel CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('backend/vendors/owl_carousel/css/owl.carousel.css') }}" /> --}}
    <!-- gijgo css -->
    {{-- <link rel="stylesheet" href="{{ asset('backend/vendors/gijgo/gijgo.min.css') }}" /> --}}
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ asset('backend/vendors/font_awesome/css/all.min.css') }}" /> {{-- icon --}}
    {{-- <link rel="stylesheet" href="{{ asset('backend/vendors/tagsinput/tagsinput.css') }}" /> --}}

    <!-- date picker -->
    {{-- <link rel="stylesheet" href="{{ asset('backend/vendors/datepicker/date-picker.css') }}" /> --}}

    {{-- <link rel="stylesheet" href="{{ asset('backend/vendors/vectormap-home/vectormap-2.0.2.css') }}" /> --}}

    <!-- scrollabe  -->
    {{-- <link rel="stylesheet" href="{{ asset('backend/vendors/scroll/scrollable.css') }}" /> --}}
    <!-- datatable CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('backend/vendors/datatable/css/jquery.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/vendors/datatable/css/responsive.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/vendors/datatable/css/buttons.dataTables.min.css') }}" /> --}}
    <!-- text editor css -->
    {{-- <link rel="stylesheet" href="{{ asset('backend/vendors/text_editor/summernote-bs4.css') }}" /> --}}
    <!-- morris css -->
    {{-- <link rel="stylesheet" href="{{ asset('backend/vendors/morris/morris.css') }}"> --}}
    <!-- metarial icon css -->
    {{-- <link rel="stylesheet" href="{{ asset('backend/vendors/material_icon/material-icons.css') }}" /> --}}



    <!-- menu css  -->
    {{--  --}}
    {{-- <link rel="stylesheet" href="{{ asset('backend/css/metisMenu.css') }}"> --}}

    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/css/css.css') }}" />
    {{-- <link rel="stylesheet" href="{{asset('backend/css/colors/default.css" id="colorSkinCSS')}}"> --}}
    @yield('css')
</head>

<body class="crm_body_bg">
    @include('backend.layout.menu')
    <section class="main_content dashboard_part large_header_bg">
        @include('backend.layout.top-menu')
        @yield('content')
    </section>

    <div id="back-top" style="display: none;">
        <a title="Go to Top" href="#">
            <i class="ti-angle-up"></i>
        </a>
    </div>
    @yield('modal')
    <!-- footer  -->
    <script src="{{ asset('backend/js/jquery-3.4.1.min.js') }}"></script>
    <!-- bootstarp js -->
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    @yield('script')
    @yield('countHoaDonCanXuLy')
    @yield('countSanPhamCanXuLy')

    {{-- <script src="{{ asset('backend/js/upload.js') }}"></script> --}}

    <!-- popper js -->
    {{-- <script src="{{ asset('backend/js/popper.min.js') }}"></script> --}}

    <!-- sidebar menu  -->
    {{--  --}}
    {{-- <script src="{{ asset('backend/js/metisMenu.js') }}"></script> --}}
    <!-- waypoints js -->
    {{-- <script src="{{ asset('backend/vendors/count_up/jquery.waypoints.min.js') }}"></script> --}}
    <!-- waypoints js -->
    {{-- <script src="{{ asset('backend/vendors/chartlist/Chart.min.js') }}"></script> --}}
    <!-- counterup js -->
    {{-- <script src="{{ asset('backend/vendors/count_up/jquery.counterup.min.js') }}"></script> --}}

    <!-- nice select -->
    {{-- <script src="{{ asset('backend/vendors/niceselect/js/jquery.nice-select.min.js') }}"></script> --}}
    <!-- owl carousel -->
    {{-- <script src="{{ asset('backend/vendors/owl_carousel/js/owl.carousel.min.js') }}"></script> --}}

    {{-- <!-- responsive table -->
    <script src="{{ asset('backend/vendors/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatable/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatable/js/buttons.print.min.js') }}"></script> --}}

    <!-- datepicker  -->
    {{-- <script src="{{ asset('backend/vendors/datepicker/datepicker.js') }}"></script>
    <script src="{{ asset('backend/vendors/datepicker/datepicker.en.js') }}"></script>
    <script src="{{ asset('backend/vendors/datepicker/datepicker.custom.js') }}"></script> --}}

    {{-- <script src="{{ asset('backend/js/chart.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/chartjs/roundedBar.min.js') }}"></script> --}}

    <!-- scrollabe  -->
    {{-- <script src="{{ asset('backend/vendors/scroll/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/scroll/scrollable-custom.js') }}"></script> --}}



    <!-- apex chrat  -->
    {{-- <script src="{{ asset('backend/vendors/apex_chart/apex-chart2.js') }}"></script> --}}
    {{-- <script src="{{ asset('backend/vendors/apex_chart/apex_dashboard.js') }}"></script> --}}
    {{-- <script src="{{ asset('backend/vendors/chart_am/core.js') }}"></script>
    <script src="{{ asset('backend/vendors/chart_am/charts.js') }}"></script>
    <script src="{{ asset('backend/vendors/chart_am/animated.js') }}"></script>
    <script src="{{ asset('backend/vendors/chart_am/kelly.js') }}"></script>
    <script src="{{ asset('backend/vendors/chart_am/chart-custom.js') }}"></script> --}}
    <!-- custom js -->
    {{-- <script src="{{asset('backend/js/dashboard_init.js')}}"></script> --}}
    {{-- <script src="{{ asset('backend/js/custom.js') }}"></script> --}}

    {{-- <script src="{{asset('backend/vendors/ckeditor/ckeditor.js')}}"></script>
  <script type="text/javascript">
    CKEDITOR.replace('noidungpt');
  </script> --}}
</body>

<!-- Mirrored from demo.dashboardpack.com/user-management-html/index_3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 May 2021 12:19:35 GMT -->

</html>
