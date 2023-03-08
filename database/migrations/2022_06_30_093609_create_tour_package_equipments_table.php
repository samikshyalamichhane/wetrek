<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourPackageEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_package_equipments', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('tourpackage_id')->nullable();
            $table->foreign('tourpackage_id')->references('id')->on('tour_packages')->onDelete('cascade');

            // $table->unsignedBigInteger('destination_id');
            // $table->foreign('destination_id')->references('id')->on('destinations')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->longText('head')->nullable();
            $table->longText('face')->nullable();
            $table->longText('body')->nullable();
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
        Schema::dropIfExists('tour_package_equipments');
    }
}
