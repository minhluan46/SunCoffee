<?php

use Illuminate\Support\Facades\Route;

//////////////////////////////      frontend      //////////////////////////////

Route::group(['namespace' => 'frontend'], function () {
    // trang chủ

    Route::get('/', 'TrangChuController@index')->name('Trangchu.index');
    // Sản Phẩm

    Route::get('/san-pham', 'SanPhamController@index')->name('SanPham.index');
    Route::get('/chi-tiet/{id}', 'SanPhamController@show')->name('SanPham.show');
    // Dịch Vụ

    Route::get('/dich-vu', 'DichVuController@index')->name('DichVu.index');
    // Về Chúng Tôi

    Route::get('/ve-chung-toi', 'VeChungToiController@index')->name('VeChungToi.index');
    // Liên lạc

    Route::get('/lien-lac', 'LienLacController@index')->name('LienLac.index');
    // Giỏ hàng

    Route::get('/gio-hang', 'GioHangController@index')->name('GioHang.index');
    Route::get('/thanh-toan', 'GioHangController@show')->name('GioHang.show');
});


//////////////////////////////        Login       //////////////////////////////

Route::group(['namespace' => 'Auth'], function () {
    Route::get('/DangNhap', 'DangNhapController@index')->name('DangNhap.index'); // trang đăng nhập.
    Route::post('/DangNhap', 'DangNhapController@DangNhap')->name('DangNhap'); // đăng nhập.
    Route::post('/DangXuat', 'DangNhapController@DangXuat')->name('DangXuat');  // đăng xuất.
});
//////////////////////////////        admin       //////////////////////////////

