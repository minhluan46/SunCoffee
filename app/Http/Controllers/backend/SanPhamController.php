<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Models\ChiTietSanPham;
use App\http\Requests\SanPhamRequest;
use Carbon\Carbon;

class SanPhamController extends Controller
{

    public function index() // danh sách.
    {
        $viewData = [
            'SanPham' => SanPham::orderBy('created_at', 'desc')->paginate(3),
            'LoaiSanPham' => LoaiSanPham::all(),
        ];
        return view('backend.SanPham.index', $viewData);
    }

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

    public function create() // trang thêm. (chưa ajax)
    {
        $viewData = [
            'LoaiSanPham' => LoaiSanPham::where('trangthai', 1)->get(),
        ];
        return view('backend.SanPham.create_SanPham', $viewData);
    }

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
        return redirect()->route('san-pham.index', $viewData)->with('messsge', "Thêm Thành Công");
    }

    public function show($id) // trang chi tiết.
    {
        $SanPham = SanPham::find($id);
        $viewData = [
            'SanPham' => $SanPham,
            'LoaiSanPham' => LoaiSanPham::all(),
            'ChiTietSanPham' => ChiTietSanPham::where('id_sanpham', $SanPham->id)->orderBy('created_at', 'desc')->get(),
        ];
        return view('backend.SanPham.show_SanPham', $viewData);
    }

    public function edit($id) // trang cập nhật. (chưa ajax)
    {
        $viewData = [
            'SanPham' => SanPham::find($id),
            'LoaiSanPham' => LoaiSanPham::where('trangthai', 1)->get(),
        ];
        return view('backend.SanPham.edit_SanPham', $viewData);
    }

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
        $OldSanPham = SanPham::find($id); //lấy sản phẩm củ.
        if ($request->hasFile('hinhanh')) { //kiểm tra xem có file không.
            if ($OldSanPham->hinhanh != "NOIMAGE.png") { //kiểm tra có phải đang dùng hình ảnh mặc định không.
                unlink('uploads/SanPham/' . $OldSanPham->hinhanh); //xoá ảnh củ.
            }
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
        return redirect()->route('san-pham.index', $viewData)->with('messsge', "Cập Nhật Thành Công");
    }

    public function destroy($id) //xóa.
    {
        $OldSanPham = SanPham::find($id); //lấy sản phẩm củ.
        if ($OldSanPham->hinhanh != "NOIMAGE.png") { //kiểm tra có phải đang dùng hình ảnh mặc định không.
            unlink('uploads/SanPham/' . $OldSanPham->hinhanh); //xoá ảnh củ.
        }
        ChiTietSanPham::where('id_sanpham', $id)->delete();
        SanPham::where('id', $id)->delete();
        return response()->json(['success' => 'Thành Công Rồi']);
    }
}
