<?php

namespace Database\Factories\API;

use App\Models\API\Empresas;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsuariosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'empresas_id' => Empresas::factory(),
            'nombre' => $this->faker->name(),
            'apellido' => $this->faker->lastname(),
            'email' => $this->faker->freeEmail(),
            'telefono' => $this->faker->tollFreePhoneNumber(),
            'fecha_nacimiento' => $this->faker->date(),
            'genero' => $this->faker->randomElement(['Masculino', 'Femenino']),
            'ciudad' => $this->faker->city(),
            'pais' => $this->faker->country(),
            'direccion' => $this->faker->address()
        ];
    }
}
