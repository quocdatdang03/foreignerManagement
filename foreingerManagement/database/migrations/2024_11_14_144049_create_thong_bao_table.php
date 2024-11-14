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
        Schema::create('thong_bao', function (Blueprint $table) {
            $table->id('idThongBao');
            $table->unsignedBigInteger('idNguoiDung');
            $table->unsignedBigInteger('idCoSo');
            $table->string('tieuDe');
            $table->text('noiDung');
            $table->foreign('idNguoiDung')->references('idNguoiDung')->on('nguoi_dung');
            $table->foreign('idCoSo')->references('idCoSo')->on('co_so_luu_tru');
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
        Schema::dropIfExists('thong_bao');
    }
};
