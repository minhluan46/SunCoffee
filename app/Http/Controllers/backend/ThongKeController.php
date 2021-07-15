<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ThongKe;
use App\Models\SanPham;
use App\Models\NhanVien;
use App\Models\KhachHang;
use App\Models\HoaDon;
use App\Models\KhuyenMai;
use Carbon\Carbon;

class ThongKeController extends Controller
{
    public function index() //thống kê.
    {
        $viewData = [
            'SanPham' => SanPham::all(),
            'NhanVien' => NhanVien::all(),
            'KhachHang' => KhachHang::all(),
            'HoaDonOnline' => HoaDon::where('id_nhanvien', 'NV11111111111111')->get(),
            'HoaDon' => HoaDon::where('id_nhanvien', '!=', 'NV11111111111111')->get(),
            'KhuyenMai' => KhuyenMai::all(),
        ];
        return view('backend.ThongKe.index', $viewData);
    }

    public function fromto(Request $request) //thống kê trong khoản thời gian.
    {

        $fromdate = $request->fromdate;
        $todate = $request->todate;
        if ($fromdate > $todate) {
            return Response()->json(['errors' => 'Ngày Bắt Đầu Phải Nhỏ Hơn Ngày Kết Thúc']);
        }
        // dd($fromdate);
        $ThongKe = ThongKe::whereBetween('thoigian', [$fromdate, $todate])->orderBy('thoigian', 'asc')->get();

        foreach ($ThongKe as $key => $value) {
            $date = date_create($value->thoigian);
            $chart_data[] = array(
                'thoigian' => date_format($date, "d-m-Y"),
                'doanhso' => $value->doanhso,
                'loinhuan' => $value->loinhuan,
                'soluongdaban' => $value->soluongdaban,
                'soluongdonhang' => $value->soluongdonhang,
            );
        }
        echo $data = json_encode($chart_data);
    }

    public function statsForThisMonth() //thống kê trong khoản thời gian.
    {
        $form30daysago = Carbon::now('Asia/Ho_Chi_Minh')->subDays(30)->startOfMonth()->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $ThongKe = ThongKe::whereBetween('thoigian', [$form30daysago, $now])->orderBy('thoigian', 'asc')->get();
        foreach ($ThongKe as $key => $value) {
            $date = date_create($value->thoigian);
            $chart_data[] = array(
                'thoigian' => date_format($date, "d-m-Y"),
                'doanhso' => $value->doanhso,
                'loinhuan' => $value->loinhuan,
                'soluongdaban' => $value->soluongdaban,
                'soluongdonhang' => $value->soluongdonhang,
            );
        }
        echo $data = json_encode($chart_data);
    }
}
