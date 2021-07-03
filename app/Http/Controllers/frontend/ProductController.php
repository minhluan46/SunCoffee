<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\ChiTietSanPham;




class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product = SanPham::where('trangthai',1)->get();
        // $dripPro = SanPham::where('trangthai',1)->where('loaiSP->tenloaisanpham','DRIP')->get();
        // $product = SanPham::where('trangthai',1)->where('','')->get();
        // $product = SanPham::where('trangthai',1)->where('','')->get();


        $viewData = [
            'product' => $product,
            // 'drip' => $dripPro,
        ];

        return view('frontend.products.index', $viewData);
    }

    public function getProductDetail($id){
        $product = SanPham::where('trangthai',1)->get();

        $product_detail = SanPham::find($id);
       $pro_detail = ChiTietSanPham::where('id_sanpham',$id)->get();
       $get_detail_id = 0;
       $viewData = [
        'product' => $product,
        'product_detail' => $product_detail,
        'pro_detail' => $pro_detail,
        'get_detail_id' => $get_detail_id,
    ];
        return view('frontend.products.product_detail', $viewData);
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
