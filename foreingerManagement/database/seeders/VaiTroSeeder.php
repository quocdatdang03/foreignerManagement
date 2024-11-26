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
     *
     * @return void
     */
    public function run()
    {
        // DB::table('vai_tros')->truncate();
        //
        VaiTro::factory()->create(['tenVaiTro' => 'Admin']);
        VaiTro::factory()->create(['tenVaiTro' => 'User']);
        VaiTro::factory()->create(['tenVaiTro' => 'Manager']);
    }
}
