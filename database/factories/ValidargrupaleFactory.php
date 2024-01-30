<?php

namespace Database\Factories;

use App\Models\Validargrupale;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ValidargrupaleFactory extends Factory
{
    protected $model = Validargrupale::class;

    public function definition()
    {
        return [
			'id_inscripcion__equs' => $this->faker->name,
			'validarpago' => $this->faker->name,
        ];
    }
}
