<?php

namespace Database\Seeders;

use App\Models\PhuongXa;
use App\Models\QuanHuyen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhuongXaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $phuongXaData = [
            'Hải Châu' => [
                'Phường Thạch Thang',
                'Phường Thanh Bình',
                'Phường Thuận Phước',
            ],
            'Thanh Khê' => [
                'Phường An Khê',
                'Phường Hòa Khê',
                'Phường Thanh Khê Đông',
            ],
            'Sơn Trà' => [
                'Phường An Hải Bắc',
                'Phường An Hải Đông',
                'Phường Phước Mỹ',
            ],
            'Ngũ Hành Sơn' => [
                'Phường Hòa Hải',
                'Phường Khuê Mỹ',
            ],
            'Liên Chiểu' => [
                'Phường Hòa Khánh Nam',
                'Phường Hòa Khánh Bắc',
                'Phường Hòa Minh',
            ],
            'Hòa Vang' => [
                'Xã Hòa Ninh',
                'Xã Hòa Liên',
                'Xã Hòa Sơn',
            ],
            'Cẩm Lệ' => [
                'Phường Hòa Thuận Tây',
                'Phường Hòa An',
                'Phường Khuê Trung',
            ],
            'Hoàng Sa' => [
                'Xã Hoàng Sa',
            ],
        ];

        foreach ($phuongXaData as $quanHuyen => $phuongXas) {
            $quanHuyenId = QuanHuyen::where('tenQuanHuyen', $quanHuyen)->first()->idQuanHuyen;

            foreach ($phuongXas as $phuongXa) {
                PhuongXa::create([
                    'idQuanHuyen' => $quanHuyenId,
                    'tenPhuongXa' => $phuongXa,
                ]);
            }
        }
    }
}
