<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWhywithusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whywithuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('whywithus_icon')->nullable();
            $table->string('whywithus_title')->nullable();
            $table->string('slug')->nullable();
            $table->longText('whywithus_description')->nullable();
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
        Schema::dropIfExists('whywithuses');
    }
}
