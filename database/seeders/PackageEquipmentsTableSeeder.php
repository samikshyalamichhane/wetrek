<?php

use Illuminate\Database\Seeder;

class PackageEquipmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packageEquipments = [
            [
             'package_id' => null,
             'title' => 'Test',
             'description' => 'Test Description',
             'head' => 'Test Head',
             'face' => 'Test Face',
             'body' => 'Adventure',
            //  'published' => '1'
            ],

          ];
          \App\Models\PackageEquipment::insert($packageEquipments);
    }
}
