<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\models\Model\Rt;

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
                'rt' => $i
            ]);
        }

    }
}
