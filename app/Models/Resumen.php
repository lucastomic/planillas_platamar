<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resumen extends Model
{
    use HasFactory;

    protected $fillable = ["lote", "fecha", "cajones_descargados", "bachazas_descamadas",  "bachazas_sobrantes", "cajones_descabezados", "barriles_c", "barriles_c_ultimo", "barriles_d", "barriles_d_ultimo", "barriles_dp", "barriles_dp_ultimo", "barriles_pasta", "barriles_pasta_ultimo", "barriles_otros", "barriles_otros_ultimo", "table"];
}
