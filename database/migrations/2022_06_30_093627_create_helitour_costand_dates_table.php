<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHelitourCostandDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('helitour_costand_dates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('helitourpackage_id')->nullable();
            $table->foreign('helitourpackage_id')->references('id')->on('helitour_packages')->onDelete('cascade');

            $table->string('cad_day')->nullable();
            $table->string('cad_date_from')->nullable();
            $table->string('cad_date_to')->nullable();
            $table->string('cad_price')->nullable();
            $table->string('cad_discount_price')->nullable();
            $table->string('cad_trip_status')->nullable();
            $table->tinyInteger('upcoming_treks')->nullable();
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
        Schema::dropIfExists('helitour_costand_dates');
    }
}
