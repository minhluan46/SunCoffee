<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoaiSanPham;
use App\http\Requests\LoaiSanPhamRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class LoaiSanPhamController extends Controller
{

    public function index() //danh sách.
    {
        $viewData = [
            'LoaiSanPham' => LoaiSanPham::orderBy('created_at', 'desc')->paginate(5),
        ];
        return view('backend.LoaiSanPham.index', $viewData);
    }

    public function load() // tải lại.
    {
        $viewData = [
            'LoaiSanPham' => LoaiSanPham::orderBy('created_at', 'desc')->paginate(5),
        ];
        return view('backend.LoaiSanPham.load_LoaiSanPham', $viewData);
    }

    public function search(Request $request) //tìm.
    {
        $viewData = [
            'LoaiSanPham' => LoaiSanPham::where('tenLoaiSanPham', 'like', '%' . $request->search . '%')->orderBy('created_at', 'desc')->get(),
        ];
        return view('backend.LoaiSanPham.load_LoaiSanPham', $viewData);
    }

    public function create() //trang thêm.
    {
        return view('backend.LoaiSanPham.create_LoaiSanPham');
    }

    public function store(Request $request) //thêm.
    {
        $validator = Validator::make(
            $request->all(), // kiểm tra dữ liệu nhập.
            ['tenloaisanpham' => 'required'],
            ['tenloaisanpham.required' => "Tên Loại Sản Phẩm Không Được Để Trống"]
        );
        if ($validator->fails()) { // trả về nếu có lỗi nhập liệu.
            return Response()->json(['errors' => $validator->errors()->all()]);
        }

        $iddate = "LSP" . Carbon::now('Asia/Ho_Chi_Minh');
        $exp = explode("-", $iddate);
        $imp = implode('', $exp);
        $exp = explode(" ", $imp);
        $imp = implode('', $exp);
        $exp = explode(":", $imp);
        $imp = implode('', $exp);
        $data['id'] = $imp;
        $data['tenloaisanpham'] = $request->tenloaisanpham;
        $data['trangthai'] = $request->trangthai;
        if (empty($request->trangthai)) {
            $data['trangthai'] = 0;
        }
        LoaiSanPham::create($data);
        return response()->json(['success' => 'Thành Công Rồi']);
    }

    public function edit($id) //trang cập nhật.
    {
        $viewData = [
            'LoaiSanPham' => LoaiSanPham::find($id),
        ];
        return view('backend.LoaiSanPham.edit_LoaiSanPham', $viewData);
    }

    public function loadUpdate($id) //tải cập nhật.
    {
        $LoaiSanPham = LoaiSanPham::find($id);
        $trangthai = $LoaiSanPham->trangthai == 1 ? 'bg-success' : 'bg-danger';
        $trangthaitext = $LoaiSanPham->trangthai == 1 ? 'Được Dùng' : 'Đã Khoá';
        $output = "<td style='text-align: left'>" . $LoaiSanPham->id . "</td>
        <td>" . $LoaiSanPham->tenloaisanpham . "</td>
        <td><span class='badge rounded-pill " . $trangthai . "'> " . $trangthaitext . " </span>
        </td>
        <td>
                <a href='javascript:(0)' class='action_btn mr_10 view-edit' data-url='" . route('loai-san-pham.edit', $LoaiSanPham->id) . "'>
                    <i class='fas fa-edit'></i></a>
                <a href='javascript:(0)' class='action_btn mr_10 form-delete' data-url='" . route('loai-san-pham.destroy', $LoaiSanPham->id) . "'
                    data-id='" . $LoaiSanPham->id . "'> <i class='fas fa-trash-alt'></i></a>
        </td>";
        return $output;
    }

    public function update(Request $request, $id) //cập nhật.
    {
        $validator = Validator::make(
            $request->all(), // kiểm tra dữ liệu nhập.
            ['tenloaisanpham' => 'required'],
            ['tenloaisanpham.required' => "Tên Loại Sản Phẩm Không Được Để Trống"]
        );
        if ($validator->fails()) { // trả về nếu có lỗi nhập liệu.
            return Response()->json(['errors' => $validator->errors()->all()]);
        }

        $data['tenloaisanpham'] = $request->tenloaisanpham;
        $data['trangthai'] = $request->trangthai;
        if (empty($request->trangthai)) {
            $data['trangthai'] = 0;
        }
        LoaiSanPham::where('id', $id)->update($data);
        return response()->json(['success' => 'Thành Công Rồi']);
    }

    public function destroy($id) //xóa.
    {
        LoaiSanPham::where('id', $id)->delete();
        return response()->json(['success' => 'Thành Công Rồi']);
    }
}
