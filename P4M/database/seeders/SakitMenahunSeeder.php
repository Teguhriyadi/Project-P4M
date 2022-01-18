<?php

namespace Database\Seeders;

use App\Models\Model\SakitMenahun;
use Illuminate\Database\Seeder;

class SakitMenahunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SakitMenahun::create([
            "nama" => "JANTUNG"
        ]);

        SakitMenahun::create([
            "nama" => "PARU-PARU"
        ]);
    }
}
