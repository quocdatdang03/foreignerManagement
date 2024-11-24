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
        Schema::create('giay_pheps', function (Blueprint $table) {
            $table->id('idGiayPhep');
            $table->unsignedBigInteger('idNguoiNuocNgoai');
            $table->unsignedBigInteger('idCoSo');
            $table->string('diaChiTamTru')->nullable(true);
            $table->string('loaiGiayPhep')->nullable(true);
            $table->dateTime('ngayCap')->nullable(true);
            $table->dateTime('ngayHetHan')->nullable(true);
            $table->string('mucDichCapPhep')->nullable(true);
            $table->dateTime('ngayDuKienRoiKhoi');
            $table->dateTime('ngayRoiKhoi')->nullable(true);
            $table->dateTime('ngayDen');
            $table->string('lyDoDen');
            $table->string('trangThai')->nullable(true);
            $table->text('tepDinhKem')->nullable(true);
            $table->string('lyDoKhongXetDuyet')->nullable(true);
            $table->foreign('idNguoiNuocNgoai')->references('idNguoiNuocNgoai')->on('nguoi_nuoc_ngoais');
            $table->foreign('idCoSo')->references('idCoSo')->on('co_so_luu_trus');
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
        Schema::dropIfExists('giay_pheps');
    }
};
