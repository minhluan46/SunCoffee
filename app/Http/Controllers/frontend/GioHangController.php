<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use App\Models\ChiTietSanPham;
use App\Models\KhuyenMai;
use App\Models\QuyCach;
use App\Models\ChiTietKhuyenMai;
use App\Models\KhachHang;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Cart;
use App\Models\ChiTietHoaDon;
use App\Models\HoaDon;
use Illuminate\Support\Facades\Session;

class GioHangController extends Controller
{
    public function index()
    {
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d'); // lấy ngày hiện tại.
        // lấy ra sản phẩm "cà phê hạt" với quy cách = 2.
        $QuyCach = QuyCach::where('quy_cach.trangthai', 2)
            ->join('loai_san_pham', 'quy_cach.id_loaisanpham', '=', 'loai_san_pham.id')
            ->where('loai_san_pham.tenloaisanpham', '=', 'Cà Phê Hạt')
            ->select(
                'quy_cach.*',
            )->first();
        if (Session('GioHangOnline') == null) {
            $viewData = [
                'CaPheHatBanChayNhat' => SanPham::where([['san_pham.the', '=', 'BÁN CHẠY NHẤT'], ['san_pham.trangthai', '!=', '0']])
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
        } else {
            $viewData = [];
        }
        // dd($viewData);
        return view('frontend.giohang.index', $viewData);
    }

    public function show() // trang tiến hành thanh toán.
    {
        return view('frontend.giohang.show');
    }

    function addCartOnline(Request $request) // thêm từ trang chi tiết.
    {
        $SL = $request->quantity; // số lượng được gửi qua.
        $ID = $request->id_product_details; // id chi tiết sản phẩm được gửi qua.
        $ChiTietSanPham = ChiTietSanPham::where('chi_tiet_san_pham.id', $ID)
            ->join('quy_cach', 'quy_cach.id', 'chi_tiet_san_pham.kichthuoc')
            ->select(
                'chi_tiet_san_pham.*',
                'quy_cach.tenquycach',
            )->first();
        $SanPham = SanPham::where('id', $ChiTietSanPham->id_sanpham)->first();
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d'); // lấy ngày hiện tại.
        $ChiTietKhuyenMai = ChiTietKhuyenMai::where('id_chitietsanpham', $ID)
            ->join('khuyen_mai', 'khuyen_mai.id', '=', 'chi_tiet_khuyen_mai.id_khuyenmai')
            ->where([
                ['khuyen_mai.trangthai', '!=', '0'],
                ['khuyen_mai.thoigianketthuc', '>=', $today],
                ['khuyen_mai.thoigianbatdau', '<=', $today],
            ])->select(
                'khuyen_mai.*',
                'chi_tiet_khuyen_mai.muckhuyenmai'
            )
            ->orderBy('created_at', 'asc')
            ->first(); // lấy khuyến mãi được Thêm vào đầu tiên.
        if ($ChiTietKhuyenMai != null) { // kiểm tra khuyến mãi.
            $ApDungKhuyenMai = $ChiTietKhuyenMai->muckhuyenmai; // gắn lạy phần trăm giảm giá.
        } else {
            $ApDungKhuyenMai = 0; // 0% nếu không tìm thấy chi tiết khuyến mãi.
        }

        $odlCart = Session('GioHangOnline') ? Session('GioHangOnline') : null; // kiểm tra session và gắn lại khi đã có.
        $newCart = new Cart($odlCart); // khỏi tạo class Cart.

        if (!isset(Session('GioHangOnline')->products[$ID])) { // kiểm tra nếu chưa có.
            if ($SL > $ChiTietSanPham->soluong) {
                $SL1 = $ChiTietSanPham->soluong;
                $newCart->addCartOnline($ID, $SanPham, $ChiTietSanPham, $ApDungKhuyenMai, $SL1); // gọi phương thức.
                $request->Session()->put('GioHangOnline', $newCart);
                return redirect()->route('SanPham.index')->with('warning', "Bạn Chỉ Có Thể Thêm " . $SL1 . " Sản Phẩm");
            }
        } else {
            if ($SL + Session('GioHangOnline')->products[$ID]['SoLuong'] > $ChiTietSanPham->soluong) {
                $SL1 = $ChiTietSanPham->soluong - Session('GioHangOnline')->products[$ID]['SoLuong'];
                if ($SL1 == 0) {
                    return redirect()->route('SanPham.index')->with('error', "Bạn Đã Thêm Tối Đa");
                }
                $newCart->addCartOnline($ID, $SanPham, $ChiTietSanPham, $ApDungKhuyenMai, $SL1); // gọi phương thức.
                $request->Session()->put('GioHangOnline', $newCart);
                return redirect()->route('SanPham.index')->with('warning', "Bạn Chỉ Có Thể Thêm " . $SL1 . " Sản Phẩm");
            }
        }
        $newCart->addCartOnline($ID, $SanPham, $ChiTietSanPham, $ApDungKhuyenMai, $SL); // gọi phương thức.
        $request->Session()->put('GioHangOnline', $newCart);
        return redirect()->route('SanPham.index')->with('message', "Đã Thêm " . $SL . " Sản Phẩm");
    }

    public function deleteItemCartOnline(Request $request, $id)
    {
        $odlCart = Session('GioHangOnline') ? Session('GioHangOnline') : null;
        $newCart = new Cart($odlCart);
        $newCart->deleteItemCart($id);
        if (count($newCart->products) > 0) {
            $request->session()->put('GioHangOnline', $newCart);
        } else {
            $request->Session()->forget('GioHangOnline');
        }
        return true;
    }

    public function deleteCartOnline(Request $request)
    {
        $request->Session()->forget('GioHangOnline');
        return true;
    }

    public function updateQuantityOnline(Request $request)
    {
        foreach ($request->data as $item) {
            $odlCart = Session('GioHangOnline') ? Session('GioHangOnline') : null;
            $newCart = new Cart($odlCart);
            $newCart->quantityChange($item['id'], $item['sl']);
            $request->session()->put('GioHangOnline', $newCart);
        }
        return true;
    }

    public function orderOnline(Request $request)
    {
        $KhachHang = KhachHang::where('sdt', $request->sdt)->first();
        if ($KhachHang != null) {
            /////////////////////////////////////////////////////////
            // lấy giảm giá thành viên.
            $odlCart = Session('GioHangOnline') ? Session('GioHangOnline') : null;
            $newCart = new Cart($odlCart);
            $newCart->DiscountMember($KhachHang->diemtichluy, $KhachHang->sdt);
            $request->session()->put('GioHangOnline', $newCart);
            /////////////////////////////////////////////////////////
            // hóa đơn.
            $iddate = "HD" . Carbon::now('Asia/Ho_Chi_Minh');
            $exp = explode("-", $iddate);
            $imp = implode('', $exp);
            $exp = explode(" ", $imp);
            $imp = implode('', $exp);
            $exp = explode(":", $imp);
            $imp = implode('', $exp);
            $data['id'] = $imp;
            $data['ngaylap'] = Carbon::now('Asia/Ho_Chi_Minh');
            $data['tongtienhoadon'] = Session::get('GioHangOnline')->totalPrice;
            $data['giamgia'] = Session::get('GioHangOnline')->totalDiscount;
            $data['thanhtien'] = Session::get('GioHangOnline')->Total;
            $data['diemtichluy'] = Session::get('GioHangOnline')->Total / 10000;
            $data['tenkhachhang'] = $request->hoten;
            $data['sdtkhachhang'] = $request->sdt;
            $data['diachikhachhang'] = $request->diachi;
            $data['emailkhachhang'] = $request->email;
            $data['ghichukhachhang'] = $request->ghichu;
            $data['id_khachhang'] = $KhachHang->id;
            $data['id_nhanvien'] = "NV11111111111111"; // tài khoản đặt hàng Online.
            $data['trangthai'] = 2; // trạng thái chờ xác nhận.
            // $diemtichluy = $KhachHang->diemtichluy + $data['diemtichluy'];
            // KhachHang::where("id", $KhachHang->id)->update(['diemtichluy' => $diemtichluy]); // cập nhật điểm tích lũy. {sẻ được cộng khi xác nhận đơn hàng}
            HoaDon::create($data); //tạo hóa đơn.
        } else {
            $iddate = "HD" . Carbon::now('Asia/Ho_Chi_Minh');
            $exp = explode("-", $iddate);
            $imp = implode('', $exp);
            $exp = explode(" ", $imp);
            $imp = implode('', $exp);
            $exp = explode(":", $imp);
            $imp = implode('', $exp);
            $data['id'] = $imp;
            $data['ngaylap'] = Carbon::now('Asia/Ho_Chi_Minh');
            $data['tongtienhoadon'] = Session::get('GioHangOnline')->totalPrice;
            $data['giamgia'] = Session::get('GioHangOnline')->totalDiscount;
            $data['thanhtien'] = Session::get('GioHangOnline')->Total;
            $data['tenkhachhang'] = $request->hoten;
            $data['emailkhachhang'] = $request->email;
            $data['sdtkhachhang'] = $request->sdt;
            $data['diachikhachhang'] = $request->diachi;
            $data['ghichukhachhang'] = $request->ghichu;
            $data['id_khachhang'] = "KH00000000000000";
            $data['id_nhanvien'] = "NV11111111111111"; // tài khoản đặt hàng Online.
            $data['trangthai'] = 2; // trạng thái chờ xác nhận.
            HoaDon::create($data); //tạo hóa đơn.
        }
        foreach (Session::get('GioHangOnline')->products as $item) { // tạo chi tiết hóa đơn.
            $data2['id_hoadon'] = $imp;
            $data2['id_chitietsanpham'] =  $item['CTSP']->id;
            $data2['soluong'] = $item['SoLuong'];
            $data2['giamgia'] = $item['GiamGia'];
            $data2['tonggia'] = $item['TongGia'];
            ChiTietHoaDon::create($data2); // tạo chi tiết hóa đơn.
            // $ChiTietSanPham = ChiTietSanPham::where('id', $item['CTSP']->id)->first(); // cập nhật số lượng còn lại.{sẽ cập nhật khi xác nhận hóa đơn}
            // $data3['soluong'] = $ChiTietSanPham->soluong - $item['SoLuong'];
            // ChiTietSanPham::where('id', $item['CTSP']->id)->update($data3);
        }
        $request->Session()->forget('GioHangOnline'); //xóa session GioHang khi hoàn tất.
        //////////////////////////////////////////////////////////////////////////////////
        // lấy ra sản phẩm "cà phê hạt" đang "bán chạy nhất" với khối lượng "500G".
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d'); // lấy ngày hiện tại.
        $viewData = [
            'CaPheHatBanChayNhat' => SanPham::where('san_pham.the', '=', 'BÁN CHẠY NHẤT')
                ->join('loai_san_pham', 'san_pham.id_loaisanpham', '=', 'loai_san_pham.id')
                ->where('loai_san_pham.tenloaisanpham', '=', 'Cà Phê Hạt')  // lấy loại cà phê hạt.
                ->join('chi_tiet_san_pham', 'san_pham.id', '=', 'chi_tiet_san_pham.id_sanpham')
                ->where([
                    ['chi_tiet_san_pham.kichthuoc', '=', '500G'], // lấy sản phẩm có khối lượng 500G.
                    // ['chi_tiet_san_pham.hansudung', '>=', $today], // kiểm tra còn hạng sử dụng hay không.
                ])->select(
                    'san_pham.*',
                    'loai_san_pham.tenloaisanpham',
                    'chi_tiet_san_pham.kichthuoc',
                    'chi_tiet_san_pham.soluong',
                    'chi_tiet_san_pham.giasanpham',
                )->get(),
        ];
        return redirect()->route('Trangchu.index', $viewData)->with('success', 'Thành Công Rồi');
    }

    public function viewCart(Request $request) // xem lại giỏ hàng và giảm giá thành viên nếu có.
    {
        $KhachHang = KhachHang::where('sdt', $request->sdt)->first();
        $odlCart = Session('GioHangOnline') ? Session('GioHangOnline') : null;
        $newCart = new Cart($odlCart);
        if ($KhachHang != null) {
            $newCart->DiscountMember($KhachHang->diemtichluy, $KhachHang->sdt);
            $request->session()->put('GioHangOnline', $newCart);
        } else {
            $newCart->DiscountMember(0, null);
            $request->session()->put('GioHangOnline', $newCart);
        }
        return view('frontend.giohang.datacart');
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
