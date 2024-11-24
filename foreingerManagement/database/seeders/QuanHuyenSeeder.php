<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuanHuyenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('quan_huyens')->insert([
            ['idTinhThanh' => 1, 'tenQuanHuyen' => 'Hải Châu'],
            ['idTinhThanh' => 1, 'tenQuanHuyen' => 'Cẩm Lệ'],
            ['idTinhThanh' => 2, 'tenQuanHuyen' => 'Hoàn Kiếm'],
        ]);
    }
}