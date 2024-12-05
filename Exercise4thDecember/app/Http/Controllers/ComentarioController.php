<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Publicacion;
use App\Models\Comentario;

class ComentarioController extends Controller
{
    public function registrar_comentarios_view() {
        $listarUsuarios = Usuario::all();
        $publicaciones = Publicacion::all();

        return view('comentarios.registrar', compact('listarUsuarios', 'publicaciones'));
    }

    public function registrar_comentario_db(Request $request) {
        // Validar datos del formulario
        $validated = $request->validate([
            'user_name' => 'required|exists:usuarios,user_name',
            'publicacion_id' => 'required|exists:publicaciones,id',
            'contenido' => 'required|string',
        ]);
    
        // Crear nuevo comentario
        $comentario = new Comentario;
        $comentario->user_name = $request->user_name;
        $comentario->publicacion_id = $request->publicacion_id;
        $comentario->contenido = $request->contenido;
    
        // Guardar comentario en la base de datos
        $comentario->save();
    
        // Redirigir con mensaje de éxito
        return redirect()->back()->with('success', 'Comentario registrado correctamente.');
    }

    public function ver_comentarios() {
        $comentarios = Comentario::all();
        return view('comentarios.ver', compact('comentarios'));
    }

    public function actualizar_comentario(Request $request, $id)
{
    $comentario = Comentario::find($id);

    if (!$comentario) {
        return redirect()->back()->with('error', 'Comentario no encontrado.');
    }

    $request->validate([
        'contenido' => 'required|string|max:1000', 
    ]);

    // Actualizar el contenido del comentario
    $comentario->contenido = $request->contenido;

    // Guardar los cambios
    $comentario->save();

    return redirect()->back()->with('success', 'Comentario actualizado correctamente.');
}

public function eliminar_comentario($id)
{
    // Buscar el comentario por su ID
    $comentario = Comentario::find($id);

    if (!$comentario) {
        return redirect()->back()->with('error', 'Comentario no encontrado.');
    }

    // Eliminar el comentario
    $comentario->delete();

    // Redirigir con mensaje de éxito
    return redirect()->back()->with('success', 'Comentario eliminado correctamente.');
}

    
    
}
