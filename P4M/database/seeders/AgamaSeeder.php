<?php

namespace Database\Seeders;

use App\Models\Model\PendudukAgama;
use Illuminate\Database\Seeder;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PendudukAgama::create([
            "nama" => "ISLAM"
        ]);

        PendudukAgama::create([
            "nama" => "KRISTEN"
        ]);

        PendudukAgama::create([
            "nama" => "HINDU"
        ]);

        PendudukAgama::create([
            "nama" => "BUDDHA"
        ]);

        PendudukAgama::create([
            "nama" => "KONGHUCU"
        ]);

        PendudukAgama::create([
            "nama" => "Dan Lain - Lain"
        ]);

    }
}
