<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'title' => 'Nepal Treks',
            'slug' => 'nepal-trek',
            'published' => 1,
        ]);

        Category::create([
            'title' => 'Nepal Tours',
            'slug' => 'nepal-tour',
            'published' => 1,
        ]);

        Category::create([
            'title' => 'Peak Climbing',
            'slug' => 'peak-climbing',
            'published' => 1,
        ]);

        Category::create([
            'title' => 'One Day Trip',
            'slug' => 'one-day-trip',
            'published' => 1,
        ]);
    }
}
