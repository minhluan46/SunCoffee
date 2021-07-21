<?php

use Illuminate\Support\Facades\Route;

//////////////////////////////      frontend      //////////////////////////////

Route::group(['namespace' => 'frontend'], function () {
    // trang chủ

    Route::get('/', 'TrangChuController@index')->name('Trangchu.index');
    // Sản Phẩm

    Route::get('/san-pham', 'SanPhamController@index')->name('SanPham.index');
    Route::get('/chi-tiet/{id}', 'SanPhamController@show')->name('SanPham.show');

    Route::get('/san-pham-km', 'SanPhamController@showStatus')->name('SanPham.status');// Sản phẩm khuyến mãi
    Route::get('/san-pham-the/{the}', 'SanPhamController@showThe')->name('SanPham.the');// Sản phẩm theo thẻ
    Route::get('/san-pham-lsp/{lsp}', 'SanPhamController@showLsp')->name('SanPham.lsp');// Sản phẩm theo loại sản phẩm
    Route::get('/dialog_detail/{id}', 'SanPhamController@dialogDetail')->name('SanPham.dialog_detail');// Sản phẩm theo loại sản phẩm
    Route::post('/search-san-pham', 'SanPhamController@searchSanPham')->name('SanPham.search_sanpham');// Sản phẩm theo loại sản phẩm
    // Dịch Vụ

    Route::get('/dich-vu', 'DichVuController@index')->name('DichVu.index');

    //Menu 
    Route::get('/menu', 'MenuController@index')->name('Menu.index');

    // Về Chúng Tôi

    Route::get('/ve-chung-toi', 'VeChungToiController@index')->name('VeChungToi.index');
    // Liên lạc

    Route::get('/lien-lac', 'LienLacController@index')->name('LienLac.index');
    // Giỏ hàng

    Route::get('/gio-hang', 'GioHangController@index')->name('GioHang.index');
    Route::get('/thanh-toan', 'GioHangController@show')->name('GioHang.show');

    Route::post('/them-vao-gio-hang', 'GioHangController@addCartOnline')->name('GioHang.addCartOnline'); // thêm vào giỏ từ trang chi tiết. (chưa cải thiện từ ngữ trả về )
    Route::post('/loai-bo-san-phan/{id}', 'GioHangController@deleteItemCartOnline')->name('GioHang.deleteItemCartOnline'); // xóa 1 sản phẩm.
    Route::post('/bo-tat-ca', 'GioHangController@deleteCartOnline')->name('GioHang.deleteCartOnline'); // xóa tất cả sản phẩm.
    Route::post('/cap-nhat-so-luong', 'GioHangController@updateQuantityOnline')->name('GioHang.updateQuantityOnline'); // cập nhật số lượng. (Chư sử lý thông báo khi số lượng lớn hơn)
    Route::post('/dat-hang', 'GioHangController@orderOnline')->name('GioHang.orderOnline'); // tìm giảm giá thành viên.
    Route::get('/xem-gio-hang', 'GioHangController@viewCart')->name('GioHang.viewCart'); // xem giỏ hàng.
});


//////////////////////////////        Login       //////////////////////////////

Route::group(['namespace' => 'Auth'], function () {
    Route::get('/DangNhap', 'DangNhapController@index')->name('DangNhap.index'); // trang đăng nhập.
    Route::post('/DangNhap', 'DangNhapController@DangNhap')->name('DangNhap'); // đăng nhập.
    Route::get('/DangXuat', 'DangNhapController@DangXuat')->name('DangXuat');  // đăng xuất.
});
//////////////////////////////        admin       //////////////////////////////

