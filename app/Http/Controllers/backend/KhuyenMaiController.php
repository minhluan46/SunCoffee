<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KhuyenMai;
use App\Models\ChiTietKhuyenMai;
use App\Models\SanPham;
use App\Models\ChiTietSanPham;
use App\Models\LoaiSanPham;
use App\http\Requests\KhuyenMaiRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class KhuyenMaiController extends Controller
{

    public function index() //danh sách.
    {
        $viewData = [
            'KhuyenMai' => KhuyenMai::orderBy('created_at', 'desc')->paginate(10),
            'today' => Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d'), // lấy ngày hiện tại.
        ];
        return view('backend.KhuyenMai.index', $viewData);
    }

    public function create() // trang thêm.
    {
        return view('backend.KhuyenMai.create_KhuyenMai');
    }

    public function store(Request $request) // thêm.
    {
        $validator = Validator::make(
            $request->all(), // kiểm tra dữ liệu nhập.
            [
                'tenkhuyenmai' => 'required',
                'thoigianbatdau' => 'required|date',
                'thoigianketthuc' => 'required|date|after:thoigianbatdau',
                'muckhuyenmaitoida' => 'required',
                'mota' => 'required',
            ],
            [
                'tenkhuyenmai.required' => 'Tên Khuyến Mãi Không Được Để Trống',

                'thoigianbatdau.required' => 'Thời Gian Bắt Đầu Không Được Để Trống',
                'thoigianbatdau.date' => 'Thời Gian Bắt Không Đúng Đinh Dạng Ngày',

                'thoigianketthuc.required' => 'Thời Gian Kết Thúc Không Được Để Trống',
                'thoigianketthuc.date' => 'Thời Gian Kết Thúc Không Đúng Đinh Dạng Ngày',
                'thoigianketthuc.after' => 'Thời Gian Kết Thúc Phải Sau Thời Gian Bắt Đầu',

                'muckhuyenmaitoida.required' => 'Mức Khuyến Mãi Tối Đa Không Được Để Trống',

                'mota.required' => 'Mô Tả Không Được Để Trống',
            ]
        );
        if ($validator->fails()) { // trả về nếu có lỗi nhập liệu.
            return Response()->json(['errors' => $validator->errors()->all()]);
        }

        $iddate = "KM" . Carbon::now('Asia/Ho_Chi_Minh'); //chuỗi thời gian.
        $exp = explode("-", $iddate); //cắt chuỗi.
        $imp = implode('', $exp); //nối chuỗi
        $exp = explode(" ", $imp);
        $imp = implode('', $exp);
        $exp = explode(":", $imp);
        $imp = implode('', $exp);
        $data['id'] = $imp;
        $data['tenkhuyenmai'] = $request->tenkhuyenmai;
        $data['thoigianbatdau'] = $request->thoigianbatdau;
        $data['thoigianketthuc'] = $request->thoigianketthuc;
        $data['muckhuyenmaitoida'] = $request->muckhuyenmaitoida;
        $data['mota'] = $request->mota;
        if ($request->trangthai == "2") {
            $data['trangthai'] = 1;
        } else {
            $data['trangthai'] = 0;
        }
        KhuyenMai::create($data);
        return response()->json(['success' => 'Thành Công Rồi']);
    }

    public function load() // tải lại.
    {
        $viewData = [
            'KhuyenMai' => KhuyenMai::orderBy('created_at', 'desc')->paginate(10),
            'today' => Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d'), // lấy ngày hiện tại.
        ];
        return view('backend.KhuyenMai.load_KhuyenMai', $viewData);
    }

    public function show($id) // chi tiết.
    {
        $viewData = [
            'KhuyenMai' => KhuyenMai::find($id),
            'SanPham' => SanPham::all(),
            'ChiTietSanPham' => ChiTietSanPham::all(),
            'LoaiSanPham' => LoaiSanPham::all(),
            'ChiTietKhuyenMai' => ChiTietKhuyenMai::where('id_khuyenmai', $id)->orderBy('updated_at', 'desc')->get(),
            'today' => Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d'), // lấy ngày hiện tại.
        ];
        return view('backend.KhuyenMai.show_KhuyenMai', $viewData);
    }

    public function edit($id) // trang cập nhật.
    {
        $viewData = [
            'KhuyenMai' => KhuyenMai::find($id),
        ];
        return view('backend.KhuyenMai.edit_KhuyenMai', $viewData);
    }

    public function update(Request $request, $id) // cập nhật.
    {
        $validator = Validator::make(
            $request->all(), // kiểm tra dữ liệu nhập.
            [
                'tenkhuyenmai' => 'required',
                'thoigianbatdau' => 'required|date',
                'thoigianketthuc' => 'required|date|after:thoigianbatdau',
                'muckhuyenmaitoida' => 'required',
                'mota' => 'required',
            ],
            [
                'tenkhuyenmai.required' => 'Tên Khuyến Mãi Không Được Để Trống',

                'thoigianbatdau.required' => 'Thời Gian Bắt Đầu Không Được Để Trống',
                'thoigianbatdau.date' => 'Thời Gian Bắt Không Đúng Đinh Dạng Ngày',

                'thoigianketthuc.required' => 'Thời Gian Kết Thúc Không Được Để Trống',
                'thoigianketthuc.date' => 'Thời Gian Kết Thúc Không Đúng Đinh Dạng Ngày',
                'thoigianketthuc.after' => 'Thời Gian Kết Thúc Phải Sau Thời Gian Bắt Đầu',

                'muckhuyenmaitoida.required' => 'Mức Khuyến Mãi Tối Đa Không Được Để Trống',

                'mota.required' => 'Mô Tả Không Được Để Trống',
            ]
        );
        if ($validator->fails()) { // trả về nếu có lỗi nhập liệu.
            return Response()->json(['errors' => $validator->errors()->all()]);
        }

        $data['tenkhuyenmai'] = $request->tenkhuyenmai;
        $data['thoigianbatdau'] = $request->thoigianbatdau;
        $data['thoigianketthuc'] = $request->thoigianketthuc;
        $data['muckhuyenmaitoida'] = $request->muckhuyenmaitoida;
        $data['mota'] = $request->mota;
        $data['trangthai'] = $request->trangthai;

        $OldKhuyenMai = KhuyenMai::find($id);
        if ($OldKhuyenMai->trangthai == 0) {
            if ($request->trangthai == "1") {
                $data['trangthai'] = 1;
            } else {
                $data['trangthai'] = 0;
            }
        } else {
            if ($request->trangthai == "2") {
                $data['trangthai'] = 1;
            } else {
                $data['trangthai'] = 0;
            }
        }
        KhuyenMai::where('id', $id)->update($data);
        return response()->json(['success' => 'Thành Công Rồi']);
    }

    public function loadUpdate($id) //tải cập nhật.
    {
        $KhuyenMai = KhuyenMai::find($id);
        $trangthai = $KhuyenMai->trangthai == 1 ? 'bg-success' : 'bg-danger';
        $trangthaitext = $KhuyenMai->trangthai == 1 ? 'Mở' : 'Khóa';
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d'); // lấy ngày hiện tại.


        if ($KhuyenMai->thoigianketthuc < $today) {
            $tinhtrang = "<span class='badge rounded-pill bg-danger'>Kết Thúc</span>";
        } elseif ($KhuyenMai->trangthai == 0 && $KhuyenMai->thoigianketthuc >= $today) {
            $tinhtrang = "<span class='badge rounded-pill bg-warning'>Đã Khóa</span>";
        } elseif ($KhuyenMai->thoigianbatdau > $today) {
            $tinhtrang = "<span class='badge rounded-pill bg-info'>Sắp Đến</span>";
        } else {
            $tinhtrang = "<span class='badge rounded-pill bg-primary'>Đang Áp Dụng</span>";
        }
        $output = "
        <td style='text-align: left'>" . $KhuyenMai->id . "</td>
        <td>" . $KhuyenMai->tenkhuyenmai . "</td>
        <td>" . $KhuyenMai->thoigianbatdau . "</td>
        <td>" . $KhuyenMai->thoigianketthuc . "</td>
        <td>" . $KhuyenMai->muckhuyenmaitoida . "%</td>
        <td>
            <span class='badge rounded-pill " . $trangthai . "'> " . $trangthaitext . "</span>
        </td>
        <td>" . $tinhtrang . "</td>
        <td>
            <a href='javascript:(0)' class='action_btn mr_10 view-add'
                data-url='" . route('chi-tiet-khuyen-mai.create', $KhuyenMai->id) . "'
                data-id='" . $KhuyenMai->id . "'>
                <i class='fas fa-plus-square'></i></a>

            <a href='javascript:(0)' class='action_btn mr_10 view-show'
                data-url='" . route('khuyen-mai.show', $KhuyenMai->id) . "'
                data-id='" . $KhuyenMai->id . "'>
                <i class='fas fa-eye'></i></a>

            <a href='javascript:(0)' class='action_btn mr_10 view-edit'
                data-url='" . route('khuyen-mai.edit', $KhuyenMai->id) . "'
                data-id='" . $KhuyenMai->id . "'>
                <i class='fas fa-edit'></i></a>

            <a href='javascript:(0)' class='action_btn mr_10 form-delete'
                data-url='" . route('khuyen-mai.destroy', $KhuyenMai->id) . "'
                data-id='" . $KhuyenMai->id . "'>
                <i class='fas fa-trash-alt'></i></a>
        </td>";
        return $output;
    }

    public function destroy($id) //xóa.
    {
        ChiTietKhuyenMai::where('id_khuyenmai', $id)->delete();
        KhuyenMai::where('id', $id)->delete();
        return response()->json(['success' => 'Thành Công Rồi']);
    }

    public function search(Request $request) //tìm.
    {
        $viewData = [
            'KhuyenMai' => KhuyenMai::where('tenkhuyenmai', 'like', '%' . $request->search . '%')->orderBy('created_at', 'desc')->get(),
            'today' => Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d'), // lấy ngày hiện tại.
        ];
        return view('backend.KhuyenMai.load_KhuyenMai', $viewData);
    }
}
