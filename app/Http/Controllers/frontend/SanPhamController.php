<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use App\Models\ChiTietSanPham;
use App\Models\QuyCach;
use App\Models\KhuyenMai;
use App\Models\ChiTietKhuyenMai;
use App\Models\LoaiSanPham;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SanPhamController extends Controller
{
    public function index()
    {
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d'); // lấy ngày hiện tại.
        $min_create= KhuyenMai::where('thoigianketthuc','>=',$today)->min('created_at'); 
        $QuyCach = QuyCach::where('quy_cach.trangthai',2)->join('loai_san_pham','quy_cach.id_loaisanpham', '=','loai_san_pham.id')->select('quy_cach.*',)->first();
        $OnlyKM = KhuyenMai::where('thoigianketthuc','>=',$today)->where('khuyen_mai.created_at',$min_create)->first();
        // // $id = $OnlyKM->id;
        // dd($OnlyKM->tenkhuyenmai);
        $viewData =[
            'LoaiSP' => LoaiSanPham::where('trangthai','!=',0)->get(),
            'SanPham' => SanPham::where('san_pham.trangthai',1)->get(),
            'SPQC' => SanPham::where('san_pham.trangthai',1)->join('chi_tiet_san_pham','san_pham.id','=','chi_tiet_san_pham.id_sanpham')->where(
                'chi_tiet_san_pham.hansudung', '>=', $today // kiểm tra còn hạng sử dụng hay không.
            )->join('quy_cach','chi_tiet_san_pham.kichthuoc','=','quy_cach.id')->select(
                'chi_tiet_san_pham.*',
                'quy_cach.tenquycach',
            )->orderBy('giasanpham', 'desc')->get(),

            // 'OnlyKM' => $OnlyKM,
            // 'CaPheKM' => SanPham::where('san_pham.trangthai',1)->join('chi_tiet_san_pham','san_pham.id','=','chi_tiet_san_pham.id_sanpham')->where(
            //     'chi_tiet_san_pham.hansudung', '>=', $today // kiểm tra còn hạng sử dụng hay không.
            // )->join('quy_cach','chi_tiet_san_pham.kichthuoc','=','quy_cach.id')->where('quy_cach.trangthai',2)->join('chi_tiet_khuyen_mai','chi_tiet_san_pham.id','=','chi_tiet_khuyen_mai.id_chitietsanpham')->join('khuyen_mai','chi_tiet_khuyen_mai.id_khuyenmai','=','khuyen_mai.id')->where('khuyen_mai.id',$OnlyKM->id)->get(),
            // 'OnlyKM' => KhuyenMai::where('khuyen_mai.trangthai',1)->join('chi_tiet_khuyen_mai','chi_tiet_khuyen_mai.id_khuyenmai','=','khuyen_mai.id')->join('chi_tiet_san_pham','chi_tiet_san_pham.id','=','chi_tiet_khuyen_mai.id_chitietsanpham')->join('quy_cach','quy_cach.id','=','chi_tiet_san_pham.kichthuoc')->where('quy_cach.trangthai',2)->select('khuyen_mai.*')->get(),
            
            'OnlyKM' => KhuyenMai::where([['khuyen_mai.trangthai',1],['khuyen_mai.thoigianbatdau','<=',$today],])->join('chi_tiet_khuyen_mai','chi_tiet_khuyen_mai.id_khuyenmai','=','khuyen_mai.id')->join('chi_tiet_san_pham','chi_tiet_san_pham.id','=','chi_tiet_khuyen_mai.id_chitietsanpham')->join('quy_cach','quy_cach.id','=','chi_tiet_san_pham.kichthuoc')->where('quy_cach.trangthai',2)->select('khuyen_mai.id','khuyen_mai.tenkhuyenmai','khuyen_mai.thoigianbatdau','khuyen_mai.thoigianketthuc','khuyen_mai.mota','quy_cach.trangthai')->groupBy('khuyen_mai.id','khuyen_mai.tenkhuyenmai','khuyen_mai.thoigianbatdau','khuyen_mai.thoigianketthuc','khuyen_mai.mota','quy_cach.trangthai')->having('trangthai',2)->limit(2)->get(),
            'CaPheKM' => SanPham::where('san_pham.trangthai',1)->join('chi_tiet_san_pham','san_pham.id','=','chi_tiet_san_pham.id_sanpham')->where(
                'chi_tiet_san_pham.hansudung', '>=', $today // kiểm tra còn hạng sử dụng hay không.
            )->join('quy_cach','chi_tiet_san_pham.kichthuoc','=','quy_cach.id')->where('quy_cach.trangthai',2)->join('chi_tiet_khuyen_mai','chi_tiet_san_pham.id','=','chi_tiet_khuyen_mai.id_chitietsanpham')->join('khuyen_mai','chi_tiet_khuyen_mai.id_khuyenmai','=','khuyen_mai.id')->where([
                ['khuyen_mai.trangthai', '!=', '0'],
                ['khuyen_mai.thoigianketthuc', '>=', $today],
                ['khuyen_mai.thoigianbatdau', '<=', $today],
            ])->get(),
        ];

        // dd($viewData);
        return view('frontend.sanpham.index',$viewData);
    }

    public function show($id) // xem chi tiết. {sản phẩm đã được kiểm tra trạng thái bằng 1 ở những nơi liên kết đến}
    {
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d'); // lấy ngày hiện tại.
        $CTSP = ChiTietSanPham::where([
            ['chi_tiet_san_pham.id_sanpham', $id],
            ['chi_tiet_san_pham.hansudung', '>=', $today],
            ['chi_tiet_san_pham.trangthai', '=', '1'],
            ['chi_tiet_san_pham.soluong', '>', '0'],
        ])->orderBy('giasanpham', 'desc')->get(); // lấy CTKM-> id SP,HSD, TT=1, SL>0 và sắp xếp giá giảm dần
        if ($CTSP != null) {
            foreach ($CTSP as $key => $item) { // sử dụng từng CTSP để lấy khuyến mãi được tạo trước và đang áp dụng.
                $COKM = ChiTietSanPham::where('chi_tiet_san_pham.id', $item->id)
                    ->join('quy_cach', 'quy_cach.id', '=', 'chi_tiet_san_pham.kichthuoc')
                    ->Join('chi_tiet_khuyen_mai', 'chi_tiet_khuyen_mai.id_chitietsanpham', '=', 'chi_tiet_san_pham.id')
                    ->Join('khuyen_mai', 'chi_tiet_khuyen_mai.id_khuyenmai', '=', 'khuyen_mai.id')
                    ->where([
                        ['khuyen_mai.trangthai', '!=', '0'],
                        ['khuyen_mai.thoigianketthuc', '>=', $today],
                        ['khuyen_mai.thoigianbatdau', '<=', $today],
                    ])
                    ->select(
                        'chi_tiet_san_pham.id',
                        'chi_tiet_san_pham.giasanpham',
                        'quy_cach.tenquycach',
                        'chi_tiet_khuyen_mai.muckhuyenmai',
                    )
                    ->orderBy('khuyen_mai.created_at', 'asc')
                    ->first();
                if ($COKM != null) { // nếu đúng kiều kiện có KM.
                    $ArrayCTSP[] =  $COKM;
                } else { // không có khuyến mãi.
                    $KOKM = ChiTietSanPham::where('chi_tiet_san_pham.id', $item->id)
                        ->join('quy_cach', 'quy_cach.id', '=', 'chi_tiet_san_pham.kichthuoc')
                        ->leftJoin('chi_tiet_khuyen_mai', 'chi_tiet_khuyen_mai.id_chitietsanpham', '=', 'chi_tiet_san_pham.id')
                        ->select(
                            'chi_tiet_san_pham.id',
                            'chi_tiet_san_pham.giasanpham',
                            'quy_cach.tenquycach',
                            'chi_tiet_khuyen_mai.muckhuyenmai',
                        )
                        ->first();
                    $ArrayCTSP[] =  $KOKM;
                }
            }
        }
        $viewData = [
            'ChiTietSanPham' => $ArrayCTSP,
            'SanPham' => SanPham::find($id),
        ];
        return view('frontend.sanpham.show', $viewData);
    }

    public function showStatus(){
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d'); // lấy ngày hiện tại.

        $viewData=[
            'LoaiSP' => LoaiSanPham::where('trangthai','!=',0)->get(),
            // 'KM' => KhuyenMai::where('thoigianketthuc','>=',$today)->get(),
            'KM' =>KhuyenMai::where([['khuyen_mai.trangthai',1],['khuyen_mai.thoigianbatdau','<=',$today],])->join('chi_tiet_khuyen_mai','chi_tiet_khuyen_mai.id_khuyenmai','=','khuyen_mai.id')->join('chi_tiet_san_pham','chi_tiet_san_pham.id','=','chi_tiet_khuyen_mai.id_chitietsanpham')->join('quy_cach','quy_cach.id','=','chi_tiet_san_pham.kichthuoc')->where('quy_cach.trangthai',2)->select('khuyen_mai.id','khuyen_mai.tenkhuyenmai','khuyen_mai.thoigianbatdau','khuyen_mai.thoigianketthuc','khuyen_mai.mota','quy_cach.trangthai')->groupBy('khuyen_mai.id','khuyen_mai.tenkhuyenmai','khuyen_mai.thoigianbatdau','khuyen_mai.thoigianketthuc','khuyen_mai.mota','quy_cach.trangthai')->having('trangthai',2)->get(),
            // 'CaPheKM' => SanPham::where('san_pham.trangthai',1)->join('chi_tiet_san_pham','san_pham.id','=','chi_tiet_san_pham.id_sanpham')->where(
            //     'chi_tiet_san_pham.hansudung', '>=', $today // kiểm tra còn hạng sử dụng hay không.
            // )->join('quy_cach','chi_tiet_san_pham.kichthuoc','=','quy_cach.id')->join('chi_tiet_khuyen_mai','chi_tiet_san_pham.id','=','chi_tiet_khuyen_mai.id_chitietsanpham')->join('khuyen_mai','chi_tiet_khuyen_mai.id_khuyenmai','=','khuyen_mai.id')->where('khuyen_mai.thoigianketthuc','>=',$today)->get(),
            'CaPheKM' =>SanPham::where('san_pham.trangthai',1)->join('chi_tiet_san_pham','san_pham.id','=','chi_tiet_san_pham.id_sanpham')->where(
                'chi_tiet_san_pham.hansudung', '>=', $today // kiểm tra còn hạng sử dụng hay không.
            )->join('quy_cach','chi_tiet_san_pham.kichthuoc','=','quy_cach.id')->where('quy_cach.trangthai',2)->join('chi_tiet_khuyen_mai','chi_tiet_san_pham.id','=','chi_tiet_khuyen_mai.id_chitietsanpham')->join('khuyen_mai','chi_tiet_khuyen_mai.id_khuyenmai','=','khuyen_mai.id')->where([
                ['khuyen_mai.trangthai', '!=', '0'],
                ['khuyen_mai.thoigianketthuc', '>=', $today],
                ['khuyen_mai.thoigianbatdau', '<=', $today],
            ])->get(),

        ];


        return view('frontend.sanpham.sp_km',$viewData);
    }

    public function showThe($the){
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d'); // lấy ngày hiện tại.

        $viewData=[
            'LoaiSP' => LoaiSanPham::where('trangthai','!=',0)->get(),
            'the' => $the,
            'SPQC' => SanPham::where('san_pham.trangthai',1)->join('chi_tiet_san_pham','san_pham.id','=','chi_tiet_san_pham.id_sanpham')->where(
                'chi_tiet_san_pham.hansudung', '>=', $today // kiểm tra còn hạng sử dụng hay không.
            )->join('quy_cach','chi_tiet_san_pham.kichthuoc','=','quy_cach.id')->select(
                'chi_tiet_san_pham.*',
                'quy_cach.tenquycach',
            )->orderBy('giasanpham', 'desc')->get(),

            'sp_the' => SanPham::where('trangthai',1)->where('the',$the)->get(),
            'KM' => KhuyenMai::where('thoigianketthuc','>=',$today)->get(),
            'CaPheKM' => SanPham::where('san_pham.trangthai',1)->join('chi_tiet_san_pham','san_pham.id','=','chi_tiet_san_pham.id_sanpham')->where(
                'chi_tiet_san_pham.hansudung', '>=', $today // kiểm tra còn hạng sử dụng hay không.
            )->join('chi_tiet_khuyen_mai','chi_tiet_san_pham.id','=','chi_tiet_khuyen_mai.id_chitietsanpham')->join('khuyen_mai','chi_tiet_khuyen_mai.id_khuyenmai','=','khuyen_mai.id')->where('khuyen_mai.thoigianketthuc','>=',$today)->get(),

        ];


        return view('frontend.sanpham.sp_the',$viewData);
    }

    public function searchSanPham(Request $request){
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d'); // lấy ngày hiện tại.

        $keyword = $request->keyword;
        $s = SanPham::where([
                ['tensanpham', 'like', '%' . $keyword . '%'],
                ['trangthai', 1],
            ])->orderBy('created_at', 'desc')->get();
            $c = ChiTietSanPham::where([['soluong', '>', 0], ['trangthai', 1]])->get();
        $viewData = [
            'LoaiSP' => LoaiSanPham::where('trangthai','!=',0)->get(),
            'Search' => SanPham::where([
                ['tensanpham', 'like', '%' . $keyword . '%'],
                ['trangthai', 1],
            ])->orderBy('created_at', 'desc')->get(),
            'keyword' => $keyword,
            'SPQC' => SanPham::where('san_pham.trangthai',1)->join('chi_tiet_san_pham','san_pham.id','=','chi_tiet_san_pham.id_sanpham')->where(
                'chi_tiet_san_pham.hansudung', '>=', $today // kiểm tra còn hạng sử dụng hay không.
            )->join('quy_cach','chi_tiet_san_pham.kichthuoc','=','quy_cach.id')->select(
                'chi_tiet_san_pham.*',
                'quy_cach.tenquycach',
            )->orderBy('giasanpham', 'desc')->get(),
        ];
        return view('frontend.SanPham.sp_search',$viewData);
        
    }

    public function showLsp($lsp){
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d'); // lấy ngày hiện tại.
        $cate = SanPham::where('trangthai',1)->where('id_loaisanpham',$lsp)->get();
        $the = LoaiSanPham::where('id',$lsp)->first();
        $viewData=[

            'LoaiSP' => LoaiSanPham::where('trangthai','!=',0)->get(),
            'the' => $the,
            'sp_loai' => $cate,
            'SPQC' => SanPham::where('san_pham.trangthai',1)->join('chi_tiet_san_pham','san_pham.id','=','chi_tiet_san_pham.id_sanpham')->where(
                'chi_tiet_san_pham.hansudung', '>=', $today // kiểm tra còn hạng sử dụng hay không.
            )->join('quy_cach','chi_tiet_san_pham.kichthuoc','=','quy_cach.id')->select(
                'chi_tiet_san_pham.*',
                'quy_cach.tenquycach',
            )->orderBy('giasanpham', 'desc')->get(),
            'KM' => KhuyenMai::where('thoigianketthuc','>=',$today)->get(),
            'CaPheKM' => SanPham::where('san_pham.trangthai',1)->join('chi_tiet_san_pham','san_pham.id','=','chi_tiet_san_pham.id_sanpham')->where(
                'chi_tiet_san_pham.hansudung', '>=', $today // kiểm tra còn hạng sử dụng hay không.
            )->join('chi_tiet_khuyen_mai','chi_tiet_san_pham.id','=','chi_tiet_khuyen_mai.id_chitietsanpham')->join('khuyen_mai','chi_tiet_khuyen_mai.id_khuyenmai','=','khuyen_mai.id')->where('khuyen_mai.thoigianketthuc','>=',$today)->get(),

        ]; 


        return view('frontend.sanpham.sp_lsp',$viewData);
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
