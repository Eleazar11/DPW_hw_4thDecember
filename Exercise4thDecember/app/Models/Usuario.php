<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Database\Eloquent\Factories\HasFactory; // Importamos HasFactory

class Usuario extends Authenticatable // Cambiamos Eloquent a Authenticatable
{
    use HasFactory;

    //definimos los campos del modelo
    protected $fillable = [
        'user_name', 'contrasena', 'edad', 'genero', 'departamento_nacimiento', 'rol',
    ];


    protected $hidden = [
        'contrasena',
    ];

    public function publicaciones()
    {
        return $this->hasMany(Publicacion::class, 'user_name', 'user_name');
    }
    
    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'user_name', 'user_name');
    }



}