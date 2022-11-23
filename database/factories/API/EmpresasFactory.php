<?php

namespace Database\Factories\API;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmpresasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->company(),
            'email' => $this->faker->companyEmail(),
            'telefono' => $this->faker->tollFreePhoneNumber(),
            'ciudad' => $this->faker->city(),
            'pais' => $this->faker->country(),
            'direccion' => $this->faker->address()
        ];
    }
}
