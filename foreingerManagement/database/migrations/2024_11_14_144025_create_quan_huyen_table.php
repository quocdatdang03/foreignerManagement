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
        Schema::create('QuanHuyen', function (Blueprint $table) {
            $table->id('idQuanHuyen');
            $table->unsignedBigInteger('idTinhThanh');
            $table->string('tenQuanHuyen');
            $table->foreign('idTinhThanh')->references('idTinhThanh')->on('TinhThanh');
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
        Schema::dropIfExists('QuanHuyen');
    }
};
