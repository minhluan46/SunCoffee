<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Models\ChiTietSanPham;
use App\http\Requests\ChiTietSanPhamRequest;
use Carbon\Carbon;

class ChiTietSanPhamController extends Controller
{

    public function index()
    {
        //
    }

    public function create($id)
    {
        $viewData = [
            'SanPham' => SanPham::find($id),
        ];
        return view('backend.ChiTietSanPham.create_ChiTietSanPham', $viewData);
    }

    public function store(ChiTietSanPhamRequest $request)
    {
        $iddate = "CTSP" . Carbon::now('Asia/Ho_Chi_Minh'); //chuỗi thời gian.
        $exp = explode("-", $iddate); //cắt chuỗi.
        $imp = implode('', $exp); //nối chuỗi
        $exp = explode(" ", $imp);
        $imp = implode('', $exp);
        $exp = explode(":", $imp);
        $imp = implode('', $exp);
        $data['id'] = $imp;
        $data['kichthuoc'] = ucwords($request->kichthuoc);
        $data['soluong'] = $request->soluong;
        $data['giasanpham'] = $request->giasanpham;
        $data['ngaysanxuat'] = $request->ngaysanxuat;
        $data['hansudung'] = $request->hansudung;
        $data['id_sanpham'] = $request->id_sanpham;
        $data['trangthai'] = $request->trangthai;
        if (empty($request->trangthai)) {
            $data['trangthai'] = 0;
        }
        ChiTietSanPham::create($data);
        return redirect()->route('san-pham.show', $request->id_sanpham)->with('messsge', "Thêm Thành Công");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $viewData = [
            'ChiTietSanPham' => ChiTietSanPham::find($id),
        ];
        return view('backend.ChiTietSanPham.edit_ChiTietSanPham', $viewData);
    }

    public function update(ChiTietSanPhamRequest $request, $id)
    {
        $data['kichthuoc'] = ucwords($request->kichthuoc);
        $data['soluong'] = $request->soluong;
        $data['giasanpham'] = $request->giasanpham;
        $data['ngaysanxuat'] = $request->ngaysanxuat;
        $data['hansudung'] = $request->hansudung;
        $data['id_sanpham'] = $request->id_sanpham;
        $data['trangthai'] = $request->trangthai;
        if (empty($request->trangthai)) {
            $data['trangthai'] = 0;
        }
        ChiTietSanPham::where('id', $id)->update($data);
        return redirect()->route('san-pham.show', $request->id_sanpham)->with('messsge', "Cập Nhật Thành Công");
    }

    public function destroy($id)
    {
        $OldChiTietSanPham = ChiTietSanPham::find($id);
        ChiTietSanPham::where('id', $id)->delete();
        return redirect()->route('san-pham.show', $OldChiTietSanPham->id_sanpham)->with('messsge', "Xoá Thành Công");
    }
}
