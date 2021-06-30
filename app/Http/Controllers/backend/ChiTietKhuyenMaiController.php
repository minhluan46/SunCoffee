<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KhuyenMai;
use App\Models\SanPham;
use App\Models\ChiTietSanPham;
use App\Models\ChiTietKhuyenMai;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class ChiTietKhuyenMaiController extends Controller
{

    public function create($id) // trang thêm chi tiết.
    {
        $viewData = [
            'KhuyenMai' => KhuyenMai::find($id),
            'SanPham' => SanPham::all(),
            'ChiTietKhuyenMai' => ChiTietKhuyenMai::where('id_khuyenmai', $id)->get(),
            'ChiTietSanPham' => ChiTietSanPham::where('trangthai', 1)->get(),
        ];
        return view('backend.ChiTietKhuyenMai.create_ChiTietKhuyenMai', $viewData);
    }

    public function store(Request $request) // thêm chi tiết.
    {
        $validator = Validator::make(
            $request->all(), // kiểm tra dữ liệu nhập.
            [
                'id_chitietsanpham' => 'required',
                'muckhuyenmai' => 'required',
                'giakhuyenmai' => 'required',
            ],
            [
                'id_chitietsanpham.required' => 'Sản Phẩm Không Được Để Trống',

                'muckhuyenmai.required' => 'Mức Khuyến Mãi Không Được Để Trống',

                'giakhuyenmai.required' => 'Giá Sản Phẩm Không Được Để Trống',
            ]
        );
        if ($validator->fails()) { // trả về nếu có lỗi nhập liệu.
            return Response()->json(['errors' => $validator->errors()->all()]);
        }
        if ($request->muckhuyenmai > 100) { // kiểm tra mức khuyến mãi.
            return response()->json(['errors' => 'Mức Khuyến Mãi Phải Nhỏ Hơn 100']);
        }


        $OldChiTietKhuyenMai = ChiTietKhuyenMai::where([
            ['id_chitietsanpham', $request->id_chitietsanpham],
            ['id_khuyenmai', $request->id_khuyenmai],
        ])->first();
        if ($OldChiTietKhuyenMai == null) { // cập nhật lại khi đã tồn tại.
            $data['id_chitietsanpham'] = $request->id_chitietsanpham;
            $data['id_khuyenmai'] = $request->id_khuyenmai;
            $data['muckhuyenmai'] = $request->muckhuyenmai;
            $data['giakhuyenmai'] = $request->giakhuyenmai;
            ChiTietKhuyenMai::create($data);
            return response()->json(['success' => 'Thành Công Rồi']);
        } else {
            $data['id_chitietsanpham'] = $request->id_chitietsanpham;
            $data['id_khuyenmai'] = $request->id_khuyenmai;
            $data['muckhuyenmai'] = $request->muckhuyenmai;
            $data['giakhuyenmai'] = $request->giakhuyenmai;
            ChiTietKhuyenMai::where([
                ['id_chitietsanpham', $request->id_chitietsanpham],
                ['id_khuyenmai', $request->id_khuyenmai],
            ])->update($data);
            return response()->json(['success' => 'Đã Cập Nhật Lại']);
        }
    }

    public function edit($idCTSP, $idKM) // trang chi tiết.
    {
        $viewData = [
            'ChiTietKhuyenMai' => ChiTietKhuyenMai::where([['id_chitietsanpham', $idCTSP], ['id_khuyenmai', $idKM]])->first(),
            'KhuyenMai' => KhuyenMai::find($idKM),
            'SanPham' => SanPham::all(),
            'ChiTietSanPham' => ChiTietSanPham::where('trangthai', 1)->get(),
        ];
        return view('backend.ChiTietKhuyenMai.edit_ChiTietKhuyenMai', $viewData);
    }

    public function update(Request $request, $idCTSP, $idKM) // cập nhật chi tiết.
    {
        $validator = Validator::make(
            $request->all(), // kiểm tra dữ liệu nhập.
            [
                'id_chitietsanpham' => 'required',
                'id_khuyenmai' => 'required',
                'muckhuyenmai' => 'required',
                'giakhuyenmai' => 'required',
            ],
            [
                'id_chitietsanpham.required' => 'Sản Phẩm Không Được Để Trống',

                'muckhuyenmai.required' => 'Mức Khuyến Mãi Không Được Để Trống',

                'giakhuyenmai.required' => 'Giá Sản Phẩm Không Được Để Trống',
            ]
        );
        if ($validator->fails()) { // trả về nếu có lỗi nhập liệu.
            return Response()->json(['errors' => $validator->errors()->all()]);
        }
        if ($request->muckhuyenmai > 100) { // kiểm tra mức khuyến mãi.
            return response()->json(['errors' => 'Mức Khuyến Mãi Phải Nhỏ Hơn 100']);
        }

        $data['id_chitietsanpham'] = $request->id_chitietsanpham;
        $data['id_khuyenmai'] = $request->id_khuyenmai;
        $data['muckhuyenmai'] = $request->muckhuyenmai;
        $data['giakhuyenmai'] = $request->giakhuyenmai;
        ChiTietKhuyenMai::where([
            ['id_chitietsanpham', $idCTSP],
            ['id_khuyenmai', $idKM],
        ])->update($data);
        return response()->json(['success' => 'Thành Công Rồi']);
    }

    public function destroy($idCTSP, $idKM)
    {
        ChiTietKhuyenMai::where([['id_chitietsanpham', $idCTSP], ['id_khuyenmai', $idKM]])->delete();
        return response()->json(['success' => 'Thành Công Rồi']);
    }
}
