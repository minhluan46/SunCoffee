<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\SanPham;
use App\Models\ChiTietSanPham;
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
        return view('frontend.cart.index');
    }

    public function saveCart(Request $request){
        $product_id = $request->product_id_hidden;
        $quantity = $request->quantity;
        $detail_pro_id = $request->detail_pro_id_hidden;
        $size = $request->size_pro_hidden;
        $product = SanPham::where('id',$product_id)->first();
        $detail_product = ChiTietSanPham::where('id',$detail_pro_id)->get();

        $data['id'] = $product->id;        
        $data['name'] = $product->tensanpham;
        $data['qty'] = 1;
        $data['price'] = 1;
        $data['weight'] = 1;
        $data['options']['image'] = $product->hinhanh;

        Cart::add($data);

        return Redirect::to(route('cart_user.index'));
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
    }

    public function deleteToCart($rowId){
        Cart::update($rowId,0);
        return Redirect::to(route('cart_user.index'));

        

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
