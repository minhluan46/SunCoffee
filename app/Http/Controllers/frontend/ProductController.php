<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SanPham;
use App\Models\ChiTietHoaDon;
use App\Models\ChiTietSanPham;
use App\Models\HoaDon;
use App\Models\KhachHang;
use App\Models\KhuyenMai;
use App\Models\LoaiNhanVien;
use App\Models\LoaiSanPham;
use App\Models\NhanVien;
use Illuminate\Support\Facades\Redirect;
use Cart;





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
        $type_product = LoaiSanPham::where('trangthai',1)->get();
        $detail_product = ChiTietSanPham::where('trangthai',1);

        $viewData = [
            'product' => $product,
            'type_product' => $type_product,
        ];

        // return view('frontend.products.index', $viewData);
        return view('frontend.products.test', $viewData);

    }

    public function menuPage(){
        $product = SanPham::where('trangthai',1)->get();
        $type_product = LoaiSanPham::where('trangthai',1)->get();
        // $detail_product = ChiTietSanPham::where('trangthai',1);

        $viewData = [
            'product' => $product,
            'type_product' => $type_product,
        ];

        // return view('frontend.products.index', $viewData);
        return view('frontend.products.menu', $viewData);
    }

    public function productTypePage($id){
        // echo $id;
        $product = SanPham::where('trangthai',1)->where('id_loaisanpham',$id)->get();
        $type_product = LoaiSanPham::where('trangthai',1)->get();
        // $detail_product = ChiTietSanPham::where('trangthai',1);
        $t = LoaiSanPham::where('id',$id)->first();
        $title = $t->tenloaisanpham;



        $viewData = [
            'product' => $product,
            'type_product' => $type_product,
            'title' => $title,
        ];

        return view('frontend.products.product_type', $viewData);
        
    }

    public function getProductDetail($id){
    $type_product = LoaiSanPham::where('trangthai',1)->get();
    $product = SanPham::where('id',$id)->first();
    $product_detail = $product->detailProduct;
    // $product_detail = ChiTietSanPham::where('id',$idd)->first();

    // echo $product_detail;
       $viewData = [
        'product' => $product,
        'product_detail' => $product_detail,
        'type_product' => $type_product,
    ];
        return view('frontend.products.product_detail', $viewData);
    }

    public function showDetail(Request $request){
        $res = $request->data;
        $product = SanPham::find($res); 

        $output['product_name'] = $product->tensanpham;
        echo json_encode($output); 


    }

    public function quickview(Request $request){
        $quick_pro_id = $request->product_id;

        $quick_product = SanPham::find($quick_pro_id );
        $t = ChiTietSanPHam::where('id_sanpham',$product_id)->get();

        $output['product_name'] = $product->tensanpham;
        $output['product_desc'] = $product->mota;
        $output['detail_list'] = $t;
        $output['product_id'] = $product_id;
        // $output['product_image'] = $product->hinhanh;
        $output['product_image'] = '<p><img  src="../'.$product->hinhanh.'"></p>';

        echo json_encode($output);
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
