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
            $table->unsignedBigInteger('idPhuongXa')->nullable();
            $table->string('tenCoSo');
            $table->string('diaChiCoSo');
            $table->char('sdt', 10)->nullable();
            $table->string('email')->nullable();
            $table->string('loaiHinh');
            $table->foreign('idNguoiDung')->references('idNguoiDung')->on('nguoi_dungs');
            $table->foreign('idPhuongXa')->references('idPhuongXa')->on('phuong_xas');
            $table->timestamps();
            $table->softDeletes();
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
