<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NguoiDungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nguoi_dungs')->insert([
            [
                'idVaiTro' => 2, // admin
                'email' => 'admin@gmail.com',
                'matKhau' => Hash::make('matkhau123'),
                'hoVaTen' => 'Admin',
                'sdt' => '0123456789',
                'soCCCD' => '12345678901234',
                'trangThai' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idVaiTro' => 1, // user
                'email' => 'user@gmail.com',
                'matKhau' => Hash::make('matkhau123'),
                'hoVaTen' => 'User',
                'sdt' => '0987654321',
                'soCCCD' => '43210987654321',
                'trangThai' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}