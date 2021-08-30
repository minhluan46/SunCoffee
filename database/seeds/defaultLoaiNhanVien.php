<?php

use Illuminate\Database\Seeder;
use App\Models\LoaiNhanVien;

class defaultLoaiNhanVien extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LoaiNhanVien::create([
            'id' => 'LNV00000000000000',
            'tenloainhanvien' => 'Admin',
            'trangthai' => '1',
        ]);
    }
}
