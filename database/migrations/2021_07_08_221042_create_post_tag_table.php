<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();

            // creo la colonna per la FK di posts
            $table->unsignedBigInteger('post_id');

            // creo la FK della colonna post_id
            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade');

            // creo la colonna per la FK di tags
            $table->unsignedBigInteger('tag_id');

            // creo la FK della colonna post_id
            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onDelete('cascade');


            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tag');
    }
}
