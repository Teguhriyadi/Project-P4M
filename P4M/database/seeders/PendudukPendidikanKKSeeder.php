<?php

namespace Database\Seeders;

use App\Models\Model\PendudukPendidikanKK;
use Illuminate\Database\Seeder;

class PendudukPendidikanKKSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PendudukPendidikanKK::create([
            "nama" => "TIDAK / BELUM SEKOLAH"
        ]);

        PendudukPendidikanKK::create([
            "nama" => "BELUM TAMAT SD / SEDERAJAT"
        ]);

        PendudukPendidikanKK::create([
            "nama" => "TAMAT SD / SEDERAJAT"
        ]);
    }
}
