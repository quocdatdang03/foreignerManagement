<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('vai_tros', function (Blueprint $table) {
            $table->id('idVaiTro');
            $table->string('tenVaiTro')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vai_tros');
    }
};
