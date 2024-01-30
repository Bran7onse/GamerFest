<?php

namespace Database\Factories;

use App\Models\Validarindividuale;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ValidarindividualeFactory extends Factory
{
    protected $model = Validarindividuale::class;

    public function definition()
    {
        return [
			'id_inscripcion__inds' => $this->faker->name,
			'validarpago' => $this->faker->name,
        ];
    }
}
