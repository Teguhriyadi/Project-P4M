<?php

namespace Database\Factories\Model;

use App\Models\Model\Galeri;
use Illuminate\Database\Eloquent\Factories\Factory;

class GaleriFactory extends Factory
{
    protected $table = Galeri::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'judul' => $this->faker->sentence(6),
            'image' => './frontend/img/logo-desa.png',
        ];
    }
}
