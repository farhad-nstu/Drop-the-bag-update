<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('location')->nullable();
            $table->string('gender')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_form')->nullable();
            $table->string('UID')->nullable();
            $table->string('address')->nullable();
            $table->integer('number_of_the_house')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('country')->nullable();
            $table->string('email')->nullable();
            $table->string('web')->nullable();
            $table->string('town')->nullable();
            $table->string('tel')->nullable();
            $table->double('lng')->nullable();
            $table->double('lat')->nullable();
            $table->string('place_id')->nullable();
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
        Schema::dropIfExists('locations');
    }
}
