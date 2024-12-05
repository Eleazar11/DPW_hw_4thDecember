<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    
    public function registrar_usuario_db(Request $request)
    {
        // Validamos los datos recibidos del formulario
        $validated = $request->validate([
            'user_name' => 'required|unique:usuarios,user_name|max:255',
            'contrasena' => 'required|string', 
            'edad' => 'required|integer|min:18',
            'genero' => 'required|in:Masculino,Femenino',
            'departamento_nacimiento' => 'required|string|max:255',
            'rol' => 'required|in:Administrador,User',
        ]);

        // Creamos un nuevo objeto Usuario
        $usuario = new Usuario;
        $usuario->user_name = $request->user_name;
        $usuario->contrasena = $request->contrasena; 
        $usuario->edad = $request->edad;
        $usuario->genero = $request->genero;
        $usuario->departamento_nacimiento = $request->departamento_nacimiento;
        $usuario->rol = $request->rol;

        // Guardamos el usuario en la base de datos
        $usuario->save();

        // Redirigimos con un mensaje de éxito
        return redirect()->back()->with('success', 'Usuario registrado correctamente.');
    }

}
