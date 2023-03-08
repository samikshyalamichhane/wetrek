<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackageReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_reviews', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('package_id')->nullable();
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');

            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->string('country')->nullable();
            $table->string('title')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('image')->nullable();
            $table->string('overall_review')->nullable();
            $table->string('pre_trip_info')->nullable();
            $table->string('meal')->nullable();
            $table->string('guide')->nullable();
            $table->string('transportation')->nullable();
            $table->string('value_for_money')->nullable();
            $table->string('accommodation')->nullable();

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
        Schema::dropIfExists('package_reviews');
    }
}
