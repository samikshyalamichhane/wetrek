<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackageSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('package_id')->nullable();;
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');

            $table->string('sliderimages')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('package_sliders');
    }
}
