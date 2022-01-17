<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Model\Dusun;

class DusunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 7; $i++) { 
            Dusun::create([
                'dusun' => '0'.$i
            ]);
        }

    }
}
