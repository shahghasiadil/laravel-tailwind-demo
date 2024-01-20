<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\ClientMessage;
use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClientMessage::factory(15)->create();
    }
}
