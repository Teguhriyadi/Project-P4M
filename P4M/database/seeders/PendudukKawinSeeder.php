<?php

namespace Database\Seeders;

use App\Models\Model\PendudukKawin;
use Illuminate\Database\Seeder;

class PendudukKawinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PendudukKawin::create([
            "nama" => "BELUM KAWIN"
        ]);

        PendudukKawin::create([
            "nama" => "KAWIN"
        ]);

        PendudukKawin::create([
            "nama" => "CERAI HIDUP"
        ]);

        PendudukKawin::create([
            "nama" => "CERAI MATI"
        ]);
    }
}
