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
     *
     * @return void
     */
    public function run()
    {
        CoSoLuuTru::factory(20)->create([

                'idNguoiDung' => function () {
            return NguoiDung::inRandomOrder()->first()->idNguoiDung; // Chọn ngẫu nhiên một VaiTro đã có
        },


                'idPhuongXa' => function () {
            return PhuongXa::inRandomOrder()->first()->idPhuongXa; // Chọn ngẫu nhiên một VaiTro đã có
        },

            'sdt' => function() {
                return \Faker\Factory::create()->numerify('0#########');  // Giới hạn số điện thoại 10 ký tự
            },
        ]);

    }
}
