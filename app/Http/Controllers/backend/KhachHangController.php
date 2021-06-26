<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KhachHang;
use App\http\Requests\KhachHangRequest;
use Carbon\Carbon;

class KhachHangController extends Controller
{

    public function index()
    {
        $viewData = [
            'KhachHang' => KhachHang::orderBy('created_at', 'desc')->get(),
        ];
        return view('backend.KhachHang.index', $viewData);
    }

    public function create()
    {
        return view('backend.KhachHang.create_KhachHang');
    }

    public function store(KhachHangRequest $request)
    {
        $iddate = "KH" . Carbon::now('Asia/Ho_Chi_Minh'); //chuỗi thời gian.
        $exp = explode("-", $iddate); //cắt chuỗi.
        $imp = implode('', $exp); //nối chuỗi
        $exp = explode(" ", $imp);
        $imp = implode('', $exp);
        $exp = explode(":", $imp);
        $imp = implode('', $exp);
        $data['id'] = $imp;
        $data['tenkhachhang'] = ucwords($request->tenkhachhang);
        $data['sdt'] = $request->sdt;
        $data['diachi'] = ucwords($request->diachi);
        $data['diemtichluy'] = $request->diemtichluy;
        $data['trangthai'] = $request->trangthai;
        if (empty($request->trangthai)) {
            $data['trangthai'] = 0;
        }
        KhachHang::create($data);
        $viewData = [
            'KhachHang' => KhachHang::orderBy('created_at', 'desc')->get(),
        ];
        return redirect()->route('khach-hang.index', $viewData)->with('messsge', "Thêm Thành Công");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $viewData = [
            'KhachHang' => KhachHang::find($id),
        ];
        return view('backend.KhachHang.edit_KhachHang', $viewData);
    }

    public function update(KhachHangRequest $request, $id)
    {
        $data['tenkhachhang'] = ucwords($request->tenkhachhang);
        $data['sdt'] = $request->sdt;
        $data['diachi'] = ucwords($request->diachi);
        $data['diemtichluy'] = $request->diemtichluy;
        $data['trangthai'] = $request->trangthai;
        if (empty($request->trangthai)) {
            $data['trangthai'] = 0;
        }
        KhachHang::where('id', $id)->update($data);
        $viewData = [
            'KhachHang' => KhachHang::orderBy('created_at', 'desc')->get(),
        ];
        return redirect()->route('khach-hang.index', $viewData)->with('messsge', "Cập Nhật Thành Công");
    }

    public function destroy($id)
    {
        KhachHang::where('id', $id)->delete();
        $viewData = [
            'KhachHang' => KhachHang::orderBy('created_at', 'desc')->get(),
        ];
        return redirect()->route('khach-hang.index', $viewData)->with('messsge', "Xoá Thành Công");
    }
}
