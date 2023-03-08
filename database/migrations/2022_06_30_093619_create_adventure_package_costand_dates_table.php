<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdventurePackageCostandDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adventure_package_costand_dates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('adventurepackage_id')->nullable();
            $table->foreign('adventurepackage_id')->references('id')->on('adventure_packages')->onDelete('cascade');

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
        Schema::dropIfExists('adventure_package_costand_dates');
    }
}
