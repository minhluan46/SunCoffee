<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KhachHang;
use App\http\Requests\KhachHangRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class KhachHangController extends Controller
{

    public function index() // danh sách.
    {
        $viewData = [
            'KhachHang' => KhachHang::where('id', '!=', 'KH00000000000000')->orderBy('created_at', 'desc')->paginate(10),
        ];
        return view('backend.KhachHang.index', $viewData);
    }

    public function load() // tải lại.
    {
        $viewData = [
            'KhachHang' => KhachHang::where('id', '!=', 'KH00000000000000')->orderBy('created_at', 'desc')->paginate(10),
        ];
        return view('backend.KhachHang.load_KhachHang', $viewData);
    }

    public function loadUpdate($id) //tải cập nhật.
    {
        $KhachHang = KhachHang::find($id);
        $trangthai = $KhachHang->trangthai == 1 ? 'bg-success' : 'bg-danger';
        $trangthaitext = $KhachHang->trangthai == 1 ? 'Được Dùng' : 'Đã Khoá';
        $output = "<td style='text-align: left'>" . $KhachHang->id . "</td><td>" . $KhachHang->tenkhachhang . "</td><td>" . $KhachHang->sdt . "</td>
        <td style='text-align: left'>" . $KhachHang->diachi . "</td><td>" . number_format($KhachHang->diemtichluy, 0, ',', '.') . "</td><td><span class='badge rounded-pill  " .
            $trangthai . "'>" . $trangthaitext . "</span></td><td><a href='javascript:(0)' class='action_btn mr_10 view-edit' data-url
        ='" . route('khach-hang.edit', $KhachHang->id) . "'><i class='fas fa-edit'></i></a><a href='javascript:(0)' class='action_btn mr_10 form-delete'
          data-url='" . route('khach-hang.destroy', $KhachHang->id) . "' data-id='" . $KhachHang->id . "'><i class='fas fa-trash-alt'></i></a></td>";
        return $output;
    }

    public function search(Request $request) //tìm.
    {
        $viewData = [
            'KhachHang' => KhachHang::where([['id', '!=', 'KH00000000000000'], ['tenKhachHang', 'like', '%' . $request->search . '%']])
                ->orwhere([['id', '!=', 'KH00000000000000'], ['sdt', 'like', '%' . $request->search . '%']])
                ->orderBy('created_at', 'desc')->get(),
        ];
        return view('backend.KhachHang.load_KhachHang', $viewData);
    }

    public function create() //trang thêm.
    {
        return view('backend.KhachHang.create_KhachHang');
    }

    public function store(Request $request) //thêm.
    {
        $validator = Validator::make(
            $request->all(), // kiểm tra dữ liệu nhập.
            [
                'tenkhachhang' => 'required',
                'sdt' => 'required|min:10|unique:khach_hang,sdt',
                'diachi' => 'required',
                'diemtichluy' => 'required',
            ],
            [
                'tenkhachhang.required' => 'Tên Khách Hàng Không Được Để Trống',

                'sdt.required' => 'Số Điện Thoại Không Được Để Trống',
                'sdt.unique' => 'Số Điện Thoại Đã Tồn Tại',
                'sdt.min' => 'Số Điện Thoại không Đủ 10 số',

                'diachi.required' => 'Địa Chỉ Không Được Để Trống',

                'diemtichluy.required' => 'Điểm Tích Luỹ Không Được Để Trống',
            ]
        );
        if ($validator->fails()) { // trả về nếu có lỗi nhập liệu.
            return Response()->json(['errors' => $validator->errors()->all()]);
        }

        $iddate = "KH" . Carbon::now('Asia/Ho_Chi_Minh'); //chuỗi thời gian.
        $exp = explode("-", $iddate); //cắt chuỗi.
        $imp = implode('', $exp); //nối chuỗi
        $exp = explode(" ", $imp);
        $imp = implode('', $exp);
        $exp = explode(":", $imp);
        $imp = implode('', $exp);
        $data['id'] = $imp;
        $data['tenkhachhang'] = $request->tenkhachhang;
        $data['sdt'] = $request->sdt;
        $data['diachi'] = $request->diachi;
        $data['diemtichluy'] = $request->diemtichluy;
        $data['trangthai'] = $request->trangthai;
        if (empty($request->trangthai)) {
            $data['trangthai'] = 0;
        }
        KhachHang::create($data);
        return response()->json(['success' => 'Thành Công Rồi']);
    }

    public function edit($id) //trang cập nhật.
    {
        $viewData = [
            'KhachHang' => KhachHang::find($id),
        ];
        return view('backend.KhachHang.edit_KhachHang', $viewData);
    }

    public function update(Request $request, $id) //cập nhật.
    {
        $validator = Validator::make(
            $request->all(), // kiểm tra dữ liệu nhập.
            [
                'tenkhachhang' => 'required',
                'sdt' => 'required|min:10|unique:khach_hang,sdt,' . $id,
                'diachi' => 'required',
                'diemtichluy' => 'required',
            ],
            [
                'tenkhachhang.required' => 'Tên Khách Hàng Không Được Để Trống',

                'sdt.required' => 'Số Điện Thoại Không Được Để Trống',
                'sdt.unique' => 'Số Điện Thoại Đã Tồn Tại',
                'sdt.min' => 'Số Điện Thoại không Đủ 10 số',

                'diachi.required' => 'Địa Chỉ Không Được Để Trống',

                'diemtichluy.required' => 'Điểm Tích Luỹ Không Được Để Trống',
            ]
        );
        if ($validator->fails()) { // trả về nếu có lỗi nhập liệu.
            return Response()->json(['errors' => $validator->errors()->all()]);
        }
        $money = filter_var($request->diemtichluy, FILTER_SANITIZE_NUMBER_INT); // tách dấu phẩy và ký tự.
        if ($money > 2000000000) { // trả về nếu lớn hơn 2 tỷ.
            return Response()->json(['errors' => 'Điểm Tích Luỹ Phải Nằm Trong Khoảng 0 Đến 2.000.000.000']);
        }
        $data['tenkhachhang'] = $request->tenkhachhang;
        $data['sdt'] = $request->sdt;
        $data['diachi'] = $request->diachi;
        $data['diemtichluy'] = $money;
        $data['trangthai'] = $request->trangthai;
        if (empty($request->trangthai)) {
            $data['trangthai'] = 0;
        }
        KhachHang::where('id', $id)->update($data);
        return response()->json(['success' => 'Thành Công Rồi']);
    }

    public function destroy($id) //xóa.
    {
        KhachHang::where('id', $id)->delete();
        return response()->json(['success' => 'Thành Công Rồi']);
    }
}
