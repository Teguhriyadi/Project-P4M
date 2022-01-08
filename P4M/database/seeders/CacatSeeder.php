<?php

namespace Database\Seeders;

use App\Models\Model\Cacat;
use Illuminate\Database\Seeder;

class CacatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cacat::create([
            "nama" => "CACAT FISIK"
        ]);

        Cacat::create([
            "nama" => "CACAT NETRA/BUTA"
        ]);

        Cacat::create([
            "nama" => "CACAT RUNGU/WICARA"
        ]);

        Cacat::create([
            "nama" => "CACAT MENTAL/JIWA"
        ]);

        Cacat::create([
            "nama" => "CACAT FISIK DAN MENTAL"
        ]);

        Cacat::create([
            "nama" => "CACAT LAINNYA"
        ]);

        Cacat::create([
            "nama" => "TIDAK CACAT"
        ]);
    }
}
