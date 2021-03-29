<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCondominiums extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condominiums', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('endereco');
            $table->string('telefone');
            $table->bigInteger('user_sindico_id', false, true);
            $table->bigInteger('user_subsindico_id', false, true);
            $table->timestamps();

            $table->foreign('user_sindico_id')->references('id')->on('users');
            $table->foreign('user_subsindico_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('condominiums');
    }
}
