<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_name')->nullable();
            // $table->text('description')->nullable();
            $table->string('logo_alt')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon_alt')->nullable();
            $table->string('favicon')->nullable();
            $table->text('googlemap')->nullable();

            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('keyword')->nullable();
            $table->text('canonical_url')->nullable();

            $table->string('australia_email_1')->nullable();
            $table->string('australia_email')->nullable();
            $table->string('australia_office_phone_1')->nullable();
            $table->string('australia_office_phone_2')->nullable();
            $table->string('australia_cell')->nullable();
            $table->string('australia_contact')->nullable();
            $table->string('australia_location')->nullable();
            $table->string('nepal_email')->nullable();
            $table->string('nepal_office_phone')->nullable();
            $table->string('nepal_office_phone')->nullable();
            $table->string('nepal_cell')->nullable();
            $table->string('nepal_location')->nullable();
               
            $table->text('team_description')->nullable();
            $table->text('destination_description')->nullable();
            $table->text('contactus_description')->nullable();
            $table->string('aboutus_side_image_home_alt')->nullable();
            $table->text('aboutus_side_image_home')->nullable();
            $table->text('aboutus_description_home')->nullable();
            $table->text('aboutus_subtitle_home')->nullable();


            //Who we are 
            $table->string('whoweare_banner_alt')->nullable();
            $table->string('whoweare_banner')->nullable();
            $table->text('title1')->nullable();
            $table->text('title2')->nullable();
            $table->string('sqt_image1_alt')->nullable();
            $table->text('sqt_image1')->nullable();
            $table->string('sqt_image2_alt')->nullable();
            $table->text('sqt_image2')->nullable();

            //Banner Section
            $table->string('team_banner_image_alt')->nullable();
            $table->string('team_banner_image')->nullable();
            $table->string('testimonial_banner_image_alt')->nullable();
            $table->string('testimonial_banner_image')->nullable();
            $table->string('contactus_banner_image_alt')->nullable();
            $table->string('contactus_banner_image')->nullable();
            $table->string('blog_banner_alt')->nullable();
            $table->string('blog_banner')->nullable();
            $table->string('contactus_image_alt')->nullable();
            $table->string('contactus_image')->nullable();

            //Social Media
            $table->string('youtube')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('pinterest')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
