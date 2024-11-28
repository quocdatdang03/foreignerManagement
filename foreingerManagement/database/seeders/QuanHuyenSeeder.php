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
     */
    public function run()
    {
        $daNangId = TinhThanh::where('tenTinhThanh', 'Đà Nẵng')->first()->idTinhThanh;

        $quanHuyens = [
            'Hải Châu',
            'Thanh Khê',
            'Sơn Trà',
            'Ngũ Hành Sơn',
            'Liên Chiểu',
            'Cẩm Lệ',
            'Hòa Vang',
            'Hoàng Sa',
        ];

        foreach ($quanHuyens as $quanHuyen) {
            QuanHuyen::create([
                'idTinhThanh' => $daNangId,
                'tenQuanHuyen' => $quanHuyen,
            ]);
        }
    }
}
