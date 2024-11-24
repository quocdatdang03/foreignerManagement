<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftDeletesToGiayPhepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('giay_pheps', function (Blueprint $table) {
            // Thêm cột softDeletes
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('giay_pheps', function (Blueprint $table) {
            // Xóa cột softDeletes
            $table->dropSoftDeletes();
        });
    }
}
