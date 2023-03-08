<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdventurePackageGdpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adventure_package_gdps', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('adventurepackage_id')->nullable();
            $table->foreign('adventurepackage_id')->references('id')->on('adventure_packages')->onDelete('cascade');

            $table->string('no_of_persons')->nullable();
            $table->longText('price_per_person')->nullable();
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
        Schema::dropIfExists('adventure_package_gdps');
    }
}
