<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => fake()->unique()->randomNumber(),
            'description' => fake()->sentence,
            'priority' => fake()->randomElement(['low', 'medium', 'high']),
            'reported_by_phone' => fake()->phoneNumber,
            'contact_phone' => fake()->phoneNumber,
            'reported_model_type' => fake()->word,
            'reported_model_id' => null,
            'created_by' => User::all()->random()->first(),
            'closed_by' => User::all()->random()->first(),
            'closed_at' => fake()->dateTime,
            'canceled_by' => User::all()->random()->first(),
            'canceled_at' => fake()->dateTime,
            'created_at' => fake()->dateTime,
            'updated_at' => fake()->dateTime,
        ];
    }
}
