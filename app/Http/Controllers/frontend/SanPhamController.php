<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use App\Models\ChiTietSanPham;
use App\Models\KhuyenMai;
use App\Models\ChiTietKhuyenMai;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SanPhamController extends Controller
{
    public function index()
    {
        return view('frontend.sanpham.index');
    }

    public function show($id) // xem chi tiết. {sản phẩm đã được kiểm tra trạng thái bằng 1 ở những nơi liên kết đến}
    {
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d'); // lấy ngày hiện tại.
        $CTSP = ChiTietSanPham::where([
            ['chi_tiet_san_pham.id_sanpham', $id],
            ['chi_tiet_san_pham.hansudung', '>=', $today],
            ['chi_tiet_san_pham.trangthai', '=', '1'],
            ['chi_tiet_san_pham.soluong', '>', '0'],
        ])->orderBy('giasanpham', 'desc')->get(); // lấy CTKM-> id SP,HSD, TT=1, SL>0 và sắp xếp giá giảm dần
        if ($CTSP != null) {
            foreach ($CTSP as $key => $item) { // sử dụng từng CTSP để lấy khuyến mãi được tạo trước và đang áp dụng.
                $COKM = ChiTietSanPham::where('chi_tiet_san_pham.id', $item->id)
                    ->join('quy_cach', 'quy_cach.id', '=', 'chi_tiet_san_pham.kichthuoc')
                    ->Join('chi_tiet_khuyen_mai', 'chi_tiet_khuyen_mai.id_chitietsanpham', '=', 'chi_tiet_san_pham.id')
                    ->Join('khuyen_mai', 'chi_tiet_khuyen_mai.id_khuyenmai', '=', 'khuyen_mai.id')
                    ->where([
                        ['khuyen_mai.trangthai', '!=', '0'],
                        ['khuyen_mai.thoigianketthuc', '>=', $today],
                        ['khuyen_mai.thoigianbatdau', '<=', $today],
                    ])
                    ->select(
                        'chi_tiet_san_pham.id',
                        'chi_tiet_san_pham.giasanpham',
                        'quy_cach.tenquycach',
                        'chi_tiet_khuyen_mai.muckhuyenmai',
                    )
                    ->orderBy('khuyen_mai.created_at', 'asc')
                    ->first();
                if ($COKM != null) { // nếu đúng kiều kiện có KM.
                    $ArrayCTSP[] =  $COKM;
                } else { // không có khuyến mãi.
                    $KOKM = ChiTietSanPham::where('chi_tiet_san_pham.id', $item->id)
                        ->join('quy_cach', 'quy_cach.id', '=', 'chi_tiet_san_pham.kichthuoc')
                        ->leftJoin('chi_tiet_khuyen_mai', 'chi_tiet_khuyen_mai.id_chitietsanpham', '=', 'chi_tiet_san_pham.id')
                        ->select(
                            'chi_tiet_san_pham.id',
                            'chi_tiet_san_pham.giasanpham',
                            'quy_cach.tenquycach',
                            'chi_tiet_khuyen_mai.muckhuyenmai',
                        )
                        ->first();
                    $ArrayCTSP[] =  $KOKM;
                }
            }
        }
        $viewData = [
            'ChiTietSanPham' => $ArrayCTSP,
            'SanPham' => SanPham::find($id),
        ];
        return view('frontend.sanpham.show', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
