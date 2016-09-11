<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableTelefone extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao',50);
            $table->string('codpais',8);
            $table->integer('ddd');
            $table->integer('prefixo');
            $table->integer('sufixo');
            $table->timestamps();
            $table->unsignedInteger('pessoa_id');
            $table->foreign('pessoa_id')->references('id')->on('pessoas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('telefones');
    }
}
