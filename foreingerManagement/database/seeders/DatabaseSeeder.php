<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            TinhThanhSeeder::class,
            QuanHuyenSeeder::class,
            PhuongXaSeeder::class,
            VaiTroSeeder::class,
            NguoiDungSeeder::class,
            CoSoLuuTruSeeder::class,
            QuocTichSeeder::class,
            NguoiNuocNgoaiSeeder::class,
            GiayPhepSeeder::class,
            ThongBaoSeeder::class,
        ]);
    }
}
