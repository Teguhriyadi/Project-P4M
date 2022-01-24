<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Model\Rt;

class RtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 11; $i++) {
            Rt::create([
                'id_rw' => mt_rand(1, 6),
                'rt' => $i,
            ]);
        }

    }
}
