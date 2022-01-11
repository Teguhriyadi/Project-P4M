<?php

namespace Database\Seeders;

use App\Models\Model\Alamat;
use Illuminate\Database\Seeder;

class AlamatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Alamat::create([
            'website' => 'http://127.0.0.1:8000/',
            'no_telepon' => '089',
            'alamat' => '<p>Arahan Lor, kec. Arahan, kab. indramayu, Jawa Barat, Indonesia</p>',
            'status' => 0
        ]);
    }
}
