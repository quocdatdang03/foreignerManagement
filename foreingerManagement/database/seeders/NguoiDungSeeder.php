<?php

namespace Database\Seeders;

use App\Models\NguoiDung;
use App\Models\VaiTro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'soCCCD' => '123456789012',
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
                'soCCCD' => '432109876543',
                'trangThai' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idVaiTro' => 1, // user
                'email' => 'manhdao1006@gmail.com',
                'matKhau' => Hash::make('matkhau123'),
                'hoVaTen' => 'Đào Đức Mạnh',
                'sdt' => '0779569834',
                'soCCCD' => '438909876543',
                'trangThai' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idVaiTro' => 1, // user
                'email' => 'dat03122003@gmail.com',
                'matKhau' => Hash::make('password456'),
                'hoVaTen' => 'Another User',
                'sdt' => '0911223344',
                'soCCCD' => '567890123456',
                'trangThai' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
