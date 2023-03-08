<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomizeTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customize_trips', function (Blueprint $table) {
            $table->increments('id');

            $table->string('package_name')->nullable();
            $table->text('accommodation_category')->nullable();
            $table->string('no_of_person')->nullable();
            $table->string('duration_of_stay')->nullable();
            $table->string('arrival_date')->nullable();
            $table->text('additional_requirement')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('country')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('type')->nullable();

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
        Schema::dropIfExists('customize_trips');
    }
}
