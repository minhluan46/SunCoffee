<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    protected $table ='nhan_vien';
    public $incrementing = false;
    protected $fillable = ['id', 'tennhanvien', 'sdt', 'diachi', 'ngaysinh', 'gioitinh', 'hinhanh', 'luong', 'tentaikhoan', 'matkhau', 'id_loainhanvien', 'trangthai'];
}
