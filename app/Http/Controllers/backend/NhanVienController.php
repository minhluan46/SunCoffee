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

    public function index() //danh sách.
    {
        $viewData = [
            'NhanVien' => NhanVien::where('id', '!=', "NV00000000000000")->orderBy('created_at', 'desc')->paginate(10),
            'LoaiNhanVien' => LoaiNhanVien::all(),
        ];
        return view('backend.NhanVien.index', $viewData);
    }

    public function search(Request $request) // tìm.
    {
        $loaiNV = LoaiNhanVien::where([['id', '!=', "LNV00000000000000"], ['tenloainhanvien', $request->search]])->first();
        if ($loaiNV == null) {
            $idLoaiNV = "NV00000000000000";
        } else {
            $idLoaiNV = $loaiNV->id;
        }
        $viewData = [
            'NhanVien' => NhanVien::where(
                [['id', '!=', "NV00000000000000"], ['tennhanvien', 'like', '%' . $request->search . '%']]
            )->orWhere(
                [['id', '!=', "NV00000000000000"], ['sdt', 'like', '%' . $request->search . '%']]
            )->orWhere(
                [['id', '!=', "NV00000000000000"], ['id_loainhanvien', $idLoaiNV]]
            )->orderBy('created_at', 'desc')->get(),
            'LoaiNhanVien' => LoaiNhanVien::all(),
        ];
        return view('backend.NhanVien.load_NhanVien', $viewData);
    }

    public function create() // trang thêm. (chưa ajax)
    {
        $viewData = [
            'LoaiNhanVien' => LoaiNhanVien::where([['id', '!=', "LNV00000000000000"], ['trangthai', 1]])->get(),
        ];
        return view('backend.NhanVien.create_NhanVien', $viewData);
    }

    public function store(NhanVienRequest $request) //thêm. (chưa ajax)
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
        $data['password'] = bcrypt($request->password);
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

    public function show($id) //cho tiết.
    {
        $viewData = [
            'NhanVien' => NhanVien::find($id),
            'LoaiNhanVien' => LoaiNhanVien::all(),
        ];
        return view('backend.NhanVien.show_NhanVien', $viewData);
    }

    public function edit($id) //trang cập nhật.  (chưa ajax)
    {
        $viewData = [
            'NhanVien' => NhanVien::find($id),
            'LoaiNhanVien' => LoaiNhanVien::where([['id', '!=', "LNV00000000000000"], ['trangthai', 1]])->get(),
        ];
        return view('backend.NhanVien.edit_NhanVien', $viewData);
    }

    public function update(NhanVienRequest $request, $id) //cập nhật.  (chưa ajax)
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
        if ($OldNhanVien->password != $request->password) { //kiểm tra có thay đổ mật khẩu không.
            $data['password'] = bcrypt($request->password);
        }
        if ($request->hasFile('hinhanh')) { //kiểm tra xem có file không.
            if ($OldNhanVien->hinhanh != "NOIMAGE.png") { //kiểm tra có phải đang dùng hình ảnh mặc định không.
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

    public function destroy($id) // xóa.
    {
        $OldNhanVien = NhanVien::find($id); //lấy nhân viên củ
        if ($OldNhanVien->hinhanh != "NOIMAGE.png") { //kiểm tra có phải đang dùng hình ảnh mặc định không.
            unlink('uploads/NhanVien/' . $OldNhanVien->hinhanh); //xoá ảnh củ.
        }
        NhanVien::where(
            [['id', '!=', "NV00000000000000"], ['id', $id]]
        )->delete();
        return response()->json(['success' => 'Thành Công Rồi']);
    }
}
