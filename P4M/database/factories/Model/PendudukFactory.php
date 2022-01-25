<?php

namespace Database\Factories\Model;

use App\Models\Model\Cacat;
use App\Models\Model\Dusun;
use App\Models\Model\GolonganDarah;
use App\Models\Model\Penduduk;
use App\Models\Model\PendudukAgama;
use App\Models\Model\PendudukHubungan;
use App\Models\Model\PendudukPekerjaan;
use App\Models\Model\PendudukPendidikan;
use App\Models\Model\PendudukSex;
use App\Models\Model\PendudukWargaNegara;
use App\Models\Model\SakitMenahun;
use App\Models\Model\StatusDasar;
use Illuminate\Database\Eloquent\Factories\Factory;

class PendudukFactory extends Factory
{
    protected $model = Penduduk::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $sex = PendudukSex::all()->pluck('id')->toArray();
        $rt = PendudukSex::all()->pluck('id')->toArray();
        $rw = PendudukSex::all()->pluck('id')->toArray();
        $agama = PendudukAgama::all()->pluck('id')->toArray();
        $pekerjaan = PendudukPekerjaan::all()->pluck('id')->toArray();
        $pendidikan = PendudukPendidikan::all()->pluck('id')->toArray();
        $wn = PendudukWargaNegara::all()->pluck('id')->toArray();
        $gd = GolonganDarah::all()->pluck('id')->toArray();
        $dusun = Dusun::all()->pluck('id')->toArray();
        $cacat = Cacat::all()->pluck('id')->toArray();
        $sakit = SakitMenahun::all()->pluck('id')->toArray();
        $status = StatusDasar::all()->pluck('id')->toArray();
        $kk_level = PendudukHubungan::all()->pluck('id')->toArray();

        return [
            'nama' => $this->faker->name(['male', 'female']),
            'nik' => mt_rand(0000000000000000, 9999999999999999),
            'kk_sebelumnya' => mt_rand(0000000000000000, 9999999999999999),
            'kk_level' => $this->faker->randomElement($kk_level),
            'id_sex' => $this->faker->randomElement($sex),
            'tempat_lahir' => $this->faker->citySuffix(),
            'tgl_lahir' => $this->faker->date("Y-m-d"),
            'id_agama' => $this->faker->randomElement($agama),
            'id_pendidikan' => $this->faker->randomElement($pendidikan),
            'id_pendidikan_sedang' => $this->faker->randomElement($pendidikan),
            'id_pekerjaan' => $this->faker->randomElement($pekerjaan),
            'status_kawin' => mt_rand(1, 3),
            'id_warga_negara' => $this->faker->randomElement($wn),
            'nik_ayah' => mt_rand(0000000000000000, 9999999999999999),
            'nama_ayah' => $this->faker->name('male'),
            'nik_ibu' => mt_rand(0000000000000000, 9999999999999999),
            'nama_ibu' => $this->faker->name('female'),
            'telepon' => mt_rand(000000000000, 999999999999),
            'akta_lahir' => mt_rand(0000000000000000, 9999999999999999),
            'id_dusun' => $this->faker->randomElement($dusun),
            'id_rt' => $this->faker->randomElement($rt),
            'id_rw' => $this->faker->randomElement($rw),
            'berat_lahir' => mt_rand(10, 100),
            'panjang_lahir' => mt_rand(10, 300),
            'kelahiran_ke' => mt_rand(1, 3),
            'jumlah_saudara' => mt_rand(1, 3),
            'alamat_sebelumnya' => $this->faker->address(),
            'alamat_sekarang' => $this->faker->address(),
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
