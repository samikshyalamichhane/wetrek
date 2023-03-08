<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('package_id')->nullable();
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');

            $table->unsignedInteger('costanddate_id')->nullable();
            $table->foreign('costanddate_id')->references('id')->on('costand_dates')->onDelete('cascade');

            $table->string('type')->nullable();
            $table->string('departure_date')->nullable();
            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->string('country')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('emergency_contact_number')->nullable();
            $table->string('flight_arrival_date')->nullable();
            $table->string('flight_departure_date')->nullable();
            $table->string('information')->nullable();
            $table->string('number_of_person')->nullable();
            $table->string('package_price_per_person')->nullable();
            $table->string('total_price')->nullable();
            $table->tinyInteger('agree_terms_condition')->default(0);
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
        Schema::dropIfExists('bookings');
    }
}
