<?php

namespace Database\Seeders;

use App\Models\VaiTro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VaiTroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vai_tros')->insert([
            ['tenVaiTro' => 'user', 'created_at' => now(), 'updated_at' => now()],
            ['tenVaiTro' => 'admin', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
