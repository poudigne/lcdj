<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddingColumnForAgeRangeAndPlayerNumber extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function($table)
        {
            $table->tinyInteger('min_player')->nullable()->unsigned();
            $table->tinyInteger('max_player')->nullable()->unsigned();
            $table->tinyInteger('min_age')->nullable()->unsigned();
            $table->tinyInteger('max_age')->nullable()->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function($table)
        {
            $table->dropColumn('min_player');
            $table->dropColumn('max_player');
            $table->dropColumn('min_age');
            $table->dropColumn('max_age');
        });
    }
}
