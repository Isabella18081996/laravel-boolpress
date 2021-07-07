<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {

            // primo passo: creo la colonna che diveterà FK
            $table->unsignedBigInteger('category_id')->nullable()->after('id');

            // secondo passo: setto la colonna creata come FK
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {

            // primo passo: elimino la FK
            $table->dropForeign(['category_id']);

            // secondo passo: elimino la colonna
            $table->dropColumn('category_id');
        });
    }
}
