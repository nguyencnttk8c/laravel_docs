<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author');
            $table->string('slug');
            $table->string('title');
            $table->integer('price');
            $table->char('format',5);
            $table->string('thumbnail',50);
            $table->smallInteger('page_viewed');
            $table->string('link_file',50);
            $table->integer('tax_id');
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
        Schema::drop('document');
    }
}
