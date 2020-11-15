<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsIntoCourtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courts', function (Blueprint $table) {
            $table->text('photo')->after('name');
            $table->integer('price_per_hour')->after('photo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courts', function (Blueprint $table) {
            $table->dropColumn('photo');
            $table->dropColumn('price_per_hour');
        });
    }
}
