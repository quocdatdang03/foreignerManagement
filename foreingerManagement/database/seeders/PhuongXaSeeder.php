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
     */
    public function run(): void
    {
        DB::table('phuong_xas')->insert([
            ['idQuanHuyen' => 1, 'tenPhuongXa' => 'Phước Ninh'],
            ['idQuanHuyen' => 1, 'tenPhuongXa' => 'Hòa Thuận Đông'],
            ['idQuanHuyen' => 2, 'tenPhuongXa' => 'Hòa Phát'],
        ]);
    }
}
