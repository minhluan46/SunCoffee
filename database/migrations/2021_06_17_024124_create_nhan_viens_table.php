<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhanViensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhan_vien', function (Blueprint $table) {
            $table->char('id', 18);
            $table->string('tennhanvien', 50);
            $table->char('sdt', 10);
            $table->string('diachi', 150);
            $table->date('ngaysinh');
            $table->boolean('gioitinh');
            $table->char('hinhanh', 25);
            $table->integer('luong');
            $table->string('tentaikhoan', 30);
            $table->char('matkhau', 200);
            $table->char('id_loainhanvien', 18);
            $table->boolean('trangthai');
            $table->timestamps();

            $table->primary('id');
            $table->foreign('id_loainhanvien')->references('id')->on('loai_nhan_vien');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhan_vien');
    }
}
