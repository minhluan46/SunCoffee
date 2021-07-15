<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\QuyCach;
use App\Models\LoaiSanPham;
use App\Models\ChiTietSanPham;
use App\http\Requests\SanPhamRequest;
use Carbon\Carbon;

class SanPhamController extends Controller
{
    /////////////////////////////////////////////////////////////////////////////////////////// index
    public function index() // danh sách.
    {
        $viewData = [
            'SanPham' => SanPham::orderBy('created_at', 'desc')->paginate(10),
            'LoaiSanPham' => LoaiSanPham::all(),
        ];
        return view('backend.SanPham.index', $viewData);
    }
    /////////////////////////////////////////////////////////////////////////////////////////// create
    public function create() // trang thêm. (chưa ajax)
    {
        $viewData = [
            'LoaiSanPham' => LoaiSanPham::where('trangthai', '!=', 0)->get(),
        ];
        return view('backend.SanPham.create_SanPham', $viewData);
    }
    /////////////////////////////////////////////////////////////////////////////////////////// store
    public function store(SanPhamRequest $request) // thêm. (chưa ajax)
    {
        $iddate = "SP" . Carbon::now('Asia/Ho_Chi_Minh'); //chuỗi thời gian.
        $exp = explode("-", $iddate); //cắt chuỗi.
        $imp = implode('', $exp); //nối chuỗi
        $exp = explode(" ", $imp);
        $imp = implode('', $exp);
        $exp = explode(":", $imp);
        $imp = implode('', $exp);
        $data['id'] = $imp;
        $data['tensanpham'] = ucwords($request->tensanpham);
        $data['mota'] = $request->mota;
        $data['the'] = ucwords($request->the);
        $data['id_loaisanpham'] = $request->id_loaisanpham;
        $data['trangthai'] = $request->trangthai;
        if (empty($request->trangthai)) {
            $data['trangthai'] = 0;
        }
        $data['hinhanh'] = 'NOIMAGE.png'; //hình ảnh mặc định.
        if ($request->hasFile('hinhanh')) { //kiểm tra xem có file không.
            $file = $request->hinhanh; //lấy tên hình được gửi lên.
            $extension = $file->extension(); //lấy đui file.
            $path = 'uploads/SanPham/'; //đường dẫn.
            $data['hinhanh'] = $data['id'] . "." . $extension; //sửa lại tên hình ảnh.
            $file->move($path, $data['hinhanh']); //lưu hình ảnh.
        }
        SanPham::create($data);
        $viewData = [
            'SanPham' => SanPham::orderBy('created_at', 'desc')->paginate(10),
            'LoaiSanPham' => LoaiSanPham::all(),
        ];
        return redirect()->route('san-pham.index', $viewData)->with('success', "Thành Công Rồi");
    }
    /////////////////////////////////////////////////////////////////////////////////////////// show
    public function show($id) // trang chi tiết.
    {
        $SanPham = SanPham::find($id);
        $LoaiSanPham = LoaiSanPham::where('id', $SanPham->id_loaisanpham)->first();
        $viewData = [
            'SanPham' => $SanPham,
            'QuyCach' => QuyCach::where('id_loaisanpham', $LoaiSanPham->id)->get(),
            'LoaiSanPham' =>  $LoaiSanPham,
            'ChiTietSanPham' => ChiTietSanPham::where('id_sanpham', $SanPham->id)->orderBy('created_at', 'desc')->get(),
        ];
        return view('backend.SanPham.show_SanPham', $viewData);
    }
    /////////////////////////////////////////////////////////////////////////////////////////// edit
    public function edit($id) // trang cập nhật. (chưa ajax)
    {
        $viewData = [
            'SanPham' => SanPham::find($id),
            'LoaiSanPham' => LoaiSanPham::where('trangthai', '!=', 0)->get(),
        ];
        return view('backend.SanPham.edit_SanPham', $viewData);
    }
    /////////////////////////////////////////////////////////////////////////////////////////// update
    public function update(SanPhamRequest $request, $id) //cập nhật. (chưa ajax)
    {
        $data['tensanpham'] = ucwords($request->tensanpham);
        $data['mota'] = $request->mota;
        $data['the'] = ucwords($request->the);
        $data['id_loaisanpham'] = $request->id_loaisanpham;
        $data['trangthai'] = $request->trangthai;
        if (empty($request->trangthai)) {
            $data['trangthai'] = 0;
        }
        if ($request->hasFile('hinhanh')) { //kiểm tra xem có file không.
            $file = $request->hinhanh; //lấy tên hình được gửi lên.
            $extension = $file->extension(); //lấy đui file.
            $path = 'uploads/SanPham/'; //đường dẫn.
            $data['hinhanh'] = $id . "." . $extension; //sửa lại tên hình ảnh.
            $file->move($path, $data['hinhanh']); //lưu hình ảnh.
        }
        SanPham::where('id', $id)->update($data);
        $viewData = [
            'SanPham' => SanPham::orderBy('created_at', 'desc')->paginate(10),
            'LoaiSanPham' => LoaiSanPham::all(),
        ];
        return redirect()->route('san-pham.index', $viewData)->with('success', "Thành Công Rồi");
    }
    /////////////////////////////////////////////////////////////////////////////////////////// delete
    public function destroy($id) //xóa.
    {
        $OldSanPham = SanPham::find($id); //lấy sản phẩm củ.
        ChiTietSanPham::where('id_sanpham', $id)->delete();
        SanPham::where('id', $id)->delete();
        if ($OldSanPham->hinhanh != "NOIMAGE.png") { //kiểm tra có phải đang dùng hình ảnh mặc định không.
            unlink('uploads/SanPham/' . $OldSanPham->hinhanh); //xoá ảnh củ.
        }
        return response()->json(['success' => 'Thành Công Rồi']);
    }
    /////////////////////////////////////////////////////////////////////////////////////////// search
    public function search(Request $request) //tìm.
    {
        $loaiSP = LoaiSanPham::where('tenloaisanpham',  $request->search)->first();
        if ($loaiSP == null) {
            $viewData = [
                'SanPham' => SanPham::where('tensanpham', 'like', '%' . $request->search . '%')
                    ->orWhere('the',  $request->search)
                    ->orderBy('created_at', 'desc')->get(),
                'LoaiSanPham' => LoaiSanPham::all(),
            ];
        } else {
            $viewData = [
                'SanPham' => SanPham::where('tensanpham', 'like', '%' . $request->search . '%')
                    ->orWhere('the',  $request->search)
                    ->orWhere('id_loaisanpham',  $loaiSP->id)
                    ->orderBy('created_at', 'desc')->get(),
                'LoaiSanPham' => LoaiSanPham::all(),
            ];
        }
        return view('backend.SanPham.load_SanPham', $viewData);
    }
}
