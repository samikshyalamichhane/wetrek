<?php

namespace database\seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Page::truncate();
              $page = [
                [
                  'title' => 'Privacy Policy',
                  'slug' => 'privacy-policy',
                  'published' => '1'
                ],
                [
                  'title' => 'Travel Terms',
                  'slug' => 'travel-terms-bookings',
                  'published' => '1'
                ],
                [
                  'title' => 'Nepal Visa',
                  'slug' => 'nepal-visa',
                  'published' => '1'
                ],
                [
                  'title' => 'Accommodation',
                  'slug' => 'accommodations',
                  'published' => '1'
                ],
                [
                  'title' => 'Best Time to Travel',
                  'slug' => 'best-time-to-travel',
                  'published' => '1'
                ],
                [
                  'title' => 'Travel Safety Tips',
                  'slug' => 'travel-safety-tips',
                  'published' => '1'
                ],
                [
                  'title' => 'Packing List',
                  'slug' => 'packing-list',
                  'published' => '1'
                ],
                [
                  'title' => 'Altitude Sickness & Treatment',
                  'slug' => 'altitude-sickness-treatment',
                  'published' => '1'
                ],
                [
                  'title' => 'Travel Insurance',
                  'slug' => 'travel-insurance-and-vaccinations',
                  'published' => '1'
                ],
                [
                  'title' => 'Vaccination',
                  'slug' => 'vaccination',
                  'published' => '1'
                ],

                // ['title' => 'About Us', 'slug' => 'about-us', 'published' => '1'],
          ];
      Page::insert($page);

    }
}
