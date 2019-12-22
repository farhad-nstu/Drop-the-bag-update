<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('start_date_time')->nullable();
            $table->string('end_date_time')->nullable();
            $table->integer('bag')->nullable();
            $table->integer('price')->nullable();

            $table->bigInteger('loc_id')->unsigned();
            $table->foreign('loc_id')->references('id')->on('locations')->onDelete('cascade');

            $table->integer('user_id')->nullable();
          

            $table->string('trx_id')->nullable();
            $table->string('start_timestamp')->nullable();
            $table->string('end_timestamp')->nullable();
            $table->string('random_code')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
