<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    use HasFactory;
    protected $fillable = ["lote", "origen", "fecha", "temperatura", "pesada_camion", "peso_neto", "total_cajones", "cajon", "piezasx2kg", "nro_remito", "peso_bruto", "observaciones", "seccion", "producto", "insumo", "cantidad", "cantidadPorBulto", "total", "table", "bachazas"];
}
