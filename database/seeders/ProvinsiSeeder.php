<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ["Aceh", "Bali", "Banten", "Bengkulu", "Gorontalo", "Jakarta", "Jambi", "Jawa Barat", 
                "Jawa Tengah", "Jawa Timur", "Kalimantan Barat", "Kalimantan Selatan",
                "Kalimantan Tengah", "Kalimantan Timur", "Kalimantan Utara", "Kepulauan Bangka Belitung", 
                "Kepulauan Riau", "Lampung", "Maluku", "Maluku Utara", "Nusa Tenggara Barat", 
                "Nusa Tenggara Timur", "Papua", "Papua Barat", "Riau", "Sulawesi Barat", "Sulawesi Selatan", 
                "Sulawesi Tengah", "Sulawesi Tenggara", "Sulawesi Utara", "Sumatera Barat", "Sumatera Selatan",
                "Sumatera Utara", "Yogyakarya"   
                ];

        for ($i=0; $i < count($data); $i++) { 
            DB::table('provinsis')->insert([
                'name' => $data[$i],
                'status' => '0',
            ]);
        }
    }
}
