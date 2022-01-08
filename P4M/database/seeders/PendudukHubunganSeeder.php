<?php

namespace Database\Seeders;

use App\Models\Model\PendudukHubungan;
use Illuminate\Database\Seeder;

class PendudukHubunganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PendudukHubungan::create([
            "nama" => "KEPALA KELUARGA"
        ]);

        PendudukHubungan::create([
            "nama" => "SUAMI"
        ]);

        PendudukHubungan::create([
            "nama" => "ISTRI"
        ]);

        PendudukHubungan::create([
            "nama" => "ANAK"
        ]);
    }
}
