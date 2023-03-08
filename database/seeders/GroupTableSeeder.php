<?php

use Illuminate\Database\Seeder;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = [
         ['title' => 'Adventure',
          'slug' => 'adventure',
           'destinationtype_id' => null,
            'publish' => '1'],

         ['title' => 'Peak Climbing',
          'slug' => 'preak-climbing', 'destinationtype_id' => null, 'publish' => '1'],
        
       ];
       \App\Models\Group::insert($groups);
    }
}
