<?php

namespace Database\Seeders;

use App\Models\TinhThanh;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TinhThanhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tinh_thanhs')->insert([
            ['tenTinhThanh' => 'Đà Nẵng'],
            ['tenTinhThanh' => 'Hà Nội'],
            ['tenTinhThanh' => 'TP. Hồ Chí Minh'],
        ]);
    }
}
