<?php

namespace Database\Seeders;

use App\Models\CoSoLuuTru;
use App\Models\NguoiDung;
use App\Models\PhuongXa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoSoLuuTruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('co_so_luu_trus')->insert([
            [
                'idNguoiDung' => 3,
                'tenCoSo' => 'Khách Sạn Mặt Trời',
                'diaChiCoSo' => '24 Trần Phú, Hải Châu, Đà Nẵng',
                'sdt' => '0123456789',
                'email' => 'manhdao1006@gmail.com',
                'loaiHinh' => 'Khách sạn',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idNguoiDung' => 3,
                'tenCoSo' => 'Resort Biển Xanh',
                'diaChiCoSo' => '55 Nguyễn Tất Thành, Hải Châu, Đà Nẵng',
                'sdt' => '0987654321',
                'email' => 'manhdao1006@gmail.com',
                'loaiHinh' => 'Resort',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idNguoiDung' => 3,
                'tenCoSo' => 'Nhà Nghỉ Hoa Hồng',
                'diaChiCoSo' => '99 Lê Duẩn, Hải Châu, Đà Nẵng',
                'sdt' => '0123459876',
                'email' => 'manhdao1006@gmail.com',
                'loaiHinh' => 'Nhà nghỉ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idNguoiDung' => 4,
                'tenCoSo' => 'Nhà Nghỉ Hoa Hòe',
                'diaChiCoSo' => '99 Lê Duẩn, Hải Châu, Đà Nẵng',
                'sdt' => '0123459875',
                'email' => 'dat03122003@gmail.com',
                'loaiHinh' => 'Nhà nghỉ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
