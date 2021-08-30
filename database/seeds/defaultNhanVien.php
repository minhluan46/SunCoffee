<?php

use Illuminate\Database\Seeder;
use App\Models\NhanVien;

class defaultNhanVien extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NhanVien::create([
            'id' => 'NV00000000000000',
            'tennhanvien' => 'Admin',
            'sdt' => '0123456789',
            'diachi' => '137/3 khu phố 2 phường An Phú thành phố Thuận An Bình Dương',
            'email' => 'SunCoffee137@gmail.com',
            'ngaysinh' => '2000-07-13',
            'gioitinh' => '1',
            'hinhanh' => 'NOIMAGE.png',
            'luong' => '0',
            'password' => bcrypt(111111),
            'id_loainhanvien' => 'LNV00000000000000',
            'trangthai' => '1',
        ]);

        NhanVien::create([
            'id' => 'NV11111111111111',
            'tennhanvien' => 'Mua Online',
            'sdt' => '0987654321',
            'diachi' => '137/3 khu phố 2 phường An Phú thành phố Thuận An Bình Dương',
            'email' => 'SunCoffee137@gmail.com',
            'ngaysinh' => '2000-07-13',
            'gioitinh' => '1',
            'hinhanh' => 'NOIMAGE.png',
            'luong' => '0',
            'password' => bcrypt(111111),
            'id_loainhanvien' => 'LNV00000000000000',
            'trangthai' => '1',
        ]);
    }
}
