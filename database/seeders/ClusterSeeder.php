<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClusterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cluster')->insert([
            'name' => "Zona Hijau",
        ]);
        DB::table('cluster')->insert([
            'name' => "Zona Kuning",
        ]);
        DB::table('cluster')->insert([
            'name' => "Zona Merah",
        ]);
    }
}