Route::group(['namespace' => 'backend', 'prefix' => 'admin', 'middleware' => 'auth'], function () {
    // thống kê.
    Route::group(['middleware' => 'is.admin'], function () {

        Route::get('/', 'ThongKeController@index')->name('thong-ke.index'); // trang chủ.
        Route::post('/thong-ke/tu-den', 'ThongKeController@fromto')->name('thong-ke.fromto'); // thống kê từ ngày đến ngày.
        Route::post('/thong-ke/thang-nay', 'ThongKeController@statsForThisMonth')->name('thong-ke.statsForThisMonth'); // thông kê trong 3 ngày qua.
    });

    // loại nhân viên

    Route::group(['prefix' => 'loai-nhan-vien', 'middleware' => 'is.admin'], function () {

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

        Route::group(['middleware' => 'is.admin'], function () {

            Route::get('/', 'NhanVienController@index')->name('nhan-vien.index'); // danh sách.
            Route::get('/create', 'NhanVienController@create')->name('nhan-vien.create'); // trang thêm. (Chưa ajax)
            Route::post('/store', 'NhanVienController@store')->name('nhan-vien.store'); //thêm. (Chưa ajax)
            Route::get('/{id}/show', 'NhanVienController@show')->name('nhan-vien.show'); // trang chi tiết.
            Route::get('/{id}/edit', 'NhanVienController@edit')->name('nhan-vien.edit'); // trang cập nhật. (Chưa ajax)
            Route::put('/{id}/update', 'NhanVienController@update')->name('nhan-vien.update'); //cập nhật (Chưa ajax)
            Route::get('/{id}/destroy', 'NhanVienController@destroy')->name('nhan-vien.destroy'); // xóa
            Route::get('/search', 'NhanVienController@search')->name('nhan-vien.search'); // tìm.
        });

        Route::get('/{id}/myProfile', 'NhanVienController@myProfile')->name('nhan-vien.myProfile'); // Thông tin cá nhân.
    });
    // khách hàng

    Route::group(['prefix' => 'khach-hang'], function () {

        Route::group(['middleware' => 'is.admin'], function () {

            Route::get('/', 'KhachHangController@index')->name('khach-hang.index'); // danh sách.
            Route::get('/create', 'KhachHangController@create')->name('khach-hang.create'); // trang thêm. 
            Route::get('/{id}/edit', 'KhachHangController@edit')->name('khach-hang.edit'); // trang cập nhật. 
            Route::put('/{id}/update', 'KhachHangController@update')->name('khach-hang.update'); //cập nhật 
            Route::get('/{id}/destroy', 'KhachHangController@destroy')->name('khach-hang.destroy'); // xóa
            Route::get('/load', 'KhachHangController@load')->name('khach-hang.load'); // tải lại.
            Route::get('/{id}/loadUpdate', 'KhachHangController@loadUpdate')->name('khach-hang.loadUpdate'); // tải cập nhật.
            Route::get('/search', 'KhachHangController@search')->name('khach-hang.search'); // tìm. 
        });

        Route::post('/store', 'KhachHangController@store')->name('khach-hang.store'); //thêm. 
    });
    // loai san phẩm

    Route::group(['prefix' => 'loai-san-pham', 'middleware' => 'is.admin'], function () {

        Route::get('/', 'LoaiSanPhamController@index')->name('loai-san-pham.index'); // danh sách.
        Route::get('/create', 'LoaiSanPhamController@create')->name('loai-san-pham.create'); // trang thêm.
        Route::post('/store', 'LoaiSanPhamController@store')->name('loai-san-pham.store'); //thêm.
        Route::get('/{id}/show', 'LoaiSanPhamController@show')->name('loai-san-pham.show'); // trang cập nhật.
        Route::get('/{id}/edit', 'LoaiSanPhamController@edit')->name('loai-san-pham.edit'); // trang cập nhật.
        Route::put('/{id}/update', 'LoaiSanPhamController@update')->name('loai-san-pham.update'); //cập nhật
        Route::get('/{id}/destroy', 'LoaiSanPhamController@destroy')->name('loai-san-pham.destroy'); // xóa
        Route::get('/load', 'LoaiSanPhamController@load')->name('loai-san-pham.load'); // tải lại.
        Route::get('/{id}/loadUpdate', 'LoaiSanPhamController@loadUpdate')->name('loai-san-pham.loadUpdate'); // tải cập nhật.
        Route::get('/search', 'LoaiSanPhamController@search')->name('loai-san-pham.search'); // tìm.
    });
    // quy cách.

    Route::group(['prefix' => 'quy-cach', 'middleware' => 'is.admin'], function () {

        Route::get('/create', 'QuyCachController@create')->name('quy-cach.create'); // trang thêm.
        Route::post('/store', 'QuyCachController@store')->name('quy-cach.store'); //thêm.
        Route::get('/{id}/edit', 'QuyCachController@edit')->name('quy-cach.edit'); // trang cập nhật.
        Route::put('/{id}/update', 'QuyCachController@update')->name('quy-cach.update'); //cập nhật
        Route::get('/{id}/destroy', 'QuyCachController@destroy')->name('quy-cach.destroy'); // xóa
    });
    // sản phẩm.

    Route::group(['prefix' => 'san-pham', 'middleware' => 'is.admin'], function () {

        Route::get('/', 'SanPhamController@index')->name('san-pham.index'); // danh sách.
        Route::get('/create', 'SanPhamController@create')->name('san-pham.create'); // trang thêm. (chưa ajax)
        Route::post('/store', 'SanPhamController@store')->name('san-pham.store'); //thêm. (chưa ajax)
        Route::get('/{id}/show', 'SanPhamController@show')->name('san-pham.show'); // trang chi tiết.
        Route::get('/{id}/edit', 'SanPhamController@edit')->name('san-pham.edit'); // trang cập nhật. (chưa ajax)
        Route::put('/{id}/update', 'SanPhamController@update')->name('san-pham.update'); //cập nhật (chưa ajax)
        Route::get('/{id}/destroy', 'SanPhamController@destroy')->name('san-pham.destroy'); // xóa.
        Route::get('/search', 'SanPhamController@search')->name('san-pham.search'); // tìm.
        Route::get('/so-luong-xu-ly', 'SanPhamController@handledProductQuantity')->name('san-pham.handledProductQuantity'); // sản phẩm hết hạng.
        Route::get('/so-luong-het-han-su-dung', 'SanPhamController@expiredProductQuantity')->name('san-pham.expiredProductQuantity'); // sản phẩm hết hạng.
        Route::get('/so-luong-het-hang', 'SanPhamController@outOfProductQuantity')->name('san-pham.outOfProductQuantity'); // sản phẩm hết hàng.
        Route::get('/het-han-su-dung', 'SanPhamController@expiredProduct')->name('san-pham.expiredProduct'); // sản phẩm hết hạng.
        Route::get('/het-hang', 'SanPhamController@outOfProduct')->name('san-pham.outOfProduct'); // sản phẩm hết hàng.
        Route::put('/cap-nhat-xu-ly/{id}', 'SanPhamController@updateHandledProduct')->name('san-pham.updateHandledProduct'); // sản phẩm hết hàng.
    });
    // chi tiết san phẩm

    Route::group(['prefix' => 'chi-tiet-san-pham', 'middleware' => 'is.admin'], function () {

        Route::get('/{id}/create', 'ChiTietSanPhamController@create')->name('chi-tiet-san-pham.create'); // trang thêm chi tiết. 
        Route::post('/store', 'ChiTietSanPhamController@store')->name('chi-tiet-san-pham.store'); // thêm chi tiết.
        Route::get('/{id}/edit', 'ChiTietSanPhamController@edit')->name('chi-tiet-san-pham.edit'); // trang cập nhật chi tiết.
        Route::put('/{id}/update', 'ChiTietSanPhamController@update')->name('chi-tiet-san-pham.update'); //cập nhật chi tiết.
        Route::get('/{id}/delete', 'ChiTietSanPhamController@destroy')->name('chi-tiet-san-pham.destroy'); //xóa chi tiết.
    });
    // khuyến mãi

    Route::group(['prefix' => 'khuyen-mai'], function () {

        Route::group(['middleware' => 'is.admin'], function () {

            Route::get('/create', 'KhuyenMaiController@create')->name('khuyen-mai.create'); // trang thêm. 
            Route::post('/store', 'KhuyenMaiController@store')->name('khuyen-mai.store'); //thêm.
            Route::get('/{id}/edit', 'KhuyenMaiController@edit')->name('khuyen-mai.edit'); // trang cập nhật.
            Route::put('/{id}/update', 'KhuyenMaiController@update')->name('khuyen-mai.update'); //cập nhật 
            Route::get('/{id}/loadUpdate', 'KhuyenMaiController@loadUpdate')->name('khuyen-mai.loadUpdate'); // tải cập nhật.
            Route::get('/{id}/destroy', 'KhuyenMaiController@destroy')->name('khuyen-mai.destroy'); // xóa.
            Route::get('/load', 'KhuyenMaiController@load')->name('khuyen-mai.load'); // tải lại.
        });

        Route::get('/', 'KhuyenMaiController@index')->name('khuyen-mai.index'); // danh sách.
        Route::get('/{id}/show', 'KhuyenMaiController@show')->name('khuyen-mai.show'); // trang chi tiết.
        Route::get('/search', 'KhuyenMaiController@search')->name('khuyen-mai.search'); // tìm.
    });
    // chi tiết khuyến mãi

    Route::group(['prefix' => 'chi-tiet-khuyen-mai', 'middleware' => 'is.admin'], function () {

        Route::get('/{id}/create', 'ChiTietKhuyenMaiController@create')->name('chi-tiet-khuyen-mai.create'); // trang thêm chi tiết.
        Route::post('/store', 'ChiTietKhuyenMaiController@store')->name('chi-tiet-khuyen-mai.store'); // thêm chi tiết.
        Route::get('/{idCTSP}/{idKM}/edit', 'ChiTietKhuyenMaiController@edit')->name('chi-tiet-khuyen-mai.edit'); // trang cập nhật chi tiết.
        Route::put('/{idCTSP}/{idKM}/update', 'ChiTietKhuyenMaiController@update')->name('chi-tiet-khuyen-mai.update'); //cập nhật chi tiết.
        Route::get('/{idCTSP}/{idKM}/delete', 'ChiTietKhuyenMaiController@destroy')->name('chi-tiet-khuyen-mai.destroy'); //xóa chi tiết.
    });
    // hóa đơn.

    Route::group(['prefix' => 'hoa-don'], function () {
        // danh sách hóa đơn.

        Route::get('/', 'HoaDonController@index')->name('hoa-don.index'); // đến trang danh sách.
        Route::get('/show/{id}', 'HoaDonController@show')->name('hoa-don.show'); // chi tiết.
        Route::put('updateStatus/{id}', 'HoaDonController@updateStatus')->name('hoa-don.updateStatus')->middleware('is.admin'); // cập nhật trạng thái.
        Route::get('destroy/{id}', 'HoaDonController@destroy')->name('hoa-don.destroy')->middleware('is.admin'); // xóa.
        Route::get('/search', 'HoaDonController@search')->name('hoa-don.search'); // tìm.
        // thêm giỏ hàng.

        Route::get('/create', 'HoaDonController@create')->name('hoa-don.create'); // đến trang thêm.
        Route::get('priceProduct/{id}', 'HoaDonController@priceProduct')->name('hoa-don.priceProduct'); // lấy giá sản phẩm.
        Route::get('discountProduct/{id}', 'HoaDonController@discountProduct')->name('hoa-don.discountProduct'); //lấy giảm giá khuyến mãi.
        Route::get('addCart/{id}', 'HoaDonController@addCart')->name('hoa-don.addCart'); // thêm vào GioHang.
        // cập nhật giỏ hàng.

        Route::get('quantityChange', 'HoaDonController@quantityChange')->name('hoa-don.quantityChange'); // thay đổi số lượng SP trong GioHang.
        // xóa giỏ hàng.

        Route::get('deleteItemHoaDon/{id}', 'HoaDonController@deleteItemHoaDon')->name('hoa-don.deleteItemHoaDon'); // xóa khổi GioHang.
        Route::post('deleteHoaDon/', 'HoaDonController@deleteHoaDon')->name('hoa-don.deleteHoaDon'); // xóa khổi GioHang.
        // tìm kiếm.

        Route::get('searchProduct', 'HoaDonController@searchProduct')->name('hoa-don.searchProduct'); // tìm sản phẩm.
        Route::get('searchCustomer', 'HoaDonController@searchCustomer')->name('hoa-don.searchCustomer'); // tìm khách hàng.
        // giảm giá thành viên.

        Route::get('discountMember', 'HoaDonController@discountMember')->name('hoa-don.discountMember'); // áp dụng giảm giá cho thành viên.
        Route::get('unDiscountMember', 'HoaDonController@unDiscountMember')->name('hoa-don.unDiscountMember'); // bỏ áp dụng giảm giá cho thành viên.
        // in.

        Route::get('in', 'HoaDonController@in')->name('hoa-don.in'); // tạo hóa đơn. {IN HÓA ĐƠN}
        // cần được xử lý.

        Route::get('/xu-ly', 'HoaDonController@handleDelivery')->name('hoa-don.handleDelivery'); // đến trang cập nhật giao hàng.
        Route::put('/cap-nhat-xu-ly/{id}', 'HoaDonController@updateDelivery')->name('hoa-don.updateDelivery'); // cập nhật giao hàng. {IN HÓA ĐƠN, Thông báo email}
        Route::get('/xoa-xu-ly/{id}', 'HoaDonController@deleteDelivery')->name('hoa-don.deleteDelivery'); // xóa giao hàng. {thông báo email}
        Route::get('/so-luong', 'HoaDonController@countHandleDelivery')->name('hoa-don.countHandleDelivery'); // số lượng hóa đơn cần xử lý.
        // in hóa đơn.

        Route::get('/print-bill/{id}', 'HoaDonController@print_bill')->name('hoa-don.print_bill'); // xem trước khi in.
        Route::get('/download-bill/{id}', 'HoaDonController@download_bill')->name('hoa-don.download_bill'); // tải file.
        //gửi email.

        Route::get('/send-email/{id}/{TT}', 'HoaDonController@send_email')->name('hoa-don.send_email'); // email sẽ gửi.
        Route::get('/email/{id}/{TT}', 'HoaDonController@email')->name('hoa-don.email'); // xem gửi email.
    });
});

// in hóa đơn.9
// thông báo qua email.(dành cho thành viên: thông báo về đểm tích lũy,...)
// activa. 
