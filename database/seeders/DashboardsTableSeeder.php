<?php

namespace database\seeders;

use Illuminate\Database\Seeder;
use App\Models\Dashboard;

class DashboardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dashboard::truncate();
        $dashboard = [
          'site_name' => 'We Trek Nepal',
          'meta_title' => 'We Trek Nepal',
          'meta_description' => 'We Trek Nepal',
          'keyword' => 'We Trek Nepal',
        ];
        Dashboard::create($dashboard);
    }
}
