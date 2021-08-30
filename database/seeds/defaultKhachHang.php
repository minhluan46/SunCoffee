<?php

use Illuminate\Database\Seeder;
use App\Models\KhachHang;

class defaultKhachHang extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KhachHang::insert([
            'id' => 'KH00000000000000',
            'tenkhachhang' => 'Khách Vãng Lai',
            'sdt' => '0000000000',
            'diachi' => '137/3, khu phố 2, phường An Phú, thành phố Thuận An, Bình Dương.',
            'email' => 'SunCoffee137@gmail.com',
            'diemtichluy' => '0',
            'trangthai' => '1',
        ]);
    }
}
