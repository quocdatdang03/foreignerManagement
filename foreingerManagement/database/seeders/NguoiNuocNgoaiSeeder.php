<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NguoiNuocNgoaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nguoi_nuoc_ngoais')->insert([
            [
                'hoTen' => 'John Doe',
                'ngaySinh' => '1985-01-15',
                'idQuocTich' => 2, // Mỹ
                'soPassport' => 'A1234567',
                'sdt' => '0911123121',
                'email' => 'john.doe@example.com',
            ],
            [
                'hoTen' => 'Akira Tanaka',
                'ngaySinh' => '1990-07-22',
                'idQuocTich' => 3, // Nhật Bản
                'soPassport' => 'B7654321',
                'sdt' => '091112122',
                'email' => 'akira.tanaka@example.jp',
            ],
        ]);
    }
}