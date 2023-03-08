<?php

use Illuminate\Database\Seeder;
use App\Models\Piller;

class PillerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Piller::truncate();
        $piller = [
          ['name' => 'Experienced Team', 'slug' => 'experienced-team', 'published' => '1'],
          ['name' => 'Responsible Adventure', 'slug' => 'responsible-adventure', 'published' => '1'],
          ['name' => 'High Quality Services', 'slug' => 'high-quality-services', 'published' => '1'],
          ['name' => 'Flexibility', 'slug' => 'flexibility', 'published' => '1'],
        ];

        Piller::insert($piller);
    }
}
