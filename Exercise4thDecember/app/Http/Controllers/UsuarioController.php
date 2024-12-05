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

    public function ver_usuarios_db()
    {
        $listarUsuarios = Usuario::all();
        return view('usuarios.verUsuarios', compact('listarUsuarios'));
    }

    //modificar
    public function actualizar_usuario(Request $request, $id)
    {
        // Buscar el usuario por ID
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return redirect()->back()->with('error', 'Usuario no encontrado.');
        }

        // Validar los datos
        $request->validate([
            'edad' => 'required|integer|min:1|max:150',
            'genero' => 'required|string|max:50',
            'departamento_nacimiento' => 'required|string|max:255',
            'rol' => 'required|string|max:50',
        ]);

        // Actualizar los campos
        $usuario->edad = $request->edad;
        $usuario->genero = $request->genero;
        $usuario->departamento_nacimiento = $request->departamento_nacimiento;
        $usuario->rol = $request->rol;

        // Guardar los cambios
        $usuario->save();

        return redirect()->back()->with('success', 'Usuario actualizado correctamente.');
    }

}
