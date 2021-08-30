<?php

namespace App\Http\Controllers\interactive;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DanhGia;
use App\Models\SanPham;
use Carbon\Carbon;

class DanhGiaController extends Controller
{
    /////////////////////////////////////////////////////////////////////////////////////////////// danh sách.
    public function index()
    {
        $viewData = [
            'DanhGia' => DanhGia::where('danh_gia.trangthai', '=', '1')
                ->join('san_pham', 'san_pham.id', '=', 'danh_gia.id_sanpham')
                ->select(
                    'danh_gia.*',
                    'san_pham.tensanpham'
                )
                ->orderBy('danh_gia.created_at', 'desc')->paginate(10),
            'SanPham' => SanPham::all(),
        ];
        return view('backend.DanhGia.index', $viewData);
    }
    /////////////////////////////////////////////////////////////////////////////////////////////// đếm số lượng.
    public function countHandleDelivery() // 
    {
        $DanhGia = DanhGia::where('trangthai', 0)->count();
        echo $DanhGia;
    }
    /////////////////////////////////////////////////////////////////////////////////////////////// user đánh giá.
    public function create(Request $request)
    {
        $iddate = "DG" . Carbon::now('Asia/Ho_Chi_Minh'); //chuỗi thời gian.
        $exp = explode("-", $iddate); //cắt chuỗi.
        $imp = implode('', $exp); //nối chuỗi
        $exp = explode(" ", $imp);
        $imp = implode('', $exp);
        $exp = explode(":", $imp);
        $imp = implode('', $exp);
        $data['id'] = $imp;
        $data['hoten'] = $request->hotenReview;
        $data['noidung'] = $request->noidungReview;
        $data['email'] = $request->emailReview;
        $data['id_sanpham'] = $request->id_sanphamReview;
        $data['sosao'] = $request->sosaoReview;
        $data['thoigian'] = Carbon::now('Asia/Ho_Chi_Minh');
        $data['trangthai'] = 0;
        DanhGia::create($data);
        if ($request->pagreview == 'review') {
            return redirect()->route('SanPham.review', $data['id_sanpham'])->with('success', 'Chúng tôi sẽ sớm xét duyệt yêu cầu của bạn');
        }
        return redirect()->route('SanPham.show', $data['id_sanpham'])->with('success', 'Chúng tôi sẽ sớm xét duyệt yêu cầu của bạn');
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////  danh sách cần duyệt.
    public function handleDelivery() // danh sách.
    {
        $viewData = [
            'DanhGia' => DanhGia::where('danh_gia.trangthai', '=', '0')
                ->join('san_pham', 'san_pham.id', '=', 'danh_gia.id_sanpham')
                ->select(
                    'danh_gia.*',
                    'san_pham.tensanpham'
                )
                ->orderBy('danh_gia.created_at', 'desc')->paginate(10),
        ];
        return view('backend.DanhGia.handleDelivery_DanhGia', $viewData);
    }
    ///////////////////////////////////////////// chi tiết.
    public function show($id)
    {
        $viewData = [
            'DanhGia' => DanhGia::where('danh_gia.id', '=', $id)
                ->join('san_pham', 'san_pham.id', '=', 'danh_gia.id_sanpham')
                ->select(
                    'danh_gia.*',
                    'san_pham.tensanpham',
                    'san_pham.hinhanh',
                )->first(),
        ];
        return view('backend.DanhGia.show_DanhGia', $viewData);
    }
    ///////////////////////////////////////////// duyệt đánh giá.
    public function approval($id)
    {
        // cập nhật trạng thái duyệt đánh giá.
        $data['trangthai'] = 1;
        DanhGia::where('id', $id)->update($data);
        // cập nhật số sao cho sản phẩm.
        $DanhGia = DanhGia::find($id);
        $AVGsao['sosao'] = DanhGia::where([['id_sanpham', $DanhGia->id_sanpham], ['trangthai', '1']])->avg('sosao');
        $AVGsao['sosao'] = round($AVGsao['sosao'], 1, PHP_ROUND_HALF_UP);
        SanPham::where('id', $DanhGia->id_sanpham)->update($AVGsao);
        $SanPham = SanPham::where('id', $DanhGia->id_sanpham)->first();
    }
    ///////////////////////////////////////////// xóa đánh giá.
    public function destroy($id)
    {
        DanhGia::where('id', $id)->delete();
    }
    ///////////////////////////////////////////// locj & sắp xếp.
    public function filter(Request $request)
    {
        if ($request->sort == 19) {
            $sort = 'desc';
        } else {
            $sort = 'asc';
        }
        if ($request->filtersanpham != 'all') {
            if ($request->filterngay != null) {
                if ($request->filtersosao == 'all') {
                    $DanhGia = DanhGia::where([['danh_gia.thoigian', 'like',  $request->filterngay . '%'], ['danh_gia.trangthai', '!=', 0], ['danh_gia.id_sanpham', $request->filtersanpham]])
                        ->join('san_pham', 'san_pham.id', '=', 'danh_gia.id_sanpham')
                        ->select(
                            'danh_gia.*',
                            'san_pham.tensanpham'
                        )
                        ->orderBy('danh_gia.created_at', $sort)->get();
                } else {
                    $DanhGia = DanhGia::where([['danh_gia.thoigian', 'like',  $request->filterngay . '%'], ['danh_gia.sosao', '=', $request->filtersosao], ['danh_gia.trangthai', '!=', 0], ['danh_gia.id_sanpham', $request->filtersanpham]])
                        ->join('san_pham', 'san_pham.id', '=', 'danh_gia.id_sanpham')
                        ->select(
                            'danh_gia.*',
                            'san_pham.tensanpham'
                        )
                        ->orderBy('danh_gia.created_at', $sort)->get();
                }
            } else {
                if ($request->filtersosao == 'all') {
                    $DanhGia = DanhGia::where([['danh_gia.trangthai', '!=', 0], ['danh_gia.id_sanpham', $request->filtersanpham]])
                        ->join('san_pham', 'san_pham.id', '=', 'danh_gia.id_sanpham')
                        ->select(
                            'danh_gia.*',
                            'san_pham.tensanpham'
                        )
                        ->orderBy('danh_gia.created_at', $sort)->get();
                } else {
                    $DanhGia = DanhGia::where([['danh_gia.trangthai', '!=', 0], ['danh_gia.sosao', '=', $request->filtersosao], ['danh_gia.id_sanpham', $request->filtersanpham]])
                        ->join('san_pham', 'san_pham.id', '=', 'danh_gia.id_sanpham')
                        ->select(
                            'danh_gia.*',
                            'san_pham.tensanpham'
                        )
                        ->orderBy('danh_gia.created_at', $sort)->get();
                }
            }
        } else {
            if ($request->filterngay != null) {
                if ($request->filtersosao == 'all') {
                    $DanhGia = DanhGia::where([['danh_gia.thoigian', 'like',  $request->filterngay . '%'],  ['danh_gia.trangthai', '!=', 0]])
                        ->join('san_pham', 'san_pham.id', '=', 'danh_gia.id_sanpham')
                        ->select(
                            'danh_gia.*',
                            'san_pham.tensanpham'
                        )
                        ->orderBy('danh_gia.created_at', $sort)->get();
                } else {
                    $DanhGia = DanhGia::where([['danh_gia.thoigian', 'like',  $request->filterngay . '%'], ['danh_gia.sosao', '=', $request->filtersosao],  ['danh_gia.trangthai', '!=', 0]])
                        ->join('san_pham', 'san_pham.id', '=', 'danh_gia.id_sanpham')
                        ->select(
                            'danh_gia.*',
                            'san_pham.tensanpham'
                        )
                        ->orderBy('danh_gia.created_at', $sort)->get();
                }
            } else {
                if ($request->filtersosao == 'all') {
                    $DanhGia = DanhGia::where([['danh_gia.trangthai', '!=', 0]])
                        ->join('san_pham', 'san_pham.id', '=', 'danh_gia.id_sanpham')
                        ->select(
                            'danh_gia.*',
                            'san_pham.tensanpham'
                        )
                        ->orderBy('danh_gia.created_at', $sort)->get();
                } else {
                    $DanhGia = DanhGia::where([['danh_gia.trangthai', '!=', 0], ['danh_gia.sosao', '=', $request->filtersosao]])
                        ->join('san_pham', 'san_pham.id', '=', 'danh_gia.id_sanpham')
                        ->select(
                            'danh_gia.*',
                            'san_pham.tensanpham'
                        )
                        ->orderBy('danh_gia.created_at', $sort)->get();
                }
            }
        }
        $viewData = [
            'DanhGia' => $DanhGia,
        ];
        return view('backend.DanhGia.load_DanhGia', $viewData);
    }
    /////////////////////////////////////////////////////////////////////////////////////////////// tìm kiếm.
    public function search(Request $request)
    {
        $viewData = [
            'DanhGia' => DanhGia::where([['danh_gia.hoten', 'like',  '%' . $request->search . '%'],  ['danh_gia.trangthai', '!=', 0]])
                ->orWhere([['danh_gia.noidung', 'like',   '%' . $request->search . '%'],  ['danh_gia.trangthai', '!=', 0]])
                ->join('san_pham', 'san_pham.id', '=', 'danh_gia.id_sanpham')
                ->select(
                    'danh_gia.*',
                    'san_pham.tensanpham'
                )
                ->orderBy('danh_gia.created_at', 'desc')->get(),
        ];
        return view('backend.DanhGia.load_DanhGia', $viewData);
    }
    /////////////////////////////////////////////////////////////////////////////////////////////// người dùng tìm kiếm.
    public function userSearch(Request $request)
    {
        if ($request->filter == 0) {
            $DanhGia = DanhGia::where([['noidung', 'like',  '%' . $request->keyword . '%'], ['trangthai', '!=', 0]])
                ->orderBy('created_at', 'desc')->get();
        } else {
            $DanhGia = DanhGia::where([['noidung', 'like',  '%' . $request->keyword . '%'], ['sosao',  $request->filter], ['trangthai', '!=', 0]])
                ->orderBy('created_at', 'desc')->get();
        }
        $output = '';
        if (count($DanhGia) > 0) {
            foreach ($DanhGia as $item) {
                $output .= '<div class="rating"><div class="review-name">' . $item->hoten . '</div><div class="review-star">';
                for ($i = 0; $i < 5; $i++) {
                    if ($item->sosao - $i >= 1) {
                        $output .= ' <i class="fas fa-star"></i>';
                    } else {
                        $output .= ' <i class="far fa-star"></i>';
                    }
                }
                $output .= '<samp class="review-time">' . date_format(date_create($item->thoigian), "d/m/Y H:i:s") . '</samp>
            </div><div class="review-comment">' . $item->noidung . '</div></div>
            <hr style="border-top: 1px solid #c49b63;">';
            }
        } else {
            $output = 'Không có kết quả trả về.';
        }
        return $output;
    }
    /////////////////////////////////////////////////////////////////////////////////////////////// người dùng lọc.
    public function userFilter(Request $request)
    {
        if ($request->filter == 0) {
            $DanhGia = DanhGia::where('trangthai', '!=', 0)->orderBy('created_at', 'desc')->get();
        } else {
            $DanhGia = DanhGia::where([['sosao',  $request->filter], ['trangthai', '!=', 0]])->orderBy('created_at', 'desc')->get();
        }
        $output = '';
        if (count($DanhGia) > 0) {
            foreach ($DanhGia as $item) {
                $output .= '<div class="rating"><div class="review-name">' . $item->hoten . '</div><div class="review-star">';
                for ($i = 0; $i < 5; $i++) {
                    if ($item->sosao - $i >= 1) {
                        $output .= ' <i class="fas fa-star"></i>';
                    } else {
                        $output .= ' <i class="far fa-star"></i>';
                    }
                }
                $output .= '<samp class="review-time">' . date_format(date_create($item->thoigian), "d/m/Y H:i:s") . '</samp>
            </div><div class="review-comment">' . $item->noidung . '</div></div>
            <hr style="border-top: 1px solid #c49b63;">';
            }
        } else {
            $output = 'Không có kết quả trả về.';
        }
        return $output;
    }
}
