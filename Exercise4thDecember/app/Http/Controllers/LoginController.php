<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class LoginController extends Controller
{
    public function registrar_user_view() {
        return view('registro.registrarUser');
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
