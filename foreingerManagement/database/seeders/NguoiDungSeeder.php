<?php

namespace Database\Seeders;

use App\Models\NguoiDung;
use App\Models\VaiTro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NguoiDungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        NguoiDung::factory(100)->create([
            'idVaiTro' => function () {
        return VaiTro::inRandomOrder()->first()->idVaiTro; // Chọn ngẫu nhiên một VaiTro đã có
    },
            'sdt' => function() {
                return \Faker\Factory::create()->numerify('0#########');  // Giới hạn số điện thoại 10 ký tự
            },
            'soCCCD' => function() {
                return \Faker\Factory::create()->numerify('##############');  // Giới hạn số điện thoại 10 ký tự
            },
        ]);

    }
}
