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
        Schema::create('GiayPhep', function (Blueprint $table) {
            $table->id('idGiayPhep');
            $table->unsignedBigInteger('idNguoiNuocNgoai');
            $table->unsignedBigInteger('idCoSo');
            $table->string('diaChiTamTru');
            $table->string('loaiGiayPhep');
            $table->dateTime('ngayCap');
            $table->dateTime('ngayHetHan');
            $table->string('mucDichCapPhep');
            $table->dateTime('ngayDuKienRoiKhoi');
            $table->dateTime('ngayRoiKhoi');
            $table->dateTime('ngayDen');
            $table->string('lyDoDen');
            $table->string('trangThai');
            $table->text('tepDinhKem');
            $table->string('lyDoKhongXetDuyet');
            $table->foreign('idNguoiNuocNgoai')->references('idNguoiNuocNgoai')->on('NguoiNuocNgoai');
            $table->foreign('idCoSo')->references('idCoSo')->on('CoSoLuuTru');
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
        Schema::dropIfExists('GiayPhep');
    }
};
