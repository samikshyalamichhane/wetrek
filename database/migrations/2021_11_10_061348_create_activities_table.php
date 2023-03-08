<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            // $table->integer('region_id')->nullable();

            // $table->unsignedInteger('region_id')->nullable();
            // $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
            $table->unsignedInteger('region_id');
           $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');

            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->boolean('published')->nullable();
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
        Schema::dropIfExists('activities');
    }
}
