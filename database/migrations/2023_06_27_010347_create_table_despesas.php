<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDespesas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('despesas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('descricao');
            $table->text('data');
            $table->uuid('usuario_id');
            $table->text('valor');
            $table->foreign('usuario_id')->references('id')->on('usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('despesas');
    }
}
