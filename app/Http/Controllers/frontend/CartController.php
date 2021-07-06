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

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $type_product = LoaiSanPham::where('trangthai',1)->get();
        $viewData = [
            'type_product' => $type_product,
        ];

        return view('frontend.cart.index',$viewData);
    }

    public function saveCart(Request $request){
        // $product_id = $request->product_id_hidden;
        // $product_detail_id = $request->product_detail_id_hidden;

        // $product_list = SanPham::where('id',$product_id)->first();
        // $product_detail_list = ChiTietSanPham::where('id',$product_detail_id)->first();
        // $typp_product = LoaiSanPham::where('id',$product_list->id_loaisanpham)->first();

        // $quantity = $request->quantity;


        // $detail_pro_id = $request->detail_pro_id_hidden;
        // $size = $request->size_pro_hidden;
        // $product = SanPham::where('id',$product_id)->first();
        // $detail_product = ChiTietSanPham::where('id',$detail_pro_id)->get();

        // echo $product_detail_id;
        // echo $product_detail_list;
        // echo $product_list;
        // echo $typp_product;

        $res_id = $request->data["key"];
        $res_qty = $request->data["qty"];
        $detail_pro = ChiTietSanPham::find($res_id);
        $product_list = SanPham::find($detail_pro->id_sanpham);
        $quantity = $res_qty;
        $type = LoaiSanPham::where('id',$product_list->id_loaisanpham)->first();

        $data['id'] = $product_list->id;        
        $data['name'] = $product_list->tensanpham;
        $data['qty'] =  $res_qty;
        $data['price'] = $detail_pro->giasanpham;
        $data['weight'] =1;
        $data['options']['image'] = $product_list->hinhanh;
        $data['options']['size'] = $detail_pro->kichthuoc;
        $data['options']['type'] = $type->tenloaisanpham;

        Cart::add($data);
        // $type_product = LoaiSanPham::where('trangthai',1)->get();
        // $viewData = [
        //     'type_product' => $type_product,
        // ];
  
        // return Redirect::to(route('cart_user.index',$viewData));
        // Cart::destroy();



        // echo $product_id;
        //  echo $quantity;
        // echo $detail_pro_id;
        // echo $size;
    //    echo $product;
    //    echo $detail_product;
        // $viewData = [
        //     'product' => $product,
        // ];
        // return view('frontend.cart.index', $viewData);
        // return view('frontend.cart.index');

    }

    public function deleteToCart($rowId){
        Cart::update($rowId,0);
        return Redirect::to(route('cart_user.index'));
    }
    public function updateQty(Request $request){
        $cart = $request->data;
        foreach($cart as $item){
            echo $item["key"].'</br>';
            echo $item["value"].'</br>';
            Cart::update($item["key"],['qty' => $item["value"]]);
        }

        $type_product = LoaiSanPham::where('trangthai',1)->get();
        $viewData = [
            'type_product' => $type_product,
        ];
        return Redirect::to(route('cart_user.index',$viewData));

        // return Redirect::to(route('cart_user.index'));

        // Cart::update($cart->$rowId,['qty' => $qty]);
        // return Redirect::to(route('cart_user.index'));


    }


    //Check out
    public function checkOut(){
        $type_product = LoaiSanPham::where('trangthai',1)->get();
        $viewData = [
            'type_product' => $type_product,
        ];
        return view('frontend.cart.check_out',$viewData);


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
