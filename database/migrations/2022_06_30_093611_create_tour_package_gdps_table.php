<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourPackageGdpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_package_gdps', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tourpackage_id')->nullable();
            $table->foreign('tourpackage_id')->references('id')->on('tour_packages')->onDelete('cascade');
            $table->string('no_of_persons')->nullable();
            $table->longText('price_per_person')->nullable();
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
        Schema::dropIfExists('tour_package_gdps');
    }
}
