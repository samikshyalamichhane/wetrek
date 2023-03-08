<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnDescriptionToWhywithusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('whywithuses', function (Blueprint $table) {
            $table->text('description')->nullable()->after('whywithus_description');
            $table->string('image1')->nullable()->after('description');
            $table->string('image2')->nullable()->after('image1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('whywithuses', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('image1');
            $table->dropColumn('image2');

        });
    }
}
