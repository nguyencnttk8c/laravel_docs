<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_meta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doc_id');
            $table->integer('num_viewed');
            $table->integer('num_downloaded');
            $table->timestamp('date_sold');
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
        Schema::drop('doc_meta');
    }
}
