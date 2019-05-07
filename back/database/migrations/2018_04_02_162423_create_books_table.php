<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('coverImg')->nullable();
            $table->string('title');
            $table->integer('author_id')->unsigned();

            $table->foreign('author_id')->references('id')->on('authors');
            
            $table->integer('pub_id')->unsigned()->nullable();
            $table->foreign('pub_id')->references('id')->on('publications');
            
            $table->integer('cat_id')->unsigned()->nullable();
            $table->foreign('cat_id')->references('id')->on('categories');
            
            $table->text('description')->nullable();

            $table->decimal('price');
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
        Schema::dropIfExists('books');
    }
}
