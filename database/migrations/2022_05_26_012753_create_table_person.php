<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePerson extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public.person', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('name');
            $table->date('birth_date');
            $table->text('cnh', 11 )->nullable();;
            $table->text('cpf', 14);
            $table->text('email');
            $table->text('phone');
            $table->uuid('photo_id')->nullable();;
            $table->uuid('sex_id')->nullable();;
            $table->foreign('photo_id')->references('id')->on('photo');
            $table->foreign('sex_id')->references('id')->on('sex');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('public.person');
    }
}
