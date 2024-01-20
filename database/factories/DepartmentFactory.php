<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $defaultContactOptions = ['phone', 'whatsapp', 'email', 'telegram'];

        return [
            'title' => fake()->words(2, true),
            'default_contact' => fake()->randomElement($defaultContactOptions),
            'phone' => fake()->phoneNumber,
            'whatsapp' => fake()->phoneNumber,
            'telegram' => fake()->phoneNumber,
            'email' => fake()->email,
        ];
    }
}
