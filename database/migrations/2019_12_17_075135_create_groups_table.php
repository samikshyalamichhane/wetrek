<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            // $table->integer('destinationtype_id')->nullable();

            $table->unsignedInteger('destinationtype_id')->nullable();
            $table->foreign('destinationtype_id')->references('id')->on('destinationtypes')->onDelete('cascade');

            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->boolean('publish')->nullable();
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
        Schema::dropIfExists('groups');
    }
}
