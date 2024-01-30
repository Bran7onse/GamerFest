<?php

namespace Database\Factories;

use App\Models\Individuale;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class IndividualeFactory extends Factory
{
    protected $model = Individuale::class;

    public function definition()
    {
        return [
			'nombre_ind' => $this->faker->name,
			'cedula_ind' => $this->faker->name,
			'telefono_ind' => $this->faker->name,
			'correo_ind' => $this->faker->name,
			'descripcion_ind' => $this->faker->name,
        ];
    }
}
