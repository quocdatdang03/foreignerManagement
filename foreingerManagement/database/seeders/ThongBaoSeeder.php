<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThongBaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('thong_baos')->insert([
            [
                'idNguoiDung' => 1,
                'idCoSo' => 1,
                'tieuDe' => 'Thông báo 1',
                'noiDung' => 'Nội dung thông báo 1',
            ],
            [
                'idNguoiDung' => 2,
                'idCoSo' => 2,
                'tieuDe' => 'Thông báo 2',
                'noiDung' => 'Nội dung thông báo 2',
            ],
        ]);
    }
}