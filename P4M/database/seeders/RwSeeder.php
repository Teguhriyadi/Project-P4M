<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Model\Rw;

class RwSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 7; $i++) { 
            Rw::create([
                'rw' => $i
            ]);
        }

    }
}
