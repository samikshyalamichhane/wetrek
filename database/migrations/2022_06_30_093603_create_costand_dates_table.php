<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostandDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costand_dates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('package_id')->nullable();
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');


            $table->string('category')->nullable();
            $table->string('date')->nullable();
            $table->string('price1')->nullable();
            $table->string('price2')->nullable();
            $table->string('price3')->nullable();
            $table->string('price4')->nullable();

            // $table->string('cad_day')->nullable();
            // $table->string('cad_date_from')->nullable();
            // $table->string('cad_date_to')->nullable();
            // $table->string('cad_price')->nullable();
            // $table->string('cad_discount_price')->nullable();
            // $table->string('cad_trip_status')->nullable();
            // $table->tinyInteger('upcoming_treks')->nullable();

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
        Schema::dropIfExists('costand_dates');
    }
}
