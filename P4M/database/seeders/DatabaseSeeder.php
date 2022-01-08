<?php

namespace Database\Seeders;

use App\Models\Model\HakAkses;
use App\Models\Model\Kategori;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            "name" => "admin",
            "username" => "administrator",
            "email" => "admin@gmail.com",
            "password" => bcrypt("password"),
            "hak_akses_id" => 1
        ]);

        User::create([
           "name" => "user",
           "username" => "user",
           "email" => "user@gmail.com",
           "password" => bcrypt("password"),
           "hak_akses_id" => 2
        ]);

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

        Kategori::create([
            "nama" => "Web Data",
            "slug" => "web-data"
        ]);

        Kategori::create([
            "nama" => "Web 123",
            "slug" => "web-123"
        ]);

        HakAkses::create([
            "nama_hak_akses" => "Administrator"
        ]);

        HakAkses::create([
            "nama_hak_akses" => "Super Admin"
        ]);

        $this->call(JabatanSeeder::class);
        $this->call(PegawaiSeeder::class);
        $this->call(AgamaSeeder::class);
        $this->call(PekerjaanSeeder::class);
        $this->call(WargaNegaraSeeder::class);
        $this->call(VisiMisiSeeder::class);

        $this->call(AlamatSeeder::class);
        $this->call(GeografisSeeder::class);
        $this->call(WilayahGeografisSeeder::class);

        $this->call(PendudukAsuransiSeeder::class);
        $this->call(PendudukSexSeeder::class);
        $this->call(PendudukUmurSeeder::class);
        $this->call(PendudukPendidikanSeeder::class);
        $this->call(PendudukPendidikanKKSeeder::class);
        $this->call(PendudukKawinSeeder::class);
        $this->call(PendudukHubunganSeeder::class);
        $this->call(PendudukStatusSeeder::class);

    }
}
