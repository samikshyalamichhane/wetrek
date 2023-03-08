<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_packages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('package_id')->index()->nullable();
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('set null');
            $table->unsignedInteger('travelstyle_id')->index()->nullable();
            $table->foreign('travelstyle_id')->references('id')->on('travelstyles')->onDelete('set null');
            // $table->unsignedBigInteger('travelstyle_id')->nullable();
            // $table->foreign('travelstyle_id')->references('id')->on('travelstyles')->onDelete('cascade');
            // $table->unsignedBigInteger('package_id')->nullable();
            // $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
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
        Schema::dropIfExists('travel_packages');
    }
}
