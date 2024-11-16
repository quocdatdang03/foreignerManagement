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
        Schema::create('nguoi_nuoc_ngoais', function (Blueprint $table) {
            $table->id('idNguoiNuocNgoai');
            $table->unsignedBigInteger('idQuocTich');
            $table->string('hoTen');
            $table->string('soPassport');
            $table->char('sdt', 10);
            $table->string('email');
            $table->string('ngaySinh');
            $table->foreign('idQuocTich')->references('idQuocTich')->on('quoc_tichs');
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
        Schema::dropIfExists('nguoi_nuoc_ngoais');
    }
};
