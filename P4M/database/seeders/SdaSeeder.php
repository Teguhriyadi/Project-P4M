<?php

namespace Database\Seeders;

use App\Models\Model\JenisSDA;
use Illuminate\Database\Seeder;

class SdaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisSDA::create([
            'jenis' => 'Tanah Carik Desa',
            'luas' => '3,95',
            'lokasi' => 'Blok Pakong'
        ]);

        JenisSDA::create([
            'jenis' => 'Lahan Pekarangan',
            'luas' => '71,6',
            'lokasi' => 'Rt.001/ s/d 030'
        ]);
    }
}
