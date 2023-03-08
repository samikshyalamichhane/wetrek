<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDashboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dashboards', function (Blueprint $table) {
            $table->increments('id');

              $table->string('site_name')->nullable();
              $table->text('tripadvisor__link')->nullable();
              $table->string('tripadvisor__image')->nullable();
              $table->text('description')->nullable();
              $table->string('favicon')->nullable();
              $table->string('logo')->nullable();
              $table->string('contactus_image')->nullable();
              $table->text('googlemap')->nullable();
              $table->string('post_box')->nullable();
              $table->string('page_title')->nullable();
              $table->string('meta_title')->nullable();
              $table->text('meta_description')->nullable();
              $table->text('keyword')->nullable();
              $table->string('email')->nullable();
              $table->string('telephone')->nullable();
              $table->string('mobile')->nullable();
              $table->string('address')->nullable();


              // $table->string('twitter')->nullable();
              $table->string('youtube')->nullable();
              $table->string('facebook')->nullable();
              $table->string('twitter')->nullable();
              $table->string('linkedin')->nullable();
              $table->string('pinterest')->nullable();

                //homepage
              $table->string('featured_trips_image')->nullable();
              $table->string('slogan_imagefirst')->nullable();
              $table->string('slogan_imagesecond')->nullable();
              $table->string('sloganfirst')->nullable();
              $table->longText('sfdescription')->nullable();
              $table->string('slogansecond')->nullable();
              $table->longText('ssdescription')->nullable();


              $table->string('working_times')->nullable();
              $table->string('team_banner_image')->nullable();
              $table->string('testimonial_banner_image')->nullable();
              $table->string('latest_video_backgroundimage')->nullable();
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
        Schema::dropIfExists('dashboards');
    }
}
