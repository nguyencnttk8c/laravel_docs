<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTradingHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trading_history', function (Blueprint $table) {
            $table->increments('id');
            $table->string('trading_code', 20);
            $table->char('trading_type', 15);
            $table->timestamp('trading_date');
            $table->char('trading_status', 10);
            $table->string('trading_name', 50);
            $table->integer('amount_money');
            $table->integer('order_id');
            $table->integer('owner_id');
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
        Schema::drop('trading_history');
    }
}
