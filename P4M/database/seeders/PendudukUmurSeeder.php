<?php

namespace Database\Seeders;

use App\Models\Model\PendudukUmur;
use Illuminate\Database\Seeder;

class PendudukUmurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PendudukUmur::create([
            "nama" => "BALITA",
            "dari" => 0,
            "sampai" => 5,
            "status" => 0
        ]);

        PendudukUmur::create([
            "nama" => "ANAK-ANAK",
            "dari" => 6,
            "sampai" => 17,
            "status" => 0
        ]);
    }
}
