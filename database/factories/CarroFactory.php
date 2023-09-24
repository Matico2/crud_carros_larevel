<?php
// database/factories/CarroFactory.php

namespace Database\Factories;

use App\Models\Carro;
use App\Models\Marca;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarroFactory extends Factory
{
    protected $model = Carro::class;

    public function definition()
    {
        return [
            'modelo' => $this->faker->word,
            'marca_id' => function () {
                return Marca::factory()->create()->id;
            },
            'placa' => $this->faker->regexify('[A-Z]{3}-[0-9]{4}'),
            'ano' => $this->faker->numberBetween(2000, 2023),
        ];
    }
}
