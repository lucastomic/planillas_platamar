<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsumosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insumos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('lote')->nullable();
            $table->bigInteger('nro_remito')->nullable();
            $table->string('origen')->nullable();
            $table->date('fecha');
            $table->decimal('bachazas')->nullable();
            $table->decimal('temperatura')->nullable();
            $table->decimal('pesada_camion')->nullable();
            $table->decimal('peso_neto')->nullable();
            $table->bigInteger('total_cajones')->nullable();
            $table->bigInteger('cajon')->nullable();
            $table->bigInteger('piezasx2kg')->nullable();
            $table->bigInteger('histamina')->nullable();
            $table->decimal('peso_bruto')->nullable();
            $table->string('observaciones')->nullable();
            $table->string('seccion')->nullable();
            $table->string('producto')->nullable();
            $table->string('insumo')->nullable();
            $table->bigInteger('cantidad')->nullable();
            $table->decimal('cantidadPorBulto')->nullable();
            $table->decimal('total')->nullable();
            $table->string('table')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insumos');
    }
}
