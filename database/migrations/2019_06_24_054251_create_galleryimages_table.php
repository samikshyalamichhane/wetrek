<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryimagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleryimages', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('gallery_id')->nullable();
            $table->foreign('gallery_id')->references('id')->on('galleries')->onDelete('cascade');

            $table->string('image')->nullable();
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
        Schema::dropIfExists('galleryimages');
    }
}
