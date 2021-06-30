<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Sun Coffee</title>
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}" /> {{-- bootstrap --}}
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}" />
</head>

<body class="crm_body_bg">
    <div class="row justify-content-center" style="margin-top: 100px">
        <div class="col-lg-6">
            {{--  --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{--  --}}
            <div class="modal-content cs_modal">
                <div class="modal-header justify-content-center theme_bg_1">
                    <h5 class="modal-title text_white">Đăng Nhập</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('DangNhap') }}">
                        @csrf
                        <div class="form-group">
                            <input id="SDT" name="sdt" type="number" class="form-control"
                                placeholder="Nhập Số Điện Thoại">
                        </div>
                        <div class="form-group">
                            <input name="password" type="password" class="form-control" placeholder="Mật Khẩu">
                        </div>
                        <button type="submit" class="btn_1 full_width text-center">Đăng Nhập</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- footer  -->
    <script src="{{ asset('backend/js/jquery-3.4.1.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#SDT").keypress(function() {
                if (this.value.length == 10) {
                    return false;
                }
            })
        });
    </script>
</body>

</html>
