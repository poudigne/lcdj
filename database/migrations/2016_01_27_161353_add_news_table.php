<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('text');
            $table->timestamps();
        });

        Schema::create('categories_news', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->references('categories')->on('id')->unsigned();
            $table->integer('news_id')->references('news')->on('id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categories_news');
        Schema::drop('news');
    }
}
