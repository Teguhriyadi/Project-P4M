<?php

namespace Database\Factories\Model;

use App\Models\Model\Dusun;
use App\Models\model\Rw;
use Illuminate\Database\Eloquent\Factories\Factory;

class RwFactory extends Factory
{
    protected $table = Rw::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $dusun = Dusun::all()->pluck('id')->toArray();
        return [
            'id_dusun' => $this->faker->randomElement($dusun),
            'rw' => $this->faker->randomDigit,
        ];
    }
}
