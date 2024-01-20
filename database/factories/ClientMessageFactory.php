<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClientMessage>
 */
class ClientMessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'client_id' => Client::all()->pluck('id')->random(),
            'ticket_id' => Ticket::all()->pluck('id')->random(),
            'subject' => fake()->sentence,
            'description' => fake()->paragraph,
        ];
    }
}
