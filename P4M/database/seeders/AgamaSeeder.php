<?php

namespace Database\Seeders;

use App\Models\Model\Agama;
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
        Agama::create([
            "nama" => "ISLAM"
        ]);

        Agama::create([
            "nama" => "KRISTEN"
        ]);

        Agama::create([
            "nama" => "HINDU"
        ]);

        Agama::create([
            "nama" => "BUDDHA"
        ]);

        Agama::create([
            "nama" => "KONGHUCU"
        ]);

        Agama::create([
            "nama" => "Dan Lain - Lain"
        ]);

    }
}
