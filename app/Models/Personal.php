<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;
    protected $fillable=["nombre_completo", "orden", "dni", "categoria", "telefono", "domicilio", "fecha_nacimiento", "table"]; 
}
