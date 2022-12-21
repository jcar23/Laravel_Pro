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
    public function up() // é unico que a gente pode mexer
    {
        Schema::create('products', function (Blueprint $table) {
            //criação dos campos
            $table->id();
            $table->timestamps();
            $table->string('nome');
            $table->string('descr');
            $table->string('url');
            $table->float('preco');
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
