<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use App\Models\KhachHang;
use App\Models\NhanVien;
use App\Models\ChiTietSanPham;
use App\Models\ChiTietKhuyenMai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Cart;
use App\Models\HoaDon;
use App\Models\ChiTietHoaDon;
use Carbon\Carbon;

class HoaDonController extends Controller
{

    public function index() //danh sách hóa đơn.
    {
        $viewData = [
            'HoaDon' => HoaDon::orderBy('created_at', 'desc')->get(),
            'NhanVien' => NhanVien::all(),
            'KhachHang' => KhachHang::all(),
        ];
        return view('backend.HoaDon.index', $viewData);
    }

    public function create() // đến trang thêm sản phẩm vào giỏ hàng.
    {
        $viewData = [
            'SanPham' => SanPham::where('trangthai', 1)->get(),
            'ChiTietSanPham' => ChiTietSanPham::where('trangthai', 1)->get(),
        ];
        return view('backend.HoaDon.create_HoaDon', $viewData);
    }

    public function store(Request $request)
    {
    }

    public function show($id) //hiện chi tiết hóa đơn. (chưa xong)
    {
        $HoaDon = HoaDon::find($id);
        $viewData = [
            'HoaDon' => $HoaDon,
            'KhachHang' => KhachHang::where('id', $HoaDon->id_khachhang)->first(),
            'NhanVien' => NhanVien::where('id', $HoaDon->id_nhanvien)->first(),
            'ChiTietHoaDon' => ChiTietHoaDon::where('id_hoadon', $id)->get(),
            'ChiTietSanPham' => ChiTietSanPham::all(),
            'SanPham' => SanPham::all(),
        ];
        return view('backend.HoaDon.show_HoaDon', $viewData);
    }

    public function edit($id) //hiện form chỉnh sửa hóa đơn. (chưa xong)
    {
        $viewData = [
            'HoaDon' => HoaDon::find($id),
        ];
        return view('backend.HoaDon.edit_HoaDon', $viewData);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id) //xóa hóa đơn.
    {
        ChiTietHoaDon::where('id_hoadon', $id)->delete();
        HoaDon::where('id', $id)->delete();
        $viewData = [
            'HoaDon' => HoaDon::orderBy('created_at', 'desc')->get(),
            'NhanVien' => NhanVien::all(),
            'KhachHang' => KhachHang::all(),
        ];
        return view('backend.HoaDon.index', $viewData);
    }


