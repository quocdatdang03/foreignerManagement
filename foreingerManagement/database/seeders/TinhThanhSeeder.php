<?php

namespace Database\Seeders;

use App\Models\TinhThanh;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TinhThanhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        TinhThanh::factory()->create();
    }
}
