<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNaturePackageItinerariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nature_package_itineraries', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('naturepackage_id')->nullable();
            $table->foreign('naturepackage_id')->references('id')->on('nature_packages')->onDelete('cascade');

            $table->string('day_num')->nullable();
            $table->text('title')->nullable();
            $table->string('trek_distance')->nullable();
            $table->string('flight_hours')->nullable();
            $table->string('highest_altitude')->nullable();
            $table->string('trek_duration')->nullable();
            $table->longText('lodging')->nullable();
            $table->longText('fooding')->nullable();
            $table->longText('activity_details')->nullable();
            $table->tinyInteger('order_row')->nullable();
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
        Schema::dropIfExists('nature_package_itineraries');
    }
}
