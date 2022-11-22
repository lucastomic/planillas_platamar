<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produccions', function (Blueprint $table) {
            $table->id();
            $table->string('lote');
            $table->string('nombre')->nullable();
            $table->date('fecha');
            $table->decimal('elemento1')->nullable();
            $table->decimal('elemento2')->nullable();
            $table->decimal('elemento3')->nullable();
            $table->decimal('elemento4')->nullable();
            $table->decimal('elemento5')->nullable();
            $table->decimal('trozos')->nullable();
            $table->decimal('suma')->nullable();
            $table->string('seccion');
            $table->string('producto')->nullable();
            $table->bigInteger('cuna')->nullable();
            $table->string('table');
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
        Schema::dropIfExists('produccions');
    }
}
