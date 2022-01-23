<?php

namespace Database\Factories\Model;

use App\Models\Model\Penduduk;
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
        return [
            'nama' => $this->faker->name(['male', 'female']),
            'nik' => mt_rand(1000000000, 9999999999),
            'kk_sebelumnya' => mt_rand(1000000000, 9999999999),
            'kk_level' => mt_rand(1, 3),
            'id_sex' => mt_rand(1, 2),
            'tempat_lahir' => $this->faker->citySuffix(),
            'tgl_lahir' => $this->faker->date("Y-m-d"),
            'id_agama' => mt_rand(1, 6),
            'id_pendidikan' => mt_rand(1, 3),
            'id_pendidikan_sedang' => mt_rand(1, 3),
            'id_pekerjaan' => mt_rand(1, 3),
            'status_kawin' => mt_rand(1, 3),
            'id_warga_negara' => mt_rand(1, 2),
            'nik_ayah' => mt_rand(1000000000, 9999999999),
            'nama_ayah' => $this->faker->name('male'),
            'nik_ibu' => mt_rand(1000000000, 9999999999),
            'nama_ibu' => $this->faker->name('female'),
            'telepon' => mt_rand(1000000000, 9999999999),
            'akta_lahir' => mt_rand(1000000000, 9999999999),
            'id_dusun' => mt_rand(1, 3),
            'id_rt' => mt_rand(1, 3),
            'id_rw' => mt_rand(1, 3),
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
