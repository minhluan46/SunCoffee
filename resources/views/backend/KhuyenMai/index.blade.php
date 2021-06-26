@extends('layouts.backend_layout')
@section('content')
    <div class="main_content_iner ">
        <div class="btn-pm">
            <div class="mb-3 btn-1">
                <a class="btn btn-success" href="{{ route('khuyen-mai.create') }}"><span class="btn-label"><i
                            class="fa fa-plus"></i></span>Thêm Mới</a>
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
                                <h3 class="m-0">Khuyến Mãi</h3>
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
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Tên Khuyến Mãi</th>
                                            <th scope="col">Bắt đầu</th>
                                            <th scope="col">Kết Thúc</th>
                                            <th scope="col">Lên Đến</th>
                                            <th scope="col">Mô Tả</th>
                                            <th scope="col">Trạng Thái</th>
                                            <th scope="col">Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if (isset($KhuyenMai))
                                            @foreach ($KhuyenMai as $value)
                                                <tr>
                                                    <td>{{ $value->id }}</td>
                                                    <td>{{ $value->tenkhuyenmai }}</td>
                                                    <td>{{ $value->thoigianbatdau }}</td>
                                                    <td>{{ $value->thoigianketthuc }}</td>
                                                    <td>{{ $value->muckhuyenmaitoida }}%</td>
                                                    <td>{{ substr($value->mota, 0, 25) }}...</td>
                                                    <td>
                                                        <span
                                                            class="badge rounded-pill {{ $value->trangthai == 1 ? 'bg-success' : 'bg-danger' }}">
                                                            {{ $value->trangthai == 1 ? 'Đang Bán' : 'Ngừng Bán' }}</span>
                                                    </td>
                                                    <td>
                                                        <div class="action_btns d-flex">
                                                            <a href="javascript:void(0)"
                                                                data-url="{{ route('khuyen-mai.show', $value->id) }}"
                                                                class="action_btn mr_10 btn-show"><i
                                                                    class="far fa-eye"></i></a>

                                                            <a href="{{ route('khuyen-mai.edit', $value->id) }}"
                                                                class="action_btn mr_10"><i class="far fa-edit"></i></a>
                                                            <a href="{{ route('khuyen-mai.destroy', $value->id) }}"
                                                                class="action_btn"><i class="fas fa-trash"></i></a>
                                                        </div>
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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông Tin Khuyến Mãi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="conten-khuyenmai"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Thêm Chi Tiết Khuyến Mãi</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $('.btn-show').click(function() {
            var url = $(this).data('url');
            $.ajax({
                type: 'get',
                url: url,
                success: function(response) {
                    $('#conten-khuyenmai').fadeIn();
                    $('#conten-khuyenmai').html(response);
                    $('#exampleModal').modal('show');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    //xử lý lỗi tại đây
                }
            })
        })

    </script>
@endsection
