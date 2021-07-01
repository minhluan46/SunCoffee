<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietSanPham extends Model
{
    protected $table ='chi_tiet_san_pham';
    public function SanPham(){
        return $this->belongsTO('App\SanPham','id_sanpham','id');
    }
    public $incrementing = false;
    protected $fillable = ['id', 'kichthuoc', 'soluong', 'giasanpham', 'ngaysanxuat', 'hansudung', 'id_sanpham', 'trangthai'];
}
