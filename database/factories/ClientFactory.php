<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => fake()->firstName,
            'lastname' => fake()->lastName,
            'passport_no' => fake()->unique()->numerify('##########'),
            'residence_country' => fake()->randomNumber(4),
            'residence_city' => fake()->randomNumber(4),
            'residence_type' => fake()->randomElement([1, 0]),
            'departure_country' => fake()->randomNumber(4),
            'departure_city' => fake()->randomNumber(4),
            'locale' => fake()->locale,
            'travel_agent_title' => fake()->company,
            'email' => fake()->unique()->safeEmail,
            'residence_country_cellular_number' => fake()->numerify('#####'),
            'whatsapp_number' => fake()->phoneNumber,
            'telegram_nickname' => fake()->userName,
            'saudi_cellular_number' => fake()->phoneNumber,
            'favorite_contact' => fake()->randomElement([
                'residence_country_cellular_number',
                'whatsapp_number',
                'telegram_nickname',
                'saudi_cellular_number'
            ]),
        ];
    }
}
