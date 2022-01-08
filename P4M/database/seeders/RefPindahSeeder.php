<?php

namespace Database\Seeders;

use App\Models\Model\RefPindah;
use Illuminate\Database\Seeder;

class RefPindahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RefPindah::create([
            "nama" => "Pindah Keluar Desa/Kelurahan"
        ]);

        RefPindah::create([
            "nama" => "Pindah Keluar Kecamatan"
        ]);

        RefPindah::create([
            "nama" => "Pindah Keluar Kabupaten/Kota"
        ]);

        RefPindah::create([
            "nama" => "Pindah Keluar Provisi"
        ]);
    }
}
