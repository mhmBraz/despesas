<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public.address', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('zip_code');
            $table->text('street');
            $table->text('number');
            $table->text('complement')->nullable();;
            $table->uuid('city_id');
            $table->uuid('state_id');
            $table->uuid('country_id');
            $table->foreign('city_id')->references('id')->on('city');
            $table->foreign('state_id')->references('id')->on('state');
            $table->foreign('country_id')->references('id')->on('country');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('public.address');
    }
}
