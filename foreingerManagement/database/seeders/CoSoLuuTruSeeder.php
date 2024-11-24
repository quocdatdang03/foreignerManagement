<?php

namespace Database\Seeders;

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
                'idNguoiDung' => 2,
                'tenCoSo' => 'Khách Sạn Mặt Trời',
                'diaChiCoSo' => '24 Trần Phú, Hải Châu, Đà Nẵng',
                'sdt' => '0123456789',
                'email' => 'khachsanmatroi@example.com',
                'loaiHinh' => 'Khách sạn',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idNguoiDung' => 2,
                'tenCoSo' => 'Resort Biển Xanh',
                'diaChiCoSo' => '55 Nguyễn Tất Thành, Hải Châu, Đà Nẵng',
                'sdt' => '0987654321',
                'email' => 'resortbienxanh@example.com',
                'loaiHinh' => 'Resort',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idNguoiDung' => 2,
                'tenCoSo' => 'Nhà Nghỉ Hoa Hồng',
                'diaChiCoSo' => '99 Lê Duẩn, Hải Châu, Đà Nẵng',
                'sdt' => '0123459876',
                'email' => 'nhanghihoahong@example.com',
                'loaiHinh' => 'Nhà nghỉ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
