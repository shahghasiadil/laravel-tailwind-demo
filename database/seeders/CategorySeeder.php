<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::factory(10)->create();

        $categories->each(function ($category) {
            $category->departments()->attach(
                Department::all()->random(2),
                ['category_id' => $category->id]
            );
        });
    }
}
