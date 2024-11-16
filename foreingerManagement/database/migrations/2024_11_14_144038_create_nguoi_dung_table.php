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
        Schema::create('nguoi_dungs', function (Blueprint $table) {
            $table->id('idNguoiDung');
            $table->unsignedBigInteger('idVaiTro');
            $table->string('email')->unique();
            $table->char('sdt', 10)->unique();
            $table->string('matKhau');
            $table->string('hoVaTen');
            $table->char('soCCCD', 14)->unique();
            $table->string('trangThai');
            $table->foreign('idVaiTro')->references('idVaiTro')->on('vai_tros');
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
        Schema::dropIfExists('nguoi_dungs');
    }
};
