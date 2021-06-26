<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NhanVien;
use App\Models\LoaiNhanVien;
use App\http\Requests\NhanVienRequest;
use Carbon\Carbon;

class NhanVienController extends Controller
{

    public function index()
    {
        $viewData = [
            'NhanVien' => NhanVien::orderBy('created_at', 'desc')->get(),
            'LoaiNhanVien' => LoaiNhanVien::all(),
        ];
        return view('backend.NhanVien.index', $viewData);
    }

    public function create()
    {
        $viewData = [
            'LoaiNhanVien' => LoaiNhanVien::where('trangthai', 1)->get(),
        ];
        return view('backend.NhanVien.create_NhanVien', $viewData);
    }

    public function store(NhanVienRequest $request)
    {
        $iddate = "NV" . Carbon::now('Asia/Ho_Chi_Minh'); //chuỗi thời gian.
        $exp = explode("-", $iddate); //cắt chuỗi.
        $imp = implode('', $exp); //nối chuỗi
        $exp = explode(" ", $imp);
        $imp = implode('', $exp);
        $exp = explode(":", $imp);
        $imp = implode('', $exp);
        $data['id'] = $imp;
        $data['tennhanvien'] = ucwords($request->tennhanvien);
        $data['sdt'] = $request->sdt;
        $data['diachi'] = ucwords($request->diachi);
        $data['ngaysinh'] = $request->ngaysinh;
        $data['gioitinh'] = $request->gioitinh;
        $data['luong'] = $request->luong;
        $data['tentaikhoan'] = $request->tentaikhoan;
        $data['matkhau'] = bcrypt($request->matkhau);
        $data['id_loainhanvien'] = $request->id_loainhanvien;
        $data['trangthai'] = $request->trangthai;
        if (empty($request->trangthai)) {
            $data['trangthai'] = 0;
        }
        $data['hinhanh'] = 'NOIMAGE.png'; //hình ảnh mặc định.
        if ($request->hasFile('hinhanh')) { //kiểm tra xem có file không.
            $file = $request->hinhanh; //lấy tên hình được gửi lên.
            $extension = $file->extension(); //lấy đui file.
            $path = 'uploads/NhanVien/'; //đường dẫn.
            $data['hinhanh'] = $data['id'] . "." . $extension; //sửa lại tên hình ảnh.
            $file->move($path, $data['hinhanh']); //lưu hình ảnh.
        }
        NhanVien::create($data);
        $viewData = [
            'NhanVien' => NhanVien::orderBy('created_at', 'desc')->get(),
            'LoaiNhanVien' => LoaiNhanVien::all(),
        ];
        return redirect()->route('nhan-vien.index', $viewData)->with('messsge', "Thêm Thành Công");
    }

    public function show($id)
    {
        $viewData = [
            'NhanVien' => NhanVien::find($id),
            'LoaiNhanVien' => LoaiNhanVien::all(),
        ];
        return view('backend.NhanVien.show_NhanVien', $viewData);
    }

    public function edit($id)
    {
        $viewData = [
            'NhanVien' => NhanVien::find($id),
            'LoaiNhanVien' => LoaiNhanVien::all(),
        ];
        return view('backend.NhanVien.edit_NhanVien', $viewData);
    }

    public function update(NhanVienRequest $request, $id)
    {
        $data['tennhanvien'] = ucwords($request->tennhanvien);
        $data['sdt'] = $request->sdt;
        $data['diachi'] = ucwords($request->diachi);
        $data['ngaysinh'] = $request->ngaysinh;
        $data['gioitinh'] = $request->gioitinh;
        $data['luong'] = $request->luong;
        $data['tentaikhoan'] = $request->tentaikhoan;

        $data['id_loainhanvien'] = $request->id_loainhanvien;
        $data['trangthai'] = $request->trangthai;
        if (empty($request->trangthai)) {
            $data['trangthai'] = 0;
        }
        $OldNhanVien = NhanVien::find($id); //lấy nhân viên củ.
        if ($OldNhanVien->matkhau != $request->matkhau) { //kiểm tra có thay đổ mật khẩu không.
            $data['matkhau'] = bcrypt($request->matkhau);
        }
        if ($request->hasFile('hinhanh')) { //kiểm tra xem có file không.
            if ($OldNhanVien->hinhanh != "NV.png") { //kiểm tra có phải đang dùng hình ảnh mặc định không.
                unlink('uploads/NhanVien/' . $OldNhanVien->hinhanh); //xoá ảnh củ.
            }
            $file = $request->hinhanh; //lấy tên hình được gửi lên.
            $extension = $file->extension(); //lấy đui file.
            $path = 'uploads/NhanVien/'; //đường dẫn.
            $data['hinhanh'] = $id . "." . $extension; //sửa lại tên hình ảnh.
            $file->move($path, $data['hinhanh']); //lưu hình ảnh.
        }
        NhanVien::where('id', $id)->update($data);
        $viewData = [
            'NhanVien' => NhanVien::orderBy('created_at', 'desc')->get(),
            'LoaiNhanVien' => LoaiNhanVien::all(),
        ];
        return redirect()->route('nhan-vien.index', $viewData)->with('messsge', "Cập Nhật Thành Công");
    }

    public function destroy($id)
    {
        $OldNhanVien = NhanVien::find($id); //lấy nhân viên củ
        unlink('uploads/NhanVien/' . $OldNhanVien->hinhanh); //xoá ảnh củ.
        NhanVien::where('id', $id)->delete();
        $viewData = [
            'NhanVien' => NhanVien::orderBy('created_at', 'desc')->get(),
            'LoaiNhanVien' => LoaiNhanVien::all(),
        ];
        return redirect()->route('nhan-vien.index', $viewData)->with('messsge', "Xoá Thành Công");
    }
}
