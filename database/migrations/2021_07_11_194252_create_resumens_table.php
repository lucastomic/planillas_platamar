<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resumens', function (Blueprint $table) {
            $table->id();
            $table->string('fecha');
            $table->string('lote');
            $table->bigInteger('cajones_descargados')->nullable();
            $table->decimal('bachazas_descamadas')->nullable();
            $table->decimal('bachazas_sobrantes')->nullable();
            $table->decimal('cajones_descabezados')->nullable();
            $table->decimal('barriles_c')->nullable();
            $table->bigInteger('barriles_c_ultimo')->nullable();
            $table->decimal('barriles_d')->nullable();
            $table->bigInteger('barriles_d_ultimo')->nullable();
            $table->decimal('barriles_dp')->nullable();
            $table->bigInteger('barriles_dp_ultimo')->nullable();
            $table->decimal('barriles_pasta')->nullable();
            $table->bigInteger('barriles_pasta_ultimo')->nullable();
            $table->decimal('barriles_otros')->nullable();
            $table->bigInteger('barriles_otros_ultimo')->nullable();
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
        Schema::dropIfExists('resumens');
    }
}
