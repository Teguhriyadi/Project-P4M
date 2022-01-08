<?php

namespace Database\Seeders;

use App\Models\Model\Peristiwa;
use Illuminate\Database\Seeder;

class PeristiwaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Peristiwa::create([
            "nama" => "Lahir"
        ]);

        Peristiwa::create([
            "nama" => "Mati"
        ]);

        Peristiwa::create([
            "nama" => "Pindah Keluar"
        ]);

        Peristiwa::create([
            "nama" => "Hilang"
        ]);

        Peristiwa::create([
            "nama" => "Pindah Masuk"
        ]);

        Peristiwa::create([
            "nama" => "Pergi"
        ]);
    }
}
