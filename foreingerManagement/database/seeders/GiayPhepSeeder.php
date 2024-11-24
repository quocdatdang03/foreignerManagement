<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GiayPhepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('giay_pheps')->insert([
            [
                'idNguoiNuocNgoai' => 1, // John Doe
                'idCoSo' => 1,
                'diaChiTamTru' => '456 Trần Phú, Hải Châu, Đà Nẵng',
                'loaiGiayPhep' => 'Tạm trú',
                'ngayCap' => now(),
                'ngayDuKienRoiKhoi' => now()->addYear(),
                'ngayHetHan' => now()->addYear(),
                'ngayDen' => now()->addMonths(1),  // Cung cấp giá trị cho trường ngayDen
                'mucDichCapPhep' => 'Công tác',
                'lyDoDen' => 'Công tác',
                'trangThai' => 'Đang xử lý',
                'tepDinhKem' => 'giayphep_john_doe.jpg',
            ],
            [
                'idNguoiNuocNgoai' => 2, // Akira Tanaka
                'idCoSo' => 2,
                'diaChiTamTru' => '789 Võ Văn Kiệt, Sơn Trà, Đà Nẵng',
                'loaiGiayPhep' => 'Lao động',
                'ngayCap' => now(),
                'ngayDuKienRoiKhoi' => now()->addMonths(6),
                'ngayHetHan' => now()->addMonths(6),
                'ngayDen' => now()->addDays(10),  // Cung cấp giá trị cho trường ngayDen
                'mucDichCapPhep' => 'Làm việc',
                'lyDoDen' => 'Làm việc',
                'trangThai' => 'Đã phê duyệt',
                'tepDinhKem' => 'giayphep_akira_tanaka.jpg',
            ],
        ]);
    }
}