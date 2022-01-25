<?php

namespace Database\Factories\Model;

use App\Models\model\Rt;
use App\Models\model\Rw;
use Illuminate\Database\Eloquent\Factories\Factory;

class RtFactory extends Factory
{
    protected $table = Rt::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $rw = Rw::all()->pluck('id')->toArray();
        return [
            'id_rw' => $this->faker->randomElement($rw),
            'rt' => $this->faker->randomDigit,
        ];
    }
}
