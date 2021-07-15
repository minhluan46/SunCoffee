<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use App\Models\QuyCach;
use App\Models\ChiTietSanPham;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TrangChuController extends Controller
{
    public function index()
    {
        // lấy ra sản phẩm "cà phê hạt" với quy cách = 2.
        $QuyCach = QuyCach::where('quy_cach.trangthai', 2)
            ->join('loai_san_pham', 'quy_cach.id_loaisanpham', '=', 'loai_san_pham.id')
            ->where('loai_san_pham.tenloaisanpham', '=', 'Cà Phê Hạt')
            ->select(
                'quy_cach.*',
            )->first();
        $viewData = [  // lấy ra sản phẩm "cà phê hạt" đang "bán chạy nhất" với quy cách = 2.
            'CaPheHatBanChayNhat' => SanPham::where('san_pham.the', '=', 'BÁN CHẠY NHẤT')
                ->join('loai_san_pham', 'san_pham.id_loaisanpham', '=', 'loai_san_pham.id')
                ->where('loai_san_pham.tenloaisanpham', '=', 'Cà Phê Hạt')  // lấy loại cà phê hạt.
                ->join('chi_tiet_san_pham', 'san_pham.id', '=', 'chi_tiet_san_pham.id_sanpham')
                ->where('chi_tiet_san_pham.kichthuoc', '=', $QuyCach->id)
                ->select(
                    'san_pham.id',
                    'san_pham.tensanpham',
                    'san_pham.hinhanh',
                    'san_pham.the', // thẻ = bán chạy nhất.
                    'loai_san_pham.tenloaisanpham',
                    'chi_tiet_san_pham.giasanpham',
                )->get(),
        ];
        return view('frontend.trangchu.index', $viewData);
    }

    public function show($id)
    {
        //
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
