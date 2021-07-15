<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <style>
        body {
            text-align: center;
            margin: 50px;
            font-family: 'DejaVu Sans';
        }

        .main_title {
            font-size: 35px;
            margin-bottom: 10px;
        }

        .address {
            font-weight: 500;
            font-size: 20px;
            margin: 0px;
        }

        .bill {
            font-size: 35px;
            margin: 0px 0px;
        }

        th,
        td {
            padding: 10px 30px 0px 0px;
            text-align: left;
            font-size: 20px;
        }

        .table {
            width: 100%;
        }

        .table th,
        .table td {
            text-align: right;
        }

        .table tbody tr th {
            font-size: 20px;
            font-weight: 500;
        }

        .table th,
        .table td {
            text-align: right;
        }

        td.discount {
            text-decoration: line-through;
        }

        .total {
            float: right;
            width: 100%;
        }

        .total td {
            text-align: right;
            font-size: 21px;
        }

        .money td {
            font-weight: bolder;
        }

        h3.contact {
            margin: 0;
            font-size: 20px;
            font-weight: 500;
        }

    </style>
</head>

<body>
    @isset($HoaDon)
        <h1 class="main_title">SUN COFFEE</h1>
        <h1 class="address">137/3C, khu phố 2, phường An Phú, thành phố Thuận An, tỉnh Bình Dương</h1>
        <hr>
        <h1 class="bill">PHIẾU THANH TOÁN</h1>
        <table>
            <tbody>
                <tr>
                    <td>
                        Mã HD:
                    </td>
                    <td>
                        {{ $HoaDon->id }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Ngày lập:
                    </td>
                    <td>
                        {{ $HoaDon->ngaylap }}
                    </td>
                </tr>
                @isset($NhanVien)
                    <tr>
                        <td>
                            Nhân viên:
                        </td>
                        <td>
                            {{ $NhanVien->tennhanvien }}
                        </td>
                    </tr>
                @endisset
            </tbody>
        </table>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th>SL</th>
                    <th colspan="2">Giá bán</th>
                    <th>T.Tiền</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th style="text-align: left" colspan="4">CÀ PHÊ HẠT ROBUSTA 500G</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td class="discount ">76.000</td>
                    <td>70.000</td>
                    <td>70.000</td>
                </tr>
                <tr>
                    <th style="text-align: left" colspan="4">CÀ PHÊ HẠT ROBUSTA 500G</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td class="discount ">76.000</td>
                    <td>70.000</td>
                    <td>70.000</td>
                </tr>
                <tr>
                    <th style="text-align: left" colspan="4">CÀ PHÊ HẠT ROBUSTA 500G</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td class="discount ">76.000</td>
                    <td>70.000</td>
                    <td>70.000</td>
                </tr>
            </tbody>
        </table>
        <hr>
        <table class="total">
            <tbody>
                <tr>
                    <td>
                        Tổng tiền:
                    </td>
                    <td>
                        100.000
                    </td>
                </tr>
                <tr>
                    <td>
                        Đã giảm:
                    </td>
                    <td>
                        6.000
                    </td>
                </tr>
                <tr class="money">
                    <td>
                        Thanh toán:
                    </td>
                    <td>
                        94.000
                    </td>
                </tr>
            </tbody>
        </table>
        <hr>
        <h3 class="contact">Thông tin liên lạc: +84 916 105 406</h3>
        <h3 class="contact">Email: SunCoffee137@gmail.com</h3>
    @endisset
</body>

</html>
