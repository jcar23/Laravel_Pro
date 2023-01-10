<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() // the only one to be updated
    {
        Schema::create('equipments', function (Blueprint $table) {
            //creating tables in db;
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('des');
            $table->string('url');
            $table->float('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipments');
    }
}
