@extends('layouts.backend_layout')
@section('content')
    <div class="main_content_iner ">
        <div class="d-flex justify-content-between">
            <div class="mb-3 btn-1">
                <a class="btn btn-success" href="{{ route('hoa-don.create') }}">Thêm Mới</a>
            </div>
            <div class="serach_field-area d-flex align-items-center mb-3">
                <div class="search_inner">
                    <form action="#">
                        <div class="search_field">
                            <input type="text" placeholder="Search">
                        </div>
                        <button type="submit"> <img src="{{ asset('backend/img/icon/icon_search.svg') }}" alt="">
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card">
                        <div class="white_card_header">
                            <div class="main-title">
                                <h3 class="m-0">Hóa Đơn</h3>
                            </div>
                        </div>
                        <div class="white_card_body">
                            {{-- thông báo thành công --}}
                            @if (session('messsge'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>{{ session('messsge') }}</strong>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="text-align: left">#</th>
                                            <th scope="col">Ngày Lập</th>
                                            <th scope="col">SĐT Khách Hàng</th>
                                            <th scope="col">Khách Hàng</th>
                                            <th scope="col">Người Lập</th>
                                            <th scope="col">Trạng Thái</th>
                                            <th scope="col">Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($HoaDon))
                                            @foreach ($HoaDon as $value)
                                                <tr>
                                                    <td style="text-align: left">{{ $value->id }}</td>
                                                    <td>{{ $value->ngaylap }}</td>
                                                    <td>{{ $value->sdtkhachhang }}</td>
                                                    <td>
                                                        @foreach ($KhachHang as $itemKH)
                                                            @if ($value->id_khachhang == $itemKH->id)
                                                                {{ $itemKH->tenkhachhang }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach ($NhanVien as $itemNV)
                                                            @if ($value->id_nhanvien == $itemNV->id)
                                                                {{ $itemNV->tennhanvien }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td><span
                                                            class="badge rounded-pill {{ $value->trangthai == 1 ? 'bg-success' : 'bg-danger' }}">
                                                            {{ $value->trangthai == 1 ? 'Hoạt Động' : 'Đã Ngừng' }}</span>
                                                    </td>
                                                    <td>
                                                        <a onclick="ShowHoaDon('{{ $value->id }}')"
                                                            href="javascript:(0)" class="action_btn mr_10">
                                                            <i class="fas fa-eye"></i></a>

                                                        <a onclick="EditHoaDon('{{ $value->id }}')"
                                                            href="javascript:(0)" class="action_btn mr_10">
                                                            <i class="fas fa-edit"></i></a>
                                                        <a href="{{ route('hoa-don.destroy', $value->id) }}"
                                                            class="action_btn"><i class="fas fa-trash-alt"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hóa Đơn</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" id="content-HD">

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
        function ShowHoaDon(id) { //hiển thị chi tiết hóa đơn.
            $.ajax({
                url: 'hoa-don/show-hoa-don/' + id,
                method: 'GET',
                success: function(data) {
                    $("#content-HD").html(data);
                    $("#exampleModalLabel").text("Chi Tiết Hóa Đơn");
                    $("#exampleModal").modal('show');
                }
            })
        }

        function EditHoaDon(id) { //hiển thị form chỉnh sửa hóa đơn.
            $.ajax({
                url: 'hoa-don/edit-hoa-don/' + id,
                method: 'GET',
                success: function(data) {
                    $("#content-HD").html(data);
                    $("#exampleModalLabel").text("Sửa Hóa Đơn");
                    $("#exampleModal").modal('show');
                }
            })
        }
    </script>
@endsection
