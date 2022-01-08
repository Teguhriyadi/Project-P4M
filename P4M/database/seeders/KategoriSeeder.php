<?php

namespace Database\Seeders;

use App\Models\Model\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::create([
            "nama" => "Web Programming",
            "slug" => "web-programming"
        ]);

        Kategori::create([
            "nama" => "Web Design",
            "slug" => "web-design"
        ]);

        Kategori::create([
            "nama" => "Programming",
            "slug" => "programming"
        ]);
    }
}
