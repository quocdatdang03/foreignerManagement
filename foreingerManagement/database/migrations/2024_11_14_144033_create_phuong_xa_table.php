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
        Schema::create('PhuongXa', function (Blueprint $table) {
            $table->id('idPhuongXa');
            $table->unsignedBigInteger('idQuanHuyen');
            $table->string('tenPhuongXa');
            $table->foreign('idQuanHuyen')->references('idQuanHuyen')->on('QuanHuyen');
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
        Schema::dropIfExists('PhuongXa');
    }
};
