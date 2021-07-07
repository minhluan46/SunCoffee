<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use App\Models\ChiTietSanPham;
use Illuminate\Http\Request;
use Carbon\Carbon;

class GioHangController extends Controller
{
    public function index()
    {
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d'); // lấy ngày hiện tại.
        $viewData = [
            // lấy thêm sản phẩm liên quan(loại sp). cái dưới để demo.
            'CaPheBanChayNhatHienNay' => SanPham::join('loai_san_pham', 'san_pham.id_loaisanpham', '=', 'loai_san_pham.id')
                ->where('loai_san_pham.tenloaisanpham', '=', 'Cà Phê Hạt')  // lấy loại cà phê hạt.
                ->join('chi_tiet_san_pham', 'san_pham.id', '=', 'chi_tiet_san_pham.id_sanpham')
                ->where([
                    ['chi_tiet_san_pham.kichthuoc', '=', '500G'], // lấy sản phẩm có khối lượng 500G.
                    ['chi_tiet_san_pham.hansudung', '>=', $today], // kiểm tra còn hạng sử dụng hay không.
                ])->select(
                    'san_pham.*',
                    'loai_san_pham.tenloaisanpham',
                    'chi_tiet_san_pham.kichthuoc',
                    'chi_tiet_san_pham.soluong',
                    'chi_tiet_san_pham.giasanpham',
                )->get(),
        ];
        return view('frontend.giohang.index', $viewData);
    }

    public function show()
    {
        return view('frontend.giohang.show');
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
        //
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
