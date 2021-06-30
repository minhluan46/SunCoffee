<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\ChiTietSanPham;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class ChiTietSanPhamController extends Controller
{

    public function create($id) //trang thêm chi tiết.
    {
        $viewData = [
            'SanPham' => SanPham::find($id),
        ];
        return view('backend.ChiTietSanPham.create_ChiTietSanPham', $viewData);
    }

    public function store(Request $request) //thêm chi tiết.
    {

        $validator = Validator::make(
            $request->all(), // kiểm tra dữ liệu nhập.
            [
                'kichthuoc' => 'required',
                'soluong' => 'required',
                'giasanpham' => 'required',
                'ngaysanxuat' => 'required|date',
                'hansudung' => 'required|date|after:ngaysanxuat',
            ],
            [
                'kichthuoc.required' => 'Kích Thước Không Được Để Trống',

                'soluong.required' => 'Số Lượng Không Được Để Trống',

                'giasanpham.required' => 'Giá Sản Phẩm Không Được Để Trống',

                'ngaysanxuat.required' => 'Ngày Sản Xuất Không Được Để Trống',
                'ngaysanxuat.date' => 'Ngày Sản Xuất Không Đúng Định Dạng Ngày',

                'hansudung.required' => 'Hạng Sử Dụng Không Được Để Trống',
                'hansudung.date' => 'Hạng Sử Dụng Không Đúng Định Dạng Ngày',
                'hansudung.after' => 'Hạng Sử Dụng Phải Sau Ngày Sản Xuất',
            ]
        );
        if ($validator->fails()) { // trả về nếu có lỗi nhập liệu.
            return Response()->json(['errors' => $validator->errors()->all()]);
        }
        $soluong = filter_var($request->soluong, FILTER_SANITIZE_NUMBER_INT); // tách dấu phẩy và ký tự.
        if ($soluong > 2000000000) { // trả về nếu lớn hơn 2 tỷ.
            return Response()->json(['errors' => 'Số Lượng Phải Nằm Trong Khoảng 0 Đến 2.000.000.000']);
        }
        $giasanpham = filter_var($request->giasanpham, FILTER_SANITIZE_NUMBER_INT); // tách dấu phẩy và ký tự.
        if ($giasanpham > 2000000000) { // trả về nếu lớn hơn 2 tỷ.
            return Response()->json(['errors' => 'Giá Sản Phẩm Phải Nằm Trong Khoảng 0 Đến 2.000.000.000']);
        }


        $iddate = "CTSP" . Carbon::now('Asia/Ho_Chi_Minh'); //chuỗi thời gian.
        $exp = explode("-", $iddate); //cắt chuỗi.
        $imp = implode('', $exp); //nối chuỗi
        $exp = explode(" ", $imp);
        $imp = implode('', $exp);
        $exp = explode(":", $imp);
        $imp = implode('', $exp);
        $data['id'] = $imp;
        $data['kichthuoc'] = $request->kichthuoc;
        $data['soluong'] = $soluong;
        $data['giasanpham'] = $giasanpham;
        $data['ngaysanxuat'] = $request->ngaysanxuat;
        $data['hansudung'] = $request->hansudung;
        $data['id_sanpham'] = $request->id_sanpham;
        if ($request->trangthai == "1") {
            $data['trangthai'] = 0;
        } else {
            $data['trangthai'] = 1;
        }
        ChiTietSanPham::create($data);
        return response()->json(['success' => 'Thành Công Rồi']);
    }

    public function edit($id) //trang cập nhật chi tiết.
    {
        $viewData = [
            'ChiTietSanPham' => ChiTietSanPham::find($id),
        ];
        return view('backend.ChiTietSanPham.edit_ChiTietSanPham', $viewData);
    }

    public function update(Request $request, $id) //cập nhật chi tiết.
    {
        $validator = Validator::make(
            $request->all(), // kiểm tra dữ liệu nhập.
            [
                'kichthuoc' => 'required',
                'soluong' => 'required',
                'giasanpham' => 'required',
                'ngaysanxuat' => 'required|date',
                'hansudung' => 'required|date|after:ngaysanxuat',
            ],
            [
                'kichthuoc.required' => 'Kích Thước Không Được Để Trống',

                'soluong.required' => 'Số Lượng Không Được Để Trống',

                'giasanpham.required' => 'Giá Sản Phẩm Không Được Để Trống',

                'ngaysanxuat.required' => 'Ngày Sản Xuất Không Được Để Trống',
                'ngaysanxuat.date' => 'Ngày Sản Xuất Không Đúng Định Dạng Ngày',

                'hansudung.required' => 'Hạng Sử Dụng Không Được Để Trống',
                'hansudung.date' => 'Hạng Sử Dụng Không Đúng Định Dạng Ngày',
                'hansudung.after' => 'Hạng Sử Dụng Phải Sau Ngày Sản Xuất',
            ]
        );
        if ($validator->fails()) { // trả về nếu có lỗi nhập liệu.
            return Response()->json(['errors' => $validator->errors()->all()]);
        }
        $soluong = filter_var($request->soluong, FILTER_SANITIZE_NUMBER_INT); // tách dấu phẩy và ký tự.
        if ($soluong > 2000000000) { // trả về nếu lớn hơn 2 tỷ.
            return Response()->json(['errors' => 'Số Lượng Phải Nằm Trong Khoảng 0 Đến 2.000.000.000']);
        }
        $giasanpham = filter_var($request->giasanpham, FILTER_SANITIZE_NUMBER_INT); // tách dấu phẩy và ký tự.
        if ($giasanpham > 2000000000) { // trả về nếu lớn hơn 2 tỷ.
            return Response()->json(['errors' => 'Giá Sản Phẩm Phải Nằm Trong Khoảng 0 Đến 2.000.000.000']);
        }

        $data['kichthuoc'] = $request->kichthuoc;
        $data['soluong'] = $soluong;
        $data['giasanpham'] = $giasanpham;
        $data['ngaysanxuat'] = $request->ngaysanxuat;
        $data['hansudung'] = $request->hansudung;
        $data['id_sanpham'] = $request->id_sanpham;
        if ($request->trangthai == "1") {
            $data['trangthai'] = 0;
        } else {
            $data['trangthai'] = 1;
        }
        ChiTietSanPham::where('id', $id)->update($data);
        return response()->json(['success' => 'Thành Công Rồi']);
    }

    public function destroy($id) //xóa chi tiết.
    {
        ChiTietSanPham::where('id', $id)->delete();
        return response()->json(['success' => 'Thành Công Rồi']);
    }
}
