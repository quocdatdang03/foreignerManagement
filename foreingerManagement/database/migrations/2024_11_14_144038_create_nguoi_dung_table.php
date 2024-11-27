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
            $table->string('google_id')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->char('sdt', 10)->unique()->nullable();
            $table->string('matKhau');
            $table->string('hoVaTen');
            $table->char('soCCCD', 14)->unique()->nullable();
            $table->string('trangThai')->default('active');
            $table->timestamps();
            $table->rememberToken();
            $table->foreign('idVaiTro')->references('idVaiTro')->on('vai_tros')->onDelete('cascade');
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
