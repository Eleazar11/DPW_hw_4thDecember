<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use App\Models\Publicacion;
use App\Models\Comentario;

class LoginController extends Controller
{
    public function registrar_user_view() {
        return view('registro.registrarUser');
    }

    public function listado_usuarios_view() {
        $listarUsuarios = Usuario::all();
        return view('usuarios.verUsuarios', compact('listarUsuarios'));
    }
    
    public function modificar_usuarios_view() {
        $listarUsuarios = Usuario::all();
        return view('usuarios.modificarUsuarios', compact('listarUsuarios'));
    }

    public function eliminar_usuarios_view() {
        $usuarios = Usuario::all();
        return view('usuarios.eliminarUsuarios', compact('usuarios'));
    }


//para las publicaciones
public function registrar_publicaciones_view() {
    $listarUsuarios = Usuario::all();
    return view('publicaciones.registrar', compact('listarUsuarios'));
}

public function listado_publicaciones_view() {
    $publicaciones = Publicacion::all(); 
    return view('publicaciones.ver', compact('publicaciones'));
}

public function modificar_publicaciones_view() {
    $publicaciones = Publicacion::all(); 
    return view('publicaciones.modificar', compact('publicaciones'));
}

public function eliminar_publicaciones_view() {
    $publicaciones = Publicacion::all(); 
    return view('publicaciones.eliminar', compact('publicaciones'));
}

//para comentarios
public function registrar_comentarios_view() {
    $listarUsuarios = Usuario::all();
    $publicaciones = Publicacion::all();

    return view('comentarios.registrar', compact('listarUsuarios', 'publicaciones'));
}

public function listado_comentarios_view() {
    $comentarios = Comentario::all();
    return view('comentarios.ver', compact('comentarios'));
}

public function modificar_comentarios_view() {
    $comentarios = Comentario::all();
    return view('comentarios.modificar', compact('comentarios'));
}

public function eliminar_comentarios_view() {
    $comentarios = Comentario::all();
    return view('comentarios.eliminar', compact('comentarios'));
}
    

    public function index_user_view() {
        return view('indexUser');
    }

    public function index_admin_view() {
        return view('indexAdmin');
    }

     // Método para manejar el login
     public function login(Request $request)
    {
        // Validar los datos del formulario de login
        $validated = $request->validate([
            'username' => 'required|string',
            'contrasena' => 'required|string',
        ]);

        // Intentamos encontrar el usuario por username
        $usuario = Usuario::where('user_name', $request->username)
                          ->where('contrasena', $request->contrasena)
                          ->first();

        if ($usuario) {
            // Autenticamos al usuario
            Auth::login($usuario);

            // Verificamos el rol del usuario y redirigimos
            if ($usuario->rol == 'Administrador') {
                return redirect()->route('admin.dashboard'); // Redirige a la vista del admin
            } else {
                return redirect()->route('user.dashboard'); // Redirige a la vista del usuario
            }
        } else {
            // Si las credenciales son incorrectas, redirigimos con error
            return redirect()->back()->with('error', 'Credenciales incorrectas');
        }
    }

}
