<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table ='san_pham';

    // public function loaiSP(){
    //     return $this->hasMany('App\LoaiSanPham','')
    // }

    public function ChiTietSP(){
        return $this->hasMany('App\ChiTietSanPham','id_sanpham','id');
    }
    public $incrementing = false;
    protected $fillable = ['id', 'tensanpham', 'hinhanh', 'mota', 'the', 'id_loaisanpham', 'trangthai'];
}
