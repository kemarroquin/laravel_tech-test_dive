<?php

namespace Database\Factories\API;

use App\Models\API\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id' => Company::factory(),
            'firstname' => $this->faker->name(),
            'lastname' => $this->faker->lastname(),
            'email' => $this->faker->freeEmail(),
            'phone' => $this->faker->tollFreePhoneNumber(),
            'birthdate' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['Masculino', 'Femenino']),
            'city' => $this->faker->city(),
            'country' => $this->faker->country(),
            'address' => $this->faker->address()
        ];
    }
}
