<?php

namespace Database\Seeders;

use App\Models\QuanHuyen;
use App\Models\TinhThanh;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuanHuyenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('quan_huyens')->truncate();
        //
        QuanHuyen::factory(50)->create([
            'idTinhThanh' => function () {
        return TinhThanh::inRandomOrder()->first()->idTinhThanh; // Chọn ngẫu nhiên một VaiTro đã có
    },
        ]);

    }
}
