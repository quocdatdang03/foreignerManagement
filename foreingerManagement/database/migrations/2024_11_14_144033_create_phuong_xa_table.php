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
        Schema::create('phuong_xas', function (Blueprint $table) {
            $table->id('idPhuongXa');
            $table->unsignedBigInteger('idQuanHuyen');
            $table->string('tenPhuongXa');
            $table->foreign('idQuanHuyen')->references('idQuanHuyen')->on('quan_huyens');
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
        Schema::dropIfExists('phuong_xas');
    }
};
