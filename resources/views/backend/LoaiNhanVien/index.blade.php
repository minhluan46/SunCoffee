@extends('layouts.backend_layout')
@section('content')
    <div class="main_content_iner ">
        <div class="btn-pm">
            <div class="mb-3 btn-1">
                <a class="btn btn-success" href="{{ route('loai-nhan-vien.create') }}"><span class="btn-label"><i
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
                                <h3 class="m-0">Loại Nhân Viên</h3>
                            </div>
                        </div>
                        <div class="white_card_body">
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
                                            <th scope="col">Tên Loại Nhân Viên</th>
                                            <th scope="col">Trạng Thái</th>
                                            <th scope="col">Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($LoaiNhanVien))
                                            @foreach ($LoaiNhanVien as $value)
                                                <tr>
                                                    <td>{{ $value->id }}</td>
                                                    <td>{{ $value->tenloainhanvien }}</td>
                                                    <td>
                                                        <span
                                                            class="badge rounded-pill {{ $value->trangthai == 1 ? 'bg-success' : 'bg-danger' }}">
                                                            {{ $value->trangthai == 1 ? 'Hoạt Động' : 'Tạm Dừng' }}</span>
                                                    </td>
                                                    <td>
                                                        <div class="action_btns d-flex">
                                                            <a href="{{ route('loai-nhan-vien.edit', $value->id) }}"
                                                                class="action_btn mr_10"><i class="far fa-edit"></i></a>
                                                            <a href="{{ route('loai-nhan-vien.destroy', $value->id) }}"
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
