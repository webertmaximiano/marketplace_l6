<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { //cria tabela de produtos
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('store_id'); //ID da Loja do Produto
            
            $table->string('name'); //nome
            $table->string('description'); //descrição
            $table->text('body'); // texto sobre o produto

            $table->decimal('price', 10, 2); // preço

            $table->string('slug'); //url

            $table->timestamps();
            //definindo a chave estrangeira
            $table->foreign('store_id')->references('id')->on('stores'); //relação produto por loja
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
