<?php

namespace Database\Seeders;

use App\Models\Model\PendudukWargaNegara;
use Illuminate\Database\Seeder;

class WargaNegaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PendudukWargaNegara::create([
            "nama" => "WNI"
        ]);

        PendudukWargaNegara::create([
            "nama" => "WNA"
        ]);
    }
}
