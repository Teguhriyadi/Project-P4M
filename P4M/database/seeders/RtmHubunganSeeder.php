<?php

namespace Database\Seeders;

use App\Models\Model\RtmHubungan;
use Illuminate\Database\Seeder;

class RtmHubunganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RtmHubungan::create([
            "nama" => "Kepala Rumah Tangga"
        ]);

        RtmHubungan::created([
            "nama" => "Anggota"
        ]);
    }
}
