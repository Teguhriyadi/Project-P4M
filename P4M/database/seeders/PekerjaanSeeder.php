<?php

namespace Database\Seeders;

use App\Models\Model\Pekerjaan;
use App\Models\Model\PendudukPekerjaan;
use Illuminate\Database\Seeder;

class PekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PendudukPekerjaan::create([
            "nama" => "Polisi"
        ]);

        PendudukPekerjaan::create([
            "nama" => "PNS"
        ]);

        PendudukPekerjaan::create([
            "nama" => "Guru"
        ]);

        PendudukPekerjaan::create([
            "nama" => "Belum Bekerja"
        ]);
    }
}
