<?php

namespace Database\Seeders;

use App\Models\Model\PendudukSex;
use Illuminate\Database\Seeder;

class PendudukSexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PendudukSex::create([
            "nama" => "LAKI-LAKI"
        ]);

        PendudukSex::create([
            "nama" => "PEREMPUAN"
        ]);
    }
}
