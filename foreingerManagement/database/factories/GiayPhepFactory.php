<?php

namespace Database\Factories;

use App\Models\CoSoLuuTru;
use App\Models\GiayPhep;
use App\Models\NguoiNuocNgoai;
use App\Models\PhuongXa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GiayPhep>
 */
class GiayPhepFactory extends Factory
{
    protected $model = GiayPhep::class;

    public function definition()
    {
        return [
            'idNguoiNuocNgoai' => NguoiNuocNgoai::inRandomOrder()->first()->idNguoiNuocNgoai,
            'idCoSo' => CoSoLuuTru::inRandomOrder()->first()->idCoSo,
            'loaiGiayPhep' => $this->faker->word,
            'diaChiTamTru' => $this->faker->address,
            'ngayCap' => $this->faker->date(),
            'ngayHetHan' => $this->faker->date(),
            'mucDichCapPhep' => $this->faker->sentence,
            'ngayDuKienRoiKhoi' => $this->faker->date(),
            'ngayRoiKhoi' => $this->faker->date(),
            'ngayDen' => $this->faker->date(),
            'lyDoDen' => $this->faker->sentence,
            'trangThai' => $this->faker->randomElement(['Đã phê duyệt', 'Đang chờ xử lý', 'Không duyệt']),
            'tepDinhKem' => $this->faker->word,
            'lyDoKhongXetDuyet' => $this->faker->sentence,
        ];
    }
}
