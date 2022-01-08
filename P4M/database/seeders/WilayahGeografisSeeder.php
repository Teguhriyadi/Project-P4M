<?php

namespace Database\Seeders;

use App\Models\Model\WilayahGeografis;
use Illuminate\Database\Seeder;

class WilayahGeografisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WilayahGeografis::create([
            'geografis_id' => 1,
            'batas' => 'Sebelah Utara',
            'desa' => 'Panyingkiran Kidul',
            'kecamatan' => 'Cantigi'
        ]);

        WilayahGeografis::create([
            'geografis_id' => 1,
            'batas' => 'Sebelah Selatan',
            'desa' => 'Arahan Kidul',
            'kecamatan' => 'Arahan'
        ]);

        WilayahGeografis::create([
            'geografis_id' => 1,
            'batas' => 'Sebelah Timur',
            'desa' => 'Rambatan Kulon',
            'kecamatan' => 'Lohbener'
        ]);

        WilayahGeografis::create([
            'geografis_id' => 1,
            'batas' => 'Sebelah Barat',
            'desa' => 'Linggajati',
            'kecamatan' => 'Arahan'
        ]);
    }
}
