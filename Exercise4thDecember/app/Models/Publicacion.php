<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    use HasFactory;

    // Nombre personalizado de la tabla
    protected $table = 'publicaciones';
}
