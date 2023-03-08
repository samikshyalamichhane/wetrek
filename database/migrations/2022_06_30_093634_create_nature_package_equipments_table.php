<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNaturePackageEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nature_package_equipments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('naturepackage_id')->nullable();
            $table->foreign('naturepackage_id')->references('id')->on('nature_packages')->onDelete('cascade');

            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->longText('head')->nullable();
            $table->longText('face')->nullable();
            $table->longText('body')->nullable();
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
        Schema::dropIfExists('nature_package_equipments');
    }
}
