<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoaiNhanVien;
use App\http\Requests\LoaiNhanVienRequest;
use Carbon\Carbon;

class LoaiNhanVienController extends Controller
{

    public function index()
    {
        $viewData = [
            'LoaiNhanVien' => LoaiNhanVien::orderBy('created_at', 'desc')->get(),
        ];
        return view('backend.LoaiNhanVien.index', $viewData);
    }

    public function create()
    {
        return view('backend.LoaiNhanVien.create_LoaiNhanVien');
    }

    public function store(LoaiNhanVienRequest $request)
    {
        $iddate = "LNV" . Carbon::now('Asia/Ho_Chi_Minh');
        $exp = explode("-", $iddate);
        $imp = implode('', $exp);
        $exp = explode(" ", $imp);
        $imp = implode('', $exp);
        $exp = explode(":", $imp);
        $imp = implode('', $exp);
        $data['id'] = $imp;
        $data['tenloainhanvien'] = ucwords($request->tenloainhanvien);
        $data['trangthai'] = $request->trangthai;
        if (empty($request->trangthai)) {
            $data['trangthai'] = 0;
        }
        LoaiNhanVien::create($data);
        $viewData = [
            'LoaiNhanVien' => LoaiNhanVien::orderBy('created_at', 'desc')->get(),
        ];
        return redirect()->route('loai-nhan-vien.index', $viewData)->with('messsge', "Thêm Thành Công");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $viewData = [
            'LoaiNhanVien' => LoaiNhanVien::find($id)
        ];
        return view('backend.LoaiNhanVien.edit_LoaiNhanVien', $viewData);
    }

    public function update(LoaiNhanVienRequest $request, $id)
    {
        $data['tenloainhanvien'] = ucwords($request->tenloainhanvien);
        $data['trangthai'] = $request->trangthai;
        if (empty($request->trangthai)) {
            $data['trangthai'] = 0;
        }
        LoaiNhanVien::where('id',$id)->update($data);
        $viewData = [
            'LoaiNhanVien' => LoaiNhanVien::orderBy('created_at', 'desc')->get(),
        ];
        return redirect()->route('loai-nhan-vien.index', $viewData)->with('messsge', "Cập Nhật Thành Công");
    }

    public function destroy($id)
    {
        LoaiNhanVien::where('id',$id)->delete();
        $viewData = [
            'LoaiNhanVien' => LoaiNhanVien::orderBy('created_at', 'desc')->get(),
        ];
        return redirect()->route('loai-nhan-vien.index', $viewData)->with('messsge', "Xoá Thành Công");
    }
}
