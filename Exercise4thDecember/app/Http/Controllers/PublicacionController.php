<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Publicacion;

class PublicacionController extends Controller
{
    public function registrar_publicaciones_view() {
        $listarUsuarios = Usuario::all();
        return view('publicaciones.registrar', compact('listarUsuarios'));
    }

    public function registrar_publicaciones_db(Request $request) {
        // Validar datos del formulario
        $validated = $request->validate([
            'user_name' => 'required|exists:usuarios,user_name',
            'titulo' => 'required|string|max:255',
            'imagen' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'descripcion' => 'required|string',
        ]);
    
        // Crear nueva publicación
        $publicacion = new Publicacion;
        $publicacion->user_name = $request->user_name; // Usamos user_name en lugar de user_id
        $publicacion->titulo = $request->titulo;
        $publicacion->descripcion = $request->descripcion;
    
        // Procesar y guardar la imagen si se sube
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $imagenNombre = time() . '_' . $imagen->getClientOriginalName();
            $imagen->move(public_path('imagenes'), $imagenNombre);
            $publicacion->imagen = 'imagenes/' . $imagenNombre;
        }
    
        // Guardar publicación en la base de datos
        $publicacion->save();
    
        // Redirigir con mensaje de éxito
        return redirect()->back()->with('success', 'Publicación registrada correctamente.');
    }

    public function ver_publicaciones() {
        $publicaciones = Publicacion::all(); 
        return view('publicaciones.ver', compact('publicaciones'));
    }
    
    
    public function actualizar_publicacion(Request $request, $id)
{
    // Buscar la publicación por ID
    $publicacion = Publicacion::find($id);

    if (!$publicacion) {
        return redirect()->back()->with('error', 'Publicación no encontrada.');
    }

    // Validar los datos
    $request->validate([
        'titulo' => 'required|string|max:255',
        'descripcion' => 'required|string|max:1000',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validación de imagen
    ]);

    // Actualizar los campos
    $publicacion->titulo = $request->titulo;
    $publicacion->descripcion = $request->descripcion;

    // Verificar si se subió una nueva imagen
    if ($request->hasFile('imagen')) {
        $imagename = time() . '.' . $request->imagen->extension();
        $request->imagen->move(public_path('imagenes/publicaciones'), $imagename);
        $publicacion->imagen = 'imagenes/publicaciones/' . $imagename;
    }

    // Guardar los cambios
    $publicacion->save();

    // Redirigir con mensaje de éxito
    return redirect()->back()->with('success', 'Publicación actualizada correctamente.');
}

public function eliminar_publicacion($id)
{
    // Buscar la publicación por ID
    $publicacion = Publicacion::find($id);

    if (!$publicacion) {
        return redirect()->back()->with('error', 'Publicación no encontrada.');
    }

    // Eliminar los comentarios asociados a esta publicación
    $publicacion->comentarios()->delete();

    // Eliminar la imagen asociada si existe
    if ($publicacion->imagen && file_exists(public_path($publicacion->imagen))) {
        unlink(public_path($publicacion->imagen));
    }

    // Eliminar la publicación
    $publicacion->delete();

    // Redirigir con mensaje de éxito
    return redirect()->back()->with('success', 'Publicación y sus comentarios eliminados correctamente.');
}


    
}
