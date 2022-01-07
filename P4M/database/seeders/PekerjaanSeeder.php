<?php

namespace Database\Seeders;

use App\Models\Model\Pekerjaan;
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
        Pekerjaan::create([
            "nama" => "Polisi"
        ]);

        Pekerjaan::create([
            "nama" => "PNS"
        ]);

        Pekerjaan::create([
            "nama" => "Guru"
        ]);

        Pekerjaan::create([
            "nama" => "Belum Bekerja"
        ]);
    }
}
