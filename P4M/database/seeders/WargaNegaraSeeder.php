<?php

namespace Database\Seeders;

use App\Models\Model\WargaNegara;
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
        WargaNegara::create([
            "nama" => "WNI"
        ]);

        WargaNegara::create([
            "nama" => "WNA"
        ]);
    }
}
