<?php

namespace Database\Factories;

use App\Models\InscripcionInd;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class InscripcionIndFactory extends Factory
{
    protected $model = InscripcionInd::class;

    public function definition()
    {
        return [
			'id_ind' => $this->faker->name,
			'id_jue' => $this->faker->name,
			'precio_ins' => $this->faker->name,
			'pago_ins' => $this->faker->name,
        ];
    }
}
