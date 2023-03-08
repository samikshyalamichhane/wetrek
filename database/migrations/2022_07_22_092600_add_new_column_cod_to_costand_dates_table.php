<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColumnCodToCostandDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('costand_dates', function (Blueprint $table) {
            $table->string('start_date')->nullable()->after('category');
            $table->string('end_date')->nullable()->after('start_date');
            $table->string('status')->nullable()->after('end_date');
            $table->string('price')->nullable()->after('status');
            $table->string('book_now')->nullable()->after('price');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('costand_dates', function (Blueprint $table) {
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
            $table->dropColumn('status');
            $table->dropColumn('book_now');
            //
        });
    }
}
