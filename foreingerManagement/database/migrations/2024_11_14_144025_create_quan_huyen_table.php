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
        Schema::create('quan_huyen', function (Blueprint $table) {
            $table->id('idQuanHuyen');
            $table->unsignedBigInteger('idTinhThanh');
            $table->string('tenQuanHuyen');
            $table->foreign('idTinhThanh')->references('idTinhThanh')->on('tinh_thanh');
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
        Schema::dropIfExists('quan_huyen');
    }
};
