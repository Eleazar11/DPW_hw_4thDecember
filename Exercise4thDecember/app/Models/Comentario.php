<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comentario extends Model
{

public function publicacion() {
    return $this->belongsTo(Publicacion::class, 'publicacion_id');
}

}
