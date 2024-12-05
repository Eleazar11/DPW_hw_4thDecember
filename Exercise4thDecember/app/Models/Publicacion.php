<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Publicacion extends Model
{
    use HasFactory;

    // Nombre personalizado de la tabla
    protected $table = 'publicaciones';

    public function comentarios()
{
    return $this->hasMany(Comentario::class, 'publicacion_id');
}

public function usuario()
{
    return $this->belongsTo(Usuario::class, 'user_name', 'user_name');
}

}
