<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KhuyenMai;
use App\Models\ChiTietKhuyenMai;
use App\Models\ChiTietSanPham;
use App\http\Requests\KhuyenMaiRequest;
use Carbon\Carbon;

class KhuyenMaiController extends Controller
{

    public function index()
    {
        $viewData = [
            'KhuyenMai' => KhuyenMai::orderBy('created_at', 'desc')->get(),
        ];
        return view('backend.KhuyenMai.index', $viewData);
    }

    public function create()
    {
        return view('backend.KhuyenMai.create_KhuyenMai');
    }

    public function store(KhuyenMaiRequest $request)
    {
        $iddate = "KM" . Carbon::now('Asia/Ho_Chi_Minh'); //chuỗi thời gian.
        $exp = explode("-", $iddate); //cắt chuỗi.
        $imp = implode('', $exp); //nối chuỗi
        $exp = explode(" ", $imp);
        $imp = implode('', $exp);
        $exp = explode(":", $imp);
        $imp = implode('', $exp);
        $data['id'] = $imp;
        $data['tenkhuyenmai'] = ucwords($request->tenkhuyenmai);
        $data['thoigianbatdau'] = $request->thoigianbatdau;
        $data['thoigianketthuc'] = $request->thoigianketthuc;
        $data['muckhuyenmaitoida'] = $request->muckhuyenmaitoida;
        $data['mota'] = $request->mota;
        $data['trangthai'] = $request->trangthai;
        if (empty($request->trangthai)) {
            $data['trangthai'] = 0;
        }
        KhuyenMai::create($data);
        $viewData = [
            'KhuyenMai' => KhuyenMai::orderBy('created_at', 'desc')->get(),
        ];
        return redirect()->route('khuyen-mai.index', $viewData)->with('messsge', "Thêm Thành Công");
    }

    public function show($id)
    {
        // $viewData = [
        //     'KhuyenMai1' => KhuyenMai::find($id),
        //     'ChiTietKhuyenMai' =>ChiTietKhuyenMai::where('id_khuyenmai',$id)->get(),
        // ];
        // return response()->json($viewData);

        $KhuyenMai = KhuyenMai::find($id);
        $ChiTietKhuyenMai = ChiTietKhuyenMai::where('id_khuyenmai', $id)->get();
        $ChiTietSanPham = ChiTietSanPham::all();
        $TrangThai = "Áp Dụng";
        if ($KhuyenMai->trangthai == 0) {
            $TrangThai = "Đã Ngừng";
        }
        $output = "<div class=' mb_5'>
        <h4 style='color: red'>" . $KhuyenMai->tenkhuyenmai . " <b> (" . $KhuyenMai->id . ")</b></h4> </div>
        <div class=' mb_5'>
        <b>Thời Gian:</b> Từ " . $KhuyenMai->thoigianbatdau . " Đến " . $KhuyenMai->thoigianketthuc . " <br>
        <b>Mức Khuyến Mãi Lên Đến:</b> " . $KhuyenMai->muckhuyenmaitoida . "% <br>
        <b>Trạng Thái:</b> " . $TrangThai . "</div>
        <div class=' mb_5'>
        <b>Mô Tả: </b>
        <label>" . $KhuyenMai->mota . "</label>
    </div>
    <hr>
    <table class='table'>
                        <thead>
                            <tr>
                                <th scope='col'>Mã Chi Tiết Sản Phẩm</th>
                                <th scope='col'>Size</th>
                                <th scope='col'>Mức Khuyến Mãi</th>
                                <th scope='col'>Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        ";

        foreach ($ChiTietKhuyenMai as $valuectkm) {
            $output .= "<tr>
                            <td>" . $valuectkm->id_chitietsanpham . "</td>
                            <td>Nhỏ</td>";


            $output .= "  
                            <td>" . $valuectkm->muckhuyenmai . "</td>
                            <td>
                                <div class='action_btns d-flex'>
                                    <a href='#' class='action_btn mr_10'><i class='far fa-edit'></i></a>
                                    <a href='#' class='action_btn'><i class='fas fa-trash'></i></a>
                                </div>
                            </td>
                        </tr>";
        }
        $output .= "
                        </tbody>
                        </table>
                        ";
        echo $output;
    }

    public function edit($id)
    {
        $viewData = [
            'KhuyenMai' => KhuyenMai::find($id),
        ];
        return view('backend.KhuyenMai.edit_KhuyenMai', $viewData);
    }

    public function update(KhuyenMaiRequest $request, $id)
    {
        $data['tenkhuyenmai'] = ucwords($request->tenkhuyenmai);
        $data['thoigianbatdau'] = $request->thoigianbatdau;
        $data['thoigianketthuc'] = $request->thoigianketthuc;
        $data['muckhuyenmaitoida'] = $request->muckhuyenmaitoida;
        $data['mota'] = $request->mota;
        $data['trangthai'] = $request->trangthai;
        if (empty($request->trangthai)) {
            $data['trangthai'] = 0;
        }
        KhuyenMai::where('id', $id)->update($data);
        $viewData = [
            'KhuyenMai' => KhuyenMai::orderBy('created_at', 'desc')->get(),
        ];
        return redirect()->route('khuyen-mai.index', $viewData)->with('messsge', "Cập Nhật Thành Công");
    }

    public function destroy($id)
    {
        KhuyenMai::where('id', $id)->delete();
        $viewData = [
            'KhuyenMai' => KhuyenMai::orderBy('created_at', 'desc')->get(),
        ];
        return redirect()->route('khuyen-mai.index', $viewData)->with('messsge', "Xoá Thành Công");
    }
}
