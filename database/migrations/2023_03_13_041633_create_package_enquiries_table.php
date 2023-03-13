<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_enquiries', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('package_id')->index()->nullable();
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('set null');
            $table->string('name')->nullable();
            $table->string('nationality')->nullable();
            $table->string('phone')->nullable();
            $table->text('message1')->nullable();
            $table->string('email')->nullable();
            $table->string('how_found')->nullable();
            $table->string('ip_address')->nullable();
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
        Schema::dropIfExists('package_enquiries');
    }
}
