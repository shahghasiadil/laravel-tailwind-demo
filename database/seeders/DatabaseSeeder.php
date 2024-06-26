<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ClientMessage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@complaints.com',
             'password'=> Hash::make('123456'),
        ]);
        $this->call(UserSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(UserDepartmentShiftSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(TicketSeeder::class);
        $this->call(ClientMessageSeeder::class);
    }
}
