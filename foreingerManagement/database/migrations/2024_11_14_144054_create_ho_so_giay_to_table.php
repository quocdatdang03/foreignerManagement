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
        Schema::create('HoSoGiayTo', function (Blueprint $table) {
            $table->id('idHoSoGiayTo');
            $table->unsignedBigInteger('idCoSo');
            $table->string('loaiGiayTo');
            $table->string('tepDinhKem_id');
            $table->text('tepDinhKem');
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
        Schema::dropIfExists('HoSoGiayTo');
    }
};
