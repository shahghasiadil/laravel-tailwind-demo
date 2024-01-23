<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Client;
use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tickets = Ticket::factory(20)->create();

        $tickets->each(function ($ticket) {
            $ticket->clients()->attach(
                Client::all()->random(2),
                ['ticket_id' => $ticket->id]
            );
//            $ticket->categories()->create([
//                'category_id' => Category::all()->pluck('id')->random(),
//                'ticket_id' => $ticket->id
//                ]
//            );
        });
    }
}
