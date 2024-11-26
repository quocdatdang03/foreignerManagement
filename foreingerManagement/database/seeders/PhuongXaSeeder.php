<?php

namespace Database\Seeders;

use App\Models\PhuongXa;
use App\Models\QuanHuyen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhuongXaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('phuong_xas')->truncate();

        //
        PhuongXa::factory(100)->create([
            'idQuanHuyen' => function () {
        return QuanHuyen::inRandomOrder()->first()->idQuanHuyen; // Chọn ngẫu nhiên một VaiTro đã có
    },
        ]);

    }
}