Route::group(['namespace' => 'backend', 'prefix' => 'admin', 'middleware' => 'auth'], function () {
    // loại nhân viên

    Route::group(['prefix' => 'loai-nhan-vien'], function () {

        Route::get('/', 'LoaiNhanVienController@index')->name('loai-nhan-vien.index'); // danh sách.
        Route::get('/create', 'LoaiNhanVienController@create')->name('loai-nhan-vien.create'); // trang thêm.
        Route::post('/store', 'LoaiNhanVienController@store')->name('loai-nhan-vien.store'); //thêm.
        Route::get('/{id}/edit', 'LoaiNhanVienController@edit')->name('loai-nhan-vien.edit'); // trang cập nhật.
        Route::put('/{id}/update', 'LoaiNhanVienController@update')->name('loai-nhan-vien.update'); //cập nhật
        Route::get('/{id}/destroy', 'LoaiNhanVienController@destroy')->name('loai-nhan-vien.destroy'); // xóa
        Route::get('/load', 'LoaiNhanVienController@load')->name('loai-nhan-vien.load'); // tải lại.
        Route::get('/search', 'LoaiNhanVienController@search')->name('loai-nhan-vien.search'); // tìm.
    });
    // nhân viên

    Route::group(['prefix' => 'nhan-vien'], function () {

        Route::get('/', 'NhanVienController@index')->name('nhan-vien.index'); // danh sách.
        Route::get('/create', 'NhanVienController@create')->name('nhan-vien.create'); // trang thêm. (Chưa ajax)
        Route::post('/store', 'NhanVienController@store')->name('nhan-vien.store'); //thêm. (Chưa ajax)
        Route::get('/{id}/show', 'NhanVienController@show')->name('nhan-vien.show'); // trang chi tiết.
        Route::get('/{id}/edit', 'NhanVienController@edit')->name('nhan-vien.edit'); // trang cập nhật. (Chưa ajax)
        Route::put('/{id}/update', 'NhanVienController@update')->name('nhan-vien.update'); //cập nhật (Chưa ajax)
        Route::get('/{id}/destroy', 'NhanVienController@destroy')->name('nhan-vien.destroy'); // xóa
        Route::get('/search', 'NhanVienController@search')->name('nhan-vien.search'); // tìm.
    });
    // khách hàng

    Route::group(['prefix' => 'khach-hang'], function () {

        Route::get('/', 'KhachHangController@index')->name('khach-hang.index'); // danh sách.
        Route::get('/create', 'KhachHangController@create')->name('khach-hang.create'); // trang thêm. 
        Route::post('/store', 'KhachHangController@store')->name('khach-hang.store'); //thêm. 
        Route::get('/{id}/edit', 'KhachHangController@edit')->name('khach-hang.edit'); // trang cập nhật. 
        Route::put('/{id}/update', 'KhachHangController@update')->name('khach-hang.update'); //cập nhật 
        Route::get('/{id}/destroy', 'KhachHangController@destroy')->name('khach-hang.destroy'); // xóa
        Route::get('/load', 'KhachHangController@load')->name('khach-hang.load'); // tải lại.
        Route::get('/{id}/loadUpdate', 'KhachHangController@loadUpdate')->name('khach-hang.loadUpdate'); // tải cập nhật.
        Route::get('/search', 'KhachHangController@search')->name('khach-hang.search'); // tìm.
    });
    // loai san phẩm

    Route::group(['prefix' => 'loai-san-pham'], function () {

        Route::get('/', 'LoaiSanPhamController@index')->name('loai-san-pham.index'); // danh sách.
        Route::get('/create', 'LoaiSanPhamController@create')->name('loai-san-pham.create'); // trang thêm.
        Route::post('/store', 'LoaiSanPhamController@store')->name('loai-san-pham.store'); //thêm.
        Route::get('/{id}/edit', 'LoaiSanPhamController@edit')->name('loai-san-pham.edit'); // trang cập nhật.
        Route::put('/{id}/update', 'LoaiSanPhamController@update')->name('loai-san-pham.update'); //cập nhật
        Route::get('/{id}/destroy', 'LoaiSanPhamController@destroy')->name('loai-san-pham.destroy'); // xóa
        Route::get('/load', 'LoaiSanPhamController@load')->name('loai-san-pham.load'); // tải lại.
        Route::get('/{id}/loadUpdate', 'LoaiSanPhamController@loadUpdate')->name('loai-san-pham.loadUpdate'); // tải cập nhật.
        Route::get('/search', 'LoaiSanPhamController@search')->name('loai-san-pham.search'); // tìm.
    });
    // sản phẩm.

    Route::group(['prefix' => 'san-pham'], function () {

        Route::get('/', 'SanPhamController@index')->name('san-pham.index'); // danh sách.
        Route::get('/create', 'SanPhamController@create')->name('san-pham.create'); // trang thêm. (chưa ajax)
        Route::post('/store', 'SanPhamController@store')->name('san-pham.store'); //thêm. (chưa ajax)
        Route::get('/{id}/show', 'SanPhamController@show')->name('san-pham.show'); // trang chi tiết.
        Route::get('/{id}/edit', 'SanPhamController@edit')->name('san-pham.edit'); // trang cập nhật. (chưa ajax)
        Route::put('/{id}/update', 'SanPhamController@update')->name('san-pham.update'); //cập nhật (chưa ajax)
        Route::get('/{id}/destroy', 'SanPhamController@destroy')->name('san-pham.destroy'); // xóa.
        Route::get('/search', 'SanPhamController@search')->name('san-pham.search'); // tìm.
    });
    // chi tiết san phẩm

    Route::group(['prefix' => 'chi-tiet-san-pham'], function () {

        Route::get('/{id}/create', 'ChiTietSanPhamController@create')->name('chi-tiet-san-pham.create'); // trang thêm chi tiết. 
        Route::post('/store', 'ChiTietSanPhamController@store')->name('chi-tiet-san-pham.store'); // thêm chi tiết.
        Route::get('/{id}/edit', 'ChiTietSanPhamController@edit')->name('chi-tiet-san-pham.edit'); // trang cập nhật chi tiết.
        Route::put('/{id}/update', 'ChiTietSanPhamController@update')->name('chi-tiet-san-pham.update'); //cập nhật chi tiết.
        Route::get('/{id}/delete', 'ChiTietSanPhamController@destroy')->name('chi-tiet-san-pham.destroy'); //xóa chi tiết.
    });
    // khuyến mãi

    Route::group(['prefix' => 'khuyen-mai'], function () {

        Route::get('/', 'KhuyenMaiController@index')->name('khuyen-mai.index'); // danh sách.
        Route::get('/create', 'KhuyenMaiController@create')->name('khuyen-mai.create'); // trang thêm. 
        Route::post('/store', 'KhuyenMaiController@store')->name('khuyen-mai.store'); //thêm. 
        Route::get('/load', 'KhuyenMaiController@load')->name('khuyen-mai.load'); // tải lại.
        Route::get('/{id}/show', 'KhuyenMaiController@show')->name('khuyen-mai.show'); // trang chi tiết.
        Route::get('/{id}/edit', 'KhuyenMaiController@edit')->name('khuyen-mai.edit'); // trang cập nhật.
        Route::put('/{id}/update', 'KhuyenMaiController@update')->name('khuyen-mai.update'); //cập nhật 
        Route::get('/{id}/loadUpdate', 'KhuyenMaiController@loadUpdate')->name('khuyen-mai.loadUpdate'); // tải cập nhật.
        Route::get('/{id}/destroy', 'KhuyenMaiController@destroy')->name('khuyen-mai.destroy'); // xóa.
        Route::get('/search', 'KhuyenMaiController@search')->name('khuyen-mai.search'); // tìm.
    });
    // chi tiết khuyến mãi

    Route::group(['prefix' => 'chi-tiet-khuyen-mai'], function () {

        Route::get('/{id}/create', 'ChiTietKhuyenMaiController@create')->name('chi-tiet-khuyen-mai.create'); // trang thêm chi tiết.
        Route::post('/store', 'ChiTietKhuyenMaiController@store')->name('chi-tiet-khuyen-mai.store'); // thêm chi tiết.
        Route::get('/{idCTSP}/{idKM}/edit', 'ChiTietKhuyenMaiController@edit')->name('chi-tiet-khuyen-mai.edit'); // trang cập nhật chi tiết.
        Route::put('/{idCTSP}/{idKM}/update', 'ChiTietKhuyenMaiController@update')->name('chi-tiet-khuyen-mai.update'); //cập nhật chi tiết.
        Route::get('/{idCTSP}/{idKM}/delete', 'ChiTietKhuyenMaiController@destroy')->name('chi-tiet-khuyen-mai.destroy'); //xóa chi tiết.
    });
    // hóa đơn.

    Route::group(['prefix' => 'hoa-don'], function () {
        Route::get('/', 'HoaDonController@index')->name('hoa-don.index'); // đến trang danh sách.
        Route::get('/create', 'HoaDonController@create')->name('hoa-don.create'); // đến trang thêm.
        Route::get('priceProduct/{id}', 'HoaDonController@priceProduct')->name('hoa-don.priceProduct'); // lấy giá sản phẩm.
        Route::get('discountProduct/{id}', 'HoaDonController@discountProduct')->name('hoa-don.discountProduct'); //lấy giảm giá khuyến mãi.
        Route::get('addCart/{id}', 'HoaDonController@addCart')->name('hoa-don.addCart'); // thêm vào GioHang.
        Route::get('quantityChange/{id}/{quantity}', 'HoaDonController@quantityChange')->name('hoa-don.quantityChange'); // thay đổi số lượng SP trong GioHang.
        Route::get('deleteItemHoaDon/{id}', 'HoaDonController@deleteItemHoaDon')->name('hoa-don.deleteItemHoaDon'); // xóa khổi GioHang.
        Route::get('searchProduct', 'HoaDonController@searchProduct')->name('hoa-don.searchProduct'); // tìm sản phẩm.
        Route::get('payment', 'HoaDonController@payment')->name('hoa-don.payment'); // đến trang thanh toán.
        Route::get('searchCustomer', 'HoaDonController@searchCustomer')->name('hoa-don.searchCustomer'); // tìm khách hàng.
        Route::get('discountMember', 'HoaDonController@discountMember')->name('hoa-don.discountMember'); // lấy giảm giá thành viên.
        Route::get('in', 'HoaDonController@in')->name('hoa-don.in'); // tạo hóa đơn.
        Route::get('/show/{id}', 'HoaDonController@show')->name('hoa-don.show'); // chi tiết.
        Route::put('updateStatus/{id}', 'HoaDonController@updateStatus')->name('hoa-don.updateStatus'); // cập nhật trạng thái.
        Route::get('destroy/{id}', 'HoaDonController@destroy')->name('hoa-don.destroy'); // xóa.
        Route::get('/search', 'HoaDonController@search')->name('hoa-don.search'); // tìm.



        Route::post('update/{id}', 'HoaDonController@update')->name('hoa-don.update');
        Route::post('/store', 'HoaDonController@store')->name('hoa-don.store');
        Route::get('/edit/{id}', 'HoaDonController@edit')->name('hoa-don.edit');
    });



    // Thống kê.

    Route::get('/', 'HomeController@index')->name('home.index');
});