    public function priceProduct($id) //lấy giá sản phẩm
    {
        $ChiTietSanPham = ChiTietSanPham::find($id);
        $output = "" . number_format($ChiTietSanPham->giasanpham) . " VNĐ";
        echo $output;
    }
    public function discountProduct($id) //lấy giảm giá của sản phẩm. (chưa kiểm tra sản phẩm còn hạng khuyến mãi hay không)
    {
        $ChiTietKhuyenMai = ChiTietKhuyenMai::where('id_chitietsanpham', $id)->first();
        // thiếu kiểm tra xem còn khuyến mãi nữa không.
        $ChiTietSanPham = ChiTietSanPham::find($id);
        if ($ChiTietKhuyenMai != null) {
            $discount = ($ChiTietSanPham->giasanpham * ($ChiTietKhuyenMai->muckhuyenmai / 100));
            $output = "-" . number_format($discount) . " VNĐ";
        } else {
            $discount = 0;
            $output = "";
        }
        echo $output;
    }
    public function searchProduct(Request $request) //tìm sản phẩm.
    {
        $keyword = $request->keyword;
        $viewData = [
            'SanPham' => SanPham::where([
                ['tensanpham', 'like', '%' . $keyword . '%'],
                ['trangthai', 1],
            ])->get(),
            'ChiTietSanPham' => ChiTietSanPham::where('trangthai', 1)->get(),
        ];
        return view('backend.Ajax.searchProduct_hoa_don', $viewData);
    }
    public function searchCustomer(Request $request) //tìm khách hàng.
    {
        $sdt = $request->sdt;
        $KhachMuaHang = KhachHang::where('sdt', $sdt)->first();
        if ($KhachMuaHang != null) {
            if ($KhachMuaHang->trangthai != 0) {
                $output = "<div class='total-payment p-3'  style='border: 1px solid #000000;'>
                <div class='d-flex justify-content-between' style='margin-bottom: 10px;'>
                <h4 class='header-title' style='display: inline'>Khách Mua Hàng</h4>
                </div>
                <table class='table'>
                <tbody>
                <tr>
                    <td class='payment-title'>Số Điện Thoại</td>
                    <td><input id='SDT' type='number' class='form-control form-control-sm' value='" . $KhachMuaHang->sdt . "'></td>
                </tr>
                <tr>
                    <td class='payment-title'>Tên Khách Hàng</td>
                    <td><input id='hoten' maxlength='50' type='text' class='form-control form-control-sm' value='" . $KhachMuaHang->tenkhachhang . "'></td>
                </tr>
                <tr>
                    <td class='payment-title'>Địa Chỉ</td>
                    <td><input id='diachi' type='text' class='form-control form-control-sm' value='" . $KhachMuaHang->diachi . "'></td>
                </tr>
                <tr>
                    <td class='payment-title'>Điểm Tích Lũy</td>
                    <td id='diemtichluy'>" . number_format($KhachMuaHang->diemtichluy) . ' Điểm' . "</td>
                </tr>
                </tbody>
                </table>
                </div>";
                return $output;
            }
            $output = "<div class='total-payment p-3'  style='border: 1px solid #ff0000;'>
                <div class='d-flex justify-content-between' style='margin-bottom: 10px;'>
                <h4 class='header-title' style='display: inline'>Khách Mua Hàng</h4></div>
                <table class='table'>
                <tbody>
                <tr>
                    <td class='payment-title'>Số Điện Thoại</td>
                    <td><input id='SDT' type='number' class='form-control form-control-sm' value='" . $sdt . "'></td>
                </tr>
                <tr>
                    <td class='payment-title'>Tên Khách Hàng</td>
                    <td><input id='hoten' maxlength='50' type='text' class='form-control form-control-sm'></td>
                </tr>
                <tr>
                    <td class='payment-title'>Địa Chỉ</td>
                    <td><input id='diachi' type='text' class='form-control form-control-sm'></td>
                </tr>
                <tr>
                    <td class='payment-title'>Điểm Tích Lũy</td>
                    <td id='diemtichluy'></td>
                </tr>
                </tbody>
                </table>
                <div style='text-align: center; color: red'>Khách Hàng Đã Bị Khóa</div>
                </div>";
            return $output;
        }
        $output = "<div class='total-payment p-3'  style='border: 1px solid #ff0000;'>
            <div class='d-flex justify-content-between' style='margin-bottom: 10px;'>
            <h4 class='header-title' style='display: inline'>Khách Mua Hàng</h4>
            <button class='btn btn-light'>Thêm Khách Mới</button></div>
            <table class='table'>
            <tbody>
            <tr>
                <td class='payment-title'>Số Điện Thoại</td>
                <td><input id='SDT' type='number' class='form-control form-control-sm' value='" . $sdt . "'></td>
            </tr>
            <tr>
                <td class='payment-title'>Tên Khách Hàng</td>
                <td><input id='hoten' maxlength='50' type='text' class='form-control form-control-sm'></td>
            </tr>
            <tr>
                <td class='payment-title'>Địa Chỉ</td>
                <td><input id='diachi' type='text' class='form-control form-control-sm'></td>
            </tr>
            <tr>
                <td class='payment-title'>Điểm Tích Lũy</td>
                <td id='diemtichluy'></td>
            </tr>
            </tbody>
            </table>
            <div style='text-align: center; color: red'>Khách Hàng Chưa Đăng Ký</div></div>";
        return $output;
    }
    public function addCart(Request $request, $id) // thêm sản phẩm vào giỏ hàng.
    {
        $ChiTietSanPham = ChiTietSanPham::where('id', $id)->first();
        $ChiTietKhuyenMai = ChiTietKhuyenMai::where('id_chitietsanpham', $id)->first();
        if ($ChiTietSanPham != null) {
            $SanPham = SanPham::where('id', $ChiTietSanPham->id_sanpham)->first();
            $odlCart = Session('GioHang') ? Session('GioHang') : null;
            $newCart = new Cart($odlCart);
            if ($ChiTietKhuyenMai != null) {
                $newCart->addCart($id, $SanPham, $ChiTietSanPham, $ChiTietKhuyenMai->muckhuyenmai);
            } else {
                $newCart->addCart($id, $SanPham, $ChiTietSanPham, 0);
            }
            $request->Session()->put('GioHang', $newCart);
            return view('backend.Ajax.createHoaDon_hoa_don');
        }
    }
    public function deleteItemHoaDon(Request $request, $id) // xóa sản phẩm khỏi hóa đơn.
    {
        $odlCart = Session('GioHang') ? Session('GioHang') : null;
        $newCart = new Cart($odlCart);
        $newCart->deleteItemCart($id);
        if (count($newCart->products) > 0) {
            $request->session()->put('GioHang', $newCart);
        } else {
            $request->Session()->forget('GioHang');
        }
        return view('backend.Ajax.createHoaDon_hoa_don');
    }
    public function quantityChange(Request $request, $id, $quantity) // thai đổi số lượng sản phẩm trong giỏ hàng.
    {
        $odlCart = Session('GioHang') ? Session('GioHang') : null;
        $newCart = new Cart($odlCart);
        $newCart->quantityChange($id, $quantity);
        $request->session()->put('GioHang', $newCart);
        return view('backend.Ajax.createHoaDon_hoa_don');
    }
    public function payment() // đến trang thanh toán.
    {
        return view('backend.HoaDon.add_HoaDon');
    }
    public function discountMember(Request $request) // lấy giảm giá dành cho thành viên.
    {
        $sdt = $request->sdt;
        $KhachMuaHang = KhachHang::where([['sdt', $sdt], ['trangthai', 1]])->first();
        $odlCart = Session('GioHang') ? Session('GioHang') : null;
        $newCart = new Cart($odlCart);
        if (Session::has('GioHang') != null) {
            if ($KhachMuaHang != null) { // khi tìm thấy khách hàng.
                $newCart->DiscountMember($KhachMuaHang->diemtichluy, $KhachMuaHang->sdt);
                $request->session()->put('GioHang', $newCart);
                $output = "<div class='d-flex justify-content-between' style='margin-bottom: 15px;'>
                    <div>Giảm Giá Cho Thành Viên</div><div> -" . number_format(Session::get('GioHang')->DiscountMember) . ' VNĐ' . "</div></div>
                    <div class='d-flex justify-content-between' style='margin-bottom: 15px;'>
                    <div>Tổng Tiền Phải Thanh Toán</div><div>" . number_format(Session::get('GioHang')->Total) . ' VNĐ' . "</div> </div>";
                return $output;
            } //khi không tìm thấy khách hàng
            $newCart->DiscountMember(null, null);
            $request->session()->put('GioHang', $newCart);
            $output = "<div class='d-flex justify-content-between' style='margin-bottom: 15px;'>
                    <div>Tổng Tiền Phải Thanh Toán</div><div>" . number_format(Session::get('GioHang')->Total) . ' VNĐ' . "</div> </div>";
            return $output;
        } // khi không có session GioHang.
        $output = "<div class='d-flex justify-content-between' style='margin-bottom: 15px;'>
                <div>Tổng Tiền Phải Thanh Toán</div><div></div></div>";
        return $output;
    }
    public function in(Request $request) // tạo hóa đơn và chi tiết hóa đơn. (chưa in hóa đơn , chưa thay đổi nhân viên, chưa trừ số lượng sản phẩm)
    {
        $iddate = "HD" . Carbon::now('Asia/Ho_Chi_Minh'); //tạo hóa đơn.
        $exp = explode("-", $iddate);
        $imp = implode('', $exp);
        $exp = explode(" ", $imp);
        $imp = implode('', $exp);
        $exp = explode(":", $imp);
        $imp = implode('', $exp);
        $data['id'] = $imp;
        $data['ngaylap'] = Carbon::now('Asia/Ho_Chi_Minh');
        $data['tongtienhoadon'] = Session::get('GioHang')->totalPrice;
        $data['giamgia'] = Session::get('GioHang')->totalDiscount;
        $data['thanhtien'] = Session::get('GioHang')->Total;
        if (Session::get('GioHang')->PhoneMember != 0) { //khi khách mua hàng là thành viên.
            $KhachMuaHang = KhachHang::where('sdt', Session::get('GioHang')->PhoneMember)->first();
            $data['sdtkhachhang'] = $KhachMuaHang->sdt;
            $data['diachikhachhang'] = $KhachMuaHang->diachi;
            $data['id_khachhang'] = $KhachMuaHang->id;
            $data['diemtichluy'] = Session::get('GioHang')->Total / 10000;
            $diemtichluy = $KhachMuaHang->diemtichluy + $data['diemtichluy']; // tích lũy điểm mua hàng.
            KhachHang::where("id", $KhachMuaHang->id)->update(['diemtichluy' => $diemtichluy]);
        } else { //khi khách mua hàng không phải là thành viên.
            $data['id_khachhang'] = "KH00000000000000";
        }
        $data['id_nhanvien'] = "NV20210625160656"; //chưa có đăng nhập.
        $data['trangthai'] = 1;
        HoaDon::create($data);
        foreach (Session::get('GioHang')->products as $item) { // tạo chi tiết hóa đơn.
            $data2['id_hoadon'] = $imp;
            $data2['id_chitietsanpham'] =  $item['CTSP']->id;
            $data2['soluong'] = $item['SoLuong'];
            $data2['giamgia'] = $item['GiamGia'];
            $data2['tonggiasanpham'] = $item['TongGia'];
            ChiTietHoaDon::create($data2);
        }
        $request->Session()->forget('GioHang'); //xóa session GioHang khi hoàn tất.
        $viewData = [
            'SanPham' => SanPham::where('trangthai', 1)->get(),
            'ChiTietSanPham' => ChiTietSanPham::where('trangthai', 1)->get(),
        ];
        return view('backend.HoaDon.create_HoaDon', $viewData);
    }
}
