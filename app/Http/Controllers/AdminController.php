<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Contrato;
use App\Models\Descarga;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        $descargas = Descarga::with('user', 'contrato')->get(); 
        $categorias = Categoria::all(); 
        $contratos = Contrato::all(); 

        return view('admin.index', compact('usuarios', 'descargas', 'categorias', 'contratos'));
    }

    // Modificar el rol de un usuario
    public function modificarRol(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->tipo_usuario = $request->tipo_usuario; 
        $usuario->save();

        return back()->with('success', 'Rol modificado correctamente');
    }

    // Agregar o modificar categorías
    public function agregarCategoria(Request $request)
    {
        $categoria = new Categoria();
        $categoria->titulo = $request->titulo;
        $categoria->descripcion = $request->descripcion;
        $categoria->save();

        return back()->with('success', 'Categoría agregada correctamente');
    }

    public function modificarCategoria(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->titulo = $request->titulo;
        $categoria->descripcion = $request->descripcion;
        $categoria->save();

        return back()->with('success', 'Categoría modificada correctamente');
    }

    // Agregar o modificar contratos
    public function agregarContrato(Request $request)
    {
        $contrato = new Contrato();
        $contrato->titulo = $request->titulo;
        $contrato->descripcion = $request->descripcion;
        $contrato->categoria_id = $request->categoria_id;
        $contrato->save();

        return back()->with('success', 'Contrato agregado correctamente');
    }

    public function modificarContrato(Request $request, $id)
    {
        $contrato = Contrato::findOrFail($id);
        $contrato->titulo = $request->titulo;
        $contrato->descripcion = $request->descripcion;
        $contrato->categoria_id = $request->categoria_id;
        $contrato->save();

        return back()->with('success', 'Contrato modificado correctamente');
    }
    

    public function perfil()
    {
        // Obtener las descargas del usuario autenticado
        $descargas = Auth::user()->descargas()->with('contrato')->get();
        
        return view('users.perfil', compact('descargas'));
    }
}
