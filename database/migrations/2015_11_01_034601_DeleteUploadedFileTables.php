<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteUploadedFileTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('users');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('uploaded_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->references('id')->on('products')->unsigned();
            $table->string('image_path');
            $table->timestamps();
        });
    }
}
