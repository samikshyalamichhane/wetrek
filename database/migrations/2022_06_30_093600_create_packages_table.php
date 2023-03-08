<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('package_name')->nullable();

            $table->unsignedInteger('destinationtype_id');
            $table->foreign('destinationtype_id')->references('id')->on('destinationtypes')->onDelete('cascade');

            $table->unsignedInteger('destination_id');
            $table->foreign('destination_id')->references('id')->on('destinations')->onDelete('cascade');

            $table->unsignedBigInteger('category_id');
           $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->unsignedInteger('region_id')->nullable();
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');

            $table->unsignedInteger('activity_id');
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');

            $table->string('slug')->nullable();
            $table->text('accommodation')->nullable();
            $table->text('distance')->nullable();
            $table->string('start_point')->nullable();
            $table->string('end_point')->nullable();
            $table->string('days_and_nights')->nullable();
            $table->string('max_altitude')->nullable();
            $table->text('meals_include')->nullable();
            $table->string('group_size')->nullable();
            $table->string('nature_of_trek')->nullable();
            $table->string('best_season')->nullable();
            $table->string('altitude')->nullable();
            $table->string('activities')->nullable();
            $table->string('trip_code')->nullable();
            $table->string('price')->nullable();
            $table->string('discount_price')->nullable();
            $table->string('activity_per_day')->nullable();
            $table->text('transportation')->nullable();
            $table->string('grade')->nullable();
            $table->string('star')->nullable();
            $table->string('image')->nullable();
            $table->string('package_pdf')->nullable();
            $table->text('description')->nullable();

            //SEO
            $table->string('page_title')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('keyword')->nullable();

            //Trip Highlight
            $table->text('trip_highlights_title')->nullable();
            $table->longText('trip_highlights_description')->nullable();

            //Perks
            $table->text('perks_title')->nullable();
            $table->longText('perks_description')->nullable();

            //Overview
            $table->text('overview_title')->nullable();
            $table->longText('overview_description')->nullable();
            $table->text('overview_highlights')->nullable();

            //Photo/Video
            $table->text('photo_video_title')->nullable();
            $table->text('youtube_video_link')->nullable();

            //Includes
            $table->text('includes_title')->nullable();
            $table->longText('includes_description')->nullable();

            //Excludes
            $table->text('excludes_title')->nullable();
            $table->longText('excludes_description')->nullable();

            //Maps
            $table->text('map_title')->nullable();
            $table->longText('map_image')->nullable();

           //Trip Info
           $table->text('trip_info_title')->nullable();
           $table->longText('trip_info_description')->nullable();
           $table->longText('trip_info_special_notes')->nullable();

            $table->tinyInteger('published')->nullable();
            $table->tinyInteger('best_sells')->nullable();
            $table->tinyInteger('popular_package')->nullable();
            $table->tinyInteger('luxury_package')->nullable();
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
        Schema::dropIfExists('packages');
    }
}
