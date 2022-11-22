<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produccion extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'lote', 'fecha', 'elemento1', 'elemento2', 'elemento3', 'elemento4', 'elemento5', 'suma', 'seccion', 'producto', 'cuna', 'trozos', 'table'];
    
}
