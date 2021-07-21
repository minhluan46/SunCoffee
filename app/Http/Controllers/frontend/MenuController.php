<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use App\Models\ChiTietSanPham;
use App\Models\QuyCach;
use App\Models\KhuyenMai;
use App\Models\ChiTietKhuyenMai;
use App\Models\LoaiSanPham;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d'); // lấy ngày hiện tại.
        //
        $viewData = [


            'LoaiSP' => LoaiSanPham::where('trangthai','!=',0)->get(),
            'SanPham' => SanPham::where('san_pham.trangthai',1)->get(),
            'SPQC' => SanPham::where('san_pham.trangthai',1)->join('chi_tiet_san_pham','san_pham.id','=','chi_tiet_san_pham.id_sanpham')->where(
                'chi_tiet_san_pham.hansudung', '>=', $today // kiểm tra còn hạng sử dụng hay không.
            )->join('quy_cach','chi_tiet_san_pham.kichthuoc','=','quy_cach.id')->select(
                'chi_tiet_san_pham.*',
                'quy_cach.tenquycach',
            )->orderBy('giasanpham', 'desc')->get(),
        ];
        return view('frontend.sanpham.menu',$viewData);
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
    public function show($id)
    {
        //
    }

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
