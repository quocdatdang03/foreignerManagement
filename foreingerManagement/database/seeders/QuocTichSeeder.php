<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuocTichSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('quoc_tichs')->insert([
            [
                'tenQuocTich' => 'Hàn Quốc',
            ],
            [
                'tenQuocTich' => 'Nhật Bản',
            ],
            [
                'tenQuocTich' => 'Anh',
            ],
        ]);
    }
}
