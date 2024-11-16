<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('co_so_luu_trus', function (Blueprint $table) {
            $table->id('idCoSo');
            $table->unsignedBigInteger('idNguoiDung');
            $table->unsignedBigInteger('idPhuongXa');
            $table->string('tenCoSo');
            $table->string('diaChiCoSo');
            $table->char('sdt', 10)->unique();
            $table->string('email')->unique();
            $table->string('loaiHinh');
            $table->foreign('idNguoiDung')->references('idNguoiDung')->on('nguoi_dungs');
            $table->foreign('idPhuongXa')->references('idPhuongXa')->on('phuong_xas');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('co_so_luu_trus');
    }
};
