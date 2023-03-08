<?php

namespace database\seeders;

use Illuminate\Database\Seeder;
use App\Models\Destination;

class DestinationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      // \DB::table('destinationtypes')->truncate();
      // \DB::statement('SET FOREIGN_KEY_CHECKS=1');

       $destinations = [
         ['country_name' => 'Nepal',
          'slug' => 'nepal',
          'heading_title' => 'This is heading title',
          'intro' => 'This is intro part',
          'description' => 'This is description part',
          'published' => '1'
        ],
       ];
       Destination::insert($destinations);
    }
}
