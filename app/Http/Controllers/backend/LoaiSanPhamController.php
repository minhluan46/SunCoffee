<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoaiSanPham;
use App\http\Requests\LoaiSanPhamRequest;
use Carbon\Carbon;

class LoaiSanPhamController extends Controller
{

    public function index()
    {
        $viewData = [
            'LoaiSanPham' => LoaiSanPham::orderBy('created_at', 'desc')->get(),
        ];
        return view('backend.LoaiSanPham.index', $viewData);
    }

    public function create()
    {
        return view('backend.LoaiSanPham.create_LoaiSanPham');
    }

    public function store(LoaiSanPhamRequest $request)
    {
        $iddate = "LSP" . Carbon::now('Asia/Ho_Chi_Minh');
        $exp = explode("-", $iddate);
        $imp = implode('', $exp);
        $exp = explode(" ", $imp);
        $imp = implode('', $exp);
        $exp = explode(":", $imp);
        $imp = implode('', $exp);
        $data['id'] = $imp;
        $data['tenloaisanpham'] = ucwords($request->tenloaisanpham);
        $data['trangthai'] = $request->trangthai;
        if (empty($request->trangthai)) {
            $data['trangthai'] = 0;
        }
        LoaiSanPham::create($data);
        $viewData = [
            'LoaiSanPham' => LoaiSanPham::orderBy('created_at', 'desc')->get(),
        ];
        return redirect()->route('loai-san-pham.index', $viewData)->with('messsge', "Thêm Thành Công");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $viewData = [
            'LoaiSanPham' => LoaiSanPham::find($id),
        ];
        // dd($viewData);
        return view('backend.LoaiSanPham.edit_LoaiSanPham', $viewData);
    }

    public function update(LoaiSanPhamRequest $request, $id)
    {
        $data['tenloaisanpham'] = ucwords($request->tenloaisanpham);
        $data['trangthai'] = $request->trangthai;
        if (empty($request->trangthai)) {
            $data['trangthai'] = 0;
        }
        LoaiSanPham::where('id', $id)->update($data);
        $viewData = [
            'LoaiSanPham' => LoaiSanPham::orderBy('created_at', 'desc')->get(),
        ];
        return redirect()->route('loai-san-pham.index', $viewData)->with('messsge', "Cập Nhật Thành Công");
    }

    public function destroy($id)
    {
        LoaiSanPham::where('id', $id)->delete();
        $viewData = [
            'LoaiSanPham' => LoaiSanPham::orderBy('created_at', 'desc')->get(),
        ];
        return redirect()->route('loai-san-pham.index', $viewData)->with('messsge', "Xoá Thành Công");
    }
}
