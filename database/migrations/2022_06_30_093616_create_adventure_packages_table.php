<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdventurePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adventure_packages', function (Blueprint $table) {
            $table->increments('id');

            // $table->unsignedInteger('destination_id')->nullable();
            // $table->unsignedInteger('adventure_id')->nullable();
            // $table->string('activity_id')->nullable();

            $table->unsignedInteger('destination_id')->nullable();
            $table->foreign('destination_id')->references('id')->on('destinations')->onDelete('cascade');

            $table->unsignedInteger('adventure_id')->nullable();
            $table->foreign('adventure_id')->references('id')->on('adventures')->onDelete('cascade');

            $table->unsignedInteger('activity_id')->nullable();
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');


            $table->string('package_name')->nullable();
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
            $table->string('trip_code')->nullable();
            //left

            $table->string('price')->nullable();
            $table->string('discount_price')->nullable();

            $table->string('activity_per_day')->nullable();
            $table->text('transportation')->nullable();
            $table->string('grade')->nullable();
            $table->string('image')->nullable();
            $table->text('package_pdf')->nullable();
            $table->string('description')->nullable();

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


           $table->tinyInteger('trip_of_the_month')->nullable();
           $table->tinyInteger('popular_tours')->nullable();





           //FAQ's
        //    $table->text('faq_question')->nullable();
        //    $table->longText('faq_answer')->nullable();







           //Itinerary
        //    $table->string('itinerary_day')->nullable();
        //    $table->string('itinerary_title')->nullable();
        //    $table->text('itinerary_activity_details')->nullable();
        //    $table->text('itinerary_trek_distance')->nullable();
        //    $table->string('itinerary_flight_hour')->nullable();
        //    $table->string('itinerary_highest_altitude')->nullable();
        //    $table->string('itinerary_trek_duration')->nullable();
        //    $table->longText('itinerary_lodging')->nullable();
        //    $table->longText('itinerary_fooding')->nullable();

           //Equipment 57
        //    $table->string('equipment_title')->nullable();
        //    $table->text('equipment_description')->nullable();
        //    $table->longText('equipment_head')->nullable();
        //    $table->longText('equipment_face')->nullable();
        //    $table->longText('equipment_body')->nullable();

            //Cost and Date(cad)
            // $table->string('cad_days')->nullable();
            // $table->string('cad_date_from')->nullable();
            // $table->string('cad_date_to')->nullable();
            // $table->string('cad_price')->nullable();
            // $table->string('cad_discount_price')->nullable();
            // $table->string('cad_trip_status')->nullable();

            $table->tinyInteger('published')->nullable();
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
        Schema::dropIfExists('adventure_packages');
    }
}
