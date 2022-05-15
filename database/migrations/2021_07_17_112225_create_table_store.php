<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableStore extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { //cria as tabelas e os relacionamentos, respeitar o tipos de dados
        Schema::create('stores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id'); //relação com a tabela de usuário

            $table->string('name'); //nome da Loja
            $table->string('description'); // descrição
            $table->string('phone');
            $table->string('mobile_phone');
            $table->string('slug'); //url amigavel

            $table->timestamps();
            //definindo a chave estrangeira
            $table->foreign('user_id')->references('id')->on('users'); // coluna user_id = id tabela user
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
}
