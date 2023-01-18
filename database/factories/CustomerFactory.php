<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'document' => $this->faker->numerify('###########'),
            'birthdate' => $this->faker->date('Y-m-d', '-18 years'),
            'phone' => $this->faker->numerify('###########'),
        ];
    }
}
