<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stock_prices_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->double('bet_price' , 18 , 2)->unsigned();
            $table->string('bet_type' , 100);
            $table->string('status' , 100)->default('unknown yet'); // 1 for won, 2 for lost
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
        Schema::dropIfExists('bets');
    }
}
