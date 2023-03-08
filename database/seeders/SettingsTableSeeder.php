<?php
namespace database\seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::truncate();
        $setting = [
          'site_name' => 'We Trek Nepal',
          'meta_title' => 'We Trek Nepal',
          'meta_description' => 'We Trek Nepal',
          'keyword' => 'We Trek Nepal',
        ];
        Setting::create($setting);
    }
}
