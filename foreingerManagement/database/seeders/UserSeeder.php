<?php

namespace Database\Seeders;

use App\Models\NguoiDung;
use App\Models\VaiTro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 1, // admin
                'email' => 'admin@gmail.com',
                'password' => Hash::make('matkhau123'),
                'name' => 'Admin',
                'active_status' => 1,
                'avatar' => 'avatar.png',
                'dark_mode' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3, // user
                'email' => 'manhdao1006@gmail.com',
                'password' => Hash::make('matkhau123'),
                'name' => 'Đào Đức Mạnh',
                'active_status' => 1,
                'avatar' => 'avatar.png',
                'dark_mode' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
