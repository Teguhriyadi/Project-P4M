<?php

namespace Database\Factories\Model;

use App\Models\Model\Artikel;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArtikelFactory extends Factory
{
    protected $model = Artikel::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kategori_id' => mt_rand(1, 3),
            'user_id' => 1,
            'judul' => $this->faker->sentence(6),
            'slug' => $this->faker->slug(),
            'image' => '../frontend/img/logo-desa.png',
            'body' => $this->faker->text(1000),
        ];
    }
}
