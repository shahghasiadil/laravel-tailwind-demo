<?php

namespace Database\Seeders;

use App\Models\UserDepartmentShift;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserDepartmentShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserDepartmentShift::factory(10)->create();
    }
}
