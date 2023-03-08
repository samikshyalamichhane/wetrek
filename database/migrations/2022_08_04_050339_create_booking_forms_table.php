<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('package_id')->nullable();
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('SET NULL');
            $table->unsignedInteger('costanddate_id')->nullable();
            $table->foreign('costanddate_id')->references('id')->on('costand_dates')->onDelete('cascade');
            $table->string('no_of_traveller')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('dob')->nullable();
            $table->string('country')->nullable();
            $table->string('email')->nullable();
            $table->string('name_title')->nullable();
            $table->string('passport_no')->nullable();
            $table->string('contact')->nullable();
            $table->string('from_date')->nullable();
            $table->string('to_date')->nullable();
            $table->string('how_found')->nullable();
            $table->string('emer_title')->nullable();
            $table->string('emer_name')->nullable();
            $table->string('emer_relation')->nullable();
            $table->string('emer_contact')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('amount')->nullable();
            $table->string('currency')->nullable();
            $table->string('booking_id')->uniqid();
            $table->text('travellers_info')->nullable();
            $table->text('spec_req')->nullable();
            $table->boolean('terms_and_conditions')->default(1);
            $table->enum('payment_type', ['cod', 'hbl'])->default('cod');
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
        Schema::dropIfExists('booking_forms');
    }
}
