<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNaturePackageFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nature_package_faqs', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('naturepackage_id')->nullable();
            $table->foreign('naturepackage_id')->references('id')->on('nature_packages')->onDelete('cascade');

            $table->string('questions')->nullable();
            $table->longText('answers')->nullable();
            $table->string('page_title')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('keyword')->nullable();
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
        Schema::dropIfExists('nature_package_faqs');
    }
}
