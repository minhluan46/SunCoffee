<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table ='san_pham';

    public function loaiSP(){
        return $this->belongsTo('App\Models\LoaiSanPham','id_loaisanpham','id');
    }

    public function detailProduct(){
        // return $this->hasMany('App\Models\ChiTietSanPham','id_sanpham','id');
        return $this->hasMany('App\Models\ChiTietSanPham','id_sanpham');

    }

    public $incrementing = false;
    protected $fillable = ['id', 'tensanpham', 'hinhanh', 'mota', 'the', 'id_loaisanpham', 'trangthai'];
    

}
