<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// admin
Route::group(['namespace' => 'backend', 'prefix' => 'admin'], function () {
    //--------------------------------- thống kê --------------------------------- //
    Route::get('/', 'HomeController@index')->name('home.index');
    //--------------------------------- quản lý đơn hàng --------------------------------- //
    // hoá đơn
    Route::group(['prefix' => 'hoa-don'], function () {
        Route::get('/', 'HoaDonController@index')->name('hoa-don.index');
        Route::get('/create-hoa-don', 'HoaDonController@create')->name('hoa-don.create');
        Route::post('/store-hoa-don', 'HoaDonController@store')->name('hoa-don.store');
        Route::get('/show-hoa-don/{id}', 'HoaDonController@show')->name('hoa-don.show');
        Route::get('/edit-hoa-don/{id}', 'HoaDonController@edit')->name('hoa-don.edit');
        Route::post('update-hoa-don/{id}', 'HoaDonController@update')->name('hoa-don.update');
        Route::get('destroy-hoa-don/{id}', 'HoaDonController@destroy')->name('hoa-don.destroy');
        // Route::get('searchsanpham-hoa-don', 'HoaDonController@searchsanpham')->name('hoa-don.searchsanpham');
        // Route::get('addProduct-hoa-don', 'HoaDonController@addProduct')->name('hoa-don.addProduct');
        Route::get('priceProduct-hoa-don/{id}', 'HoaDonController@priceProduct')->name('hoa-don.priceProduct');
        Route::get('discountProduct-hoa-don/{id}', 'HoaDonController@discountProduct')->name('hoa-don.discountProduct');
        Route::get('searchProduct-hoa-don', 'HoaDonController@searchProduct')->name('hoa-don.searchProduct');
        Route::get('addCart-hoa-don/{id}', 'HoaDonController@addCart')->name('hoa-don.addCart');
        Route::get('deleteItemHoaDon-hoa-don/{id}', 'HoaDonController@deleteItemHoaDon')->name('hoa-don.deleteItemHoaDon');
        Route::get('quantityChange-hoa-don/{id}/{quantity}', 'HoaDonController@quantityChange')->name('hoa-don.quantityChange');
        Route::get('payment-hoa-don', 'HoaDonController@payment')->name('hoa-don.payment');
        Route::get('discountMember-hoa-don', 'HoaDonController@discountMember')->name('hoa-don.discountMember');
        Route::get('in-hoa-don', 'HoaDonController@in')->name('hoa-don.in');
        // 
        // Route::get('deleteItemCart-hoa-don/{id}', 'HoaDonController@deleteItemCart')->name('hoa-don.deleteItemCart');
        Route::get('searchCustomer-hoa-don', 'HoaDonController@searchCustomer')->name('hoa-don.searchCustomer');
    });
    // chi tiết hoá đơn
    Route::resource('chi-tiet-hoa-don', 'ChiTietHoaDonController')->except(['destroy']);
    Route::get('chi-tiet-hoa-don/{id}/delete', 'ChiTietHoaDonController@destroy')->name('chi-tiet-hoa-don.destroy');
    //--------------------------------- quản lý sản phẩm --------------------------------- //
    // san phẩm
    Route::resource('san-pham', 'SanPhamController')->except(['destroy']);
    Route::get('san-pham/{id}/delete', 'SanPhamController@destroy')->name('san-pham.destroy');
    // loai san phẩm
    Route::resource('loai-san-pham', 'LoaiSanPhamController')->except(['destroy']);
    Route::get('loai-san-pham/{id}/delete', 'LoaiSanPhamController@destroy')->name('loai-san-pham.destroy');
    // chi tiết san phẩm
    Route::group(['prefix' => 'chi-tiet-san-pham'], function () {
        Route::get('/', 'ChiTietSanPhamController@index')->name('chi-tiet-san-pham.index');
        Route::get('/{id}', 'ChiTietSanPhamController@create')->name('chi-tiet-san-pham.create');
        Route::post('/store', 'ChiTietSanPhamController@store')->name('chi-tiet-san-pham.store');
        Route::get('/{id}/edit', 'ChiTietSanPhamController@edit')->name('chi-tiet-san-pham.edit');
        Route::put('/{id}/update', 'ChiTietSanPhamController@update')->name('chi-tiet-san-pham.update');
        Route::get('/{id}/delete', 'ChiTietSanPhamController@destroy')->name('chi-tiet-san-pham.destroy');
    });
    //--------------------------------- quản lý khuyến mãi --------------------------------- //
    // khuyến mãi
    Route::resource('khuyen-mai', 'KhuyenMaiController')->except(['destroy']);
    Route::get('khuyen-mai/{id}/delete', 'KhuyenMaiController@destroy')->name('khuyen-mai.destroy');
    // chi tiết khuyến mãi
    Route::resource('chi-tiet-khuyen-mai', 'ChiTietKhuyenMaiController')->except(['destroy']);
    Route::get('chi-tiet-khuyen-mai/{id}/delete', 'ChiTietKhuyenMaiController@destroy')->name('chi-tiet-khuyen-mai.destroy');
    //--------------------------------- quản lý nhân viên --------------------------------- //
    // nhân viên
    Route::resource('nhan-vien', 'NhanVienController')->except(['destroy']);
    Route::get('nhan-vien/{id}/delete', 'NhanVienController@destroy')->name('nhan-vien.destroy');
    // loại nhân viên
    Route::resource('loai-nhan-vien', 'LoaiNhanVienController')->except(['destroy']);
    Route::get('loai-nhan-vien/{id}/delete', 'LoaiNhanVienController@destroy')->name('loai-nhan-vien.destroy');
    //--------------------------------- quản lý khách hàng --------------------------------- //
    // khách hàng
    Route::resource('khach-hang', 'KhachHangController')->except(['destroy']);
    Route::get('khach-hang/{id}/delete', 'KhachHangController@destroy')->name('khach-hang.destroy');
    //--------------------------------- khác --------------------------------- //

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
