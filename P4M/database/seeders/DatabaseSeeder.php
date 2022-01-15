<?php

namespace Database\Seeders;

use App\Models\Model\GolonganDarah;
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

        $this->call(UserSeeder::class);
        $this->call(KategoriSeeder::class);
        $this->call(HakAksesSeeder::class);
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
        $this->call(CacatSeeder::class);
        $this->call(RefPindahSeeder::class);
        $this->call(PeristiwaSeeder::class);
        $this->call(GolonganDarahSeeder::class);
        $this->call(DusunSeeder::class);
        $this->call(RtSeeder::class);
        $this->call(RwSeeder::class);
    }
}
